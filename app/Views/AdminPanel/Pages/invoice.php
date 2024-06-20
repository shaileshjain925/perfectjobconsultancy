<div class="content-page">

    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Invoice</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Invoice</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->



            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card pt-2 mb-2">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group col-md-12">
                                    <label for="Tag">Order ID<span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Enter ID" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary mt-4">Generate Invoice </button>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fa fa-table"></i> Invoice example</h3>
                        </div>

                        <div class="card-body">
                            <div class="container">
                                <div class="invoice_box">
                                    <h3>Invoice </h3>
                        
                                    <div class="row invoice_info">
                                        <div class="col-md-4">
                                            <img class="img-fluid" src="{% static 'Images/hansalogo.png' %}" alt="Logo" width="80">  
                                        </div>
                                        <div class="col-md-8">
                                            <span class="invoice_id">
                                                <strong>Invoice Number : </strong>  INC7710
                                            </span>
                                            <span>
                                                <strong>Invoice Date : </strong> 11/Mar/2021
                                            </span>
                                            <span class="invoice_id">
                                                <strong>Order Number : </strong> 7710
                                            </span>
                                            <span class="invoice_id">
                                                <strong>Shipment Number</strong> Fed0001
                                            </span>
                                        </div>
                                    </div>
                        
                                    <div class="table-responsive">
                                        <table class="table table-head-light table-striped">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <address>
                                                            <label>
                                                                Customer Details :
                                                            </label>
                                                        </address>
                                                    </th>
                                                    <th>
                                                        <address>
                                                            <label>
                                                                Shipping Details :
                                                            </label>
                                                        </address>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <address>
                                                                <ul>
                                                                    <li>
                                                                        Full Name :
                                                                    </li>
                                                                    <li>
                                                                        BrillsenseOne
                                                                    </li>
                                                                    <li>
                                                                        Email :
                                                                    </li>
                                                                    <li>
                                                                        brillsense.k@brillsense.com
                                                                    </li>
                                                                    <li>
                                                                        MObile No.
                                                                    </li>
                                                                    <li>
                                                                        9399054754
                                                                    </li>
                                                                </ul>
                                                        </address>
                                                    </td>
                                                    <td>
                                                        <address>
                                                                <ul>
                                                                    <li>
                                                                        Address :
                                                                    </li>
                                                                    <li>
                                                                        Birla Gram Nagda , Birlagram post office
                                                                    </li>
                                                                    <li>
                                                                        Zip Code :
                                                                    </li>
                                                                    <li>
                                                                        456631
                                                                    </li>
                                                                    <li>
                                                                        City :
                                                                    </li>
                                                                    <li>
                                                                        Ujjain
                                                                    </li>
                                                                    <li>
                                                                        State :
                                                                    </li>
                                                                    <li>
                                                                        Madhya Pradesh
                                                                    </li>
                                                                </ul>
                                                        </address>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-head-light table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Product Name</th>
                                                    <th>GST</th>
                                                    <th>Product Items</th>
                                                    <th></th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <tr>
                                                        <td>1.</td>
                        
                                                        <td>
                                                            <div style="display:none;">1</div>
                                                            Brillsense Organic India Kure
                                                            <input type="hidden" id="hdf_companyname-1" value="Brillsense">
                                                            <input type="hidden" id="hdf_name-1" value="Organic India Kure">
                                                        </td>
                        
                                                        <td>
                                                            5 %
                                                            <input type="hidden" id="hdf_gst-1" value="5">
                                                        </td>
                                                        <td>
                                                            Total 1 Items
                                                            <input type="hidden" id="hdf_quantity-1" value="1">
                                                        </td>
                                                        <td></td>
                                                        <td>
                                                            Rs. 4950.00/-
                                                            <input type="hidden" id="hdf_totalprice-1" value="4950.00">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2.</td>
                        
                                                        <td>
                                                            <div style="display:none;">2</div>
                                                            ezeepoint 56
                                                            <input type="hidden" id="hdf_companyname-2" value="ezeepoint">
                                                            <input type="hidden" id="hdf_name-2" value="56">
                                                        </td>
                        
                                                        <td>
                                                            18 %
                                                            <input type="hidden" id="hdf_gst-2" value="18">
                                                        </td>
                                                        <td>
                                                            Total 1 Items
                                                            <input type="hidden" id="hdf_quantity-2" value="1">
                                                        </td>
                                                        <td></td>
                                                        <td>
                                                            Rs. 2000.00/-
                                                            <input type="hidden" id="hdf_totalprice-2" value="2000.00">
                                                        </td>
                                                    </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <strong>Total Amount : </strong>
                                                    </td>
                                                    <td colspan="3"></td>
                                                    <td style="background-color:#dbdbdb">
                                                        Rs.6950.00
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <strong>Shipping : </strong>
                                                    </td>
                                                    <td colspan="3">
                                                        International Shipping
                                                    </td>
                                                    <td style="background-color:#dbdbdb">
                                                        Rs.500.00/-
                                                    </td>
                                                </tr>
                                                
                                                <tr style="background-color:#FFCF3E;border-top:thin solid #2f2f2f">
                                                    <td colspan="5">
                                                        <strong>Total</strong>
                                                    </td>
                                                    <td>
                                                        Rs.7450.00/-
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <p>
                                        Thank You for your order!
                                    </p>
                                    <a href="javascript:void(0)" class="e-com-btn">Print <i class="fa fa-print"></i></a>
                                </div>
                            </div>
                        </div><!-- end card body -->

                    </div><!-- end card-->

                </div><!-- end col-->

            </div><!-- end row-->



        </div>
        <!-- END container-fluid -->

    </div>
    <!-- END content -->

</div>
