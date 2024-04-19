<?php
// app/Filters/InnerFilter.php

namespace App\Filters;

use ApiResponseStatusCode;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class OuterApiFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Check Login Session Exiest
        // if True 
        // else Check JWT
        // Implement your authentication logic here
        // For example, check if the user is logged in
        // If authentication is successful, return null
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH, OPTIONS");
        header("Access-Control-Allow-Headers: Authorization, Authorization-2, Content-Type, Accept");
        header("Access-Control-Allow-Credentials: true"); // Allow credentials
        return null;
        $response = Services::response();
        $jwt = $request->getHeaderLine('Authorization');
        if (!empty($jwt)){
            try {
                $jwtDecodedData = \Firebase\JWT\JWT::decode($jwt,new \Firebase\JWT\Key($_ENV['JWT_CLIENT_KEY'], 'HS256'));  
                if(is_object(($jwtDecodedData))){
                    session()->set((array) $jwtDecodedData);
                }else{
                    session()->set($jwtDecodedData);
                }
                
            } catch (\Exception $e) {
                return formatApiResponse($request,$response,ApiResponseStatusCode::FORBIDDEN,"Invalid Token::".$e->getMessage());
            }
            
        }else{
            return formatApiResponse($request,$response,ApiResponseStatusCode::FORBIDDEN,'Session Or Jwt Token Not Found');
        }

        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // This method can be used for post-processing if needed
        // For example, logging or modifying the response
        $jwt = $request->getHeaderLine('Authorization');
        if (!empty($jwt)){
            session()->destroy();
        }
        return $response;
    }
}
