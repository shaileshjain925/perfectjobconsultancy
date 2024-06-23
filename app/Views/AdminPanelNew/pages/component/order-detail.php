<div class="offcanvas offcanvas-end offcanvas-product" tabindex="-1" id="orderDetail" aria-labelledby="orderDetailLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Order Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="card-body">
            <div class="col-md-12 new-contact-fad">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Order Number </td>
                            <td> {{order_details.order_id}}</td>
                        </tr>


                        <tr>
                            <td>Order Status </td>
                            <td>
                                <label class="btn btn-sm btn-secondary">
                                    Pending
                                </label>

                            </td>
                        </tr>
                        <tr>
                            <td>Order Ordered date </td>
                            <td> {{order_details.order_date}}</td>
                        </tr>
                        <tr>
                            <td>Delivery Address </td>
                            <td>
                                {{order_details.address_id.address}} {{order_details.address_id.landmark}}
                                {{order_details.address_id.city}}{{order_details.address_id.pincode}}
                            </td>
                        </tr>
                        <tr>
                            <td>Shipping Address </td>
                            <td>
                                {{order_details.address_id.address}} {{order_details.address_id.landmark}}
                                {{order_details.address_id.city}}{{order_details.address_id.pincode}}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Menu Name</th>
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
                                {{order_details.total_amount}}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-info">
                     Accept Order
                </button>
                <a class="btn btn-primary" href="" role="button">Back</a>
            </div>
        </div>
    </div>
</div>