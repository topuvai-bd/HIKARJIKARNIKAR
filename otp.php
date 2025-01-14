<?php
  if(!isset($_SESSION)){ session_start();};
 if(isset($_SESSION['finalplayer'])){
		 header("Location: index.php");
		 die();
	 }
	 $sdffsjfhsdf=$_SESSION['palyer'];
?>
<!doctype html>
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
	<?php 
	    // if(isset($_SESSION['palyer'])){
	    //     $sdffsjfhsdf=$_SESSION['palyer'];
			
		// 	$otp = rand(111111,999999);
			
		// 	$fields = array(
		//      "variables_values" => $otp,
		//      "route" => "otp",
		//      "numbers" => $sdffsjfhsdf,
		// );

		// $curl = curl_init();

		// curl_setopt_array($curl, array(
		// CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
		// CURLOPT_RETURNTRANSFER => true,
		// CURLOPT_ENCODING => "",
		// CURLOPT_MAXREDIRS => 10,
		// CURLOPT_TIMEOUT => 30,
		// CURLOPT_SSL_VERIFYHOST => 0,
		// CURLOPT_SSL_VERIFYPEER => 0,
		// CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		// CURLOPT_CUSTOMREQUEST => "POST",
		// CURLOPT_POSTFIELDS => json_encode($fields),
		// CURLOPT_HTTPHEADER => array(
		// 	"authorization: 0llqIgOa9PGpUe06RFrRs2CWQlCiYqY3N8XRKZtZIRAlDPfNldUUpqxmDCY9",
		// 	"accept: */*",
		// 	"cache-control: no-cache",
		// 	"content-type: application/json"
		// ),
		// ));

		// $response = curl_exec($curl);
		// $err = curl_error($curl);

		// curl_close($curl);
			
			// include("db.php");
		 
			// $update_otp = mysqli_query($conn,"UPDATE `user_regist` SET `otpd`='$otp' WHERE  user_number='$sdffsjfhsdf'");
		
	
	    // }
	    
	    ?>

	<div class="main">
		<div class="side-bar login-page" style="background-image: url(images/ss.0eab8b8669e3c98191c4.png);">
			<!-- Login -->

			<section class="login-area login-block clearfix">
				<div class="container-fluid px-4">

					<div class="">

						<form name="myform" method="POST" id="submit_form">
							<div class="section-title text-center">
								<h2 class="bold text-white">Sign in</h2>
								<div id="response"></div>
							</div>

							<div class="form-group input-group mb-3">
								<span class="input-group-text bg-white" id="basic-addon1">+88</span>
								<input type="text" value="<?php echo $sdffsjfhsdf;?>" readonly name="secondmobile" id="secondmobile" class="form-control ps-0" placeholder="Mobile Number">

								<input type="hidden" value="<?php echo $sdffsjfhsdf;?>" readonly name="loginnumber" id="loginnumber" class="form-control ps-0" placeholder="Mobile Number">
							</div>

							<div class="form-group input-group mb-3">
								<span class="input-group-text bg-white" id="basic-addon1">Pass Code</span>
								<input type="number" value="" name="otpd" id="otpd" class="form-control ps-0" placeholder="Enter passcode">
							</div>


							<div class="form-group mb-3">
								<button type="button" class="btn btn-success w-100" id='otpdg' name="otpdg">VERIFY</button>

							</div>




							<div class="alert alert-danger " id="snackbar" style="display:none;">

							</div>

							<div class="row">
								<!--	<div class="col-6  mb-3 text-right">
		                                    <a href="loginotp.php" class="bold" id="request-otp" style="color:#ffeb5d;"> Login with otp </a>
		 						</div>-->
								<!--<div class="col-6 mb-3 text-left m">-->
								<!--	<a href="otp.php" type="button" class="btn btn-primary btn-sm right"  name="resend">Resend Otp</a>-->

								<!--</div>-->
							</div>
							<div class="resend">Not Register yet?<a href="register.php" class="bold text-white"> Register here</a></div>
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
