<?php

namespace App\Models;

use App\Models\FunctionModel;

class BssFormSubmissionsModel extends FunctionModel
{
    
    protected $table            = 'bss_form_submissions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'form_type',
        'name',
        'email',
        'mobile',
        'message',
        'attachment_blob',
        'attachment_url',
        'product_or_service_name',
        'product_or_service_id',
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
        'id' => 'permit_empty',
        'form_type' => 'required|in_list[contact_us,sales,support,career]',
        'name' => 'required|max_length[255]',
        'email' => 'required|max_length[255]|valid_email',
        'mobile' => 'permit_empty|max_length[15]|integer',
        'message' => 'permit_empty',
        'attachment_blob' => 'permit_empty',
        'attachment_url' => 'permit_empty|max_length[255]|valid_url',
        'product_or_service_name' => 'permit_empty|max_length[255]',
        'product_or_service_id' => 'permit_empty|integer',
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
