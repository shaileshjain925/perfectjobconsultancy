<style>
    .label-value{
        color: black;
        font-weight: 600;
    }
</style>
<div class="card">
    <div class="card-header py-3">
        Company Details
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <div class="row">
                        <!-- Name -->
                        <div class="form-group col-md-12 mb-3">
                            <label class="form-label">Recuriter Name</label>
                            <p class='label-value' id="fullname" class="form-control-static"><?= @$fullname ?></p>
                        </div>

                        <!-- Email -->
                        <div class="form-group col-md-12 mb-3">
                            <label class="form-label">Recuriter E-Mail</label>
                            <p class='label-value' id="email" class="form-control-static"><?= @$email ?></p>
                        </div>

                        <!-- Mobile Number -->
                        <div class="form-group col-md-12 mb-3">
                            <label class="form-label">Recuriter Mobile Number</label>
                            <p class='label-value' id="mobile" class="form-control-static"><?= @$mobile ?></p>
                        </div>
                        <!-- Company Name -->
                        <div class="form-group col-md-12 mb-3">
                            <label class="form-label" for="company_name">Company Name</label>
                            <p class='label-value' id="company_name" class="form-control-static"><?= @$company_name ?></p>
                        </div>
                        <!-- Company Email -->
                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label" for="company_email_address">Company Email</label>
                            <p class='label-value' id="company_email_address" class="form-control-static"><?= @$company_email_address ?></p>
                        </div>
                        <!-- Company Mobile -->
                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label" for="company_phone_number">Company Mobile</label>
                            <p class='label-value' id="company_phone_number" class="form-control-static"><?= @$company_phone_number ?></p>
                        </div>
                        <!-- Company Address -->
                        <div class="form-group col-md-12 mb-3">
                            <label class="form-label" for="company_address">Company Address</label>
                            <p class='label-value' id="company_address" class="form-control-static"><?= @$company_address ?></p>
                        </div>
                        <!-- Company Country -->
                        <div class="form-group col-md-3 mb-3">
                            <label class="form-label" for="country_id">Country</label>
                            <p class='label-value' id="country_id" class="form-control-static"><?= @$country_name ?></p>
                        </div>
                        <!-- Company State -->
                        <div class="form-group col-md-3 mb-3">
                            <label class="form-label" for="state_name">State</label>
                            <p class='label-value' id="state_name" class="form-control-static"><?= @$state_name ?></p>
                        </div>
                        <!-- Company City -->
                        <div class="form-group col-md-3 mb-3">
                            <label class="form-label" for="city_name">City</label>
                            <p class='label-value' id="city_name" class="form-control-static"><?= @$city_name ?></p>
                        </div>
                        <!-- Company Pincode -->
                        <div class="form-group col-md-3 mb-3">
                            <label class="form-label" for="pincode">Pincode</label>
                            <p class='label-value' id="pincode" class="form-control-static"><?= @$pincode ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>