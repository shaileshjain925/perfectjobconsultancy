<?= $this->include('partials/main') ?>

<head>

    <?= $title_meta ?>
    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <?= $this->include('partials/head-css') ?>

</head>

<?= $this->include('partials/body') ?>

<div class="container-fluid">
    <!-- Begin page -->
    <div id="layout-wrapper">

        <?= $this->include('partials/menu') ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">

                <?= $page_title ?>

                <!-- Add Vendor form -->
                <div class="offcanvas offcanvas-end vendor-offcanvas" tabindex="-1" id="AddVendor" aria-labelledby="AddVendorLabel">
                    <div class="offcanvas-header">
                        <h5 id="AddVendorLabel">Add Leave</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <form class="custom-validation" action="#">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Vendo Id </label>
                                    <input type="text" class="form-control" required placeholder="" />
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label text-capitalize">vendor name</label>
                                    <div>
                                        <input type="text" id="" class="form-control" required placeholder="" />
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-capitalize">vendor GSTN</label>
                                <div>
                                    <input type="email" class="form-control" required placeholder="" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label text-capitalize">vendor bank name</label>
                                    <div>
                                        <input parsley-type="bank" type="url" class="form-control" required placeholder="" />
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label text-capitalize">Bank IFSC code</label>
                                    <div>
                                        <input type="text" class="form-control" required placeholder="" />
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-capitalize">bank account Number</label>
                                <div>
                                    <input data-parsley-type="number" type="text" class="form-control" required placeholder="" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">PAN Card</label>
                                <div>
                                    <input type="text" class="form-control" required placeholder="" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Contact Number</label>
                                    <div>
                                        <input data-parsley-type="phone" type="text" class="form-control" required placeholder="" />
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Email id</label>
                                    <div>
                                        <input data-parsley-type="email" type="email" class="form-control" required placeholder="" />
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Vendor DOB</label>
                                    <div>
                                        <input data-parsley-type="date" type="date" class="form-control" required placeholder="" />
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label text-capitalize">Vendor anniversary</label>
                                    <div>
                                        <input data-parsley-type="date" type="date" class="form-control" required placeholder="" />
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label text-capitalize">Vendor firm anniversary</label>
                                    <div>
                                        <input data-parsley-type="date" type="date" class="form-control" required placeholder="" />
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-secondary waves-effect">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End from -->
                <!-- Vendors list -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header mb-4  d-flex justify-content-between align-items-center">
                                    <h4>Vensor List</h4>
                                    <!-- Add Vendor btn -->
                                    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#AddVendor" aria-controls="AddVendor">Add Vendor</button>
                                </div>
                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                            <td>
                                                <button class="btn btn-sm btn-info">
                                                    <i class="bx bx-edit-alt"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="bx bx-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

            </div>
            <!-- End Page-content -->

            <?= $this->include('partials/footer') ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

</div>
<!-- end container-fluid -->

<?= $this->include('partials/right-sidebar') ?>

<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts') ?>

<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="assets/js/pages/datatables.init.js"></script>

<!-- parsley plugin -->
<script src="assets/libs/parsleyjs/parsley.min.js"></script>

<!-- validation init -->
<script src="assets/js/pages/form-validation.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>