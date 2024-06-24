<div class="offcanvas-header">
    <h5 class="offcanvas-title" id="RightSlideBox">
        <?= (isset($brand_id) && !empty($brand_id)) ? "Update" : "Add" ?> Brand</h5>
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
        <input type="hidden" name="brand_id" id="brand_id" value="<?= @$brand_id  ?>">
        <input type="hidden" name="brand_image" id="brand_image" value="<?= @$brand_image ?>">
        <div class="mb-3">
            <label class="form-label">Brand Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Brand Name" value="<?= @$brand_name ?>">
            <span class="error-message" id="error-brand_name"></span>
        </div>
        <div class="mb-3">
            <img class="image-fluid" style="height:auto; width:100px" id="brand_image_display" src="<?= base_url() ?>/<?= @$brand_image ?>">
            <label class="form-label">Upload Files</label>
            <input type="file" name="file_upload" id="file_upload" class="form-control" onchange="uploadImage('file_upload','brand','brand_image','brand_image_display')">
            <span class="error-message" id="error-file"></span>
        </div>
        <div class="mb-3">
            <label class="form-label">SEO Keywords</label>
            <div>
                <input type="text" class="form-control" id="brand_seo_keyword" name="brand_seo_keyword" placeholder="Enter SEO Keywords" value="<?= @$brand_seo_keyword ?>" />
            </div>
            <span class="error-message" id="error-brand_seo_keyword"></span>
        </div>

        <div class="mb-3">
            <label class="form-label">SEO Description</label>
            <div>
                <textarea class="form-control" name="brand_seo_description" id="brand_seo_description" cols="20" rows="5" placeholder="Enter SEO Description"><?= @$brand_seo_description ?></textarea>

            </div>
            <span class="error-message" id="error-brand_seo_description"></span>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <div>

                <textarea class="form-control" name="brand_description" id="brand_description" cols="20" rows="5" placeholder="Enter Description"><?= @$brand_description ?></textarea>

            </div>
            <span class="error-message" id="error-brand_description"></span>
        </div>
        <div class="mb-3">
            <div class="form-check form-check-inline">
            <span class="text-danger">*</span>
                <input class="form-check-input" type="radio" name="is_active" id="active" value="1" <?= (isset($is_active) && $is_active == 1) ? "checked" : "" ?> />
                <label class="form-check-label" for="active">Active</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="is_active" id="inactive" value="0" <?= (isset($is_active) && $is_active == 0) ? "checked" : "" ?> />
                <label class="form-check-label" for="inactive">InActive</label>
            </div>
            <span class="error-message" id="error-is_active"></span>
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