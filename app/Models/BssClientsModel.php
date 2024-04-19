<?php

namespace App\Models;

use CodeIgniter\Model;

class BssClientsModel extends FunctionModel
{
    
    protected $table            = 'bss_clients';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['id','name', 'email', 'phone', 'created_at', 'updated_at'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'name' => 'required|max_length[100]',
        'email' => 'required|valid_email|max_length[100]',
        'phone' => 'required|max_length[20]',
    ];

    protected $validationMessages = [
        'name' => [
            'required' => 'Name is required.',
            'max_length' => 'Name cannot exceed 100 characters.'
        ],
        'email' => [
            'required' => 'Email is required.',
            'valid_email' => 'Please enter a valid email address.',
            'max_length' => 'Email cannot exceed 100 characters.'
        ],
        'phone' => [
            'required' => 'Phone is required.',
            'max_length' => 'Phone number cannot exceed 20 characters.'
        ]
    ];
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
