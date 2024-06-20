<?php

namespace App\Controllers;

use ApiResponseStatusCode;
use App\Controllers\BaseController;
use App\Models\FunctionModel;
use CodeIgniter\HTTP\Response;
use Exception;
use MediaModuleType;
use App\Traits\CommonTraits;

class AdminApiController extends BaseController
{
    use CommonTraits;
    public function handleOptionsRequest()
    {
        return $this->response->setStatusCode(Response::HTTP_OK);
    }
    protected function ModelGet(FunctionModel $modelInstance)
    {
        try {
            $requestedData = getRequestData($this->request, 'ARRAY') ?? [];
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
            $result = $modelInstance->RecorUpdate($requestData, $requestData[$modelInstance->getPrimaryKey()]);
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
    /** */
    public function StateGet()
    {
        return $this->ModelGet($this->getStateModel());
    }
    /** */
    public function StateList()
    {
        return $this->ModelList($this->getStateModel());
    }
    /** */
    public function StateCreate()
    {
        return $this->ModelCreate($this->getStateModel());
    }
    /** */
    public function StateUpdate()
    {
        return $this->ModelUpdate($this->getStateModel());
    }
    /** */
    public function StateDelete()
    {
        return $this->ModelDelete($this->getStateModel());
    }

    // City -------------------------------------------------------------------------------------------------------
    /** */
    public function CityGet()
    {
        return $this->ModelGet($this->getCityModel());
    }
    /** */
    public function CityList()
    {
        return $this->ModelList($this->getCityModel());
    }
    /** */
    public function CityCreate()
    {
        return $this->ModelCreate($this->getCityModel());
    }
    /** */
    public function CityUpdate()
    {
        return $this->ModelUpdate($this->getCityModel());
    }
    /** */
    public function CityDelete()
    {
        return $this->ModelDelete($this->getCityModel());
    }
    // Login and ForgetPassword ------------------------------------------------------------------------------------
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

    // Skills  -------------------------------------------------------------------------------------------------------
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
    /** 
     * 
     */
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

}
