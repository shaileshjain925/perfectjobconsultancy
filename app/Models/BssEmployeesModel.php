<?php

namespace App\Models;

use App\Models\FunctionModel;

class BssEmployeesModel extends FunctionModel
{
    
    protected $table            = 'bss_employees';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'department',
        'designation',
        'salary',
        'hire_date',
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
        'first_name' => 'required|max_length[255]',
        'last_name' => 'required|max_length[255]',
        'email' => 'permit_empty|max_length[255]|valid_email',
        'phone' => 'permit_empty|max_length[20]',
        'department' => 'permit_empty|max_length[255]',
        'designation' => 'permit_empty|max_length[255]',
        'salary' => 'permit_empty|numeric',
        'hire_date' => 'permit_empty|valid_date',
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
