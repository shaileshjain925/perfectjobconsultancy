<div class="card">
    <div class="card-header py-3">
        <?= (isset($recruiter_profile_id) && !empty($recruiter_profile_id)) ? "Update" : "Add" ?> Profile</h5>
    </div>
    <div class="card-body">
        <div class="error-message-box d-none">
            <p id="error-message"></p>
        </div>
        <div class="success-message-box d-none">
            <p id="success-message"></p>
        </div>
        <form id="form" method="POST" enctype="multipart/form-data" action="<?= @$ApiUrl ?>">
            <input type="hidden" name="recruiter_profile_id" id="recruiter_profile_id" value="<?= @$recruiter_profile_id  ?>">
            <input type="hidden" name="user_id" id="user_id" value="<?= @$user_id  ?>">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body">
                        <div class="row">
                            <!-- Company Name -->
                            <div class="form-group col-md-12 mb-3">
                                <label for="company_name">Company Name<span class="text-danger">*</span></label>
                                <input type="text" placeholder="Enter Company Name" id="company_name" name="company_name" class="form-control" value="<?= @$company_name ?>">
                                <span class="error-message" id="error-company_name"></span>
                            </div>
                            <!-- Company Email -->
                            <div class="form-group col-md-6 mb-3">
                                <label for="company_email_address">Company Email<span class="text-danger">*</span></label>
                                <input type="email" placeholder="Enter Company Email" id="company_email_address" name="company_email_address" class="form-control" value="<?= @$company_email_address ?>">
                                <span class="error-message" id="error-company_email_address"></span>
                            </div>
                            <!-- Company Mobile -->
                            <div class="form-group col-md-6 mb-3">
                                <label for="company_phone_number">Company Mobile<span class="text-danger">*</span></label>
                                <input type="text" placeholder="Enter Company Mobile" id="company_phone_number" name="company_phone_number" class="form-control" value="<?= @$company_phone_number ?>">
                                <span class="error-message" id="error-company_phone_number"></span>
                            </div>
                            <!-- Company Address -->
                            <div class="form-group col-md-12 mb-3">
                                <label for="company_address">Company Address<span class="text-danger">*</span></label>
                                <textarea placeholder="Enter Company Address" id="company_address" name="company_address" class="form-control" rows="3"><?= @$company_address ?></textarea>
                                <span class="error-message" id="error-company_address"></span>
                            </div>
                            <!-- Company Country -->
                            <div class="form-group col-md-3 mb-3">
                                <label for="country_id">Country<span class="text-danger">*</span></label>
                                <select placeholder="Select Country" id="country_id" name="country_id"></select>
                                <span class="error-message" id="error-country_id"></span>
                            </div>
                            <!-- Company State -->
                            <div class="form-group col-md-3 mb-3">
                                <label for="state_id">State<span class="text-danger">*</span></label>
                                <select placeholder="Select State" id="state_id" name="state_id"></select>
                                <span class="error-message" id="error-state_id"></span>
                            </div>
                            <!-- Company City -->
                            <div class="form-group col-md-3 mb-3">
                                <label for="city_id">City<span class="text-danger">*</span></label>
                                <select placeholder="Select City" id="city_id" name="city_id"></select>
                                <span class="error-message" id="error-city_id"></span>
                            </div>
                            <!-- Company Pincode -->
                            <div class="form-group col-md-3 mb-3">
                                <label for="pincode">Pincode<span class="text-danger">*</span></label>
                                <input type="number" placeholder="Enter Pincode" id="pincode" name="pincode" class="form-control" value="<?= @$pincode ?>">
                                <span class="error-message" id="error-pincode"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div>
                    <button type="button" onclick="submitFormWithAjax('form',true,true,successCallback,errorCallback)" class="btn btn-primary waves-effect waves-light me-1">
                        Submit
                    </button>
                    <button type="reset" class="btn btn-secondary waves-effect" onclick="window.location.href='<?= base_url(route_to('recruiter_list')) ?>'">
                        Cancel
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function successCallback(response) {
        if (response.status == 200 || response.status == 201) {
            window.location.href = '<?= base_url(route_to('recruiter_list')) ?>'
        }
    }

    function errorCallback(response) {
        console.log(response);
    }
    var CountryApiUrl = '<?= base_url(route_to('country_list_api')) ?>'
    var selected_country_id = '<?= @$country_id ?>'
    var StateApiUrl = '<?= base_url(route_to('state_list_api')) ?>'
    var selected_state_id = '<?= @$state_id ?>'
    var CityApiUrl = '<?= base_url(route_to('city_list_api')) ?>'
    var selected_city_id = '<?= @$city_id ?>'

    $(document).ready(function() {});
</script>