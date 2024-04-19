<?php
    @$assets_url = base_url('PerfectJobConsultancy/Syntra/assets/');
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<script src="<?= base_url('libaries/tabulator/js/jspdf.umd.min.js') ?>"></script>
<script src="<?= base_url('libaries/tabulator/js/jspdf.plugin.autotable.min.js') ?>"></script>
<script src="<?= base_url('libaries/tabulator/js/xlsx.full.min.js') ?>"></script>
<script src="<?= base_url('libaries/tabulator/js/tabulator.min.js') ?>"></script>
<!-- Popper.js -->
<script src="<?= @$assets_url ?>/js/popper.min.js"></script>
<!-- Bootstrap -->
<!-- <script src="<#?= @$assets_url ?>/js/bootstrap.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- jQuery Migrate -->
<script src="<?= @$assets_url ?>/js/jquery-migrate.js"></script>
<!-- Modernizr -->
<script src="<?= @$assets_url ?>/js/modernizr.min.js"></script>
<!-- Slimscroll -->
<script src="<?= @$assets_url ?>/js/jquery.slimscroll.min.js"></script>
<!-- Slidebars -->
<script src="<?= @$assets_url ?>/js/slidebars.min.js"></script>

<!-- Other plugins -->
<script src="<?= @$assets_url ?>/plugins/counter/jquery.counterup.min.js"></script>
<script src="<?= @$assets_url ?>/plugins/waypoints/jquery.waypoints.min.js"></script>
<script src="<?= @$assets_url ?>/plugins/sparkline-chart/jquery.sparkline.min.js"></script>
<script src="<?= @$assets_url ?>/pages/jquery.sparkline.init.js"></script>
<script src="<?= @$assets_url ?>/plugins/chart-js/Chart.bundle.js"></script>
<script src="<?= @$assets_url ?>/plugins/morris-chart/raphael-min.js"></script>
<script src="<?= @$assets_url ?>/plugins/morris-chart/morris.js"></script>

<!-- Your custom scripts -->
<script src="<?= @$assets_url ?>/js/jquery.app.js"></script>
<script src="<?= base_url('libaries/selectize/selectize.min.js') ?>"></script>
<script src="<?= base_url('libaries/toastr/toastr.min.js') ?>"></script>
<script src="<?= base_url('libaries/sweetalert2/sweetalert2.js') ?>"></script>
<script src="<?= base_url('libaries/datatables/dataTables.min.js') ?>"></script>
<script src="<?= base_url('libaries/datatables/dataTables.bootstrap4.min.js') ?>"></script>



<script src="<?= base_url('assets/js/comman.js') ?>"></script>

<script>
    var base_url = "<?= base_url() ?>";
    $(document).ready(function($) {
        $('.body-center-content').css('display', 'block');
        <?=@$script_in_document_ready?>
    });
</script>
<?php if(is_array($script_file_links)){
    foreach ($script_file_links as $key => $link) {
        echo "<script src='".base_url($link)."'></script>";
    }
} ?>