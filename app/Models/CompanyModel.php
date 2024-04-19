<?php

namespace App\Models;

use App\Models\FunctionModel;

class CompanyModel extends FunctionModel
{
    protected $table            = 'mst_company';
    protected $primaryKey       = 'company_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    =  ['company_id','firm_name', 'hostname', 'port', 'username', 'password', 'database', 'api_token', 'is_active'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'company_id' => 'permit_empty',
        'firm_name' => 'required|max_length[255]|is_unique[mst_company.firm_name,company_id,{company_id}]',
        'hostname' => 'required|max_length[255]',
        'port' => 'required|integer',
        'username' => 'required|max_length[255]',
        'password' => 'max_length[255]',
        'database' => 'required|max_length[255]',
        'api_token' => 'required|max_length[255]',
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
    protected $messageAlias = "Company";
}
