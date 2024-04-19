<?php

use CodeIgniter\Database\Config;

enum HttpRequest: string
{
  case GET = 'GET';
  case POST = 'POST';
  case PUT = 'PUT';
  case DELETE = 'DELETE';
  case PATCH = 'PATCH';
}
enum MenuActionType: string
{
  case View = 'is_view';
  case Create = 'is_created';
  case Update = 'is_updated';
  case Delete = 'is_deleted';
  case Export = 'is_export';
  case Import = 'is_import';
}
enum ApiResponseStatusCode: int
{
    // Success codes
  case OK = 200;
  case CREATED = 201;
  case NO_CONTENT = 204;

    // Client error codes
  case BAD_REQUEST = 400;
  case UNAUTHORIZED = 401;
  case FORBIDDEN = 403;
  case NOT_FOUND = 404;
    // Server error codes
  case INTERNAL_SERVER_ERROR = 500;
  case SERVICE_UNAVAILABLE = 503;
    // Validation Failed
  case VALIDATION_FAILED = 422;
}
enum FormMethod: string
{
  case GET = 'get';
  case POST = 'post';
}
enum FormEncType: string
{
  case FormUrlEncoded = "application/x-www-form-urlencoded";
  case FormMultiPart = "multipart/form-data";
  case FormPlainText = "text/plain";
}
enum InputType: string
{
  case text = "text";
  case textarea = "textarea";
  case password = "password";
  case email = "email";
  case username = "username";
  case number = "number";
  case currency = "currency";
  case url = "url";
  case search = "search";

  case date = "date";
  case datetime = "datetime-local";
  case month = "month";
  case week = "week";

  case select = "select";
  case multiselect = "multiselect";

  case radio = "radio";
  case checkbox = "checkbox";

  case time = "time";
  case hour = "hour";
  case minute = "minute";
  case second = "second";
  case file = "file";
  case color = "color";
  case hidden = "hidden";


