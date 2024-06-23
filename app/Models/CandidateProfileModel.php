<?php

namespace App\Models;

use App\Models\FunctionModel;

class CandidateProfileModel extends FunctionModel
{
    protected $table            = 'candidate_profile';
    protected $primaryKey       = 'candidate_profile_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "candidate_id",
        "candidate_name",
        "candidate_phone_number",
        "candidate_email",
        "country_id",
        "state_id",
        "city_id",
        "candidate_age",
        "candidate_date_of_birth",
        "candidate_gender",
        "candidate_qualification",
        "candidate_experience",
        "english_required",
        "job_type_id",
        "candidate_resume",
        "job_description",
        "user_id"
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
        'candidate_id' => 'permit_empty',
        'candidate_name' => 'required|max_length[255]',
        'candidate_phone_number' => 'required|max_length[15]',
        'candidate_email' => 'required|valid_email',
        'country_id' => 'permit_empty|is_not_unique[country.country_id]',
        'state_id' => 'permit_empty|is_not_unique[state.state_id]',
        'city_id' => 'permit_empty|is_not_unique[city.city_id]',
        'candidate_age' => 'required|max_length[3]',
        'candidate_date_of_birth' => 'required|valid_date',
        'candidate_gender' => 'required|[M, F]',
        'candidate_qualification' => 'required|in_list[primary_education, secondary_education, higher_secondary_education, bachelor_degree, master_degree, phd]',
        'candidate_experience' => 'required|in_list[F, 0M-6M, 1Y, 2Y, 3Y, 4Y, 5Y, 5Y+]',
        'english_required' => 'required|in_list[no_knowledge, basic, conversational, working_professional, fluent, advanced, proficient, native]',
        'job_type_id' => 'permit_empty|is_not_unique[job_type.job_type_id]',
        'candidate_resume' => 'required',
        'job_description' => 'required',
        'user_id' => 'permit_empty|is_not_unique[user.user_id]'
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

    public function __construct(){
        parent::__construct();
        $this->addParentJoin('user_id',$this->getUserModel(),'left',['user_id','fullname', 'email', 'mobile','user_type']);
        $this->addParentJoin('country_id',$this->getCountryModel(),'left',['country_name','phonecode as "country code"']);
        $this->addParentJoin('state_id',$this->getStateModel(),'left',['state_name','state_code']);
        $this->addParentJoin('city_id',$this->getCityModel(),'left',['city_name']);
    }
}
