<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="HandheldFriendly" content="true">
    <meta name="MobileOptimized" content="width">

    <title><?= (isset($title) && !empty($title)) ? $title : 'Default Title' ?></title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="icon" href="<?= (isset($icon_path) && !empty($icon_path)) ? $icon_path : '' ?>" type="image/x-icon">
    <meta name="keywords" content="<?= (isset($meta_keywords) && !empty($meta_keywords)) ? $meta_keywords : 'Meta Keywords' ?>">
    <meta name="description" content="<?= (isset($meta_description) && !empty($meta_description)) ? $meta_description : 'Meta Description' ?>">
    <meta name="author" content="<?= (isset($meta_aurthor) && !empty($meta_aurthor)) ? $meta_aurthor : 'Meta Aurthor Name' ?>">

    <!-- External CSS -->
    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- link css -->
    <link href="<?= base_url('AdminPanel/css/sb-admin-2.css')  ?>" rel="stylesheet" />
    <link href="<?= base_url('AdminPanel/css/dataTables.bootstrap4.min.css')  ?>" rel="stylesheet" />

    

    <!-- font awsomeicon -->
    <script src="https://kit.fontawesome.com/a1beaf0f99.js" crossorigin="anonymous"></script>
    
    <!-- Custom Css Files Start Given By Controller -->
    <?php
    if (isset($page_wise_css_files_path) && !empty($page_wise_css_files_path) && is_array($page_wise_css_files_path)) {
        foreach ($page_wise_css_files_path as $key => $css_file) {
            if (is_string($css_file)) {
                $filepath = base_url($css_file);
                echo '<link rel="stylesheet" href="' . $filepath . '">';
            }
        }
    }
    ?>

    <!-- Custom Css Files Start Given By Controller -->

    <!-- External JS libraries (if needed) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>