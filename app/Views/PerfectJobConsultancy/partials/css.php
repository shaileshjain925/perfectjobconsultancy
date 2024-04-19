<style>
    .custom-width-300px {
        width: 300px;
    }

    .custom-width-100px {
        width: 100px;
    }

    .custom-width-200px {
        width: 200px;
    }

    .error {
        color: red;
    }

    .selectize-dropdown {
        z-index: 100001 !important;
    }

    .selectize-dropdown .active:not(.selected) {
        color: blue !important;
        background: lightgrey !important;
    }

    .selectize-dropdown .selected {
        color: green !important;
        background-color: lightgrey !important;
    }
    .optgroup-header{
        font-weight: bold;
    }
    .error-message{
        color:red;
        margin-top:10px;
        margin-left:10px;
    }
</style>
<?php
@$assets_url = base_url('PerfectJobConsultancy/Syntra/assets');
?>
<link rel="shortcut icon" href="<?= @$assets_url ?>/images/favicon.ico">
<link rel="stylesheet" href="<?= @$assets_url ?>/plugins/morris-chart/morris.css">
<!-- <link rel="stylesheet" href="<#?= @$assets_url ?>/css/bootstrap.min.css"> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="<?= @$assets_url ?>/css/slidebars.min.css">
<link rel="stylesheet" href="<?= @$assets_url ?>/css/icons.css">
<link rel="stylesheet" href="<?= @$assets_url ?>/css/menu.css">
<link rel="stylesheet" href="<?= @$assets_url ?>/css/style.css">
<link rel="stylesheet" href="<?= base_url('libaries/selectize/selectize.css') ?>">
<link rel="stylesheet" href="<?= base_url('libaries/toastr/toastr.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('libaries/datatables/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('libaries/tabulator/css/tabulator_bootstrap4.min.css') ?>">
<!-- jQuery -->
<script src="<?= base_url('libaries/jquery/jquery-3.7.1.min.js') ?>"></script>
