<div class="offcanvas-header">
    <h5 class="offcanvas-title" id="AddRoleLabel">
        <?= (isset($category_type_id) && !empty($category_type_id)) ? "Update" : "Add" ?> Category Type</h5>
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
        <input type="hidden" name="category_type_id" id="category_type_id" value="<?= @$category_type_id  ?>">
        <input type="hidden" name="category_type_image" id="category_type_image" value="<?= @$category_type_image ?>">
        <div class="mb-3">
            <label class="form-label">Category Type Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="category_type_name" name="category_type_name" placeholder="Category Name" value="<?= @$category_type_name ?>">
            <span class="error-message" id="error-category_type_name"></span>
        </div>
        <div class="mb-3">
            <img class="image-fluid" style="height:auto; width:100px" id="category_type_image_display" src="<?= base_url() ?>/<?= @$category_type_image ?>">
            <label class="form-label">Upload Files</label>
            <input type="file" name="file_upload" id="file_upload" class="form-control" onchange="uploadImage('file_upload','category','category_type_image','category_type_image_display')">
            <span class="error-message" id="error-file"></span>
        </div>
        <div class="mb-3">
            <label class="form-label">SEO Keywords</label>
            <div>
                <input type="text" class="form-control" id="category_type_seo_keyword" name="category_type_seo_keyword" placeholder="Enter SEO Keywords" value="<?= @$category_type_seo_keyword ?>" />
            </div>
            <span class="error-message" id="error-category_type_seo_keyword"></span>
        </div>

        <div class="mb-3">
            <label class="form-label">SEO Description</label>
            <div>
                <textarea class="form-control" name="category_type_seo_description" id="category_type_seo_description" cols="20" rows="5" placeholder="Enter SEO Description"><?= @$category_type_seo_description ?></textarea>

            </div>
            <span class="error-message" id="error-category_type_seo_description"></span>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <div>

                <textarea class="form-control" name="category_type_description" id="category_type_description" cols="20" rows="5" placeholder="Enter Description"><?= @$category_type_description ?></textarea>

            </div>
            <span class="error-message" id="error-category_type_description"></span>
        </div>
        <div class="mb-3">
        <span class="text-danger">*</span>
            <div class="form-check form-check-inline">
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