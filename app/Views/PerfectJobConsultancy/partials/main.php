<?php
$assets_url = base_url('PerfectJobConsultancy/Syntra/assets');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    ?>
    <?= (isset($head_data)) ? view('Views/PerfectJobConsultancy/partials/head', $head_data) : view('Views/PerfectJobConsultancy/partials/head') ?>
</head>

<body class="sticky-header">
    <section>
        <?= (isset($leftsidebar_data)) ? view('Views/PerfectJobConsultancy/partials/leftsidebar', $leftsidebar_data) : view('Views/PerfectJobConsultancy/partials/leftsidebar') ?>
        <!-- body content start-->
        <div class="body-content">

            <?= (isset($header_data)) ? view('Views/PerfectJobConsultancy/partials/header', $header_data) : view('Views/PerfectJobConsultancy/partials/header') ?>
            <!--end container-->
            <div class="container-fluid">
                <div class="page-head">
                    <h4 class="mt-2 mb-2"><?= @$title ?></h4>
                </div>
                <div class="body-center-content" style="display: none;">
                    <?php
                    if (isset($view)) {
                        if (isset($view_data)) {
                            echo view($view, $view_data);
                        } else {
                            echo view($view);
                        }
                    } else {
                        echo $view_string;
                    }
                    ?>
                </div>
            </div>
            <!--end container-->
            <?= (isset($footer_data)) ? view('Views/PerfectJobConsultancy/partials/footer', $footer_data) : view('Views/PerfectJobConsultancy/partials/footer') ?>
            <?= (isset($rightsidebar_data)) ? view('Views/PerfectJobConsultancy/partials/rightsidebar', $rightsidebar_data) : view('Views/PerfectJobConsultancy/partials/rightsidebar') ?>

        </div>
        <!--end body content-->
    </section>
</body>
<?= (isset($after_body_content)) ? view('Views/PerfectJobConsultancy/partials/script', $after_body_content) : view('Views/PerfectJobConsultancy/partials/script') ?>

</html>