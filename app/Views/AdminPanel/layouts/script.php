<!-- Custom Script Before Start Given By Controller -->
<script>
    <?= (isset($custom_footer_script_before) && !empty($custom_footer_script_before)) ? $custom_footer_script_before : '' ?>
</script>
<!-- Custom Script End -->

<!-- External JS Script Files (if needed) -->
<!-- bootstrap 5 js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="<?= base_url('AdminPanel/js/ajexQuery.js')  ?>"></script>
<script src="<?= base_url('AdminPanel/js/sb-admin-2.min.js')  ?>"></script>
<script src="<?= base_url('AdminPanel/js/dataTables.bootstrap4.min.js')  ?>"></script>
<script src="<?= base_url('AdminPanel/js/datatables-demo.js')  ?>"></script>
<script src="<?= base_url('AdminPanel/js/jquery.dataTables.min.js')  ?>"></script>
<script src="<?= base_url('AdminPanel/js/Chart.min.js')  ?>"></script>
<script src="<?= base_url('AdminPanel/js/chart-area-demo.js')  ?>"></script>
<script src="<?= base_url('AdminPanel/js/chart-bar-demo.js')  ?>"></script>
<script src="<?= base_url('js/comman.js')  ?>"></script>

<?php
if (isset($page_wise_js_files_path) && !empty($page_wise_js_files_path) && is_array($page_wise_js_files_path)) {
    foreach ($page_wise_js_files_path as $key => $js_file) {
        if (is_string($js_file)) {
            $filepath = base_url($js_file);
            echo '<script src="' . $filepath . '"></script>';
        }
    }
}
?>
<!-- Custom Script Files Page Loaded -->