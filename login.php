<!doctype html>
<?php if(!isset($_SESSION)){ session_start();};
     if(isset($_SESSION['finalplayer'])){
		 header("Location: index");
		 die();
	 }
?>
<html class="no-js" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
	<title>SuperLudoBD </title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="robots" content="" />
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
	<link rel="icon" type="image/png" sizes="192x192" href="images/favicon/android-icon-192x192.png">
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
		<div class="side-bar login-page" style="background-image: url(images/ss.0eab8b8669e3c98191c4.png);">
			<section class="login-area login-block clearfix">
				<div class="container-fluid">

					<form name="myform" method="POST" id="submit_form">
						<div class="section-title text-center">
							<h2 class="bold text-white">Sign in</h2>
							<div id="response"></div>
						</div>

						<div class="form-group input-group mb-3">
							<span class="input-group-text bg-gray" id="basic-addon1">+88</span>
							<input type="text" name="mobile" id="mobile" class="form-control ps-0" placeholder="Mobile Number (11 digits)">
						</div>



						<div class="form-group mb-3">
							<button type="button" class="btn btn-success w-100" id='loginpassword' name="loginpassword">CONTINUE</button>

						</div>

						<div class="row">
							<div class="col-12  mb-3 text-right">
								<span style="color:orange;">Not Register yet?</span>
								<a href="register" class="bold text-white"> Register here</a>
								<a href="index" class="bold text-white ms-4">Home</a>
							</div>

					</form>







				</div>

				<div class="login-footer p-4" style="height:30%;background-color:black;color:white;">
					<br><br>By proceeding, you agree to our <a href="#" style="color:orange;">Terms of Use</a>, <a href="#" style="color:orange;">Privacy Policy</a> and that you are 18 years or older. You are not playing from Assam, Odisha, Nagaland, Sikkim, Meghalaya, Andhra Pradesh, or Telangana.
				</div>
		</div>
		</section>
	</div> <!-- // Sidebar -->

	<div class="right-bar">
		<div class="rcBanner">
			<picture class="rcBanner-img-container">
				<img src="images/KHD.png" alt="" height="200">
			</picture>
			<div class="rcBanner-text bold">SuperLudoBD <span class="bold" style="color: #0186d6; font-style: italic;">Real Game With Real Money!</span></div>
		</div>
		<div class="rcBanner-footer">For Developing Games Like This, open&nbsp;<a href=https://topuvai.com class="primary-color text-decoration-underline">topuvai.com</a> on <img src="images/global-chrome.png" alt="" height="20"> chrome mobile</div>
	</div>
	</div><!-- // Main -->

	<script src="js/jsbundle.min.js"></script>
	<script src="js/main.js"></script>
	<?php include("loginscript.php");?>
</body>

</html>
