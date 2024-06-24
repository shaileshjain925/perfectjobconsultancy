<div class="offcanvas-header">
    <h5 class="offcanvas-title" id="RightSlideBox">
        <?= (isset($pattern_id) && !empty($pattern_id)) ? "Update" : "Add" ?>Pattern</h5>
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
        <input type="hidden" name="pattern_id" id="pattern_id" value="<?= @$pattern_id  ?>">

        <div class="mb-3">
            <label class="form-label">Pattern Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="pattern_name" name="pattern_name" placeholder="Pattern Name" value="<?= @$pattern_name ?>">
            <span class="error-message" id="error-pattern_name"></span>
        </div>
        <div class="mb-3">
            <label class="form-label">SEO Keywords</label>
            <div>
                <input type="text" class="form-control" id="pattern_seo_keywords" name="pattern_seo_keywords" placeholder="Enter SEO Keywords" value="<?= @$pattern_seo_keywords ?>" />
            </div>
            <span class="error-message" id="error-pattern_seo_keywords"></span>
        </div>

        <div class="mb-3">
            <label class="form-label">SEO Description</label>
            <div>
                <textarea class="form-control" name="pattern_seo_description" id="pattern_seo_description" cols="20" rows="5" placeholder="Enter SEO Description"><?= @$pattern_seo_description ?></textarea>
            </div>
            <span class="error-message" id="error-pattern_seo_description"></span>
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