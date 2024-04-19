<?php
// app/Filters/InnerFilter.php

namespace App\Filters;

use ApiResponseStatusCode;
use App\Traits\CommonTraits;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class BssClientAppFilter implements FilterInterface
{
    use CommonTraits;
    public function before(RequestInterface $request, $arguments = null)
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH, OPTIONS");
        header("Access-Control-Allow-Headers: Authorization, Authorization-2, Content-Type, Accept");
        header("Access-Control-Allow-Credentials: true"); // Allow credentials
        $response = Services::response();

        // Get Authorization headers
        $AuthHeader = [
            'Authorization' => ($request->hasHeader('Authorization')) ? $request->getHeaderLine('Authorization') : "",
            'Authorization-2' => ($request->hasHeader('Authorization-2')) ? $request->getHeaderLine('Authorization-2') : null,
        ];

        // Check header validation
        $result = $this->checkValidation($AuthHeader);
        if (!$result['status']) {
            return formatApiResponse($request, $response, ApiResponseStatusCode::UNAUTHORIZED, "Header Security Failed", [], $result['errors']);
        }

        // Decode JWT token
        $jwtDecodedData = (array) $this->checkJwtTokenDecode($AuthHeader['Authorization']);
        if (empty($jwtDecodedData)) {
            return formatApiResponse($request, $response, ApiResponseStatusCode::FORBIDDEN, ' Authorization Token Invalid');
        }

        // Check Authorization-2 header
        if ($AuthHeader['Authorization-2'] != $jwtDecodedData['api_token']) {
            return formatApiResponse($request, $response, ApiResponseStatusCode::FORBIDDEN, 'Authorization-2 Header Invalid');
        }

        // Check token existence in the database
        $databaseToken = $this->getCompanyUserTokenController()->list(['jwt_token' => $AuthHeader['Authorization']]);
        if ($databaseToken['status'] != ApiResponseStatusCode::OK) {
            return formatApiResponse($request, $response, ApiResponseStatusCode::FORBIDDEN, 'Token Not Found in System');
        }

        // Check token expiry
        if (strtotime($databaseToken['data'][0]['token_expiry_date']) < strtotime(date('Y-m-d H:i:s'))) {
            $this->getCompanyUserTokenController()->delete($databaseToken['data'][0]['id']);
            return formatApiResponse($request, $response, ApiResponseStatusCode::FORBIDDEN, 'Token Expired');
        }
        $serializedArray = urldecode($arguments[0] ?? '');
        $routeMenuData = unserialize($serializedArray);
        if(!empty($jwtDecodedData['role_id']) && !empty($routeMenuData)){
            if(!CheckRoleWiseMenuAccess($jwtDecodedData['role_id'],$routeMenuData['menu_id'],$routeMenuData['action_type'])){
                return formatApiResponse($request, $response, ApiResponseStatusCode::FORBIDDEN, 'Not Aurthorised To Access This Menu');
            }
        }
        // Set JWT decoded data to session
        session()->set($jwtDecodedData);
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // This method can be used for post-processing if needed
        // For example, logging or modifying the response
        $jwt = $request->getHeaderLine('Authorization');
        if (!empty($jwt)) {
            session()->destroy();
        }
        return $response;
    }
    protected function checkValidation(array $AuthHeader)
    {
        $validationRules = [
            'Authorization' => 'required',
            'Authorization-2' => 'required',
        ];

        $validationMessages = [
            'Authorization' => [
                'required' => 'Authorization Header required',
            ],
            'Authorization-2' => [
                'required' => 'Authorization-2 Header required',
            ],
        ];

        $validator = \Config\Services::validation();
        $validator->setRules($validationRules, $validationMessages);

        // Perform validation on your data
        if (!$validator->run($AuthHeader)) {
            return ['status' => false, 'errors' => $validator->getErrors()];
        } else {
            return ['status' => true, 'errors' => []];
        }
    }
    protected function checkJwtTokenDecode($jwt)
    {
        try {
            return \Firebase\JWT\JWT::decode($jwt, new \Firebase\JWT\Key($_ENV['JWT_CLIENT_KEY'], 'HS256'));
        } catch (\Throwable $th) {
            return null;
        }
    }
}
