<!-- JAVASCRIPT -->
<script src="<?= base_url($_assets_path . 'assets/libs/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url($_assets_path . 'assets/libs/toastr/toastr.min.js') ?>"></script>
<script src="<?= base_url($_assets_path . 'assets/libs/metismenu/metisMenu.min.js') ?>"></script>
<script src="<?= base_url($_assets_path . 'assets/libs/simplebar/simplebar.min.js') ?>"></script>
<script src="<?= base_url($_assets_path . 'assets/libs/node-waves/waves.min.js') ?>"></script>
<script src="<?= base_url($_assets_path . 'assets/libs/jquery-sparkline/jquery.sparkline.min.js') ?>"></script>
<!-- apexcharts -->
<script src="<?= base_url($_assets_path . 'assets/libs/apexcharts/apexcharts.min.js') ?>"></script>
<!-- jquery.vectormap map -->
<script src="<?= base_url($_assets_path . 'assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
<script src="<?= base_url($_assets_path . 'assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') ?>"></script>
<!-- <script src="<#?= base_url($_assets_path . 'assets/js/pages/dashboard.init.js') ?>"></script> -->
<!-- parsley plugin -->
<script src="<?= base_url($_assets_path . 'assets/libs/parsleyjs/parsley.min.js') ?>"></script>
<!-- validation init -->
<script src="<?= base_url($_assets_path . 'assets/js/pages/form-validation.init.js') ?>"></script>
<!-- Text Editor -->
<!--tinymce js-->
<script src="<?= base_url($_assets_path . 'assets/libs/tinymce/tinymce.min.js') ?>"></script>
<!-- init js -->
<script src="<?= base_url($_assets_path . 'assets/js/pages/form-editor.init.js') ?>"></script>
<!-- end -->
<!-- Multiple uploads images drag and drop -->
<script src="<?= base_url($_assets_path . 'assets/libs/dropzone/min/dropzone.min.js') ?>"></script>
<!-- end -->

<!-- Required datatable js -->
<script src="<?= base_url($_assets_path . 'assets/libs/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url($_assets_path . 'assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<!-- Buttons examples -->
<script src="<?= base_url($_assets_path . 'assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') ?>">
</script>
<script src="<?= base_url($_assets_path . 'assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') ?>">
</script>
<script src="<?= base_url($_assets_path . 'assets/libs/jszip/jszip.min.js') ?>"></script>
<script src="<?= base_url($_assets_path . 'assets/libs/pdfmake/build/pdfmake.min.js') ?>"></script>
<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.10/pdfmake.min.js' integrity='sha512-w61kvDEdEhJPJLSAJpuL+RWp1+zTBUUpgPaP+6pcqCk78wQkOaExjnGWrVbovojeisWGQS7XZKz+gr3L+GPYLg==' crossorigin='anonymous'></script> -->
<!-- <script src="<#?= base_url($_assets_path . 'assets/libs/pdfmake/build/vfs_fonts.js') ?>"></script> -->

<script src="<?= base_url($_assets_path . 'assets/libs/datatables.net-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url($_assets_path . 'assets/libs/datatables.net-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?= base_url($_assets_path . 'assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') ?>"></script>
<!-- Responsive examples -->
<script src="<?= base_url($_assets_path . 'assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') ?>">
</script>
<script src="<?= base_url($_assets_path . 'assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') ?>">
</script>

<!-- Datatable init js -->
<script src="<?= base_url($_assets_path . 'assets/js/pages/datatables.init.js') ?>"></script>
<script src="<?= base_url($_assets_path . 'assets/js/app.js') ?>"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js' integrity='sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ==' crossorigin='anonymous'></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Firebase Messaging Notification -->
<script src="<?= base_url('firebase-app.js') ?>"></script>
<script type="module" src="https://www.gstatic.com/firebasejs/8.2.2/firebase-app.js"></script>
<script type="module" src="https://www.gstatic.com/firebasejs/8.2.2/firebase-messaging.js"></script>
<script>
    function uploadImage(file_input_id, for_param, input_field_for_image, img_div_id) {
        // Get the file input element
        var fileInput = document.getElementById(file_input_id);

        // Check if a file was selected
        if (fileInput.files.length > 0) {
            var file = fileInput.files[0];
            var formData = new FormData();

            // Append the file and other parameters to FormData
            formData.append('file', file);
            formData.append('for', for_param);

            // Make AJAX request
            $.ajax({
                url: '<?= base_url(route_to('file_upload_image_api')) ?>', // Replace with your API endpoint URL
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Upon success, update the input field and image display
                    if (response.status == 200) {
                        toastr.success(response.message);
                        response = JSON.parse(response.data);
                        $('#' + input_field_for_image).val(response.image_path); // Assuming your API returns image_url
                        $('#' + img_div_id).attr('src', response.image_path_url);
                    }else{
                        toastr.error(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    console.error('Error uploading image:', error);
                    alert('Error uploading image. Please try again.');
                }
            });
        } else {
            alert('Please select a file to upload.');
        }
    }
    if ("serviceWorker" in navigator) {
        navigator.serviceWorker
            .register("/firebase-messaging-sw.js")
            .then(function(registration) {})
            .catch(function(error) {
                console.error("Service worker registration failed:", error);
            });
    } else {
        console.warn("Service workers are not supported in this browser.");
    }
</script>