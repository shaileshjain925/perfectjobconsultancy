<div class="container-fluid">
    
        <div class="card shadow mb-4 pb-4">
            <div class="card mb-3">
                <div class="card-header">
                    <h4>Add Offer Code</h4>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="txt_code">Offer Code<span class="text-danger">*</span></label>
                                    <input type="text" required placeholder="Enter Offer Code" name="txt_code" class="form-control" id="txt_code">
                                </div>
            
                                <div class="form-group col-md-4">
                                    <label for="txt_percent"> Percent</label>
                                    <div>
                                        <input type="text" class="form-control" required name="txt_percent" placeholder="Enter percent" id="txt_percent"  />
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="txt_max_user"> Max User</label>
                                    <div>
                                        <input type="text" class="form-control" required placeholder="Enter percent" name="max_user" id="txt_max_user" />
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="txt_max_amount"> Max Discount Amount</label>
                                    <div>
                                        <input type="text" class="form-control" required placeholder="Enter percent" name="max_amunt" id="txt_max_amount"  />
                                    </div>
                                </div>
            
                                <div class="form-group col-md-4">
                                    <label for="txt_startdate">Start Date<span class="text-danger">*</span></label>
                                    <input type="date" data-parsley-type="date" required placeholder="Enter start date" name="start_date" class="form-control" id="txt_startdate">
                                </div>
            
                                <div class="form-group col-md-4">
                                    <label for="txt_expiredate">Expire  Date<span class="text-danger">*</span></label>
                                    <input type="date" data-parsley-type="date" required placeholder="Enter expire date" name="expire_date" class="form-control" id="txt_expiredate">
                                </div>
            
                                <div class="form-group col-md-12">
                                    <button class="btn btn-primary" type="submit" id="btnsubmit">
                                        Submit
                                    </button>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{success}}
                                      </div>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{failed}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- end card-->
        </div>

    <div class="card mb-3">
        <div class="card-header">
            View Offer Code
        </div>
        <div class="card-body">
            <table class="table table-responsive table-head-light table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Offer Code</th>
                        <th>Percentage</th>
                        <th>Max Amount</th>
                        <th>Max User</th>
                        <th>Current Applied</th>
                        <th>Start Date</th>
                        <th>Expire Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <th scope="row">{{forloop.counter}}</th>
                            <td>{{coupon.couponCode}}</td>
                            <td>{{coupon.discount_percent}}</td>
                            <td>{{coupon.max_discount}}</td>
                            <td>{{coupon.max_user}}</td>
                            <td>{{coupon.cur_user}}</td>
                            <td>{{coupon.created_date}}</td>
                            <td>{{coupon.expire_date}}</td>
                            <!-- <td>{{coupon.couponCode}}</td> -->
                            <!-- <td>{{coupon.couponCode}}</td> -->
                            <td>
                                <button class="btn btn-danger btn-sm" id="btn_delete" data-ofid="@item.afid">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>