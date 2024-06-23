<div class="card">
    <div class="card-header">
        <h4>
            Order List
        </h4>
    </div>
    <div class="card-body">
        <table id="dataTable" class="table table-responsive table-hover table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Order ID</th>
                    <th>Ordered Date</th>
                    <th>Price</th>
                    <th>Payment Mode</th>
                    <th>Customer Name</th>
                    <th>Total Items</th>
                    <th>Current Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        01
                    </td>
                    <td>
                        ORDHansa001
                    </td>

                    <td>
                        05/june/2024
                    </td>
                    <td> 3000/-Rs</td>
                    <td>
                        <label class="btn btn-sm btn-success">Online</label>
                    </td>
                    <td>
                        Darshan Kulshreshtha <br>
                        Mobile number
                    </td>
                    <td>3</td>
                    <td>
                        <button class="btn btn-warning btn-sm">
                            Pending
                        </button>
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

<!-- View order detail -->
<?=view("AdminPanelNew/pages/component/order-detail")?>