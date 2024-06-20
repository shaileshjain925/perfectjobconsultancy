<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .login_section {
            background: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login_form {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .forget_password_form,
        .forget_password_verification_form {
            display: none;
            /* Hide forget password forms by default */
        }

        .login_button {
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .login_button:hover {
            background: #0056b3;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="<?= base_url('js/comman.js')  ?>"></script>
</head>

<body>

    <section class="login_section">
        <div class="container">
            <div class="row ">
                <div class="col-md-4">
                    <div class="card login_form">
                        <div class="card-body">
                            <form id="loginForm" action="<?= base_url(route_to('userLoginApi')) ?>" method="post">
                                <h4 class="mb-4">Log In To Your Account</h4>
                                <hr>
                                <div class="login_input mb-3">
                                    <label for="email">Email / Mobile</label>
                                    <input type="test" id="username" name="username" class="form-control" placeholder="Enter Email / Mobile Number" value="<?= isset($_COOKIE['remember_me']) ? $_COOKIE['remember_me'] : '' ?>">
                                </div>
                                <div class="login_input mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password">
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember_me" <?= isset($_COOKIE['remember_me']) ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="rememberMe">Remember Me</label>
                                    </div>
                                    <a href="#" class="fw-bold forget_password_link">Forget Password</a>
                                </div>
                                <button type="button" class="login_button btn btn-primary btn-block" onclick="submitFormWithAjax('loginForm',true,true,loginformSuccess,loginformError)">Login</button>
                            </form>
                        </div>
                    </div>
                    <!-- <div class="card forget_password_form">
                        <div class="card-body">
                            <form id="forgetPasswordForm" action="<#?= base_url(route_to('userForgetPasswordApi')) ?>" method="post">
                                <h4 class="mb-4">Forget Password</h4>
                                <div class="login_input mb-3">
                                    <label for="forgetEmail">Email</label>
                                    <input type="email" id="forgetEmail" name="forgetEmail" class="form-control" placeholder="Enter Email">
                                </div>
                                <button class="login_button btn btn-primary btn-block">Submit</button>
                                <a href="#" class="fw-bold login_link">Login</a>
                            </form>
                        </div>
                    </div> -->
                    <!-- <div class="card forget_password_verification_form">
                        <div class="card-body">
                            <form id="forgetPasswordVerificationForm" action="<#?= base_url(route_to('userForgetPasswordVerificationApi')) ?>" method="post">
                                <h4 class="mb-4">Verify OTP</h4>
                                <div class="login_input mb-3">
                                    <label for="otp">OTP</label>
                                    <input type="number" id="otp" name="otp" class="form-control" placeholder="Enter OTP">
                                </div>
                                <button class="login_button btn btn-primary btn-block">Submit</button>
                                <a href="#" class="fw-bold login_link">Login</a>
                            </form>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function setRememberMeCookies() {
            var rememberMeCheckbox = $("#remember_me");
            if (rememberMeCheckbox.prop("checked")) {
                // Set a cookie for remembering the user
                setCookie('remember_me', $('#username').val(), 30); // Cookie expires in 30 days
            } else {
                deleteCookie('remember_me');
            }
        }

        function loginformSuccess(response) {
            setRememberMeCookies()
            // Check if cookie with key 'redirect_url_key' exists
            var redirectUrl = getCookie('redirect_url');
            setTimeout(function() {
                // If the cookie exists and is not empty, redirect to its value
                if (redirectUrl) {
                    deleteCookie('redirect_url');
                    window.location.href = redirectUrl;
                } else {
                    // If the cookie doesn't exist or is empty, redirect to the base URL
                    window.location.href = '<?= base_url() ?>';
                }
            }, 3000); // 3000 milliseconds = 3 seconds
        }

        function loginformError(response) {
            setRememberMeCookies()
        }
    </script>
</body>

</html>