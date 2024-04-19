<?php

namespace App\Models;

use App\Models\FunctionModel;

class BssMediaGalleryModel extends FunctionModel
{
    
    protected $table            = 'bss_media_gallery';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id','title', 'description', 'type', 'media_url', 'redirect_url', 'is_publish'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'id' => 'permit_empty',
        'title' => 'required|max_length[255]',
        'description' => 'permit_empty',
        'type' => 'required|in_list[image,video]',
        'media_url' => 'required|valid_url',
        'redirect_url' => 'permit_empty|valid_url',
        'is_publish' => 'required|in_list[0,1]',
    ];

    protected $validationMessages = [
        'title' => [
            'required' => 'Title is required.',
            'max_length' => 'Title cannot exceed 255 characters.',
        ],
        'type' => [
            'required' => 'Type is required.',
            'in_list' => 'Invalid type.',
        ],
        'media_url' => [
            'required' => 'Media URL is required.',
            'valid_url' => 'Please enter a valid URL for the media.',
        ],
        'redirect_url' => [
            'valid_url' => 'Please enter a valid URL for redirection.',
        ],
        'is_publish' => [
            'required' => 'Publish status is required.',
            'in_list' => 'Invalid publish status.',
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
