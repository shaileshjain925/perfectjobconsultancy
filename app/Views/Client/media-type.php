<?= $this->include('partials/main') ?>

<head>

    <?= $title_meta ?>

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
                <div class="offcanvas offcanvas-end" tabindex="-1" id="AddVendor" aria-labelledby="AddVendorLabel">
                    <div class="offcanvas-header">
                        <h5 id="AddVendorLabel">Add Media Type</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <form class="custom-validation" action="#">
                            <div class="mb-3">
                                <label class="form-label">Media Type Id </label>
                                <input type="text" class="form-control" required placeholder="" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-capitalize">Media Type name</label>
                                <div>
                                    <input type="text" id="" class="form-control" required placeholder="" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Media Type Description</label>
                                <div>
                                    <textarea required class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect">
                                    Cancel
                                </button>
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
                                    <h4>Media Type List</h4>
                                    <!-- Add Vendor btn -->
                                    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#AddVendor" aria-controls="AddVendor">Add Media Type</button>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-editable table-nowrap align-middle table-edits">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Media Name</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr data-id="1">
                                                <td style="width: 80px">1</td>
                                                <td data-field="name">David McHenry</td>
                                                <td data-field="description">24</td>
                                                <td>
                                                    <a class="btn btn-sm btn-info edit" title="Edit">
                                                        <i class="bx bx-edit-alt"></i>
                                                    </a>
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


<!-- Table Editable plugin -->
<script src="assets/libs/table-edits/build/table-edits.min.js"></script>

<script src="assets/js/pages/table-editable.int.js"></script>

<!-- parsley plugin -->
<script src="assets/libs/parsleyjs/parsley.min.js"></script>

<!-- validation init -->
<script src="assets/js/pages/form-validation.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>