<?php

namespace App\Models;

use App\Models\FunctionModel;

class CountryModel extends FunctionModel
{
    protected $DBGroup          = 'default';
    protected $table = 'mst_countries';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    // protected $returnType       = \App\Entities\CountryEntity::class;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["id", "name", "alias", "short_name", "phonecode", "currency", "currency_name", "currency_symbol", "region"];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    // Validation
    protected $validationRules = [
        'id' => 'permit_empty',
        'name' => 'required'
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
