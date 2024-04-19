<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use ApiResponseStatusCode;

class PageController extends BaseController
{
    public function dashboard()
    {
        $theme_data = $this->common_admin_theme();
        $theme_data['head_data']['title'] = 'Dashboard';
        return view('Views/PerfectJobConsultancy/partials/main', $theme_data);
    }

    // public function CompanyUserList()
    // {
    //     $theme_data = $this->common_admin_theme();
    //     $theme_data[ 'head_data' ][ 'title' ] = 'User Master List';
    //     $theme_data[ 'view' ] = 'Views/PerfectJobConsultancy/pages/CompanyUser/CompanyUserList';
    //     $theme_data['CreatePageUrl'] = base_url(route_to('companyusercreate'));
    //     $theme_data[ 'after_body_content' ][ 'script_file_links' ][] = 'assets/pages/CompanyUser/CompanyUserList.js';
    //     $theme_data[ 'after_body_content' ][ 'script_file_links' ][] = 'assets/js/DeleteRow.js';
    //     return view( 'Views/PerfectJobConsultancy/partials/main', $theme_data );
    // }

    public function CompanySetupCreateUpdate()
    {
        try {
            $prefill_data = [];
            $result = $this->getBssWebsiteProfileModel()->first();
            if (!empty($result)) {
                $prefill_data = $result;
            }
            $theme_data = $this->common_admin_theme();
            $theme_data['head_data']['title'] = 'Company Setup';
            $theme_data['view'] = 'Views/PerfectJobConsultancy/pages/WebsiteSetup/WebsiteSetupUpdate';
            $theme_data  = array_merge($theme_data, $prefill_data);
            $theme_data['after_body_content']['script_file_links'][] = 'assets/js/FormCreateUpdate.js';
            // $theme_data['after_body_content']['script_file_links'][] = 'assets/pages/CompanyUser/CompanyUserCreateUpdate.js';
            return view('Views/PerfectJobConsultancy/partials/main', $theme_data);
        } catch (\Exception $e) {
            session()->setFlashdata('error', $e->getMessage());
        }
    }

    protected function common_admin_theme()
    {
        $userInfo = auth()->user();
        $userData = [];
        if ($userInfo) {
            $userData = [
                'username' => $userInfo->username,
                'first_name' => $userInfo->first_name,
                'last_name' => $userInfo->last_name,
                'email' => $userInfo->email,
                'mobile' => $userInfo->mobile_number,
                'profile_image' => base_url((!empty($userInfo->oauth_profile_image)) ? $userInfo->oauth_profile_image : 'uploads/usersProfileImage/demo.jpg')
            ];
        }
        $data = [
            'head_data' => [
                'title' => '',
                'site_name' => '',
                'meta_description' => '',
                'meta_author' => '',
                'meta_keyword' => '',
            ],
            'leftsidebar_data' => ['login_type' => 'admin'],
            'header_data' => ['user' => $userData],
            'view_string' => '',
            // 'view' =>'Views/PerfectJobConsultancy/partials/maincontent',
            // 'view_data' =>[],
            'footer_data' => [],
            'rightsidebar_data' => [],
            'after_body_content' => [
                'script_file_links' => [],
                'script_in_document_ready' => "
				var base_url = '" . base_url() . "';
				"
            ]
        ];
        return $data;
    }
}
