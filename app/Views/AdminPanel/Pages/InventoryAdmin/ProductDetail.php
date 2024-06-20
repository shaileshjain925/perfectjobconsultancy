<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">View Product Detail</h6>
        </div>
        <div class="card-body">
            <!--Section: Block Content-->
            <div class="row">
                <div class="col-md-6">
                    <div id="myCarousel" class="carousel slide shadow row">
                        <div class="col-md-2">
                            <ul class="carousel-indicators list-inline ">

                                <li class="list-inline-item active">
                                    <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#myCarousel">
                                        <img src="https://hansahandloom.s3.ap-south-1.amazonaws.com/{{product.img1}}" class="img-fluid">
                                    </a>
                                </li>


                                <li class="list-inline-item">
                                    <a id="carousel-selector-1" data-slide-to="1" data-target="#myCarousel">
                                        <img src="https://hansahandloom.s3.ap-south-1.amazonaws.com/{{product.img2}}" class="img-fluid">
                                    </a>
                                </li>


                                <li class="list-inline-item">
                                    <a id="carousel-selector-2" data-slide-to="2" data-target="#myCarousel">
                                        <img src="https://hansahandloom.s3.ap-south-1.amazonaws.com/{{product.img3}}" class="img-fluid">
                                    </a>
                                </li>


                                <li class="list-inline-item">
                                    <a id="carousel-selector-4" data-slide-to="3" data-target="#myCarousel">
                                        <img src="https://hansahandloom.s3.ap-south-1.amazonaws.com/{{product.img4}}" class="img-fluid">
                                    </a>
                                </li>


                                <li class="list-inline-item">
                                    <a id="carousel-selector-5" data-slide-to="4" data-target="#myCarousel">
                                        <img src="https://hansahandloom.s3.ap-south-1.amazonaws.com/{{product.img5}}" class="img-fluid">
                                    </a>
                                </li>


                                <li class="list-inline-item">
                                    <a id="carousel-selector-6" data-slide-to="5" data-target="#myCarousel">
                                        <img src="https://hansahandloom.s3.ap-south-1.amazonaws.com/{{product.img6}}" class="img-fluid">
                                    </a>
                                </li>

                            </ul>
                        </div>

                        <div class="col-md-10">

                            <!-- main slider carousel items -->
                            <div class="carousel-inner">

                                <div class="active carousel-item" data-slide-number="0">
                                    <img src="https://hansahandloom.s3.ap-south-1.amazonaws.com/{{product.img1}}" class="img-fluid">
                                </div>


                                <div class="carousel-item" data-slide-number="1">
                                    <img src="https://hansahandloom.s3.ap-south-1.amazonaws.com/{{product.img2}}" class="img-fluid">
                                </div>


                                <div class="carousel-item" data-slide-number="2">
                                    <img src="https://hansahandloom.s3.ap-south-1.amazonaws.com/{{product.img3}}" class="img-fluid">
                                </div>


                                <div class="carousel-item" data-slide-number="3">
                                    <img src="https://hansahandloom.s3.ap-south-1.amazonaws.com/{{product.img4}}" class="img-fluid">
                                </div>


                                <div class="carousel-item" data-slide-number="4">
                                    <img src="https://hansahandloom.s3.ap-south-1.amazonaws.com/{{product.img5}}" class="img-fluid">
                                </div>


                                <div class="carousel-item" data-slide-number="5">
                                    <img src="https://hansahandloom.s3.ap-south-1.amazonaws.com/{{product.img6}}" class="img-fluid">
                                </div>


                                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>

                            </div>
                            <!-- main slider carousel nav controls -->
                        </div>


                    </div>
                </div>
                <div class="d-flex align-items-center col-md-6 pl-lg-5 mb-5">
                    <div>
                        <h1 class="mb-4">{{product.productName}}</h1>
                        <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-sm-between mb-4">
                            <ul class="list-inline mb-2 mb-sm-0">
                                <li class="list-inline-item h4 font-weight-light mb-0">&#8377;520/- sale price</li>
                                <li class="list-inline-item text-muted font-weight-light">
                                    500/-
                                    <del>&#8377; 550/-</del>

                                </li>
                            </ul>
                            <div class="d-flex align-items-center">
                                <ul class="list-inline mr-2 mb-0">
                                    <li class="list-inline-item mr-0"><i class="fa fa-star "></i></li>
                                    <li class="list-inline-item mr-0"><i class="fa fa-star "></i></li>
                                    <li class="list-inline-item mr-0"><i class="fa fa-star "></i></li>
                                    <li class="list-inline-item mr-0"><i class="fa fa-star "></i></li>
                                    <li class="list-inline-item mr-0"><i class="fa fa-star "></i></li>

                                </ul><span class="text-muted text-uppercase text-sm">{{total_rating}} reviews</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-lg-6 detail-option mb-3">
                                <h6 class="detail-option-heading">category </h6>
                                <label class="btn btn-sm btn-outline-secondary detail-option-btn-label">
                                    {{product.category}}
                                </label>

                            </div>

                            <div class="col-sm-6 col-lg-6 detail-option mb-3">
                                <h6 class="detail-option-heading">Type</h6>
                                <label class="btn btn-sm btn-outline-secondary detail-option-btn-label">
                                    {{product.categoryType}}
                                </label>

                            </div>

                            <div class="col-sm-6 col-lg-6 detail-option mb-3">
                                <h6 class="detail-option-heading">Fabric</h6>
                                <label class="btn btn-sm btn-outline-secondary detail-option-btn-label">
                                    {{product.fabric}}
                                </label>

                            </div>

                            <div class="col-sm-6 col-lg-6 detail-option mb-3">
                                <h6 class="detail-option-heading">Pattern</h6>
                                <label class="btn btn-sm btn-outline-secondary detail-option-btn-label">
                                    {{product.pattern}}
                                </label>

                            </div>


                            <div class="col-sm-6 col-lg-6 detail-option mb-3">
                                <h6 class="detail-option-heading">Colour</h6>
                                <ul class="list-inline mb-0 colours-wrapper">
                                    <li class="list-inline-item">
                                        <label class="btn-colour" for="colour_Blue" style="background-color: #3025ff"> </label>
                                    </li>
                                </ul>
                                <label class="btn btn-sm btn-outline-secondary detail-option-btn-label">
                                    {{product.color}}
                                </label>

                            </div>

                            <div class="col-sm-6 col-lg-6 detail-option mb-3">
                                <h6 class="detail-option-heading">Size</h6>
                                <label class="btn btn-sm btn-outline-secondary detail-option-btn-label">
                                    Length : - {{product.length}}
                                </label>

                                <label class="btn btn-sm btn-outline-secondary detail-option-btn-label">
                                    Width : - {{product.width}}
                                </label>

                            </div>

                        </div>

                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <span class="badge p-2 text-uppercase badge-danger">Out of Stock</span>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Section: Block Content-->
        <section class="mt-5">
            <div class="container">
                <ul class="nav nav-tabs flex-column flex-sm-row" role="tablist">
                    <li class="nav-item"><a class="nav-link detail-nav-link active" data-toggle="tab" href="#description" role="tab" aria-selected="true">Description</a></li>
                    <li class="nav-item"><a class="nav-link detail-nav-link" data-toggle="tab" href="#additional-information" role="tab">Additional Information</a></li>
                    <li class="nav-item"><a class="nav-link detail-nav-link" data-toggle="tab" href="#reviews" role="tab" aria-selected="false">Reviews</a></li>
                </ul>
                <div class="tab-content py-4">
                    <div class="tab-pane px-3 active" id="description" role="tabpanel">
                        <p class="text-muted">{{product.desc|safe}}</p>

                    </div>
                    <div class="tab-pane" id="additional-information" role="tabpanel">
                        <div class="row">
                            <p class="text-muted">{{product.care_and_special}}</p>
                        </div>
                    </div>
                    <div class="tab-pane" id="reviews" role="tabpanel">
                        <div class="row mb-5">
                            <div class="col-lg-10 col-xl-9">
                                <div class="media review">
                                    <div class="text-center mr-4 mr-xl-5">
                                        <img class="review-image" src="https://hansahandloom.s3.ap-south-1.amazonaws.com/{{review.user_id.profile_pic}}" alt="Han Solo">
                                        <img class="review-image" src="https://dummyimage.com/200x200/000/fff.png&text={{review.user_id.full_name}}">

                                        <span class="text-uppercase text-muted">{{review.review_Date}}</span>
                                    </div>

                                    <div class="media-body">
                                        <h5 class="mt-2 mb-1">{{review.user_id.full_name}}</h5>
                                        <div class="mb-2">
                                            <i class="fa fa-xs fa-star text-warning"></i>
                                            <i class="fa fa-xs fa-star"></i>
                                            <i class="fa fa-xs fa-star"></i>
                                            <i class="fa fa-xs fa-star"></i>
                                            <i class="fa fa-xs fa-star"></i>


                                        </div>
                                        <p class="text-muted">{{review.review_txt}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

</div>