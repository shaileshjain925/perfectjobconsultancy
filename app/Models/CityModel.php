<?php

namespace App\Models;

use App\Models\FunctionModel;

class CityModel extends FunctionModel
{
    protected $DBGroup          = 'default';
    protected $table= 'mst_cities';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    // protected $returnType       = \App\Entities\CityEntity::class;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["id","name","state_id","country_id"];
            
    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
            
    // Validation
    protected $validationRules = [
        'id' => 'permit_empty',
        'name' => 'required',
        'state_id' => 'required|integer|is_not_unique[mst_states.id]', 
        'country_id' => 'required|integer|is_not_unique[mst_countries.id]' 
    ];
    
    protected $validationMessages = [
        'name' => [
            'required' => 'The name field is required.'
        ],
        'state_id' => [
            'required' => 'The state_id field is required.',
            'integer' => 'The state_id must be an integer.',
        ],
        'country_id' => [
            'required' => 'The country_id field is required.',
            'integer' => 'The country_id must be an integer.',
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