<?php

namespace App\Models;

use App\Models\FunctionModel;

class BssBlogPostModel extends FunctionModel
{
    
    protected $table            = 'bss_blog_post';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'title',
        'slug',
        'content',
        'featured_image',
        'status',
        'uploder_name',
        'uploder_id',
    ];


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
        'title' => 'required|max_length[255]',
        'slug' => 'required|max_length[255]|is_unique[bss_blog_post.slug,id,{id}]',
        'content' => 'required',
        'featured_image' => 'permit_empty|max_length[255]',
        'status' => 'required|in_list[draft,published]',
        'uploder_name' => 'required|max_length[255]',
        'uploder_id' => 'required|integer',
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
