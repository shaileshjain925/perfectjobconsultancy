
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="card shadow mb-4 pb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Deliverd Orders List</h6>
                </div>
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
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>{{forloop.counter}}</td>
                                    <td>{{order.order_id.order_id}}</td>
                                    <td>{{order.order_id.order_date}}</td>
                                    <td>{{order.order_id.total_amount}} </td>
                                    <td>{{order.docketNumber}}</td>
                                    <td>{{order.delivered_date}}</td>
                                    <td></td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
