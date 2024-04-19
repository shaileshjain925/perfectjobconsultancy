<?php

namespace App\Models;

use ApiResponseStatusCode;
use CodeIgniter\Model;
use App\Traits\CommonTraits;

class FunctionModel extends Model
{
    use CommonTraits;
    protected string $getRecordFoundMsg;
    protected string $getRecordNotFoundMsg;
    protected string $createRecordSuccessMsg;
    protected string $updateRecordSuccessMsg;
    protected string $deleteRecordSuccessMsg;
    protected string $validationFailedMsg;
    protected string $updateRecordIdNotFoundMsg;

    public function initializeMessages()
    {
        if (!isset($this->messageAlias) || empty($this->messageAlias)) {
            $messageAlias = "Record";
        } else {
            $messageAlias = $this->messageAlias;
        }
        $this->getRecordFoundMsg = $messageAlias . " Found Successfully";
        $this->getRecordNotFoundMsg = $messageAlias . " Not Found";
        $this->createRecordSuccessMsg = $messageAlias . " Created Successfully";
        $this->updateRecordSuccessMsg = $messageAlias . " Updated Successfully";
        $this->deleteRecordSuccessMsg = $messageAlias . " Deleted Successfully";
        $this->validationFailedMsg = $messageAlias . " Form Validation Failed";
        $this->updateRecordIdNotFoundMsg = $messageAlias . " ID Not Found";
    }
    // Getter and setter methods for $DBGroup property
    /**
     * Retrieves the current value of the DBGroup property.
     *
     * @return string The database group name.
     */
    public function getDBGroup(): string
    {
        return $this->DBGroup;
    }

    /**
     * Sets the value of the DBGroup property.
     *
     * @param string $DBGroup The new database group name.
     */
    public function setDBGroup(string $DBGroup): void
    {
        $this->DBGroup = $DBGroup;
    }

    /**
     * Retrieves the current table name.
     *
     * @return string The table name.
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * Retrieves the primary key of the table.
     *
     * @return string The primary key.
     */
    public function getPrimaryKey(): string
    {
        return $this->primaryKey;
    }

    /**
     * Retrieves the allowed fields for mass assignment.
     *
     * @return array The allowed fields.
     */
    public function getAllowedFields(): array
    {
        return $this->allowedFields;
    }

    /**
     * Retrieves whether to skip validation.
     *
     * @return bool Whether to skip validation.
     */
    public function getSkipValidation(): bool
    {
        return $this->skipValidation;
    }

    /**
     * Sets whether to skip validation.
     *
     * @param bool $skipValidation Whether to skip validation.
     */
    public function setSkipValidation(bool $skipValidation): void
    {
        $this->skipValidation = $skipValidation;
    }

    /**
     * Sets an alias for the table.
     *
     * @param string $tableAlias The table alias.
     */
    public function setTableAlias(string $tableAlias)
    {
        $this->setTable($this->getTable() . " as " . $tableAlias);
    }

    /**
     * Get a Role record by primary key.
     *
     * @param int|string|array $primaryKey
     * @return array
     */
    public function RecordGet(int|string|array $primaryKey): array
    {
        $this->initializeMessages();
        try {
            $result = $this->find($primaryKey);
            if (empty($result)) {
                return formatCommonResponse(ApiResponseStatusCode::NO_CONTENT, $this->getRecordNotFoundMsg);
            }
            return formatCommonResponse(ApiResponseStatusCode::OK, $this->getRecordFoundMsg, $result);
        } catch (\Throwable $th) {
            return formatCommonResponse(ApiResponseStatusCode::BAD_REQUEST,  $th->getMessage());
        }
    }

    /**
     * List all Role records.
     *
     * @param array $filter
     * @return array
     */
    public function RecordList(array|null $filter = []): array
    {
        $this->initializeMessages();
        try {
            if (!empty($filter)) {
                foreach ($filter as $key => $value) {
                    // Check if the key is valid and value is not empty
                    if (!empty($value)) {
                        // Add WHERE condition for the key-value pair
                        $this->where($key, $value);
                    }
                }
            }
            $query = $this->get();
            $result = $query->getResultArray();
            if (empty($result)) {
                return formatCommonResponse(ApiResponseStatusCode::NO_CONTENT, $this->getRecordNotFoundMsg);
            }
            return formatCommonResponse(ApiResponseStatusCode::OK, $this->getRecordFoundMsg, $result);
        } catch (\Throwable $th) {
            return formatCommonResponse(ApiResponseStatusCode::BAD_REQUEST,  $th->getMessage());
        }
    }

    /**
     * Create a new Role record.
     *
     * @param array $data
     * @return array
     * @throws \Throwable
     */
    public function RecordCreate(array &$data): array
    {
        $this->initializeMessages();
        try {
            $result = $this->insert($data);
            if (!$result) {
                return formatCommonResponse(ApiResponseStatusCode::VALIDATION_FAILED, $this->validationFailedMsg, $data, $this->validation->getErrors());
            }
            return formatCommonResponse(ApiResponseStatusCode::CREATED, $this->createRecordSuccessMsg, $result);
        } catch (\Throwable $th) {
            // Other errors
            return formatCommonResponse(ApiResponseStatusCode::BAD_REQUEST,  $th->getMessage());
        }
    }

    /**
     * Update an existing Role record.
     *
     * @param array $data
     * @param string|int $primaryKey
     * @return array
     * @throws \Throwable
     */
    public function RecordUpdate(array &$data, string|int $primaryKey): array
    {
        $this->initializeMessages();
        try {
            if ($this->get($primaryKey)['status'] != ApiResponseStatusCode::OK) {
                return formatCommonResponse(ApiResponseStatusCode::NO_CONTENT, $this->updateRecordIdNotFoundMsg, $data, [$this->getPrimaryKey() => $this->getPrimaryKey() . ' Not Found']);
            }
            $result = $this->update($primaryKey, $data);
            if (!$result) {
                return formatCommonResponse(ApiResponseStatusCode::VALIDATION_FAILED, $this->validationFailedMsg, $data, $this->validation->getErrors());
            }
            return formatCommonResponse(ApiResponseStatusCode::OK, $this->updateRecordSuccessMsg, $result);
        } catch (\Throwable $th) {
            return formatCommonResponse(ApiResponseStatusCode::BAD_REQUEST,  $th->getMessage());
        }
    }

    /**
     * Delete a Role record by primary key.
     *
     * @param string|int $primaryKey
     * @return array
     */
    public function RecordDelete(string|int $primaryKey): array
    {
        $this->initializeMessages();
        try {
            $result = $this->delete($primaryKey);
            if (empty($result)) {
                return formatCommonResponse(ApiResponseStatusCode::NO_CONTENT, $this->getRecordNotFoundMsg);
            }
            return formatCommonResponse(ApiResponseStatusCode::OK, $this->deleteRecordSuccessMsg, $result);
        } catch (\Throwable $th) {
            return formatCommonResponse(ApiResponseStatusCode::BAD_REQUEST,  $th->getMessage());
        }
    }
    protected function autoJoin(){
        // Create This Join in Model
            // protected $autoJoin = [
            //     'fieldName' => [
            //         'ref_table' => 'table_name',
            //         'ref_column' => 'column_name',
            //         'join_type' => 'left',
            //     ],
            //     // Add more auto-join definitions as needed
            // ];
    }
}
