<!DOCTYPE html>
<html lang="<?= (isset($html_language) && !empty($html_language)) ? $html_language : 'en' ?>">
<!-- Load Head File -->
<?= (isset($head) && !empty($head)) ? view('AdminPanel/layouts/head', $head) : view('AdminPanel/layouts/head') ?>
<!-- Head File Loaded -->

<body id="page-top">
    <div id="wrapper">
        <!-- Right Side Bar Start-->
        <?= (isset($rightsidebar) && !empty($rightsidebar)) ? view('AdminPanel/layouts/rightsidebar', $rightsidebar) : view('AdminPanel/layouts/rightsidebar') ?>
        <!-- Right Side Bar End-->

        <div id="content-wrapper" class="d-flex flex-column h-100">
            <div id="content">
                <!-- Topbar -->
                <!-- Nav Bar Start -->
                <?= (isset($navbar) && !empty($navbar)) ? view('AdminPanel/layouts/navbar', $navbar) : view('AdminPanel/layouts/navbar') ?>
                <!-- Nav Bar End -->
                <!-- End of Topbar -->

                <!-- Body Content-->
                <!-- Main Content Start-->
                <?= (isset($ViewFileData) && !empty($ViewFileData)) ? view($ViewFilePath, $ViewFileData) : view($ViewFilePath) ?>
                <!-- Main Content End-->
                <!-- End -->

                <!-- Footer Start-->
                <?= (isset($footer) && !empty($footer)) ? view('AdminPanel/layouts/footer', $footer) : view('AdminPanel/layouts/footer') ?>
                <!-- Footer End-->
            </div>
        </div>
    </div>
    <!-- Load Script File -->
    <?= (isset($script) && !empty($script)) ? view('AdminPanel/layouts/script', $script) : view('AdminPanel/layouts/script') ?>
    <!-- Script File Loaded -->
</body>

</html>