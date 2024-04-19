<?php

// app/Config/AuthJWT.php

namespace Config;

use CodeIgniter\Shield\Config\AuthJWT as ShieldAuthJWT;

/**
 * JWT Authenticator Configuration
 */
class AuthJWT extends ShieldAuthJWT
{
    /**
     * Secret key to encode/decode JWT tokens.
     *
     * @var string
     */
    public $key = 'your_secret_key_here';

    /**
     * Token expiration time (in seconds).
     *
     * @var int
     */
    public $ttl = 3600; // 1 hour

    /**
     * Supported algorithms for JWT tokens.
     *
     * @var array
     */
    public $supportedAlgs = ['HS256'];

    /**
     * Authentication header name for JWT tokens.
     *
     * @var string
     */
    public $tokenHeader = 'Authorization';

    /**
     * --------------------------------------------------------------------------
     * JWT Configuration
     * --------------------------------------------------------------------------
     *
     * Settings related to JWT authentication.
     *
     * @var array<string, string>
     */
    public array $defaultClaims = [
        'iss' => 'https://codeigniter.com/',
    ];


    public int $recordLoginAttempt = Auth::RECORD_LOGIN_ATTEMPT_ALL;

    public function __construct()
    {
        $this->key = $_ENV['JWT_SECRET_KEY'];
        parent::__construct();
    }
}
