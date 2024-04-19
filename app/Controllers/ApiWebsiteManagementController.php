<?php

namespace App\Controllers;

use ApiResponseStatusCode;
use App\Controllers\BaseController;

use Exception;

class ApiWebsiteManagementController extends BaseController
{
  /**
   * {"email": "string|required", "company_user_password": "string|required"}
   *
   * @return Response|string
   */
  public function WebsiteManagementLogin()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $CompanyUserController = $this->getCompanyUserController();
      $result = $CompanyUserController->login($requestData);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  /**
   * Header Required : Authorization,Authorization-2
   * {"firm_name": "required|max_length[255]","firm_slogan": "permit_empty","firm_logo_url": "permit_empty|valid_url","firm_address": "permit_empty","firm_owner_name": "permit_empty|max_length[255]","firm_cin_no": "permit_empty|max_length[255]","firm_gst_no": "permit_empty|max_length[255]","firm_pan_no": "permit_empty|max_length[255]","contact_mobile": "permit_empty|max_length[15]|integer","contact_email": "permit_empty|max_length[255]|valid_email","contact_whatsapp": "permit_empty|max_length[15]","sales_mobile": "permit_empty|max_length[15]|integer","sales_email": "permit_empty|max_length[255]|valid_email","sales_whatsapp": "permit_empty|max_length[15]","support_mobile": "permit_empty|max_length[15]|integer","support_email": "permit_empty|max_length[255]|valid_email","support_whatsapp": "permit_empty|max_length[15]","career_mobile": "permit_empty|max_length[15]|integer","career_email": "permit_empty|max_length[255]|valid_email","career_whatsapp": "permit_empty|max_length[15]","about_company": "permit_empty","about_owner": "permit_empty","terms_and_conditions_content": "permit_empty","privacy_and_policies_content": "permit_empty","disclaimer_content": "permit_empty","firm_address_gmap_url": "permit_empty|valid_url","website_url": "permit_empty|valid_url","play_store_url": "permit_empty|valid_url","app_store_url": "permit_empty|valid_url","facebook_url": "permit_empty|valid_url","instagram_url": "permit_empty|valid_url","twitter_url": "permit_empty|valid_url","linkedin_url": "permit_empty|valid_url","youtube_url": "permit_empty|valid_url","pinterest_url": "permit_empty|valid_url","telegram_url": "permit_empty|valid_url","google_search_url": "permit_empty|valid_url","email_smtp_host": "permit_empty|max_length[255]","email_smtp_port": "permit_empty|max_length[11]","email_smtp_user": "permit_empty|max_length[255]","email_smtp_password": "permit_empty|max_length[255]","email_smtp_crypto": "permit_empty|in_list[ssl,tls,]","email_from_email": "permit_empty|max_length[255]","email_from_name": "permit_empty|max_length[255]","bank_name": "permit_empty|max_length[255]","bank_acc_name": "permit_empty|max_length[255]","bank_acc_no": "permit_empty|max_length[255]","bank_ifsc_code": "permit_empty|max_length[255]","bank_acc_type": "permit_empty|max_length[255]","google_pay_upi": "permit_empty|max_length[255]","google_pay_number": "permit_empty|max_length[255]","phone_pay_upi": "permit_empty|max_length[255]","phone_pay_number": "permit_empty|max_length[255]","paytm_upi": "permit_empty|max_length[255]","paytm_number": "permit_empty|max_length[255]","amazonpay_upi": "permit_empty|max_length[255]","amazonpay_number": "permit_empty|max_length[255]","bhim_upi": "permit_empty|max_length[255]","bhim_number": "permit_empty|max_length[255]"}
   * @return Response|string
   */
  public function WebsiteProfileCreateUpdate()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $BssWebsiteProfileController = $this->getBssWebsiteProfileController();
      $result = $BssWebsiteProfileController->CreateUpdate($requestData);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function WebsiteProfileGet()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $BssWebsiteProfileController = $this->getBssWebsiteProfileController();
      $result = $BssWebsiteProfileController->list($requestData);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  /**
   * Header Required : Authorization-2
   * {"form_type": "required|in_list[contact_us,sales,support,career]","name": "required|max_length[255]","email": "required|max_length[255]|valid_email","mobile": "permit_empty|max_length[15]|integer","message": "permit_empty","attachment_blob": "permit_empty","attachment_url": "permit_empty|max_length[255]|valid_url","product_or_service_name": "permit_empty|max_length[255]","product_or_service_id": "permit_empty|integer"}
   * @return Response|string
   */
  public function FormSubmissionsCreate()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');

