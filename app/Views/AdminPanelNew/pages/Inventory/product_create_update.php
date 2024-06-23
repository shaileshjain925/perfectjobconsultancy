<div class="card">
    <div class="card-header py-3">
        <?= (isset($product_id) && !empty($product_id)) ? "Update" : "Add" ?> Category</h5>
    </div>
    <div class="card-body">
        <div class="error-message-box d-none">
            <p id="error-message"></p>
        </div>
        <div class="success-message-box d-none">
            <p id="success-message"></p>
        </div>
        <form id="form" method="POST" enctype="multipart/form-data" action="<?= @$ApiUrl ?>">
            <input type="hidden" name="product_id" id="product_id" value="<?= @$product_id  ?>">
            <input type="hidden" name="product_image1" id="product_image1" value="<?= @$product_image1 ?>">
            <input type="hidden" name="product_image2" id="product_image2" value="<?= @$product_image2 ?>">
            <input type="hidden" name="product_image3" id="product_image3" value="<?= @$product_image3 ?>">
            <div class="row">
                <div class="col-md-12">

                    <!-- Add Prodcut Detail -->
                    <div class="card-body">
                        <div class="row">

                            <!--Product Name  -->
                            <div class="form-group col-md-8 mb-3">
                                <label for="product_name">Product Name<span class="text-danger">*</span></label>
                                <input type="text" placeholder="Enter Product name" id="product_name" name="product_name" class="form-control" value="<?= @$product_name ?>">
                                <span class="error-message" id="error-product_name"></span>
                            </div>
                            <!-- Product Code -->
                            <div class="form-group col-md-4 mb-3">
                                <label for="product_code">Product Code<span class="text-danger">*</span></label>
                                <input type="text" placeholder="Product Code" id="product_code" name="product_code" class="form-control" value="<?= @$product_code ?>">
                                <span class="error-message" id="error-product_code"></span>
                            </div>
                            <!-- Brand -->
                            <div class="form-group col-md-4 mb-3">
                                <label class="form-label" for="brand_id">Brand<span class="text-danger">*</span></label>
                                <select id="brand_id" name="brand_id" placeholder="Select Brand ">
                                </select>
                                <span class="error-message" id="error-brand_id"></span>
                            </div>
                            <!-- Category Type -->
                            <div class="form-group col-md-4 mb-3">
                                <label class="form-label" for="category_type_id">Category Type<span class="text-danger">*</span></label>
                                <select id="category_type_id" name="category_type_id" placeholder="Select Category Type">
                                </select>
                                <span class="error-message" id="error-category_type_id"></span>
                            </div>
                            <!-- Category -->
                            <div class="form-group col-md-4 mb-3">
                                <label class="form-label" for="category_id">Category<span class="text-danger">*</span></label>
                                <select id="category_id" name="category_id" placeholder="Select Category">
                                </select>
                                <span class="error-message" id="error-category_id"></span>
                            </div>
                            <!-- End -->
                            <!-- End -->
                            <!-- Select fabric -->
                            <div class="form-group col-md-4 mb-3">
                                <label class="form-label" for="fabric_id">Fabric<span class="text-danger">*</span></label>
                                <select id="fabric_id" name="fabric_id" placeholder="Select Fabric">
                                </select>
                                <span class="error-message" id="error-fabric_id"></span>
                            </div>
                            <!-- End -->
                            <!-- Select Pattern -->
                            <div class="form-group col-md-4 mb-3">
                                <label class="form-label" for="pattern_id">Pattern<span class="text-danger">*</span></label>
                                <select id="pattern_id" name="pattern_id" placeholder="Select Pattern">
                                </select>
                                <span class="error-message" id="error-pattern_id"></span>
                            </div>
                            <div class="form-group col-md-4 mb-3">
                                <label for="product_hsn_code">HSN Code<span class="text-danger">*</span></label>
                                <input type="number" placeholder="HSN Code" id="product_hsn_code" name="product_hsn_code" class="form-control" placeholder="HSN Code" value="<?= @$product_hsn_code ?>">
                                <span class="error-message" id="error-product_hsn_code"></span>
                            </div>
                            <div class="form-group col-md-4 mb-3">
                                <label for="width"> Width</label>
                                <input type="text" placeholder="Width" name="width" id="width" class="form-control" value="<?= @$width ?>">
                            </div>
                            <div class="form-group col-md-4 mb-3">
                                <label for="height"> Length</label>
                                <input type="text" placeholder="Length" name="height" id="height" class="form-control" value="<?= @$height ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <div class=" d-flex gap-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="is_recommended" name="is_recommended" <?= (isset($is_recommended) && $is_recommended == 1) ? "checked" : "" ?>>
                                        <label class="form-check-label" for="is_recommended">
                                            Recommended
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="is_refundable" name="is_refundable" <?= (isset($is_refundable) && $is_refundable == 1) ? "checked" : "" ?>>
                                        <label class="form-check-label" for="is_refundable">
                                            Refund
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="is_returnable" name="is_returnable" <?= (isset($is_returnable) && $is_returnable == 1) ? "checked" : "" ?>>
                                        <label class="form-check-label" for="is_returnable">
                                            Return
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- End -->

                            <!-- Product Details -->

                            <div class="form-group col-md-12 mb-3">
                                <label for="product_description">Description</label>
                                <textarea class="form-control" name="product_description" id="product_description" cols="20" rows="5" placeholder="Enter Description"><?= @$product_description ?></textarea>
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <label for="product_specialcare">Care and Special Notes</label>
                                <textarea class="form-control" name="product_specialcare" id="product_specialcare" cols="20" rows="5" placeholder="Enter Special care"><?= @$product_specialcare ?></textarea>
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <label for="product_refund_exchange">Refunds and Exchange</label>
                                <textarea class="form-control" name="product_refund_exchange" id="product_refund_exchange" cols="20" rows="5" placeholder="Enter Refund Exchange"><?= @$product_refund_exchange ?></textarea>
                            </div>
                            <!-- End -->

                            <!-- Seo Keywords  -->
                            <div class="form-group col-md-12">
                                <label for="product_keyfeature"> Product Keywords </label>
                                <textarea class="form-control" name="product_keyfeature" id="product_keyfeature" cols="20" rows="5" placeholder="Enter key Feature"><?= @$product_keyfeature ?></textarea>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="product_seo_title"> SEO title </label>
                                <textarea class="form-control" name="product_seo_title" id="product_seo_title" cols="20" rows="5" placeholder="Enter Seo title"><?= @$product_seo_title ?></textarea>
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <label for="product_seo_description">SEO Description</label>
                                <textarea class="form-control" name="product_seo_description" id="product_seo_description" cols="20" rows="5" placeholder="Enter Seo Discription"><?= @$product_seo_description ?></textarea>
                            </div>
                            <!-- End -->
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Upload Product Images</h6>
                    </div>
                    <div class="card-body">
                        <div class="row row-cols-3">
                            <div class="form-group mb-3">
                                <img class="image-fluid" style="height:auto; width:100px" id="product_image1_display" src="<?= base_url() ?>/<?= @$product_image1 ?>">
                                <label class="form-label">Upload Files</label>
                                <input type="file" id="file_upload1" class="form-control" onchange="ProductUploadImage('file_upload1','product_image1','product_image1_display')">
                                <span class="error-message" id="error-file"></span>
                            </div>
                            <div class="form-group mb-3">
                                <img class="image-fluid" style="height:auto; width:100px" id="product_image2_display" src="<?= base_url() ?>/<?= @$product_image2 ?>">
                                <label class="form-label">Upload Files</label>
                                <input type="file" id="file_upload2" class="form-control" onchange="ProductUploadImage('file_upload2','product_image2','product_image2_display')">
                                <span class="error-message" id="error-file"></span>
                            </div>
                            <div class="form-group mb-3">
                                <img class="image-fluid" style="height:auto; width:100px" id="product_image3_display" src="<?= base_url() ?>/<?= @$product_image3 ?>">
                                <label class="form-label">Upload Files</label>
                                <input type="file" id="file_upload3" class="form-control" onchange="ProductUploadImage('file_upload3','product_image3','product_image3_display')">
                                <span class="error-message" id="error-file"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div>
                    <button type="button" onclick="submitFormWithAjax('form',true,false,successCallback,errorCallback)" class="btn btn-primary waves-effect waves-light me-1">
                        Submit
                    </button>
                    <button type="reset" class="btn btn-secondary waves-effect" onclick="window.location.href='<?= base_url(route_to('product_manage')) ?>'">
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
            window.location.href = '<?= base_url(route_to('product_manage')) ?>'
        }
    }

    function errorCallback(response) {
        console.log(response);
    }

    function ProductUploadImage(id, input_id, image_tag_id) {
        uploadImage(id, 'product', input_id, image_tag_id)
    }
    var selected_category_type_id = "<?= @$category_type_id ?>";
    var selected_category_id = "<?= @$category_id ?>";
    var selected_brand_id = "<?= @$brand_id ?>";
    var selected_pattern_id = "<?= @$pattern_id ?>";
    var selected_fabric_id = "<?= @$fabric_id ?>";
    var selected_variant_id = "<?= @$variant_id ?>";

    $(document).ready(function() {
        initializeSelectize('category_id', {
            placeholder: "Select Category"
        })
        initializeSelectize('category_type_id', {}, "<?= base_url(route_to('categoryType_list_api')) ?>", {}, "category_type_id", "category_type_name", selected_category_type_id).onchange(function(category_type_id) {
            // Handle onchange event for country selectize dropdown
            // Clear options of state selectize dropdown
            // Reset variables
            initializeSelectize('category_id').clearOptions().then(function() {
                // Initialize state selectize dropdown
                if (category_type_id != '') {
                    initializeSelectize('category_id', {
                        placeholder: "Select Category"
                    }, "<?= base_url(route_to('category_list_api')) ?>", {
                        category_type_id: category_type_id
                    }, 'category_id', 'category_name', selected_category_id)
                }
            });
        });
        initializeSelectize('brand_id', {}, "<?= base_url(route_to('brand_list_api')) ?>", {}, "brand_id", "brand_name", selected_brand_id)
        initializeSelectize('pattern_id', {}, "<?= base_url(route_to('pattern_list_api')) ?>", {}, "pattern_id", "pattern_name", selected_pattern_id)
        initializeSelectize('fabric_id', {}, "<?= base_url(route_to('fabric_list_api')) ?>", {}, "fabric_id", "fabric_name", selected_fabric_id)
        initializeSelectize('variant_id', {}, "<?= base_url(route_to('variant_list_api')) ?>", {}, "variant_id", "variant_name", selected_variant_id)
    });
</script>