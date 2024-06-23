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
/**
 * @var RouteCollection $routes
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
if (!in_array($file_extension, $extensions)) {
    $routes->options('(:any)', 'AdminApiController::handleOptionsRequest');
    // Main Routes Start ---------------------------------------------------------------------------------------------------------------------
    $routes->get('/', 'AuthController::login', ['as' => 'admin_login_page']);
    $routes->get('/logout', 'AuthController::logout', ['as' => 'admin_logout_page']);
    $routes->get('/forgetPassword', 'AuthController::forgetPassword', ['as' => 'forget_Password']);
    $routes->group('Auth', ['filter' => 'AdminAuthFilter'], function ($routes) {
        $routes->group('Dashboard', function ($routes) {
            $routes->get('/', 'AdminPageController::default_dashboard', ['as' => 'default_dashboard']);
            $routes->get('Admin', 'AdminPageController::admin_dashboard', ['as' => 'admin_dashboard']);
            $routes->get('Purchase', 'AdminPageController::purchase_dashboard', ['as' => 'purchase_dashboard']);
            $routes->get('Order', 'AdminPageController::order_dashboard', ['as' => 'order_dashboard']);
            $routes->get('Financial', 'AdminPageController::finance_dashboard', ['as' => 'financial_dashboard']);
            $routes->get('Delivery', 'AdminPageController::delivery_dashboard', ['as' => 'delivery_dashboard']);
            $routes->get('Stock', 'AdminPageController::stock_dashboard', ['as' => 'stock_dashboard']);
        });
        $routes->group('Admin', function ($routes) {
            $routes->get('RoleUserList', 'AdminPageController::role_user_list', ['as' => 'role_user_list']);
            $routes->get('UserRoleCreateUpdateComponent', 'AdminPageController::UserRoleCreateUpdateComponent', ['as' => 'UserRoleCreateUpdateComponent']);
            $routes->get('UserRoleCreateUpdateComponent/(:num)', 'AdminPageController::UserRoleCreateUpdateComponent/$1');
            $routes->get('BrandCreateUpdate', 'AdminPageController::BrandCreateUpdate', ['as' => 'BrandCreateUpdate']);
            $routes->get('BrandCreateUpdate/(:num)', 'AdminPageController::BrandCreateUpdate/$1');
            $routes->get('CategoryTypeCreateUpdate', 'AdminPageController::CategoryTypeCreateUpdate', ['as' => 'CategoryTypeCreateUpdate']);
            $routes->get('CategoryTypeCreateUpdate/(:num)', 'AdminPageController::CategoryTypeCreateUpdate/$1');
            $routes->get('CategoryCreateUpdate', 'AdminPageController::CategoryCreateUpdate', ['as' => 'CategoryCreateUpdate']);
            $routes->get('CategoryCreateUpdate/(:num)', 'AdminPageController::CategoryCreateUpdate/$1');
            $routes->get('fabricCreateUpdate', 'AdminPageController::fabricCreateUpdate', ['as' => 'fabricCreateUpdate']);
            $routes->get('fabricCreateUpdate/(:num)', 'AdminPageController::fabricCreateUpdate/$1');
            $routes->get('PatternCreateUpdate', 'AdminPageController::PatternCreateUpdate', ['as' => 'PatternCreateUpdate']);
            $routes->get('PatternCreateUpdate/(:num)', 'AdminPageController::PatternCreateUpdate/$1');
            $routes->get('sizeCreateUpdate', 'AdminPageController::sizeCreateUpdate', ['as' => 'sizeCreateUpdate']);
            $routes->get('sizeCreateUpdate/(:num)', 'AdminPageController::sizeCreateUpdate/$1');

            $routes->get('CustomerList', 'AdminPageController::customer_list', ['as' => 'customer_list']);
            $routes->get('AddDeal', 'AdminPageController::add_deal_of_the_day', ['as' => 'add_deal_of_the_day']);
            $routes->group('Company', function ($routes) {
                $routes->get('CompanySetup', 'AdminPageController::company_setup', ['as' => 'company_setup']);
                $routes->get('EcommerceSetup', 'AdminPageController::ecommerce_setup', ['as' => 'ecommerce_setup']);
            });
            $routes->group('Integration', function ($routes) {
                $routes->get('Email', 'AdminPageController::email_integration', ['as' => 'email_integration']);
                $routes->get('SMS', 'AdminPageController::sms_integration', ['as' => 'sms_integration']);
                $routes->get('FirebaseMessagingIntegration', 'AdminPageController::FirebaseMessagingIntegration', ['as' => 'notification_integration']);
                $routes->get('PaymentGateWay', 'AdminPageController::payment_gateway_integration', ['as' => 'payment_gateway_integration']);
                $routes->get('OAuth2', 'AdminPageController::oauth2_integration', ['as' => 'oauth2_integration']);
            });
        });
        $routes->group('Inventory', function ($routes) {
            $routes->get('Category', 'AdminPageController::category_list', ['as' => 'category_list']);
            $routes->get('CategoryType', 'AdminPageController::category_type_list', ['as' => 'category_type_list']);
            $routes->get('AddBrand', 'AdminPageController::brand_list', ['as' => 'brand_list']);
            $routes->get('Fabric', 'AdminPageController::fabric_list', ['as' => 'fabric_list']);
            $routes->get('AddPattern', 'AdminPageController::pattern_list', ['as' => 'pattern_list']);
            $routes->get('Size', 'AdminPageController::size_list', ['as' => 'size_list']);
            $routes->get('ProductManage', 'AdminPageController::product_manage', ['as' => 'product_manage']);
            $routes->get('VariantProducts/(:any)', 'AdminPageController::variant_list/$1', ['as' => 'variant_list']);
            $routes->get('VariantCreateUpdate/(:any)', 'AdminPageController::variant_create_update/$1', ['as' => 'variant_create_update']);
            $routes->get('VariantCreateUpdate/(:any)/(:any)', 'AdminPageController::variant_create_update/$1/$2', ['as' => 'update_variant']);
            $routes->get('ProductCreateUpdate', 'AdminPageController::product_create_update', ['as' => 'create_product']);
            $routes->get('ProductCreateUpdate/(:any)', 'AdminPageController::product_create_update/$1');
            $routes->post('VariantView', 'AdminPageController::variant_view_detail', ['as' => 'VariantView']);
        });
        $routes->group('Orders', function ($routes) {
            $routes->get('PlacedOrders', 'AdminPageController::placed_order', ['as' => 'placed_order']);
            $routes->get('OrderAccepted', 'AdminPageController::order_accepted', ['as' => 'order_accepted']);
        });
        $routes->group('Delivery', function ($routes) {
            $routes->get('DeliveryOrders', 'AdminPageController::delivery_orders', ['as' => 'delivery_orders']);
            $routes->get('ShippedOrders', 'AdminPageController::order_shipped', ['as' => 'order_shipped']);
            $routes->get('DeliverdOrders', 'AdminPageController::order_deliverd', ['as' => 'order_deliverd']);
            $routes->get('CancelledOrders', 'AdminPageController::cancelled_order', ['as' => 'cancelled_order']);
        });
        $routes->group('Stock', function ($routes) {
            $routes->get('ProductList', 'AdminPageController::products_list', ['as' => 'products_list']);
            $routes->get('AddStock', 'AdminPageController::add_update_stock', ['as' => 'add_stock']);
            $routes->get('StockUpdate/(:any)', 'AdminPageController::add_update_stock/$1', ['as' => 'update_stock']);
        });
    });
    // Admin Panel Api Start -----------------------------------------------------------------------------------------------------------
    $routes->group('adminApi', function ($routes) {
        $routes->group('user', function ($routes) {
            $routes->post('login', 'AdminApiController::UserLogin', ['as' => 'userLoginApi']);
            $routes->post('UserForgetPasswordOtpSend', 'AdminApiController::UserForgetPasswordOtpSend', ['as' => 'UserForgetPasswordOtpSend']);
            $routes->post('UserForgetPasswordUpdate', 'AdminApiController::UserForgetPasswordUpdate', ['as' => 'UserForgetPasswordUpdate']);
        });


        // Admin Panel Api Without Midware Start
        $routes->group('Country', function ($routes) {
            $routes->post('Get', 'AdminApiController::CountryGet');
            $routes->post('List', 'AdminApiController::CountryList');
            $routes->post('Create', 'AdminApiController::CountryCreate');
            $routes->post('Update', 'AdminApiController::CountryUpdate');
            $routes->post('Delete', 'AdminApiController::CountryDelete');
        });
        $routes->group('State', function ($routes) {
            $routes->post('Get', 'AdminApiController::StateGet');
            $routes->post('List', 'AdminApiController::StateList');
            $routes->post('Create', 'AdminApiController::StateCreate');
            $routes->post('Update', 'AdminApiController::StateUpdate');
            $routes->post('Delete', 'AdminApiController::StateDelete');
        });
        $routes->group('City', function ($routes) {
            $routes->post('Get', 'AdminApiController::CityGet');
            $routes->post('List', 'AdminApiController::CityList');
            $routes->post('Create', 'AdminApiController::CityCreate');
            $routes->post('Update', 'AdminApiController::CityUpdate');
            $routes->post('Delete', 'AdminApiController::CityDelete');
        });
        $routes->group('Auth', ['filter' => 'AdminApiAuthFilter'], function ($routes) {
            // User Routes
            $routes->group('User', function ($routes) {
                $routes->post('Get', 'AdminApiController::UserGet');
                $routes->post('List', 'AdminApiController::UserList', ['as' => 'user_list_api']);
                $routes->post('Create', 'AdminApiController::UserCreate', ['as' => 'user_create_api']);
                $routes->post('Update', 'AdminApiController::UserUpdate', ['as' => 'user_update_api']);
                $routes->post('Delete', 'AdminApiController::UserDelete', ['as' => 'user_delete_api']);
            });
            $routes->group('FileUpload', function ($routes) {
                $routes->post('ImageUpload', 'AdminApiController::ImageUpload', ['as' => 'file_upload_image_api']);
            });
            $routes->group('Brand', function ($routes) {
                $routes->post('Get', 'AdminApiController::BrandGet', ['as' => 'brand_get_api']);
                $routes->post('List', 'AdminApiController::BrandList', ['as' => 'brand_list_api']);
                $routes->post('Create', 'AdminApiController::BrandCreate', ['as' => 'brand_create_api']);
                $routes->post('Update', 'AdminApiController::BrandUpdate', ['as' => 'brand_update_api']);
                $routes->post('Delete', 'AdminApiController::BrandDelete', ['as' => 'brand_delete_api']);
            });
            $routes->group('CategoryType', function ($routes) {
                $routes->post('Get', 'AdminApiController::CategoryTypeGet', ['as' => 'categoryType_get_api']);
                $routes->post('List', 'AdminApiController::CategoryTypeList', ['as' => 'categoryType_list_api']);
                $routes->post('Create', 'AdminApiController::CategoryTypeCreate', ['as' => 'categoryType_create_api']);
                $routes->post('Update', 'AdminApiController::CategoryTypeUpdate', ['as' => 'categoryType_update_api']);
                $routes->post('Delete', 'AdminApiController::CategoryTypeDelete', ['as' => 'categoryType_delete_api']);
            });

            $routes->group('Category', function ($routes) {
                $routes->post('Get', 'AdminApiController::CategoryGet', ['as' => 'category_get_api']);
                $routes->post('List', 'AdminApiController::CategoryList', ['as' => 'category_list_api']);
                $routes->post('Create', 'AdminApiController::CategoryCreate', ['as' => 'category_create_api']);
                $routes->post('Update', 'AdminApiController::CategoryUpdate', ['as' => 'category_update_api']);
                $routes->post('Delete', 'AdminApiController::CategoryDelete', ['as' => 'category_delete_api']);
            });

            $routes->group('fabric', function ($routes) {
                $routes->post('Get', 'AdminApiController::fabricGet', ['as' => 'fabric_get_api']);
                $routes->post('List', 'AdminApiController::fabricList', ['as' => 'fabric_list_api']);
                $routes->post('Create', 'AdminApiController::fabricCreate', ['as' => 'fabric_create_api']);
                $routes->post('Update', 'AdminApiController::fabricUpdate', ['as' => 'fabric_update_api']);
                $routes->post('Delete', 'AdminApiController::fabricDelete', ['as' => 'fabric_delete_api']);
            });

            $routes->group('pattern', function ($routes) {
                $routes->post('Get', 'AdminApiController::AddPatternGet', ['as' => 'pattern_get_api']);
                $routes->post('List', 'AdminApiController::AddPatternList', ['as' => 'pattern_list_api']);
                $routes->post('Create', 'AdminApiController::AddPatternCreate', ['as' => 'pattern_create_api']);
                $routes->post('Update', 'AdminApiController::AddPatternUpdate', ['as' => 'pattern_update_api']);
                $routes->post('Delete', 'AdminApiController::AddPatternDelete', ['as' => 'pattern_delete_api']);
            });

            $routes->group('Product', function ($routes) {
                $routes->post('Get', 'AdminApiController::productGet', ['as' => 'product_get_api']);
                $routes->post('List', 'AdminApiController::productList', ['as' => 'product_list_api']);
                $routes->post('Create', 'AdminApiController::productCreate', ['as' => 'product_create_api']);
                $routes->post('Update', 'AdminApiController::productUpdate', ['as' => 'product_update_api']);
                $routes->post('Delete', 'AdminApiController::productDelete', ['as' => 'product_delete_api']);
            });
            $routes->group('ProductVariant', function ($routes) {
                $routes->post('Get', 'AdminApiController::variantGet', ['as' => 'variant_get_api']);
                $routes->post('List', 'AdminApiController::variantList', ['as' => 'variant_list_api']);
                $routes->post('Create', 'AdminApiController::variantCreate', ['as' => 'variant_create_api']);
                $routes->post('Update', 'AdminApiController::variantUpdate', ['as' => 'variant_update_api']);
                $routes->post('Delete', 'AdminApiController::variantDelete', ['as' => 'variant_delete_api']);
                $routes->post('calculate_variant', 'AdminApiController::calculate_variant', ['as' => 'calculate_variant']);
            });

            $routes->group('Size', function ($routes) {
                $routes->post('Get', 'AdminApiController::sizeGet', ['as' => 'size_get_api']);
                $routes->post('List', 'AdminApiController::sizeList', ['as' => 'size_list_api']);
                $routes->post('Create', 'AdminApiController::sizeCreate', ['as' => 'size_create_api']);
                $routes->post('Update', 'AdminApiController::sizeUpdate', ['as' => 'size_update_api']);
                $routes->post('Delete', 'AdminApiController::sizeDelete', ['as' => 'size_delete_api']);
            });

            $routes->group('Unit', function ($routes) {
                $routes->post('Get', 'AdminApiController::unitGet', ['as' => 'unit_get_api']);
                $routes->post('List', 'AdminApiController::unitList', ['as' => 'unit_list_api']);
                $routes->post('Create', 'AdminApiController::unitCreate', ['as' => 'unit_create_api']);
                $routes->post('Update', 'AdminApiController::unitUpdate', ['as' => 'unit_update_api']);
                $routes->post('Delete', 'AdminApiController::unitDelete', ['as' => 'unit_delete_api']);
            });
            $routes->post('FirebaseMessagingIntegrationCreateUpdate', 'AdminApiController::FirebaseMessagingIntegrationCreateUpdate', ['as' => 'FirebaseMessagingIntegrationCreateUpdate']);
            $routes->post('SendNotification', 'AdminApiController::SendNotification', ['as' => 'SendNotification']);
        });
    });
    // Ecommerce Api Start -------------------------------------------------------------------------------------------
    $routes->group('EcommerceApi', ['filter' => 'EcommerceApiAuthFilter'], function ($routes) {
    });
}
