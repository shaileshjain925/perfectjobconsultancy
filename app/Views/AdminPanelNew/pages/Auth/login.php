<!doctype html>
<html lang="<?php
            $session = \Config\Services::session();
            $lang = $session->get('lang');
            echo $lang;
            ?>">

<head>

    <title>Login</title>

    <!-- Bootstrap Css -->
    <link href="AdminPanelNew/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="AdminPanelNew/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="AdminPanelNew/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <!-- custom  css-->
    <link href="AdminPanelNew/assets/css/custom.css" id="app-style" rel="stylesheet" type="text/css" />
    <script src="AdminPanelNew/assets/libs/jquery/jquery.min.js"></script>
    <link href="AdminPanelNew/assets/libs/toastr/toastr.min.css" rel="stylesheet" type="text/css" />
    <script src="AdminPanelNew/assets/libs/toastr/toastr.min.js"></script>
    <script src="AdminPanelNew/assets/js/comman.js"></script>
    <style>
        .error-message {
            color: red;
        }

        .error-message-box {
            background-color: #ff1c1c47;
            padding: 12px 0px 1px 0px;
            color: #851616;
            text-align: center;
            border: none;
            font-size: 16px;
            font-weight: 600;
            font-variant: all-small-caps;
            box-shadow: 0px -2px 5px #98bf98 inset;
        }

        .success-message-box {
            background-color: #c0edc0;
            padding: 12px 0px 1px 0px;
            color: #16852a;
            text-align: center;
            border: none;
            /* border-bottom: 2px solid green; */
            font-size: 16px;
            /* opacity: 0.4; */
            /* margin-top: 10px; */
            font-weight: 600;
            font-variant: all-small-caps;
            box-shadow: 0px -2px 5px #98bf98 inset;
        }
    </style>

</head>

<body>
    <div class="home-btn d-none d-sm-block">
        <a href="/" class="text-reset"><i class="fas fa-home h2"></i></a>
    </div>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-login text-center">
                            <div class="bg-login-overlay"></div>
                            <div class="position-relative">
                                <h5 class="text-white font-size-20">Welcome Back !</h5>
                                <p class="text-white-50 mb-0">Sign in to continue to Qovex.</p>
                                <a href="/" class="logo logo-admin mt-4">
                                    <img src="AdminPanelNew/assets/images/logo-sm-dark.png" alt="logo-sm-dark" height="30">
                                </a>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                            <div class="p-2">
                                <div class="error-message-box d-none">
                                    <p id="error-message"></p>
                                </div>
                                <div class="success-message-box d-none">
                                    <p id="success-message"></p>
                                </div>
                                <form id="form" name="form" class="form-horizontal" action="<?= base_url(route_to('userLoginApi')) ?>" enctype="multipart/form-data" method="post">
                                    <div class="mb-3">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" value="<?= @$username ?>">
                                        <span class="error-message" id="error-username"></span>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                                        <span class="error-message" id="error-password"></span>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customControlInline" name="rememberme" <?= (isset($rememberme) && $rememberme == true) ? "checked" : "" ?>>
                                        <label class="form-check-label" for="customControlInline">Remember Me</label>
                                    </div>

                                    <div class="mt-3">
                                        <button class="btn btn-primary w-100 waves-effect waves-light" type="button" onclick="submitFormWithAjax('form',true,true,successCallback,errorCallback)">Log
                                            In</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <a  href="<?= base_url(route_to('forget_Password')) ?>" class="text-muted"><i class="mdi mdi-lock me-1"></i>
                                            Forgot your password?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <!-- JAVASCRIPT -->
    <script src="AdminPanelNew/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="AdminPanelNew/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="AdminPanelNew/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="AdminPanelNew/assets/libs/node-waves/waves.min.js"></script>
    <script src="AdminPanelNew/assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

    <script src="AdminPanelNew/assets/js/app.js"></script>
    <script>
        function successCallback(response) {
            if (response.status === 200) {
                window.location.href = '<?= base_url(route_to('default_dashboard')) ?>';
            }
        }

        function errorCallback(response) {

        }
    </script>

</body>

</html>