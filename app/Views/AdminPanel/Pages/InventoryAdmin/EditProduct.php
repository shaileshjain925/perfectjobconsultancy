<script src="https://cdn.ckeditor.com/4.19.1/standard-all/ckeditor.js"></script>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <form action="" method="POST" enctype="multipart/form-data" class="mb-5 col-12">
            <div class="row">
                <div class="form-group col-md-12">
                    <div class="alert alert-success alert-dismissible fade show " role="alert">
                        {{success_msg}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{error_msg}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>


                <div class="col-md-8">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Add Product Detail</h6>
                    </div>
                    <!-- Add Prodcut Detail -->
                    <div class="card-body">
                        <div class="row">

                            <!-- Select Company -->
                            <div class="form-group col-md-4">
                                <label for="txt_category">Select Category<span class="text-danger">*</span></label>
                                <input type="text" list="ddl_category" placeholder="Select Category" autocomplete="off" onchange="fetchCategoryType(this)" name="txt_category" class="form-control" id="txt_category" required>
                                <datalist id="ddl_category">
                                    {% for  category in allCategory %}
                                    <option data-value="{{category.category_title}}" value="{{category.categoryName}}"></option>
                                    {% endfor %}
                                </datalist>
                            </div>
                            <!-- end -->

                            <!-- Select Tyoe -->
                            <div class="form-group col-md-4">
                                <label for="categoryType">Select Category Type<span class="text-danger">*</span></label>
                                <input type="text" autocomplete="off" onchange="fetchFabric()" list="ddl_categoryType" placeholder="Select Category Type" name="categoryType" class="form-control" id="categoryType" required>
                                <datalist id="ddl_categoryType" required>
                                </datalist>
                            </div>
                            <!-- End -->

                            <!-- Select fabric -->
                            <div class="form-group col-md-4">
                                <label for="fabric">Select Fabric<span class="text-danger">*</span></label>
                                <input type="text" autocomplete="off" list="ddl_fabric" placeholder="Select Fabric" name="fabric" class="form-control" id="fabric" required>
                                <datalist id="ddl_fabric">

                                </datalist>
                            </div>
                            <!-- End -->
                            <!-- Select SubCategory -->
                            <div class="form-group col-md-4">
                                <label for="category">Select Pattern<span class="text-danger">*</span></label>
                                <input type="text" autocomplete="off" list="ddl_pattern" placeholder="Select Pattern" name="pattern" class="form-control" id="pattern" required>
                                <datalist id="ddl_pattern">

                                </datalist>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_color">Select Color<span class="text-danger">*</span></label>
                                <input type="text" autocomplete="off" list="ddl_color" placeholder="Select Color" name="txt_colorName" class="form-control" id="txt_color" required>
                                <datalist id="ddl_color" required>

                                    <option value="{{color.colorName}}" data-value="{{color.color_title}}"></option>


                                </datalist>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="hsnCode">HSN Code</label>
                                <input type="text" autocomplete="off" placeholder="HSN Code" id="hsnCode" name="hsnCode" class="form-control">
                            </div>
                            <!-- End -->

                            <!--Product Name  -->
                            <div class="form-group col-md-8">
                                <label for="ProductName">Product Name<span class="text-danger">*</span></label>
                                <input type="text" autocomplete="off" required placeholder="Enter Product name" id="ProductName" name="ProductName" class="form-control">
                            </div>
                            <!-- End -->
                            <div class="form-group col-md-4">
                                <label for="productCode">Product Code<span class="text-danger">*</span></label>
                                <input type="text" autocomplete="off" required placeholder="Product Code" id="productCode" name="productCode" class="form-control">
                            </div>

                            <!-- Product Weight ,Length and Color-->
                            <div class="form-group col-md-3">
                                <label for="Width"> Width</label>
                                <input type="text" autocomplete="off" placeholder="Width" name="Width" id="Width" class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="Lenght"> Length</label>
                                <input type="text" autocomplete="off" placeholder="Length" name="Length" id="Length" class="form-control">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="qunatity"> Qunatity<span class="text-danger">*</span></label>
                                <input type="number" autocomplete="off" min="0" placeholder="Qunatity" id="qunatity" name="qunatity" class="form-control">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="Color"> Refund </label>
                                <input type="checkbox" name="refund" class="form-control">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="Color"> Return</label>
                                <input type="checkbox" name="return" class="form-control">
                            </div>

                            <!-- End -->

                            <!-- Product Details -->

                            <div class="form-group col-md-12">
                                <label for="Description">Description<span class="text-danger">*</span></label>
                                <textarea id="editor" name="editor"></textarea>
                                <script>
                                    CKEDITOR.replace('editor', {
                                        uiColor: '#888888',
                                    });
                                </script>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="care_and_special_note">Care and Special Notes<span class="text-danger">*</span></label>
                                <textarea rows="3" id="txt_spec" class="form-control editor" name="care_and_special_note" required></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="refund_and_exchange">Refunds and Exchange<span class="text-danger">*</span></label>
                                <textarea rows="3" id="txt_spec" class="form-control editor" name="refund_and_exchange" required></textarea>
                            </div>
                            <!-- End -->

                            <!-- Seo Keywords  -->
                            <div class="form-group col-md-12">
                                <label for="productKeywords"> Product Keywords <span class="text-danger">*</span></label>
                                <input type="text" autocomplete="off" required placeholder="Keywords" name="productKeywords" class="form-control">
                            </div>
                            <!-- End -->


                        </div>
                    </div>

                </div>

                <div class="col-md-4 bg-light">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Add Product Price</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group col-md-12">
                            <label for="txt_product_price">Product Price<span class="text-danger">*</span></label>
                            <input type="number" autocomplete="off" min="0" name="txt_product_price" required placeholder="Ex.50" class="form-control" id="txt_product_price">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Select GST<span class="text-danger">*</span></label>
                            <select class="form-control select2" id="ddl_gst" name="ddl_gst" onchange="calculategst()" required>
                                <option value="0">0%</option>
                                <option value="5">5%</option>
                                <option value="12">12%</option>
                                <option value="18">18%</option>
                                <option value="28">28%</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="txt_gst_amount">GST Amount</label>
                            <input type="number" readonly name="txt_gst_amount" placeholder="Ex. 2.38" class="form-control" id="txt_gst_amount">
                        </div>
                        <!-- /<hr /> -->
                        <div class="form-group col-md-12">
                            <label for="txt_actual_price">Actual Price</label>
                            <input type="number" readonly placeholder="Ex. 47.619" name="txt_actual_price" class="form-control" id="txt_actual_price">
                        </div>


                        <div class="form-group col-md-12">
                            <label for="txt_discount">Discount Percent<span class="text-danger">*</span></label>
                            <input type="number" autocomplete="off" class="form-control" min="0" max="100" name="txt_discount" id="txt_discount" onchange="calculatePrice()"></select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="txt_discount_amount">Discount Amount</label>
                            <input type="text" readonly placeholder="Ex. 2.38" class="form-control" name="txt_discount_amount" id="txt_discount_amount">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="txt_offer_price_inc_tax">Offer Price including tax</label>
                            <input type="text" readonly placeholder="Ex. 47.619" name="txt_offer_price_inc_tax" class="form-control" id="txt_offer_price_inc_tax">
                        </div>
                    </div>
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Upload Product Images</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="txt_product_images">Select Images 1<span class="text-danger">*</span></label>
                                <input type="file" name="txt_product_images1" accept="image/*" required onchange="previewImage1(event);" class="form-control" id="txt_product_images1">
                                <!-- <img id="image-1" class="col-md-12 mt-3" height="250px" style="display: none;"> -->
                            </div>
                            <div class="form-group col-md-4">
                                <img id="image-1" class="col-md-12 mt-3">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="txt_product_images">Select Images 2</label>
                                <input type="file" name="txt_product_images2" accept="image/*" onchange="previewImage2(event);" class="form-control" id="txt_product_images2">
                            </div>
                            <div class="form-group col-md-4">
                                <img id="image-2" class="col-md-12 mt-3">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="txt_product_images">Select Images 3</label>
                                <input type="file" name="txt_product_images3" accept="image/*" onchange="previewImage3(event);" class="form-control" id="txt_product_images3">
                            </div>
                            <div class="form-group col-md-4">
                                <img id="image-3" class="col-md-12 mt-3">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="txt_product_images">Select Images 4</label>
                                <input type="file" name="txt_product_images4" accept="image/*" onchange="previewImage4(event);" class="form-control" id="txt_product_images4">
                            </div>
                            <div class="form-group col-md-4">
                                <img id="image-4" class="col-md-12 mt-3">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="txt_product_images">Select Images 5</label>
                                <input type="file" name="txt_product_images5" accept="image/*" onchange="previewImage5(event);" class="form-control" id="txt_product_images5">
                            </div>
                            <div class="form-group col-md-4">
                                <img id="image-5" class="col-md-12 mt-3">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="txt_product_images">Select Images 6</label>
                                <input type="file" name="txt_product_images6" accept="image/*" onchange="previewImage6(event);" class="form-control" id="txt_product_images6">
                            </div>
                            <div class="form-group col-md-4">
                                <img id="image-6" class="col-md-12 mt-3">
                            </div>
                        </div>

                        <p class="text-danger">{{img_msg}}</p>

                    </div>
                </div>
                <!-- End -->
            </div>
            <div class="col-md-12">
                <button type="submit" id="btn_submit" class="btn btn-primary">
                    Submit <i class="fa fa-paper-plane"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function previewImage1(event) {
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var pre = document.getElementById("image-1");
            pre.src = src;
            pre.style.display = "block";
        }
    }

    function previewImage2(event) {
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var pre = document.getElementById("image-2");
            pre.src = src;
            pre.style.display = "block";
        }
    }

    function previewImage3(event) {
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var pre = document.getElementById("image-3");
            pre.src = src;
            pre.style.display = "block";
        }
    }

    function previewImage4(event) {
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var pre = document.getElementById("image-4");
            pre.src = src;
            pre.style.display = "block";
        }
    }

    function previewImage5(event) {
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var pre = document.getElementById("image-5");
            pre.src = src;
            pre.style.display = "block";
        }
    }

    function previewImage6(event) {
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var pre = document.getElementById("image-6");
            pre.src = src;
            pre.style.display = "block";
        }
    }

    function calculategst() {
        var productPrice = parseInt(document.getElementById("txt_product_price").value);
        var gstPercent = parseInt(document.getElementById("ddl_gst").value);
        var gstAmount = (productPrice / 100) * gstPercent;
        document.getElementById("txt_actual_price").value = productPrice + parseInt(gstAmount);
        document.getElementById("txt_gst_amount").value = parseInt(gstAmount);
    }

    function calculatePrice() {
        var productPrice = parseInt(parseInt(document.getElementById("txt_product_price").value));
        var discountPercent = parseInt(document.getElementById("txt_discount").value);
        var gstAmount = parseInt(document.getElementById("txt_gst_amount").value);
        var discountAmount = parseInt((productPrice / 100) * discountPercent);
        document.getElementById("txt_discount_amount").value = discountAmount;
        document.getElementById("txt_offer_price_inc_tax").value = productPrice - discountAmount + gstAmount;
    }
</script>