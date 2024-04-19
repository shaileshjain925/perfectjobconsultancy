<?php

namespace App\Models;

use App\Models\FunctionModel;

class RoleMenuAccessRightsModel extends FunctionModel
{
    protected $table            = 'mst_roles_menus_access_rights';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['role_id', 'menu_id', 'is_view', 'is_created', 'is_updated', 'is_deleted', 'is_export'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'role_id' => 'required|integer',
        'menu_id' => 'required|integer',
        'is_view' => 'required|in_list[0,1]',
        'is_created' => 'required|in_list[0,1]',
        'is_updated' => 'required|in_list[0,1]',
        'is_deleted' => 'required|in_list[0,1]',
        'is_export' => 'required|in_list[0,1]',
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
