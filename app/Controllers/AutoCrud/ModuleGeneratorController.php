<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModuleGeneratorModel;
use CodeIgniter\HTTP\Response;
use FormEncType, FormMethod, InputType, MySqlColumnTypes, ApiResponseStatusCode;

class ModuleGeneratorController extends BaseController
{
	protected $ModuleGeneratorModel;
	public function __construct()
	{
		//$this->ModuleGeneratorModel =  new ModuleGeneratorModel();
	}
	public function index()
	{
		$prefillData = [];
		$prefillError = [];
		$prefillData = getRequestData($this->request, 'ARRAY');
		if (!empty($prefillData)) {
			$prefillData['ModulePath'] = (!empty($prefillData['ModulePath'])) ? $this->capitalizePath($prefillData['ModulePath']) : '';
			if (array_key_exists('ModuleType', $prefillData) && $prefillData['ModuleType'] == 'mvc') {
				$prefillData['ModulePath'] = explode('/', $prefillData['ModulePath']);
				$prefillData['ModulePath'] = end($prefillData['ModulePath']);
			}

			$validation = \Config\Services::validation();
			$validation->setrules([
				"ModuleType" => "required",
				"ModulePath" => "required|regex_match[^[a-zA-Z\/]+$]",
				"StructureOnly" => "required",
			]);
			if ($validation->run($prefillData)) {
				$validation->setRule('ModulePath', 'Module Path', "verifyModulePath[{$prefillData['ModuleType']}]");
				if ($validation->run($prefillData)) {
					if ($prefillData['StructureOnly'] == 'true') {
						$GenerateModule = new \App\Commands\GenerateModule();
						$GenerateModule->createModuleDummy($prefillData);
					} else {

						$data = ['ModuleGenerator' => [
							'ModuleData' => $prefillData,
							'MigrationData' => [],
							'FormData' => [],
							'ValidationData' => [],
							'OtherData' => []
						]];
						return $this->migrationCreateForm($data);
					}
				} else {
					$prefillError = $validation->getErrors();
				}
			} else {
				$prefillError = $validation->getErrors();
			}
		}
		$data = [
			"head_data" => [
				"title" => "Create Module",
				"site_name" => "",
				"meta_description" => "",
				"meta_author" => "",
				"meta_keyword" => "",
			],
			"leftsidebar_data" => [],
			"header_data" => [],
			"view_string" => "",
			// "view" =>"Views/PerfectJobConsultancy/partials/maincontent",
			// "view_data" =>[],
			"footer_data" => [],
			"rightsidebar_data" => [],
			"after_body_content" => [
				'script_file_links' => [
					'PerfectJobConsultancy/assets/js/ModuleCreate.js'
				],
				"script_in_document_ready" => "
    			var data = " . json_encode($prefillData) . ";
    			var result = '';"
			]
		];
		$formName = 'Generate Module Form';
		$formId = 'GenerateModuleForm';
		$formBodyContents = '';
		$InputFieldGeneratorController = new InputFieldGeneratorController($formId);
		// Custom Input
		$InputFieldGeneratorController->AddInputField("
			<div class='col-md-4'>
				<div class='form-group'>
					<label for='ModuleType'>Select Module Type</label>
					<select name='ModuleType' form='{$formId}' class='select' requided>
						<option value='mvc' " . ((array_key_exists('ModuleType', $prefillData) && $prefillData['ModuleType'] == 'mvc') ? 'selected' : '') . "> Model View Controller</options>
						<option value='hmvc' " . ((array_key_exists('ModuleType', $prefillData) && $prefillData['ModuleType'] == 'hmvc') ? 'selected' : '') . ">Hierarchical Model View Controller (HMVC)</options>
					</select>
					" . view('Views/components/label/errorlabel', ['input_name' => 'ModuleType', 'input_error_message' => (array_key_exists('ModuleType', $prefillError)) ? $prefillError['ModuleType'] : '']) . "
				</div>
			</div>", false);

		$InputFieldGeneratorController->AddInputField(
			null,
			false,
			InputType::text,
			'ModulePath',
			'Path/ModuleName',
			'Enter Module Name',
			'form-control',
			'',
			'col-md-8',
			'Enter Module Name With Path (Path\ModuleName)',
			true,
		);
		$InputFieldGeneratorController->AddInputField("
		<div class='col-md-4'>
			<div class='form-group'>
				<label for='StructureOnly'>Generate File Structure Only</label>
				<select name='StructureOnly' class='select' form='{$formId}'>
					<option value='true' " . ((array_key_exists('StructureOnly', $prefillData) && $prefillData['StructureOnly'] == 'true') ? 'selected' : '') . ">For Dummy Structure Only</options>
					<option value='false' " . ((array_key_exists('StructureOnly', $prefillData) && $prefillData['StructureOnly'] == 'false') ? 'selected' : '') . ">For CRUD Generation</options>
				</select>
				" . view('Views/components/label/errorlabel', ['input_name' => 'StructureOnly', 'input_error_message' => (array_key_exists('StructureOnly', $prefillError)) ? $prefillError['StructureOnly'] : '']) . "
			</div>
		</div>
	", false);

		$InputFieldGeneratorController->AddInputField(
			null,
			false,
			InputType::textarea,
			'status',
			'Status',
			'Status',
			'form-control',
			'readonly rows="15" ',
			'col-md-12',
			'Status',
			true,
		);

		$formBodyContents = $InputFieldGeneratorController->GetAllInput($prefillData, $prefillError);
		$FormGeneratorController = new FormGeneratorController(
			$formId,
			$formName,
			$formName,
			$formBodyContents,
			'Create',
			base_url("/ModuleCreate"),
			'Cancle',
			base_url('/ModuleCreate'),
			FormMethod::POST,
			FormEncType::FormUrlEncoded,
			true,
			"form-horizontal",
			"",
		);
		$data["view_string"] = $FormGeneratorController->getForm();
		return view("Views/PerfectJobConsultancy/partials/main", $data);
	}
	public function capitalizePath($input)
	{
		$input = rtrim($input, '/');
		$input = trim($input);
		$parts = explode('/', $input);

		// Capitalize the first letter of each part and join them back together with "/"
		$capitalizedParts = array_map('ucfirst', $parts);

		// Join the capitalized parts with "/"
		$result = implode('/', $capitalizedParts);
		return $result;
	}
	public function getNamespace($ModuleType, $ModulePath): array
	{
		$moduleArray = explode('/', $ModulePath);
		$moduleName = end($moduleArray);
		$data = [];
		$data['ModuleName'] = $moduleName;
		if ($ModuleType == 'mvc') {
			$data['Migration'] = str_replace('/', '/', 'App/Database/Migrations');
			$data['Model'] = str_replace('/', '/', 'App/Models');
			$data['Entity'] = str_replace('/', '/', 'App/Entities');
			$data['Controller'] = str_replace('/', '/', 'App/Controllers');
			return $data;
		} else if ($ModuleType == 'hmvc') {
			$data['Migration'] = str_replace('/', '/', 'App/Database/Migrations/Modules/' . str_replace('/' . $moduleName, '', $ModulePath));
			$data['Model'] = str_replace('/', '/', 'App/Modules/' . $ModulePath . '/Models');
			$data['Entity'] = str_replace('/', '/', 'App/Modules/' . $ModulePath . '/Entities');
			$data['Controller'] = str_replace('/', '/', 'App/Modules/' . $ModulePath . '/Controllers');
			return $data;
		}
	}
	public function getFilesPath($ModuleType, $ModulePath): array
	{
		$moduleArray = explode('/', $ModulePath);
		$moduleName = end($moduleArray);
		$mvcPath = APPPATH;
		$hmvcPath = APPPATH . 'Modules/' . $ModulePath . '/';
		$data = [];
		$todayDate = date('Y-m-d-His');
		if ($ModuleType == 'mvc') {
			$data['MigrationFilePath'] = str_replace('/', '/', $mvcPath . 'Database/Migrations/' . $todayDate . '_' . $moduleName . 'Migration.php');
			$data['ModelFilePath'] = str_replace('/', '/', $mvcPath . 'Models/' . $moduleName . 'Model.php');
			$data['EntityFilePath'] = str_replace('/', '/', $mvcPath . 'Entities/' . $moduleName . 'Entity.php');
			$data['ControllerFilePath'] = str_replace('/', '/', $mvcPath . 'Controllers/' . $moduleName . 'Controller.php');
			return $data;
		} else if ($ModuleType == 'hmvc') {
			$data['MigrationFilePath'] = str_replace('/', '/', $mvcPath . 'Database/Migrations/Modules/' . $ModulePath . '/' . $todayDate . '_' . $moduleName . 'Migration.php');
			$data['ModelFilePath'] = str_replace('/', '/', $hmvcPath . 'Models/' . $moduleName . 'Model.php');
			$data['EntityFilePath'] = str_replace('/', '/', $hmvcPath . 'Entities/' . $moduleName . 'Entity.php');
			$data['ControllerFilePath'] = str_replace('/', '/', $hmvcPath . 'Controllers/' . $moduleName . 'Controller.php');
			return $data;
		}
	}
	public function migrationCreateForm(array $data)
	{
		$session = session();
		$session->set($data);
		$prefillData = [];
		$prefillError = [];
		$data = [
			"head_data" => [
				"title" => "Create Migration",
				"site_name" => "",
				"meta_description" => "",
				"meta_author" => "",
				"meta_keyword" => "",
			],
			"leftsidebar_data" => [],
			"header_data" => [],
			"view_string" => "",
			// "view" =>"Views/PerfectJobConsultancy/partials/maincontent",
			// "view_data" =>[],
			"footer_data" => [],
			"rightsidebar_data" => [],
			"after_body_content" => [
				'script_file_links' => [
					'PerfectJobConsultancy/assets/js/MigrationCreate.js'
				],
				"script_in_document_ready" => ""
			]
		];
		$formName = 'Generate Migration Form';
		$formId = 'GenerateMigrationForm';
		$formBodyContents = '';
		$InputFieldGeneratorController = new InputFieldGeneratorController($formId);
		$InputFieldGeneratorController->AddInputField(
			null,
			false,
			InputType::text,
			'table_name',
			'Table Name',
			'Table Name',
			'form-control',
			'required onChange="TableNameChanged(this)"',
			'col-md-4',
			'<b>Table Name</b>',
			true,
		);
		$InputFieldGeneratorController->AddInputField(
			null,
			false,
			InputType::checkbox,
			'created_at',
			'created_at',
			'created_at',
			'form-control',
			'',
			'col-md-1 mt-2',
			'<b>created_at</b>',
			true,
		);
		$InputFieldGeneratorController->AddInputField(
			null,
			false,
			InputType::checkbox,
			'updated_at',
			'updated_at',
			'updated_at',
			'form-control',
			'',
			'col-md-1 mt-2',
			'<b>updated_at</b>',
			true,
		);
		$InputFieldGeneratorController->AddInputField(
			null,
			false,
			InputType::checkbox,
			'deleted_at',
			'deleted_at',
			'deleted_at',
			'form-control',
			'',
			'col-md-1 mt-2',
			'</b>deleted_at</b>',
			true,
		);
		$columns = [
			"<i class='fa fa-trash'></i>",
			"Column Type",
			"Foreign Key",
			"Name",
			"Type",
			"<span title='unsigned'>US</span>",
			"Length",
			"Default",
			"<span title='Is Null Allowed'>Null</span>",
			"<span title='AutoIncrement'>AI</span>",
			"Comment",
		];
		$table = view("Views/components/table/table", ['columns' => $columns]);
		$table = str_replace('<tbody>', '<tbody>' . $this->getRowForAddColumnsApi($formId, 0, null, true, 'ARRAY'), $table);
		$InputFieldGeneratorController->AddInputField(
			"<button class='form-control btn-primary col-md-2 mb-2 ml-4' onClick='addRow()'>Add Column</button>",
			true,
		);
		$InputFieldGeneratorController->AddInputField(
			$table,
			true,
		);
		$InputFieldGeneratorController->AddInputField(
			null,
			false,
			InputType::datalist,
			"ColumnNames",
			"",
			"",
			"",
			"",
			"",
			"",
			false,
			$this->GetAllTablesPrimaryAndUniqueKeyDotSeperated()
		);
		$formBodyContents = $InputFieldGeneratorController->GetAllInput($prefillData, $prefillError);
		$FormGeneratorController = new FormGeneratorController(
			$formId,
			$formName,
			$formName,
			$formBodyContents,
			'Create',
			base_url("/ModuleCreate"),
			'Cancle',
			base_url('/ModuleCreate'),
			FormMethod::POST,
			FormEncType::FormUrlEncoded,
			true,
			"form-horizontal",
		);
		$data["view_string"] = $FormGeneratorController->getForm();
		return view("Views/PerfectJobConsultancy/partials/main", $data);
	}
	protected function getAllTableList()
	{
		$db = \Config\Database::connect();
		$tables = $db->query("SHOW TABLES FROM {$_ENV['database.default.database']}")->getResultArray();
		$tables = array_column($tables, 'Tables_in_' . $_ENV['database.default.database']);
		return $tables;
	}

	protected function getAllColumnsList(string|array $tables, bool $withProperty = false, string $column_name = null): array|null
	{
		$db = \Config\Database::connect();
		$data = [];
		$newColumns = [];
		if (is_array($tables)) {
			foreach ($tables as $table) {
				$columns = $db->query("SHOW COLUMNS FROM $table")->getResultArray();
				if ($withProperty) {
					foreach ($columns as $key => $column) {
						$newColumns[$column['Field']] = $columns[$key];
					}
				} else {
					foreach ($columns as $key => $column) {
						$newColumns[] = $column['Field'];
					}
				}
				$data[] = ['table_name' => $table, 'columns' => $newColumns];
				unset($newColumns);
			}
			return $data;
		} else {
			$columns = $db->query("SHOW COLUMNS FROM $tables")->getResultArray();
			if ($withProperty) {
				foreach ($columns as $key => $column) {
					if ($column['Field'] == $column_name) {
						return $column;
					}
					$newColumns[$column['Field']] = $columns[$key];
				}
				return $newColumns;
			} else {
				foreach ($columns as $key => $column) {
					$newColumns[] = $column['Field'];
				}
				return $newColumns;
			}
		}
	}
	protected function GetAllTablesPrimaryAndUniqueKeyDotSeperated(): array|null
	{
		$tables = $this->getAllTableList();
		$tablesWihColumns = $this->getAllColumnsList($tables, true);
		$tablesWithColumnsDotSeprated = [];
		foreach ($tablesWihColumns as $table) {
			foreach ($table['columns'] as $key => $column) {
				if ($column['Key'] == 'PRI' || $column['Key'] == 'UNI') {
					$tablesWithColumnsDotSeprated[$table['table_name'] . '.' . $column['Field']] = $table['table_name'] . '.' . $column['Field'];
				}
			}
		}
		return $tablesWithColumnsDotSeprated;
	}
	protected function GetColumnProperty(string $table_name, string $column_name): array|null
	{
		return $this->getAllColumnsList($table_name, true, $column_name);
	}
	public function getRowForAddColumnsApi(string $form_id = null, string $row_id = '0', array $preFillData = null, bool $isPrimaryKey = false, $returnType = 'JSON')
	{
		$allInputFields = [];
		$disabledField = ($isPrimaryKey) ? ' disabled' : '';
		if (empty($form_id)) {
			$data = getRequestData($this->request, 'ARRAY');
			$row_id = $data['row_id'];
		} else {
			$data['form_id'] = $form_id;
		}

		$DeleteRowButton = new InputFieldGeneratorController($data['form_id']);
		$DeleteRowButton->AddInputField(
			"<button class='btn btn-danger' onclick='deleteRow(\"$row_id\")' $disabledField>
				<i class='fa fa-trash'></i>
			</button>",
			false
		);
		$ColumnType = ['simpleColumn' => 'Simple Column', 'foreignKey' => 'Foreign Key', 'uniqueKey' => 'Unique'];
		$ColumnTypeInput = new InputFieldGeneratorController($data['form_id']);
		$ColumnTypeInput->AddInputField(
			null,
			false,
			InputType::select,
			"columns[{$row_id}][Mode]",
			"Column Type",
			"Column Type",
			"",
			"style='width:140px' required onChange='ColumnTypeChanged(this,`$row_id`)'",
			"",
			"",
			false,
			($isPrimaryKey) ? ['primaryKey' => 'Primary Key'] : $ColumnType
		);
		$ForeignKeyInput = new InputFieldGeneratorController($data['form_id']);
		$ForeignKeyInput->AddInputField(
			null,
			false,
			InputType::select,
			"columns[{$row_id}][foreign_key_field_name]",
			"Foreign Key Field",
			"Foreign Key Field",
			"",
			"style='width:250px' disabled onChange='ForeignKeyChanged(this,`$row_id`)'",
			"",
			"",
			false,
			$this->GetAllTablesPrimaryAndUniqueKeyDotSeperated()
		);
		$NameInput = new InputFieldGeneratorController($data['form_id']);
		$NameInput->AddInputField(
			null,
			false,
			InputType::text,
			"columns[{$row_id}][FieldName]",
			"Field Name",
			"Field Name",
			"form-control",
			"style='width:150px' required list='ColumnNames'",
			"",
			"",
			false,
		);
		$TypeInput = new InputFieldGeneratorController($data['form_id']);
		$TypeInput->AddInputField(
			null,
			false,
			InputType::select,
			"columns[{$row_id}][type]",
			"Type",
			"Type",
			"",
			"required style='width:150px' onChange='TypeChanged(this,`$row_id`)'",
			"",
			"",
			false,
			getMySqlColumnTypes()
		);
		$UnsignedCheckbox = new InputFieldGeneratorController($data['form_id']);
		$UnsignedCheckbox->AddInputField(
			null,
			false,
			InputType::checkbox,
			"columns[{$row_id}][Unsigned]",
			"Is Null",
			"",
			"form-control mt-2",
			"disabled",
			"",
			"",
			false,
		);
		$Length = new InputFieldGeneratorController($data['form_id']);
		$Length->AddInputField(
			null,
			false,
			InputType::text,
			"columns[{$row_id}][Length]",
			"Length",
			"Length/Enum",
			"form-control",
			"style='width:50px' required",
			"",
			"",
			false,
		);
		$Default = new InputFieldGeneratorController($data['form_id']);
		$Default->AddInputField(
			null,
			false,
			InputType::text,
			"columns[{$row_id}][Default]",
			"Default",
			"Default",
			"form-control",
			"style='width:50px' $disabledField",
			"",
			"",
			false,
		);
		$NullCheckbox = new InputFieldGeneratorController($data['form_id']);
		$NullCheckbox->AddInputField(
			null,
			false,
			InputType::checkbox,
			"columns[{$row_id}][Null]",
			"Is Null",
			"",
			"form-control mt-2",
			"$disabledField",
			"",
			"",
			false,
		);
		$AutoIncrementCheckbox = new InputFieldGeneratorController($data['form_id']);
		$AutoIncrementCheckbox->AddInputField(
			null,
			false,
			InputType::checkbox,
			"columns[{$row_id}][AutoIncrement]",
			"Auto Increment",
			"",
			"form-control mt-2",
			"",
			"",
			"",
			false,
		);
		$CommentInput = new InputFieldGeneratorController($data['form_id']);
		$CommentInput->AddInputField(
			null,
			false,
			InputType::textarea,
			"columns[{$row_id}][Comment]",
			"Comment",
			"Comment",
			"form-control",
			"style='width:200px' rows='1'",
			"",
			"",
			false,
		);
		// Get Columns
		$allInputFields[] = str_replace("</div id='rowend'>", '', str_replace('<div class="row">', '', $DeleteRowButton->GetAllInput()));
		$allInputFields[] = str_replace("</div id='rowend'>", '', str_replace('<div class="row">', '', $ColumnTypeInput->GetAllInput()));
		$allInputFields[] = str_replace("</div id='rowend'>", '', str_replace('<div class="row">', '', $ForeignKeyInput->GetAllInput()));
		$allInputFields[] = str_replace("</div id='rowend'>", '', str_replace('<div class="row">', '', $NameInput->GetAllInput()));
		$allInputFields[] = str_replace("</div id='rowend'>", '', str_replace('<div class="row">', '', $TypeInput->GetAllInput()));
		$allInputFields[] = str_replace("</div id='rowend'>", '', str_replace('<div class="row">', '', $UnsignedCheckbox->GetAllInput()));
		$allInputFields[] = str_replace("</div id='rowend'>", '', str_replace('<div class="row">', '', $Length->GetAllInput()));
		$allInputFields[] = str_replace("</div id='rowend'>", '', str_replace('<div class="row">', '', $Default->GetAllInput()));
		$allInputFields[] = str_replace("</div id='rowend'>", '', str_replace('<div class="row">', '', $NullCheckbox->GetAllInput()));
		$allInputFields[] = str_replace("</div id='rowend'>", '', str_replace('<div class="row">', '', $AutoIncrementCheckbox->GetAllInput()));
		$allInputFields[] = str_replace("</div id='rowend'>", '', str_replace('<div class="row">', '', $CommentInput->GetAllInput()));
		// $allInputFields[] = str_replace("</div id='rowend'>", '', str_replace('<div class="row">', '', $NameInputDataList->GetAllInput()));
		$row = view('/Views/components/table/tr', ['row' => $allInputFields, 'row_id' => $row_id]);
		if ($returnType == 'JSON') {
			return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::OK, 'Row Fetched Successfully', ['row' => $row, 'row_id' => $row_id]);
		} else {
			return $row;
		}
	}
	public function getColumnPropertyApi(array $data = null, string $returnType = 'JSON')
	{
		if (empty($data)) {
			$data = getRequestData($this->request, 'ARRAY');
		}
		$tempData = explode('.', $data['fieldName']);
		$tableName = $tempData[0];
		$columnName = $tempData[1];
		$columnProperty = $this->GetColumnProperty($tableName, $columnName);
		$TempType = $columnProperty['Type'];

		$columnProperty['type'] = trim(explode('(', $TempType)[0]);

		$pattern = '/\((.*?)\)/';
		if (preg_match($pattern, $TempType, $matches)) {
			$columnProperty['constraint'] = $matches[1];
		}
		$columnProperty['Attribute'] = trim(explode(')', $TempType)[1]);
		if ($returnType == 'JSON') {
			return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::OK, 'Row Fetched Successfully', ['columnProperty' => $columnProperty]);
		} else {
			return $columnProperty;
		}
	}
	public function tableNameExiestApi(string $TableName = null, string $returnType = 'JSON'): bool|Response
	{
		if (empty($TableName)) {
			// Check if 'TableName' exists in the request data
			$requestData = getRequestData($this->request, 'ARRAY');
			if (isset($requestData['TableName'])) {
				$TableName = $requestData['TableName'];
			} else {
				// Handle the case when 'TableName' is not set
				return "TableName is not provided.";
			}
		}
		$Tables = $this->getAllTableList();
		$result = in_array($TableName, $Tables);
		if ($returnType == 'JSON') {
			return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::OK, 'Getting Response Successfully', ['status' => $result]);
		} else {
			return $result;
		}
		// Rest of your code here...
	}
}
