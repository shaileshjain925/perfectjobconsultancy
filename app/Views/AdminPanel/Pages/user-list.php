<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="card shadow mb-4 pb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Customer Information</h6>
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-head-light table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Customer ID</th>
                                <th>Mobile No.</th>
                                <th>Orders </th>
                                <th>Payment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <th scope="row">{{forloop.counter}}</th>
                                    <td>
                                        {{user.full_name}}
                                    </td>
                                    <td>
                                        cus001
                                    </td>
                                    <td>
                                        {{user.mobile}}
                                    </td>
                                    <td>
                                       <a href="/User-History" class="btn btn-info btn-sm">
                                        Total Orders 20
                                       </a>
                                    </td>
                                    <td>
                                        <a href="/User-History" class="btn btn-success btn-sm">
                                         Total Payment 20000
                                        </a>
                                     </td>
                                    <td>
                                        <a href="#" class="btn btn-danger btn-sm btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-ban"></i>
                                            </span>
                                            <span class="text">Block</span>
                                        </a>
                                        <a href="#" class="btn btn-primary btn-sm btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                            <span class="text">History</span>
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
