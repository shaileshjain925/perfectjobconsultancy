<?php

namespace App\Traits;
// Firebase Messaging Notification
use App\Models\FirebaseMessagingIntegrationModel;
use App\Models\FirebaseMessagingTokenModel;
use App\Models\FirebaseMessagingNotificationModel;
use App\Models\CountryModel;
use App\Models\StateModel;
use App\Models\CityModel;
use App\Models\CustomerAddressModel;
use App\Models\CustomerModel;
use App\Models\CustomerTokenModel;
use App\Models\CustomerVerificationModel;
use App\Models\CustomerWishlistModel;
use App\Models\FunctionModel;
use App\Models\MediaManagementModel;
use App\Models\BrandModel;
use App\Models\CategoryModel;
use App\Models\CategoryTypeModel;
use App\Models\FabricModel;
use App\Models\ProductModel;
use App\Models\SizeModel;
use App\Models\UserModel;
use App\Models\UserTokenModel;

use App\Controllers\EmailController;
use App\Models\PatternModel;
use App\Models\UnitModel;
use App\Models\ProductVariantModel;
use App\Models\SizeVsVariantModel;

trait CommonTraits
{
    /**
     * Return Model Instance
     * @return FirebaseMessagingIntegrationModel
     */
    public static function getFirebaseMessagingIntegrationModel()
    {
        return new FirebaseMessagingIntegrationModel();
    }
    /**
     * Return Model Instance
     * @return FirebaseMessagingTokenModel
     */
    public static function getFirebaseMessagingTokenModel()
    {
        return new FirebaseMessagingTokenModel();
    }
    /**
     * Return Model Instance
     * @return FirebaseMessagingNotificationModel
     */
    public static function getFirebaseMessagingNotificationModel()
    {
        return new FirebaseMessagingNotificationModel();
    }

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
     * @return CustomerAddressModel
     */
    public static function getCustomerAddressModel()
    {
        return new CustomerAddressModel();
    }
    /**
     * Return Model Instance
     * @return CustomerModel
     */
    public static function getCustomerModel()
    {
        return new CustomerModel();
    }
    /**
     * Return Model Instance
     * @return CustomerTokenModel
     */
    public static function getCustomerTokenModel()
    {
        return new CustomerTokenModel();
    }
    /**
     * Return Model Instance
     * @return CustomerVerificationModel
     */
    public static function getCustomerVerificationModel()
    {
        return new CustomerVerificationModel();
    }
    /**
     * Return Model Instance
     * @return CustomerWishlistModel
     */
    public static function getCustomerWishlistModel()
    {
        return new CustomerWishlistModel();
    }
    /**
     * Return Model Instance
     * @return FunctionModel
     */
    public static function getFunctionModel()
    {
        return new FunctionModel();
    }
    /**
     * Return Model Instance
     * @return BrandModel
     */
    public static function getBrandModel()
    {
        return new BrandModel();
    }
    /**
     * Return Model Instance
     * @return CategoryModel
     */
    public static function getCategoryModel()
    {
        return new CategoryModel();
    }
    /**
     * Return Model Instance
     * @return FabricModel
     */
    public static function getFabricModel()
    {
        return new FabricModel();
    }
    /**
     * Return Model Instance
     * @return ProductModel
     */
    public static function getProductModel()
    {
        return new ProductModel();
    }
    /**
     * Return Model Instance
     * @return SizeModel
     */
    public static function getSizeModel()
    {
        return new SizeModel();
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
     * @return CategoryTypeModel
     */
    public static function getCategoryTypeModel()
    {
        return new CategoryTypeModel();
    }
    /**
     * Return Model Instance
     * @return UserTokenModel
     */
    public static function getUserTokenModel()
    {
        return new UserTokenModel();
    }

    /**
     * Return Model Instance
     * @return MediaManagementModel
     */
    public static function getMediaManagementModel()
    {
        return new MediaManagementModel();
    }

    /**
     * Return Model Instance
     * @return EmailController
     */
    public static function getEmailController()
    {
        return new EmailController();
    }

    /**
     * Return Model Instance
     * @return UnitModel
     */
    public static function getUnitModel()
    {
        return new UnitModel();
    }

    /**
     * Return Model Instance
     * @return ProductVariantModel
     */
    public static function getProductVariantModel()
    {
        return new ProductVariantModel();
    }

    /**
     * Return Model Instance
     * @return SizeVsVariantModel
     */
    public static function getSizeVsVariantModel()
    {
        return new SizeVsVariantModel();
    }
    /**
     * Return Model Instance
     * @return PatternModel
     */
    public static function getPatternModel()
    {
        return new PatternModel();
    }
}
