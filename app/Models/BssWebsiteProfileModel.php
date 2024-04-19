<?php

namespace App\Models;

use App\Models\FunctionModel;

class BssWebsiteProfileModel extends FunctionModel
{
    
    protected $table            = 'bss_website_profile';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = [
        'id',
        'firm_name',
        'firm_slogan',
        'firm_logo_url',
        'firm_address',
        'firm_owner_name',
        'firm_cin_no',
        'firm_gst_no',
        'firm_pan_no',
        'contact_mobile',
        'contact_email',
        'contact_whatsapp',
        'sales_mobile',
        'sales_email',
        'sales_whatsapp',
        'support_mobile',
        'support_email',
        'support_whatsapp',
        'career_mobile',
        'career_email',
        'career_whatsapp',
        'about_company',
        'about_owner',
        'terms_and_conditions_content',
        'privacy_and_policies_content',
        'disclaimer_content',
        'firm_address_gmap_url',
        'website_url',
        'play_store_url',
        'app_store_url',
        'facebook_url',
        'instagram_url',
        'twitter_url',
        'linkedin_url',
        'youtube_url',
        'pinterest_url',
        'telegram_url',
        'google_search_url',
        'email_smtp_host',
        'email_smtp_port',
        'email_smtp_user',
        'email_smtp_password',
        'email_smtp_crypto',
        'email_from_email',
        'email_from_name',
        'bank_name',
        'bank_acc_name',
        'bank_acc_no',
        'bank_ifsc_code',
        'bank_acc_type',
        'google_pay_upi',
        'google_pay_number',
        'phone_pay_upi',
        'phone_pay_number',
        'paytm_upi',
        'paytm_number',
        'amazonpay_upi',
        'amazonpay_number',
        'bhim_upi',
        'bhim_number',
    ];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        "id" => "permit_empty",
        'firm_name' => "required|max_length[255]",
        'firm_slogan' => "permit_empty",
        'firm_logo_url' => "permit_empty|valid_url",
        'firm_address' => "permit_empty",
        'firm_owner_name' => "permit_empty|max_length[255]",
        'firm_cin_no' => "permit_empty|max_length[255]",
        'firm_gst_no' => "permit_empty|max_length[255]",
        'firm_pan_no' => "permit_empty|max_length[255]",
        'contact_mobile' => "permit_empty|max_length[15]|integer",
        'contact_email' => "permit_empty|max_length[255]|valid_email",
        'contact_whatsapp' => "permit_empty|max_length[15]",
        'sales_mobile' => "permit_empty|max_length[15]|integer",
        'sales_email' => "permit_empty|max_length[255]|valid_email",
        'sales_whatsapp' => "permit_empty|max_length[15]",
        'support_mobile' => "permit_empty|max_length[15]|integer",
        'support_email' => "permit_empty|max_length[255]|valid_email",
        'support_whatsapp' => "permit_empty|max_length[15]",
        'career_mobile' => "permit_empty|max_length[15]|integer",
        'career_email' => "permit_empty|max_length[255]|valid_email",
        'career_whatsapp' => "permit_empty|max_length[15]",
        'about_company' => "permit_empty",
        'about_owner' => "permit_empty",
        'terms_and_conditions_content' => "permit_empty",
        'privacy_and_policies_content' => "permit_empty",
        'disclaimer_content' => "permit_empty",
        'firm_address_gmap_url' => "permit_empty|valid_url",
        'website_url' => "permit_empty|valid_url",
        'play_store_url' => "permit_empty|valid_url",
        'app_store_url' => "permit_empty|valid_url",
        'facebook_url' => "permit_empty|valid_url",
        'instagram_url' => "permit_empty|valid_url",
        'twitter_url' => "permit_empty|valid_url",
        'linkedin_url' => "permit_empty|valid_url",
        'youtube_url' => "permit_empty|valid_url",
        'pinterest_url' => "permit_empty|valid_url",
        'telegram_url' => "permit_empty|valid_url",
        'google_search_url' => "permit_empty|valid_url",
        'email_smtp_host' => "permit_empty|max_length[255]",
        'email_smtp_port' => "permit_empty|max_length[11]",
        'email_smtp_user' => "permit_empty|max_length[255]",
        'email_smtp_password' => "permit_empty|max_length[255]",
        'email_smtp_crypto' => "permit_empty|in_list[ssl,tls,]",
        'email_from_email' => "permit_empty|max_length[255]",
        'email_from_name' => "permit_empty|max_length[255]",
        'bank_name' => "permit_empty|max_length[255]",
        'bank_acc_name' => "permit_empty|max_length[255]",
        'bank_acc_no' => "permit_empty|max_length[255]",
        'bank_ifsc_code' => "permit_empty|max_length[255]",
        'bank_acc_type' => "permit_empty|max_length[255]",
        'google_pay_upi' => "permit_empty|max_length[255]",
        'google_pay_number' => "permit_empty|max_length[255]",
        'phone_pay_upi' => "permit_empty|max_length[255]",
        'phone_pay_number' => "permit_empty|max_length[255]",
        'paytm_upi' => "permit_empty|max_length[255]",
        'paytm_number' => "permit_empty|max_length[255]",
        'amazonpay_upi' => "permit_empty|max_length[255]",
        'amazonpay_number' => "permit_empty|max_length[255]",
        'bhim_upi' => "permit_empty|max_length[255]",
        'bhim_number' => "permit_empty|max_length[255]",
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
