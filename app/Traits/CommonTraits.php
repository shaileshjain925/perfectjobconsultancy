<?php

namespace App\Traits;

use App\Models\CountryModel;
use App\Controllers\CountryController;
use App\Models\StateModel;
use App\Controllers\StateController;
use App\Models\CityModel;
use App\Controllers\CityController;
use App\Models\CompanyModel;
use App\Controllers\CompanyController;
use App\Models\CompanyUserModel;
use App\Controllers\CompanyUserController;
use App\Models\CompanyUserTokenModel;
use App\Controllers\CompanyUserTokenController;
use App\Models\ModuleModel;
use App\Controllers\ModuleController;
use App\Models\ModuleMenuModel;
use App\Controllers\ModuleMenuController;
use App\Models\RoleModel;
use App\Controllers\RoleController;
use App\Models\RoleMenuAccessRightsModel;
use App\Controllers\RoleMenuAccessRightsController;
use App\Models\UserModel;
use App\Controllers\UserController;
use App\Controllers\ApiController;
use App\Controllers\PageController;
use App\Controllers\Auth\ActionController;
use App\Controllers\Auth\LoginController;
use App\Controllers\Auth\MagicLinkController;
use App\Controllers\Auth\RegisterController;
use App\Controllers\ApiWebsiteManagementController;
use App\Models\BssBlogPostModel;
use App\Controllers\BssBlogPostController;
use App\Models\BssEmployeesModel;
use App\Controllers\BssEmployeesController;
use App\Models\BssFormSubmissionsModel;
use App\Controllers\BssFormSubmissionsController;
use App\Models\BssMediaGalleryModel;
use App\Controllers\BssMediaGalleryController;
use App\Models\BssProductsServicesModel;
use App\Controllers\BssProductsServicesController;
use App\Models\BssSubscribersModel;
use App\Controllers\BssSubscribersController;
use App\Models\BssVisitorsModel;
use App\Controllers\BssVisitorsController;
use App\Models\BssWebsiteProfileModel;
use App\Controllers\BssWebsiteProfileController;
use App\Controllers\EmailController;
use App\Models\BssClientsModel;
use App\Controllers\BssClientsController;





trait CommonTraits
{
    // Models

    /**
     * Return Model Instance
     * @return CountryModel
     */
    public static function getCountryModel(): CountryModel
    {
        return new CountryModel();
    }

    /**
     * Return Model Instance
     * @return StateModel
     */
    public static function getStateModel(): StateModel
    {
        return new StateModel();
    }

    /**
     * Return Model Instance
     * @return CityModel
     */
    public static function getCityModel(): CityModel
    {
        return new CityModel();
    }

    /**
     * Return Model Instance
     * @return CompanyModel
     */
    public static function getCompanyModel(): CompanyModel
    {
        return new CompanyModel();
    }

    /**
     * Return Model Instance
     * @return CompanyUserModel
     */
    public static function getCompanyUserModel(): CompanyUserModel
    {
        return new CompanyUserModel();
    }

    /**
     * Return Model Instance
     * @return CompanyUserTokenModel
     */
    public static function getCompanyUserTokenModel(): CompanyUserTokenModel
    {
        return new CompanyUserTokenModel();
    }

    /**
     * Return Model Instance
     * @return ModuleModel
     */
    public static function getModuleModel(): ModuleModel
    {
        return new ModuleModel();
    }

    /**
     * Return Model Instance
     * @return ModuleMenuModel
     */
    public static function getModuleMenuModel(): ModuleMenuModel
    {
        return new ModuleMenuModel();
    }

    /**
     * Return Model Instance
     * @return RoleModel
     */
    public static function getRoleModel(): RoleModel
    {
        return new RoleModel();
    }

    /**
     * Return Model Instance
     * @return RoleMenuAccessRightsModel
     */
    public static function getRoleMenuAccessRightsModel(): RoleMenuAccessRightsModel
    {
        return new RoleMenuAccessRightsModel();
    }

    /**
     * Return Model Instance
     * @return UserModel
     */
    public static function getUserModel(): UserModel
    {
        return new UserModel();
    }

    // Controllers -------------------------------------------------------------------------------

    /**
     * Return Controller Instance
     * @return CountryController
     */
    public static function getCountryController(): CountryController
    {
        return new CountryController();
    }

    /**
     * Return Controller Instance
     * @return StateController
     */
    public static function getStateController(): StateController
    {
        return new StateController();
    }

    /**
     * Return Controller Instance
     * @return CityController
     */
    public static function getCityController(): CityController
    {
        return new CityController();
    }

    /**
     * Return Controller Instance
     * @return CompanyController
     */
    public static function getCompanyController(): CompanyController
    {
        return new CompanyController();
    }

    /**
     * Return Controller Instance
     * @return CompanyUserController
     */
    public static function getCompanyUserController(): CompanyUserController
    {
        return new CompanyUserController();
    }

    /**
     * Return Controller Instance
     * @return CompanyUserTokenController
     */
    public static function getCompanyUserTokenController(): CompanyUserTokenController
    {
        return new CompanyUserTokenController();
    }

    /**
     * Return Controller Instance
     * @return ModuleController
     */
    public static function getModuleController(): ModuleController
    {
        return new ModuleController();
    }

    /**
     * Return Controller Instance
     * @return ModuleMenuController
     */
    public static function getModuleMenuController(): ModuleMenuController
    {
        return new ModuleMenuController();
    }

    /**
     * Return Controller Instance
     * @return RoleController
     */
    public static function getRoleController(): RoleController
    {
        return new RoleController();
    }

