<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use CodeIgniter\Database\Exceptions\DataException;
use ApiResponseStatusCode;

class CityController extends BaseController
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
        $this->mm = $this->getCityModel();

        // Assign default response messages
        $this->getRecordFoundMsg = "City Record Found Successfully";
        $this->getRecordNotFoundMsg = "City Record Not Found";
        $this->createRecordSuccessMsg = "City Record Created Successfully";
        $this->updateRecordSuccessMsg = "City Record Updated Successfully";
        $this->deleteRecordSuccessMsg = "City Record Deleted Successfully";
        $this->validationFailedMsg = "City Form Validation Failed";
        $this->updateRecordIdNotFoundMsg = "City Id Not Found";
    }

    /**
     * Get a City record by primary key.
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
     * List all City records.
     *
     * @param array $filter
     * @return array
     */
    public function list(array &$filter = []): array
    {
        try {
            $result = $this->mm->findAll();
            if (empty($result)) {
                return formatCommonResponse(ApiResponseStatusCode::NO_CONTENT, $this->getRecordNotFoundMsg);
            }
            return formatCommonResponse(ApiResponseStatusCode::OK, $this->getRecordFoundMsg, $result);
        } catch (\Throwable $th) {
            return formatCommonResponse(ApiResponseStatusCode::BAD_REQUEST,  $th->getMessage());
        }
    }

    /**
     * Create a new City record.
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
     * Update an existing City record.
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
     * Delete a City record by primary key.
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
