
<?php 



	if (!isset($_SESSION)) {
		if(!isset($_SESSION)){ session_start();};
	}
	require_once('../db.php');

	//initializing data...http://localhost/clients/superludo/superludobd/master/wallte?id=1570&amount=50&type=success
	$name = ''; 
	$id = ''; 
	$number = '';
	$pnumber ='';
    $amount =50;
    $paymentMethod ='';
    $image ='';
    	if (isset($_POST['moneyadd'])) {
	//  get data by id if id not found error
	if(!isset($_POST['firstname']) || !isset($_POST['phone']) || !isset($_POST['txnid']) || !isset($_POST['email']) || !isset($_POST['productinfo']) || !isset($_POST['amount'])){
		// handleErr("Please Revisit from app, else Money will not add");
		echo "<script>alert('Please Revisit from app, else Money will not add');</script>";
		echo "<script>window.location.href='../manualaddcash.php';</script>";
	
	}
	$name = $_POST['firstname'];
	$number = $_POST['phone'];
	$txnid = $_POST['txnid'];
	$user_id = $_POST['email'];

	$productinfo = $_POST['productinfo'];
	$amount = $_POST['amount'];
	$datejoinds=date("d-m-Y");
    }	

	function handleErr($_err)  {
		echo "<script>alert('".$_err."');</script>";
		
	};




	if (isset($_POST['submit'])) {
		// Validate form inputs
		$name = $_POST['name'];
		$number = $_POST['number'];
		$userid = $_POST['userid'];
		$productinfo = $_POST['productinfo'];

		$pnumber = $_POST['pnumber'];
		$amount = $_POST['amount'];
		$paymentMethod = $_POST['paymentMethod'];
		$image = $_FILES['image'];

		// Perform necessary checks
		// if (empty($name) || empty($number) || empty($email) || empty($pnumber) || empty($amount) || empty($paymentMethod) || $image['size'] == 0 || $image['error'] != UPLOAD_ERR_OK) {
		if (empty($name) || empty($number)  || empty($pnumber) || empty($amount) || empty($paymentMethod) || empty($image['name'])) {
			
			handleErr("Please fill in all the required fields");
		} elseif ($_FILES['image']['size'] > 5242880) { // 5 MB in bytes
			handleErr("The image size should not exceed 5 MB.");
			// echo "<span class='error'>The image size should not exceed 5 MB.</span>";
		} else {
		
			// Generate a unique filename for the image
			$imageFileName = uniqid() . '_' . $image['name'];

			// Set the file path to store the image
			$imagePath = 'prove_images/' . $imageFileName;
		
			// Move the uploaded image to the specified path
			move_uploaded_file($image['tmp_name'], $imagePath);
			$imageFullPath = 'https://superludobd.com/mpayment/' . $imagePath;
			$datejoinds=date("d-m-Y");
			$insertdatas="INSERT INTO `addwallate_playe`(`username_player`, `number_player`, `usercode_player`, `amount_player`, `order_number`, `date_player`, `status`,`product_info`,`img_url`,`method`,`pnum`) VALUES
			('$name','$number','$userid','$amount','$productinfo','$datejoinds','Pending','C','$imageFullPath','$paymentMethod','$pnumber')";
			$hfjg=mysqli_query($conn,$insertdatas);
			
			header("Location: thankyou.html");






		}
} 



$resulta = $conn->query("SELECT paynumber FROM manualpaymentinfo WHERE id = 1 ");
$BonusBalance =$resulta->fetch_assoc();

$payNumber = $BonusBalance['paynumber']; 
											
											


										

?>



<!doctype html>
<html lang="en">
  <head>
  	<title>Deposit Money</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	
	
  <!-- Include the Clipboard API polyfill for cross-browser support -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard-polyfill/3.0.0/clipboard-polyfill.promise.js"></script>

  <script>
    function copyPhoneNumber(number) {
		event.preventDefault(); // Prevents the link from navigating

		// var phoneNumber = event.target.innerText.replace(/\D/g, ''); // Extract only the digits

		var tempInput = document.createElement('input');
		// phoneNumber = phoneNumber.replace('91',''); //9996584768
		tempInput.value = number;
		document.body.appendChild(tempInput);
		tempInput.select();
		document.execCommand('copy');
		document.body.removeChild(tempInput);

		alert("Phone number copied to clipboard!");
    }
  </script>

	</head>
	<body>
	
				<div class="mx-3" > 

                   <a href="../manualaddcash.php">

                       <span  class="btn btn-lg text-primary bi bi-arrow-left"></span>
                   </a>
               
                </div>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">How to add money in SuperLudoBD?</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-10 col-md-12">
					<div class="wrapper">
						<div class="row no-gutters">
							


							<!-- right side  -->
						    <div class="col-md-5 d-flex align-items-stretch">
							<div class="info-wrap bg-primary w-100 p-lg-5 p-4">
										<h3 class="mb-4 mt-md-4">Instruction for Deposit</h3>
								
								<div onclick="copyPhoneNumber('<?php echo $payNumber ?>')" class="dbox w-100 d-flex align-items-center">
									<div class="icon d-flex align-items-center justify-content-center">
										<span class="fa fa-phone"></span>
									</div>
									<div class="text pl-3">
										<p><span >Number:</span> <a href="#"><?php echo $payNumber; ?></a></p>
										<span style="font-size: 12px;  line-height: 1;">First, Send money to this Number. Paytm ,phone ,Google pay at the same number</span>
									</div>
								</div>

								<div class="dbox w-100 d-flex align-items-start">
									<div class="icon d-flex align-items-center justify-content-center">
										<span class="fa fa-mobile"></span>
									</div>
									<div class="text pl-3">
										<p><span>Screenshot:</span>Take a Screenshot of Payment success prove</p>
									</div>
								</div>

								<div class="dbox w-100 d-flex align-items-center">
									<div class="icon d-flex align-items-center justify-content-center">
										<span class="fa fa-paper-plane"></span>
									</div>
									<div class="text pl-3">
										<p><span>Send Request:</span> <a href="mailto:contact@superludobd.com">Fill all the info and send the request for Deposit.</a></p>
									</div>
								</div>

								<div class="dbox w-100 d-flex align-items-center">
									<div class="icon d-flex align-items-center justify-content-center">
										<span class="fa fa-globe"></span>
									</div>
									<div class="text pl-3">
										<!-- todo handle return things -->
										<p><span>More Info</span> <a href="../index.php">Tutorial</a></p>
									</div>
								</div>

								<div class="dbox w-100 d-flex align-items-center">
									<span>successfully submitted money will be added to your account within 1-3 hours</span>
								</div>
							</div>
						
						</div>
					
					
							
							<!--left side-->
							
							<div class="col-md-7 d-flex align-items-stretch">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<!-- <h3 class="mb-4">Get in touch</h3>
									<div id="form-message-warning" class="mb-4"></div>
				      		<div id="form-message-success" class="mb-4">
				            Your message was sent, thank you!
				      		</div> -->
									<form method="POST" id="contactForm" enctype="multipart/form-data" name="contactForm">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" readonly value="<?php echo $name; ?>" class="form-control" name="name" id="name" placeholder="Name">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="phone" readonly value="<?php echo $number; ?>" class="form-control" name="number" id="number" placeholder="Number">
												</div>
											</div>
											<!-- <div class="col-md-12">
												<div class="form-group">
													<input type="email" readonly value="<php echo $email; ?>" class="form-control" name="email" id="email" placeholder="Email">
												</div>
											</div> -->
											<div class="col-md-12">
												<div class="form-group">
													<span>Enter you payment details</span>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="phone" class="form-control" name="pnumber" id="pnumber" placeholder="Payment Number">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="number" value="<?php echo $amount; ?>" class="form-control" name="amount" id="amount" placeholder="Amount">
												</div>
											</div>
											<input type="text" hidden value="<?php echo $user_id; ?>" class="form-control" name="userid" id="userid" placeholder="userid">
											<input type="text" hidden value="<?php echo $productinfo; ?>" class="form-control" name="productinfo" id="productinfo" placeholder="productinfo">
											
											<div class="col-md-12">
												<span>Through which app did you send the money?</span>
												<div class="form-group">
													<select class="form-control" name="paymentMethod" id="paymentMethod">
														<option value="Paytm">Paytm pay</option>
														<option value="phone">phone pay</option>
														<option value="Google">Google pay</option>
<!-- 														
														<option value="Paytm"  selected>Paytm</option>
														<option value="UPI"  selected>UPI</option>
														<option value="canarabank"  selected>Canara Bank</option>
														<option value="dcbbank"  selected>DCB Bank</option>
														<option value="Eederal Bank"  selected>Eederal Bank</option>
														<option value="HDFC Bank"  selected>HDFC Bank </option>
														<option value="Bank Of India"  selected>Bank Of India</option>
														<option value="IDBI Bank"  selected>IDBI Bank</option>
														<option value="CSB Bank"  selected>CSB Bank</option>
														<option value="ICICI Bank"  selected>ICICI Bank</option>
														<option value="Indian bank"  selected>Indian bank</option>
														<option value="CSB Bank"  selected>CSB Bank</option>
														<option value="others">Others</option> -->
													</select>
												</div>
											</div>

<!--
											<div class="col-md-12">
												<div class="form-group">
													<textarea name="message" class="form-control" id="message" cols="30" rows="7" placeholder="Additional Message"></textarea>
												</div>
											</div> -->

											<div class="col-md-12">
												<span>Money transfer Screenshot.</span>
												<div class="form-group">
													<input type="file" class="form-control-file" name="image" id="image" accept="image/*" onchange="displayFileName()">
												</div>
													<div class="form-group">
														<span id="filename"></span>
													</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" name="submit" value="Send Request" class="btn btn-primary">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>







					</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	



	

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<!-- <script src="js/main.js"></script> -->
	<script src="js/custom.js"></script>

	</body>
</html>
