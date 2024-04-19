<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Database\Exceptions\DataException;
use ApiResponseStatusCode;
use DateInterval;
use DateTime;
use Firebase\JWT\JWK;
use Firebase\JWT\JWT;

class CompanyUserController extends BaseController
{

    protected $mm;

    // Define properties for response messages
    public string $getRecordFoundMsg;
    public string $getRecordNotFoundMsg;
    public string $createRecordSuccessMsg;
    public string $updateRecordSuccessMsg;
    public string $deleteRecordSuccessMsg;
    public string $validationFailedMsg;
    public string $updateRecordIdNotFoundMsg;
    public string $loginValidationFailedMsg;

    public function __construct()
    {
        // Initialize main model
        $this->mm = $this->getCompanyUserModel();

        // Assign default response messages
        $this->getRecordFoundMsg = 'Company User Record Found Successfully';
        $this->getRecordNotFoundMsg = 'Company User Record Not Found';
        $this->createRecordSuccessMsg = 'Company User Record Created Successfully';
        $this->updateRecordSuccessMsg = 'Company User Record Updated Successfully';
        $this->deleteRecordSuccessMsg = 'Company User Record Deleted Successfully';
        $this->validationFailedMsg = 'Company User Form Validation Failed';
        $this->updateRecordIdNotFoundMsg = 'Company User Id Not Found';
        $this->loginValidationFailedMsg = "Login Validation Failed";
    }

    /**
     * Get a CompanyUser record by primary key.
     *
     * @param int|string|array $primaryKey
     * @return array
     */

    public function get(int|string|array $primaryKey): array
    {
        try {
            $result = $this->mm->find($primaryKey);
            if (empty($result)) {
                return formatCommonResponse(ApiResponseStatusCode::NO_CONTENT, $this->getRecordNotFoundMsg);
            }
            return formatCommonResponse(ApiResponseStatusCode::OK, $this->getRecordFoundMsg, $result);
        } catch (\Throwable $th) {
            return formatCommonResponse(ApiResponseStatusCode::BAD_REQUEST,  $th->getMessage());
        }
    }

    /**
     * List all CompanyUser records.
     *
     * @param array $filter
     * @return array
     */

    public function list(array|null $filter = []): array
    {
        try {
            $mm = $this->mm;
            $mm->setTableAlias('cu');
            $mm->select('cu.*');
            $mm->select('c.api_token,c.firm_name,c.hostname,c.port,c.username,c.password,c.database,c.is_active as company_is_active');
            $mm->select('r.name as role_name');
            if (!empty($filter)) {
                (array_key_exists('company_user_id', $filter) && !empty($filter['company_user_id'])) ? $mm->where('cu.company_user_id', $filter['company_user_id']) : '';
                (array_key_exists('company_id', $filter) && !empty($filter['company_id'])) ? $mm->where('cu.company_id', $filter['company_id']) : '';
                (array_key_exists('role_id', $filter) && !empty($filter['role_id'])) ? $mm->where('cu.role_id', $filter['role_id']) : '';
                (array_key_exists('email', $filter) && !empty($filter['email'])) ? $mm->where('cu.email', $filter['email']) : '';
            }
            $mm->join('mst_company as c', 'c.company_id = cu.company_id', 'left');
            $mm->join('mst_roles as r', 'r.role_id = cu.role_id', 'left');
            $result = $mm->findAll();
            if (empty($result)) {
                return formatCommonResponse(ApiResponseStatusCode::NO_CONTENT, $this->getRecordNotFoundMsg);
            }
            return formatCommonResponse(ApiResponseStatusCode::OK, $this->getRecordFoundMsg, $result);
        } catch (\Throwable $th) {
            return formatCommonResponse(ApiResponseStatusCode::BAD_REQUEST,  $th->getMessage());
        }
    }

    /**
     * Create a new CompanyUser record.
     *
     * @param array $data
     * @return array
     * @throws \Throwable
     */

    public function create(array &$data): array
    {
        try {
            $token = hash('sha256', uniqid(rand(), true));

            // Optionally, you can encode the token in base64 for readability
            $encodedToken = base64_encode($token);

            // Store the token in your data array
            $data['api_token'] = $encodedToken;
            $result = $this->mm->insert($data);
            if (!$result) {
                return formatCommonResponse(ApiResponseStatusCode::VALIDATION_FAILED, $this->validationFailedMsg, $data, $this->mm->validation->getErrors());
            }
            return formatCommonResponse(ApiResponseStatusCode::CREATED, $this->createRecordSuccessMsg, $result);
        } catch (\Throwable $th) {
            // Other errors
            return formatCommonResponse(ApiResponseStatusCode::BAD_REQUEST,  $th->getMessage());
        }
    }

    /**
     * Update an existing CompanyUser record.
     *
     * @param array $data
     * @param string|int $primaryKey
     * @return array
     * @throws \Throwable
     */

