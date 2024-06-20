
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="card shadow mb-4 pb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Product List</h6>
                </div>
                <div class="card-body">
                    <table id="mytable" class="table table-responsive-xl table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">{{forloop.counter}}</th>
                                <td>
                                   {{product.productName}} 
                                </td>
                                <td>
                                    {{product.qty}}
                                </td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#AddStock{{product.product_title}}">
                                        <i class="fa fa-plus-square"></i> Add Stock
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="AddStock{{product.product_title}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product Quantity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <input type="text" name="product_title" hidden value="{{product.product_title}}">
                    <div class="form-group col-md-12">
                        <label for="txt_pattern">Qty<span class="text-danger">*</span></label>
                        <input type="number" name="qty" autocomplete="off" min="1"  name="txt_qty" class="form-control" id="txt_qty" required>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
  </div>
