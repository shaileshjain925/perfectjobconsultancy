<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Traits\CommonTraits;
use UserType;

class AdminPageController extends BaseController
{
    use CommonTraits;
    public function default_dashboard()
    {
        switch ($_SESSION['user_type']) {
            case UserType::Admin->value:
                return $this->admin_dashboard();
                break;
            case UserType::Purchase->value:
                return $this->purchase_dashboard();
                break;
            case UserType::Finance->value:
                return $this->finance_dashboard();
                break;
            case UserType::Order:
                return $this->order_dashboard();
                break;
            case UserType::Delivery->value:
                return $this->delivery_dashboard();
                break;
            case UserType::Stock->value:
                return $this->stock_dashboard();
                break;
        }
        return $this->admin_dashboard();
    }
    public function admin_dashboard()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Admin Dashboard';
        $theme_data['_page_title'] = 'Admin Dashboard';
        $theme_data['_breadcrumb1'] = 'Dashboard';
        $theme_data['_breadcrumb2'] = 'Admin Dashboard';
        $theme_data['_script_files'][] = $theme_data['_assets_path'] . 'assets/js/pages/dashboard.init.js';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Dashboard/admin_dashboard';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function purchase_dashboard()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Purchase Dashboard';
        $theme_data['_page_title'] = 'Purchase Dashboard';
        $theme_data['_breadcrumb1'] = 'Dashboard';
        $theme_data['_breadcrumb2'] = 'Admin Dashboard';
        $theme_data['_script_files'][] = $theme_data['_assets_path'] . 'assets/js/pages/dashboard.init.js';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Dashboard/purchase_dashboard';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function finance_dashboard()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Finance Dashboard';
        $theme_data['_page_title'] = 'Finance Dashboard';
        $theme_data['_breadcrumb1'] = 'Dashboard';
        $theme_data['_breadcrumb2'] = 'Finance Dashboard';
        $theme_data['_script_files'][] = $theme_data['_assets_path'] . 'assets/js/pages/dashboard.init.js';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Dashboard/finance_dashboard';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function order_dashboard()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Order Dashboard';
        $theme_data['_page_title'] = 'Order Dashboard';
        $theme_data['_breadcrumb1'] = 'Dashboard';
        $theme_data['_breadcrumb2'] = 'Order Dashboard';
        $theme_data['_script_files'][] = $theme_data['_assets_path'] . 'assets/js/pages/dashboard.init.js';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Dashboard/order_dashboard';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function delivery_dashboard()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'delivery Dashboard';
        $theme_data['_page_title'] = 'delivery Dashboard';
        $theme_data['_breadcrumb1'] = 'Dashboard';
        $theme_data['_breadcrumb2'] = 'delivery Dashboard';
        $theme_data['_script_files'][] = $theme_data['_assets_path'] . 'assets/js/pages/dashboard.init.js';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Dashboard/delivery_dashboard';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function stock_dashboard()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Stock Dashboard';
        $theme_data['_page_title'] = 'Stock Dashboard';
        $theme_data['_breadcrumb1'] = 'Dashboard';
        $theme_data['_breadcrumb2'] = 'Stock Dashboard';
        $theme_data['_script_files'][] = $theme_data['_assets_path'] . 'assets/js/pages/dashboard.init.js';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Dashboard/stock_dashboard';
        return view('AdminPanelNew/partials/main', $theme_data);
    }

    public function role_user_list()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Role User';
        $theme_data['_page_title'] = 'Role User';
        $theme_data['_breadcrumb1'] = 'Admin';
        $theme_data['_breadcrumb2'] = 'Role User';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/role_user_list';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function UserRoleCreateUpdateComponent($user_id = null)
    {
        $data = [];
        if (!empty($user_id)) {
            $user_data = $this->getUserModel()->RecordGet($user_id);
            $data = array_merge($user_data['data'], ['ApiUrl' => base_url(route_to('user_update_api'))]);
        } else {
            $data = array_merge(['ApiUrl' => base_url(route_to('user_create_api'))]);
        }
        return view("AdminPanelNew/components/UserRoleCreateUpdate", $data);
    }
    public function category_type_list()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Category Type';
        $theme_data['_page_title'] = 'Category Type';
        $theme_data['_breadcrumb1'] = 'Inventory';
        $theme_data['_breadcrumb2'] = 'Category Type';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Inventory/category_type_list';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function CategoryTypeCreateUpdate($category_type_id  = null)
    {
        $data = [];
        if (!empty($category_type_id)) {
            $CategoryType_data = $this->getCategoryTypeModel()->RecordGet($category_type_id);
            $data = array_merge($CategoryType_data['data'], ['ApiUrl' => base_url(route_to('categoryType_update_api'))]);
        } else {
            $data = array_merge(['ApiUrl' => base_url(route_to('categoryType_create_api'))]);
        }
        return view("AdminPanelNew/components/CategoryTypeCreateUpdate", $data);
    }

    public function brand_list()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Brand';
        $theme_data['_page_title'] = 'Brand';
        $theme_data['_breadcrumb1'] = 'Inventory';
        $theme_data['_breadcrumb2'] = 'Brand';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Inventory/brand_list';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function BrandCreateUpdate($brand_id  = null)
    {
        $data = [];
        if (!empty($brand_id)) {
            $CategoryType_data = $this->getBrandModel()->RecordGet($brand_id);
            $data = array_merge($CategoryType_data['data'], ['ApiUrl' => base_url(route_to('brand_update_api'))]);
        } else {
            $data = array_merge(['ApiUrl' => base_url(route_to('brand_create_api'))]);
        }
        return view("AdminPanelNew/components/BrandCreateUpdate", $data);
    }

    public function CategoryCreateUpdate($category_id  = null)
    {
        $data = [];
        if (!empty($category_id)) {
            $Category_data = $this->getCategoryModel()->RecordGet($category_id);
            $data = array_merge($Category_data['data'], ['ApiUrl' => base_url(route_to('category_update_api'))]);
        } else {
            $data = array_merge(['ApiUrl' => base_url(route_to('category_create_api'))]);
        }
        return view("AdminPanelNew/components/CategoryCreateUpdate", $data);
    }

    public function fabricCreateUpdate($fabric_id  = null)
    {
        $data = [];
        if (!empty($fabric_id)) {
            $Fabric_data = $this->getFabricModel()->RecordGet($fabric_id);
            $data = array_merge($Fabric_data['data'], ['ApiUrl' => base_url(route_to('fabric_update_api'))]);
        } else {
            $data = array_merge(['ApiUrl' => base_url(route_to('fabric_create_api'))]);
        }
        return view("AdminPanelNew/components/fabricCreateUpdate", $data);
    }

    public function PatternCreateUpdate($pattern_id  = null)
    {
        $data = [];
        if (!empty($pattern_id)) {
            $Pattern_data = $this->getFabricModel()->RecordGet($pattern_id);
            $data = array_merge($Pattern_data['data'], ['ApiUrl' => base_url(route_to('pattern_update_api'))]);
        } else {
            $data = array_merge(['ApiUrl' => base_url(route_to('pattern_create_api'))]);
        }
        return view("AdminPanelNew/components/PatternCreateUpdate", $data);
    }

    public function sizeCreateUpdate($size_id  = null)
    {
        $data = [];
        if (!empty($size_id)) {
            $Size_data = $this->getSizeModel()->RecordGet($size_id);
            $data = array_merge($Size_data['data'], ['ApiUrl' => base_url(route_to('size_update_api'))]);
        } else {
            $data = array_merge(['ApiUrl' => base_url(route_to('size_create_api'))]);
        }
        return view("AdminPanelNew/components/sizeCreateUpdate", $data);
    }

    public function customer_list()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Customer';
        $theme_data['_page_title'] = 'Customer List';
        $theme_data['_breadcrumb1'] = 'Admin';
        $theme_data['_breadcrumb2'] = 'Customer List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/customer_list';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function add_deal_of_the_day()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Deal of the day';
        $theme_data['_page_title'] = 'Deal of the day';
        $theme_data['_breadcrumb1'] = 'Admin';
        $theme_data['_breadcrumb2'] = 'Deal of the day';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/add_deal_of_the_day';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function company_setup()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Customer';
        $theme_data['_page_title'] = 'Customer List';
        $theme_data['_breadcrumb1'] = 'Admin';
        $theme_data['_breadcrumb2'] = 'Customer List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/Company/company_setup';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    // Inventory 
    public function category_list()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Category';
        $theme_data['_page_title'] = 'Category';
        $theme_data['_breadcrumb1'] = 'Inventory';
        $theme_data['_breadcrumb2'] = 'Category';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Inventory/category_list';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function fabric_list()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Fabric';
        $theme_data['_page_title'] = 'Fabric';
        $theme_data['_breadcrumb1'] = 'Inventory';
        $theme_data['_breadcrumb2'] = 'Fabric';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Inventory/fabric_list';
        return view('AdminPanelNew/partials/main', $theme_data);
    }

    public function size_list()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Size';
        $theme_data['_page_title'] = 'Size';
        $theme_data['_breadcrumb1'] = 'Inventory';
        $theme_data['_breadcrumb2'] = 'Size';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Inventory/size_list';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function pattern_list()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Pattern';
        $theme_data['_page_title'] = 'Pattern';
        $theme_data['_breadcrumb1'] = 'Inventory';
        $theme_data['_breadcrumb2'] = 'Pattern';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Inventory/pattern_list';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function product_manage()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Product Management';
        $theme_data['_page_title'] = 'Product Management';
        $theme_data['_breadcrumb1'] = 'Inventory';
        $theme_data['_breadcrumb2'] = 'Product Management';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Inventory/product_manage';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function product_create_update($product_id  = null)
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = ($product_id == null) ? "Product Create" : "Product Update";
        $theme_data['_page_title'] = ($product_id == null) ? "Product Create" : "Product Update";
        $theme_data['_breadcrumb1'] = 'Inventory';
        $theme_data['_breadcrumb2'] = ($product_id == null) ? "Product Create" : "Product Update";
        if (!empty($product_id)) {
            $Product_data = $this->getProductModel()->RecordGet($product_id);
            $theme_data = array_merge($theme_data, $Product_data['data'], ['ApiUrl' => base_url(route_to('product_update_api'))]);
        } else {
            $theme_data = array_merge($theme_data, ['ApiUrl' => base_url(route_to('product_create_api'))]);
        }
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Inventory/product_create_update';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function variant_create_update($product_id, $variant_id = null)
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data = array_merge($theme_data, ['product_id' => $product_id]);
        $theme_data = array_merge($theme_data, ['sizes' => []]);
        if (!empty($variant_id)) {
            $variant_data = $this->getProductVariantModel()->RecordGet($variant_id);
            $sizes_data = $this->getSizeVsVariantModel()->RecordList(['variant_id' => $variant_id]);
            if (!empty($sizes_data['data'])) {
                $sizes = ['sizes' => array_column($sizes_data['data'], 'size_id')];
                $theme_data = array_merge($theme_data, $sizes ?? []);
            }
            $theme_data = array_merge($theme_data, $variant_data['data']);
        } else {
            $theme_data = array_merge($theme_data);
        }
        $theme_data['_meta_title'] = ($variant_id == null) ? "Variant" : "Variant Update";
        $theme_data['_page_title'] = ($variant_id == null) ? "Variant" : "Variant Update";
        $theme_data['_breadcrumb1'] = 'Inventory';
        $theme_data['_breadcrumb2'] = ($variant_id == null) ? "Variant" : "Variant Update";
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Inventory/variant_create_update';
        return view('AdminPanelNew/partials/main', $theme_data);
    }

    public function variant_view_detail()
    {
        $variant_data = $this->getProductVariantModel()->find($_POST['variant_id']);
        return view('AdminPanelNew/pages/component/variant_view_detail', $variant_data);
    }
    public function variant_list($product_id, $variant_id = null)
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['product_data'] = $this->getProductModel()->find($product_id);
        $theme_data = array_merge($theme_data, ['product_id' => $product_id]);

        $theme_data['_meta_title'] = ($variant_id == null) ? "Products Variant" : "Variant Products";
        $theme_data['_page_title'] = 'Products Variant';
        $theme_data['_breadcrumb1'] = 'Inventory';
        $theme_data['_breadcrumb2'] = 'Products Variant';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Inventory/variant_products';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    // Order Management
    public function placed_order()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Placed Orders';
        $theme_data['_page_title'] = 'Placed Orders';
        $theme_data['_breadcrumb1'] = 'Orders';
        $theme_data['_breadcrumb2'] = 'Placed Orders';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Orders/placed_order';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function order_accepted()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Orders Accepted';
        $theme_data['_page_title'] = 'Orders Accepted';
        $theme_data['_breadcrumb1'] = 'Orders';
        $theme_data['_breadcrumb2'] = 'Orders Accepted';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Orders/order_accepted';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    // Deliery Order Managment
    public function delivery_orders()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Orders Delivery';
        $theme_data['_page_title'] = 'Orders Delivery';
        $theme_data['_breadcrumb1'] = 'Orders';
        $theme_data['_breadcrumb2'] = 'Orders Delivery';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Delivery/delivery_orders';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function order_shipped()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Shipped Orders';
        $theme_data['_page_title'] = 'Shipped Orders';
        $theme_data['_breadcrumb1'] = 'Orders';
        $theme_data['_breadcrumb2'] = 'Shipped Orders';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Delivery/order_shipped';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function order_deliverd()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Deliverd Orders';
        $theme_data['_page_title'] = 'Deliverd Orders';
        $theme_data['_breadcrumb1'] = 'Orders';
        $theme_data['_breadcrumb2'] = 'Deliverd Orders';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Delivery/order_deliverd';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function cancelled_order()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Cancelled Orders';
        $theme_data['_page_title'] = 'Cancelled Orders';
        $theme_data['_breadcrumb1'] = 'Orders';
        $theme_data['_breadcrumb2'] = 'Cancelled Orders';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Delivery/cancelled_order';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    // Stock Managmet
    public function products_list()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Product Lists';
        $theme_data['_page_title'] = 'Product Lists';
        $theme_data['_breadcrumb1'] = 'Stock Manage';
        $theme_data['_breadcrumb2'] = 'Product Lists';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Stock/products_list';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function add_update_stock($id = null)
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = ($id == null) ? "Stock" : "stock Update";
        $theme_data['_page_title'] = ($id == null) ? "Stock" : "stock Update";
        $theme_data['_breadcrumb1'] = 'Stock Manage';
        $theme_data['_breadcrumb2'] = ($id == null) ? "Stock Create" : "Stock Update";
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Stock/add_update_stock';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function add_stock()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Stock';
        $theme_data['_page_title'] = 'Stock';
        $theme_data['_breadcrumb1'] = 'Stock Manage';
        $theme_data['_breadcrumb2'] = 'Stock';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Stock/add_stock';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function FirebaseMessagingIntegration()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Firebase Messaging Integration';
        $theme_data['_page_title'] = 'Firebase Messaging Integration';
        $theme_data['_breadcrumb1'] = 'Admin';
        $theme_data['_breadcrumb2'] = 'Firebase Messaging Integration';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/Integration/FirebaseMessagingIntegration';

        $theme_data = array_merge($theme_data, $this->getFirebaseMessagingIntegrationModel()->first() ?? []);
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    protected function admin_panel_common_data(): array
    {
        $theme_data = [];
        $theme_data['_assets_path'] = 'AdminPanelNew/';
        $theme_data['_theme_path'] = 'AdminPanelNew/';
        $theme_data['_partials_path'] = $theme_data['_theme_path'] . 'partials/';

        $theme_data['_meta_title'] = '';
        $theme_data['_page_title'] = '';
        $theme_data['_breadcrumb1'] = '';
        $theme_data['_breadcrumb2'] = '';
        // Css
        $theme_data['_head_css_code'] = "";
        $theme_data['_head_css_files'][] = $theme_data['_assets_path'] . 'assets/css/style.css';
        // Pre Script
        $theme_data['_head_js_code'] = "const base_url = '" . base_url() . "'";
        $theme_data['_head_js_files'][] = $theme_data['_assets_path'] . 'assets/js/pre-script.js';
        // Post Script
        $theme_data['_script_files'][] = $theme_data['_assets_path'] . 'assets/js/script.js';
        $theme_data['_script_files'][] = $theme_data['_assets_path'] . 'assets/js/comman.js';
        $theme_data['_script_js_code'] = "";
        $theme_data['_view_files'] = [];

        // Sidebar
        $theme_data['_user_name'] = $_SESSION['fullname'];
        $theme_data['_user_id'] = '1';
        $theme_data['_user_image_url'] = 'assets/images/users/avatar-2.jpg';
        $theme_data['_role_name'] = ucfirst($_SESSION['user_type']);
        $theme_data['_role_id'] = '1';
        $theme_data['_menus'] = $this->getSiteBarMenus();
        $theme_data['_FirebaseMessagingNotification'] = $this->getFirebaseMessagingIntegrationModel()->first() ?? [];
        return $theme_data;
    }
    protected function getSiteBarMenus()
    {
        $menuArray = [
            [
                "module_title" => "Files.Dashboard",
                "module_name" => "module1",
                "module_icon" => "mdi mdi-airplay",
                "visibility" => true,
                "menus" => [
                    [
                        "title" => "Admin Dashboard",
                        "url" => base_url(route_to('admin_dashboard')),
                        "badge_count" => 0,
                        "visibility" => ($_SESSION['user_type'] == 'admin') ? true : false,
                    ],
                    [
                        "title" => "Order Dashboard",
                        "url" => base_url(route_to('order_dashboard')),
                        "badge_count" => 0,
                        "visibility" => ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'order') ? true : false,
                    ],
                    [
                        "title" => "Finance Dashboard",
                        "url" => base_url(route_to('financial_dashboard')),
                        "badge_count" => 0,
                        "visibility" => ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'finance') ? true : false,
                    ],
                    [
                        "title" => "Stock Dashboard",
                        "url" => base_url(route_to('stock_dashboard')),
                        "badge_count" => 0,
                        "visibility" => ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'stock') ? true : false,
                    ],
                    [
                        "title" => "Delivery Dashboard",
                        "url" => base_url(route_to('delivery_dashboard')),
                        "badge_count" => 0,
                        "visibility" => ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'delivery') ? true : false,
                    ],
                ]
            ],
            [
                "module_title" => "Files.Admin",
                "module_name" => "Administrator",
                "module_icon" => "mdi mdi-account-supervisor-outline",
                "visibility" => ($_SESSION['user_type'] == 'admin') ? true : false,
                "menus" => [
                    [
                        "title" => "Users Role",
                        "url" => base_url(route_to('role_user_list')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Customer",
                        "url" => base_url(route_to('customer_list')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Deal Of The Day",
                        "url" => base_url(route_to('add_deal_of_the_day')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Files.Company_Setup",
                        "url" => "javascript: void(0);",
                        "badge_count" => 0,
                        "visibility" => true,
                        "sub_menus" => [
                            [
                                "title" => "Company Website",
                                "url" => base_url(route_to('company_setup')),
                                "badge_count" => 0,
                                "visibility" => true,
                            ],
                            [
                                "title" => "Files.Ecommerce_Setup",
                                "url" => "javascript: void(0);",
                                "badge_count" => 0,
                                "visibility" => true,
                            ]
                        ]
                    ],
                    [
                        "title" => "Files.Third_Party_Integration",
                        "url" => "javascript: void(0);",
                        "badge_count" => 0,
                        "visibility" => true,
                        "sub_menus" => [
                            [
                                "title" => "Files.Email",
                                "url" => "javascript: void(0);",
                                "badge_count" => 0,
                                "visibility" => true,
                            ],
                            [
                                "title" => "Files.SMS",
                                "url" => "javascript: void(0);",
                                "badge_count" => 0,
                                "visibility" => true,
                            ],
                            [
                                "title" => "Firebase Messaging Notification",
                                "url" => base_url(route_to('notification_integration')),
                                "badge_count" => 0,
                                "visibility" => true,
                            ],
                            [
                                "title" => "Files.PaymentGateWay",
                                "url" => "javascript: void(0);",
                                "badge_count" => 0,
                                "visibility" => true,
                            ],
                            [
                                "title" => "Files.OAuth2",
                                "url" => "javascript: void(0);",
                                "badge_count" => 0,
                                "visibility" => true,
                            ]
                        ]
                    ]

                ]
            ],
            [
                "module_title" => "Inventory",
                "module_name" => "Administrator",
                "module_icon" => "mdi mdi-note-text-outline",
                "visibility" => true,
                "menus" => [
                    [
                        "title" => "Brand",
                        "url" => base_url(route_to('brand_list')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Category Type",
                        "url" => base_url(route_to('category_type_list')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Category",
                        "url" => base_url(route_to('category_list')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Fabric",
                        "url" => base_url(route_to('fabric_list')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Pattern",
                        "url" => base_url(route_to('pattern_list')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Size",
                        "url" => base_url(route_to('size_list')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Product Managment",
                        "url" => base_url(route_to('product_manage')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                ]
            ],
            [
                "module_title" => "Orders Management",
                "module_name" => "Administrator",
                "module_icon" => "mdi mdi-note-text-outline",
                "visibility" => true,
                "menus" => [
                    [
                        "title" => "Placed Orders",
                        "url" => base_url(route_to('placed_order')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Accepted Orders",
                        "url" => base_url(route_to('order_accepted')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                ]
            ],
            [
                "module_title" => "Delivery Management",
                "module_name" => "Administrator",
                "module_icon" => "mdi mdi-note-text-outline",
                "visibility" => true,
                "menus" => [
                    [
                        "title" => "Delivery Orders",
                        "url" => base_url(route_to('delivery_orders')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Shipped Orders",
                        "url" => base_url(route_to('order_shipped')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Deliverd Orders",
                        "url" => base_url(route_to('order_deliverd')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Cancelled Orders",
                        "url" => base_url(route_to('cancelled_order')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ]
                ]
            ],
            [
                "module_title" => "Stock Management",
                "module_name" => "Administrator",
                "module_icon" => "mdi mdi-note-text-outline",
                "visibility" => true,
                "menus" => [
                    [
                        "title" => "Products List",
                        "url" => base_url(route_to('products_list')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Stock",
                        "url" => base_url(route_to('add_stock')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ]
                ]
            ]
        ];
        return $menuArray;
    }
}
