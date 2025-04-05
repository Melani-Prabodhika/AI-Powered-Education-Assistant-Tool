<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>

    <meta charset="utf-8" />
    <title>Sign Up | EduGenesis</title>
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
    <link href="/assetscss/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="/assets/css/custom.min.css" rel="stylesheet" type="text/css" />
	 <!-- jquery library -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

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

.gy-4 {
  --vz-gutter-y: 1rem;
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
                                <a href="/" class="d-inline-block auth-logo">
									<h3 id="logo">EduGenesis</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-10 col-xl-10">
                        <div class="card mt-4 card-bg-fill">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Create New Account</h5>
                                    <p class="text-muted">Get your free EduGenesis account now</p>
                                </div>

                                <div class="p-2 mt-4">
                                    <form class="needs-validation" novalidate id="signup_frm">
                                        <div class="row gy-4">

                                            <div class="col-xxl-6 col-md-6">
                                                <label for="user_name" class="form-label">Your Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Enter your name" required>
                                                <div class="invalid-feedback">
                                                    Please enter your name
                                                </div>
                                            </div>
                                            
                                            <div class="col-xxl-6 col-md-6">
                                                <label for="user_email" class="form-label">Email <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" name="user_email" id="user_email" placeholder="Enter email address" required>
                                                <div class="invalid-feedback">
                                                    Please enter your email
                                                </div>
                                            </div>

                                            <div class="col-xxl-6 col-md-6">
                                                <label for="school" class="form-label">School Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="school" id="school" placeholder="Enter your school name" required>
                                                <div class="invalid-feedback">
                                                    Please enter your school name
                                                </div>
                                            </div>

                                            <div class="col-xxl-6 col-md-6">
                                                <label for="subject" class="form-label">Subject <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter your subject" required>
                                                <div class="invalid-feedback">
                                                    Please enter your subject
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3 col-xxl-6 col-md-6">
                                                <label class="form-label" for="password-input">Password <span class="text-danger">*</span></label>
                                                <div class="position-relative auth-pass-inputgroup">
                                                    <input type="password" class="form-control pe-5 password-input" onpaste="return false" placeholder="Enter password" name="password-input" id="password-input" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                    <div class="invalid-feedback">
                                                        Please enter a valid password
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-xxl-6 col-md-6">
                                                <label class="form-label" for="cpassword">Confirm Password <span class="text-danger">*</span></label>
                                                <div class="position-relative auth-pass-inputgroup">
                                                    <input type="password" class="form-control pe-5 password-input" onpaste="return false" placeholder="Enter password" name="cpassword" id="cpassword" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                    <div class="invalid-feedback" id="cpassword-error">
                                                        Please enter password correctly
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                                            <h5 class="fs-13">Password must contain:</h5>
                                            <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
                                            <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)</p>
                                            <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter (A-Z)</p>
                                            <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-primary w-100" type="submit">Sign Up</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                        <div class="mt-4 text-center">
                            <p class="mb-0">Already have an account ? <a href="http://project.local.com" class="fw-semibold text-primary text-decoration-underline"> Signin </a> </p>
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
    <!-- validation init -->
    <script src="/assets/js/pages/form-validation.init.js"></script>
    <!-- password create init -->
    <script src="/assets/js/pages/passowrd-create.init.js"></script>
	 <!-- jquery library -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

	<!-- custom js -->
	<script src="/assets/custom/js/jquery.form.min.js?up=<?= $this->version_update ?>"></script>
	<script src="/assets/custom/js/submit.js?up=<?= $this->version_update ?>"></script>
	<script src="/assets/custom/js/custom.js?up=<?= $this->version_update ?>"></script>
	<script src="/assets/custom/js/toastify.js?up=<?= $this->version_update ?>"></script>
	
	<script>
	
	document.addEventListener("DOMContentLoaded", function () {
		const passwordInput = document.getElementById("password-input");
		const cpasswordInput = document.getElementById("cpassword");
		const cpasswordError = document.getElementById("cpassword-error");

		function validatePasswordMatch() {
			if (passwordInput.value !== cpasswordInput.value) {
				cpasswordInput.classList.add("is-invalid");
				cpasswordError.style.display = "block";
			} else {
				cpasswordInput.classList.remove("is-invalid");
				cpasswordError.style.display = "none";
			}
		}

		cpasswordInput.addEventListener("input", validatePasswordMatch);
		cpasswordInput.addEventListener("blur", validatePasswordMatch);
	});
	
	$(document).ready(function() {
		$('#signup_frm').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '/Login/register',
                data: $(this).serialize(),
                success: function(response) {
                    if (response !== "") {
                        window.location.href = "/Login/success_msg";
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });

		
		$(document).on('keypress','.numonly', function(eve){
			if ((eve.which < 48 || eve.which > 57) || (eve.which == 46 && $(this).caret().start == 0)) {
				eve.preventDefault();
			}
		});
	});
	
	</script>
	
</body>

</html>