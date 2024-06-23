<div class="card">
    <div class="card-body">
        <table id="dataTable" class="table table-responsive table-hover table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Order ID</th>
                    <th>Ordered Date</th>
                    <th>Price</th>
                    <th>Docket Number</th>
                    <th> Deliverd Date</th>
                    <th> Deliver to</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01</td>
                    <td>order Id</td>
                    <td>Ordered Date</td>
                    <td>5000rs /-</td>
                    <td>Docket Number</td>
                    <td>Deliverd Date</td>
                    <td>Deliver Customer Name </td>
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