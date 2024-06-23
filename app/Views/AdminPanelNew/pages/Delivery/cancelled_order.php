<div class="card">
    <div class="card-body">
        <table id="dataTable" class="table table-responsive table-hover table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Order ID</th>
                    <th>Cancel Message</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                       01
                    </td>
                    <td>
                        Order ID
                    </td>
                    <td>
                        Reason
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