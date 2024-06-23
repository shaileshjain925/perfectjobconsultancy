<div class="offcanvas offcanvas-end offcanvas-product" tabindex="-1" id="viewproduct" aria-labelledby="viewproductLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">View Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="row">
            <div class="col-md-12">
                <!-- Add Prodcut Detail -->
                <div class="card-body">
                    <div class="row">
                        <!-- Select Company -->
                        <div class="form-group col-md-4 mb-3">
                            <label for="txt_category">Category</label>
                            <p class="font-bold text-black">Category Name</p>
                        </div>
                        <!-- end -->

                        <!-- Select Tyoe -->
                        <div class="form-group col-md-4 mb-3">
                            <label for="categoryType">Category Type</label>
                            <p class="font-bold text-black">Category Type Name</p>
                        </div>
                        <!-- End -->

                        <!-- Select fabric -->
                        <div class="form-group col-md-4 mb-3">
                            <label for="fabric">Fabric</label>
                            <p class="font-bold text-black">
                                Fabric Name
                            </p>
                        </div>
                        <!-- End -->
                        <!-- Select Pattern -->
                        <div class="form-group col-md-4 mb-3">
                            <label for="category">Pattern</label>
                            <p class="font-bold text-black">
                                Pattern Name
                            </p>
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label for="hsnCode">HSN Code</label>
                            <p class="font-bold text-black">CODE</p>
                        </div>
                        <!-- End -->
                        <div class="form-group col-md-4 mb-3">
                            <label for="productCode">Product Code</label>
                            <p class="font-bold text-black">Prodcut code</p>
                        </div>

                        <!--Product Name  -->
                        <div class="form-group col-md-12 mb-3">
                            <label for="ProductName">Product Name</label>
                            <p class="font-bold text-black">Name Show Here</p>
                        </div>
                        <!-- End -->


                        <!-- Product Weight ,Length and Color-->
                        <div class="form-group col-md-4 mb-3">
                            <label for="Width"> Width</label>
                            <p class="font-bold text-black">20 Meter</p>
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label for="Lenght"> Length</label>
                            <p class="font-bold text-black">40 Meter</p>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Policy</label>
                            <div class=" d-flex gap-2">
                                <div class="form-check">
                                    <input disabled class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked="">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Refund
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input disabled class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Return
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- End -->

                        <!-- Product Details -->

                        <div class="form-group col-md-12 mb-3">
                            <label for="Description">Description</label>
                            <p class="font-bold text-black">The term discount can be used to refer to many forms of reduction in the price of a good or service. The two most common types of discounts are discounts in which you get a percent off, or a fixed amount off.</p>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label for="care_and_special_note">Care and Special Notes</label>
                            <p class="font-bold text-black">The term discount can be used to refer to many forms of reduction in the price of a good or service. The two most common types of discounts are discounts in which you get a percent off, or a fixed amount off.</p>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label for="refund_and_exchange">Refunds and Exchange</label>
                            <p class="font-bold text-black">The term discount can be used to refer to many forms of reduction in the price of a good or service. The two most common types of discounts are discounts in which you get a percent off, or a fixed amount off.</p>
                        </div>
                        <!-- End -->

                        <!-- Seo Keywords  -->
                        <div class="form-group col-md-12">
                            <label for="productKeywords"> Product Keywords </label>
                            <p class="font-bold text-black">The term discount can be used to refer to many forms of reduction in the price of a good or service. The two most common types of discounts are discounts in which you get a percent off, or a fixed amount off.</p>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label for="refund_and_exchange">SEO Description</label>
                            <p class="font-bold text-black">The term discount can be used to refer to many forms of reduction in the price of a good or service. The two most common types of discounts are discounts in which you get a percent off, or a fixed amount off.</p>
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
                        <img src="<?= base_url($_assets_path . '') ?>assets/images/flags/us.jpg" alt="" class="mb-3" />
                        <img src="<?= base_url($_assets_path . '') ?>assets/images/flags/us.jpg" alt="" class="mb-3" />
                        <img src="<?= base_url($_assets_path . '') ?>assets/images/flags/us.jpg" alt="" class="mb-3" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>