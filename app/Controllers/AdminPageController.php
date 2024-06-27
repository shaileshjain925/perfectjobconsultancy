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
    public function recuriter_profile_create_update($user_id)
    {
        $theme_data = $this->admin_panel_common_data();
        $profile_data = $this->getRecruiterProfileModel()->where('user_id', $user_id)->first() ?? [];
        $theme_data['user_id'] = $user_id;
        $theme_data = array_merge($theme_data, $profile_data);
        $theme_data['_meta_title'] = 'Recuriter Profile ' . (empty($profile_data)) ? "Create" : "Update";
        $theme_data['_page_title'] = 'Recuriter Profile ' . (empty($profile_data)) ? "Create" : "Update";
        $theme_data['_breadcrumb1'] = 'Admin';
        $theme_data['_breadcrumb2'] = 'Recuriter Profile ' . (empty($profile_data)) ? "Create" : "Update";
        $theme_data['ApiUrl'] = (empty($profile_data)) ? base_url(route_to('recruiter_profile_create_api')) : base_url(route_to('recruiter_profile_update_api'));
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/recuriter_profile';
        $theme_data['_script_files'][] = $theme_data['_assets_path'] . 'assets/js/countrystatecity.js';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function RecuriterProfileView()
    {
        $data = getRequestData($this->request, 'ARRAY');
        if (!empty($data['user_id'])) {
            $user_data = $this->getUserModel()->RecruiterListWithProfileDetails(['user_id' => $data['user_id']]);
            return view("AdminPanelNew/components/RecuriterProfileView", $user_data['data'][0]);
        } else {
            return '';
        }
    }
    public function job_type_list()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Job Type';
        $theme_data['_page_title'] = 'Job Type';
        $theme_data['_breadcrumb1'] = 'Admin';
        $theme_data['_breadcrumb2'] = 'Job Type';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/job_type_list';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function JobTypeCreateUpdateComponent()
    {
        $data = getRequestData($this->request, 'ARRAY');
        if (!empty($data['job_type_id'])) {
            $user_data = $this->getJobTypeModel()->RecordGet($data['job_type_id']);
            $data = array_merge($data, $user_data['data'], ['ApiUrl' => base_url(route_to('job_type_update_api'))]);
        } else {
            $data = array_merge($data, ['ApiUrl' => base_url(route_to('job_type_create_api'))]);
        }
        return view("AdminPanelNew/components/JobTypeCreateUpdate", $data);
    }
    public function job_position_list()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Job Position';
        $theme_data['_page_title'] = 'Job Position';
        $theme_data['_breadcrumb1'] = 'Admin';
        $theme_data['_breadcrumb2'] = 'Job Position';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/job_position_list';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function JobPositionCreateUpdateComponent()
    {
        $data = getRequestData($this->request, 'ARRAY');
        if (!empty($data['job_position_id'])) {
            $user_data = $this->getJobPositionModel()->RecordGet($data['job_position_id']);
            $data = array_merge($data, $user_data['data'], ['ApiUrl' => base_url(route_to('job_position_update_api'))]);
        } else {
            $data = array_merge($data, ['ApiUrl' => base_url(route_to('job_position_create_api'))]);
        }
        return view("AdminPanelNew/components/JobPositionCreateUpdate", $data);
    }
    public function recruiter_job_post_list($recruiter_profile_id = null)
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['recruiter_profile_id'] = $recruiter_profile_id;
        if (!empty($recruiter_profile_id)) {
            $theme_data = array_merge($theme_data, $this->getRecruiterProfileModel()->find($recruiter_profile_id));
        }
        $theme_data['_meta_title'] = 'Job Post';
        $theme_data['_page_title'] = 'Job Post';
        $theme_data['_breadcrumb1'] = 'Admin';
        $theme_data['_breadcrumb2'] = 'Job Post';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/recruiter_job_post_list';
        return view('AdminPanelNew/partials/main', $theme_data);
    }

    public function recuriter_job_post_create_update($recruiter_profile_id, $job_post_id = null)
    {
        $theme_data = $this->admin_panel_common_data();
        $job_post_data = $this->getJobPostModel()->where('job_post_id', $job_post_id)->first() ?? [];
        $theme_data['recruiter_profile_id'] = $recruiter_profile_id;
        $theme_data = array_merge($theme_data, $job_post_data);
        $theme_data['_meta_title'] = 'Job Post ' . (empty($job_post_data)) ? "Create" : "Update";
        $theme_data['_page_title'] = 'Job Post ' . (empty($job_post_data)) ? "Create" : "Update";
        $theme_data['_breadcrumb1'] = 'Admin';
        $theme_data['_breadcrumb2'] = 'Job Post ' . (empty($job_post_data)) ? "Create" : "Update";
        $theme_data['ApiUrl'] = (empty($job_post_data)) ? base_url(route_to('job_post_create_api')) : base_url(route_to('job_post_update_api'));
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/job_post_create_update';
        $theme_data['_script_files'][] = $theme_data['_assets_path'] . 'assets/js/countrystatecity.js';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function job_post_create_update($job_post_id = null)
    {
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
                    [
                        "title" => "Job Type",
                        "url" => base_url(route_to('job_type_list')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Job Position",
                        "url" => base_url(route_to('job_position_list')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                ]
            ],
            [
                "module_title" => "Jobs",
                "module_name" => "Jobs",
                "module_icon" => "mdi mdi-account-supervisor-outline",
                "visibility" => ($_SESSION['user_type'] == 'admin') ? true : false,
                "menus" => [
                    [
                        "title" => "All Jobs Posted",
                        "url" => base_url(route_to('all_job_post')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                ]
            ],
        ];
        return $menuArray;
    }
}
