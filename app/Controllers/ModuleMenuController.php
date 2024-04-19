<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Database\Exceptions\DataException;
use ApiResponseStatusCode;

class ModuleMenuController extends BaseController
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
        $this->mm = $this->getModuleMenuModel();

        // Assign default response messages
        $this->getRecordFoundMsg = "ModuleMenu Record Found Successfully";
        $this->getRecordNotFoundMsg = "ModuleMenu Record Not Found";
        $this->createRecordSuccessMsg = "ModuleMenu Record Created Successfully";
        $this->updateRecordSuccessMsg = "ModuleMenu Record Updated Successfully";
        $this->deleteRecordSuccessMsg = "ModuleMenu Record Deleted Successfully";
        $this->validationFailedMsg = "ModuleMenu Form Validation Failed";
        $this->updateRecordIdNotFoundMsg = "ModuleMenu Id Not Found";
    }

    /**
     * Get a ModuleMenu record by primary key.
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
     * List all ModuleMenu records.
     *
     * @param array $filter
     * @return array
     */
    public function list(array $filter = []): array
    {
        try {
            $mm = $this->mm;
            foreach ($filter as $key => $value) {
                // Check if the key is valid and value is not empty
                if (!empty($value)) {
                    // Add WHERE condition for the key-value pair
                    $mm->where($key, $value);
                }
            }
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
     * List all ModuleMenu records.
     *
     * @param array $filter
     * @return array
     */
    public function moduleMenuList(array $filter = []): array
    {
        try {
            $mm = $this->mm;
            
            $mm->setTableAlias('mm');
            $mm->select('mm.menu_id,mm.module_id,mm.name as menu_name,mm.description as menu_description');
            $mm->select('m.name as module_name,m.description as module_description');
            // $mm->select('rmar.*');
            // Module Wise Filter
            (array_key_exists('module_id',$filter) && !empty($filter['module_id'])) ?$mm->where('mm.module_id',$filter['module_id']):"";
            (array_key_exists('not_module_id',$filter) && !empty($filter['not_module_id'])) ?$mm->where('mm.module_id !=',$filter['not_module_id']):"";
            $mm->join('mst_modules as m','m.module_id = mm.module_id', 'left');

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
     * Create a new ModuleMenu record.
     *
     * @param array $data
     * @return array
     * @throws \Throwable
     */
    public function create(array &$data): array
    {
        try {
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
     * Update an existing ModuleMenu record.
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
     * Delete a ModuleMenu record by primary key.
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
            return formatCommonResponse(ApiResponseStatusCode::CREATED, $this->deleteRecordSuccessMsg, $result);
        } catch (\Throwable $th) {
            return formatCommonResponse(ApiResponseStatusCode::BAD_REQUEST,  $th->getMessage());
        } catch (DataException $th) {
            return formatCommonResponse(ApiResponseStatusCode::VALIDATION_FAILED,  $th->getMessage());
        }
    }
}
