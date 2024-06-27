<div class="card">
    <div class="card-header py-3">
        <?= (isset($job_post_id) && !empty($job_post_id)) ? "Update" : "Add" ?> Job</h5>
    </div>
    <div class="card-body">
        <div class="error-message-box d-none">
            <p id="error-message"></p>
        </div>
        <div class="success-message-box d-none">
            <p id="success-message"></p>
        </div>
        <form id="form" method="POST" enctype="multipart/form-data" action="<?= @$ApiUrl ?>">
            <input type="hidden" name="job_post_id" id="job_post_id" value="<?= @$job_post_id  ?>">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body">
                        <div class="row">
                            <!-- Recuriter Profile -->
                            <?php if (isset($recruiter_profile_id) && !empty($recruiter_profile_id)) : ?>
                                <input type="hidden" name="recruiter_profile_id" id="recruiter_profile_id" value="<?= @$recruiter_profile_id  ?>">
                            <?php else : ?>
                                <div class="form-group col-md-3 mb-3">
                                    <label for="recruiter_profile_id">Select Company<span class="text-danger">*</span></label>
                                    <select placeholder="Select Country" id="recruiter_profile_id" name="recruiter_profile_id"></select>
                                    <span class="error-message" id="error-recruiter_profile_id"></span>
                                </div>
                            <?php endif; ?>
                            <!-- Job Title -->
                            <div class="form-group col-md-12 mb-3">
                                <label for="job_title">Job Title<span class="text-danger">*</span></label>
                                <input type="text" placeholder="Enter Job Title" id="job_title" name="job_title" class="form-control" value="<?= @$job_title ?>">
                                <span class="error-message" id="error-job_title"></span>
                            </div>
                            <!-- Job Type -->
                            <div class="form-group col-md-3 mb-3">
                                <label for="job_type_id">Job Type<span class="text-danger">*</span></label>
                                <select placeholder="Select Job Type" id="job_type_id" name="job_type_id"></select>
                                <span class="error-message" id="error-job_type_id"></span>
                            </div>
                            <!-- Job Position -->
                            <div class="form-group col-md-3 mb-3">
                                <label for="job_position_id">Job Position<span class="text-danger">*</span></label>
                                <select placeholder="Select Job Position" id="job_position_id" name="job_position_id"></select>
                                <span class="error-message" id="error-job_position_id"></span>
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
    var selected_job_type_id = '<?= @$job_type_id ?>'
    var selected_job_position_id = '<?= @$job_position_id ?>'
    <?php if (isset($recruiter_profile_id) && !empty($recruiter_profile_id)) : ?>
        initializeSelectize('recruiter_profile_id', {
            placeholder: "Select Company"
        }, '<?= base_url(route_to('recruiter_profile_list_api')) ?>', {}, 'recruiter_profile_id', 'company_name')
    <?php endif; ?>
    // Job Type
    initializeSelectize('job_type_id', {
        placeholder: "Select Job Type"
    }, '<?= base_url(route_to('job_type_list_api')) ?>', {}, 'job_type_id', 'job_type_name', selected_job_type_id)
    // Job Position
    initializeSelectize('job_position_id', {
        placeholder: "Select Job Type"
    }, '<?= base_url(route_to('job_position_list_api')) ?>', {}, 'job_position_id', 'job_position_name', selected_job_position_id)
    $(document).ready(function() {});
</script>