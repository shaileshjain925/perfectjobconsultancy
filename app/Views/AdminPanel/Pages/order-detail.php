<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            
            <div class="card mb-3">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Customer Orders Detail</h6>
                </div>
                <div class="card-body">
                    <div class="col-md-12 new-contact-fad">
                        <table class="table table-bordered">
                            <tbody>
                                    <tr><td>Order Number </td> <td> </td> </tr>


                                    <tr>
                                        <td>Order Status </td>
                                        <td>
                                            <label class="label label-info">
                                                
                                            </label>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Order Ordered date </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td>Delivery Address </td>
                                        <td>
                                            
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Product Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>{{forloop.counter}}</td>
                                        <td>{{items.productid.productName}}</td>
                                        <td>{{items.qty}}</td>
                                        <td> {{items.productPrice}} /-</td>
                                    </tr>

                                
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>Total</td>
                                   
                                        <td>
                                            
                                        </td>
                                </tr>
                            </tbody>
                        </table>
                        <a class="btn btn-primary btn-sm" href="" role="button">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
