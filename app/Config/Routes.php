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
            $routes->get('Recruiter', 'AdminPageController::recruiter_dashboard', ['as' => 'recruiter_dashboard']);
            $routes->get('Candidate', 'AdminPageController::candidate_dashboard', ['as' => 'candidate_dashboard']);
        });
        $routes->group('Admin', function ($routes) {
            $routes->get('UserList', 'AdminPageController::user_list', ['as' => 'user_list']);
            $routes->get('RecruiterList', 'AdminPageController::recruiter_list', ['as' => 'recruiter_list']);
            $routes->get('CandidateList', 'AdminPageController::candidate_list', ['as' => 'candidate_list']);
            $routes->post('UserCreateUpdateComponent', 'AdminPageController::UserCreateUpdateComponent', ['as' => 'UserCreateUpdateComponent']);
            $routes->post('RecuriterProfileCreateUpdateComponent', 'AdminPageController::RecuriterProfileCreateUpdateComponent', ['as' => 'RecuriterProfileCreateUpdateComponent']);
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
                $routes->post('RecruiterListWithProfileDetails', 'AdminApiController::RecruiterListWithProfileDetails', ['as' => 'RecruiterListWithProfileDetails']);
            });
            // RecruiterProfileGet Routes
            $routes->group('RecruiterProfile', function ($routes) {
                $routes->post('Get', 'AdminApiController::RecruiterProfileGet');
                $routes->post('List', 'AdminApiController::RecruiterProfileList', ['as' => 'recruiter_profile_list_api']);
                $routes->post('Create', 'AdminApiController::RecruiterProfileCreate', ['as' => 'recruiter_profile_create_api']);
                $routes->post('Update', 'AdminApiController::RecruiterProfileUpdate', ['as' => 'recruiter_profile_update_api']);
                $routes->post('Delete', 'AdminApiController::RecruiterProfileDelete', ['as' => 'recruiter_profile_delete_api']);
            });
            // CandidateProfileGet Routes
            $routes->group('CandidateProfile', function ($routes) {
                $routes->post('Get', 'AdminApiController::CandidateProfileGet');
                $routes->post('List', 'AdminApiController::CandidateProfileList', ['as' => 'candidate_profile_list_api']);
                $routes->post('Create', 'AdminApiController::CandidateProfileCreate', ['as' => 'candidate_profile_create_api']);
                $routes->post('Update', 'AdminApiController::CandidateProfileUpdate', ['as' => 'candidate_profile_update_api']);
                $routes->post('Delete', 'AdminApiController::CandidateProfileDelete', ['as' => 'candidate_profile_delete_api']);
            });
            // JobPositionGet Routes
            $routes->group('JobPosition', function ($routes) {
                $routes->post('Get', 'AdminApiController::JobPositionGet');
                $routes->post('List', 'AdminApiController::JobPositionList', ['as' => 'job_position_list_api']);
                $routes->post('Create', 'AdminApiController::JobPositionCreate', ['as' => 'job_position_create_api']);
                $routes->post('Update', 'AdminApiController::JobPositionUpdate', ['as' => 'job_position_update_api']);
                $routes->post('Delete', 'AdminApiController::JobPositionDelete', ['as' => 'job_position_delete_api']);
            });
            // JobPositionGet Routes
            $routes->group('JobPosition', function ($routes) {
                $routes->post('Get', 'AdminApiController::JobPositionGet');
                $routes->post('List', 'AdminApiController::JobPositionList', ['as' => 'job_position_list_api']);
                $routes->post('Create', 'AdminApiController::JobPositionCreate', ['as' => 'job_position_create_api']);
                $routes->post('Update', 'AdminApiController::JobPositionUpdate', ['as' => 'job_position_update_api']);
                $routes->post('Delete', 'AdminApiController::JobPositionDelete', ['as' => 'job_position_delete_api']);
            });
            // JobPostGet Routes
            $routes->group('JobPost', function ($routes) {
                $routes->post('Get', 'AdminApiController::JobPostGet');
                $routes->post('List', 'AdminApiController::JobPostList', ['as' => 'job_post_list_api']);
                $routes->post('Create', 'AdminApiController::JobPostCreate', ['as' => 'job_post_create_api']);
                $routes->post('Update', 'AdminApiController::JobPostUpdate', ['as' => 'job_post_update_api']);
                $routes->post('Delete', 'AdminApiController::JobPostDelete', ['as' => 'job_post_delete_api']);
            });
            // JobTypeGet Routes
            $routes->group('JobType', function ($routes) {
                $routes->post('Get', 'AdminApiController::JobTypeGet');
                $routes->post('List', 'AdminApiController::JobTypeList', ['as' => 'job_type_list_api']);
                $routes->post('Create', 'AdminApiController::JobTypeCreate', ['as' => 'job_type_create_api']);
                $routes->post('Update', 'AdminApiController::JobTypeUpdate', ['as' => 'job_type_update_api']);
                $routes->post('Delete', 'AdminApiController::JobTypeDelete', ['as' => 'job_type_delete_api']);
            });
            // SkillsGet Routes
            $routes->group('Skills', function ($routes) {
                $routes->post('Get', 'AdminApiController::SkillsGet');
                $routes->post('List', 'AdminApiController::SkillsList', ['as' => 'skills_list_api']);
                $routes->post('Create', 'AdminApiController::SkillsCreate', ['as' => 'skills_create_api']);
                $routes->post('Update', 'AdminApiController::SkillsUpdate', ['as' => 'skills_update_api']);
                $routes->post('Delete', 'AdminApiController::SkillsDelete', ['as' => 'skills_delete_api']);
            });
            $routes->group('FileUpload', function ($routes) {
                $routes->post('ImageUpload', 'AdminApiController::ImageUpload', ['as' => 'file_upload_image_api']);
            });
        });
    });
    // Ecommerce Api Start -------------------------------------------------------------------------------------------
    $routes->group('EcommerceApi', ['filter' => 'EcommerceApiAuthFilter'], function ($routes) {
    });
}
