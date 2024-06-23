<?php

namespace App\Models;

use App\Models\FunctionModel;

class JobPostVsSkillsModel extends FunctionModel
{
    protected $table            = 'job_post_vs_skills';
    protected $primaryKey       = 'job_post_vs_skills_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "job_post_vs_skills_id",
        "job_post_id",
        "skills_id"
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'job_post_vs_skills_id' => 'permit_empty',
        'job_post_id' => 'required|max_length[11]|is_not_unique[job_post.job_post_id]',
        'skills_id' => 'permit_empty|is_not_unique[skills.skills_id]'
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
    public function __construct()
    {
        parent::__construct();
        $this->addParentJoin("job_post_id", $this->getJobPostModel(), "left", ['job_title']);
        $this->addParentJoin("skills_id", $this->getSkillsModel(), "left", ['skills_name']);
    }
}
