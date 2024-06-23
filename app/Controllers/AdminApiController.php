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
    // Firebase Messaging Notification ---------------------------------------------------------------------------------------------------------
    /**
     *  {"firebase_messaging_integration_id":"","apiKey":"","authDomain":"","projectId":"","storageBucket":"","messagingSenderId":"","appId":"","serverKey":"","vapidKey":"","desktop_notification":"","mobile_notification":""}
     */
    public function FirebaseMessagingIntegrationCreateUpdate()
    {
        $data = getRequestData($this->request, 'ARRAY');
        if (array_key_exists('firebase_messaging_integration_id', $data) && !empty($data['firebase_messaging_integration_id'])) {
            return $this->ModelUpdate($this->getFirebaseMessagingIntegrationModel());
        } else {
            return $this->ModelCreate($this->getFirebaseMessagingIntegrationModel());
        }
    }
    /**
     *  {"tokens":[],"title":"required","body":"required","image":"permit_empty","url":"required"}
     */
    public function SendNotification()
    {
        $data = getRequestData($this->request, 'ARRAY');
        $validation = \Config\Services::validation();
        $validation->setRules([
            'tokens' => 'required',
            'title' => 'required',
            'body' => 'required',
            'image' => 'permit_empty',
            'url' => 'required',
        ]);
        if (!$validation->run($data)) {
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::VALIDATION_FAILED, 'Validation Failed', [], $validation->getErrors());
        }
        $FCM = new FirebaseMessagingController();
        $response = $FCM->SendNotification($data['tokens'], $data['title'], $data['body'], $data['image'], ['url' => $data['url']]);
        return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::OK, "Notification Response Fetched", json_decode($response, true));
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

    // Brand -------------------------------------------------------------------------------------------------------

    /** 
     * Get a single brand by ID
     * 
     * @return mixed
     */
    public function BrandGet()
    {
        return $this->ModelGet($this->getBrandModel());
    }

    /** 
     * Get a list of all brands
     * 
     * @return mixed
     */
    public function BrandList()
    {
        return $this->ModelList($this->getBrandModel());
    }

    /** 
     * Create a new brand
     * 
     * @return mixed
     */
    public function BrandCreate()
    {
        return $this->ModelCreate($this->getBrandModel());
    }

    /** 
     * Update an existing brand
     * 
     * @return mixed
     */
    public function BrandUpdate()
    {
        return $this->ModelUpdate($this->getBrandModel());
    }

    /** 
     * Delete an existing brand
     * 
     * @return mixed
     */
    public function BrandDelete()
    {
        return $this->ModelDelete($this->getBrandModel());
    }

    // CategoryType -------------------------------------------------------------------------------------------------------

    /** 
     * Get a single category type by ID
     * 
     * @return mixed
     */
    public function CategoryTypeGet()
    {
        return $this->ModelGet($this->getCategoryTypeModel());
    }

    /** 
     * Get a list of all category types
     * 
     * @return mixed
     */
    public function CategoryTypeList()
    {
        return $this->ModelList($this->getCategoryTypeModel());
    }

    /** 
     * Create a new category type
     * 
     * @return mixed
     */
    public function CategoryTypeCreate()
    {
        return $this->ModelCreate($this->getCategoryTypeModel());
    }

    /** 
     * Update an existing category type
     * 
     * @return mixed
     */
    public function CategoryTypeUpdate()
    {
        return $this->ModelUpdate($this->getCategoryTypeModel());
    }

    /** 
     * Delete an existing category type
     * 
     * @return mixed
     */
    public function CategoryTypeDelete()
    {
        return $this->ModelDelete($this->getCategoryTypeModel());
    }

    // Category -------------------------------------------------------------------------------------------------------

    /** 
     * Get a single category by ID
     * 
     * @return mixed
     */
    public function CategoryGet()
    {
        return $this->ModelGet($this->getCategoryModel());
    }

    /** 
     * Get a list of all categories
     * 
     * @return mixed
     */
    public function CategoryList()
    {
        return $this->ModelList($this->getCategoryModel());
    }

    /** 
     * Create a new category
     * 
     * @return mixed
     */
    public function CategoryCreate()
    {
        return $this->ModelCreate($this->getCategoryModel());
    }

    /** 
     * Update an existing category
     * 
     * @return mixed
     */
    public function CategoryUpdate()
    {
        return $this->ModelUpdate($this->getCategoryModel());
    }

    /** 
     * Delete an existing category
     * 
     * @return mixed
     */
    public function CategoryDelete()
    {
        return $this->ModelDelete($this->getCategoryModel());
    }

    // Fabric -------------------------------------------------------------------------------------------------------

    /** 
     * Get a single fabric by ID
     * 
     * @return mixed
     */
    public function fabricGet()
    {
        return $this->ModelGet($this->getCategoryModel()); // This should be getFabricModel() instead of getCategoryModel()
    }

    /** 
     * Get a list of all fabrics
     * 
     * @return mixed
     */
    public function fabricList()
    {
        return $this->ModelList($this->getFabricModel());
    }

    /** 
     * Create a new fabric
     * 
     * @return mixed
     */
    public function fabricCreate()
    {
        return $this->ModelCreate($this->getFabricModel());
    }

    /** 
     * Update an existing fabric
     * 
     * @return mixed
     */
    public function fabricUpdate()
    {
        return $this->ModelUpdate($this->getFabricModel());
    }

    /** 
     * Delete an existing fabric
     * 
     * @return mixed
     */
    public function fabricDelete()
    {
        return $this->ModelDelete($this->getFabricModel());
    }

    // Pattern -------------------------------------------------------------------------------------------------------

    /** 
     * Get a single pattern by ID
     * 
     * @return mixed
     */
    public function AddPatternGet()
    {
        return $this->ModelGet($this->getPatternModel());
    }

    /** 
     * Get a list of all patterns
     * 
     * @return mixed
     */
    public function AddPatternList()
    {
        return $this->ModelList($this->getPatternModel());
    }

    /** 
     * Create a new pattern
     * 
     * @return mixed
     */
    public function AddPatternCreate()
    {
        return $this->ModelCreate($this->getPatternModel());
    }

    /** 
     * Update an existing pattern
     * 
     * @return mixed
     */
    public function AddPatternUpdate()
    {
        return $this->ModelUpdate($this->getPatternModel());
    }

    /** 
     * Delete an existing pattern
     * 
     * @return mixed
     */
    public function AddPatternDelete()
    {
        return $this->ModelDelete($this->getPatternModel());
    }

    // Product -------------------------------------------------------------------------------------------------------

    /** 
     * Get a single product by ID
     * 
     * @return mixed
     */
    public function productGet()
    {
        return $this->ModelGet($this->getProductModel());
    }

    /** 
     * Get a list of all products
     * 
     * @return mixed
     */
    public function productList()
    {
        return $this->ModelList($this->getProductModel());
    }

    /** 
     * Create a new product
     * 
     * @return mixed
     */
    public function productCreate()
    {
        return $this->ModelCreate($this->getProductModel());
    }

    /** 
     * Update an existing product
     * 
     * @return mixed
     */
    public function productUpdate()
    {
        return $this->ModelUpdate($this->getProductModel());
    }

    /** 
     * Delete an existing product
     * 
     * @return mixed
     */
    public function productDelete()
    {
        return $this->ModelDelete($this->getProductModel());
    }

    // Variant -------------------------------------------------------------------------------------------------------

    /** 
     * Get a single product variant by ID
     * 
     * @return mixed
     */
    public function variantGet()
    {
        return $this->ModelGet($this->getProductVariantModel());
    }

    /** 
     * Get a list of all product variants
     * 
     * @return mixed
     */
    public function variantList()
    {
        return $this->ModelList($this->getProductVariantModel());
    }
    public function variantCreate()
    {
        $result = $this->ModelCreate($this->getProductVariantModel());
        return $result;
    }
    public function variantUpdate()
    {
        $result = $this->ModelUpdate($this->getProductVariantModel());
        $this->getSizeVsVariantModel()->where('variant_id', $_POST['variant_id'])->delete();
        if (isset($_POST['sizes']) && is_array($_POST['sizes'])) {
            foreach ($_POST['sizes'] as $key => $size) {
                $size_row = [
                    'variant_id' => $_POST['variant_id'],
                    'size_id' => $size
                ];
                $this->getSizeVsVariantModel()->insert($size_row);
            }
        }
        return $result;
    }
    public function variantDelete()
    {
        return $this->ModelDelete($this->getProductVariantModel());
    }
    public function calculate_variant()
    {
        $data = getRequestData($this->request, 'ARRAY');
        $result = $this->getProductVariantModel()->calculate_variant(['data' => $data]);
        return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::OK, 'Calculated Successfull', $result['data']);
    }


    public function sizeGet()
    {
        return $this->ModelGet($this->getSizeModel());
    }

    public function sizeList()
    {
        return $this->ModelList($this->getSizeModel());
    }

    public function sizeCreate()
    {
        return $this->ModelCreate($this->getSizeModel());
    }
    public function sizeUpdate()
    {
        return $this->ModelUpdate($this->getSizeModel());
    }
    public function sizeDelete()
    {
        return $this->ModelDelete($this->getSizeModel());
    }

    public function unitGet()
    {
        return $this->ModelGet($this->getUnitModel());
    }

    public function unitList()
    {
        return $this->ModelList($this->getUnitModel());
    }

    public function unitCreate()
    {
        return $this->ModelCreate($this->getUnitModel());
    }
    public function unitUpdate()
    {
        return $this->ModelUpdate($this->getUnitModel());
    }
    public function unitDelete()
    {
        return $this->ModelDelete($this->getUnitModel());
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
            $result2 = $this->getEmailController()->UserForgetPasswordSendOtp($update_data['otp'], $result['email'], $result['fullname']);

            // If sending OTP fails, return corresponding response
            if ($result2['status'] != ApiResponseStatusCode::OK) {
                return formatApiAutoResponse(
                    $this->request,
                    $this->response,
                    $result2
                );
            }

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
    // MediaManagement  -------------------------------------------------------------------------------------------------------
    public function UploadMediaToServer()
    {
        try {
            $fileObjectArray = $_FILES;
            $fileProperty = getRequestData($this->request, 'ARRAY');
            $validation = \Config\Services::validation();
            $validation->setRules([
                'module_name' => 'required|in_list[' . implode(',', array_column(MediaModuleType::cases(), 'value')) . ']',
                'uploader_id' => 'required',
                'media_visibility' => 'required|in_list[public,private]'
            ]);
            if (!$validation->run($fileProperty)) {
                return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::VALIDATION_FAILED, "Validation 1 Failed", [], $validation->getErrors());
            }
            $validation->setRules([
                'file' => 'required',
            ]);
            if (!$validation->run($fileObjectArray)) {
                return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::VALIDATION_FAILED, "Validation 2 Failed", [], $validation->getErrors());
            }
            $fileObject = $fileObjectArray['file'];
            $validateResult = $this->FilesValidate($fileObject, $fileProperty['module_name']);
            if ($validateResult['status'] == false) {
                return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::VALIDATION_FAILED, "Validation 3 Failed", [], $validateResult['errors']);
            }
            // if Upload files is Validate
            if ($validateResult['status'] === true) {
                $mmm = $this->getMediaManagementModel();
                $errors = [];
                $files = [];
                $files = array_map(
                    fn ($file) => $mmm->uploadFileToPath($file, $fileProperty, $errors),
                    $validateResult['files']
                );
                if (!empty($errors)) {
                    return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST,  'File Uploaded Failed', $errors);
                }
                return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::OK,  'File Uploaded Successfully', $files);
            }
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST,  $e->getMessage());
        }
    }
    public function UpdateMediaProperty()
    {
        try {
            $fileProperty = getRequestData($this->request, 'ARRAY');
            $validation = \Config\Services::validation();
            $validation->setRules([
                'uploader_id' => 'required',
                'media_id' => 'required',
                'record_id' => 'required'
            ]);
            if (!$validation->run($fileProperty)) {
                return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::VALIDATION_FAILED, "Validation 1 Failed", [], $validation->getErrors());
            }
            $result = $this->getMediaManagementModel()->find($fileProperty['media_id']);
            if (empty($result)) {
                return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::VALIDATION_FAILED, "Invalid Media ID");
            }
            $fileProperty['module_name'] = $result['module_name'];
            if (array_key_exists('is_featured', $fileProperty) && $fileProperty['is_featured'] == 1) {
                $this->UpdateMediaIsFeatureToFalse($fileProperty['record_id']);
            }
            $this->getMediaManagementModel()->save($fileProperty);
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::OK,  'File Property Uploaded Successfully');
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST,  $e->getMessage());
        }
    }
    protected function UpdateMediaIsFeatureToFalse(string $record_id)
    {
        $dataToUpdate = [
            ['is_featured' => 0, 'record_id' => $record_id]
        ];

        $this->getMediaManagementModel()
            ->updateBatch($dataToUpdate, 'record_id');
    }
    public function GetMediaList()
    {
        try {
            $data = getRequestData($this->request, 'ARRAY');
            $validation = \Config\Services::validation();
            $validation->setRules([
                'module_name' => 'required|in_list[' . implode(',', array_column(MediaModuleType::cases(), 'value')) . ']',
            ]);
            if (!$validation->run($data)) {
                return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::VALIDATION_FAILED, "Validation 1 Failed", [], $validation->getErrors());
            }
            $result = $this->getMediaManagementModel()
                ->select("concat('" . base_url() . "/',media_path,'/',media_filename,'.',media_file_extension) as image_url")
                ->select("concat('" . base_url() . "/',thumbnail_path,'/',media_filename,'.',media_file_extension) as thumb_image_url")
                ->select("alt_text,media_text_content,is_featured,redirect_url")
                ->where('module_name', $data['module_name'])
                ->where('media_visibility', 'public')
                ->orderBy('media_sequence', 'ASC')->findAll();
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::OK,  'Media List Fetched Successfully', $result);
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST,  $e->getMessage());
        }
    }
    protected function FilesValidate($fileObject, string $moduleName): array
    {
        $keys = array_keys($fileObject);
        $multifile = is_array($fileObject[$keys[0]]);
        $mmm = $this->getMediaManagementModel();
        $ModuleProperty = $mmm->getMediaModuleProperty($moduleName);
        $files = ($multifile == true) ? [] : [0 => $fileObject];
        // checking single file or multi files
        if (is_array($fileObject[$keys[0]])) {
            // If multiple files, run the loop
            foreach ($fileObject[$keys[0]] as $index => $value) {
                $files[$index] = [];

                // Dynamically assign keys based on the original array keys
                foreach ($keys as $key) {
                    $files[$index][$key] = $fileObject[$key][$index];
                }
            }
        }
        // Validating each file and returning errors if any.
        $errors = [];
        ($ModuleProperty['maxUploadLimit'] > 0 && count($files) > $ModuleProperty['maxUploadLimit']) ? $errors['maxUploadCount'] = "Max File Upload Count " . $ModuleProperty['maxUploadLimit'] : '';
        foreach ($files as $key => $file) {
            ($this->FileTypeValidate($file, $ModuleProperty['fileTypeAllowed'])) ? '' : $errors['fileType'][] = "(" . $file['name'] . ") Invalid File Type. Allowed Only [" . implode(', ', $ModuleProperty["fileTypeAllowed"]) . "]";
            ($this->FileSizeValidate($file, $ModuleProperty['maxFileSizeKb'])) ? '' : $errors['fileSize'][] = "(" . $file['name'] . ") Invalid File Size(" . ($file['size'] / 1024) . "KB). Allowed Maximum Size Only :" . $ModuleProperty['maxFileSizeKb'] . "KB";
        }
        if (!empty($errors)) {
            return ['status' => false, 'errors' => $errors];
        }
        return ['status' => true, 'files' => $files];
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
