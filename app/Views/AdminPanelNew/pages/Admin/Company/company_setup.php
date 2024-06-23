<div class="card ">
    <form autocomplete="on" id="WebsiteSetupCreateUpdate" method="POST" action="https://mysiteadmin.brillsense.com/Api/website_setup" enctype="multipart/form-data">
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
                <div id="companydetail" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="container">
                            <h3 class="mb-0 mt-3 text-secondary">Company Details</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label for="firm_name" class="form-label">Firm Name</label>
                                        <input type="hidden" name="id" value="1">
                                        <input autocomplete="off" type="text" class="form-control" id="firm_name" name="firm_name" value="Jobsense" placeholder="Firm Name" required="">
                                        <span class="error-message" id="firm_name-error"></span>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label for="">Upload Files</label>
                                    <input type="file" class="form-control" id="inputGroupFile02">
                                </div>
                                <div class="col-md-2">
                                    <img id="previewImage" src="https://bss.brillsense.com/uploads/company/2/logo/6638d696129e0.png" style="height:100px;width:auto;">
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="firm_slogan" class="form-label">Slogan</label>
                                        <textarea class="form-control" name="" id="" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="firm_address" class="form-label">Address</label>
                                        <textarea class="form-control" name="firm_address" id="firm_address" rows="3">1st Floor, 18, Shanku Marg, Freeganj, Madhav Nagar, Above SBI Bank SME branch,Ujjain, Madhya Pradesh 456010</textarea>
                                        <span class="error-message" id="firm_address-error"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="firm_owner_name" class="form-label">Owner Name</label>
                                        <input autocomplete="off" type="text" class="form-control" id="firm_owner_name" name="firm_owner_name" value="Adesh Jain" placeholder="Owner Name">
                                        <span class="error-message" id="firm_owner_name-error"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="firm_cin_no" class="form-label">CIN No</label>
                                        <input autocomplete="off" type="text" class="form-control" id="firm_cin_no" name="firm_cin_no" value="" placeholder="CIN No">
                                        <span class="error-message" id="firm_cin_no-error"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="firm_gst_no" class="form-label">GST No</label>
                                        <input autocomplete="off" type="text" class="form-control" id="firm_gst_no" name="firm_gst_no" value="" placeholder="GST No">
                                        <span class="error-message" id="firm_gst_no-error"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="firm_pan_no" class="form-label">PAN No</label>

                                        <input autocomplete="off" type="text" class="form-control" id="firm_pan_no" name="firm_pan_no" value="" placeholder="PAN No">
                                        <span class="error-message" id="firm_pan_no-error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo"></h2>
                <div id="contactinformation" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="text-secondary">Contact Information</h4>
                                    <hr>
                                </div>
                                <div class="col-4">
                                    <label for="contact_mobile" class="form-label"><i class="fa-solid fa-phone me-2" aria-hidden="true"></i>Contact Mobile</label>
                                    <input autocomplete="off" type="number" class="form-control" id="contact_mobile" name="contact_mobile" value="9109914110" placeholder="Enter Number" required="">
                                    <span class="error-message" id="contact_mobile-error"></span>
                                </div>
                                <div class="col-4">
                                    <label for="contact_whatsapp" class="form-label"><i class="fa-solid fa-phone me-2" aria-hidden="true"></i>Contact Whatsapp</label>
                                    <input autocomplete="off" type="number" class="form-control" id="contact_whatsapp" name="contact_whatsapp" value="9109914110" placeholder="Enter Number" required="">
                                    <span class="error-message" id="contact_whatsapp-error"></span>
                                </div>
                                <div class="col-4">
                                    <label for="contact_email" class="form-label">Contact Email</label>
                                    <input autocomplete="off" type="email" class="form-control" id="contact_email" name="contact_email" value="info@jobsense.in" placeholder="Enter Email" required="">
                                    <span class="error-message" id="contact_email-error"></span>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <hr>
                                    <h4 class="text-secondary">Sale Information</h4>
                                    <hr>
                                </div>
                                <div class="col-4">
                                    <label for="sales_mobile" class="form-label"><i class="fa-solid fa-phone me-2" aria-hidden="true"></i>Sales Mobile</label>
                                    <input autocomplete="off" type="number" class="form-control" id="sales_mobile" name="sales_mobile" value="9109914110" placeholder="Enter Number" required="">
                                    <span class="error-message" id="sales_mobile-error"></span>
                                </div>
                                <div class="col-4">
                                    <label for="sales_whatsapp" class="form-label"><i class="fa-solid fa-phone me-2" aria-hidden="true"></i>Sales Whatsapp</label>
                                    <input autocomplete="off" type="number" class="form-control" id="sales_whatsapp" name="sales_whatsapp" value="9109914110" placeholder="Enter Number" required="">
                                    <span class="error-message" id="sales_whatsapp-error"></span>
                                </div>
                                <div class="col-4">
                                    <label for="sales_email" class="form-label">Sales Email</label>
                                    <input autocomplete="off" type="email" class="form-control" id="sales_email" name="sales_email" value="info@jobsense.in" placeholder="Enter Email" required="">
                                    <span class="error-message" id="sales_email-error"></span>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <hr>
                                    <h4 class="text-secondary">Support Information</h4>
                                    <hr>
                                </div>
                                <div class="col-4">
                                    <label for="support_mobile" class="form-label"><i class="fa-solid fa-phone me-2" aria-hidden="true"></i>Support Mobile</label>
                                    <input autocomplete="off" type="number" class="form-control" id="support_mobile" name="support_mobile" value="9109914110" placeholder="Enter Number" required="">
                                    <span class="error-message" id="support_mobile-error"></span>
                                </div>
                                <div class="col-4">
                                    <label for="support_whatsapp" class="form-label"><i class="fa-solid fa-phone me-2" aria-hidden="true"></i>Support Whatsapp</label>
                                    <input autocomplete="off" type="number" class="form-control" id="support_whatsapp" name="support_whatsapp" value="9109914110" placeholder="Enter Number" required="">
                                    <span class="error-message" id="support_whatsapp-error"></span>
                                </div>
                                <div class="col-4">
                                    <label for="support_email" class="form-label">Support Email</label>
                                    <input autocomplete="off" type="email" class="form-control" id="support_email" name="support_email" value="info@jobsense.in" placeholder="Enter Email" required="">
                                    <span class="error-message" id="support_email-error"></span>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <hr>
                                    <h4 class="text-secondary">Career Information</h4>
                                    <hr>
                                </div>
                                <div class="col-4">
                                    <label for="career_mobile" class="form-label"><i class="fa-solid fa-phone me-2" aria-hidden="true"></i>Career Mobile</label>
                                    <input autocomplete="off" type="number" class="form-control" id="career_mobile" name="career_mobile" value="9109914110" placeholder="Enter Number" required="">
                                    <span class="error-message" id="career_mobile-error"></span>
                                </div>
                                <div class="col-4">
                                    <label for="career_whatsapp" class="form-label"><i class="fa-solid fa-phone me-2" aria-hidden="true"></i>Career Whatsapp</label>
                                    <input autocomplete="off" type="number" class="form-control" id="career_whatsapp" name="career_whatsapp" value="9109914110" placeholder="Enter Number" required="">
                                    <span class="error-message" id="career_whatsapp-error"></span>
                                </div>
                                <div class="col-4">
                                    <label for="career_email" class="form-label">Career Email</label>
                                    <input autocomplete="off" type="email" class="form-control" id="career_email" name="career_email" value="brillsense.shailesh@gmail.com" placeholder="Enter Email" required="">
                                    <span class="error-message" id="career_email-error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree"></h2>
                <div id="websiteinformation" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="container">
                            <h3 class="mb-0 mt-3 text-secondary">Website Information</h3>
                            <hr>
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <label for="about_company" class="form-label">About company</label>
                                    <textarea class="form-control" name="" id="" rows="3"></textarea>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="about_owner" class="form-label">About owner</label>
                                    <textarea class="form-control" name="" id="" rows="3"></textarea>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="terms_and_conditions_content" class="form-label">Terms and conditions</label>
                                    <textarea class="form-control" name="" id="" rows="3"></textarea>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="privacy_and_policies_content" class="form-label">Privacy and policies</label>
                                    <textarea class="form-control" name="" id="" rows="3"></textarea>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="disclaimer_content" class="form-label">Disclaimer content</label>
                                    <textarea class="form-control" name="" id="" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree"></h2>
                <div id="urlinformation" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="container">
                            <h3 class="mb-0 mt-3 text-secondary">Social Media And Urls</h3>
                            <hr>
                            <div class="row input-row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="google_maps_url" class="form-label"><i class="fa-solid fa-link me-2" aria-hidden="true"></i>Google Maps URL</label>
                                        <div class="col-md-4 p-0">
                                        </div>
                                        <div>
                                            <input autocomplete="off" type="text" class="form-control" id="google_maps_url" name="google_maps_url" value="" placeholder="Google Maps URL">
                                            <span class="error-message" id="google_maps_url-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="website_url" class="form-label"><i class="fa-solid fa-link me-2" aria-hidden="true"></i>Website URL</label>
                                        <div class="col-md-4 p-0">
                                        </div>
                                        <div>
                                            <input autocomplete="off" type="text" class="form-control" id="website_url" name="website_url" value="https://jobsense.in/" placeholder="Website URL">
                                            <span class="error-message" id="website_url-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="play_store_url" class="form-label"><i class="fa-solid fa-link me-2" aria-hidden="true"></i>Play Store URL</label>
                                        <div class="col-md-4 p-0">
                                        </div>
                                        <div>
                                            <input autocomplete="off" type="text" class="form-control" id="play_store_url" name="play_store_url" value="" placeholder="Play Store URL">
                                            <span class="error-message" id="play_store_url-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="app_store_url" class="form-label"><i class="fa-solid fa-link me-2" aria-hidden="true"></i>App Store URL</label>
                                        <div class="col-md-4 p-0">
                                        </div>
                                        <div>
                                            <input autocomplete="off" type="text" class="form-control" id="app_store_url" name="app_store_url" value="" placeholder="App Store URL">
                                            <span class="error-message" id="app_store_url-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="facebook_url" class="form-label"><i class="fa-solid fa-link me-2" aria-hidden="true"></i>Facebook URL</label>
                                        <div class="col-md-4 p-0">
                                        </div>
                                        <div>
                                            <input autocomplete="off" type="text" class="form-control" id="facebook_url" name="facebook_url" value="https://www.facebook.com/jobsense.in" placeholder="Facebook URL">
                                            <span class="error-message" id="facebook_url-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="instagram_url" class="form-label"><i class="fa-solid fa-link me-2" aria-hidden="true"></i>Instagram URL</label>
                                        <div class="col-md-4 p-0">
                                        </div>
                                        <div>
                                            <input autocomplete="off" type="text" class="form-control" id="instagram_url" name="instagram_url" value="https://www.instagram.com/jobsense_get_job_ready/" placeholder="Instagram URL">
                                            <span class="error-message" id="instagram_url-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="twitter_url" class="form-label"><i class="fa-solid fa-link me-2" aria-hidden="true"></i>Twitter URL</label>
                                        <div class="col-md-4 p-0">
                                        </div>
                                        <div>
                                            <input autocomplete="off" type="text" class="form-control" id="twitter_url" name="twitter_url" value="https://twitter.com/jobsenseindia" placeholder="Twitter URL">
                                            <span class="error-message" id="twitter_url-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="linkedin_url" class="form-label"><i class="fa-solid fa-link me-2" aria-hidden="true"></i>LinkedIn URL</label>
                                        <div class="col-md-4 p-0">
                                        </div>
                                        <div>
                                            <input autocomplete="off" type="text" class="form-control" id="linkedin_url" name="linkedin_url" value="https://www.linkedin.com/company/jobsense-pvt-ltd/" placeholder="LinkedIn URL">
                                            <span class="error-message" id="linkedin_url-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="youtube_url" class="form-label"><i class="fa-solid fa-link me-2" aria-hidden="true"></i>YouTube URL</label>
                                        <div class="col-md-4 p-0">
                                        </div>
                                        <div>
                                            <input autocomplete="off" type="text" class="form-control" id="youtube_url" name="youtube_url" value="https://youtube.com/" placeholder="YouTube URL">
                                            <span class="error-message" id="youtube_url-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="telegram_url" class="form-label"><i class="fa-solid fa-link me-2" aria-hidden="true"></i>Telegram URL</label>
                                        <div class="col-md-4 p-0">
                                        </div>
                                        <div>
                                            <input autocomplete="off" type="text" class="form-control" id="telegram_url" name="telegram_url" value="" placeholder="Telegram URL">
                                            <span class="error-message" id="telegram_url-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="pinterest_url" class="form-label"><i class="fa-solid fa-link me-2" aria-hidden="true"></i>Pinterest URL</label>
                                        <div class="col-md-4 p-0">
                                        </div>
                                        <div>
                                            <input autocomplete="off" type="text" class="form-control" id="pinterest_url" name="pinterest_url" value="" placeholder="Pinterest URL">
                                            <span class="error-message" id="pinterest_url-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="google_search_url" class="form-label"><i class="fa-solid fa-link me-2" aria-hidden="true"></i>Google Search URL
                                            <div class="col-md-4 p-0">
                                        </label>
                                    </div>
                                    <div>
                                        <input autocomplete="off" type="text" class="form-control" id="google_search_url" name="google_search_url" value="https://www.google.com/search?q=www.jobsense.in&amp;sca_esv=618eadb7918fb614&amp;sca_upv=1&amp;rlz=1C1FHFK_enIN1081IN1081&amp;sxsrf=ACQVn0-rxf58M-Q9mJbicrxpjW_LAB3H_g%3A1713789357013&amp;ei=rVkmZtcz667j4Q_Eg5b4Cw&amp;ved=0ahUKEwiXvuDu6tWFAxVr1zgGHcSBBb8Q4dUDCBA&amp;uact=5&amp;oq=www.jobsense.in&amp;gs_lp=Egxnd3Mtd2l6LXNlcnAiD3d3dy5qb2JzZW5zZS5pbkieVFDODVjlTnACeAGQAQCYAc0BoAHKEqoBBjAuMTQuMbgBA8gBAPgBAZgCDKACtA2oAhLCAgoQABiwAxjWBBhHwgIHECMYJxjqAsICFBAAGIAEGOMEGLQCGOkEGOoC2AEBwgIKECMYgAQYJxiKBcICERAAGIAEGJECGLEDGIMBGIoFwgILEAAYgAQYkQIYigXCAgsQABiABBixAxiDAcICCBAAGIAEGLEDwgIFEC4YgATCAgoQABiABBhDGIoFwgILEC4YgAQYsQMYgwHCAhAQABiABBixAxhDGIMBGIoFwgIEEAAYA8ICBRAAGIAEwgIOEAAYgAQYsQMYgwEYigXCAgcQABiABBgKwgIEEAAYHpgDIIgGAZAGCLoGBggBEAEYAZIHBTIuOS4xoAeFSQ&amp;sclient=gws-wiz-serp" placeholder="Google Search URL">
                                        <span class="error-message" id="google_search_url-error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree"></h2>
            <div id="emailintregation" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="container">
                        <h3 class="mb-0 mt-3 text-secondary">Email Integration</h3>
                        <hr>
                        <div class="row input-row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="email_smtp_host" class="form-label">Email SMTP Host</label>

                                    <div>
                                        <input autocomplete="off" type="text" class="form-control" id="email_smtp_host" name="email_smtp_host" value="smtppro.zoho.in" placeholder="Email SMTP Port">
                                        <span class="error-message" id="email_smtp_host-error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row input-row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email_smtp_port" class="form-label">Email SMTP Port</label>

                                    <div>
                                        <input autocomplete="off" type="text" class="form-control" id="email_smtp_port" name="email_smtp_port" value="465" placeholder="Email SMTP Port">
                                        <span class="error-message" id="email_smtp_port-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email_smtp_user" class="form-label">Email SMTP User</label>

                                    <div>
                                        <input autocomplete="off" type="email" class="form-control" id="email_smtp_user" name="email_smtp_user" value="support@datahq.in" placeholder="Email SMTP User">
                                        <span class="error-message" id="email_smtp_user-error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row input-row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email_smtp_password" class="form-label">Email SMTP Password</label>

                                    <div>
                                        <input autocomplete="off" type="password" class="form-control" id="email_smtp_password" name="email_smtp_password" value="Datahq#123" placeholder="Email SMTP Password">
                                        <span class="error-message" id="email_smtp_password-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email_smtp_crypto" class="form-label">Email SMTP Crypto</label>

                                    <div>
                                        <input autocomplete="off" type="text" class="form-control" id="email_smtp_crypto" name="email_smtp_crypto" value="ssl" placeholder="Email SMTP Crypto">
                                        <span class="error-message" id="email_smtp_crypto-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email_from_email" class="form-label">Email</label>

                                    <div>
                                        <input autocomplete="off" type="email" class="form-control" id="email_from_email" name="email_from_email" value="support@datahq.in" placeholder="Email">
                                        <span class="error-message" id="email_from_email-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email_from_name" class="form-label">Email From Name</label>

                                    <div>
                                        <input autocomplete="off" type="text" class="form-control" id="email_from_name" name="email_from_name" value="Jobsense" placeholder="Email From Name">
                                        <span class="error-message" id="email_from_name-error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree"></h2>
            <div id="modeofpayment" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="container">
                        <h3 class="mb-0 mt-3 text-secondary">Mode Of Payment</h3>
                        <hr>
                        <div class="row input-row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="bank_name" class="form-label">Bank name</label>

                                    <div>
                                        <input type="text" class="form-control" id="bank_name" name="bank_name" value="" placeholder="Bank name">
                                        <span class="error-message" id="bank_name-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="bank_acc_no" class="form-label">Bank acc no</label>

                                    <div>
                                        <input type="number" class="form-control" id="bank_acc_no" name="bank_acc_no" value="" placeholder="Bank acc no">
                                        <span class="error-message" id="bank_acc_no-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="bank_ifsc_code" class="form-label">Bank IFSC code</label>

                                    <div>
                                        <input type="text" class="form-control" id="bank_ifsc_code" name="bank_ifsc_code" value="" placeholder="Bank IFSC code">
                                        <span class="error-message" id="bank_ifsc_code-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="bank_acc_type" class="form-label">Select Account</label>

                                    <div>
                                        <select class="form-select" id="bank_acc_type" name="bank_acc_type">
                                            <option value="current" selected="">Current</option>
                                            <option value="saving">Saving</option>
                                        </select>
                                        <span class="error-message" id="bank_acc_type-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="paytm_number" class="form-label">Pay Number</label>

                                    <div>
                                        <input type="text" class="form-control" id="paytm_number" name="paytm_number" value="" placeholder="Pay Number">
                                        <span class="error-message" id="paytm_number-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="google_pay_upi" class="form-label">Google pay upi</label>

                                    <div>
                                        <input type="text" class="form-control" id="google_pay_upi" name="google_pay_upi" value="" placeholder="Google pay upi">
                                        <span class="error-message" id="google_pay_upi-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone_pay_upi" class="form-label">Phone pay UPI</label>

                                    <div>
                                        <input type="text" class="form-control" id="phone_pay_upi" name="phone_pay_upi" value="" placeholder="Phone pay UPI">
                                        <span class="error-message" id="phone_pay_upi-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="paytm_upi" class="form-label">Paytm UPI</label>

                                    <div>
                                        <input type="text" class="form-control" id="paytm_upi" name="paytm_upi" value="" placeholder="Paytm UPI">
                                        <span class="error-message" id="paytm_upi-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="amazonpay_upi" class="form-label">Amazon pay UPI</label>

                                    <div>
                                        <input type="text" class="form-control" id="amazonpay_upi" name="amazonpay_upi" value="" placeholder="Amazon pay UPI">
                                        <span class="error-message" id="amazonpay_upi-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="bhim_upi" class="form-label">Bhim UPI</label>

                                    <div>
                                        <input type="text" class="form-control" id="bhim_upi" name="bhim_upi" value="" placeholder="Bhim UPI">
                                        <span class="error-message" id="bhim_upi-error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="position-fixed bottom-0 end-0 translate-middle-x" style="z-index: 1000;">
                <button type="button" class="btn btn-primary m-4 p-2" style="width: 200px;" onclick="submitFormWithAjax('WebsiteSetupCreateUpdate',true,true,formSuccess,formError)">Save</button>
            </div>
        </div>
</div>
</form>
</div>