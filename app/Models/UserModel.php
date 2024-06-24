<?php

namespace App\Models;

use ApiResponseStatusCode;
use App\Models\FunctionModel;

class UserModel extends FunctionModel
{
    protected $table            = 'user';
    protected $primaryKey       = 'user_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'fullname', 'email', 'mobile', 'password', 'otp', 'user_type', 'is_active'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'user_id' => 'permit_empty|integer',
        'fullname' => 'required|max_length[255]',
        'email' => 'required|valid_email|max_length[255]|is_unique[user.email,user_id,{user_id}]',
        'mobile' => 'required|max_length[15]|is_unique[user.mobile,user_id,{user_id}]',
        'password' => 'required|max_length[255]',
        'otp' => 'permit_empty|max_length[6]',
        'user_type' => 'required|in_list[admin,recruiter,candidate]',
        'is_active' => 'in_list[0,1]'
    ];

    protected $validationMessages = [
        'fullname' => [
            'required' => 'Name is required.',
            'max_length' => 'Name must not exceed 255 characters.'
        ],
        'email' => [
            'required' => 'Email is required.',
            'valid_email' => 'Email must be a valid email address.',
            'max_length' => 'Email must not exceed 255 characters.',
            'is_unique' => 'The email address already exists.'
        ],
        'mobile' => [
            'required' => 'Mobile number is required.',
            'max_length' => 'Mobile number must not exceed 15 characters.',
            'is_unique' => 'The mobile number already exists.'
        ],
        'password' => [
            'required' => 'Password is required.',
            'max_length' => 'Password must not exceed 255 characters.'
        ],
        'otp' => [
            'max_length' => 'OTP must not exceed 6 characters.'
        ],
        'user_type' => [
            'required' => 'Registration Type is Required.',
            'in_list' => 'Invalid user type.'
        ]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $passwordField = "password";
    protected $loginFields = ['email', 'mobile'];
    protected $beforeInsert   = ['hashPassword', 'updateBooleanFields'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['hashPassword', 'updateBooleanFields'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    protected $booleanFields = ['is_active'];

    public function RecruiterListWithProfileDetails($filter = [])
    {
        try {
            $this->setTableAlias('r');
            $this->select('r.*');
            $this->where('r.user_type', 'recruiter');
            $this->join('recruiter_profile as rp', 'rp.recruiter_profile_id = r.user_id', 'left');
            $this->recruiterProfileQuery('rp', $filter);
            (isset($filter['user_id']) && !empty($filter['user_id'])) ? $this->where('r.user_id', $filter['user_id']) : "";
            (isset($filter['email']) && !empty($filter['email'])) ? $this->where('r.email', $filter['email']) : "";
            (isset($filter['mobile']) && !empty($filter['mobile'])) ? $this->where('r.mobile', $filter['mobile']) : "";
            (isset($filter['is_active']) && !empty($filter['is_active'])) ? $this->where('r.is_active', $filter['is_active']) : "";
            (isset($filter['email']) && !empty($filter['username'])) ? $this->orWhere('r.email', $filter['email']) : "";
            (isset($filter['mobile']) && !empty($filter['username'])) ? $this->orWhere('r.mobile', $filter['mobile']) : "";
            $result = $this->findAll();
            if (empty($result)) {
                return formatCommonResponse(ApiResponseStatusCode::NO_CONTENT, "Record Not Found");
            } else {
                return formatCommonResponse(ApiResponseStatusCode::OK, 'Record Found Successfully', $result);
            }
        } catch (\Throwable $th) {
            return formatCommonResponse(ApiResponseStatusCode::OK, $th->getMessage());
        }
    }
    public function CandidateListWithProfileDetails($filter = [])
    {
        try {
            $this->setTableAlias('c');
            $this->select('c.*');
            $this->where('c.user_type', 'candidate');
            $this->join('candidate_profile as cp', 'cp.recruiter_profile_id = c.user_id', 'left');
            $this->recruiterProfileQuery('rp', $filter);
            (isset($filter['user_id']) && !empty($filter['user_id'])) ? $this->where('c.user_id', $filter['user_id']) : "";
            (isset($filter['email']) && !empty($filter['email'])) ? $this->where('c.email', $filter['email']) : "";
            (isset($filter['mobile']) && !empty($filter['mobile'])) ? $this->where('c.mobile', $filter['mobile']) : "";
            (isset($filter['is_active']) && !empty($filter['is_active'])) ? $this->where('c.is_active', $filter['is_active']) : "";
            (isset($filter['email']) && !empty($filter['username'])) ? $this->orWhere('c.email', $filter['email']) : "";
            (isset($filter['mobile']) && !empty($filter['username'])) ? $this->orWhere('c.mobile', $filter['mobile']) : "";
            $result = $this->findAll();
            if (empty($result)) {
                return formatCommonResponse(ApiResponseStatusCode::NO_CONTENT, "Record Not Found");
            } else {
                return formatCommonResponse(ApiResponseStatusCode::OK, 'Record Found Successfully', $result);
            }
        } catch (\Throwable $th) {
            return formatCommonResponse(ApiResponseStatusCode::OK, $th->getMessage());
        }
    }
    protected function recruiterProfileQuery(string $join_alias, $filters = [])
    {
        $this->join('country', 'country.country_id = ' . $join_alias . '.country_id', 'left');
        $this->join('state', 'state.state_id = ' . $join_alias . '.state_id', 'left');
        $this->join('city', 'city.city_id = ' . $join_alias . '.city_id', 'left');
        $this->select("
        $join_alias.recruiter_profile_id,
        $join_alias.company_name,
        $join_alias.company_address,
        $join_alias.country_id,
        country.country_name,
        $join_alias.state_id,
        state.state_name,
        $join_alias.city_id,
        city.city_name,
        $join_alias.pincode,
        $join_alias.company_phone_number,
        $join_alias.company_email_address,
        $join_alias.created_at
        ");

        // Filter by recruiter_profile_id
        if (isset($filters['recruiter_profile_id'])) {
            $this->where($join_alias . '.recruiter_profile_id', $filters['recruiter_profile_id']);
        }

        // Filter by country
        if (isset($filters['country_id'])) {
            $this->where('country.country_id', $filters['country_id']);
        }

        // Filter by state
        if (isset($filters['state_id'])) {
            $this->where('state.state_id', $filters['state_id']);
        }

        // Filter by city
        if (isset($filters['city_id'])) {
            $this->where('city.city_id', $filters['city_id']);
        }
    }

    protected function candidateProfileQuery(string $join_alias, $filters = [])
    {
        $this->join('country', 'country.country_id = ' . $join_alias . '.country_id', 'left');
        $this->join('state', 'state.state_id = ' . $join_alias . '.state_id', 'left');
        $this->join('city', 'city.city_id = ' . $join_alias . '.city_id', 'left');
        $this->join('job_type', 'job_type.job_type_id = ' . $join_alias . '.job_type_id', 'left');
        $this->select("
        $join_alias.candidate_profile_id,
        $join_alias.candidate_name,
        $join_alias.candidate_phone_number,
        $join_alias.candidate_email,
        $join_alias.country_id,
        country.country_name,
        $join_alias.state_id,
        state.state_name,
        $join_alias.city_id,
        city.city_name,
        $join_alias.pincode,
        $join_alias.candidate_age,
        $join_alias.candidate_date_of_birth,
        $join_alias.candidate_gender,
        $join_alias.candidate_qualification,
        $join_alias.candidate_experience,
        $join_alias.english_required,
        $join_alias.job_type_id,
        job_type.job_type_name,
        $join_alias.candidate_resume,
        $join_alias.job_description,
        $join_alias.created_at
        ");

        // Filter by candidate_profile_id
        if (isset($filters['candidate_profile_id'])) {
            $this->where($join_alias . '.candidate_profile_id', $filters['candidate_profile_id']);
        }

        // Filter by country
        if (isset($filters['country_id'])) {
            $this->where('country.country_id', $filters['country_id']);
        }

        // Filter by state
        if (isset($filters['state_id'])) {
            $this->where('state.state_id', $filters['state_id']);
        }

        // Filter by city
        if (isset($filters['city_id'])) {
            $this->where('city.city_id', $filters['city_id']);
        }

        // Filter by job_type_id
        if (isset($filters['job_type_id'])) {
            $this->where('job_type.job_type_id', $filters['job_type_id']);
        }
    }
}
