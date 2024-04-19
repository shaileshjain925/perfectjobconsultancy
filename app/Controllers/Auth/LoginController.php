<?php

declare(strict_types=1);

/**
 * This file is part of CodeIgniter Shield.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace App\Controllers\Auth;

use ApiResponseStatusCode;
use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Shield\Authentication\Authenticators\Session;
use CodeIgniter\Shield\Traits\Viewable;
use CodeIgniter\Shield\Validation\ValidationRules;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Shield\Authentication\JWTManager;




class LoginController extends BaseController
{
    use Viewable;
    use ResponseTrait;
    private $userModel = "";
    private $googleClient = "";
    public function __construct()
    {
        $this->userModel = new UserModel;
        $this->googleClient = new \Google_Client();
        $this->googleClient->setClientId('146572695823-321am37pmh96qj0v3e8fhgb7h7k5ab01.apps.googleusercontent.com');
        $this->googleClient->setClientSecret('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');
        $this->googleClient->setRedirectUri('http://localhost/googleAuth/LoginByGoogle');
        $this->googleClient->addScope('email');
        $this->googleClient->addScope('profile');
    }
    /**
     * Authenticate Existing User and Issue JWT.
     */
    public function jwtLogin()
    {
        // Get the validation rules
        $rules = $this->getValidationRules();

        // Validate credentials
        if (!$this->validateData($this->request->getJSON(true), $rules, [], config(\Config\Auth::class)->DBGroup)) {
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::VALIDATION_FAILED, 'Login Failed', [], $this->validator->getErrors());
        }

        // Get the credentials for login
        $credentials             = $this->request->getJsonVar(setting('Auth.validFields'));
        $credentials             = array_filter($credentials);
        $credentials['password'] = $this->request->getJsonVar('password');

        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        // Check the credentials
        $result = $authenticator->check($credentials);

        // Credentials mismatch.
        if (!$result->isOK()) {
            // @TODO Record a failed login attempt
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, 'Login Failed', [], $result->reason());
            // return $this->failUnauthorized($result->reason());
        }

        // Credentials match.
        // @TODO Record a successful login attempt

        $user = $result->extraInfo();

        $claims = [
            'iat' => time(),     // Issued At claim
            'email' => $user->email, // Custom claim
            // Add any other custom claims here
        ];

        /** @var JWTManager $manager */
        $manager = service('jwtmanager');

        // Generate JWT and return to client
        $jwt = $manager->generateToken($user, $claims, 3600);
        return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::OK, 'Login Successfully', ['access_token' => $jwt,]);
    }

    /**
     * Displays the form the login to the site.
     *
     * @return RedirectResponse|string
     */
    public function loginView()
    {
        if (auth()->loggedIn()) {
            return redirect()->to(config(\Config\Auth::class)->loginRedirect());
        }

        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        // If an action has been defined, start it up.
        if ($authenticator->hasAction()) {
            return redirect()->route('auth-action-show');
        }
        // return $this->view(setting('Auth.views')['login'], ["google_link" => $this->googleClient->createAuthUrl()]);
        return $this->view(setting('Auth.views')['login'], []);
    }
    // public function loginByGoogle()
    // {
    //     $code = $this->request->getVar('code');
    //     $token = $this->googleClient->fetchAccessTokenWithAuthCode($code);

    //     if (!isset($token['error'])) {
    //         $this->googleClient->setAccessToken($token['access_token']);
    //         session()->set("Access-Token", $token['access_token']);
    //         $googleService = new Oauth2($this->googleClient);
    //         $data = $googleService->userinfo->get();

    //         // Check if the email exists in the auth_identities table
    //         $userModel = new UserModel;
    //         $userData = $userModel->findByCredentials(['email' => $data['email']]);
    //         if(!empty($userData)){

    //         }else{

    //         }
    //         dd($userData);
    //     } else {
    //         return redirect()->to('login')->with('message', 'Something went wrong');
    //     }
    // }


    /**
     * Attempts to log the user in.
     */
    public function loginAction(): RedirectResponse
    {
        // Validate here first, since some things,
        // like the password, can only be validated properly here.
        $rules = $this->getValidationRules();

        if (!$this->validateData($this->request->getPost(), $rules, [], config(\Config\Auth::class)->DBGroup)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        /** @var array $credentials */
        $credentials             = $this->request->getPost(setting('Auth.validFields')) ?? [];
        $credentials             = array_filter($credentials);
        $credentials['password'] = $this->request->getPost('password');
        $remember                = (bool) $this->request->getPost('remember');

        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        // Attempt to login
        $result = $authenticator->remember($remember)->attempt($credentials);
        if (!$result->isOK()) {
            return redirect()->route('login')->withInput()->with('error', $result->reason());
        }

        // If an action has been defined for login, start it up.
        if ($authenticator->hasAction()) {
            return redirect()->route('auth-action-show')->withCookies();
        }

        return redirect()->to(config(\Config\Auth::class)->loginRedirect())->withCookies();
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

        return $rules->getLoginRules();
    }

    /**
     * Logs the current user out.
     */
    public function logoutAction(): RedirectResponse
    {
        // Capture logout redirect URL before auth logout,
        // otherwise you cannot check the user in `logoutRedirect()`.
        $url = config(\Config\Auth::class)->loginRedirect();

        auth()->logout();

        return redirect()->to($url)->with('message', lang('Auth.successLogout'));
    }
}
