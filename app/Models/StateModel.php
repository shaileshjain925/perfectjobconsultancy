<?php

namespace App\Models;

use App\Models\FunctionModel;

class StateModel extends FunctionModel
{
    protected $DBGroup          = 'default';
    protected $table = 'mst_states';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    // protected $returnType       = \App\Entities\StateEntity::class;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["id", "name", "state_code", "country_id", "short_name"];

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
        'country_id' => 'required|integer|is_not_unique[mst_countries.id]'
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
