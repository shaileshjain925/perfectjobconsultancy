<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use InputType;

class InputFieldGeneratorController extends BaseController
{
    public string $formId;
    public array $currentInputField;
    public array $currentInputValidations;
    public array $currentInputOther;
    public array $allInputFields;
    public string $currentInputhtml;
    public string $allInputhtmlWithOutRow = '';
    public string $allInputhtmlWithRow = '';
    public function __construct($formId)
    {
        $this->formId = $formId;
    }
    public function AddInputField(
        string $customInput = null,
        bool $newRow = false,
        InputType $inputType = InputType::text,
        string $inputName = '',
        string $inputTitle = '',
        string $inputPlaceHolder = '',
        string $inputclasses = '',
        string $inputAttribute = '',
        string $inputParentDivClasses = 'col-md-6',
        string $inputLabelText = '',
        bool $inputLabelRequired = false,
        array $options = [],
        array $inputValidation = [],
    ) {
        $this->currentInputField['property']['input_form'] = $this->formId;
        $this->currentInputField['other']['customInput'] = $customInput;
        $this->currentInputField['other']['newRow'] = $newRow;
        $this->currentInputField['property']['input_type'] = $inputType->value;
        $this->currentInputField['property']['input_name'] = $inputName;
        $this->currentInputField['property']['input_id'] = $inputName;
        $this->currentInputField['property']['input_title'] = $inputTitle;
        $this->currentInputField['property']['input_placeHolder'] = $inputPlaceHolder;
        $this->currentInputField['property']['input_classes'] = $inputclasses;
        $this->currentInputField['property']['input_attributes'] = $inputAttribute;
        $this->currentInputField['property']['input_parent_div_Class'] = $inputParentDivClasses;
        $this->currentInputField['property']['input_label_text'] = $inputLabelText;
        $this->currentInputField['other']['input_label_required'] = $inputLabelRequired;
        $this->currentInputField['other']['input_label_required'] = $inputLabelRequired;
        $this->currentInputField['property']['options'] = $options;
        $this->allInputFields[] = $this->currentInputField;
    }
    public function GetAllInput($prefillData = null, $prefillError = null): string
    {
        $this->allInputhtmlWithRow = view('Views/components/div/row');
        foreach ($this->allInputFields as &$input) {
            if ($input['other']['newRow']) {
                $this->allInputhtmlWithRow = str_replace('{{row_data}}', $this->allInputhtmlWithOutRow, $this->allInputhtmlWithRow);
                $this->allInputhtmlWithRow .= view('Views/components/div/row');
                $this->allInputhtmlWithOutRow = '';
            }
            if (!empty($input['other']['customInput'])) {
                $this->allInputhtmlWithOutRow .= $input['other']['customInput'];
                continue;
            }
            if ($input['other']['input_label_required']) {
                $input['property']['input_label'] = view('Views/components/label/label', $input['property']);
            }
            if (!empty($prefillData) && array_key_exists($input['property']['input_name'], $prefillData)) {
                $input['property']['input_value'] = $prefillData[$input['property']['input_name']];
            }
            if (!empty($prefillError) && array_key_exists($input['property']['input_name'], $prefillError)) {
                $input['property']['input_error'] = view('Views/components/label/errorlabel', ['input_name' => $input['property']['input_name'], 'input_error_message' => $prefillError[$input['property']['input_name']]]);
            }
            switch ($input['property']['input_type']) {
                case 'date':
                    $this->allInputhtmlWithOutRow .= view('Views/components/input/date/date', $input['property']);
                    break;
                case 'datetime-local':
                    $this->allInputhtmlWithOutRow .= view('Views/components/input/date/datetime', $input['property']);
                    break;
                case 'week':
                    $this->allInputhtmlWithOutRow .= view('Views/components/input/date/week', $input['property']);
                    break;
                case 'month':
                    $this->allInputhtmlWithOutRow .= view('Views/components/input/date/month', $input['property']);
                    break;

                case 'time':
                    $this->allInputhtmlWithOutRow .= view('Views/components/input/time/time', $input['property']);
                    break;
                case 'hour':
                    $this->allInputhtmlWithOutRow .= view('Views/components/input/time/hour', $input['property']);
                    break;
                case 'minute':
                    $this->allInputhtmlWithOutRow .= view('Views/components/input/time/minute', $input['property']);
                    break;
                case 'second':
                    $this->allInputhtmlWithOutRow .= view('Views/components/input/time/second', $input['property']);
                    break;
                case 'color':
                    $this->allInputhtmlWithOutRow .= view('Views/components/input/color', $input['property']);
                    break;
                case 'email':
                    $this->allInputhtmlWithOutRow .= view('Views/components/input/email', $input['property']);
                    break;
                case 'username':
                    $this->allInputhtmlWithOutRow .= view('Views/components/input/username', $input['property']);
                    break;
                case 'file':
                    $this->allInputhtmlWithOutRow .= view('Views/components/input/file', $input['property']);
                    break;
                case 'hidden':
                    $this->allInputhtmlWithOutRow .= view('Views/components/input/hidden', $input['property']);
                    break;
                case 'number':
                    $this->allInputhtmlWithOutRow .= view('Views/components/input/number', $input['property']);
                    break;
                case 'currency':
                    $this->allInputhtmlWithOutRow .= view('Views/components/input/currency', $input['property']);
                    break;
                case 'password':
                    $this->allInputhtmlWithOutRow .= view('Views/components/input/password', $input['property']);
                    break;
                case 'text':
                    $this->allInputhtmlWithOutRow .= view('Views/components/input/text', $input['property']);
                    break;
                case 'search':
                    $this->allInputhtmlWithOutRow .= view('Views/components/input/search', $input['property']);
                    break;
                case 'textarea':
                    $this->allInputhtmlWithOutRow .= view('Views/components/input/textarea', $input['property']);
                    break;
                case 'select':
                    $this->allInputhtmlWithOutRow .= view('Views/components/input/select', $input['property']);
                    break;
                case 'multiselect':
                    $this->allInputhtmlWithOutRow .= view('Views/components/input/multi-select', $input['property']);
                    break;
                case 'checkbox':
                    $this->allInputhtmlWithOutRow .= view('Views/components/input/checkbox', $input['property']);
                    break;
                case 'datalist':
                    $this->allInputhtmlWithOutRow .= view('Views/components/input/datalist', $input['property']);
                    break;
            }
        }
        $this->allInputhtmlWithRow = str_replace('{{row_data}}', $this->allInputhtmlWithOutRow, $this->allInputhtmlWithRow);
        return $this->allInputhtmlWithRow;
    }
}
