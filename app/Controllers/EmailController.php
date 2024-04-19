<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use ApiResponseStatusCode;

class EmailController extends BaseController
{
    public $email_smtp_host;
    public $email_smtp_port;
    public $email_smtp_user;
    public $email_smtp_password;
    public $email_smtp_crypto;
    public $email_from_email;
    public $email_from_name;
    // 
    public $email_to_email;
    public $email_subject;
    public $email_message;
    public $email_attachement;
    public $CompanyProfileData;
    public $errors = [];
    public function __construct()
    {
        $result = $this->getBssWebsiteProfileModel()->findAll();
        
        if (empty($result)) {
            $this->errors[] = ['error' => "Company Profile Not Created"];
        } else {
            $CompanyProfileData = $result[0];
            $validationRules = [
                'email_smtp_host' => 'required',
                'email_smtp_port' => 'required',
                'email_smtp_user' => 'required',
                'email_smtp_password' => 'required',
                'email_smtp_crypto' => 'required',
                'email_from_email' => 'required',
                'email_from_name' => 'required',
            ];

            $validator = \Config\Services::validation();
            $validator->setRules($validationRules);

            // Perform validation on your data
            if (!$validator->run($CompanyProfileData)) {
                $this->errors[] = $validator->getErrors();
            }
            $this->CompanyProfileData = $CompanyProfileData;
            $this->email_smtp_host = $CompanyProfileData['email_smtp_host'];
            $this->email_smtp_port = $CompanyProfileData['email_smtp_port'];
            $this->email_smtp_user = $CompanyProfileData['email_smtp_user'];
            $this->email_smtp_password = $CompanyProfileData['email_smtp_password'];
            $this->email_smtp_crypto = $CompanyProfileData['email_smtp_crypto'];
            $this->email_from_email = $CompanyProfileData['email_from_email'];
            $this->email_from_name = $CompanyProfileData['email_from_name'];
        }
    }
    public function setEmail(string $email)
    {
        $this->email_to_email = $email;
    }
    public function ContactUsTemplate($data)
    {
        if (!empty($this->CompanyProfileData['contact_email'])) {
            $this->email_to_email = $this->CompanyProfileData['contact_email'];
        } else {
            $this->errors[] = ['contact_email' => 'Contact Email Required In Website Profile'];
        }
        $this->email_subject = "New Contact Form Enquiry: ".$data['name'];
        $data = array_merge($this->CompanyProfileData,$data);
        $this->email_message = view('Views/EmailTemplate/Contact',$data);
    }
    public function SalesFormTemplate($data)
    {
        if (!empty($this->CompanyProfileData['sales_email'])) {
            $this->email_to_email = $this->CompanyProfileData['sales_email'];
        } else {
            $this->errors[] = ['sales_email' => 'Sales Email Required In Website Profile'];
        }

        $this->email_subject = "New Sales Enquiry: ".$data['name'];
        $data = array_merge($this->CompanyProfileData,$data);
        $this->email_message = view('Views/EmailTemplate/Sales',$data);
    }
    public function SupportFormTemplate($data)
    {
        if (!empty($this->CompanyProfileData['support_email'])) {
            $this->email_to_email = $this->CompanyProfileData['support_email'];
        } else {
            $this->errors[] = ['support_email' => 'Support Email Required In Website Profile'];
        }
        $this->email_subject = "New Support Enquiry: ".$data['name'];
        $data = array_merge($this->CompanyProfileData,$data);
        $this->email_message = view('Views/EmailTemplate/Support', $data);
    }
    public function CareerFormTemplate($data)
    {
        if (!empty($this->CompanyProfileData['career_email'])) {
            $this->email_to_email = $this->CompanyProfileData['career_email'];
        } else {
            $this->errors[] = ['career_email' => 'Career Email Required In Website Profile'];
        }
        $this->email_subject = "New Career Enquiry: ".$data['name'];
        $data = array_merge($this->CompanyProfileData,$data);
        $this->email_message = view('Views/EmailTemplate/Career',$data);
    }
    public function SubscribeFormTemplate($data)
    {
        $this->email_to_email = $data['email'] ?? "";
        $this->email_subject = "Thank You For Subscribe";
        $data = array_merge($this->CompanyProfileData,$data);
        $this->email_message = view('Views/EmailTemplate/Subscribe',$data);
    }
    public function UnSubscribeFormTemplate($data)
    {
        $this->email_to_email = $data['email'] ?? "";
        $this->email_subject = "UnSubscribe Successfully";
        $data = array_merge($this->CompanyProfileData,$data);
        $this->email_message = view('Views/EmailTemplate/UnSubscribe',$data);
    }
    public function BlogFormTemplate($data)
    {
        $this->email_subject = "New Blog Post: ".$data['title'];
        $data = array_merge($this->CompanyProfileData,$data);
        $this->email_message = view('Views/EmailTemplate/Blog',$data);
    }
    public function sendEmail()
    {
        if (!empty($this->errors)) {
            return formatCommonResponse(ApiResponseStatusCode::BAD_REQUEST, 'Email Not Send', [], $this->errors);
        }
        $email = \Config\Services::email();
        // Set email configuration
        $email->setMailType('html'); // Set email format to HTML
        $email->setNewline("\r\n");

        // Set SMTP configuration
        $config['protocol'] = 'smtp';
        $config['SMTPHost'] = $this->email_smtp_host;
        $config['SMTPPort'] = $this->email_smtp_port;
        $config['SMTPUser'] = $this->email_smtp_user;
        $config['SMTPPass'] = $this->email_smtp_password;
        $config['SMTPCrypto'] = $this->email_smtp_crypto; // ssl or tls

        // Initialize email library with SMTP configuration
        $email->initialize($config);

        // Set email details
        $email->setTo($this->email_to_email);
        $email->setFrom($this->email_from_email, $this->email_from_name);
        $email->setSubject($this->email_subject);
        $email->setMessage($this->email_message);

        // Add attachment if needed
        if (!empty($this->email_attachement)) {
            $email->attach($this->email_attachement);
        }

        // Send email
        if ($email->send()) {
            return formatCommonResponse(ApiResponseStatusCode::OK, 'Email Send Succesfully');
        } else {
            return formatCommonResponse(ApiResponseStatusCode::OK, 'Email Not Send', [], ['error' => 'Email could not be sent: ' . $email->printDebugger(['headers'])]);
        }
    }
}
