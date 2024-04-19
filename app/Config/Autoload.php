<?php

namespace Config;

use CodeIgniter\Config\AutoloadConfig;

/**
 * -------------------------------------------------------------------
 * AUTOLOADER CONFIGURATION
 * -------------------------------------------------------------------
 *
 * This file defines the namespaces and class maps so the Autoloader
 * can find the files as needed.
 *
 * NOTE: If you use an identical key in $psr4 or $classmap, then
 *       the values in this file will overwrite the framework's values.
 *
 * NOTE: This class is required prior to Autoloader instantiation,
 *       and does not extend BaseConfig.
 *
 * @immutable
 */
class Autoload extends AutoloadConfig
{
    /**
     * -------------------------------------------------------------------
     * Namespaces
     * -------------------------------------------------------------------
     * This maps the locations of any namespaces in your application to
     * their location on the file system. These are used by the autoloader
     * to locate files the first time they have been instantiated.
     *
     * The '/app' and '/system' directories are already mapped for you.
     * you may change the name of the 'App' namespace if you wish,
     * but this should be done prior to creating any namespaced classes,
     * else you will need to modify all of those classes for this to work.
     *
     * Prototype:
     *   $psr4 = [
     *       'CodeIgniter' => SYSTEMPATH,
     *       'App'         => APPPATH
     *   ];
     *
     * @var array<string, array<int, string>|string>
     * @phpstan-var array<string, string|list<string>>
     */
    public $psr4 = [
        'CodeIgniter' => SYSTEMPATH,
        APP_NAMESPACE => APPPATH, // For custom app namespace
        'Config'      => APPPATH . 'Config',
    ];

    public $modulesDirectory = APPPATH . 'Modules/';
    function scanModulesDirectory($directory, $namespacePrefix, &$psr4)
    {
        $dirs = scandir($directory);

        foreach ($dirs as $dir) {
            if ($dir !== '.' && $dir !== '..') {
                $fullPath = $directory . '/' . $dir;

                if (is_dir($fullPath)) {
                    // Generate the PSR-4 mapping for the module
                    $namespacePrefix = str_replace(APP_NAMESPACE.'/', "", $namespacePrefix);
                    $moduleNamespace = $namespacePrefix . '/' . $dir;
                    $moduleNamespace = APP_NAMESPACE . '/' . $moduleNamespace;
                    $modulePath = $fullPath;
                    $modulePath = str_replace('//', '/', $modulePath);
                    // Add the PSR-4 mapping to the array
                    $psr4[$moduleNamespace] = $modulePath;

                    // Recursively scan submodules
                    $this->scanModulesDirectory($fullPath, $moduleNamespace, $psr4);
                }
            }
        }
    }


    public function __construct()
    {
        // Start scanning the Modules directory
        $this->scanModulesDirectory($this->modulesDirectory, 'Modules', $this->psr4);
        // echo "<pre>";
        // print_r($this->psr4);
    }

    /**
     * -------------------------------------------------------------------
     * Class Map
     * -------------------------------------------------------------------
     * The class map provides a map of class names and their exact
     * location on the drive. Classes loaded in this manner will have
     * slightly faster performance because they will not have to be
     * searched for within one or more directories as they would if they
     * were being autoloaded through a namespace.
     *
     * Prototype:
     *   $classmap = [
     *       'MyClass'   => '/path/to/class/file.php'
     *   ];
     *
     * @var array<string, string>
     */
    public $classmap = [];

    /**
     * -------------------------------------------------------------------
     * Files
     * -------------------------------------------------------------------
     * The files array provides a list of paths to __non-class__ files
     * that will be autoloaded. This can be useful for bootstrap operations
     * or for loading functions.
     *
     * Prototype:
     *   $files = [
     *       '/path/to/my/file.php',
     *   ];
     *
     * @var string[]
     * @phpstan-var list<string>
     */
    public $files = [];

    /**
     * -------------------------------------------------------------------
     * Helpers
     * -------------------------------------------------------------------
     * Prototype:
     *   $helpers = [
     *       'form',
     *   ];
     *
     * @var string[]
     * @phpstan-var list<string>
     */
    public $helpers = ['auth', 'setting', 'url', 'commonfunction_helper', 'select_helper', 'module_helper'];
}
