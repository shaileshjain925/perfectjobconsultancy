<div class="offcanvas-header">
    <h5 class="offcanvas-title" id="RightSlideBox"><?= (isset($job_position_id) && !empty($job_position_id)) ? "Update" : "Add" ?></h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close" ></button>
</div>
<div class="offcanvas-body">
    <div class="error-message-box d-none">
        <p id="error-message"></p>
    </div>
    <div class="success-message-box d-none">
        <p id="success-message"></p>
    </div>
    <form id="form" method="POST" enctype="multipart/form-data" action="<?= @$ApiUrl ?>">
        <input type="hidden" name="job_position_id" id="job_position_id" value="<?= @$job_position_id ?>">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" id="job_position_name" name="job_position_name" class="form-control" placeholder="Name" value="<?= @$job_position_name ?>">
            <span class="error-message" id="error-job_position_name"></span>
        </div>
        <div>
            <div>
                <button type="button" onclick="submitFormWithAjax('form',true,false,successCallback,errorCallback)" class="btn btn-primary waves-effect waves-light me-1">
                    Submit
                </button>
                <button type="reset" class="btn btn-secondary waves-effect">
                    Cancel
                </button>
            </div>
        </div>
    </form>
</div>