      $FormSubmissionsController = $this->getBssFormSubmissionsController();
      $result = $FormSubmissionsController->create($requestData);
      if ($result['status'] == ApiResponseStatusCode::CREATED) {
        $EmailController = $this->getEmailController();
        switch ($requestData['form_type']) {
          case 'contact_us':
            $EmailController->ContactUsTemplate($requestData);
            break;
          case 'sales':
            $EmailController->SalesFormTemplate($requestData);
            break;
          case 'support':
            $EmailController->CareerFormTemplate($requestData);
            break;
          case 'career':
            $EmailController->SupportFormTemplate($requestData);
            break;
        }
        $result = $EmailController->sendEmail();
      }
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  /**
   * Header Required : Authorization,Authorization-2
   * {"form_type": "in_list[contact_us,sales,support,career]"}
   * @return Response|string
   */
  public function FormSubmissionsList()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $FormSubmissionsController = $this->getBssFormSubmissionsController();
      $result = $FormSubmissionsController->list($requestData);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  /**
   * Header Required : Authorization,Authorization-2
   * {"firm_name": "required|max_length[255]","firm_slogan": "permit_empty","firm_logo_url": "permit_empty|valid_url","firm_address": "permit_empty","firm_owner_name": "permit_empty|max_length[255]","firm_cin_no": "permit_empty|max_length[255]","firm_gst_no": "permit_empty|max_length[255]","firm_pan_no": "permit_empty|max_length[255]","contact_mobile": "permit_empty|max_length[15]|integer","contact_email": "permit_empty|max_length[255]|valid_email","contact_whatsapp": "permit_empty|max_length[15]","sales_mobile": "permit_empty|max_length[15]|integer","sales_email": "permit_empty|max_length[255]|valid_email","sales_whatsapp": "permit_empty|max_length[15]","support_mobile": "permit_empty|max_length[15]|integer","support_email": "permit_empty|max_length[255]|valid_email","support_whatsapp": "permit_empty|max_length[15]","career_mobile": "permit_empty|max_length[15]|integer","career_email": "permit_empty|max_length[255]|valid_email","career_whatsapp": "permit_empty|max_length[15]","about_company": "permit_empty","about_owner": "permit_empty","terms_and_conditions_content": "permit_empty","privacy_and_policies_content": "permit_empty","disclaimer_content": "permit_empty","firm_address_gmap_url": "permit_empty|valid_url","website_url": "permit_empty|valid_url","play_store_url": "permit_empty|valid_url","app_store_url": "permit_empty|valid_url","facebook_url": "permit_empty|valid_url","instagram_url": "permit_empty|valid_url","twitter_url": "permit_empty|valid_url","linkedin_url": "permit_empty|valid_url","youtube_url": "permit_empty|valid_url","pinterest_url": "permit_empty|valid_url","telegram_url": "permit_empty|valid_url","google_search_url": "permit_empty|valid_url","email_smtp_host": "permit_empty|max_length[255]","email_smtp_port": "permit_empty|max_length[11]","email_smtp_user": "permit_empty|max_length[255]","email_smtp_password": "permit_empty|max_length[255]","email_smtp_crypto": "permit_empty|in_list[ssl,tls,]","email_from_email": "permit_empty|max_length[255]","email_from_name": "permit_empty|max_length[255]","bank_name": "permit_empty|max_length[255]","bank_acc_name": "permit_empty|max_length[255]","bank_acc_no": "permit_empty|max_length[255]","bank_ifsc_code": "permit_empty|max_length[255]","bank_acc_type": "permit_empty|max_length[255]","google_pay_upi": "permit_empty|max_length[255]","google_pay_number": "permit_empty|max_length[255]","phone_pay_upi": "permit_empty|max_length[255]","phone_pay_number": "permit_empty|max_length[255]","paytm_upi": "permit_empty|max_length[255]","paytm_number": "permit_empty|max_length[255]","amazonpay_upi": "permit_empty|max_length[255]","amazonpay_number": "permit_empty|max_length[255]","bhim_upi": "permit_empty|max_length[255]","bhim_number": "permit_empty|max_length[255]"}
   * @return Response|string
   */
  public function BlogPostCreate()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $BlogPostController = $this->getBssBlogPostController();
      $result = $BlogPostController->create($requestData);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function BlogPostGet($primaryKey)
  {
    try {
      $BlogPostController = $this->getBssBlogPostController();
      $result = $BlogPostController->get($primaryKey);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function SendBlogEmailToAllSubscribers($blog_id)
  {
    try {
      $BlogPostController = $this->getBssBlogPostController();
      $BlogData = $BlogPostController->get($blog_id);
      if ($BlogData['status'] != ApiResponseStatusCode::OK) {
        return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, "Blog Not Found", [], ['blog_id' => "Blog Detail Not Found"]);
      }
      $SuscribersList = $this->getBssSubscribersModel()->where('is_subscribe', 1)->findAll();
      $EmailSendResult = [];
      foreach ($SuscribersList as $Suscriber) {
        $EmailController = $this->getEmailController();
        $EmailController->BlogFormTemplate($BlogData);
        $EmailController->setEmail($Suscriber['email']);
        $EmailSendResult[] = $EmailController->sendEmail();
      }
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::OK, "Email Send To All Subscriber Successfully", [], $EmailController);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function BlogPostList()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $BlogPostController = $this->getBssBlogPostController();
      $result = $BlogPostController->list($requestData);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function BlogPostUpdate()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $BlogPostController = $this->getBssBlogPostController();
      $result = $BlogPostController->update($requestData, $requestData['id']);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function BlogPostDelete()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $BlogPostController = $this->getBssBlogPostController();
      $result = $BlogPostController->delete($requestData['id']);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function VisitorsCountGet()
  {
    $count = $this->getBssVisitorsModel()->countAllResults();
    $data = ['count' => $count];
    return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::OK, 'Visitor Count Fetch Successfully', $data, []);
  }
  public function VisitorsCreate()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $VisitorsController = $this->getBssVisitorsController();
      $resultData = $this->getBssVisitorsModel()->where('ip_address', $requestData['ip_address'])->findAll();
      if (!empty($resultData)) {
        return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, 'Already Visited', []);
      }
      $result = $VisitorsController->create($requestData);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function Subscribe()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $requestData = array_merge($requestData, ['is_subscribe' => 1]);
      $BssSubscribersController = $this->getBssSubscribersController();
      $resultData = $this->getBssSubscribersModel()->where('email', $requestData['email'])->first();
      if (!empty($resultData) &&  $resultData['is_subscribe'] == 1) {
        return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, 'Already Subscribed', []);
      }
      if (!empty($resultData) &&  $resultData['is_subscribe'] == 0) {
        $result = $BssSubscribersController->update($requestData, $resultData['id']);
      } else {
        $result = $BssSubscribersController->create($requestData);
      }
      $EmailController = $this->getEmailController();
      $EmailController->SubscribeFormTemplate($requestData);
      $EmailController->sendEmail();
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function UnSubscribe()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $requestData = array_merge($requestData, ['is_subscribe' => 0]);
      $BssSubscribersController = $this->getBssSubscribersController();
      $resultData = $this->getBssSubscribersModel()->where('email', $requestData['ip_address'])->first();
      if (!empty($resultData) &&  $resultData['is_subscribe'] == 1) {
        $BssSubscribersController->update($requestData, $resultData['id']);
        $EmailController = $this->getEmailController();
        $EmailController->UnSubscribeFormTemplate($requestData);
        $EmailController->sendEmail();
        return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::OK, 'UnSubscribe Successfully', []);
      }
      if (!empty($resultData) &&  $resultData['is_subscribe'] == 0) {
        return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, 'Already UnSubscribed', []);
      }
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, 'Not Subscribe Yet');
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function ProductAndServicesCreate()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $ProductAndServicesController = $this->getBssProductsServicesController();
      $result = $ProductAndServicesController->create($requestData);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function ProductAndServicesGet($primaryKey)
  {
    try {
      $ProductAndServicesController = $this->getBssProductsServicesController();
      $result = $ProductAndServicesController->get($primaryKey);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function ProductAndServicesList()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $ProductAndServicesController = $this->getBssProductsServicesController();
      $result = $ProductAndServicesController->list($requestData);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function ProductAndServicesUpdate()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $ProductAndServicesController = $this->getBssProductsServicesController();
      $result = $ProductAndServicesController->update($requestData, $requestData['id']);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function ProductAndServicesDelete()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $ProductAndServicesController = $this->getBssProductsServicesController();
      $result = $ProductAndServicesController->delete($requestData['id']);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function EmployeeCreate()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $EmployeeController = $this->getBssEmployeesController();
      $result = $EmployeeController->create($requestData);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function EmployeeGet($primaryKey)
  {
    try {
      $EmployeeController = $this->getBssEmployeesController();
      $result = $EmployeeController->get($primaryKey);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function EmployeeList()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $EmployeeController = $this->getBssEmployeesController();
      $result = $EmployeeController->list($requestData);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function EmployeeUpdate()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $EmployeeController = $this->getBssEmployeesController();
      $result = $EmployeeController->update($requestData, $requestData['id']);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function EmployeeDelete()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $EmployeeController = $this->getBssEmployeesController();
      $result = $EmployeeController->delete($requestData['id']);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function UploadFile()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $validation = \Config\Services::validation();

      // Define validation rules
      $validationRules = [
        'FolderName' => 'required',
        'FileType' => 'required',
        'FileBase64Encode' => 'required',
      ];

      // Set validation rules
      $validation->setRules($validationRules);

      // Run validation
      if (!$validation->run($requestData)) {
        // Validation failed
        return $this->response->setStatusCode(400)->setJSON(['success' => false, 'errors' => $validation->getErrors()]);
      } else {
        // Save the image data to a file
        $publicUploadsPath = FCPATH . 'uploads/company/' . $_SESSION['company_id'] . '/' . $requestData['FolderName'] . '/'; // Define the directory within the public folder

        // Create the directory if it doesn't exist
        if (!is_dir($publicUploadsPath)) {
          // Recursive directory creation
          if (!mkdir($publicUploadsPath, 0777, true)) {
            // Directory creation failed
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, 'Fail To Create Folder', []);
          }
        }
        $filePath = $publicUploadsPath . uniqid() . '.' . $requestData['FileType']; // Example file path
        $bytesWritten = file_put_contents($filePath, base64_decode($requestData['FileBase64Encode']));
        if ($bytesWritten == false) {
          return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, "Upload Failed", []);
        }
        $baseUrl = base_url();
        // Construct the file URL relative to the document root
        $fileUrl = str_replace(FCPATH, '', $filePath);
        return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::OK, "Uploaded Successfully", ['fileUrl' => $baseUrl . $fileUrl]);
      }
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }

  public function MediaGalleryCreate()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $imageData = base64_decode($requestData['media']);
      if ($imageData !== false) {
        // Save the image data to a file
        $filePath = WRITEPATH . 'uploads/' . uniqid() . '.jpg'; // Example file path
        $bytesWritten = file_put_contents($filePath, $imageData);
      }
      $MediaGalleryController = $this->getBssMediaGalleryController();
      $result = $MediaGalleryController->create($requestData);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function MediaGalleryGet($primaryKey)
  {
    try {
      $MediaGalleryController = $this->getBssMediaGalleryController();
      $result = $MediaGalleryController->get($primaryKey);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function MediaGalleryList()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $MediaGalleryController = $this->getBssMediaGalleryController();
      $result = $MediaGalleryController->list($requestData);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function MediaGalleryUpdate()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $MediaGalleryController = $this->getBssMediaGalleryController();
      $result = $MediaGalleryController->update($requestData, $requestData['id']);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function MediaGalleryDelete()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $MediaGalleryController = $this->getBssMediaGalleryController();
      $result = $MediaGalleryController->delete($requestData['id']);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function ClientCreate()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $ClientsController = $this->getBssClientsController();
      $result = $ClientsController->create($requestData);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function ClientGet($primaryKey)
  {
    try {
      $ClientsController = $this->getBssClientsController();
      $result = $ClientsController->get($primaryKey);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function ClientList()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $ClientsController = $this->getBssClientsController();
      $result = $ClientsController->list($requestData);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function ClientUpdate()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $ClientsController = $this->getBssClientsController();
      $result = $ClientsController->update($requestData, $requestData['id']);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function ClientDelete()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $ClientsController = $this->getBssClientsController();
      $result = $ClientsController->delete($requestData['id']);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function DashboardGet()
  {
    try {
      $result = [];
      $result['count']['Visitor'] = $this->getBssVisitorsModel()->countAllResults();
      $result['count']['Blog'] = $this->getBssBlogPostModel()->countAllResults();
      $result['Blog'] = $this->getBssBlogPostModel()->orderBy('created_at', 'desc')->findAll(5);
      $result['count']['Sales'] = $this->getBssFormSubmissionsModel()->where('form_type', 'sales')->countAllResults();
      $result['Sales'] = $this->getBssFormSubmissionsModel()->where('form_type', 'sales')->orderBy('created_at', 'desc')->findAll(5);
      $result['count']['Support'] = $this->getBssFormSubmissionsModel()->where('form_type', 'support')->countAllResults();
      $result['Support'] = $this->getBssFormSubmissionsModel()->where('form_type', 'support')->orderBy('created_at', 'desc')->findAll(5);
      $result['count']['Career'] = $this->getBssFormSubmissionsModel()->where('form_type', 'career')->countAllResults();
      $result['Career'] = $this->getBssFormSubmissionsModel()->where('form_type', 'career')->orderBy('created_at', 'desc')->findAll(5);
      $result['count']['Contact Us'] = $this->getBssFormSubmissionsModel()->where('form_type', 'contact_us')->countAllResults();
      $result['Contact Us'] = $this->getBssFormSubmissionsModel()->where('form_type', 'contact_us')->orderBy('created_at', 'desc')->findAll(5);

      $result['count']['Subscribe'] = $this->getBssSubscribersModel()->countAllResults();
      $result['count']['Team'] = $this->getBssEmployeesModel()->countAllResults();
      $result['Enquiry'] = $this->getBssEmployeesModel()->orderBy('created_at', 'desc')->findAll(5);
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::OK, 'Dashboard Get Successfuly', $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
}
