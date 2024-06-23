<style>
    <?= $_head_css_code ?>
</style>
<link href="<?= base_url($_assets_path . 'assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') ?>" rel="stylesheet" type="text/css" />
<!-- Bootstrap Css -->
<link href="<?= base_url($_assets_path . 'assets/css/bootstrap.min.css') ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- toastr -->
<link href="<?= base_url($_assets_path . 'assets/libs/toastr/toastr.min.css') ?>" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="<?= base_url($_assets_path . 'assets/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="<?= base_url($_assets_path . 'assets/css/app.min.css') ?>" id="app-style" rel="stylesheet" type="text/css" />
<!-- custom  css-->
<link href="<?= base_url($_assets_path . 'assets/css/custom.css') ?>" id="app-style" rel="stylesheet" type="text/css" />
<!-- image upload css -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.css' integrity='sha512-Y+AaVWdRf6zsGm7eV+EGOIuqYZoi2wUQ7wF8oHbnLy8k2zdVGSxyjn2qDUMFkLRy/9mqOAE5BeyEqx1yxDTQIw==' crossorigin='anonymous' />
<!-- Dynamic Css Load -->
<?php if (isset($_head_css_files) && is_array($_head_css_files)) : ?>
    <?php foreach ($_head_css_files as $key => $_head_css_file) : ?>
        <?php if (is_string($_head_css_file)) : ?>
            <link href="<?= base_url($_head_css_file) ?>" id="app-style" rel="stylesheet" type="text/css" />
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>

<link href="<?= base_url($_assets_path . 'assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url($_assets_path . 'assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="<?= base_url($_assets_path . 'assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />