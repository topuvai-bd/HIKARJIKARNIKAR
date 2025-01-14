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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	
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
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>
<body>

<div class="main">
	<div class="side-bar login-page" style="background-image: url(images/ss.0eab8b8669e3c98191c4.png);">
	<section class="login-area login-block clearfix" >
			<div class="container-fluid px-4">
				 
				<div class="">
					
					<div >
						<form name="myform" method="POST" id="submit_form">
						<div class="section-title text-center">
							<h2 class="bold text-white">Register</h2>
							<br>
						<div id="response"></div>
						</div>
						<div class="form-group input-group mb-3">
							<span class="input-group-text bg-white" id="basic-addon1"><i class="fas fa-user"></i></span>
							<input type="text" name="fname" id="fname" class="form-control ps-0" placeholder="Full Name">
						</div>
						
						<div class="form-group input-group mb-3">
							<span class="input-group-text bg-white" id="basic-addon1">+88</span>
							<input type="text" name="mobile" id="mobile" class="form-control ps-0" placeholder="Mobile Number">
						</div>
						<div class="form-group input-group mb-3">
							<span class="input-group-text bg-white" id="basic-addon1"><i class="fas fa-key"></i></span>
							<input type="number" name="password" id="password" class="form-control ps-0" placeholder="Enter 4 digit password" >
						</div>
<?php if(isset(($_GET['refrelcode']))){
    $refrelcode=$_GET['refrelcode'];
    ?>
    	<div class="form-group input-group mb-3">
							<span class="input-group-text bg-white" id="basic-addon1"><i class="fa fa-user"></i></span>
							<input type="text" name="refrelcode" id="refrelcode" class="form-control ps-0" value="<?php echo $refrelcode;?>" readonly placeholder="Referral code">

							
						</div>
    <?php
}
else{
    ?>
    	<div class="form-group input-group mb-3">
							<span class="input-group-text bg-white" id="basic-addon1"><i class="fas fa-gift"></i></span>
							<input type="text" name="refrelcode" id="refrelcode" class="form-control ps-0" placeholder="Referral code">

							
						</div>
						<?php
}
?>
					
						
						<div class="form-group mb-3" id="submitregiterbutton">
							<button type='button' class='btn btn-success  w-100' name="login2" id="login2">Continue</button>
						</div>

	<div class="row">
	<div class="col-12  mb-3 text-right">
	<span style="color:orange;">Already have account?</span><a href="login" class="bold text-white"> Login here</a><a href="index" class="bold text-white ms-4">Home</a>
		 
								</div>


						
					</div>
</form>
</br>
</div>
 
				<div class="login-footer p-0" style="height:20%;background-color:black;color:white;">
						    <br>By proceeding, you agree to our <a href="#" style="color:orange;">Terms of Use</a>, <a href="#" style="color:orange;">Privacy Policy</a> and that you are 18 years or older. You are not playing from Assam, Odisha, Nagaland, Sikkim, Meghalaya, Andhra Pradesh, or Telangana.</div>
					</div>
		</section>
	</div> <!-- // Sidebar -->

	<div class="right-bar">
		<div class="rcBanner">
			<picture class="rcBanner-img-container">
				<img src="images/KHD.png" alt="" height="150">
			</picture>
			<div class="rcBanner-text mt-2"><span class="bold" style="color: #0186d6; font-style: italic;">Real Game With Real Money!</span></div>
		</div>
		<div class="rcBanner-footer">For Developing Games Like This, open&nbsp;<a href=https://topuvai.com class="primary-color text-decoration-underline">topuvai.com</a> on <img src="images/global-chrome.png" alt="" height="20"> chrome mobile</div>
	</div>
</div><!-- // Main -->

<script src="js/jsbundle.min.js"></script>
<script src="js/main.js"></script>

<script>  
 $(document).ready(function(){  
      $('#login2').click(function(){  
           var fname = $('#fname').val();  
           var mobile = $('#mobile').val(); 
		   var password = $('#password').val();
		   var refrelcode = $('#refrelcode').val(); 
		   if(refrelcode == '')  
		   {  
				refrelcode="null";
		   } 
           if(fname == '' || mobile == '' || password == '' )  
           {  
                $('#response').html('<span class="alert alert-danger">Please Enter Correct  Details</span>');  
           } 
		    
           else  
           {  
                $.ajax({  
                     url:"rgdata.php",  
                     method:"POST",  
                     data:$('#submit_form').serialize(),  
                     beforeSend:function(){  
                          $('#response').html('<span class="text-info">Loading response...</span>');  
                     },  
                     success:function(data){  
                          $('form').trigger("reset");  
                          $('#response').fadeIn().html(data);  
                          setTimeout(function(){  
                               $('#response').fadeOut("slow");  
                          }, 8000);  
                     }  
                });  
           }  
      });  
 });  
 </script>  


</body>
</html>