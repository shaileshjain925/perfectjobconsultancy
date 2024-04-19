<?php $this->section('card'); ?>
<form autocomplete="on" id="WebsiteSetupCreateUpdate" method="<?= (isset($id) && !empty($id)) ? 'PATCH' : 'PUT' ?>">
    <div class="accordion position-relative" id="accordionExample">
        <div class="row">
            <div class="col-2">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#companydetail" aria-expanded="true" aria-controls="companydetail">
                    Company Details
                </button>
            </div>
            <div class="col-2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#contactinformation" aria-expanded="false" aria-controls="contactinformation">
                    Contact Information
                </button>
            </div>
            <div class="col-2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#websiteinformation" aria-expanded="false" aria-controls="websiteinformation">
                    Website Information
                </button>
            </div>
            <div class="col-2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#urlinformation" aria-expanded="false" aria-controls="urlinformation">
                    Social Media and Urls
                </button>
            </div>
            <div class="col-2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#emailintregation" aria-expanded="false" aria-controls="emailintregation">
                    Email Intregation
                </button>
            </div>
            <div class="col-2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#modeofpayment" aria-expanded="false" aria-controls="modeofpayment">
                    Mode of Payment
                </button>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
            </h2>
            <div id="companydetail" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="container">
                        <div class="row input-row">
                            <div class="col-12">
                                <label for="firm_name" class="form-label">Firm Name</label>
                                <input autocomplete="off" type="text" class="form-control" id="firm_name" name="firm_name" value="<?= @$firm_name ?>" placeholder="Firm Name" required>
                                <span class="error-message" id="firm_name-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="firm_slogan" class="form-label">Slogan</label>
                                <textarea class="form-control" id="firm_slogan" name="firm_slogan" rows="3" placeholder="Slogan"><?= @$firm_slogan ?></textarea>
                                <span class="error-message" id="firm_slogan-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="firm_address" class="form-label">Address</label>
                                <input autocomplete="off" type="text" class="form-control" id="firm_address" name="firm_address" value="<?= @$firm_address ?>" placeholder="Address">
                                <span class="error-message" id="firm_address-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="firm_owner_name" class="form-label">Owner Name</label>
                                <input autocomplete="off" type="text" class="form-control" id="firm_owner_name" name="firm_owner_name" value="<?= @$firm_owner_name ?>" placeholder="Owner Name">
                                <span class="error-message" id="firm_owner_name-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="firm_cin_no" class="form-label">CIN No</label>
                                <input autocomplete="off" type="text" class="form-control" id="firm_cin_no" name="firm_cin_no" value="<?= @$firm_cin_no ?>" placeholder="CIN No">
                                <span class="error-message" id="firm_cin_no-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="firm_gst_no" class="form-label">GST No</label>
                                <input autocomplete="off" type="text" class="form-control" id="firm_gst_no" name="firm_gst_no" value="<?= @$firm_gst_no ?>" placeholder="GST No">
                                <span class="error-message" id="firm_gst_no-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="firm_pan_no" class="form-label">PAN No</label>
                                <input autocomplete="off" type="text" class="form-control" id="firm_pan_no" name="firm_pan_no" value="<?= @$firm_pan_no ?>" placeholder="PAN No">
                                <span class="error-message" id="firm_pan_no-error"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">

            </h2>
            <div id="contactinformation" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="container">
                        <div class="row">
                            <div class="container text-center col-12">
                                <h5 class="text-secondary">Contact Information</h5>
                            </div>
                            <div class="col-4">
                                <label for="contact_mobile" class="form-label">Contact Mobile</label>
                                <input autocomplete="off" type="number" class="form-control" id="contact_mobile" name="contact_mobile" value="<?= @$contact_mobile ?>" placeholder="Enter Number" required>
                                <span class="error-message" id="contact_mobile-error"></span>
                            </div>
                            <div class="col-4">
                                <label for="contact_whatsapp" class="form-label">Contact Whatsapp</label>
                                <input autocomplete="off" type="number" class="form-control" id="contact_whatsapp" name="contact_whatsapp" value="<?= @$contact_whatsapp ?>" placeholder="Enter Number" required>
                                <span class="error-message" id="contact_whatsapp-error"></span>
                            </div>
                            <div class="col-4">
                                <label for="contact_email" class="form-label">Contact Email</label>
                                <input autocomplete="off" type="email" class="form-control" id="contact_email" name="contact_email" value="<?= @$contact_email ?>" placeholder="Enter Email" required>
                                <span class="error-message" id="contact_email-error"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="container text-center col-12">
                                <h5 class="text-secondary">Sale Information</h5>
                            </div>
                            <div class="col-4">
                                <label for="sales_mobile" class="form-label">Sales Mobile</label>
                                <input autocomplete="off" type="number" class="form-control" id="sales_mobile" name="sales_mobile" value="<?= @$sales_mobile ?>" placeholder="Enter Number" required>
                                <span class="error-message" id="sales_mobile-error"></span>
                            </div>
                            <div class="col-4">
                                <label for="sales_whatsapp" class="form-label">Sales Whatsapp</label>
                                <input autocomplete="off" type="number" class="form-control" id="sales_whatsapp" name="sales_whatsapp" value="<?= @$sales_whatsapp ?>" placeholder="Enter Number" required>
                                <span class="error-message" id="sales_whatsapp-error"></span>
                            </div>
                            <div class="col-4">
                                <label for="sales_email" class="form-label">Sales Email</label>
                                <input autocomplete="off" type="email" class="form-control" id="sales_email" name="sales_email" value="<?= @$sales_email ?>" placeholder="Enter Email" required>
                                <span class="error-message" id="sales_email-error"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="container text-center col-12">
                                <h5 class="text-secondary">Support Information</h5>
                            </div>
                            <div class="col-4">
                                <label for="support_mobile" class="form-label">Support Mobile</label>
                                <input autocomplete="off" type="number" class="form-control" id="support_mobile" name="support_mobile" value="<?= @$support_mobile ?>" placeholder="Enter Number" required>
                                <span class="error-message" id="support_mobile-error"></span>
                            </div>
                            <div class="col-4">
                                <label for="support_whatsapp" class="form-label">Support Whatsapp</label>
                                <input autocomplete="off" type="number" class="form-control" id="support_whatsapp" name="support_whatsapp" value="<?= @$support_whatsapp ?>" placeholder="Enter Number" required>
                                <span class="error-message" id="support_whatsapp-error"></span>
                            </div>
                            <div class="col-4">
                                <label for="support_email" class="form-label">Support Email</label>
                                <input autocomplete="off" type="email" class="form-control" id="support_email" name="support_email" value="<?= @$support_email ?>" placeholder="Enter Email" required>
                                <span class="error-message" id="support_email-error"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="container text-center col-12">
                                <h5 class="text-secondary">Career Information</h5>
                            </div>
                            <div class="col-4">
                                <label for="career_mobile" class="form-label">Career Mobile</label>
                                <input autocomplete="off" type="number" class="form-control" id="career_mobile" name="career_mobile" value="<?= @$career_mobile ?>" placeholder="Enter Number" required>
                                <span class="error-message" id="career_mobile-error"></span>
                            </div>
                            <div class="col-4">
                                <label for="career_whatsapp" class="form-label">Career Whatsapp</label>
                                <input autocomplete="off" type="number" class="form-control" id="career_whatsapp" name="career_whatsapp" value="<?= @$career_whatsapp ?>" placeholder="Enter Number" required>
                                <span class="error-message" id="career_whatsapp-error"></span>
                            </div>
                            <div class="col-4">
                                <label for="career_email" class="form-label">Career Email</label>
                                <input autocomplete="off" type="email" class="form-control" id="career_email" name="career_email" value="<?= @$career_email ?>" placeholder="Enter Email" required>
                                <span class="error-message" id="career_email-error"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">

            </h2>
            <div id="websiteinformation" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <label for="about_company" class="form-label">About company</label>
                                <textarea class="form-control" id="about_company" name="about_company" rows="3" placeholder="About company"><?= @$about_company ?></textarea>
                                <span class="error-message" id="about_company-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="about_owner" class="form-label">About owner</label>
                                <textarea class="form-control" id="about_owner" name="about_owner" rows="3" placeholder="About owner"><?= @$about_owner ?></textarea>
                                <span class="error-message" id="about_owner-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="terms_and_conditions_content" class="form-label">Terms and conditions</label>
                                <textarea class="form-control" id="terms_and_conditions_content" name="terms_and_conditions_content" rows="3" placeholder="Terms and conditions"><?= @$terms_and_conditions_content ?></textarea>
                                <span class="error-message" id="terms_and_conditions_content-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="privacy_and_policies_content" class="form-label">Privacy and policies</label>
                                <textarea class="form-control" id="privacy_and_policies_content" name="privacy_and_policies_content" rows="3" placeholder="Privacy and policies"><?= @$privacy_and_policies_content ?></textarea>
                                <span class="error-message" id="privacy_and_policies_content-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="disclaimer_content" class="form-label">Disclaimer content</label>
                                <textarea class="form-control" id="disclaimer_content" name="disclaimer_content" rows="3" placeholder="Disclaimer content"><?= @$disclaimer_content ?></textarea>
                                <span class="error-message" id="disclaimer_content-error"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">

            </h2>
            <div id="urlinformation" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="container">
                        <div class="row input-row">
                            <div class="col-12">
                                <label for="google_maps_url" class="form-label">Google Maps URL</label>
                                <input autocomplete="off" type="text" class="form-control" id="google_maps_url" name="google_maps_url" value="<?= @$google_maps_url ?>" placeholder="Google Maps URL">
                                <span class="error-message" id="google_maps_url-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="website_url" class="form-label">Website URL</label>
                                <input autocomplete="off" type="text" class="form-control" id="website_url" name="website_url" value="<?= @$website_url ?>" placeholder="Website URL">
                                <span class="error-message" id="website_url-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="play_store_url" class="form-label">Play Store URL</label>
                                <input autocomplete="off" type="text" class="form-control" id="play_store_url" name="play_store_url" value="<?= @$play_store_url ?>" placeholder="Play Store URL">
                                <span class="error-message" id="play_store_url-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="app_store_url" class="form-label">App Store URL</label>
                                <input autocomplete="off" type="text" class="form-control" id="app_store_url" name="app_store_url" value="<?= @$app_store_url ?>" placeholder="App Store URL">
                                <span class="error-message" id="app_store_url-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="facebook_url" class="form-label">Facebook URL</label>
                                <input autocomplete="off" type="text" class="form-control" id="facebook_url" name="facebook_url" value="<?= @$facebook_url ?>" placeholder="Facebook URL">
                                <span class="error-message" id="facebook_url-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="instagram_url" class="form-label">Instagram URL</label>
                                <input autocomplete="off" type="text" class="form-control" id="instagram_url" name="instagram_url" value="<?= @$instagram_url ?>" placeholder="Instagram URL">
                                <span class="error-message" id="instagram_url-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="twitter_url" class="form-label">Twitter URL</label>
                                <input autocomplete="off" type="text" class="form-control" id="twitter_url" name="twitter_url" value="<?= @$twitter_url ?>" placeholder="Twitter URL">
                                <span class="error-message" id="twitter_url-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="linkedin_url" class="form-label">LinkedIn URL</label>
                                <input autocomplete="off" type="text" class="form-control" id="linkedin_url" name="linkedin_url" value="<?= @$linkedin_url ?>" placeholder="LinkedIn URL">
                                <span class="error-message" id="linkedin_url-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="youtube_url" class="form-label">YouTube URL</label>
                                <input autocomplete="off" type="text" class="form-control" id="youtube_url" name="youtube_url" value="<?= @$youtube_url ?>" placeholder="YouTube URL">
                                <span class="error-message" id="youtube_url-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="telegram_url" class="form-label">Telegram URL</label>
                                <input autocomplete="off" type="text" class="form-control" id="telegram_url" name="telegram_url" value="<?= @$telegram_url ?>" placeholder="Telegram URL">
                                <span class="error-message" id="telegram_url-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="pinterest_url" class="form-label">Pinterest URL</label>
                                <input autocomplete="off" type="text" class="form-control" id="pinterest_url" name="pinterest_url" value="<?= @$pinterest_url ?>" placeholder="Pinterest URL">
                                <span class="error-message" id="pinterest_url-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="google_search_url" class="form-label">Google Search URL</label>
                                <input autocomplete="off" type="text" class="form-control" id="google_search_url" name="google_search_url" value="<?= @$google_search_url ?>" placeholder="Google Search URL">
                                <span class="error-message" id="google_search_url-error"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">

            </h2>
            <div id="emailintregation" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="container">
                        <div class="row input-row">
                            <div class="col-12">
                                <label for="email_smtp_port" class="form-label">Email SMTP Port</label>
                                <input autocomplete="off" type="text" class="form-control" id="email_smtp_port" name="email_smtp_port" value="<?= @$email_smtp_port ?>" placeholder="Email SMTP Port">
                                <span class="error-message" id="email_smtp_port-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="email_smtp_user" class="form-label">Email SMTP User</label>
                                <input autocomplete="off" type="email" class="form-control" id="email_smtp_user" name="email_smtp_user" value="<?= @$email_smtp_user ?>" placeholder="Email SMTP User">
                                <span class="error-message" id="email_smtp_user-error"></span>
                            </div>
                        </div>

                        <div class="row input-row">
                            <div class="col-12">
                                <label for="email_smtp_password" class="form-label">Email SMTP Password</label>
                                <input autocomplete="off" type="password" class="form-control" id="email_smtp_password" name="email_smtp_password" value="<?= @$email_smtp_password ?>" placeholder="Email SMTP Password">
                                <span class="error-message" id="email_smtp_password-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="email_smtp_crypto" class="form-label">Email SMTP Crypto</label>
                                <input autocomplete="off" type="text" class="form-control" id="email_smtp_crypto" name="email_smtp_crypto" value="<?= @$email_smtp_crypto ?>" placeholder="Email SMTP Crypto">
                                <span class="error-message" id="email_smtp_crypto-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="email_from_email" class="form-label">Email</label>
                                <input autocomplete="off" type="email" class="form-control" id="email_from_email" name="email_from_email" value="<?= @$email_from_email ?>" placeholder="Email">
                                <span class="error-message" id="email_from_email-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="email_from_name" class="form-label">Email From Name</label>
                                <input autocomplete="off" type="text" class="form-control" id="email_from_name" name="email_from_name" value="<?= @$email_from_name ?>" placeholder="Email From Name">
                                <span class="error-message" id="email_from_name-error"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">

            </h2>
            <div id="modeofpayment" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="container">
                        <div class="row input-row">
                            <div class="col-12">
                                <label for="bank_name" class="form-label">Bank name</label>
                                <input type="text" class="form-control" id="bank_name" name="bank_name" value="<?= @$bank_name ?>" placeholder="Bank name">
                                <span class="error-message" id="bank_name-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="bank_acc_no" class="form-label">Bank acc no</label>
                                <input type="number" class="form-control" id="bank_acc_no" name="bank_acc_no" value="<?= @$bank_acc_no ?>" placeholder="Bank acc no">
                                <span class="error-message" id="bank_acc_no-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="bank_ifsc_code" class="form-label">Bank IFSC code</label>
                                <input type="text" class="form-control" id="bank_ifsc_code" name="bank_ifsc_code" value="<?= @$bank_ifsc_code ?>" placeholder="Bank IFSC code">
                                <span class="error-message" id="bank_ifsc_code-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="bank_acc_type" class="form-label">Select Account</label>
                                <select class="form-select" id="bank_acc_type" name="bank_acc_type">
                                    <option value="current" <?php if (@$bank_acc_type == 'current') echo 'selected'; ?>>Current</option>
                                    <option value="saving" <?php if (@$bank_acc_type == 'saving') echo 'selected'; ?>>Saving</option>
                                </select>
                                <span class="error-message" id="bank_acc_type-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="paytm_number" class="form-label">Pay Number</label>
                                <input type="text" class="form-control" id="paytm_number" name="paytm_number" value="<?= @$paytm_number ?>" placeholder="Pay Number">
                                <span class="error-message" id="paytm_number-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="google_pay_upi" class="form-label">Google pay upi</label>
                                <input type="text" class="form-control" id="google_pay_upi" name="google_pay_upi" value="<?= @$google_pay_upi ?>" placeholder="Google pay upi">
                                <span class="error-message" id="google_pay_upi-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="phone_pay_upi" class="form-label">Phone pay UPI</label>
                                <input type="text" class="form-control" id="phone_pay_upi" name="phone_pay_upi" value="<?= @$phone_pay_upi ?>" placeholder="Phone pay UPI">
                                <span class="error-message" id="phone_pay_upi-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="paytm_upi" class="form-label">Paytm UPI</label>
                                <input type="text" class="form-control" id="paytm_upi" name="paytm_upi" value="<?= @$paytm_upi ?>" placeholder="Paytm UPI">
                                <span class="error-message" id="paytm_upi-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="amazonpay_upi" class="form-label">Amazon pay UPI</label>
                                <input type="text" class="form-control" id="amazonpay_upi" name="amazonpay_upi" value="<?= @$amazonpay_upi ?>" placeholder="Amazon pay UPI">
                                <span class="error-message" id="amazonpay_upi-error"></span>
                            </div>
                            <div class="col-12">
                                <label for="bhim_upi" class="form-label">Bhim UPI</label>
                                <input type="text" class="form-control" id="bhim_upi" name="bhim_upi" value="<?= @$bhim_upi ?>" placeholder="Bhim UPI">
                                <span class="error-message" id="bhim_upi-error"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="position-fixed bottom-0 end-0 translate-middle-x" style="z-index: 1000;">
                <button type="submit" class="btn btn-primary m-4 p-2" style="width: 200px;">Save</button>
            </div>
        </div>
    </div>
</form>
<?php $this->endSection(); ?>
<?= view('Views/components/card/card') ?>
<script id="mainPageScript">
    var formId = 'WebsiteSetupCreateUpdate';
    var method = "<?= (isset($id) && !empty($id)) ? 'PATCH' : 'PUT' ?>";
    var CreateUpdateApiUrl = "<?= base_url(route_to((isset($id) && !empty($id)) ? 'companyupdate-api' : 'companycreate-api')) ?>";
    var ListPageUrl = "<?= base_url(route_to('companylist')) ?>";
</script>