<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <!-- Content Row -->
    <div class="card shadow mb-4 pb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Add District -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <a href="/stockAdmin/Products" class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Out of Stock</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{out_of_stock}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- /.container-fluid -->
                <!-- Add District -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <a href="/stockAdmin/InStockProducts" class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total In Stock Products</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{in_stock}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
    </div>
</div>
<!-- End of Content Wrapper -->