  case list = "list";
  case datalist = "datalist";
}
enum RelationType: string
{
  case Husband = "Husband";
  case Wife = "Wife";
  case Father = "Father";
  case Mother = "Mother";
  case Daughter = "Daughter";
  case Son = "Son";
}
function getEnumAsArray($enumType)
{
  $enumArray = [];

  $reflection = new ReflectionClass($enumType);
  $enumConstants = $reflection->getReflectionConstants();

  foreach ($enumConstants as $constant) {
    $enumArray[$constant->getName()] = $constant->getValue()->value;
  }

  return $enumArray;
}
function getMySqlColumnTypes(): array
{
  return array(
    'INT' => 'INT',
    'VARCHAR' => 'VARCHAR',
    'TEXT' => 'TEXT',
    'DATE' => 'DATE',
    'Numeric' => array(
      'TINYINT' => 'TINYINT',
      'SMALLINT' => 'SMALLINT',
      'MEDIUMINT' => 'MEDIUMINT',
      'INT' => 'INT',
      'BIGINT' => 'BIGINT'
    ),
    'Date and time' => array(
      'DATE' => 'DATE',
      'DATETIME' => 'DATETIME',
      'TIMESTAMP' => 'TIMESTAMP',
      'TIME' => 'TIME',
      'YEAR' => 'YEAR'
    ),
    'String' => array(
      'CHAR' => 'CHAR',
      'VARCHAR' => 'VARCHAR',
      'TINYTEXT' => 'TINYTEXT',
      'TEXT' => 'TEXT',
      'MEDIUMTEXT' => 'MEDIUMTEXT',
      'LONGTEXT' => 'LONGTEXT',
      'BINARY' => 'BINARY',
      'VARBINARY' => 'VARBINARY',
      'TINYBLOB' => 'TINYBLOB',
      'BLOB' => 'BLOB',
      'MEDIUMBLOB' => 'MEDIUMBLOB',
      'LONGBLOB' => 'LONGBLOB',
      'ENUM' => 'ENUM',
      'SET' => 'SET'
    ),
    'Spatial' => array(
      'GEOMETRY' => 'GEOMETRY',
      'POINT' => 'POINT',
      'LINESTRING' => 'LINESTRING',
      'POLYGON' => 'POLYGON',
      'MULTIPOINT' => 'MULTIPOINT',
      'MULTILINESTRING' => 'MULTILINESTRING',
      'MULTIPOLYGON' => 'MULTIPOLYGON',
      'GEOMETRYCOLLECTION' => 'GEOMETRYCOLLECTION'
    ),
    'JSON' => array(
      'JSON' => 'JSON'
    )
  );
}
if (!function_exists('createFolder')) {
  function createFolder(string $folderPath): bool
  {
    try {
      // Check if the folder exists, create it if not
      if (!file_exists($folderPath) && !mkdir($folderPath, 0777, true)) {
        // Throw an exception with a specific error message
        throw new Exception('Failed to create folder: ' . $folderPath);
      }
      return true;
    } catch (Exception $e) {
      // Handle the exception
      // Log or print the error message for debugging purposes
      log_message('error', ($e->getMessage()));

      // You might want to rethrow the exception if you want it to propagate further
      // throw $e;

      // For now, we'll just return false to indicate the failure
      return false;
    }
  }
}
if (!function_exists('uploadFile')) {
  function uploadFile($fileObject, $uploadPath): array
  {
    $result = [
      "success" => false,
      "file_name" => "",
      "file_size" => "",
      "file_extension" => "",
      "file_system_path" => "",
    ];
    // Get file size and extension
    $fileSize = $fileObject['size'];
    $fileExtension = pathinfo($fileObject['name'], PATHINFO_EXTENSION);

    // Change file name to a random name
    $randomFileName = generateUUID();

    // Upload file to Upload path
    try {
      if (move_uploaded_file($fileObject['tmp_name'], $uploadPath . $randomFileName . "." . $fileExtension)) {
        // File uploaded successfully
        $result['success'] = true;
        $result['file_name'] = $randomFileName;
        $result['file_size'] = $fileSize;
        $result['file_extension'] = $fileExtension;
        $result['file_system_path'] = $uploadPath . $randomFileName;
        // convertImageToWebp($result['file_system_path'], $uploadPath . $randomFileName . "." . 'webp');
      }
    } catch (Exception $e) {
      log_message('error', ($e->getMessage()));
    }
    return $result;
  }
}
if (!function_exists('deleteFile')) {
  function deleteFile($filePath): bool
  {
    if (file_exists($filePath)) {
      // Attempt to delete the file
      if (unlink($filePath)) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }
}
// ---------------------------------Select Options End--------------------------------------
if (!function_exists('getRequestInfo')) {
  /**
   * Parses the request object and returns an array of request info.
   *
   * @param object $request The request object to parse.
   * @return array An array containing the request method and data format.
   */
  // function getRequestInfo(object $request): array
  // {
  //   $getRequestMethod = '';
  //   $getRequestMethod =  ($request->getMethod() === 'get') ? 'GET' : (($request->getMethod() === 'post') ? 'POST' : (($request->getMethod() === 'put') ? 'PUT' : (($request->getMethod() === 'delete') ? 'DELETE' : (($request->isAJAX()) ? 'AJAX' : (($request->getMethod() === 'head') ? 'HEAD' : (($request->getMethod() === 'patch') ? 'PATCH' : (($request->getMethod() === 'options') ? 'OPTIONS' : 'OTHER')))))));
  //   $getRequestDataFormat = 'FORM';

  //   $contentType = $request->getHeader('Accept');

  //   if ($contentType !== null) {
  //     if (stripos($contentType, 'application/json') !== false) {
  //       $getRequestDataFormat = 'JSON';
  //     } elseif (stripos($contentType, 'application/xml') !== false || stripos($contentType, 'text/xml') !== false) {
  //       $getRequestDataFormat = 'FORM';
  //     } elseif (stripos($contentType, 'text/html') !== false) {
  //       $getRequestDataFormat = 'HTML';
  //     } else {
  //       $getRequestDataFormat = '';
  //     }
  //   } else {
  //     // Handle the case where $contentType is null
  //     $getRequestDataFormat = '';
  //   }
  //   return ['requestMethod' => $getRequestMethod, 'requestDataFormat' => $getRequestDataFormat];
  // }
  function getRequestInfo(object $request): array
  {
    $getRequestMethod = '';
    $getRequestMethod = ($request->getMethod() === 'get') ? 'GET' : (($request->getMethod() === 'post') ? 'POST' : (($request->getMethod() === 'put') ? 'PUT' : (($request->getMethod() === 'delete') ? 'DELETE' : (($request->isAJAX()) ? 'AJAX' : (($request->getMethod() === 'head') ? 'HEAD' : (($request->getMethod() === 'patch') ? 'PATCH' : (($request->getMethod() === 'options') ? 'OPTIONS' : 'OTHER')))))));
    $getRequestDataFormat = 'FORM';

    $contentType = $request->getHeaderLine('Content-Type');

    if ($contentType !== '') {
      if (stripos($contentType, 'application/json') !== false) {
        $getRequestDataFormat = 'JSON';
      } elseif (stripos($contentType, 'multipart/form-data') !== false) {
        $getRequestDataFormat = 'FORMDATA';
      } else {
        $getRequestDataFormat = '';
      }
    } else {
      // Handle the case where $contentType is empty
      $getRequestDataFormat = '';
    }

    return ['requestMethod' => $getRequestMethod, 'requestDataFormat' => $getRequestDataFormat];
  }
}
if (!function_exists('getRequestData')) {
  /**
   * Returns the request data in the specified format.
   *
   * @param object $request The request object.
   * @param string $returnDataFormat The format in which to return the data.
   * @return object|array|null The request data in the specified format.
   */
  function getRequestData(object $request, string $returnDataFormat)
  {
    $requestInfo = getRequestInfo($request);
    if ($requestInfo['requestDataFormat'] == 'JSON' && $returnDataFormat == 'ARRAY') {
      if ($requestInfo['requestMethod'] == 'GET') {
        $data = $request->getGet();
      } else {
        $data = $request->getPost();
      }

      if (empty($data)) {
        try {
          $jsonData = $request->getJSON(true);
          // Process $jsonData further if needed
          return $jsonData;
        } catch (Exception $e) {
          // Return a blank array if JSON parsing fails
          return [];
        }
      } else {
        return $data;
      }
    } elseif ($requestInfo['requestDataFormat'] == 'JSON' && $returnDataFormat == 'JSON') {
      return $request->getJSON();
    } elseif ($requestInfo['requestDataFormat'] == 'FORM' && $returnDataFormat == 'JSON') {
      return json_decode(json_encode($request->getPost()));
    } elseif ($requestInfo['requestDataFormat'] == 'FORM' && $returnDataFormat == 'ARRAY') {
      if ($requestInfo['requestMethod'] == "GET") {
        return $request->getGet();
      }
      return $request->getPost();
    } elseif ($requestInfo['requestDataFormat'] == 'FORMDATA' && $returnDataFormat == 'ARRAY') {
    $formData = $request->getVar();
    if (!empty($_FILES)) {
      $formData = array_merge($formData,$_FILES);
    }
    return $formData;
    } elseif ($requestInfo['requestDataFormat'] == 'AJAX' && $returnDataFormat == 'ARRAY') {
      return $request->getPost();
    } elseif ($requestInfo['requestDataFormat'] == '' && $returnDataFormat == 'ARRAY') {
      $data = $request->getPost();
      if (empty($data)) {
        return $request->getJSON(true);
      } else {
        return $data;
      }
    }
  }
}

if (!function_exists('generateUUID')) {
  /**
   * Generates a UUID (Universally Unique Identifier) using the database function.
   *
   * @return string A UUID string.
   */
  function generateUUID(): string
  {
    $db = \Config\Database::connect();
    $result = $db->query('select uuid() as uuid')->getRow();
    return $result->uuid;
  }
}
if (!function_exists('dataTypeConvert')) {
  /**
   * Converts the given data to the specified data format.
   *
   * @param string|object|array $data The data to convert.
   * @param string $returnDataFormat The format to which to convert the data.
   * @return string|object|array The converted data in the specified format.
   */

  function dataTypeConvert($data, string $returnDataFormat)
  {
    switch ($returnDataFormat) {
      case 'json':
        if (is_array($data)) {
          return json_encode($data);
        } else if (is_object($data)) {
          return json_encode($data, JSON_FORCE_OBJECT);
        } else {
          return $data;
        }
      case 'array':
        if (is_object($data)) {
          return json_decode(json_encode($data), true);
        } else if (is_string($data)) {
          return json_decode($data, true);
        } else {
          return (array)$data;
        }
      case 'object':
        if (is_array($data)) {
          return json_decode(json_encode($data));
        } else if (is_string($data)) {
          return json_decode($data);
        } else {
          return (object)$data;
        }
      default:
        return $data;
    }
  }
}
if (!function_exists('load_asset')) {

  /**
   * Load an asset file.
   *
   * @param string $filename The name of the asset file.
   * @param string $type The type of the asset file (css or js).
   * @return void
   */
  function load_asset(string $filename, string $type)
  {

    $path = FCPATH . $filename;
    $exists = file_exists($path);

    if (!$exists) {
      $message = "The $type file '$filename' was not found in this location '" . base_url($filename) . "'.";
      echo "<script>console.warn('" . addslashes($message) . "');</script>";
    } else {
      if ($type === 'css') {
        echo link_tag(base_url($filename));
      } else if ($type === 'js') {
        echo script_tag(base_url($filename));
      }
    }
  }
}
if (!function_exists('load_img')) {
  function load_img(?string $load_img)
  {
    // Check if $load_img is null or an empty string
    if ($load_img === null || $load_img === '') {
      // Return the URL of the "not_found.png" image for null or empty input.
      return base_url('assets/image/not_found.png');
    }

    $path = FCPATH . $load_img;
    $exists = file_exists($path);

    if (!$exists) {
      // Return the URL of the "not_found.png" image if the requested image is not available.
      return base_url('assets/image/not_found.png');
    } else {
      // Return the URL of the requested image if it is available.
      return base_url($load_img);
    }
  }
}
if (!function_exists('check_variable')) {
  /**
   * Check if a variable exists and optionally check if it is an array and if a specific array key exists.
   *
   * @param mixed  $variable   The variable to check.
   * @param bool   $returnValue (Optional) Whether to return the array key's value.
   * @param bool   $isArray     (Optional) Whether to check if the variable is an array.
   * @param string $key         (Optional) The array key to check if $variable is an array.
   * @param mixed $DefaultReturnValue (Optional) if Wrong return Give value
   *
   * @return mixed True if the variable exists and, if specified, is an array and contains the specified key.
   *               If $returnValue is true, returns the array key's value; otherwise, returns an empty string or false.
   */
  function check_variable($variable, bool  $returnValue = false, bool  $isArray = false, string $key = null, mixed $DefaultReturnValue = null)
  {
    try {
      if (!isset($variable)) {
        return $returnValue ? $DefaultReturnValue : false;
      }

      if ($isArray && !is_array($variable)) {
        return $returnValue ? $DefaultReturnValue : false;
      }

      if ($key !== null && is_array($variable)) {
        if (array_key_exists($key, $variable)) {
          return $returnValue ? $variable[$key] : true;
        } else {
          return $returnValue ? $DefaultReturnValue : false;
        }
      }

      return $returnValue ? $variable : true;
    } catch (\Exception $e) {
      // Handle any exceptions that might occur during array access
      return $returnValue ? $DefaultReturnValue : false;
    }
  }
}
/**
 * Formats the common response based on the request format.
 *
 * @param int $status The HTTP status code of the response.
 * @param string $message The message to be included in the response.
 * @param array|null $returnDataArray The data to be included in the response.
 * @param array|null $returnErrorsArray Any errors to be included in the response.
 * @return array Returns the formatted response.
 */
if (!function_exists('formatCommonResponse')) {
  function formatCommonResponse(ApiResponseStatusCode $status, string $message, array|bool|null $returnDataArray = [], array|null $returnErrorsArray = [])
  {
    // Construct the response array
    return [
      'status' => $status,
      'message' => $message,
      'data' => $returnDataArray,
      'errors' => $returnErrorsArray,
    ];
  }
}
/**
 * Formats the API response based on the request format.
 *
 * @param object $request The object context calling this function.
 * @param object $response The object context calling this function.
 * @param int $status The HTTP status code of the response.
 * @param string $message The message to be included in the response.
 * @param array|null $returnDataArray The data to be included in the response.
 * @param array|null $returnErrorsArray Any errors to be included in the response.
 * @return mixed Returns the formatted response based on the request format.
 */
if (!function_exists('formatApiResponse')) {
  function formatApiResponse(object $request, object $responseObj, ApiResponseStatusCode $status, string $message, array|bool|null $returnDataArray = [], array|null $returnErrorsArray = [])
  {
    // Retrieve request information
    $requestInfo = getRequestInfo($request);

    // Retrieve the content type from the request headers
    $contentType = $request->getHeader('Custom-Accept-Encoding');

    // Compress and encode data if the request expects compression
    if (!empty($contentType) && (stripos($contentType, 'gzip, deflate, br') !== false || stripos($contentType, 'gzip') !== false)) {
      $returnDataArray = base64_encode(gzencode(json_encode($returnDataArray)));
    } else {
      $returnDataArray = json_encode($returnDataArray);
    }

    // Construct the response array
    $response = [
      'status' => $status->value,
      'message' => $message,
      'data' => $returnDataArray,
      'errors' => $returnErrorsArray,
    ];

    // Determine the request data format and format the response accordingly
    switch ($requestInfo['requestDataFormat']) {
      case '':
      case 'JSON':
        return $responseObj->setJSON($response);
      case 'HTML':
        // Return HTML string directly
        return $returnDataArray;
      case 'XML':
      default:
        // Handle other data formats here
        return $returnDataArray;
    }
  }
}
if (!function_exists('formatApiAutoResponse')) {
  /**
   * Formats the API response automatically based on the request format.
   *
   * @param object $request The object context calling this function.
   * @param object $responseObj The object context calling this function.
   * @param array $CommonResponseReturnType The predefined response format.
   * @return mixed Returns the formatted response based on the request format.
   */
  if (!function_exists('formatApiAutoResponse')) {
    function formatApiAutoResponse(object $request, object $responseObj, array $CommonResponseReturnType)
    {
      return formatApiResponse($request, $responseObj, $CommonResponseReturnType['status'], $CommonResponseReturnType['message'], $CommonResponseReturnType['data'], $CommonResponseReturnType['errors']);
    }
  }
}

if (!function_exists('generateDocumentNum')) {
  /**
   * Generate an invoice number with the specified number of digits, optional prefix, and optional suffix.
   *
   * @param int $digit The desired number of digits in the invoice number.
   * @param int $number The actual number to be used in the invoice.
   * @param string|null $prefix (Optional) The prefix to be added before the invoice number.
   * @param string|null $suffix (Optional) The suffix to be added after the invoice number.
   * 
   * @return string The generated invoice number as a string.
   */

  function generateDocumentNum(int $digit, int $number, string $prefix = null, string $suffix = null, string $seprator = null): string
  {
    $invoiceNumber = trim(str_pad($number, $digit, '0', STR_PAD_LEFT));
    $documentNumber = "";

    if (!empty($prefix)) {
      $documentNumber .= trim($prefix . $seprator);
    }
    $documentNumber .= $invoiceNumber;
    if (!empty($suffix)) {
      $documentNumber .= trim($seprator . $suffix);
    }
    return $documentNumber;
  }
}
if (!function_exists('getFinancialAliasByDate')) {
  /**
   * Get the financial period alias based on the provided date (which starts from April and ends in March).
   *
   * @param string|null $date The date in 'Y-m-d' format. If not provided, the current date will be used.
   * @return string The financial period alias in the format 'yy-yy' (e.g., '22-23').
   */
  function getFinancialAliasByDate(?string $date = null): string
  {
    // If $date is not provided, use the current date
    if (!$date) {
      $date = date('Y-m-d');
    }

    // Extract the year and month from the provided date
    $year = date('Y', strtotime($date));
    $month = date('m', strtotime($date));

    // Calculate the financial period based on the provided date
    if ($month >= 4) {
      // If the month is April or later, then it belongs to the current financial period
      $financialYearStart = $year;
      $financialYearEnd = $year + 1;
    } else {
      // If the month is before April, then it belongs to the previous financial period
      $financialYearStart = $year - 1;
      $financialYearEnd = $year;
    }

    // Concatenate the financial year aliases
    $financialAlias = substr($financialYearStart, -2) . '-' . substr($financialYearEnd, -2);

    return $financialAlias;
  }
}
if (!function_exists('isIndexBasedArray')) {
  function isIndexBasedArray(array $arr): bool
  {
    // Check if array keys are sequential integers starting from 0
    return array_keys($arr) === range(0, count($arr) - 1);
  }
}
if (!function_exists('isKeyBasedArray')) {
  function isKeyBasedArray(array $arr): bool
  {
    // Check if array keys are not sequential integers starting from 0
    return !isIndexBasedArray($arr);
  }
}
if (!function_exists('getCustomDatabaseConnection')) {
  function getCustomDatabaseConnection($api_token): array
  {
    $companyDataResult = getCompanyDatabaseRecord($api_token);
    if (!empty($companyDataResult)) {
      $custom = [
        'DSN'          => '',
        'hostname'     => $companyDataResult['hostname'],
        'username'     => $companyDataResult['username'],
        'password'     => $companyDataResult['password'],
        'database'     => $companyDataResult['database'],
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
        'port'         => $companyDataResult['port'],
        'numberNative' => false,
      ];
      return $custom;
    } else {
      return [];
    }
  }
}
if (!function_exists('getCompanyDatabaseRecord')) {
  function getCompanyDatabaseRecord($api_token)
  {
    // Define your custom database connection details
    $customDBConfig = [
      'hostname' => $_ENV['database.default.hostname'],
      'username' => $_ENV['database.default.username'],
      'password' => $_ENV['database.default.password'],
      'database' => $_ENV['database.default.database'],
      'port'     => $_ENV['database.default.port'],
      'DBDriver' => 'MySQLi', // Assuming MySQLi driver
    ];

    // Establish the custom database connection
    $db = \Config\Database::connect($customDBConfig);

    // Perform the query using the Query Builder
    $query = $db->table('mst_company')->where('api_token', $api_token)->get();

    // Fetch the company data
    $companyData = $query->getRowArray();

    // Close the database connection
    $db->close();

    if ($companyData) {
      return [
        'hostname' => $companyData['hostname'],
        'port' => $companyData['port'],
        'username' => $companyData['username'],
        'password' => $companyData['password'],
        'database' => $companyData['database'],
      ];
    } else {
      return [];
    }
    // // Database connection parameters
    // $hostname = $_ENV['database.default.hostname'];
    // $username = $_ENV['database.default.username'];
    // $password = $_ENV['database.default.password'];
    // $database = $_ENV['database.default.database'];
    // $port = $_ENV['database.default.port'];
    // $port = intval($port);
    // // Establish database connection
    // $connection = mysqli_connect($hostname, $username, $password, $database, $port);

    // // Check if the connection was successful
    // if (!$connection) {
    //   die("Connection failed: " . mysqli_connect_error());
    // }
    // // Sanitize and validate input
    // $connect_company_id = $api_token;

    // // Prepare SQL query
    // $sql = "SELECT * FROM mst_company WHERE api_token = ? LIMIT 1"; // Limit the query to one result

    // // Prepare the statement
    // $stmt = mysqli_prepare($connection, $sql);

    // if ($stmt === false) {
    //   die("Error in preparing SQL statement: " . mysqli_error($connection));
    // }

    // // Bind parameters
    // mysqli_stmt_bind_param($stmt, "i", $connect_company_id); // Assuming company_id is an integer

    // // Execute the statement
    // $result = mysqli_stmt_execute($stmt);

    // if ($result === false) {
    //   die("Error in executing SQL statement: " . mysqli_error($connection));
    // }

    // // Get the result set
    // $result_set = mysqli_stmt_get_result($stmt);

    // // Fetch the first row (should be the only row due to LIMIT 1)
    // $company_data = mysqli_fetch_assoc($result_set);

    // // Free the result set
    // mysqli_free_result($result_set);

    // // Close the statement
    // mysqli_stmt_close($stmt);

    // // Close the database connection when done
    // mysqli_close($connection);

    // return $company_data ? [
    //   'hostname' => $company_data['hostname'],
    //   'port' => $company_data['port'],
    //   'username' => $company_data['username'],
    //   'password' => $company_data['password'],
    //   'database' => $company_data['database'],
    // ] : [];
  }
}
if (!function_exists('CheckRoleWiseMenuAccess')) {
  function CheckRoleWiseMenuAccess(int $role_id, int $menu_id, MenuActionType $action_type): bool
  {
    $RoleMenuAccessRightsModel = model('RoleMenuAccessRightsModel');
    $result = $RoleMenuAccessRightsModel->select($action_type->value)->where('role_id', $role_id)->where('menu_id', $menu_id)->first();
    if (empty($result)) {
      return true;
    } else {
      if ($result[$action_type->value] == '1') {
        return true;
      } else {
        return false;
      }
    }
  }
}