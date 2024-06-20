<?php

namespace App\Traits;

use App\Models\CountryModel;
use App\Models\StateModel;
use App\Models\CityModel;
use App\Models\UserModel;
use App\Models\CandidateProfileModel;
use App\Models\JobPositionModel;
use App\Models\JobPostModel;
use App\Models\JobPostVsSkillsModel;
use App\Models\JobTypeModel;
use App\Models\RecruiterProfileModel;
use App\Models\SkillsModel;


trait CommonTraits
{
    /**
     * Return Model Instance
     * @return CountryModel
     */
    public static function getCountryModel()
    {
        return new CountryModel();
    }
    /**
     * Return Model Instance
     * @return StateModel
     */
    public static function getStateModel()
    {
        return new StateModel();
    }
    /**
     * Return Model Instance
     * @return CityModel
     */
    public static function getCityModel()
    {
        return new CityModel();
    }
    /**
     * Return Model Instance
     * @return UserModel
     */
    public static function getUserModel()
    {
        return new UserModel();
    }
    /**
     * Return Model Instance
     * @return CandidateProfileModel
     */
    public static function getCandidateProfileModel()
    {
        return new CandidateProfileModel();
    }

        /**
     * Return Model Instance
     * @return JobPostModel
     */
    public static function getJobPostModel()
    {
        return new JobPostModel();
    }

        /**
     * Return Model Instance
     * @return JobPostVsSkillsModel
     */
    public static function getJobPostVsSkillsModel()
    {
        return new JobPostVsSkillsModel();
    }

        /**
     * Return Model Instance
     * @return JobPositionModel
     */
    public static function getJobPositionModel()
    {
        return new JobPositionModel();
    }

        /**
     * Return Model Instance
     * @return JobTypeModel
     */
    public static function getJobTypeModel()
    {
        return new JobTypeModel();
    }

        /**
     * Return Model Instance
     * @return RecruiterProfileModel
     */
    public static function getRecruiterProfileModel()
    {
        return new RecruiterProfileModel();
    }

        /**
     * Return Model Instance
     * @return SkillsModel
     */
    public static function getSkillsModel()
    {
        return new SkillsModel();
    }
}
