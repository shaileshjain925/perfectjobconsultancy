  <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasRightLabel">View Product</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
      <div class="row">
          <div class="col-md-8">
              <!-- Add Prodcut Detail -->
              <div class="card-body">
                  <div class="row">
                      <div class="form-group col-md-12 mb-3">
                          <label class="form-label" for="variant_name">Variant Title</label>
                          <p class="font-bold text-black"> <?= @$variant_name ?></p>
                      </div>
                      <div class="mb-3 col-md-4">
                          <label for="variant_sku_code">SKU Code</label>
                          <p class="font-bold text-black"> <?= @$variant_sku_code ?></p>
                      </div>
                      <div class="mb-3 col-md-4">
                          <label for="variant_unit">Unit</label>
                          <p class="font-bold text-black"> <?= @$unit_id ?></p>
                      </div>

                      <div class="mb-3 col-md-4">
                          <label for="variant_weight">Weight</label>
                          <p class="font-bold text-black"> <?= @$variant_weight ?></p>
                      </div>

                      <div class="form-group mb-3 col-md-8 mb-3">
                          <label class="form-label" for="sizes">Sizes</label>
                          <p class="font-bold text-black"> <?= @$sizes ?></p>
                      </div>
                      <div class="form-group mb-3 col-md-4 mb-3">
                          <label class="form-label" for="size_id">Size</label>
                          <p class="font-bold text-black"> <?= @$size_id ?></p>
                      </div>

                      <div class="mb-3 col-md-4">
                          <label class="form-label" for="color_name">Color Name</label>
                          <p class="font-bold text-black"> <?= @$color_name ?></p>
                      </div>

                      <div class="mb-3 col-md-4">
                          <label class="form-label" for="color_rgb">Select color<span class="text-danger">*</span></label>
                          <p class="font-bold text-black"> <?= @$color_rgb ?></p>
                      </div>
                      <div class="mb-3 col-md-4">
                          <label for="minimum_stock">Minimum Stock</label>
                          <p class="font-bold text-black"> <?= @$minimum_stock ?></p>
                      </div>


                      <!-- Variant Details -->
                      <div class="form-group col-md-12 mb-3">
                          <label for="product_description">Description</label>
                          <p class="font-bold text-black"> <?= @$product_description ?></p>
                      </div>

                      <div class="form-group col-md-12 mb-3">
                          <label for="product_seo_keyword"> Seo Keywords </label>
                          <p class="font-bold text-black"> <?= @$product_seo_keyword ?></p>
                      </div>
                      <div class="form-group col-md-12">
                          <label for="product_seo_description"> Seo Description </label>
                          <p class="font-bold text-black"> <?= @$product_seo_description ?></p>
                      </div>
                      <!-- End -->
                  </div>
              </div>

          </div>
          <div class="col-md-4 bg-light">
              <div class="card-body">
                  <div class="form-group mb-3 col-md-12">
                      <label class="form-label" for="txt_product_price">Product Price</label>
                      <p class="font-bold text-black"> <?= @$rate ?></p>
                  </div>
                  <div class="form-group mb-3 col-md-12">
                      <label class="form-label" for="txt_discount">Discount Percent</label>
                      <p class="font-bold text-black"> <?= @$discount_per ?></p>
                  </div>
                  <div class="form-group mb-3 col-md-12">
                      <label class="form-label" for="txt_discount_amount">Discount Amount</label>
                      <p class="font-bold text-black"> <?= @$discount_amt ?></p>
                  </div>
                  <div class="form-group mb-3 col-md-12">
                      <label class="form-label">Select GST</label>
                      <p class="font-bold text-black"> <?= @$gst_per ?></p>
                  </div>
                  <div class="form-group mb-3 col-md-12">
                      <label class="form-label" for="txt_gst_amount">GST Amount</label>
                      <p class="font-bold text-black"> <?= @$gst_amt ?></p>
                  </div>
                  <hr />
                  <div class="form-group mb-3 col-md-12">
                      <label class="form-label" for="txt_offer_price_inc_tax">Selling Price</label>
                      <p class="font-bold text-black"> <?= @$selling_price ?></p>
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
                          <label class="form-label">Upload Files1</label>
                          <img class="image-fluid" style="height:auto; width:100px" src="<?= base_url() ?>/<?= @$variant_image1 ?>">
                      </div>
                      <div class="form-group mb-3">
                          <label class="form-label">Upload Files2</label>
                          <img class="image-fluid" style="height:auto; width:100px" src="<?= base_url() ?>/<?= @$variant_image2 ?>">
                      </div>
                      <div class="form-group mb-3">
                          <label class="form-label">Upload Files3</label>
                          <img class="image-fluid" style="height:auto; width:100px" src="<?= base_url() ?>/<?= @$variant_image3 ?>">
                      </div>
                      <div class="form-group mb-3">
                          <label class="form-label">Upload Files4</label>
                          <img class="image-fluid" style="height:auto; width:100px" src="<?= base_url() ?>/<?= @$variant_image4 ?>">
                      </div>
                      <div class="form-group mb-3">
                          <label class="form-label">Upload Files5</label>
                          <img class="image-fluid" style="height:auto; width:100px" src="<?= base_url() ?>/<?= @$variant_image5 ?>">
                      </div>
                      <div class="form-group mb-3">
                          <label class="form-label">Upload Files6</label>
                          <img class="image-fluid" style="height:auto; width:100px" src="<?= base_url() ?>/<?= @$variant_image6 ?>">
                      </div>

                  </div>

              </div>
          </div>
      </div>
  </div>

  <script>
     
  </script>