<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>

    <meta charset="utf-8" />
    <title>Sign In | EduGenesis </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico">
    <!-- Layout config Js -->
    <script src="/assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="/assets/css/custom.min.css" rel="stylesheet" type="text/css" />

</head>

<style>

.auth-one-bg .bg-overlay {
    background: linear-gradient(to right,rgb(42 59 114),rgb(170, 51, 148)) !important;
}

#logo {
    color: #ffffff;
    font-size: 40px;
    font-weight: 500;
    font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}

</style>

<body>

    <div class="auth-page-wrapper pt-5">
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index.html" class="d-inline-block auth-logo">
                                    <h3 id="logo">EduGenesis</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4 card-bg-fill">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p class="text-muted">Sign in to continue to EduGenesis</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form id="loginForm">
										<p class="text-center" id="loginMsg"></p>
                                        <div class="mb-3">
                                            <label for="un" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="un" name="un" placeholder="Enter username">
                                        </div>

                                        <div class="mb-3">
                                            <div class="float-end">
                                                <a href="/Login/passReset" class="text-muted">Forgot password?</a>
                                            </div>
                                            <label class="form-label" for="pw">Password</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" class="form-control pe-5 password-input" placeholder="Enter password" id="pw" name="pw">
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                            </div>
                                        </div>

                                       <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                            <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-primary w-100" type="submit">Sign In</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 text-center">
                            <p class="mb-0">Don't have an account ? <a href="/Login/signup" class="fw-semibold text-primary text-decoration-underline"> Signup </a> </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">
                                <strong>Copyright</strong> Melani Prabodhika © <script>
									document.write(new Date().getFullYear())
								</script> 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- JAVASCRIPT -->
    <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="/assets/libs/node-waves/waves.min.js"></script>
    <script src="/assets/libs/feather-icons/feather.min.js"></script>
    <script src="/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="/assets/js/plugins.js"></script>

    <!-- particles js -->
    <script src="/assets/libs/particles.js/particles.js"></script>
    <!-- particles app js -->
    <script src="/assets/js/pages/particles.app.js"></script>
    <!-- password-addon init -->
    <script src="/assets/js/pages/password-addon.init.js"></script>
	
	<script>
        const loginForm = document.getElementById('loginForm');
        loginForm.addEventListener('submit', (e) => {
            e.preventDefault();

            const formData = new FormData();
            const un = document.getElementById('un').value;
            const pw = document.getElementById('pw').value;
            const loginMsg = document.getElementById('loginMsg');

            formData.append('un', un);
            formData.append('pw', pw);

            fetch('/Login/login_user', {
                    method: 'POST',
                    body: formData
                })
                .then((res) => res.json())
                .then((re) => {
                    if (re == 0) {
                        loginForm.reset();
						loginMsg.style.cssText = 'color: #e83200; font-size: 12px; font-weight: 500;';
                        loginMsg.innerHTML = 'Invalid Username or Password !'
                    } else {
						loginMsg.style.cssText = 'color: rgb(32 165 151); font-size: 12px; font-weight: 500;';
                        loginMsg.innerHTML = 'Login Success !';
                        window.location.href = '/';
                    }
                })
        })

        const toggleIcon = document.getElementById('togglePassword');
        toggleIcon.addEventListener('click', () => togglePasswordVisibility())

        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('pw');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
	
</body>

</html>