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
                return $this->recruiter_dashboard();
                break;
            case UserType::Finance->value:
                return $this->candidate_dashboard();
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
    public function recruiter_dashboard()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Recruiter Dashboard';
        $theme_data['_page_title'] = 'Recruiter Dashboard';
        $theme_data['_breadcrumb1'] = 'Dashboard';
        $theme_data['_breadcrumb2'] = 'Admin Dashboard';
        $theme_data['_script_files'][] = $theme_data['_assets_path'] . 'assets/js/pages/dashboard.init.js';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Dashboard/recruiter_dashboard';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function candidate_dashboard()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Candidate Dashboard';
        $theme_data['_page_title'] = 'Candidate Dashboard';
        $theme_data['_breadcrumb1'] = 'Dashboard';
        $theme_data['_breadcrumb2'] = 'Candidate Dashboard';
        $theme_data['_script_files'][] = $theme_data['_assets_path'] . 'assets/js/pages/dashboard.init.js';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Dashboard/candidate_dashboard';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function user_list()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'User';
        $theme_data['_page_title'] = 'User';
        $theme_data['_breadcrumb1'] = 'Admin';
        $theme_data['_breadcrumb2'] = 'User';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/user_list';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function recruiter_list()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Recruiter';
        $theme_data['_page_title'] = 'Recruiter';
        $theme_data['_breadcrumb1'] = 'Admin';
        $theme_data['_breadcrumb2'] = 'Recruiter';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/recruiter_list';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function candidate_list()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Candidate';
        $theme_data['_page_title'] = 'Candidate';
        $theme_data['_breadcrumb1'] = 'Admin';
        $theme_data['_breadcrumb2'] = 'Candidate';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/candidate_list';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function UserCreateUpdateComponent()
    {
        $data = getRequestData($this->request, 'ARRAY');
        switch ($data['user_type']) {
            case 'admin':
                $data['user_type_name'] = 'User';
                break;
            case 'recruiter':
                $data['user_type_name'] = 'Recruiter';
                break;
            case 'candidate':
                $data['user_type_name'] = 'Candidate';
                break;
        }
        if (!empty($data['user_id'])) {
            $user_data = $this->getUserModel()->RecordGet($data['user_id']);
            $data = array_merge($data, $user_data['data'], ['ApiUrl' => base_url(route_to('user_update_api'))]);
        } else {
            $data = array_merge($data, ['ApiUrl' => base_url(route_to('user_create_api'))]);
        }
        return view("AdminPanelNew/components/UserCreateUpdate", $data);
    }
    public function RecuriterProfileCreateUpdateComponent()
    {
        $data = getRequestData($this->request, 'ARRAY');
        if (!empty($data['recruiter_profile_id'])) {
            $user_data = $this->getRecruiterProfileModel()->RecordGet($data['recruiter_profile_id']);
            $data = array_merge($data, $user_data['data'], ['ApiUrl' => base_url(route_to('user_update_api'))]);
        } else {
            $data = array_merge($data, ['ApiUrl' => base_url(route_to('user_create_api'))]);
        }
        return view("AdminPanelNew/components/UserCreateUpdate", $data);
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
                        "title" => "Recruiter Dashboard",
                        "url" => base_url(route_to('recruiter_dashboard')),
                        "badge_count" => 0,
                        "visibility" => ($_SESSION['user_type'] == 'recruiter') ? true : false,
                    ],
                    [
                        "title" => "Candidate Dashboard",
                        "url" => base_url(route_to('candidate_dashboard')),
                        "badge_count" => 0,
                        "visibility" => ($_SESSION['user_type'] == 'candidate') ? true : false,
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
                        "title" => "Users",
                        "url" => base_url(route_to('user_list')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Recruiters",
                        "url" => base_url(route_to('recruiter_list')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Candidates",
                        "url" => base_url(route_to('candidate_list')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                ]
            ],
        ];
        return $menuArray;
    }
}
