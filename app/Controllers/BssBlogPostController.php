<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Database\Exceptions\DataException;
use ApiResponseStatusCode;

class BssBlogPostController extends BaseController
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
        $this->mm = $this->getBssBlogPostModel();

        // Assign default response messages
        $this->getRecordFoundMsg = "BlogPost Record Found Successfully";
        $this->getRecordNotFoundMsg = "BlogPost Record Not Found";
        $this->createRecordSuccessMsg = "BlogPost Record Created Successfully";
        $this->updateRecordSuccessMsg = "BlogPost Record Updated Successfully";
        $this->deleteRecordSuccessMsg = "BlogPost Record Deleted Successfully";
        $this->validationFailedMsg = "BlogPost Form Validation Failed";
        $this->updateRecordIdNotFoundMsg = "BlogPost Id Not Found";
    }

    /**
     * Get a BssBlogPost record by primary key.
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
     * List all BssBlogPost records.
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
     * Create a new BssBlogPost record.
     *
     * @param array $data
     * @return array
     * @throws \Throwable
     */
    public function create(array &$data): array
    {
        try {
            // Check if a featured image was uploaded
            if (isset($_FILES['featured_image']) && $_FILES['featured_image']['error'] === UPLOAD_ERR_OK) {
                // Define the directory where the file will be saved
                $uploadDir = WRITEPATH . 'uploads/company/1/blogpost/';
                // Create the directory if it doesn't exist
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                // Generate a unique filename for the uploaded file
                $filename = uniqid() . '_' . $_FILES['featured_image']['name'];
                // Define the path where the file will be saved
                $uploadPath = $uploadDir . $filename;

                // Move the uploaded file to the specified directory
                if (move_uploaded_file($_FILES['featured_image']['tmp_name'], $uploadPath)) {
                    // File uploaded successfully, update the data array with the file paths
                    $data['featured_image'] = $uploadPath;
                    $data['url_path'] = base_url('uploads/company/1/blogpost/' . $filename);
                } else {
                    // Failed to move the uploaded file
                    return formatCommonResponse(ApiResponseStatusCode::BAD_REQUEST, 'Failed to move the uploaded file.');
                }
            }

            // Insert the blog post data into the database
            $result = $this->mm->insert($data);

            if (!$result) {
                // Insertion failed, return validation errors if any
                return formatCommonResponse(ApiResponseStatusCode::VALIDATION_FAILED, $this->validationFailedMsg, $data, $this->mm->validation->getErrors());
            }

            // Blog post created successfully
            return formatCommonResponse(ApiResponseStatusCode::CREATED, $this->createRecordSuccessMsg, $result);
        } catch (\Throwable $th) {
            // Other errors
            return formatCommonResponse(ApiResponseStatusCode::BAD_REQUEST,  $th->getMessage());
        }
    }


    /**
     * Update an existing BssBlogPost record.
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
     * Delete a BssBlogPost record by primary key.
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
