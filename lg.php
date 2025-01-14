<!doctype html>
	<html class="no-js" lang="">
	
<!-- Mirrored from superLudoBD.com/login.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Jul 2022 19:31:34 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
		<title> </title>
		<meta name="description" content=""/>
		<meta name="keywords" content=""/> 
		<meta name="robots" content=""/>
		<!-- Favicon -->
		<link rel="apple-touch-icon" sizes="57x57" href="images/favicon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="images/favicon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="images/favicon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="images/favicon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="images/favicon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="images/favicon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="images/favicon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="images/favicon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="images/favicon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicons.ico">
		<link rel="icon" type="image/png" sizes="96x96" href="images/favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
		<link rel="manifest" href="images/favicon/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="images/favicon/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
		<link rel="shortcut icon" href="images/favicon/favicon.ico" type="image/x-icon">
		<link rel="icon" href="images/favicon/favicon.ico" type="image/x-icon">

		<!-- Stylesheet -->
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/custom.css">
		<style type="text/css">
/*Add by vijay*/
			/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

		</style>
	</head>
	<body>

		<div class="main">
			<div class="side-bar login-page" style="background-image: url(images/login-bg.jpg);">
				<!-- Login -->

				<section class="login-area clearfix" >
					<div class="container-fluid px-4">

						<div class="login-block">
														
							<form id="login-form">
								<div class="section-title text-center">
									<h2 class="bold text-white">Login</h2>

								</div>
								<div class="form-group input-group mb-3">
									<span class="input-group-text bg-white" id="basic-addon1">+91</span>
									<input type="text" name="mobile" id="mobile" class="form-control ps-0" placeholder="Mobile Number">
								</div>
								<div class="alert alert-danger " id="snackbar" style="display:none;">

								</div>
								<div class="form-group mb-3">
									<button type="button" class="btn btn-1 w-100" id='request-password'>Login With Password</button>
								 
								</div>
								<div class="row">
	<div class="col-6  mb-3 text-right">
		<a href="javascript::" class="bold" id="request-otp" style="color:#ffeb5d;"> Login with otp </a>
		 
								</div>
								<div class="col-6 mb-3 text-left m">
		<a href="forgotpassword.html" class="bold text-white" id="request-otp">Forgot Password </a>
		 
								</div>
</div>
								<div class="resend">Not Register yet?<a href="register.html" class="bold text-white"> Register here</a></div>
							</form>

							<form id="verify-otp">
								<div class="section-title text-center">
									<h2 class="bold text-white">Verify OTP</h2>
								</div>
								<div class="alert alert-success" id="resendmsg" style="display:none;">

								</div>
								<div class="alert alert-danger" id="correctmsg" style="display:none;">

								</div>
								<div class="form-group mb-3">
									<div id="otp" class="inputs d-flex flex-row justify-content-center"> 
										<input class="text-center form-control" type="number" id="first" maxlength="1" /> 
										<input class="text-center form-control" type="number" id="second" maxlength="1" /> 
										<input class="text-center form-control" type="number" id="third" maxlength="1" /> 
										<input class="text-center form-control" type="number" id="fourth" maxlength="1" /> 
										 
									</div>
								</div>

								<div class="form-group text-center mb-3">
									<button class="btn btn-1" id="otp_submit" type="button">Verify</button>
								</div>

								<div class="resend">Not received yet?<a href="javascript::" id="otp_registerresend" class="bold text-white"> Resend</a></div>
							</form>




<!--Password-->
<form id="verify-password" >
								<div class="section-title text-center">
									<h2 class="bold text-white">Enter Password</h2>
								</div>
								<div class="alert alert-success" id="resendmsg" style="display:none;">

								</div>
								<div class="alert alert-danger" id="correctpwdmsg" style="display:none;">

								</div>
								<div class="form-group mb-3">
									<div id="otp" class="inputs d-flex flex-row justify-content-center"> 
										<input class="text-center form-control" type="number" id="firstp" maxlength="1" /> 
										<input class="text-center form-control" type="number" id="secondp" maxlength="1" /> 
										<input class="text-center form-control" type="number" id="thirdp" maxlength="1" /> 
										<input class="text-center form-control" type="number" id="fourthp" maxlength="1" /> 
										 
									</div>
								</div>

								<div class="form-group text-center mb-3">
									<button class="btn btn-1" id="password_submit" type="button">Verify</button>
								</div>

								<div class="resend">Not Register yet?<a href="register.html" class="bold text-white"> Register here</a></div>
							</form>


						</div>

						<div class="login-footer">By proceeding, you agree to our <a href="#">Terms of Use</a>, <a href="#">Privacy Policy</a> and that you are 18 years or older. You are not playing from Assam, Odisha, Nagaland, Sikkim, Meghalaya, Andhra Pradesh, or Telangana.</div>
					</div>
				</section>
			</div> <!-- // Sidebar -->

			<div class="right-bar">
				<div class="rcBanner">
					<picture class="rcBanner-img-container">
						<img src="images/01.png" alt="" height="200">
					</picture>
					<div class="rcBanner-text bold">Khel Hind <span class="bold" style="color: #0186d6; font-style: italic;">Real Game With Real Money!</span></div>
				</div>
				<div class="rcBanner-footer">For Developing Games Like This, open&nbsp;<a href=https://topuvai.com class="primary-color text-decoration-underline">topuvai.com</a> on <img src="images/global-chrome.png" alt="" height="20"> chrome mobile</div>
			</div>
		</div><!-- // Main -->

		<script src="js/jsbundle.min.js"></script>
		<script src="js/main.js"></script>

	</body>

<!-- Mirrored from superLudoBD.com/login.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Jul 2022 19:31:37 GMT -->
</html>