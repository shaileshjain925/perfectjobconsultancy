<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function login()
    {
        $data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Login'])
		];
		return view('AdminPanelNew/pages/Auth/login', $data);
    }
    public function forget_password()
    {
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Recover_Password'])
		];
		return view('pages-recoverpw', $data);
    }
}
