<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use FormEncType;
use FormMethod;

/**
 * Class FormGeneratorController
 * This controller generates a dynamic form based on provided data.
 */
class FormGeneratorController extends BaseController
{
    // Properties to store form data and components
    public string $form;                  // The generated HTML form
    public string $formContents;          // The contents of the form
    public string $formComponentFolderPath; // The folder path where form components are located
    public array $formData;               // Array to hold form data

    /**
     * Constructor for FormGeneratorController.
     *
     * @param string $form_id                  The ID attribute of the form.
     * @param string $form_name                The name attribute of the form.
     * @param string $form_header_title        The title to display in the form header.
     * @param string $form_body_content        The body content of the form.
     * @param string $form_submit_button_lable The label for the submit button (default: "Save").
     * @param string $form_submit_button_url   The URL where the form should be submitted.
     * @param string $form_cancle_button_lable The label for the cancel button (default: "Cancel").
     * @param string $form_cancle_button_url   The URL to navigate to when the cancel button is clicked (default: '/').
     * @param FormMethod $formmethod           The HTTP method for the form (default: FormMethod::POST).
     * @param FormEncType $formenctype         The enctype for the form (default: FormEncType::FormUrlEncoded).
     * @param bool $autocomplete               Whether autocomplete should be enabled (default: true).
     * @param string $form_classes             CSS classes for the form.
     * @param string $form_attributes          Additional attributes for the form.
     * @param string $target                   The target attribute for form submission (default: "_self").
     * @param string $formComponentFolderPath  The folder path where form components are located (default: "Views/components").
     */
    public function __construct(
        string $form_id,
        string $form_name,
        string $form_header_title,
        string $form_body_content,
        string $form_submit_button_lable = "Save",
        string $form_submit_button_url,
        string $form_cancle_button_lable = "Cancel",
        string $form_cancle_button_url = '/',
        FormMethod $formmethod = FormMethod::POST,
        FormEncType $formenctype = FormEncType::FormUrlEncoded,
        bool $autocomplete = true,
        string $form_classes = "",
        string $form_attributes = "",
        string $form_footer_html = "",
        string $target = "_self",
        string $formComponentFolderPath = "Views/components"
    ) {
        // Initialize form data properties
        $this->formData["form_id"] = $form_id;
        $this->formData["form_name"] = $form_name;
        $this->formData["form_header_title"] = $form_header_title;
        $this->formData["form_body_content"] = $form_body_content;
        $this->formData["form_submit_button_url"] = $form_submit_button_url;
        $this->formData["form_submit_button_lable"] = $form_submit_button_lable;
        $this->formData["form_cancle_button_lable"] = $form_cancle_button_lable;
        $this->formData["form_cancle_button_url"] = $form_cancle_button_url;
        $this->formData["form_method"] = $formmethod->value;
        $this->formData["form_enctype"] = $formenctype->value;
        $this->formData["form_autocomplete"] = $autocomplete;
        $this->formData["form_target"] = $target;
        $this->formData["form_classes"] = $form_classes;
        $this->formData["form_attributes"] = $form_attributes;
        $this->formData["form_footer_html"]= $form_footer_html;
        // Set the form component folder path
        $this->formComponentFolderPath = $formComponentFolderPath;
    }

    /**
     * Generates the HTML form based on the provided data.
     *
     * @return string The generated HTML form.
     */
    public function getForm($FormData = null): string
    {
        if($FormData == null){
            $FormData = $this->formData;
        }
        // Retrieve the raw form view
        return view($this->formComponentFolderPath . '\form',$FormData);
    }
}

