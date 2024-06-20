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
    $routes->get('/', 'AuthController::login');
    $routes->group('Auth', ['filter' => 'AdminAuth'], function ($routes) {
        $routes->group('Dashboard', function ($routes) {
            $routes->get('/', 'AdminPageController::default_dashboard', ['as' => 'default_dashboard']);
            $routes->get('Admin', 'AdminPageController::admin_dashboard', ['as' => 'admin_dashboard']);
            $routes->get('Inventory', 'AdminPageController::admin_dashboard', ['as' => 'inventory_dashboard']);
            $routes->get('Order', 'AdminPageController::admin_dashboard', ['as' => 'order_dashboard']);
            $routes->get('Financial', 'AdminPageController::admin_dashboard', ['as' => 'financial_dashboard']);
            $routes->get('Delivery', 'AdminPageController::admin_dashboard', ['as' => 'delivery_dashboard']);
            $routes->get('Stock', 'AdminPageController::admin_dashboard', ['as' => 'stock_dashboard']);
        });
        $routes->group('Admin', function ($routes) {
            $routes->get('RoleUserList', 'AdminPageController::admin_dashboard', ['as' => 'role_user_list']);
            $routes->group('CompanySetup', function ($routes) {
                $routes->get('WebSiteSetup', 'AdminPageController::admin_dashboard', ['as' => 'website_setup']);
                $routes->get('EcommerceSetup', 'AdminPageController::admin_dashboard', ['as' => 'ecommerce_setup']);
            });
            $routes->group('Integration', function ($routes) {
                $routes->get('Email', 'AdminPageController::admin_dashboard', ['as' => 'email_integration']);
                $routes->get('SMS', 'AdminPageController::admin_dashboard', ['as' => 'sms_integration']);
                $routes->get('Notification', 'AdminPageController::admin_dashboard', ['as' => 'notification_integration']);
                $routes->get('PaymentGateWay', 'AdminPageController::admin_dashboard', ['as' => 'payment_gateway_integration']);
                $routes->get('OAuth2', 'AdminPageController::admin_dashboard', ['as' => 'oauth2_integration']);
            });
        });
    });
    // Admin Panel Api Start
    $routes->group('adminApi', function ($routes) {
        $routes->group('user', function ($routes) {
            $routes->post('login', 'AdminApiController::UserLogin', ['as' => 'userLoginApi']);
            $routes->post('forgetPassword', 'AdminApiController::UserForgetPassword', ['as' => 'userForgetPasswordApi']);
            $routes->post('forgetPasswordVerification', 'AdminApiController::UserForgetPasswordVerification', ['as' => 'userForgetPasswordVerificationApi']);
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
        $routes->group('Auth', ['filter' => 'AdminApiAuth'], function ($routes) {
            $routes->group('User', function ($routes) {
                $routes->post('Get', 'AdminApiController::UserGet');
                $routes->post('List', 'AdminApiController::UserList');
                $routes->post('Create', 'AdminApiController::UserCreate');
                $routes->post('Update', 'AdminApiController::UserUpdate');
                $routes->post('Delete', 'AdminApiController::UserDelete');
            });
        });
    });
    // Ecommerce Api Start
    $routes->group('EcommerceApi', function ($routes) {
        $routes->group('Customer', function ($routes) {
            $routes->post('Login', 'EcommerceApiController::CustomerLogin');
            $routes->post('Registration', 'EcommerceApiController::CustomerRegistration');
            $routes->post('RegistrationVerification', 'EcommerceApiController::CustomerRegistrationVerification');
            $routes->post('ForgetPassword', 'EcommerceApiController::CustomerForgetPassword');
            $routes->post('ForgetPasswordVerification', 'EcommerceApiController::CustomerForgetPasswordVerification');
        });
        // Admin Panel Api Without Midware Start
        $routes->group('Country', function ($routes) {
            $routes->post('Get', 'EcommerceApiController::CountryGet');
            $routes->post('List', 'EcommerceApiController::CountryList');
            $routes->post('Create', 'EcommerceApiController::CountryCreate');
            $routes->post('Update', 'EcommerceApiController::CountryUpdate');
            $routes->post('Delete', 'EcommerceApiController::CountryDelete');
        });
        $routes->group('State', function ($routes) {
            $routes->post('Get', 'EcommerceApiController::StateGet');
            $routes->post('List', 'EcommerceApiController::StateList');
            $routes->post('Create', 'EcommerceApiController::StateCreate');
            $routes->post('Update', 'EcommerceApiController::StateUpdate');
            $routes->post('Delete', 'EcommerceApiController::StateDelete');
        });
        $routes->group('City', function ($routes) {
            $routes->post('Get', 'EcommerceApiController::CityGet');
            $routes->post('List', 'EcommerceApiController::CityList');
            $routes->post('Create', 'EcommerceApiController::CityCreate');
            $routes->post('Update', 'EcommerceApiController::CityUpdate');
            $routes->post('Delete', 'EcommerceApiController::CityDelete');
        });
    });
}
    // Main Routes End ------------------------------------------------------------------------------------------------------------------------

//     // Hansa Old Design Routes Start ----------------------------------------------------------------------------------------------------------
//     $routes->group('hansa', function ($routes) {
//         $routes->get('/', 'HansaPageController::dashboard');
//         $routes->get('login', 'HansaPageController::login');
//         $routes->get('user', 'HansaPageController::user');
//         $routes->get('all-orders', 'HansaPageController::all_orders');
//         $routes->get('order-detail', 'HansaPageController::order_detail');
//         $routes->get('add-dealoftheday', 'HansaPageController::add_dealoftheday');
//         $routes->get('add-offer', 'HansaPageController::add_offer');
//         $routes->get('enquiry-list', 'HansaPageController::enquiry_list');
//         $routes->get('invoice', 'HansaPageController::Invoice');
//         $routes->get('invoice-print', 'HansaPageController::invoice_print');
//         $routes->get('generate-bill', 'HansaPageController::Generate_bill');
//         $routes->get('user-list', 'HansaPageController::user_list');
//         $routes->get('user-order-history', 'HansaPageController::user_order_history');

//         // Delivery Admin routes
//         $routes->get('delivery-dashboard', 'HansaPageController::delivery_dashboard');
//         $routes->get('delivery-all-orders', 'HansaPageController::delivery_all_orders');
//         $routes->get('delivery-order-shipped', 'HansaPageController::delivery_order_shipped');
//         $routes->get('delivery-order-delivered', 'HansaPageController::delivery_order_deliverd');
//         $routes->get('delivery-order-cancelled', 'HansaPageController::delivery_order_cancelled');

//         // Financial Admin routes
//         $routes->get('financial-dashboard', 'HansaPageController::financial_dashboard');
//         $routes->get('financial-products', 'HansaPageController::financial_Products');

//         // Inventory Admin routes
//         $routes->get('inventory-dashboard', 'HansaPageController::inventory_dashboard');
//         $routes->get('inventory-add-category', 'HansaPageController::inventory_add_category');
//         $routes->get('inventory-add-category-type', 'HansaPageController::inventory_AddCategoryType');
//         $routes->get('inventory-add-color', 'HansaPageController::inventory_AddColor');
//         $routes->get('inventory-add-product', 'HansaPageController::inventory_AddProduct');
//         $routes->get('inventory-list-products', 'HansaPageController::inventory_ListProducts');
//         $routes->get('inventory-edit-product', 'HansaPageController::inventory_EditProduct');
//         $routes->get('inventory-product-detail', 'HansaPageController::inventory_ProductDetail');

//         // Stock Admin routes
//         $routes->get('stock-dashboard', 'HansaPageController::stock_dashboard');
//         $routes->get('stock-products', 'HansaPageController::stock_Products');

//         // Finance routes (potential duplicates, ensure correctness)
//         $routes->get('finance-dashboard', 'HansaPageController::finance_dashboard');
//         $routes->get('finance-products', 'HansaPageController::finance_Products');
//     });
//     // Hansa Old Design Routes End ----------------------------------------------------------------------------------------------------------

//     // Theme Design Samples Start -----------------------------------------------------------------------------------------------------------
//     $routes->get('/theme', 'Home::index');

//     // Language
//     $routes->get('/lang/{locale}', 'Language::index');

//     $routes->get('index-2', 'Home::show_index_2');

//     // Vertical Layout Pages Routes
//     $routes->get('layouts-compact-sidebar', 'Home::show_layouts_compact_sidebar');
//     $routes->get('layouts-icon-sidebar', 'Home::show_layouts_icon_sidebar');
//     $routes->get('layouts-boxed', 'Home::show_layouts_boxed');
//     $routes->get('layouts-preloader', 'Home::show_layouts_preloader');

//     // Horizontal Layout Pages Routes
//     $routes->get('layouts-horizontal', 'Home::show_layouts_horizontal');
//     $routes->get('layouts-hori-topbarlight', 'Home::show_layouts_hori_topbarlight');
//     $routes->get('layouts-hori-boxed', 'Home::show_layouts_hori_boxed');
//     $routes->get('layouts-hori-preloader', 'Home::show_layouts_hori_preloader');

//     // Calender
//     $routes->get('calendar', 'Home::show_calendar');

//     // Email
//     $routes->get('email-inbox', 'Home::show_email_inbox');
//     $routes->get('email-read', 'Home::show_email_read');

//     // Tasks
//     $routes->get('tasks-list', 'Home::show_tasks_list');
//     $routes->get('tasks-kanban', 'Home::show_tasks_kanban');
//     $routes->get('tasks-create', 'Home::show_tasks_create');

//     // Pages
//     $routes->get('pages-login', 'Home::show_pages_login');
//     $routes->get('pages-register', 'Home::show_pages_register');
//     $routes->get('pages-recoverpw', 'Home::show_pages_recoverpw');
//     $routes->get('pages-lock-screen', 'Home::show_pages_lock_screen');
//     $routes->get('pages-starter', 'Home::show_pages_starter');
//     $routes->get('pages-invoice', 'Home::show_pages_invoice');
//     $routes->get('pages-profile', 'Home::show_pages_profile');
//     $routes->get('pages-maintenance', 'Home::show_pages_maintenance');
//     $routes->get('pages-comingsoon', 'Home::show_pages_comingsoon');
//     $routes->get('pages-timeline', 'Home::show_pages_timeline');
//     $routes->get('pages-faqs', 'Home::show_pages_faqs');
//     $routes->get('pages-pricing', 'Home::show_pages_pricing');
//     $routes->get('pages-404', 'Home::show_pages_404');
//     $routes->get('pages-500', 'Home::show_pages_500');

//     // UI Elements
//     $routes->get('ui-alerts', 'Home::show_ui_alerts');
//     $routes->get('ui-buttons', 'Home::show_ui_buttons');
//     $routes->get('ui-cards', 'Home::show_ui_cards');
//     $routes->get('ui-carousel', 'Home::show_ui_carousel');
//     $routes->get('ui-dropdowns', 'Home::show_ui_dropdowns');
//     $routes->get('ui-grid', 'Home::show_ui_grid');
//     $routes->get('ui-images', 'Home::show_ui_images');
//     $routes->get('ui-lightbox', 'Home::show_ui_lightbox');
//     $routes->get('ui-modals', 'Home::show_ui_modals');
//     $routes->get('ui-rangeslider', 'Home::show_ui_rangeslider');
//     $routes->get('ui-session-timeout', 'Home::show_ui_session_timeout');
//     $routes->get('ui-progressbars', 'Home::show_ui_progressbars');
//     $routes->get('ui-sweet-alert', 'Home::show_ui_sweet_alert');
//     $routes->get('ui-tabs-accordions', 'Home::show_ui_tabs_accordions');
//     $routes->get('ui-typography', 'Home::show_ui_typography');
//     $routes->get('ui-video', 'Home::show_ui_video');
//     $routes->get('ui-general', 'Home::show_ui_general');
//     $routes->get('ui-colors', 'Home::show_ui_colors');
//     $routes->get('ui-rating', 'Home::show_ui_rating');

//     // Forms
//     $routes->get('form-elements', 'Home::show_form_elements');
//     $routes->get('form-validation', 'Home::show_form_validation');
//     $routes->get('form-advanced', 'Home::show_form_advanced');
//     $routes->get('form-editors', 'Home::show_form_editors');
//     $routes->get('form-uploads', 'Home::show_form_uploads');
//     $routes->get('form-xeditable', 'Home::show_form_xeditable');
//     $routes->get('form-repeater', 'Home::show_form_repeater');
//     $routes->get('form-wizard', 'Home::show_form_wizard');
//     $routes->get('form-mask', 'Home::show_form_mask');

//     // Tables
//     $routes->get('tables-basic', 'Home::show_tables_basic');
//     $routes->get('tables-datatable', 'Home::show_tables_datatable');
//     $routes->get('tables-responsive', 'Home::show_tables_responsive');
//     $routes->get('tables-editable', 'Home::show_tables_editable');

//     // Charts
//     $routes->get('charts-apex', 'Home::show_charts_apex');
//     $routes->get('charts-chartjs', 'Home::show_charts_chartjs');
//     $routes->get('charts-flot', 'Home::show_charts_flot');
//     $routes->get('charts-knob', 'Home::show_charts_knob');
//     $routes->get('charts-sparkline', 'Home::show_charts_sparkline');

//     // Icons
//     $routes->get('icons-boxicons', 'Home::show_icons_boxicons');
//     $routes->get('icons-materialdesign', 'Home::show_icons_materialdesign');
//     $routes->get('icons-dripicons', 'Home::show_icons_dripicons');
//     $routes->get('icons-fontawesome', 'Home::show_icons_fontawesome');

//     // Maps
//     $routes->get('maps-google', 'Home::show_maps_google');
//     $routes->get('maps-vector', 'Home::show_maps_vector');

//     // Client accoding pages
//     $routes->get('vendor-list', 'Client::vendor');
//     $routes->get('media-type', 'Client::media_type');

//     // Theme Design Samples End -----------------------------------------------------------------------------------------------------------
// }
