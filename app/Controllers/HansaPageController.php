<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class HansaPageController extends BaseController
{
    public function dashboard()
    {

        // $data = $this->getCityModel()->select($this->getCityModel()->getTable().".*")->autoJoin(false)->findAll();
        // dd($data);
        $data = $this->common_client_panel_data();
        $data['ViewFilePath'] = "AdminPanel/Pages/dashboard";
        $data['ViewFileData'] = [];
        return view("AdminPanel/Pages/main", $data);
    }
    public function login()
    {
        $data = $this->common_client_panel_data();
        $data['ViewFileData'] = [];
        return view("AdminPanel/Pages/login", $data);
    }
    public function user()
    {
        $data = $this->common_client_panel_data();
        $data['ViewFilePath'] = "AdminPanel/Pages/user-list";
        $data['ViewFileData'] = [];
        return view("AdminPanel/Pages/main", $data);
    }
    public function all_orders()
    {
        $data = $this->common_client_panel_data();
        $data['ViewFilePath'] = "AdminPanel/Pages/all-orders";
        $data['ViewFileData'] = [];
        return view("AdminPanel/Pages/main", $data);
    }
    public function order_detail()
    {
        $data = $this->common_client_panel_data();
        $data['ViewFilePath'] = "AdminPanel/Pages/order-detail";
        $data['ViewFileData'] = [];
        return view("AdminPanel/Pages/main", $data);
    }
    public function add_dealoftheday()
    {
        $data = $this->common_client_panel_data();
        $data['ViewFilePath'] = "AdminPanel/Pages/add-dealoftheday";
        $data['ViewFileData'] = [];
        return view("AdminPanel/Pages/main", $data);
    }
    public function add_offer()
    {
        $data = $this->common_client_panel_data();
        $data['ViewFilePath'] = "AdminPanel/Pages/add-offer";
        $data['ViewFileData'] = [];
        return view("AdminPanel/Pages/main", $data);
    }
    public function enquiry_list()
    {
        $data = $this->common_client_panel_data();
        $data['ViewFilePath'] = "AdminPanel/Pages/enquiry-list";
        $data['ViewFileData'] = [];
        return view("AdminPanel/Pages/main", $data);
    }
    public function Invoice()
    {
        $data = $this->common_client_panel_data();
        $data['ViewFilePath'] = "AdminPanel/Pages/invoice";
        $data['ViewFileData'] = [];
        return view("AdminPanel/Pages/main", $data);
    }
    public function invoice_print()
    {
        $data = $this->common_client_panel_data();
        $data['ViewFilePath'] = "AdminPanel/Pages/invoice-print";
        $data['ViewFileData'] = [];
        return view("AdminPanel/Pages/main", $data);
    }
    public function Generate_bill()
    {
        $data = $this->common_client_panel_data();
        $data['ViewFilePath'] = "AdminPanel/Pages/generate-bill";
        $data['ViewFileData'] = [];
        return view("AdminPanel/Pages/main", $data);
    }
    public function user_list()
    {
        $data = $this->common_client_panel_data();
        $data['ViewFilePath'] = "AdminPanel/Pages/user-list";
        $data['ViewFileData'] = [];
        return view("AdminPanel/Pages/main", $data);
    }
    public function user_order_history()
    {
        $data = $this->common_client_panel_data();
        $data['ViewFilePath'] = "AdminPanel/Pages/user-order-history";
        $data['ViewFileData'] = [];
        return view("AdminPanel/Pages/main", $data);
    }


    //  Delivery Admin Controller
    public function delivery_dashboard()
    {
        $data = $this->common_client_panel_data();
        $data['ViewFilePath'] = "AdminPanel/Pages/DeliveryAdmindashboard";
        $data['ViewFileData'] = [];
        return view("AdminPanel/Pages/main", $data);
    }
    public function delivery_all_orders()
    {
        $data = $this->common_client_panel_data();
        $data['ViewFilePath'] = "AdminPanel/Pages/DeliveryAdminall_orders";
        $data['ViewFileData'] = [];
        return view("AdminPanel/Pages/main", $data);
    }
    public function delivery_order_shipped()
    {
        $data = $this->common_client_panel_data();
        $data['ViewFilePath'] = "AdminPanel/Pages/DeliveryAdminorder_shipped";
        $data['ViewFileData'] = [];
        return view("AdminPanel/Pages/main", $data);
    }
    public function delivery_order_deliverd()
    {
        $data = $this->common_client_panel_data();
        $data['ViewFilePath'] = "AdminPanel/Pages/DeliveryAdminorder-deliverd";
        $data['ViewFileData'] = [];
        return view("AdminPanel/Pages/main", $data);
    }
    public function delivery_order_cancelled()
    {
        $data = $this->common_client_panel_data();
        $data['ViewFilePath'] = "AdminPanel/Pages/DeliveryAdminorder-cancelled";
        $data['ViewFileData'] = [];
        return view("AdminPanel/Pages/main", $data);
    }

    // Financial

    public function financial_dashboard()
    {
        $data = $this->common_client_panel_data();
        $data['ViewFilePath'] = "AdminPanel/Pages/FinancialAdmin/dashboard";
        $data['ViewFileData'] = [];
        return view("AdminPanel/Pages/main", $data);
    }
    public function financial_Products()
    {
        $data = $this->common_client_panel_data();
        $data['ViewFilePath'] = "AdminPanel/Pages/FinancialAdmin/Products";
        $data['ViewFileData'] = [];
        return view("AdminPanel/Pages/main", $data);
    }
    // Inventory
    public function inventory_dashboard()
    {
        $data = $this->common_client_panel_data();
        $data['ViewFilePath'] = "AdminPanel/Pages/InventoryAdmin/dashboard";
        $data['ViewFileData'] = [];
        return view("AdminPanel/Pages/main", $data);
    }
    public function inventory_add_category()
    {
        $data = $this->common_client_panel_data();
        $data['ViewFilePath'] = "AdminPanel/Pages/InventoryAdmin/add_category";
        $data['ViewFileData'] = [];
        return view("AdminPanel/Pages/main", $data);
    }
    public function inventory_AddCategoryType()
    {
        $data = $this->common_client_panel_data();
        $data['ViewFilePath'] = "AdminPanel/Pages/InventoryAdmin/AddCategoryType";
        $data['ViewFileData'] = [];
        return view("AdminPanel/Pages/main", $data);
    }
    public function inventory_AddColor()
    {
        $data = $this->common_client_panel_data();
        $data['ViewFilePath'] = "AdminPanel/Pages/InventoryAdmin/AddColor";
        $data['ViewFileData'] = [];
        return view("AdminPanel/Pages/main", $data);
    }
    public function inventory_AddProduct()
    {
        $data = $this->common_client_panel_data();
        $data['ViewFilePath'] = "AdminPanel/Pages/InventoryAdmin/AddProduct";
        $data['ViewFileData'] = [];
        return view("AdminPanel/Pages/main", $data);
    }
    public function inventory_ListProducts()
    {
        $data = $this->common_client_panel_data();
        $data['ViewFilePath'] = "AdminPanel/Pages/InventoryAdmin/ListProducts";
        $data['ViewFileData'] = [];
        return view("AdminPanel/Pages/main", $data);
    }
    public function inventory_EditProduct()
    {
        $data = $this->common_client_panel_data();
        $data['ViewFilePath'] = "AdminPanel/Pages/InventoryAdmin/EditProduct";
        $data['ViewFileData'] = [];
        return view("AdminPanel/Pages/main", $data);
    }
    public function inventory_ProductDetail()
    {
        $data = $this->common_client_panel_data();
        $data['ViewFilePath'] = "AdminPanel/Pages/InventoryAdmin/ProductDetail";
        $data['ViewFileData'] = [];
        return view("AdminPanel/Pages/main", $data);
    }

    // Stock
    public function stock_dashboard()
    {
        $data = $this->common_client_panel_data();
        $data['ViewFilePath'] = "AdminPanel/Pages/StockAdmin/dashboard";
        $data['ViewFileData'] = [];
        return view("AdminPanel/Pages/main", $data);
    }
    public function stock_Products()
    {
        $data = $this->common_client_panel_data();
        $data['ViewFilePath'] = "AdminPanel/Pages/StockAdmin/Products";
        $data['ViewFileData'] = [];
        return view("AdminPanel/Pages/main", $data);
    }

    public function finance_dashboard()
    {
        $data = $this->common_client_panel_data();
        $data['ViewFilePath'] = "AdminPanel/Pages/FinancialAdmin/dashboard";
        $data['ViewFileData'] = [];
        return view("ClientPanel/Pages/main", $data);
    }
    public function finance_Products()
    {
        $data = $this->common_client_panel_data();
        $data['ViewFilePath'] = "AdminPanel/Pages/FinancialAdmin/Products";
        $data['ViewFileData'] = [];
        return view("ClientPanel/Pages/main", $data);
    }
    protected function common_client_panel_data(): array
    {
        $data = [];
        $data["html_language"] = "en";


        // head data
        $head = [];
        $head["meta_keywords"] = "";
        $head['meta_description'] = '';
        $head["title"] = "en";
        $head["meta_aurthor"] = "Adesh Jain";
        $head["page_wise_css_files_path"] = [];
        $head["custom_style"] = "";;
        $data["head"] = $head;
        $navbar = [];

        // Nav Bar Data
        $data["navbar"] = $navbar;
        $leftsidebar = [];
        $data["leftsidebar"] = $leftsidebar;

        // Main Content Data
        $data["ViewFilePath"] = "app/Views/errors/html/error_404";
        $ViewFileData = [];
        $data["ViewFileData"] = $ViewFileData;

        // Right Side Bar Data
        $rightsidebar = [];
        $data["rightsidebar"] = $rightsidebar;

        // Footer Data
        $footer = [];
        $data["footer"] = $footer;

        $script = [];
        $script["custom_footer_script_before"] = "var base_url = '" . base_url() . "';
        ";
        $script["page_wise_js_files_path"] = [];
        $script["after_document_ready_script"] = "console.log(base_url);
        ";
        $data["script"] = $script;
        return $data;
    }
}
