<?php

namespace Config;

use CodeIgniter\Database\Config;

/**
 * Database Configuration
 */
class Database extends Config
{
    /**
     * The directory that holds the Migrations
     * and Seeds directories.
     */
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    /**
     * Lets you choose which connection group to
     * use if no other is specified.
     */
    public string $defaultGroup = 'default';

    /**
     * The default database connection.
     */
    public array $default = [
        'DSN'          => '',
        'hostname'     => 'localhost',
        'username'     => 'root',
        'password'     => '',
        'database'     => 'yecoabmy_wb_essential_db',
        'DBDriver'     => 'MySQLi',
        'DBPrefix'     => '',
        'pConnect'     => false,
        'DBDebug'      => true,
        'charset'      => 'utf8',
        'DBCollat'     => 'utf8_general_ci',
        'swapPre'      => '',
        'encrypt'      => false,
        'compress'     => false,
        'strictOn'     => false,
        'failover'     => [],
        'port'         => 3306,
        'numberNative' => false,
    ];
    
    public array $custom_group = [
        'DSN'          => '',
        'hostname'     => 'localhost',
        'username'     => 'root',
        'password'     => '',
        'database'     => 'yecoabmy_wb_essential_db',
        'DBDriver'     => 'MySQLi',
        'DBPrefix'     => '',
        'pConnect'     => false,
        'DBDebug'      => true,
        'charset'      => 'utf8',
        'DBCollat'     => 'utf8_general_ci',
        'swapPre'      => '',
        'encrypt'      => false,
        'compress'     => false,
        'strictOn'     => false,
        'failover'     => [],
        'port'         => 3306,
        'numberNative' => false,
    ];
    /**
     * This database connection is used when
     * running PHPUnit database tests.
     */
    public array $tests = [
        'DSN'         => '',
        'hostname'    => '127.0.0.1',
        'username'    => '',
        'password'    => '',
        'database'    => ':memory:',
        'DBDriver'    => 'SQLite3',
        'DBPrefix'    => 'db_',  // Needed to ensure we're working correctly with prefixes live. DO NOT REMOVE FOR CI DEVS
        'pConnect'    => false,
        'DBDebug'     => true,
        'charset'     => 'utf8',
        'DBCollat'    => 'utf8_general_ci',
        'swapPre'     => '',
        'encrypt'     => false,
        'compress'    => false,
        'strictOn'    => false,
        'failover'    => [],
        'port'        => 3306,
        'foreignKeys' => true,
        'busyTimeout' => 1000,
    ];

    public function __construct()
    {
        $this->custom_group["hostname"] = $_ENV['database.default.hostname'];
        $this->custom_group["username"] = $_ENV['database.default.username'];
        $this->custom_group["password"] = $_ENV['database.default.password'];
        $this->custom_group["database"] = $_ENV['database.default.database'];
        $this->custom_group["port"] = $_ENV['database.default.port'];

        $this->default["hostname"] = $_ENV['database.default.hostname'];
        $this->default["username"] = $_ENV['database.default.username'];
        $this->default["password"] = $_ENV['database.default.password'];
        $this->default["database"] = $_ENV['database.default.database'];
        $this->default["port"] = $_ENV['database.default.port'];

        // Call getCustomDatabaseConnection function and assign its result to custom_group
        $request = service('request');

        // Check if the 'Authorization-2' header exists and is not empty
        if ($request->hasHeader('Authorization-2')) {
            $authorization2Header = $request->getHeaderLine('Authorization-2');

            // Handle the authorization header as needed
            // For example, check if it has a valid value and proceed accordingly
            if (!empty($authorization2Header)) {
                // The Authorization-2 header exists and is not empty
                // Proceed with your logic here
                $this->custom_group = getCustomDatabaseConnection($authorization2Header);
            }
        }
        // Ensure that we always set the database group to 'tests' if
        // we are currently running an automated test suite, so that
        // we don't overwrite live data on accident.
        if (ENVIRONMENT === 'testing') {
            $this->defaultGroup = 'tests';
        }
    }
}
