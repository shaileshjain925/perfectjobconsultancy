<section class="bg-section py-5">
    <div class="container">
        <?= (isset($Breadcrumb) && !empty($Breadcrumb)) ? view('AdminPanel/components/Breadcrumb', $navbar) : view('AdminPanel/components/Breadcrumb') ?>
        
        <div class="card p-4 border-0 product_detail_div">
            <h4>Organic White Corn Tortilla Chips</h4>
            <ul class="d-flex">
                <li>
                    <span class="gray_text"> Brands:</span> Frito Lay, Oreo, Welch's
                </li>
                <li class="rating_color">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <span class="gray_text">1 REVIEW </span>
                </li>
                <li> <span class="gray_text">SKU: </span>LN59ET</li>
            </ul>
            <div class="row">
                <div class="col-md-5">
                    <div id="productdetail" class="carousel slide" data-bs-ride="false">
                        <div class="carousel-inner">
                            <div class="carousel-item relative active">
                                <img src="<?= base_url("AdminPanel/images/img1.jpg") ?>" class="d-block w-100" alt="...">
                                <div class="product_badges text-start">
                                    <span>25%</span>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="<?= base_url("AdminPanel/images/img2.jpg") ?>" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="<?= base_url("AdminPanel/images/img3.jpg") ?>" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#productdetail" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                                <img src="<?= base_url("AdminPanel/images/img1.jpg") ?>" alt="">
                            </button>
                            <button type="button" data-bs-target="#productdetail" data-bs-slide-to="1" aria-label="Slide 2">
                                <img src="<?= base_url("AdminPanel/images/img2.jpg") ?>" alt="">
                            </button>
                            <button type="button" data-bs-target="#productdetail" data-bs-slide-to="2" aria-label="Slide 3">
                                <img src="<?= base_url("AdminPanel/images/img3.jpg") ?>" alt="">
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-6 product_description">
                            <div class="mb-3 fs-5">
                                <del class="gray_text">$ 4.29</del> &nbsp;
                                <span class="fw-bold price_color">$ 3.29</span>
                            </div>
                            <button>In-stock</button>
                            <p>Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent</p>
                            <div class="product_quantity mb-4 d-flex">
                                <div>
                                    <i class="fa-solid fa-minus"></i>
                                </div>
                                <input type="text" value="2">
                                <div>
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <button class="ms-3">Add To Cart</button>
                            </div>
                            <div class="Wishlist_and_comparison d-flex">
                                <button>Add To Wishlist</button>
                                <div class=""><i class="fa-solid fa-code-compare"></i> Compare</div>
                            </div>
                            <div class="py-3 border-bottom">
                                <ul class="d-flex flex-column gap-2">
                                    <li>
                                        <i class="fa-solid fa-check me-2"></i>Organic
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-check me-2"></i> MFG: Jun 4.2021
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-check me-2"></i> LIFE: 30 days
                                    </li>
                                </ul>
                            </div>
                            <p class="gray_text">Category: <span class="fw-bold">Biscuits & Snacks</span> </p>
                            <div class="social_icn">
                                <i class="fa-brands fa-facebook-f"></i>
                                <i class="fa-brands fa-instagram"></i>
                                <i class="fa-brands fa-linkedin"></i>
                                <i class="fa-brands fa-twitter"></i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card product_order">
                                <div class="d-flex gap-3">
                                    <i class="fa-solid fa-truck-fast"></i>
                                    <p>Free Shipping apply to all orders over $100</p>
                                </div>
                                <div class="d-flex gap-3">
                                    <i class="fa-solid fa-truck-fast"></i>
                                    <p>Guranteed 100% Organic from natural farmas</p>
                                </div>
                                <div class="d-flex gap-3">
                                    <i class="fa-solid fa-truck-fast"></i>
                                    <p>1 Day Returns if you change your mind</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>