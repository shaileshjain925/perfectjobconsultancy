<div class="offcanvas-header">
    <h5 class="offcanvas-title" id="AddRoleLabel">
        <?= (isset($fabric_id) && !empty($fabric_id)) ? "Update" : "Add" ?> Fabric</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div class="offcanvas-body">
    <div class="error-message-box d-none">
        <p id="error-message"></p>
    </div>
    <div class="success-message-box d-none">
        <p id="success-message"></p>
    </div>
    <form id="form" method="POST" enctype="multipart/form-data" action="<?= @$ApiUrl ?>">
        <input type="hidden" name="fabric_id" id="fabric_id" value="<?= @$fabric_id  ?>">

        <div class="mb-3">
            <label class="form-label">Fabric Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="fabric_name" name="fabric_name" placeholder="Fabric Name" value="<?= @$fabric_name ?>">
            <span class="error-message" id="error-fabric_name"></span>
        </div>
        <div class="mb-3">
            <label class="form-label">SEO Keywords</label>
            <div>
                <input type="text" class="form-control" id="fabric_seo_keywords" name="fabric_seo_keywords" placeholder="Enter SEO Keywords" value="<?= @$fabric_seo_keywords ?>" />
            </div>
            <span class="error-message" id="error-fabric_seo_keywords"></span>
        </div>

        <div class="mb-3">
            <label class="form-label">SEO Description</label>
            <div>
                <textarea class="form-control" name="fabric_seo_description" id="fabric_seo_description" cols="20" rows="5" placeholder="Enter SEO Description"><?= @$fabric_seo_description ?></textarea>
            </div>
            <span class="error-message" id="error-fabric_seo_description"></span>
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