    /**
     * Return Controller Instance
     * @return RoleMenuAccessRightsController
     */
    public static function getRoleMenuAccessRightsController(): RoleMenuAccessRightsController
    {
        return new RoleMenuAccessRightsController();
    }

    /**
     * Return Controller Instance
     * @return UserController
     */
    public static function getUserController(): UserController
    {
        return new UserController();
    }
    /**
     * Return instance of BssBlogPostController
     *
     * @return BssBlogPostController
     */
    public static function getBssBlogPostController(): BssBlogPostController
    {
        return new BssBlogPostController();
    }

    /**
     * Return instance of BssEmployeesController
     *
     * @return BssEmployeesController
     */
    public static function getBssEmployeesController(): BssEmployeesController
    {
        return new BssEmployeesController();
    }

    /**
     * Return instance of BssFormSubmissionsController
     *
     * @return BssFormSubmissionsController
     */
    public static function getBssFormSubmissionsController(): BssFormSubmissionsController
    {
        return new BssFormSubmissionsController();
    }

    /**
     * Return instance of BssMediaGalleryController
     *
     * @return BssMediaGalleryController
     */
    public static function getBssMediaGalleryController(): BssMediaGalleryController
    {
        return new BssMediaGalleryController();
    }

    /**
     * Return instance of BssProductsServicesController
     *
     * @return BssProductsServicesController
     */
    public static function getBssProductsServicesController(): BssProductsServicesController
    {
        return new BssProductsServicesController();
    }

    /**
     * Return instance of BssSubscribersController
     *
     * @return BssSubscribersController
     */
    public static function getBssSubscribersController(): BssSubscribersController
    {
        return new BssSubscribersController();
    }

    /**
     * Return instance of BssVisitorsController
     *
     * @return BssVisitorsController
     */
    public static function getBssVisitorsController(): BssVisitorsController
    {
        return new BssVisitorsController();
    }

    /**
     * Return instance of BssWebsiteProfileController
     *
     * @return BssWebsiteProfileController
     */
    public static function getBssWebsiteProfileController(): BssWebsiteProfileController
    {
        return new BssWebsiteProfileController();
    }

    /**
     * Return instance of BssBlogPostModel
     *
     * @return BssBlogPostModel
     */
    public static function getBssBlogPostModel(): BssBlogPostModel
    {
        return new BssBlogPostModel();
    }

    /**
     * Return instance of BssEmployeesModel
     *
     * @return BssEmployeesModel
     */
    public static function getBssEmployeesModel(): BssEmployeesModel
    {
        return new BssEmployeesModel();
    }

    /**
     * Return instance of BssFormSubmissionsModel
     *
     * @return BssFormSubmissionsModel
     */
    public static function getBssFormSubmissionsModel(): BssFormSubmissionsModel
    {
        return new BssFormSubmissionsModel();
    }

    /**
     * Return instance of BssMediaGalleryModel
     *
     * @return BssMediaGalleryModel
     */
    public static function getBssMediaGalleryModel(): BssMediaGalleryModel
    {
        return new BssMediaGalleryModel();
    }

    /**
     * Return instance of BssProductsServicesModel
     *
     * @return BssProductsServicesModel
     */
    public static function getBssProductsServicesModel(): BssProductsServicesModel
    {
        return new BssProductsServicesModel();
    }

    /**
     * Return instance of BssSubscribersModel
     *
     * @return BssSubscribersModel
     */
    public static function getBssSubscribersModel(): BssSubscribersModel
    {
        return new BssSubscribersModel();
    }

    /**
     * Return instance of BssVisitorsModel
     *
     * @return BssVisitorsModel
     */
    public static function getBssVisitorsModel(): BssVisitorsModel
    {
        return new BssVisitorsModel();
    }

    /**
     * Return instance of BssWebsiteProfileModel
     *
     * @return BssWebsiteProfileModel
     */
    public static function getBssWebsiteProfileModel(): BssWebsiteProfileModel
    {
        return new BssWebsiteProfileModel();
    }
    /**
     * Return instance of ApiController
     *
     * @return ApiController
     */
    public static function getApiController(): ApiController
    {
        return new ApiController();
    }

    /**
     * Return instance of PageController
     *
     * @return PageController
     */
    public static function getPageController(): PageController
    {
        return new PageController();
    }

    /**
     * Return instance of ActionController
     *
     * @return ActionController
     */
    public static function getActionController(): ActionController
    {
        return new ActionController();
    }

    /**
     * Return instance of LoginController
     *
     * @return LoginController
     */
    public static function getLoginController(): LoginController
    {
        return new LoginController();
    }

    /**
     * Return instance of MagicLinkController
     *
     * @return MagicLinkController
     */
    public static function getMagicLinkController(): MagicLinkController
    {
        return new MagicLinkController();
    }

    /**
     * Return instance of RegisterController
     *
     * @return RegisterController
     */
    public static function getRegisterController(): RegisterController
    {
        return new RegisterController();
    }

    /**
     * Return instance of ApiWebsiteManagementController
     *
     * @return ApiWebsiteManagementController
     */
    public static function getApiWebsiteManagementController(): ApiWebsiteManagementController
    {
        return new ApiWebsiteManagementController();
    }
    /**
     * Return instance of ApiWebsiteManagementController
     *
     * @return EmailController
     */
    public static function getEmailController(): EmailController
    {
        return new EmailController();
    }
    public static function getBssClientsController(): BssClientsController
    {
        return new BssClientsController();
    }
    public static function getBssClientsModel(): BssClientsModel
    {
        return new BssClientsModel();
    }
}
