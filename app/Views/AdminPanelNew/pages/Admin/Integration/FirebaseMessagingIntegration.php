<div class="row">
    <div class="col-5 me-3 border border-secondary">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Firebase Messaging Integration</h5>
                <p class="card-subtitle mb-2 text-muted">Create Notification Service for Web and App</p>
            </div>
            <div class="card-body">
                <h5 class="card-title">Firebase Config</h5>
                <form id="form" name="form" method="post" enctype="multipart/form-data" action="<?= base_url(route_to('FirebaseMessagingIntegrationCreateUpdate')) ?>">
                    <input type="hidden" name="firebase_messaging_integration_id" id="firebase_messaging_integration_id" value="<?= @$firebase_messaging_integration_id ?>">
                    <div class="mb-3">
                        <label for="apiKey" class="form-label">API Key:</label>
                        <input type="text" class="form-control" name="apiKey" id="apiKey" placeholder="Enter API Key" value="<?= @$apiKey ?>">
                    </div>
                    <div class="mb-3">
                        <label for="authDomain" class="form-label">Auth Domain:</label>
                        <input type="text" class="form-control" name="authDomain" id="authDomain" placeholder="Enter Auth Domain" value="<?= @$authDomain ?>">
                    </div>
                    <div class="mb-3">
                        <label for="projectId" class="form-label">Project ID:</label>
                        <input type="text" class="form-control" name="projectId" id="projectId" placeholder="Enter Project ID" value="<?= @$projectId ?>">
                    </div>
                    <div class="mb-3">
                        <label for="storageBucket" class="form-label">Storage Bucket:</label>
                        <input type="text" class="form-control" name="storageBucket" id="storageBucket" placeholder="Enter Storage Bucket" value="<?= @$storageBucket ?>">
                    </div>
                    <div class="mb-3">
                        <label for="messagingSenderId" class="form-label">Messaging Sender ID:</label>
                        <input type="text" class="form-control" name="messagingSenderId" id="messagingSenderId" placeholder="Enter Messaging Sender ID" value="<?= @$messagingSenderId ?>">
                    </div>
                    <div class="mb-3">
                        <label for="appId" class="form-label">App ID:</label>
                        <input type="text" class="form-control" name="appId" id="appId" placeholder="Enter App ID" value="<?= @$appId ?>">
                    </div>
                    <div class="mb-3">
                        <label for="measurementId" class="form-label">Measurement ID:</label>
                        <input type="text" class="form-control" name="measurementId" id="measurementId" placeholder="Enter Measurement ID" value="<?= @$measurementId ?>">
                    </div>

                    <hr>
                    <div class="form-group mb-3">
                        <label for="">Select Api Type</label>
                        <select class="form-control" name="api_type" id="api_type">
                            <option value="api_v1" <?= (isset($api_type) && $api_type == 'api_v1') ? "selected" : "" ?>>Firebase Cloud Messaging API (V1)</option>
                            <option value="api_legacy" <?= (isset($api_type) && $api_type == 'api_legacy') ? "selected" : "" ?>>Cloud Messaging API (Legacy) Depricated</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="serverKey" class="form-label">Cloud Messaging API (Legacy) (serverKey) / Cloud Messaging API (V1) Service Account Key Json File Content</label>
                          <textarea class="form-control" name="serverKey" id="serverKey" rows="3"><?= @$serverKey ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="vapidKey" class="form-label">Web Push Certificate Key (vapidKey)</label>
                        <input type="text" class="form-control" name="vapidKey" id="vapidKey" placeholder="Web Push Certificate Key (vapidKey)" value="<?= @$vapidKey ?>">
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <label class="form-check-label" for="desktop_notification">Desktop Notification</label>
                        </div>
                        <div class="row ms-2">
                            <input type="hidden" name="desktop_notification" value="0">
                            <input type="checkbox" id="desktop_notification" name="desktop_notification" switch="bool" <?= @$desktop_notification ? 'checked' : ''; ?> value="1">
                            <label class="form-label" for="desktop_notification" name="desktop_notification" data-on-label="Yes" data-off-label="No"></label>
                        </div>
                    </div>
                    <!-- <div class="mb-3">
                        <div class="row">
                            <label class="form-check-label" for="mobile_notification">Mobile Notification</label>
                        </div>
                        <div class="row ms-2">
                            <input type="checkbox" id="mobile_notification" name="mobile_notification" switch="bool" <?= @$mobile_notification ? 'checked' : ''; ?>>
                            <label class="form-label" for="mobile_notification" name="mobile_notification" data-on-label="Yes" data-off-label="No"></label>
                        </div>
                    </div> -->
                    <div class="row">
                        <button type="button" class="btn btn-primary" onclick="submitFormWithAjax('form',true,true,successResponse,errorResponse)">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-6 border border-secondary">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Firebase Notification Test</h5>
                <p class="card-subtitle mb-2 text-muted">Send Test Notification to Given Token</p>
            </div>
            <div class="card-body">
                <form id="formtest" name="form" method="post" enctype="multipart/form-data" action="<?= base_url(route_to('SendNotification')) ?>">
                    <input type="hidden" name="firebase_messaging_integration_id" id="firebase_messaging_integration_id" value="<?= @$firebase_messaging_integration_id ?>">
                    <div class="mb-3">
                        <label for="tokens" class="form-label">Token</label>
                        <input type="text" class="form-control" name="tokens[]" id="tokens" placeholder="Enter FCM Token">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Notification Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter Notification" value="Test Notification Title">
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Notification Body</label>
                        <textarea class="form-control" name="body" id="body" rows="3" placeholder="Body Content">Test Notification Body</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Notification Image Url</label>
                        <input type="text" class="form-control" name="image" id="image" placeholder="Image Url">
                    </div>
                    <div class="mb-3">
                        <label for="url" class="form-label">Redirect Url</label>
                        <input type="text" class="form-control" name="url" id="url" placeholder="Redirect Url" value="<?= base_url() ?>">
                    </div>
                    <div class="row">
                        <button type="button" class="btn btn-primary" onclick="submitFormWithAjax('formtest',true,true,notificationTestsuccessResponse,errorResponse)">Send Notification</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function successResponse(data) {
        console.log(data);
    }

    function errorResponse(data) {
        console.log(data);
    }

    function notificationTestsuccessResponse(data) {
        data = JSON.parse(data.data)
        if(data.success == 1)
        {
            toastr.success("Notification Send Successfully");
        }else{
            toastr.error(JSON.stringify(data));
        }
    }
</script>