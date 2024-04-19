<?php
// app/Filters/InnerFilter.php

namespace App\Filters;

use ApiResponseStatusCode;
use App\Traits\CommonTraits;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class BssClientWebFilter implements FilterInterface
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
            'Authorization-2' => ($request->hasHeader('Authorization-2')) ? $request->getHeaderLine('Authorization-2') : null,
        ];

        // Check header validation
        $result = $this->checkValidation($AuthHeader);
        if (!$result['status']) {
            return formatApiResponse($request, $response, ApiResponseStatusCode::UNAUTHORIZED, "Header Security Failed", [], $result['errors']);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // This method can be used for post-processing if needed
        // For example, logging or modifying the response
        return $response;
    }
    protected function checkValidation(array $AuthHeader)
    {
        $validationRules = [
            'Authorization-2' => 'required',
        ];

        $validationMessages = [
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
}
