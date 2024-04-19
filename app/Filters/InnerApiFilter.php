<?php
// app/Filters/InnerFilter.php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class InnerApiFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH, OPTIONS");
        header("Access-Control-Allow-Headers: Authorization, Authorization-2, Content-Type, Accept");
        header("Access-Control-Allow-Credentials: true"); // Allow credentials
        if (!session()->has('user')) {
            // Redirect user to login page
            return redirect()->to('/login');
        }
        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // This method can be used for post-processing if needed
        // For example, logging or modifying the response
        return $response;
    }
}
