<?php

namespace App\Models;

use App\Models\FunctionModel;

class CompanyUserModel extends FunctionModel
{
    protected $table            = 'mst_company_user';
    protected $primaryKey       = 'company_user_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['company_user_id','company_id', 'role_id', 'name', 'email', 'mobile', 'company_user_password', 'otp', 'otp_expiry_date', 'type', 'is_active'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'company_user_id' => 'permit_empty',
        'company_id' => 'required|integer|is_not_unique[mst_company.company_id]', // Assuming mst_company is your table name
        'role_id' => 'permit_empty|integer|is_not_unique[mst_roles.role_id]', // Assuming mst_roles is your table name    
        'name' => 'required|max_length[255]',
        'email' => 'required|valid_email|max_length[255]|is_unique[mst_company_user.email,company_user_id,{company_user_id}]',
        'mobile' => 'required|max_length[20]',
        'company_user_password' => 'required|max_length[255]',
        'otp' => 'permit_empty|max_length[10]',
        'otp_expiry_date' => 'permit_empty|valid_date',
        'type' => 'required|in_list[admin,staff]',
        'is_active' => 'required|in_list[0,1]',
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