    public function update(array &$data, string|int $primaryKey): array
    {
        try {
            if ($this->get($primaryKey)['status'] != ApiResponseStatusCode::OK) {
                return formatCommonResponse(ApiResponseStatusCode::NO_CONTENT, $this->updateRecordIdNotFoundMsg, $data, [$this->mm->getPrimaryKey() => $this->mm->getPrimaryKey() . ' Not Found']);
            }
            $result = $this->mm->update($primaryKey, $data);
            if (!$result) {
                return formatCommonResponse(ApiResponseStatusCode::VALIDATION_FAILED, $this->validationFailedMsg, $data, $this->mm->validation->getErrors());
            }
            return formatCommonResponse(ApiResponseStatusCode::OK, $this->updateRecordSuccessMsg, $result);
        } catch (\Throwable $th) {
            return formatCommonResponse(ApiResponseStatusCode::BAD_REQUEST,  $th->getMessage());
        }
    }

    /**
     * Delete a CompanyUser record by primary key.
     *
     * @param string|int $primaryKey
     * @return array
     */

    public function delete(string|int $primaryKey): array
    {
        try {
            $result = $this->mm->delete($primaryKey);
            if (empty($result)) {
                return formatCommonResponse(ApiResponseStatusCode::NO_CONTENT, $this->getRecordNotFoundMsg);
            }
            return formatCommonResponse(ApiResponseStatusCode::OK, $this->deleteRecordSuccessMsg, $result);
        } catch (\Throwable $th) {
            return formatCommonResponse(ApiResponseStatusCode::BAD_REQUEST,  $th->getMessage());
        } catch (DataException $th) {
            return formatCommonResponse(ApiResponseStatusCode::VALIDATION_FAILED,  $th->getMessage());
        }
    }
    public function login(&$data)
    {
        $validation = \Config\Services::validation();

        // Set validation rules
        $validation->setRules([
            'email' => 'required|valid_email',
            'company_user_password' => 'required|min_length[4]'
        ]);
        // Apply validation rules
        if (!$validation->run($data)) {
            return formatCommonResponse(ApiResponseStatusCode::VALIDATION_FAILED, $this->loginValidationFailedMsg, [], $validation->getErrors());
        } else {
            $result = $this->list($data);

            if ($result['status'] != ApiResponseStatusCode::OK) {
                return formatCommonResponse(ApiResponseStatusCode::UNAUTHORIZED, 'Invalid Email Address', [], ['error' => 'Invalid Email Address']);
            }
            $userData = $result['data'];

            if ($userData[0]["is_active"] == 0) {
                return formatCommonResponse(ApiResponseStatusCode::FORBIDDEN, 'Account Disabled Please Contact To Administrative', [], ['error' => 'Account Disabled Please Contact To Administrative']);
            }
            if ($userData[0]["company_is_active"] == 0) {
                return formatCommonResponse(ApiResponseStatusCode::FORBIDDEN, 'Company Disabled Please Contact To Administrative', [], ['error' => 'Company Disabled Please Contact To Administrative']);
            }
            if ($userData[0]["company_user_password"] != $data['company_user_password']) {
                return formatCommonResponse(ApiResponseStatusCode::UNAUTHORIZED, 'Invalid Credential', [], ['error' => 'Invalid Credential']);
            }
            $key = $_ENV['JWT_CLIENT_KEY'];
            try {
                $userData[0]['token_expiry_date'] = (new DateTime())->add(new DateInterval('P30D'))->format('Y-m-d H:i:s');
                $jwtToken = \Firebase\JWT\JWT::encode($userData[0], $key, 'HS256');
            } catch (\Throwable $th) {
                // UGT = Unable to Generate Tokken in Database
                return formatCommonResponse(ApiResponseStatusCode::BAD_REQUEST, 'Login Failed Error:UGT', [], ['error' => 'Login Failed']);
            }
            $RoleMenuAccessRights = $this->getRoleMenuAccessRightsController()->list(['role_id' => $userData[0]['role_id']]);

            // Save Tokken In Database
            $userInfo = [
                'company_user_id' => $userData[0]['company_user_id'],
                'company_id' => $userData[0]['company_id'],
                'firm_name' => $userData[0]['firm_name'],
                'jwt_token' => $jwtToken,
                'Authorization' => $jwtToken,
                'Authorization-2' => $userData[0]['api_token'],
                'token_expiry_date' => $userData[0]['token_expiry_date'],
                'role_id' => $userData[0]['role_id'],
                'role_name' => $userData[0]['role_name'],
                'email' => $userData[0]['email'],
                'mobile' => $userData[0]['mobile'],
                'type' => $userData[0]['type'],
                'access_menu_list' => $RoleMenuAccessRights['data']
            ];
            $result = $this->getCompanyUserTokenController()->create($userInfo);
            if ($result['status'] != ApiResponseStatusCode::CREATED) {
                // UST = Unable to Save Tokken in Database
                return formatCommonResponse(ApiResponseStatusCode::BAD_REQUEST, 'Login Failed Error:UST', [], ['error' => 'Login Failed']);
            }
            unset($userInfo['jwt_token']);
            return formatCommonResponse(ApiResponseStatusCode::OK, "Login Successfully", $userInfo);
        }
    }
}
