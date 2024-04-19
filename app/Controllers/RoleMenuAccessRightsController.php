<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Database\Exceptions\DataException;
use ApiResponseStatusCode;

class RoleMenuAccessRightsController extends BaseController
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

    public function __construct()
    {
        // Initialize main model
        $this->mm = $this->getRoleMenuAccessRightsModel();

        // Assign default response messages
        $this->getRecordFoundMsg = "RoleMenuAccessRights Record Found Successfully";
        $this->getRecordNotFoundMsg = "RoleMenuAccessRights Record Not Found";
        $this->createRecordSuccessMsg = "RoleMenuAccessRights Record Created Successfully";
        $this->updateRecordSuccessMsg = "RoleMenuAccessRights Record Updated Successfully";
        $this->deleteRecordSuccessMsg = "RoleMenuAccessRights Record Deleted Successfully";
        $this->validationFailedMsg = "RoleMenuAccessRights Form Validation Failed";
        $this->updateRecordIdNotFoundMsg = "RoleMenuAccessRights Id Not Found";
    }

    /**
     * Get a RoleMenuAccessRights record by primary key.
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
     * List all RoleMenuAccessRights records.
     *
     * @param array $filter
     * @return array
     */
    public function list(array|null $filter = []): array
    {
        try {
            $mm = $this->mm;
            if (!empty($filter)) {
                foreach ($filter as $key => $value) {
                    // Check if the key is valid and value is not empty
                    if (!empty($value)) {
                        // Add WHERE condition for the key-value pair
                        $mm->where($key, $value);
                    }
                }
            }
            $mm->join('mst_modules_menus','mst_modules_menus.menu_id = mst_roles_menus_access_rights.menu_id','left');
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
     * Create a new RoleMenuAccessRights record.
     *
     * @param array $data
     * @return array
     * @throws \Throwable
     */
    public function create(array &$data): array
    {
        $role_id = null;
        try {
            foreach($data as $row){
                $role_id = $row['role_id'];
                break;
            }
            $alreadyExiestData = $this->list(['role_id'=>$role_id]);
            if($alreadyExiestData['status'] == ApiResponseStatusCode::OK){
                foreach ($alreadyExiestData['data'] as $value) {
                    $this->delete($value['id']);
                }
            }
            foreach ($data as $row) {
                $this->mm->insert($row);    
            }
            return formatCommonResponse(ApiResponseStatusCode::CREATED, $this->createRecordSuccessMsg);
        } catch (\Throwable $th) {
            // Other errors
            return formatCommonResponse(ApiResponseStatusCode::BAD_REQUEST,  $th->getMessage());
        }
    }

    /**
     * Update an existing RoleMenuAccessRights record.
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
     * Delete a RoleMenuAccessRights record by primary key.
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
}
