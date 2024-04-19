<?php

namespace App\Models;

use App\Models\FunctionModel;

class BssSubscribersModel extends FunctionModel
{
    
    protected $table            = 'bss_subscribers';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id','email', 'is_subscribe'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        "id" => 'permit_empty',
        'email' => 'required|valid_email|is_unique[bss_subscribers.email,id,{id}]',
        'is_subscribe' => 'required|in_list[0,1]',
    ];
    
    protected $validationMessages   = [
        'email' => [
            'required' => 'Email is required.',
            'valid_email' => 'Please enter a valid email address.',
            'is_unique' => 'This email is already subscribed.',
        ],
        'is_subscribe' => [
            'required' => 'Subscribe status is required.',
            'in_list' => 'Invalid subscribe status.',
        ],
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
