<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Traits\CommonTraits;

class AdminPageController extends BaseController
{
    use CommonTraits;
    public function default_dashboard()
    {
        return $this->admin_dashboard();
    }
    public function admin_dashboard()
    {
        $apicontroller = new AdminApiController();
        $countrylist = $apicontroller->CountryList();
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Admin Dashboard';
        $theme_data['_page_title'] = 'Admin Dashboard';
        $theme_data['_breadcrumb1'] = 'Dashboard';
        $theme_data['_breadcrumb2'] = 'Admin Dashboard';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Dashboard/admin_dashboard';
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
        $theme_data['_script_js_code'] = "";
        $theme_data['_view_files'] = [];

        // Sidebar
        $theme_data['_user_name'] = 'Shailesh Jain';
        $theme_data['_user_id'] = '1';
        $theme_data['_user_image_url'] = 'assets/images/users/avatar-2.jpg';
        $theme_data['_role_name'] = 'Admin';
        $theme_data['_role_id'] = '1';
        $theme_data['_menus'] = $this->getSiteBarMenus();
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
                        "url" => "javascript: void(0);",
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Sales Dashboard",
                        "url" => "javascript: void(0);",
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Finance Dashboard",
                        "url" => "javascript: void(0);",
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Stock Dashboard",
                        "url" => "javascript: void(0);",
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Delivery Dashboard",
                        "url" => "javascript: void(0);",
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                ]
            ],
            [
                "module_title" => "Files.Admin",
                "module_name" => "Administrator",
                "module_icon" => "mdi mdi-account-supervisor-outline",
                "visibility" => true,
                "menus" => [
                    [
                        "title" => "Files.Users",
                        "url" => "javascript: void(0);",
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Files.Roles",
                        "url" => "javascript: void(0);",
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Files.Module_Assign",
                        "url" => "javascript: void(0);",
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
                                "title" => "Files.Website_Setup",
                                "url" => "javascript: void(0);",
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
                                "title" => "Files.Notification",
                                "url" => "javascript: void(0);",
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
            ]
        ];
        return $menuArray;
    }
}
