<?php if(!isset($_SESSION)){ session_start();}; ?>
<!doctype html>
	<html class="no-js" lang="">
<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
		<title>Ludowiner </title>
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
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/custom.css">
		<style type="text/css">
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
															<div class="alert alert-success" id="successregister" style="display:none;">

								</div>
																							<div class="alert alert-success" id="successregister" style="display:none;">

								</div>
								
		

<!--Password-->
<form name="myform" method="GET" id="submit_form">
								<div class="section-title text-center">
									<h2 class="bold text-white">Enter Password</h2>
                                    <div id="response"></div>
								</div>
								<input type="hidden" name="verifynumber" id="verifynumber" value="<?php echo $_SESSION['palyer'];?>" class="form-control ps-0" placeholder="Mobile Number">
							<!--	<div class="form-group mb-3">
									<div id="otp" class="inputs d-flex flex-row justify-content-center"> 
										<input class="text-center form-control" type="text" id="firstp" name="firstp" maxlength="1" /> 
										<input class="text-center form-control" type="text" id="secondp" name="secondp" maxlength="1" /> 
										<input class="text-center form-control" type="text" id="thirdp" name="thirdp" maxlength="1" /> 
										<input class="text-center form-control" type="text" id="fourthp" name="fourthp" maxlength="1" /> 
										 
									</div>
								</div>-->
									<div class="form-group input-group mb-3">
									
									<input type="text" id="firstp" name="firstp" style="text-align:center;"  class="form-control ps-0" minlength="4" maxlength="4" placeholder="Enter Password">
								</div>

								<div class="form-group text-center mb-3">
									<button class="btn btn-1" id="password_submit" name="password_submit" type="button">Verify</button>
								</div>

								<div class="resend">Not Register yet?<a href="register" class="bold text-white"> Register here</a></div>
							</form>


						</div>

						<div class="login-footer">By proceeding, you agree to our <a href="#">Terms of Use</a>, <a href="#">Privacy Policy</a> and that you are 18 years or older. You are not playing from Assam, Odisha, Nagaland, Sikkim, Meghalaya, Andhra Pradesh, or Telangana.</div>
					</div>
				</section>
			</div> <!-- // Sidebar -->

			<div class="right-bar">
				<div class="rcBanner">
					<picture class="rcBanner-img-container">
						<img src="images/KHD.png" alt="" height="200">
					</picture>
					<div class="rcBanner-text bold">Ludowiner <span class="bold" style="color: #0186d6; font-style: italic;">Real Game With Real Money!</span></div>
				</div>
				<div class="rcBanner-footer">
					For best experience, open&nbsp;
					<a href="#!" class="primary-color text-decoration-underline">superludobd.com</a> on <img src="images/global-chrome.png" alt="" height="20"> chrome mobile
				</div>
			</div>
		</div><!-- // Main -->

		<script src="js/jsbundle.min.js"></script>
		<script src="js/main.js"></script>
        <?php include("loginscript.php");?>
	
</body>
</html>