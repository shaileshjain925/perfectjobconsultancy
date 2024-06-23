<div class="card">
    <div class="card-body">
        <table id="dataTable" class="table table-responsive-xl table-hover table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Order ID</th>
                    <th>Ordered Date</th>
                    <th>Price</th>
                    <th>Payment Type</th>
                    <th>Customer Name</th>
                    <th>Current Status</th>
                    <th>Action</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        01
                    </td>
                    <td>
                        HANSAOD0001
                    </td>
                    <td>
                        09/06/2024
                    </td>
                    <td>
                        3000rs/-
                    </td>
                    <td>
                        Online
                    </td>
                    <td>
                        Darshan
                    </td>
                    <td>
                        <button class="btn btn-primary btn-sm">
                            Accepted Order
                        </button>
                    </td>
                    <td>
                        <select class="form-select form-select-sm" aria-label="form-select-sm example">
                            <option selected>change status</option>
                            <option value="1" data-bs-toggle="modal" data-bs-target="#shippingorder">Shipping Order</option>
                            <option value="2" data-bs-toggle="modal" data-bs-target="#cancelorder">Cancel Order</option>
                        </select>
                    </td>


                    <td>
                        <button class="btn btn-info btn-sm text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#orderDetail" aria-controls="orderDetail">
                            <i class="mdi mdi-file-eye-outline"></i> View
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<!-- Modal Shipping-->
<div class="modal fade" id="shippingorder" tabindex="-1" aria-labelledby="shippingorderLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="shippingorderLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="modal-body">
                        <input type="text" hidden value="{{order.order_id}}" name="orderID">
                        <div class="form-group">
                            <label>Docket Number </label>
                            <input type="text" class="form-control" placeholder="Docket Number" name="docketNumber">
                        </div>
                        <div class="form-group">
                            <label>Docket Company Name </label>
                            <input type="text" class="form-control" placeholder="Docket Number" name="companyName">
                        </div>

                        <div class="form-group">
                            <label>Accepted Delivery Date </label>
                            <input type="date" class="form-control" placeholder="" name="deliveryDate">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- cancel order -->
<div class="modal fade" id="cancelorder" tabindex="-1" aria-labelledby="cancelorderLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="cancelorderLabel">Cancel Order</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <input type="text" hidden value="" name="orderId">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Reason for cancellation </label>
                            <textarea class="form-control" rows="3" name="msg"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- View order detail -->
<?=view("AdminPanelNew/pages/component/order-detail")?>