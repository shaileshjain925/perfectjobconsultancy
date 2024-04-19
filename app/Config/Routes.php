<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;
use MenuActionType as MAT;
// Load custom helpers
helper("commonfunction_helper");
helper('array');
/**
 * Automatically adds routes for all modules found in the specified directory.
 *
 * @param string $directory The directory to scan for modules.
 * @param RouteCollection $routes The route collection instance.
 * @return void
 */
if (!function_exists('autoAddRoutes')) {
    function autoAddRoutes(string $directory, RouteCollection $routes): void
    {
        $modules = scandir($directory);

        foreach ($modules as $module) {
            if ($module === '.' || $module === '..') {
                continue;
            }

            $fullPath = $directory . '/' . $module;

            if (is_dir($fullPath)) {
                $routesPath = $fullPath . '/Config/Routes.php';
                if (file_exists($routesPath)) {
                    // Load the module's routes
                    require $routesPath;
                }

                autoAddRoutes($fullPath, $routes);
            }
        }
    }
}

// Retrieve PHP_SELF
$php_self = $_SERVER['PHP_SELF'];

// Define allowed file extensions
$extensions = ['js', 'css', 'img', 'map', 'jpg', 'jpeg', 'png', 'gif', 'webp', 'woff', 'woff2', 'ttf', 'otf', 'mp4', 'webm', 'ogg', 'mp3', 'pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'txt'];

// Extract file extension using pathinfo
$file_extension = pathinfo($php_self, PATHINFO_EXTENSION);
function encodeArray($array)
{
    $serializedArray = serialize($array);
    return urlencode($serializedArray);
}
/**
 * Get Route Creation For PageController and Api To Get Single Record.
 */
function getRoute($routes, $path, $controller, $alias = null, $filterArguments = [], $menuFilter = '')
{
    if(!empty($menuFilter)){
        $options = ['filter' => $menuFilter . ':' . urlencode(serialize($filterArguments))];
    }else{
        $options =[];
    }
    

    if ($alias !== null) {
        $options['as'] = $alias;
    }

    $routes->get($path, $controller, $options);
}
/**
 * Post Route Creation For Api To Get List Of Record.
 */
function postRoute($routes, $path, $controller, $alias = null, $filterArguments = [], $menuFilter = '')
{
    if(!empty($menuFilter)){
        $options = ['filter' => $menuFilter . ':' . urlencode(serialize($filterArguments))];
    }else{
        $options =[];
    }

    if ($alias !== null) {
        $options['as'] = $alias;
    }

    $routes->post($path, $controller, $options);
}

if (!in_array($file_extension, $extensions)) {
    $routes->options('(:any)', 'ApiController::handleOptionsRequest');
    $routes->get('/', '\App\Controllers\Auth\LoginController::loginView', ['as' => 'login']);
    $routes->group('PJC', function ($routes) {
        $routes->group('NoAuth', function ($routes) {
            $routes->get('login', '\App\Controllers\Auth\LoginController::loginView', ['as' => 'login']);
            $routes->post('login', '\App\Controllers\Auth\LoginController::loginAction', ['as' => 'loginPost']);

            // Magic Link Login
            $routes->get('magic-link', '\App\Controllers\Auth\MagicLinkController::loginView', ['as' => 'magic-link']);
            $routes->post('magic-link', '\App\Controllers\Auth\MagicLinkController::loginAction', ['as' => 'magic-linkPost']);
            $routes->get('verify-magic-link', '\App\Controllers\Auth\MagicLinkController::verify', ['as' => 'verify-magic-link']);

            // Logout Routes
            $routes->get('logout', '\App\Controllers\Auth\LoginController::logoutAction', ['as' => 'logout']);

            // Registration Routes
            $routes->get('register', '\App\Controllers\Auth\RegisterController::registerView', ['as' => 'register']);
            $routes->post('register', '\App\Controllers\Auth\RegisterController::registerAction', ['as' => 'registerPost']);

            // Action Routes
            $routes->get('auth-action-show', '\App\Controllers\Auth\ActionController::show', ['filter' => 'auth-action-show']);
            $routes->post('auth-action-handle', '\App\Controllers\Auth\ActionController::handle', ['as' => 'auth-action-handlePost']);
            $routes->post('auth-action-verify', '\App\Controllers\Auth\ActionController::verify', ['as' => 'auth-action-verifyPost']);
        });
        // Admin Panel Without Midware Pages End

        // Admin Panel Without Midware Pages Start
        $routes->group('Auth', ['filter' => 'InnerApiFilter'], function ($routes) {
            $routes->get('/', 'PageController::dashboard', ['as' => 'dashboard']);
            // Website Management
            $routes->group('WebsiteManagement', function ($routes) {
                $routes->group('CompanySetup', function ($routes) {
                    getRoute($routes, "Update", "PageController::CompanySetupCreateUpdate", 'CompanySetupCreateUpdate');
                });
                $routes->group('Enquiry', function ($routes) {
                    getRoute($routes, "List", "PageController::FormSubmissionList", 'FormSubmissionList');
                });
                $routes->group('BlogPost', function ($routes) {
                    getRoute($routes, "List", "PageController::BlogPostList", 'BlogPostList');
                    getRoute($routes, "Create", "PageController::BlogPostList", 'BlogPostCreate');
                    getRoute($routes, "Update/(:num)", "PageController::BlogPostList/$1", 'BlogPostUpdate');
                });
            });
        });
        // Admin Panel Pages With Midware End
    });
    // Admin Panel Pages End        

    // Admin Panel Api Start
    $routes->group('BSS-Api', function ($routes) {
        // Admin Panel Api Without Midware Start
        $routes->group('NoAuth', function ($routes) {
            $routes->post("GetCountry", "ApiController::getCountry");
            $routes->post("GetState", "ApiController::getState");
            $routes->post("GetCity", "ApiController::getCity");
            $routes->post("CityCreate", "ApiController::Citycreate");
            $routes->post('Register', 'ApiController::AuthRegistration');
            $routes->post('Login', '\App\Controllers\Auth\LoginController::jwtLogin');
        });
        // Admin Panel Api Without Midware End

        // Admin Panel Api With Midware Start
        $routes->group('Auth', ['filter' => 'InnerApiFilter'], function ($routes) {
            $routes->group('Role', function ($routes) {
                postRoute($routes, 'Create', 'ApiController::RoleCreate', 'rolecreate-api');
                postRoute($routes, 'RoleMenuRightsCreate', 'ApiController::RoleMenuAccessRightsCreate', 'rolemenuapirightscreate-api');
                postRoute($routes, 'List', 'ApiController::RoleList', 'rolelist-api');
                getRoute($routes, 'Get/(:num)', 'ApiController::RoleGet/$1', null);
                postRoute($routes, 'Update', 'ApiController::RoleUpdate', 'roleupdate-api');
                postRoute($routes, 'Delete', 'ApiController::RoleDelete', 'roledelete-api');
            });
            $routes->group('Company', function ($routes) {
                postRoute($routes, 'Create', 'ApiController::CompanyCreate', 'companycreate-api');
                postRoute($routes, 'List', 'ApiController::CompanyList', 'companylist-api');
                postRoute($routes, 'Migrate', 'ApiController::CompanyMigrate', 'companymigrate-api');
                getRoute($routes, 'Get/(:num)', 'ApiController::CompanyGet/$1', null);
                postRoute($routes, 'Update', 'ApiController::CompanyUpdate', 'companyupdate-api');
                postRoute($routes, 'Delete', 'ApiController::CompanyDelete', 'companydelete-api');
                $routes->group('User', function ($routes) {
                    postRoute($routes, 'Create', 'ApiController::CompanyUserCreate', 'companyusercreate-api');
                    postRoute($routes, 'List', 'ApiController::CompanyUserList', 'companyuserlist-api');
                    getRoute($routes, 'Get/(:num)', 'ApiController::CompanyUserGet/$1', null);
                    postRoute($routes, 'Update', 'ApiController::CompanyUserUpdate', 'companyuserupdate-api');
                    postRoute($routes, 'Delete', 'ApiController::CompanyUserDelete', 'companyuserdelete-api');
                });
            });
        });
        // Admin Panel Api With Midware End
    });
    // Admin Panel Api End
    // Website Management Mobile App Api Start
    $routes->group('BSS-ClientApp-Api', function ($routes) {
        // Website Management Mobile App Api Without Midware Start
        $routes->group('NoAuth', function ($routes) {
            $routes->post("WebsiteManagementLogin", "ApiWebsiteManagementController::WebsiteManagementLogin");
            $routes->get("CorsTestGet", "ApiController::CrosTest");
            $routes->post("CrosTestPost", "ApiController::CrosTest");
            $routes->post("CrosTestPut", "ApiController::CrosTest");
            $routes->post("CrosTestPatch", "ApiController::CrosTest");
            $routes->post("CrosTestDelete", "ApiController::CrosTest");
        });
        // Website Management Mobile App Api Without Midware End
        // Website Management Mobile App Api With Midware Start
        $routes->group('Auth', function ($routes) {
            postRoute($routes, 'DashboardGet', 'ApiWebsiteManagementController::DashboardGet', null,[],'clientapp');
            postRoute($routes, 'UploadFile', 'ApiWebsiteManagementController::UploadFile', null,[],'clientapp');
            $routes->group('WebsiteProfile', function ($routes) {
                $menu_id = 1;
                postRoute($routes, 'List', 'ApiWebsiteManagementController::WebsiteProfileGet', null, ['menu_id' => $menu_id, 'action_type' => MAT::View], 'clientapp');
                postRoute($routes, 'Update', 'ApiWebsiteManagementController::WebsiteProfileCreateUpdate', null, ['menu_id' => $menu_id, 'action_type' => MAT::Create], 'clientapp');
            });
            $routes->group('FormSubmissions', function ($routes) {
                $menu_id = 2;
                postRoute($routes, 'List', 'ApiWebsiteManagementController::FormSubmissionsList', null, ['menu_id' => $menu_id, 'action_type' => MAT::View], 'clientapp');
            });
            $routes->group('BlogPost', function ($routes) {
                $menu_id = 3;
                getRoute($routes, 'Get/(:num)', 'ApiWebsiteManagementController::BlogPostGet/$1', null, ['menu_id' => $menu_id, 'action_type' => MAT::View], 'clientapp');
                postRoute($routes, 'List', 'ApiWebsiteManagementController::BlogPostList', null, ['menu_id' => $menu_id, 'action_type' => MAT::View], 'clientapp');
                postRoute($routes, 'Create', 'ApiWebsiteManagementController::BlogPostCreate', null, ['menu_id' => $menu_id, 'action_type' => MAT::Create], 'clientapp');
                postRoute($routes, 'Update', 'ApiWebsiteManagementController::BlogPostUpdate', null, ['menu_id' => $menu_id, 'action_type' => MAT::Update], 'clientapp');
                postRoute($routes, 'Delete', 'ApiWebsiteManagementController::BlogPostDelete', null, ['menu_id' => $menu_id, 'action_type' => MAT::Delete], 'clientapp');
                getRoute($routes, 'SendBlogEmailToAllSubscribers/(:num)', 'ApiWebsiteManagementController::SendBlogEmailToAllSubscribers/$1', null, ['menu_id' => $menu_id, 'action_type' => MAT::Export], 'clientapp');
            });
            $routes->group('Client', function ($routes) {
                $menu_id = 3;
                getRoute($routes, 'Get/(:num)', 'ApiWebsiteManagementController::ClientGet/$1', null, ['menu_id' => $menu_id, 'action_type' => MAT::View], 'clientapp');
                postRoute($routes, 'List', 'ApiWebsiteManagementController::ClientList', null, ['menu_id' => $menu_id, 'action_type' => MAT::View], 'clientapp');
                postRoute($routes, 'Create', 'ApiWebsiteManagementController::ClientCreate', null, ['menu_id' => $menu_id, 'action_type' => MAT::Create], 'clientapp');
                postRoute($routes, 'Update', 'ApiWebsiteManagementController::ClientUpdate', null, ['menu_id' => $menu_id, 'action_type' => MAT::Update], 'clientapp');
                postRoute($routes, 'Delete', 'ApiWebsiteManagementController::ClientDelete', null, ['menu_id' => $menu_id, 'action_type' => MAT::Delete], 'clientapp');
                getRoute($routes, 'SendBlogEmailToAllSubscribers/(:num)', 'ApiWebsiteManagementController::SendBlogEmailToAllSubscribers/$1', null, ['menu_id' => $menu_id, 'action_type' => MAT::Export], 'clientapp');
            });
            $routes->group('VisitorCount', function ($routes) {
                $menu_id = 4;
                postRoute($routes, 'Get', 'ApiWebsiteManagementController::VisitorsCountGet', null, ['menu_id' => $menu_id, 'action_type' => MAT::View], 'clientapp');
            });
            $routes->group('Subscriber', function ($routes) {
                $menu_id = 5;
                postRoute($routes, 'List', 'ApiWebsiteManagementController::SubscriberList', null, ['menu_id' => $menu_id, 'action_type' => MAT::View], 'clientapp');
            });
            $routes->group('Employees', function ($routes) {
                $menu_id = 6;
                postRoute($routes, 'List', 'ApiWebsiteManagementController::EmployeeList', null, ['menu_id' => $menu_id, 'action_type' => MAT::View], 'clientapp');
                postRoute($routes, 'Create', 'ApiWebsiteManagementController::EmployeeCreate', null, ['menu_id' => $menu_id, 'action_type' => MAT::Create], 'clientapp');
                postRoute($routes, 'Update', 'ApiWebsiteManagementController::EmployeeUpdate', null, ['menu_id' => $menu_id, 'action_type' => MAT::Update], 'clientapp');
                postRoute($routes, 'Delete', 'ApiWebsiteManagementController::EmployeeDelete', null, ['menu_id' => $menu_id, 'action_type' => MAT::Delete], 'clientapp');
            });
            $routes->group('ProductsAndServices', function ($routes) {
                $menu_id = 7;
                postRoute($routes, 'List', 'ApiWebsiteManagementController::ProductAndServicesList', null, ['menu_id' => $menu_id, 'action_type' => MAT::View], 'clientapp');
                postRoute($routes, 'Create', 'ApiWebsiteManagementController::ProductAndServicesCreate', null, ['menu_id' => $menu_id, 'action_type' => MAT::Create], 'clientapp');
                postRoute($routes, 'Update', 'ApiWebsiteManagementController::ProductAndServicesUpdate', null, ['menu_id' => $menu_id, 'action_type' => MAT::Update], 'clientapp');
                postRoute($routes, 'Delete', 'ApiWebsiteManagementController::ProductAndServicesDelete', null, ['menu_id' => $menu_id, 'action_type' => MAT::Delete], 'clientapp');
            });
            $routes->group('MediaGallery', function ($routes) {
                $menu_id = 8;
                postRoute($routes, 'List', 'ApiWebsiteManagementController::MediaGalleryList', null, ['menu_id' => $menu_id, 'action_type' => MAT::View], 'clientapp');
                postRoute($routes, 'Create', 'ApiWebsiteManagementController::MediaGalleryCreate', null, ['menu_id' => $menu_id, 'action_type' => MAT::Create], 'clientapp');
                postRoute($routes, 'Update', 'ApiWebsiteManagementController::MediaGalleryUpdate', null, ['menu_id' => $menu_id, 'action_type' => MAT::Update], 'clientapp');
                postRoute($routes, 'Delete', 'ApiWebsiteManagementController::MediaGalleryDelete', null, ['menu_id' => $menu_id, 'action_type' => MAT::Delete], 'clientapp');
            });
        });
        // Website Management Mobile App Api With Midware End
    });
    $routes->group('BSS-ClientWeb-Api', function ($routes) {
        $routes->group('WebsiteProfile', function ($routes) {
            postRoute($routes, 'List', 'ApiWebsiteManagementController::WebsiteProfileGet', null, [], 'clientweb');
        });
        $routes->group('FormSubmissions', function ($routes) {
            postRoute($routes, 'Create', 'ApiWebsiteManagementController::FormSubmissionsCreate', null, [], 'clientweb');
        });
        $routes->group('BlogPost', function ($routes) {
            postRoute($routes, 'List', 'ApiWebsiteManagementController::BlogPostList', null, [], 'clientweb');
        });
        $routes->group('VisitorCount', function ($routes) {
            $menu_id = 4;
            postRoute($routes, 'Create', 'ApiWebsiteManagementController::VisitorsCountCreate', null, ['menu_id' => $menu_id, 'action_type' => MAT::View], 'clientapp');
        });
        $routes->group('Subscriber', function ($routes) {
            postRoute($routes, 'Subscribe', 'ApiWebsiteManagementController::Subscribe', null, [], 'clientweb');
            postRoute($routes, 'UnSubscribe', 'ApiWebsiteManagementController::UnSubscribe', null, [], 'clientweb');
        });
        $routes->group('ProductsAndServices', function ($routes) {
            postRoute($routes, 'List', 'ApiWebsiteManagementController::ProductAndServicesList', null, [], 'clientweb');
        });
        $routes->group('MediaGallery', function ($routes) {
            postRoute($routes, 'List', 'ApiWebsiteManagementController::MediaGalleryList', null, [], 'clientweb');
        });
    });

    // Scan for additional module routes
    $modulesDirectory = APPPATH . 'Modules/';
    autoAddRoutes($modulesDirectory, $routes);
}
