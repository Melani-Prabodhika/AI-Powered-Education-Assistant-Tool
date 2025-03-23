<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/auth-signup-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Aug 2024 07:46:58 GMT -->
<head>

    <meta charset="utf-8" />
    <title>Sign Up | Velzon - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/velzon/images/favicon.ico">

    <!-- Layout config Js -->
    <script src="http://localhost/project/assets/velzon/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="http://localhost/project/assets/velzon/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="http://localhost/project/assets/velzon/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="http://localhost/project/assets/velzon/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="http://localhost/project/assets/velzon/css/custom.min.css" rel="stylesheet" type="text/css" />

</head>

<style>

.auth-one-bg .bg-overlay {
    background: linear-gradient(to right, #194550, #6b275f) !important;
}

.btn-primary {
    --vz-btn-bg: #643b72;
    --vz-btn-border-color: #643b72;
    --vz-btn-hover-bg: #643b72;
    --vz-btn-hover-border-color: #643b72;
    --vz-btn-focus-shadow-rgb: #643b72;
    --vz-btn-active-bg: #643b72;
    --vz-btn-active-border-color: #643b72;
    --vz-btn-disabled-bg: #643b72;
    --vz-btn-disabled-border-color: #643b72;
}

.btn-primary:hover, .btn-primary.active,  .btn-primary:first-child:active, .btn-primary:active {
    background-color: #573164 !important;
    border-color: #573164 !important;
}

.text-primary {
    color: #643b72 !important;
}

.text-primary:hover {
    color: #573164 !important;
}

.form-title {
	margin: 0;
	font-size: 14px;
	font-weight: 600;
	color: #643b72;
}

.gy-4 {
  --vz-gutter-y: 1rem;
}

</style>

<body>

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="/" class="d-inline-block auth-logo">
                                    <img src="/assets/images/logo-light.png" alt="" height="20">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium">Sign Up & Start Growing Today!</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-10 col-xl-10">
                        <div class="card mt-4 card-bg-fill">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Create New Account</h5>
                                    <p class="text-muted">Get your free velzon account now</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form class="needs-validation" novalidate id="signup_frm">
										<div class="row gy-4">
											<p class="form-title" style="margin-top: 25px;">Customer Details</p>
											
											<div class="col-xxl-6 col-md-6">
												<label for="admin" class="form-label">Your Name <span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="admin" id="admin" placeholder="Enter your name" required>
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
												<label for="user_phone" class="form-label">Contact No <span class="text-danger">*</span></label>
												<input type="text" class="form-control numonly" name="user_phone" id="user_phone" placeholder="Enter contact number" required>
												<div class="invalid-feedback">
													Please enter contact number
												</div>
											</div>
											
											<div class="col-xxl-6 col-md-6">
												<label for="user_address" class="form-label">Address <span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="user_address" id="user_address" placeholder="Enter address" required>
												<div class="invalid-feedback">
													Please enter address
												</div>
											</div>
											
											<div class="mb-3 col-xxl-6 col-md-6">
												<label class="form-label" for="password-input">Password</label>
												<div class="position-relative auth-pass-inputgroup">
													<input type="password" class="form-control pe-5 password-input" onpaste="return false" placeholder="Enter password" name="password-input" id="password-input" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
													<button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
													<div class="invalid-feedback">
														Please enter a valid password
													</div>
												</div>
											</div>
											
											<div class="col-xxl-6 col-md-6">
												<label class="form-label" for="cpassword">Confirm Password</label>
												<div class="position-relative auth-pass-inputgroup">
													<input type="password" class="form-control pe-5 password-input" onpaste="return false" placeholder="Enter password" name="cpassword" id="cpassword" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
													<button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
													<div class="invalid-feedback" id="cpassword-error">
														Please enter password correctly
													</div>
												</div>
											</div>
										
											<div class="col-xxl-12 col-md-6">
												<div class="invalid-feedback" id="g-msg" style="display: block; margin-top: 0px; color: rgba(10,179,156)">
													<span class="text-success">*</span> If you are a Genzo client, please enter your Genzo username and password below.
												</div>
											</div>
											
											<div class="col-xxl-6 col-md-6">
												<label for="g_uname" class="form-label">Genzo Username</label>
												<input type="text" class="form-control" name="g_uname" id="g_uname" placeholder="Enter genzo username">
											</div>
											
											<div class="mb-3 col-xxl-4 col-md-4">
												<label class="form-label" for="gpassword-input">Genzo Password</label>
												<div class="position-relative auth-pass-inputgroup">
													<input type="password" class="form-control pe-5 password-input" onpaste="return false" placeholder="Enter genzo password" name="gpassword-input" id="gpassword-input" aria-describedby="passwordInput" required>
													<button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
												</div>
											</div>
											
											<div class="mb-3 col-xxl-2 col-md-2" style="display: flex; justify-content: flex-end;">
												<button class="btn btn-success btn-sm w-100" id="btn-confirm" type="buttton" style="margin-top: 32px; width: 70px !important;">Confirm</button>
											</div>
											
											<div class="col-xxl-12 col-md-12" id="client-error">
												<div class="invalid-feedback">
													Please check your genzo username & password
												</div>
											</div>
											
											<p class="form-title" style="margin-top: 20px;">Company Details</p>
											
											<input type="text" class="form-control" name="com_id" id="com_id" hidden>
											
											<div class="col-xxl-6 col-md-6">
												<label for="com_name" class="form-label">Company Name <span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="com_name" id="com_name" placeholder="Enter company name" required>
												<div class="invalid-feedback">
													Please enter company name
												</div>
											</div>
											
											<div class="col-xxl-6 col-md-6">
												<label for="com_email" class="form-label">Email <span class="text-danger">*</span></label>
												<input type="email" class="form-control" name="com_email" id="com_email" placeholder="Enter email address" required>
												<div class="invalid-feedback">
													Please enter company email
												</div>
											</div>
											
											<div class="col-xxl-6 col-md-6">
												<label for="com_phone" class="form-label">Contact No <span class="text-danger">*</span></label>
												<input type="text" class="form-control numonly" name="com_phone" id="com_phone" placeholder="Enter contact number" required>
												<div class="invalid-feedback">
													Please enter company contact number
												</div>
											</div>
											
											<div class="col-xxl-6 col-md-6">
												<label for="com_address" class="form-label">Address <span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="com_address" id="com_address" placeholder="Enter company address" required>
												<div class="invalid-feedback">
													Please enter company address
												</div>
											</div>
											
										</div>

                                       <!-- <div class="mb-4">
                                            <p class="mb-0 fs-12 text-muted fst-italic">By registering you agree to the Velzon <a href="#" class="text-primary text-decoration-underline fst-normal fw-medium">Terms of Use</a></p>
                                        </div> -->

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

                                        <!--<div class="mt-4 text-center">
                                            <div class="signin-other-title">
                                                <h5 class="fs-13 mb-4 title text-muted">Create account with</h5>
                                            </div>

                                            <div>
                                                <button type="button" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-facebook-fill fs-16"></i></button>
                                                <button type="button" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-google-fill fs-16"></i></button>
                                                <button type="button" class="btn btn-dark btn-icon waves-effect waves-light"><i class="ri-github-fill fs-16"></i></button>
                                                <button type="button" class="btn btn-info btn-icon waves-effect waves-light"><i class="ri-twitter-fill fs-16"></i></button>
                                            </div>
                                        </div>-->
                                    </form>

                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="mt-4 text-center">
                            <p class="mb-0">Already have an account ? <a href="/" class="fw-semibold text-primary text-decoration-underline"> Signin </a> </p>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">
                                 <strong>Copyright</strong> Genzo IT © <script>
									document.write(new Date().getFullYear())
								</script> 
							</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="/assets/velzon/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/velzon/libs/simplebar/simplebar.min.js"></script>
    <script src="/assets/velzon/libs/node-waves/waves.min.js"></script>
    <script src="/assets/velzon/libs/feather-icons/feather.min.js"></script>
    <script src="/assets/velzon/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="/assets/velzon/js/plugins.js"></script>

    <!-- particles js -->
    <script src="/assets/velzon/libs/particles.js/particles.js"></script>
    <!-- particles app js -->
    <script src="/assets/velzon/js/pages/particles.app.js"></script>
    <!-- validation init -->
    <script src="/assets/velzon/js/pages/form-validation.init.js"></script>
    <!-- password create init -->
    <script src="/assets/velzon/js/pages/passowrd-create.init.js"></script>
	 <!-- jquery library -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
	
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
		$('#signup_frm').ajax_submit({
			url : '/Login/register',
			callback : function(response){
				if (response !== "") {
					window.location.href = "/Login/success_msg";
				}
			}
		});
		
		$(document).on('keypress','.numonly', function(eve){
			if ((eve.which < 48 || eve.which > 57) || (eve.which == 46 && $(this).caret().start == 0)) {
				eve.preventDefault();
			}
		});
		
		$('#btn-confirm').on('click',function(){
			const genun = $('#g_uname').val();
			const genpw = $('#gpassword-input').val();
			
			$.get({
				url: '/Api_calls/get_company?un='+genun+'&pw='+genpw,
				success: function(res) {
					var data = JSON.parse(res);
					
					if(data.status != "Invalid username or password") {
						document.getElementById("client-error").style.display = "none";
						
						$("#com_id").val(data.com_id);
						$("#com_name").val(data.com_name);
						$("#com_email").val(data.email);
						$("#com_phone").val(data.contact);
						$("#com_address").val(data.address);
					} else {
						// const clientError = document.getElementById("client-error");
						// clientError.style.display = "block";
						
						const clientError = document.getElementById("client-error");
						if (clientError) {
							clientError.style.display = "block";
						} else {
							console.error("Element #client-error not found in the DOM.");
						}

					}
					
				}
			});
			
		})
	});
	
	</script>
	
	<!-- custom js -->
	<script src="http://localhost/project/assets/custom/js/jquery.form.min.js?up=<?= $this->version_update ?>"></script>
	<script src="http://localhost/project/assets/custom/js/submit.js?up=<?= $this->version_update ?>"></script>
	<script src="http://localhost/project/assets/custom/js/custom.js?up=<?= $this->version_update ?>"></script>
	<script src="http://localhost/project/assets/custom/js/toastify.js?up=<?= $this->version_update ?>"></script>
	
</body>


<!-- Mirrored from themesbrand.com/velzon/html/master/auth-signup-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Aug 2024 07:46:59 GMT -->
</html>