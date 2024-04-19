<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Database\Exceptions\DataException;
use ApiResponseStatusCode;
use CodeIgniter\Database\Config;
use Config\Paths;

// use PSpell\Config;

class CompanyController extends BaseController
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
    public $db;

    public function __construct()
    {
        // Initialize main model
        $this->mm = $this->getCompanyModel();

        // Assign default response messages
        $this->getRecordFoundMsg = 'Company Record Found Successfully';
        $this->getRecordNotFoundMsg = 'Company Record Not Found';
        $this->createRecordSuccessMsg = 'Company Record Created Successfully';
        $this->updateRecordSuccessMsg = 'Company Record Updated Successfully';
        $this->deleteRecordSuccessMsg = 'Company Record Deleted Successfully';
        $this->validationFailedMsg = 'Company Form Validation Failed';
        $this->updateRecordIdNotFoundMsg = 'Company Id Not Found';
    }

    /**
     * Get a Company record by primary key.
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
     * List all Company records.
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
     * Create a new Company record.
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
     * Update an existing Company record.
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
     * Delete a Company record by primary key.
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
    public function migrate()
    {
        // Set validation rules
        $runner = \Config\Services::migrations();
        // Run the migrations
        $paths = new Paths();

        $runner->clearHistory();

        $migrationFolderPath = $paths->appDirectory .= '/Database/Migrations';
        $migrationTables = [
            $migrationFolderPath . "/2024-04-07-120752_BssWebsiteProfile.php",
            $migrationFolderPath . "/2024-04-07-121700_BssFormSubmissions.php",
            $migrationFolderPath . "/2024-04-07-123404_BssBlogPost.php",
            $migrationFolderPath . "/2024-04-07-123637_BssVisitors.php",
            $migrationFolderPath . "/2024-04-07-123937_BssSubscribers.php",
            $migrationFolderPath . "/2024-04-07-124400_BssMediaGallery.php",
            $migrationFolderPath . "/2024-04-07-124614_BssEmployees.php",
            $migrationFolderPath . "/2024-04-07-124934_BssProductsServices.php",
            $migrationFolderPath . "/2024-04-17-110932_BssClients.php",
        ];
        try {
            foreach ($migrationTables as $key => $migrationTable) {
                $runner->force($migrationTable, "App\Database\Migrations", "custom_group");
            }
            return formatCommonResponse(ApiResponseStatusCode::OK, "Migration Run Successfully");
        } catch (\Throwable $th) {
            return formatCommonResponse(ApiResponseStatusCode::BAD_REQUEST,  $th->getMessage());
        }
    }
}
