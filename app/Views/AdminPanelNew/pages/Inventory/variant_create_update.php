<div class="card">
    <div class="card-body">
        <form id="form" class="custom-validation" method="post" action="<?= (isset($variant_id) && !empty($variant_id)) ? base_url(route_to('variant_update_api')) : base_url(route_to('variant_create_api')) ?>" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-8">
                    <div class="card-header py-3">
                        <rient class="m-0 font-weight-bold text-primary"><?= (isset($variant_id) && !empty($variant_id)) ? "Update" : "Create" ?> Variant</h5>
                    </div>
                    <!-- Add Prodcut Detail -->
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12 mb-3">
                                <input type="hidden" name="variant_id" id="variant_id" value="<?= @$variant_id ?>">
                                <input type="hidden" name="product_id" id="product_id" value="<?= @$product_id ?>">
                                <input type="hidden" name="variant_image1" id="variant_image1" value="<?= @$variant_image1 ?>">
                                <input type="hidden" name="variant_image2" id="variant_image2" value="<?= @$variant_image2 ?>">
                                <input type="hidden" name="variant_image3" id="variant_image3" value="<?= @$variant_image3 ?>">
                                <input type="hidden" name="variant_image4" id="variant_image4" value="<?= @$variant_image4 ?>">
                                <input type="hidden" name="variant_image5" id="variant_image5" value="<?= @$variant_image5 ?>">
                                <input type="hidden" name="variant_image6" id="variant_image6" value="<?= @$variant_image6 ?>">
                                <label class="form-label" for="variant_name">Variant Title</label>
                                <input type="text"  placeholder="Enter Product name" id="variant_name" name="variant_name" class="form-control" value="<?= @$variant_name ?>">
                                <span class="error-message" id="error-variant_name"></span>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="variant_sku_code">SKU Code<span class="text-danger">*</span></label>
                                <input type="number" placeholder="SKU Code" id="variant_sku_code" name="variant_sku_code" class="form-control" placeholder="HSN Code" value="<?= @$variant_sku_code ?>">
                                <span class="error-message" id="error-variant_sku_code"></span>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="variant_sku_code">Unit<span class="text-danger">*</span></label>
                                <select id="unit_id" name="unit_id"></select>
                                <span class="error-message" id="error-unit_id"></span>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="variant_weight">Weight</label>
                                <input type="number" placeholder="Weight" id="variant_weight" name="variant_weight" class="form-control" placeholder="Wieght" value="<?= @$variant_weight ?>">
                                <span class="error-message" id="error-variant_weight"></span>
                            </div>

                            <div class="form-group mb-3 col-md-8 mb-3">
                                <label class="form-label" for="sizes">Sizes</label>
                                <select id="sizes" name="sizes[]" placeholder="Select Sizes" multiple>
                                </select>
                                <span class="error-message" id="error-size_id"></span>
                            </div>
                            <div class="form-group mb-3 col-md-4 mb-3">
                                <label class="form-label" for="size_id">Size</label>
                                <select id="size_id" name="size_id" placeholder="Select Size Type">
                                </select>
                                <span class="error-message" id="error-size_id"></span>
                            </div>

                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="color_name">Color Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="color_name" name="color_name" placeholder="Color Name" value="<?= @$color_name ?>">
                                <span class="error-message" id="error-color_name"></span>
                            </div>

                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="color_rgb">Select color<span class="text-danger">*</span></label>
                                <input class="form-control form-control-color mw-100" type="color" value="#3b5de7" id="color_rgb" name="color_rgb" value="<?= @$color_rgb ?>">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="minimum_stock">Minimum Stock</label>
                                <input type="number" placeholder="Minimum Stock" id="minimum_stock" name="minimum_stock" class="form-control" placeholder="HSN Code" value="<?= @$minimum_stock ?>">
                                <span class="error-message" id="error-minimum_stock"></span>
                            </div>


                            <!-- Variant Details -->
                            <div class="form-group col-md-12 mb-3">
                                <label for="product_description">Description</label>
                                <textarea class="form-control" name="product_description" id="product_description" cols="20" rows="5" placeholder="Enter Description"><?= @$product_description ?></textarea>
                                <span class="error-message" id="error-product_description"></span>
                            </div>

                            <div class="form-group col-md-12 mb-3">
                                <label for="product_seo_keyword"> Seo Keywords </label>
                                <textarea class="form-control" name="product_seo_keyword" id="product_seo_keyword" cols="20" rows="5" placeholder="Enter Seo Keyword"><?= @$product_seo_keyword ?></textarea>
                                <span class="error-message" id="error-product_seo_keyword"></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="product_seo_description"> Seo Description </label>
                                <textarea rows="3" id="product_seo_description" class="form-control" name="product_seo_description"><?= @$product_seo_description ?></textarea>
                                <span class="error-message" id="error-product_seo_description"></span>
                            </div>
                            <!-- End -->
                        </div>
                    </div>

                </div>
                <div class="col-md-4 bg-light">
                    <div class="card-header bg-light py-3">
                        <h5 class="m-0 font-weight-bold text-primary">Add Product Price</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3 col-md-12">
                            <label class="form-label" for="txt_product_price">Product Price<span class="text-danger">*</span></label>
                            <input type="number" autocomplete="off" min="0" name="rate"  placeholder="0.00" class="form-control" id="rate" onchange="calculate_variant()" value="<?= @$rate ?>">
                            <span class="error-message" id="error-rate"></span>
                        </div>
                        <div class="form-group mb-3 col-md-12">
                            <label class="form-label" for="txt_discount">Discount Percent</label>
                            <input type="number" autocomplete="off" placeholder="0.00" class="form-control" min="0" max="100" name="discount_per" id="discount_per" onchange="calculate_variant()" value="<?= @$discount_per ?>">
                        </div>
                        <div class="form-group mb-3 col-md-12">
                            <label class="form-label" for="txt_discount_amount">Discount Amount</label>
                            <input type="text" readonly="true" placeholder="0.00" class="form-control" name="discount_amt" id="discount_amt" value="<?= @$discount_amt ?>">
                        </div>
                        <div class="form-group mb-3 col-md-12">
                            <label class="form-label">Select GST</label>
                            <select class="form-control select2" id="gst_per" name="gst_per" onchange="calculate_variant()" value="<?= @$gst_per ?>">
                                <option value="0">0%</option>
                                <option value="5">5%</option>
                                <option value="12">12%</option>
                                <option value="18">18%</option>
                                <option value="28">28%</option>
                            </select>
                            <span class="error-message" id="error-gst_per"></span>
                        </div>
                        <div class="form-group mb-3 col-md-12">
                            <label class="form-label" for="txt_gst_amount">GST Amount</label>
                            <input type="number" readonly="true" name="gst_amt" placeholder="0.00" class="form-control" id="gst_amt" value="<?= @$gst_amt ?>">
                        </div>
                        <hr />
                        <div class="form-group mb-3 col-md-12">
                            <label class="form-label" for="txt_offer_price_inc_tax">Selling Price<span class="text-danger">*</span></label>
                            <input type="text" readonly="true" placeholder="0.00" name="selling_price" class="form-control" id="selling_price" value="<?= @$selling_price ?>">
                            <span class="error-message" id="error-selling_price"></span>
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
                                <img class="image-fluid" style="height:auto; width:100px" id="variant_image1_display" src="<?= base_url() ?>/<?= @$variant_image1 ?>">
                                <label class="form-label">Upload Files<span class="text-danger">*</span></label>
                                <input type="file" id="file_upload1" class="form-control" onchange="ProductUploadImage('file_upload1','variant_image1','variant_image1_display')">
                                <span class="error-message" id="error-file_upload1"></span>
                            </div>
                            <div class="form-group mb-3">
                                <img class="image-fluid" style="height:auto; width:100px" id="variant_image2_display" src="<?= base_url() ?>/<?= @$variant_image2 ?>">
                                <label class="form-label">Upload Files</label>
                                <input type="file" id="file_upload2" class="form-control" onchange="ProductUploadImage('file_upload2','variant_image2','variant_image2_display')">
                                <span class="error-message" id="error-file_upload2"></span>
                            </div>
                            <div class="form-group mb-3">
                                <img class="image-fluid" style="height:auto; width:100px" id="variant_image3_display" src="<?= base_url() ?>/<?= @$variant_image3 ?>">
                                <label class="form-label">Upload Files</label>
                                <input type="file" id="file_upload3" class="form-control" onchange="ProductUploadImage('file_upload3','variant_image3','variant_image3_display')">
                                <span class="error-message" id="error-file_upload3"></span>
                            </div>
                            <!-- ... -->
                            <div class="form-group mb-3">
                                <img class="image-fluid" style="height:auto; width:100px" id="variant_image4_display" src="<?= base_url() ?>/<?= @$variant_image4 ?>">
                                <label class="form-label">Upload Files</label>
                                <input type="file" id="file_upload4" class="form-control" onchange="ProductUploadImage('file_upload4','variant_image4','variant_image4_display')">
                                <span class="error-message" id="error-file_upload4"></span>
                            </div>
                            <div class="form-group mb-3">
                                <img class="image-fluid" style="height:auto; width:100px" id="variant_image5_display" src="<?= base_url() ?>/<?= @$variant_image5 ?>">
                                <label class="form-label">Upload Files</label>
                                <input type="file" id="file_upload5" class="form-control" onchange="ProductUploadImage('file_upload5','variant_image5','variant_image5_display')">
                                <span class="error-message" id="error-file_upload5"></span>
                            </div>
                            <div class="form-group mb-3">
                                <img class="image-fluid" style="height:auto; width:100px" id="variant_image6_display" src="<?= base_url() ?>/<?= @$variant_image6 ?>">
                                <label class="form-label">Upload Files</label>
                                <input type="file" id="file_upload6" class="form-control" onchange="ProductUploadImage('file_upload6','variant_image6','variant_image6_display')">
                                <span class="error-message" id="error-file_upload6"></span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div>
                <div>
                    <button type="button" onclick="submitFormWithAjax('form',true,true,successCallback,errorCallback)" class="btn btn-primary waves-effect waves-light me-1">
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
    function calculate_variant() {
        $.ajax({
            type: "post",
            url: "<?= base_url(route_to('calculate_variant')); ?>",
            data: {
                rate: $('#rate').val(),
                discount_per: $('#discount_per').val(),
                gst_per: $('#gst_per').val(),
            },
            success: function(response) {
                if (response.status == 200) {
                    data = JSON.parse(response.data);
                    $('#discount_amt').val(data.discount_amt);
                    $('#gst_amt').val(data.gst_amt);
                    $('#selling_price').val(data.selling_price);
                }
            }
        });
    }
    var selected_sizes = JSON.parse('<?= json_encode($sizes) ?>');
    var selected_size_id = "<?= @$size_id ?>";
    var selected_unit = "<?= @$unit_id ?>";
    $(document).ready(function() {
        initializeSelectize('unit_id', {
                placeholder: "Unit"
            }, "<?= base_url(route_to('unit_list_api')) ?>", {}, "unit_id", "unit_name",
            selected_unit)
        initializeSelectize('size_id', {
            placeholder: "Select Default Size"
        })
        initializeSelectize('sizes', {
                placeholder: "Select Multiple Sizes"
            }, "<?= base_url(route_to('size_list_api')) ?>", {}, "size_id", "size_name",
            selected_sizes).onchange(function(sizes) {
            // Handle onchange event for country selectize dropdown
            // Clear options of state selectize dropdown
            // Reset variables
            initializeSelectize('size_id').clearOptions().then(function() {
                initializeSelectize('size_id', {
                    placeholder: "Select Default Size"
                }, "<?= base_url(route_to('size_list_api')) ?>", {
                    "_whereIn": [{
                        fieldname: "size.size_id",
                        value: sizes
                    }],
                }, 'size_id', 'size_name', selected_size_id)
            });
        });
    });

    function successCallback(response) {
        if (response.status == 200 || response.status == 201) {
            window.location.href = '<?= base_url(route_to('variant_list', $product_id)) ?>'
        }
    }

    function errorCallback(response) {
        console.log(response);
    }

    function ProductUploadImage(id, input_id, image_tag_id) {
        uploadImage(id, 'product', input_id, image_tag_id)
    }
</script>