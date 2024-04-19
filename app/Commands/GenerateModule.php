<?php

namespace App\Commands;

use App\Controllers\ModuleGeneratorController;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class GenerateModule extends BaseCommand
{
    protected $group = 'custom';
    protected $name = 'generate:module';
    protected $description = 'Generate a CodeIgniter 4 module';
    public function __construct()
    {
        helper('inflector');
    }
    public function run(array $params)
    {
        $data = [
            "ModuleType" => 'mvc',
            "ModulePath" => '',
        ];
        $this->printInfo();
        if (!empty($params)) {
            if ($params[0] == 'hmvc' || $params[0] == 'mvc') {
                $data['ModuleType'] = $params[0];
            } else {
                CLI::write("parameter1 should be requided 'hmvc' or 'mvc'", 'red');
                CLI::write("hmvc: Hierarchical Model View Controller.", 'blue');
                CLI::write("mvc: Model View Controller.", 'blue');
                CLI::write("generate:module {parameter1} {parameter2}", 'blue');
                return;
            }
            if (!isset($params[1])) {
                CLI::write("Path/ModelName: Model Name Should be requided in parameter2", 'red');
                CLI::write("generate:module {parameter1} {parameter2}", 'blue');
                return;
            }
            $data['ModulePath'] = $params[0];
            $data['StructureOnly'] = 'true';
            $result = $this->createModuleDummy($data);
            $this->printResult($result[0]);
        } else {
            CLI::write("parameter1 should be requided 'hmvc' or 'mvc'", 'red');
            CLI::write("hmvc: Hierarchical Model View Controller.", 'blue');
            CLI::write("mvc: Model View Controller.", 'blue');
            CLI::write("Path/ModelName: Model Name Should be requided in parameter2", 'red');
            CLI::write("generate:module {parameter1} {parameter2}", 'blueclea');
            return;
        }
    }

    protected function printInfo()
    {
        CLI::write("Project Folder: " . ROOTPATH);
    }

    protected function printResult(array $data)
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $this->printResult($value);
            }
            CLI::write("$key: $value");
        }
    }

    public function createModuleDummy(array &$data): array
    {
        $ModuleGeneratorController = new ModuleGeneratorController();
        $data['Namespacess'] = $ModuleGeneratorController->getNamespace($data['ModuleType'], $data['ModulePath']);
        $data['Filespath'] = $ModuleGeneratorController->getFilesPath($data['ModuleType'], $data['ModulePath']);
        if ($data['StructureOnly'] == 'true') {
            $this->createDummyFile($data);
        }
        return [];
    }

    public function createDummyFile(array &$data)
    {
        // Migration File Create
        if ($this->fileCreateWithContent($data["Filespath"]["MigrationFilePath"], $this->MigrationDummyContent($data))) {
            $data["success"][] = [
                "success_message" => "Migration File Created Successfully",
                "file_path" => $data['Filespath']['MigrationFilePath']
            ];
        } else {
            $data["errors"][] = [
                "error_message" => "Migration File Not Able to Create",
                "file_path" => $data['Filespath']['MigrationFilePath']
            ];
        }

        // Model File Create
        if ($this->fileCreateWithContent($data["Filespath"]["ModelFilePath"], $this->ModelDummyContent($data))) {
            $data["success"][] = [
                "success_message" => "Model File Created Successfully",
                "file_path" => $data['Filespath']['ModelFilePath']
            ];
        } else {
            $data["errors"][] = [
                "error_message" => "Model File Not Able to Create",
                "file_path" => $data['Filespath']['ModelFilePath']
            ];
        }

        // Entity File Create
        if ($this->fileCreateWithContent($data["Filespath"]["EntityFilePath"], $this->EntityDummyContent($data))) {
            $data["success"][] = [
                "success_message" => "Entity File Created Successfully",
                "file_path" => $data['Filespath']['EntityFilePath']
            ];
        } else {
            $data["errors"][] = [
                "error_message" => "Entity File Not Able to Create",
                "file_path" => $data['Filespath']['EntityFilePath']
            ];
        }

        // Controller File Create
        if ($this->fileCreateWithContent($data["Filespath"]["ControllerFilePath"], $this->ControllerDummyContent($data))) {
            $data["success"][] = [
                "success_message" => "Controller File Created Successfully",
                "file_path" => $data['Filespath']['ControllerFilePath']
            ];
        } else {
            $data["errors"][] = [
                "error_message" => "Controller File Not Able to Create",
                "file_path" => $data['Filespath']['ControllerFilePath']
            ];
        }
    }
    public function fileCreateWithContent(string $filePath, string $fileContent): bool
    {

        if (!file_exists($filePath)) {
            // Create the directory and any necessary parent directories
            $directory = dirname($filePath);
            if (!is_dir($directory)) {
                mkdir($directory, 0777, true);
            }
            file_put_contents($filePath, $fileContent);
            return true;
        } else {
            return false;
        }
    }

    public function MigrationDummyContent($data)
    {
        $migrationStructure = "<?php

namespace {$data['Namespacess']['Migration']};

use CodeIgniter\Database\Migration;

class {$data['Namespacess']['ModuleName']}Migration extends Migration
{
    public function up()
    {
        //
    }

    public function down()
    {
        //
    }
}";
        return $migrationStructure;
    }

    public function ModelDummyContent($data): string
    {
        $modelStructure = "<?php

namespace {$data['Namespacess']['Model']};

use CodeIgniter\Model;

class {$data['Namespacess']['ModuleName']}Model extends Model
{
    protected \$DBGroup          = 'default';
    protected \$table= 'table_name';
    protected \$primaryKey       = 'primary_id_field_name';
    protected \$useAutoIncrement = true;
    protected \$returnType       = /{$data['Namespacess']['Entity']}/{$data['Namespacess']['ModuleName']}Entity::class;
    protected \$useSoftDeletes   = false;
    protected \$protectFields    = true;
    protected \$allowedFields    = [];
            
    // Dates
    protected \$useTimestamps = false;
    protected \$dateFormat    = 'datetime';
    protected \$createdField  = 'created_at';
    protected \$updatedField  = 'updated_at';
    protected \$deletedField  = 'deleted_at';
            
    // Validation
    protected \$validationRules      = [];
    protected \$validationMessages   = [];
    protected \$skipValidation       = false;
    protected \$cleanValidationRules = true;
            
    // Callbacks
    protected \$allowCallbacks = true;
    protected \$beforeInsert   = [];
    protected \$afterInsert    = [];
    protected \$beforeUpdate   = [];
    protected \$afterUpdate    = [];
    protected \$beforeFind     = [];
    protected \$afterFind      = [];
    protected \$beforeDelete   = [];
    protected \$afterDelete    = [];
}";
        return $modelStructure;
    }

    public function EntityDummyContent($data): string
    {
        $entityStructure = "<?php
namespace {$data['Namespacess']['Entity']};

use CodeIgniter\Entity\Entity;

class {$data['Namespacess']['ModuleName']}Entity extends Entity
{
    protected \$datamap = [];
    protected \$dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected \$casts   = [];
}";
        return $entityStructure;
    }

    public function ControllerDummyContent($data): string
    {
        $controllerStructure = "<?php
namespace {$data['Namespacess']['Controller']};

use App\Controllers\BaseController;

class {$data['Namespacess']['ModuleName']}Controller extends BaseController
{
    public function index()
    {
        //
    }
}";
        return $controllerStructure;
    }
}
