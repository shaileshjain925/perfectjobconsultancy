<?php

namespace App\Validation;

use App\Controllers\ModuleGeneratorController;

class CustomRules
{
    public function verifyModulePath($modulePath, $moduleType, $data = null, &$error): bool
    {
        $ModuleGeneratorController = new ModuleGeneratorController();
        $Namespacess = $ModuleGeneratorController->getNamespace($moduleType,$modulePath);
        foreach ($Namespacess as $key => $Namespace) {
            if (class_exists($Namespace.'/'.$Namespacess['ModuleName'].$key)) {
                $error = "{$Namespace} Class Already Exiest";
                return false;
            }
        }
        $Filespath = $ModuleGeneratorController->getFilesPath($moduleType,$modulePath);
        foreach ($Filespath as $Filepath) {
            if (file_exists($Filepath)) {
                $error = "File Already Exiest ({$Filepath})";
                return false;
            }
        }
        return true;
    }
}
