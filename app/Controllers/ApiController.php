<?php

namespace App\Controllers;

use ApiResponseStatusCode;
use App\Controllers\BaseController;
use CodeIgniter\Events\Events;
use App\Models\UserModel;
use CodeIgniter\Shield\Authentication\Authenticators\Session;
use CodeIgniter\Shield\Validation\ValidationRules;
use CodeIgniter\Shield\Exceptions\ValidationException;
use CodeIgniter\Shield\Entities\User;
use Exception;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\Response;

class ApiController extends BaseController
{
  use ResponseTrait;
  public function handleOptionsRequest()
  {
    return $this->response->setStatusCode(Response::HTTP_OK);
  }
  
  public function ModelGet($modelName, $primaryKey)
  {
    try {
      $MI = $this->{"get" . $modelName}();
      $result = $MI->RecordGet($primaryKey);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function ModelList($modelName)
  {
    try {
      $filter = getRequestData($this->request, 'ARRAY');
      $MI = $this->{"get" . $modelName}();
      $result = $MI->RecordList($filter);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function ModelCreate($modelName)
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $MI = $this->{"get" . $modelName}();
      $result = $MI->RecordCreate($requestData);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function ModelUpdate($modelName)
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $MI = $this->{"get" . $modelName}();
      $result = $MI->RecorUpdate($requestData, $requestData[$MI->getPrimaryKey()]);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function ModelDelete($modelName)
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $MI = $this->{"get" . $modelName}();
      $result = $MI->RecordDelete($requestData[$MI->getPrimaryKey()]);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function AuthRegistration()
  {
    try {
      // Check if registration is allowed
      if (!setting('Auth.allowRegistration')) {
        return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::UNAUTHORIZED, lang('Auth.registerDisabled'), [], ['error' => lang('Auth.registerDisabled')]);
      }
      // Get Model Instance of User
      $users = $this->getUserProvider();

      // Validate here first, since some things,
      // like the password, can only be validated properly here.
      $rules = $this->getValidationRules();

      if (!$this->validateData($this->request->getJSON(true), $rules, [], config(\Config\Auth::class)->DBGroup)) {
        return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::VALIDATION_FAILED, "Validation Failed", [], $this->validator->getErrors());
      }

      // Save the user
      $allowedPostFields = array_keys($rules);
      $user              = $this->getUserEntity();
      // Get JSON data from the request
      $requestData = $this->request->getJSON(true);

      $filteredData = array_intersect_key($requestData, array_flip($allowedPostFields));

      $user->fill($filteredData);

      if ($user->username === null) {
        $user->username = null;
      }

      try {
        $users->save($user);
      } catch (ValidationException $e) {
        return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::VALIDATION_FAILED, "User Not Saved Validation Failed", [], $users->errors());
      }

      $user = $users->findById($users->getInsertID());

      $users->addToDefaultGroup($user);

      Events::trigger('register', $user);

      /** @var Session $authenticator */
      $authenticator = auth('session')->getAuthenticator();

      $authenticator->startLogin($user);

      // If an action has been defined for register, start it up.
      $hasAction = $authenticator->startUpAction('register', $user);
      if ($hasAction) {
        return redirect()->route('auth-action-show');
      }

      // Set the user active
      $user->activate();

      $authenticator->completeLogin($user);

      // Success!
      return redirect()->to(config(\Config\Auth::class)->registerRedirect())
        ->with('message', lang('Auth.registerSuccess'));
    } catch (Exception $e) {
    }
  }
  /**
   * Returns the rules that should be used for validation.
   *
   * @return         array<string, array<string, array<string>|string>>
   * @phpstan-return array<string, array<string, string|list<string>>>
   */
  protected function getValidationRules(): array
  {
    $rules = new ValidationRules();

    return $rules->getRegistrationRules();
  }
  /**
   * Returns the User provider
   */
  protected function getUserProvider(): UserModel
  {
    $provider = model(setting('Auth.userProvider'));

    assert($provider instanceof UserModel, 'Config Auth.userProvider is not a valid UserProvider.');

    return $provider;
  }

  /**
   * Returns the Entity class that should be used
   */
  protected function getUserEntity(): User
  {
    return new User();
  }
  public function getCountry()
  {
    $requestData = getRequestData($this->request, 'ARRAY');
    $CountryModel = $this->getCountryModel();
    if (array_key_exists('search', $requestData)) {
      $CountryModel->like('name', $requestData['search']);
    }
    $countries = $CountryModel->findAll();
    return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::OK, "Country Fetch Successfully", $countries);
  }
  public function getState()
  {
    $requestData = getRequestData($this->request, 'ARRAY');
    $StateModel = $this->getStateModel();
    if (array_key_exists('search', $requestData)) {
      $StateModel->like('name', $requestData['search']);
    }
    if (array_key_exists('country_id', $requestData)) {
      $StateModel->where('country_id', $requestData['country_id']);
    }
    $states = $StateModel->findAll();
    return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::OK, "State Fetch Successfully", $states);
  }
  public function getCity()
  {
    $requestData = getRequestData($this->request, 'ARRAY');
    $CityModel = $this->getCityModel();
    if (array_key_exists('search', $requestData)) {
      $CityModel->like('name', $requestData['search']);
    }
    if (array_key_exists('state_id', $requestData)) {
      $CityModel->where('state_id', $requestData['state_id']);
    }
    $cities = $CityModel->findAll();
    return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::OK, "City Fetch Successfully", $cities);
  }
  public function RoleCreate()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $RoleController = $this->getRoleController();
      $result = $RoleController->create($requestData);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function RoleMenuAccessRightsCreate()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $RoleMenuAccessRightsController = $this->getRoleMenuAccessRightsController();
      $result = $RoleMenuAccessRightsController->create($requestData);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function RoleGet($primaryKey)
  {
    try {
      $RoleController = $this->getRoleController();
      $result = $RoleController->get($primaryKey);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function RoleList()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $RoleController = $this->getRoleController();
      $result = $RoleController->list($requestData);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function RoleUpdate()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $RoleController = $this->getRoleController();
      $result = $RoleController->update($requestData, $requestData['role_id']);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function RoleDelete()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $RoleController = $this->getRoleController();
      $result = $RoleController->delete($requestData['role_id']);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function CompanyCreate()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $CompanyController = $this->getCompanyController();
      $result = $CompanyController->create($requestData);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function CompanyGet($primaryKey)
  {
    try {
      $CompanyController = $this->getCompanyController();
      $result = $CompanyController->get($primaryKey);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function CompanyList()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $CompanyController = $this->getCompanyController();
      $result = $CompanyController->list($requestData);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function CompanyUpdate()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $CompanyController = $this->getCompanyController();
      $result = $CompanyController->update($requestData, $requestData['company_id']);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function CompanyDelete()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $CompanyController = $this->getCompanyController();
      $result = $CompanyController->delete($requestData['company_id']);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }

  public function CompanyUserCreate()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $CompanyUserController = $this->getCompanyUserController();
      $result = $CompanyUserController->create($requestData);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function CompanyMigrate()
  {
    try {
      $CompanyController = $this->getCompanyController();
      $result = $CompanyController->migrate();
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::OK, $e->getMessage(), []);
    }
  }
  public function CompanyUserGet($primaryKey)
  {
    try {
      $CompanyUserController = $this->getCompanyUserController();
      $result = $CompanyUserController->get($primaryKey);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function CompanyUserList()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $CompanyUserController = $this->getCompanyUserController();
      $result = $CompanyUserController->list($requestData);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function CompanyUserUpdate()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $CompanyUserController = $this->getCompanyUserController();
      $result = $CompanyUserController->update($requestData, $requestData['company_user_id']);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function CompanyUserDelete()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $CompanyUserController = $this->getCompanyUserController();
      $result = $CompanyUserController->delete($requestData['company_user_id']);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
  public function CityCreate()
  {
    try {
      $requestData = getRequestData($this->request, 'ARRAY');
      $CityController = $this->getCityController();
      $result = $CityController->create($requestData);
      return formatApiAutoResponse($this->request, $this->response, $result);
    } catch (Exception $e) {
      return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
    }
  }
}
