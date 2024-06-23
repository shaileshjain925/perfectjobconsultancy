<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>
            Add Deal Of the Day
        </h4>

    </div>
    <div class="card-body">
        <!-- add filter  -->
        <form class="custom-validation row row-cols-auto align-items-end justify-content-between" action="#">
            <div class="mb-3">
                <label class="form-label"> Select Category </label>
                <select class="form-select" aria-label="Default select example">
                    <option selected="">Select Module</option>
                    <option>Super Admin</option>
                    <option>Inventory Admin</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label"> Select Category Type* </label>
                <div>
                    <select class="form-select" aria-label="Default select example">
                        <option selected="">Select Module</option>
                        <option>Super Admin</option>
                        <option>Inventory Admin</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label"> Select Fabric</label>
                <div>
                    <select class="form-select" aria-label="Default select example">
                        <option selected="">Select Module</option>
                        <option>Super Admin</option>
                        <option>Inventory Admin</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label"> Select Pattern</label>
                <div>
                    <select class="form-select" aria-label="Default select example">
                        <option selected="">Select Module</option>
                        <option>Super Admin</option>
                        <option>Inventory Admin</option>
                    </select>
                </div>
            </div>
            <div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                        Submit
                    </button>
                </div>
            </div>
        </form>
        <!-- end filter -->
        <hr/>
        <!-- add prodcut list view -->
        <h5>Add Product</h5>
        <div class="table-responsive">
            <table class="table table-striped table-bordered mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Selling Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Product Name</td>
                        <td>Price</td>
                        <td>
                            Selling Price
                        </td>
                        <td>
                            <button class="btn btn-info">
                                Add
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>