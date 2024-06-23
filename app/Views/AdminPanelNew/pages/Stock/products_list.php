<div class="card">
    <div class="card-body">
        <table id="mytable" class="table table-responsive-xl table-hover table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Variant Name</th>
                    <th>Current Stock</th>
                    <th>Vendor Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01</td>
                    <td>Variant id show</td>
                    <td>Prodcut name</td>
                    <td>Variant title show</td>
                    <td>
                        <label class="btn btn-sm btn-danger">05</label>
                    </td>
                    <td>Vendor name</td>
                    <td>
                        <a href="<?= base_url(route_to('update_stock', 1)) ?>" class="btn btn-warning btn-sm">
                            <i class="fa fa-plus-square"></i> Update Stock
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>01</td>
                    <td>Variant id show</td>
                    <td>Prodcut name</td>
                    <td>Variant title show</td>
                    <td>
                        <label class="btn btn-sm btn-success">25</label>
                    </td>
                    <td>Vendor name</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#AddStock{{product.product_title}}">
                            <i class="fa fa-plus-square"></i> Update Stock
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>