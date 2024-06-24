<?php

namespace App\Controllers;

use ApiResponseStatusCode;
use App\Controllers\BaseController;
use App\Models\FunctionModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\Response;
use Exception;
use MediaModuleType;

class AdminApiController extends BaseController
{
    public function handleOptionsRequest()
    {
        return $this->response->setStatusCode(Response::HTTP_OK);
    }
    protected function ModelGet(FunctionModel $modelInstance)
    {
        try {
            $requestedData = (array) getRequestData($this->request, 'ARRAY') ?? [];
            $validation = \Config\Services::validation();
            // Define validation rules
            $validation->setRules([
                $modelInstance->getPrimaryKey() => 'required',
            ]);
            // Run validation
            if ($validation->run($requestedData) === false) {
                return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::VALIDATION_FAILED, 'Validation Failed', [], $validation->getErrors());
            }
            $result = $modelInstance->RecordGet($requestedData[$modelInstance->getPrimaryKey()]);
            return formatApiAutoResponse($this->request, $this->response, $result);
        } catch (Exception $e) {
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
        }
    }
    protected function ModelList(FunctionModel $modelInstance)
    {
        try {
            $filter = getRequestData($this->request, 'ARRAY') ?? [];
            $result = $modelInstance->RecordList($filter);
            return formatApiAutoResponse($this->request, $this->response, $result);
        } catch (Exception $e) {
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
        }
    }
    protected function ModelCreate(FunctionModel $modelInstance)
    {
        try {
            $requestData = getRequestData($this->request, 'ARRAY') ?? [];
            $result = $modelInstance->RecordCreate($requestData);
            return formatApiAutoResponse($this->request, $this->response, $result);
        } catch (Exception $e) {
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
        }
    }
    protected function ModelUpdate(FunctionModel $modelInstance)
    {
        try {
            $requestData = getRequestData($this->request, 'ARRAY') ?? [];
            $result = $modelInstance->RecordUpdate($requestData, $requestData[$modelInstance->getPrimaryKey()]);
            return formatApiAutoResponse($this->request, $this->response, $result);
        } catch (Exception $e) {
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
        }
    }
    protected function ModelDelete(FunctionModel $modelInstance)
    {
        try {
            $requestData = getRequestData($this->request, 'ARRAY') ?? [];
            $validation = \Config\Services::validation();
            // Define validation rules
            $validation->setRules([
                $modelInstance->getPrimaryKey() => 'required',
            ]);
            // Run validation
            if ($validation->run($requestData) === false) {
                return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::VALIDATION_FAILED, 'Validation Failed', [], $validation->getErrors());
            }
            $result = $modelInstance->RecordDelete($requestData[$modelInstance->getPrimaryKey()]);
            return formatApiAutoResponse($this->request, $this->response, $result);
        } catch (Exception $e) {
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
        }
    }

    // Country ---------------------------------------------------------------------------------------------------------
    /**
     * {"country_id":"required"}
     */
    public function CountryGet()
    {
        return $this->ModelGet($this->getCountryModel());
    }
    /**
     *  {
     *  "country_id": "",
     *	"country_name": "",
     *	"alias": "",
     *	"short_name": "",
     *	"phonecode": "",
     *	"currency": "",
     *	"currency_name": "",
     *	"currency_symbol": "",
     *	"region": "",
     *  "select":"",
     *  "autojoin":"" // "y","f"
     *  }
     */
    public function CountryList()
    {
        return $this->ModelList($this->getCountryModel());
    }
    /**
     * {
     *     "country_name": "required|max_length[100]",
     *     "alias": "max_length[3]",
     *     "short_name": "max_length[2]",
     *     "phonecode": "max_length[255]",
     *     "currency": "max_length[255]",
     *     "currency_name": "max_length[255]",
     *     "currency_symbol": "max_length[255]",
     *     "region": "max_length[255]"
     * } 
     */
    public function CountryCreate()
    {
        return $this->ModelCreate($this->getCountryModel());
    }
    /**
     * {
     *     "country_id": "required",
     *     "country_name": "required|max_length[100]",
     *     "alias": "max_length[3]",
     *     "short_name": "max_length[2]",
     *     "phonecode": "max_length[255]",
     *     "currency": "max_length[255]",
     *     "currency_name": "max_length[255]",
     *     "currency_symbol": "max_length[255]",
     *     "region": "max_length[255]"
     * } 
     */
    public function CountryUpdate()
    {
        return $this->ModelUpdate($this->getCountryModel());
    }
    /**
     * {"country_id":"required"}
     */
    public function CountryDelete()
    {
        return $this->ModelDelete($this->getCountryModel());
    }
    /**
     * {"state_id":"required"}
     */

    // State ----------------------------------------------------------------------------------------------------------

    /** 
     * Get a single state by ID
     * 
     * @return mixed
     */
    public function StateGet()
    {
        return $this->ModelGet($this->getStateModel());
    }

    /** 
     * Get a list of all states
     * 
     * @return mixed
     */
    public function StateList()
    {
        return $this->ModelList($this->getStateModel());
    }

    /** 
     * Create a new state
     * 
     * @return mixed
     */
    public function StateCreate()
    {
        return $this->ModelCreate($this->getStateModel());
    }

    /** 
     * Update an existing state
     * 
     * @return mixed
     */
    public function StateUpdate()
    {
        return $this->ModelUpdate($this->getStateModel());
    }

    /** 
     * Delete an existing state
     * 
     * @return mixed
     */
    public function StateDelete()
    {
        return $this->ModelDelete($this->getStateModel());
    }

    // City -------------------------------------------------------------------------------------------------------

    /** 
     * Get a single city by ID
     * 
     * @return mixed
     */
    public function CityGet()
    {
        return $this->ModelGet($this->getCityModel());
    }

    /** 
     * Get a list of all cities
     * 
     * @return mixed
     */
    public function CityList()
    {
        return $this->ModelList($this->getCityModel());
    }

    /** 
     * Create a new city
     * 
     * @return mixed
     */
    public function CityCreate()
    {
        return $this->ModelCreate($this->getCityModel());
    }

    /** 
     * Update an existing city
     * 
     * @return mixed
     */
    public function CityUpdate()
    {
        return $this->ModelUpdate($this->getCityModel());
    }

    /** 
     * Delete an existing city
     * 
     * @return mixed
     */
    public function CityDelete()
    {
        return $this->ModelDelete($this->getCityModel());
    }

    // User Login  ------------------------------------------------------------------------------------
    /** 
     * {
     * "username":"required",
     * "password":"required"
     * }
     */
    public function UserLogin()
    {
        $requestedData = getRequestData($this->request, 'ARRAY') ?? [];
        $validation = \Config\Services::validation();
        // Define validation rules
        $validation->setRules([
            'username' => [
                'label'  => 'Username',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Email / Mobile is Required',
                ],
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required'   => 'The {field} field is required.',
                ],
            ],
        ]);

        // Run validation
        if ($validation->run($requestedData) === false) {
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::VALIDATION_FAILED, 'Validation Failed', [], $validation->getErrors());
        } else {
            // Cookies Set at remember me
            if (isset($requestedData['rememberme'])) {
                if ($requestedData['rememberme'] == 'on') {
                    // CREATE COOKIES INSTANCE AND SET VALUE $requestedData['username'] to cookies username key
                    set_cookie('username', $requestedData['username']);
                }
            } else {
                delete_cookie('username');
            }
            $result = $this->getUserModel()->checkLogin($requestedData['username'], $requestedData['password']);
            if ($result['status'] != ApiResponseStatusCode::OK) {
                return formatApiAutoResponse($this->request, $this->response, $result);
            }
            $userdata = $result['data'];
            if ($userdata['is_active'] != 1) {
                return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::VALIDATION_FAILED, 'Account is Disabled Please Contact Your Administrator', [], ['error' => 'Account is Disabled Please Contact Your Administrator']);
            }
            $token = $this->getUserTokenModel()->generateJWTToken($userdata);
            $userAgent = $this->request->getUserAgent();
            $croppedUserAgent = (string) strlen($userAgent->getAgentString()) > 100 ? substr($userAgent->getAgentString(), 0, 100) : $userAgent->getAgentString();
            $UserTokenData = [
                'user_id' => $userdata[$this->getUserModel()->getPrimaryKey()],
                'token' => $token,
                'expiry' => date('Y-m-d H:i:s', strtotime('+30 days')),
                'ip_address' => $this->request->getIPAddress(),
                'device_name' => $croppedUserAgent,
            ];
            $result = $this->getUserTokenModel()->RecordCreate($UserTokenData);
            if ($result['status'] != ApiResponseStatusCode::CREATED) {
                return formatApiAutoResponse($this->request, $this->response, $result);
            }
            $userdata['token'] = $token;
            $userdata['logged_in'] = true;
            $session = \Config\Services::session();
            $session->set($userdata);
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::OK, 'Login Successfull', $userdata);
        }
    }
    // User  -------------------------------------------------------------------------------------------------------
    /** */
    public function UserForgetPasswordOtpSend()
    {
        try {
            // Retrieve requested data from request
            $requestedData = getRequestData($this->request, 'ARRAY') ?? [];

            // Load validation service
            $validation = \Config\Services::validation();

            // Define validation rules for 'username'
            $validation->setRules([
                'username' => [
                    'label'  => 'Username',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Email / Mobile is Required',
                    ],
                ],
            ]);

            // Validate requested data against defined rules
            if ($validation->run($requestedData) === false) {
                // Return validation failed response
                return formatApiResponse(
                    $this->request,
                    $this->response,
                    ApiResponseStatusCode::VALIDATION_FAILED,
                    'Validation Failed',
                    [],
                    $validation->getErrors()
                );
            }

            // Attempt to find user by email or mobile
            $result = $this->getUserModel()
                ->orWhere('email', $requestedData['username'])
                ->orWhere('mobile', $requestedData['username'])
                ->first();

            // If no user found, return not found response
            if (empty($result)) {
                return formatApiResponse(
                    $this->request,
                    $this->response,
                    ApiResponseStatusCode::NOT_FOUND,
                    'Username Not Found'
                );
            }

            // Generate OTP and prepare update data
            $update_data = ['otp' => random_int(1000, 9999)];

            // Update user record with generated OTP
            $result1 = $this->getUserModel()->RecordUpdate($update_data, $result['user_id']);

            // If update operation fails, return corresponding response
            if ($result1['status'] != ApiResponseStatusCode::OK) {
                return formatApiAutoResponse(
                    $this->request,
                    $this->response,
                    $result1
                );
            }

            // Send OTP to user via email or mobile
            // $result2 = $this->getEmailController()->UserForgetPasswordSendOtp($update_data['otp'], $result['email'], $result['fullname']);

            // If sending OTP fails, return corresponding response
            // if ($result2['status'] != ApiResponseStatusCode::OK) {
            //     return formatApiAutoResponse(
            //         $this->request,
            //         $this->response,
            //         $result2
            //     );
            // }

            // Return success response after successful OTP send
            return formatApiResponse(
                $this->request,
                $this->response,
                ApiResponseStatusCode::OK,
                'OTP Send Successfull',
                []
            );
        } catch (Exception $e) {
            // Catch any exceptions and return a bad request response with error message
            return formatApiResponse(
                $this->request,
                $this->response,
                ApiResponseStatusCode::BAD_REQUEST,
                $e->getMessage()
            );
        }
    }


    public function UserForgetPasswordUpdate()
    {
        try {
            // Retrieve requested data from request
            $requestedData = getRequestData($this->request, 'ARRAY') ?? [];

            // Load validation service
            $validation = \Config\Services::validation();

            // Define validation rules for 'username', 'password', 'confirm-password', 'otp'
            $validation->setRules([
                'username' => [
                    'label'  => 'Username',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Email / Mobile is Required',
                    ],
                ],
                'password' => [
                    'label'  => 'Password',
                    'rules'  => 'required',
                ],
                'confirm-password' => [
                    'label'  => 'Confirm Password',
                    'rules'  => 'required|matches[password]',
                ],
                'otp' => [
                    'label'  => 'OTP',
                    'rules'  => 'required',
                ],
            ]);

            // Validate requested data against defined rules
            if ($validation->run($requestedData) === false) {
                // Return validation failed response
                return formatApiResponse(
                    $this->request,
                    $this->response,
                    ApiResponseStatusCode::VALIDATION_FAILED,
                    'Validation Failed',
                    [],
                    $validation->getErrors()
                );
            }

            // Attempt to find user by email or mobile
            $result = $this->getUserModel()
                ->orWhere('email', $requestedData['username'])
                ->orWhere('mobile', $requestedData['username'])
                ->first();

            // If no user found, return bad request response
            if (empty($result)) {
                return formatApiResponse(
                    $this->request,
                    $this->response,
                    ApiResponseStatusCode::BAD_REQUEST,
                    'Username Not Found'
                );
            }

            // Check if provided OTP matches stored OTP
            if ($result['otp'] != $requestedData['otp']) {
                return formatApiResponse(
                    $this->request,
                    $this->response,
                    ApiResponseStatusCode::BAD_REQUEST,
                    'OTP Not Match'
                );
            }

            // Update user record with new password and clear OTP
            $update_data = ['otp' => '', 'password' => $requestedData['password']];
            $this->getUserModel()->RecordUpdate($update_data, $result['user_id']);

            // Return success response after successful password change
            return formatApiResponse(
                $this->request,
                $this->response,
                ApiResponseStatusCode::OK,
                'Password Successfully Changed',
                []
            );
        } catch (\Throwable $th) {
            // Catch any exceptions and return a bad request response with error message
            return formatApiResponse(
                $this->request,
                $this->response,
                ApiResponseStatusCode::BAD_REQUEST,
                $th->getMessage()
            );
        }
    }

    public function UserGet()
    {
        return $this->ModelGet($this->getUserModel());
    }
    /** */
    public function UserList()
    {
        return $this->ModelList($this->getUserModel());
    }
    /** 
     * {"user_id": "permit_empty|integer",	"fullname": "required|max_length[255]",	"email": "required|valid_email|max_length[255]|is_unique[user.email,user_id,{user_id}]",	"mobile": "required|max_length[15]|is_unique[user.mobile,user_id,{user_id}]",	"password": "required|max_length[255]",	"otp": "permit_empty|max_length[6]",	"user_type": "required|in_list[admin,purchase,finance,order,delivery,stock]",	"is_active": "boolean"} 
     */
    public function UserCreate()
    {
        return $this->ModelCreate($this->getUserModel());
    }
    /** */
    public function UserUpdate()
    {
        return $this->ModelUpdate($this->getUserModel());
    }
    /** */
    public function UserDelete()
    {
        return $this->ModelDelete($this->getUserModel());
    }

    public function RecruiterProfileGet()
    {
        return $this->ModelGet($this->getRecruiterProfileModel());
    }
    /** */
    public function RecruiterProfileList()
    {
        return $this->ModelList($this->getRecruiterProfileModel());
    }
    /** */
    public function RecruiterProfileCreate()
    {
        return $this->ModelCreate($this->getRecruiterProfileModel());
    }
    /** */
    public function RecruiterProfileUpdate()
    {
        return $this->ModelUpdate($this->getRecruiterProfileModel());
    }
    /** */
    public function RecruiterProfileDelete()
    {
        return $this->ModelDelete($this->getRecruiterProfileModel());
    }
    /** */
    public function RecruiterListWithProfileDetails()
    {
        try {
            $filter = getRequestData($this->request, 'ARRAY') ?? [];
            $result = $this->getUserModel()->RecruiterListWithProfileDetails($filter);
            return formatApiAutoResponse($this->request, $this->response, $result);
        } catch (Exception $e) {
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
        }
    }

    public function CandidateProfileGet()
    {
        return $this->ModelGet($this->getCandidateProfileModel());
    }
    /** */
    public function CandidateProfileList()
    {
        return $this->ModelList($this->getCandidateProfileModel());
    }
    /** */
    public function CandidateProfileCreate()
    {
        return $this->ModelCreate($this->getCandidateProfileModel());
    }
    /** */
    public function CandidateProfileUpdate()
    {
        return $this->ModelUpdate($this->getCandidateProfileModel());
    }
    /** */
    public function CandidateProfileDelete()
    {
        return $this->ModelDelete($this->getCandidateProfileModel());
    }

    public function JobPositionGet()
    {
        return $this->ModelGet($this->getJobPositionModel());
    }
    /** */
    public function JobPositionList()
    {
        return $this->ModelList($this->getJobPositionModel());
    }
    /** */
    public function JobPositionCreate()
    {
        return $this->ModelCreate($this->getJobPositionModel());
    }
    /** */
    public function JobPositionUpdate()
    {
        return $this->ModelUpdate($this->getJobPositionModel());
    }
    /** */
    public function JobPositionDelete()
    {
        return $this->ModelDelete($this->getJobPositionModel());
    }


    public function JobPostGet()
    {
        return $this->ModelGet($this->getJobPostModel());
    }
    /** */
    public function JobPostList()
    {
        return $this->ModelList($this->getJobPostModel());
    }
    /** */
    public function JobPostCreate()
    {
        return $this->ModelCreate($this->getJobPostModel());
    }
    /** */
    public function JobPostUpdate()
    {
        return $this->ModelUpdate($this->getJobPostModel());
    }
    public function JobPostDelete()
    {
        return $this->ModelDelete($this->getJobPostModel());
    }
    /** */
    public function JobPostVsSkillsGet()
    {
        return $this->ModelGet($this->getJobPostVsSkillsModel());
    }
    /** */
    public function JobPostVsSkillsList()
    {
        return $this->ModelList($this->getJobPostVsSkillsModel());
    }
    /** */
    public function JobPostVsSkillsCreate()
    {
        return $this->ModelCreate($this->getJobPostVsSkillsModel());
    }
    /** */
    public function JobPostVsSkillsUpdate()
    {
        return $this->ModelUpdate($this->getJobPostVsSkillsModel());
    }
    /** */
    public function JobPostVsSkillsDelete()
    {
        return $this->ModelDelete($this->getJobPostVsSkillsModel());
    }
    /** */
    public function JobTypeGet()
    {
        return $this->ModelGet($this->getJobTypeModel());
    }
    /** */
    public function JobTypeList()
    {
        return $this->ModelList($this->getJobTypeModel());
    }
    /** */
    public function JobTypeCreate()
    {
        return $this->ModelCreate($this->getJobTypeModel());
    }
    /** */
    public function JobTypeUpdate()
    {
        return $this->ModelUpdate($this->getJobTypeModel());
    }
    /** */
    public function JobTypeDelete()
    {
        return $this->ModelDelete($this->getJobTypeModel());
    }
    /** */
    public function SkillsGet()
    {
        return $this->ModelGet($this->getSkillsModel());
    }
    /** */
    public function SkillsList()
    {
        return $this->ModelList($this->getSkillsModel());
    }
    /** */
    public function SkillsCreate()
    {
        return $this->ModelCreate($this->getSkillsModel());
    }
    /** */
    public function SkillsUpdate()
    {
        return $this->ModelUpdate($this->getSkillsModel());
    }
    /** */
    public function SkillsDelete()
    {
        return $this->ModelDelete($this->getSkillsModel());
    }

    protected function FileTypeValidate($fileObject, $allowedFileTypeArray): bool
    {
        $fileType = $fileObject['type'];
        // Check if the file type is in the allowed file types array
        return in_array($fileType, $allowedFileTypeArray);
    }
    protected function FileSizeValidate($fileObject, $maximumFileSizeInKB): bool
    {
        $fileSize = $fileObject['size'];
        // Check if the file size is within the allowed limit
        return $fileSize <= $maximumFileSizeInKB * 1024;
    }
    public function ImageUpload()
    {
        $requestedData = getRequestData($this->request, 'ARRAY');
        // Load validation service
        $validation = \Config\Services::validation();

        // Define validation rules for 'username', 'password', 'confirm-password', 'otp'
        $validation->setRules([
            'file' => "required",
            'for' => "in_list[category_type,category,brand,product,variant]",
        ]);
        if ($validation->run($requestedData) === false) {
            // Return validation failed response
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::VALIDATION_FAILED, 'Validation Failed', [], $validation->getErrors());
        }
        if (!$this->FileSizeValidate($requestedData['file'], 500)) {
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::VALIDATION_FAILED, 'File Size Max 500kb Allowed', []);
        }
        $FileTypeArray = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/webp', 'image/svg+xml'];
        if (!$this->FileTypeValidate($requestedData['file'], $FileTypeArray)) {
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::VALIDATION_FAILED, 'Invalid File Type Only Image Allowed', []);
        }
        $folderPath = "";
        switch ($requestedData['for']) {
            case 'category_type':
                $folderPath .= "uploads/category_type/";
                break;
            case 'category':
                $folderPath .= "uploads/category/";
                break;
            case 'brand':
                $folderPath .= "uploads/brand/";
                break;
            case 'product':
                $folderPath .= "uploads/product/";
                break;
            case 'variant':
                $folderPath .= "uploads/variant/";
                break;
        }
        $errorMessage = "";
        $uploadResult = uploadImageWithThumbnail($requestedData['file'], $folderPath, $errorMessage);
        if ($uploadResult == false) {
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $errorMessage, []);
        }
        return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::OK, "Image Upload Successfully", $uploadResult);
    }
}
