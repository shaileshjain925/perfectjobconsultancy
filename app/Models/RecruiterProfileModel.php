<?php

namespace App\Models;

use App\Models\FunctionModel;

class RecruiterProfileModel extends FunctionModel
{
    protected $table            = 'recruiter_profile';
    protected $primaryKey       = 'recruiter_profile_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "recruiter_profile_id",
        "company_name",
        "company_address",
        "country_id",
        "state_id",
        "city_id",
        "pincode",
        "company_phone_number",
        "company_email_address",
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
        'recruiter_profile_id' => 'permit_empty',
        'company_name' => 'required|max_length[255]',
        'company_address' => 'required',
        'country_id' => 'required|permit_empty|is_not_unique[country.country_id]',
        'state_id' => 'required|permit_empty|is_not_unique[state.state_id]',
        'city_id' => 'required|permit_empty|is_not_unique[city.city_id]',
        'pincode' => 'required|max_length[6]',
        'company_phone_number' => 'required|max_length[15]',
        'company_email_address' => 'required|valid_email',
        'user_id' =>'required|permit_empty|is_not_unique[user.user_id]',
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
