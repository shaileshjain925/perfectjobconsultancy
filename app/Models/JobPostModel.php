<?php

namespace App\Models;

use App\Models\FunctionModel;

class JobPostModel extends FunctionModel
{
    protected $table            = 'job_post';
    protected $primaryKey       = 'job_post_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "job_post_id",
        "recruiter_profile_id",
        "job_title",
        "job_type_id",
        "job_position_id",
        "salary_min",
        "salary_max",
        "number_of_openings",
        "work_from_home",
        "job_duration",
        "internship_paid",
        "internship_certificate",
        "internship_time_duration",
        "qualification",
        "experience",
        "gender",
        "english_required",
        "job_description",
        "job_timings",
        "interview_details",
        "country_id",
        "state_id",
        "city_id",
        "job_post_status",
        "job_post_approvel"
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
        'job_post_id' => 'permit_empty',
        'recruiter_profile_id' => 'permit_empty|is_not_unique[recruiter_profile.recruiter_profile_id]',
        'job_title' => 'required|max_length[255]',
        'job_type_id' => 'permit_empty|is_not_unique[job_type.job_type_id]',
        'job_position_id' => 'permit_empty|is_not_unique[job_position.job_position_id]',
        'salary_min' => 'required|max_length[11]',
        'salary_max' => 'required|max_length[11]',
        'number_of_openings' => 'required|max_length[4]',
        'work_from_home' => 'required',
        'job_duration' => 'required|in_list[full-time, part-time, internship]',
        'internship_paid' => 'required',
        'internship_certificate' => 'required',
        'internship_time_duration' => 'required|in_list[1M, 6M, 1Y, 1Y+]',
        'qualification' => 'required|in_list[primary_education, secondary_education, higher_secondary_education, bachelor_degree, master_degree,phd]',
        'experience' => 'required|in_list[F,0M-6M,1Y,2Y,3Y,4Y,5Y,5Y+]',
        'gender' => 'required|in_list[M,F,B]',
        'english_required' => 'required|[no_knowledge, basic, conversational, working_professional, fluent, advanced, proficient, native]',
        'job_description' => 'required',
        'job_timings' => 'required',
        'interview_details' => 'required',
        'country_id' => 'permit_empty|is_not_unique[country.country_id]',
        'state_id' => 'permit_empty|is_not_unique[state.state_id]',
        'city_id' => 'permit_empty|is_not_unique[city.city_id]',
        'job_post_status' => 'required',
        'job_post_approvel' => 'permit_empty'
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
        $this->addParentJoin("recruiter_profile_id", $this->getRecruiterProfileModel(), "left", ['company_name', 'company_address', 'company_phone_number', 'company_email_address']);
        $this->addParentJoin("job_type_id", $this->getJobTypeModel(), "left", ['job_type_name']);
        $this->addParentJoin("job_position_id", $this->getJobPositionModel(), "left", ['job_position_name']);
        $this->addParentJoin('country_id',$this->getCountryModel(),'left',['country_name','phonecode as "country code"']);
        $this->addParentJoin('state_id',$this->getStateModel(),'left',['state_name','state_code']);
        $this->addParentJoin('city_id',$this->getCityModel(),'left',['city_name']);
    }
}

