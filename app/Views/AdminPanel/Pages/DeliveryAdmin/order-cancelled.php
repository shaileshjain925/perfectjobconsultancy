<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="card shadow mb-4 pb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Cancelled Orders List</h6>
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-responsive table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Order ID</th>
                                <th>Message</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>
                                        {{forloop.counter}}
                                    </td>
                                    <td>
                                        {{order.oderId.order_id}}
                                    </td>
                                    <td>
                                        {{order.msg}}
                                    </td>
                                    <td>
                                        <a class="btn btn-info text-white btn-sm">                                         View
                                        </a>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>