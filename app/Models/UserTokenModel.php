<?php

namespace App\Models;

use App\Models\FunctionModel;

class UserTokenModel extends FunctionModel
{
    protected $table            = 'user_token';
    protected $primaryKey       = 'token_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['token_id','user_id', 'token', 'expiry', 'ip_address', 'device_name'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;


    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'token_id' => 'permit_empty',
        'user_id' => 'required|integer',
        'token' => 'required',
        'expiry' => 'required|valid_date',
        'ip_address' => 'required|valid_ip',
        'device_name' => 'required|max_length[100]'
    ];

    protected $validationMessages = [
        'user_id' => [
            'required' => 'User ID is required.',
            'integer' => 'User ID must be an integer.'
        ],
        'expiry' => [
            'valid_date' => 'Expiry must be a valid date.'
        ],
        'ip_address' => [
            'required' => 'IP Address is required.',
            'valid_ip' => 'IP Address must be a valid IP address.'
        ],
        'device_name' => [
            'required' => 'Device Name is required.',
            'max_length' => 'Device Name must not exceed 100 characters.'
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
