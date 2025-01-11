
<?php 


	/**
	 * get data by id if id not found error
	 * update name email and number
	 * check everything when button click
	 * if ok save the data to server
	 * data will be updated in 3 1 houser 
	 * 
	 * money added successfully
	 * https://ludoone.com/pay.php?id=2&amount=23
	 * 
	 */
	if (!isset($_SESSION)) {
		if(!isset($_SESSION)){ session_start();};
	}
	require_once('../include/config.php');
	// require_once('../includes/security.php');

	//initializing data...
	$name = ''; 
	$id = ''; 
	$number = '';
	$email = '';
	$pnumber ='';
    $amount =50;
    $paymentMethod ='';
    $image ='';
	//  get data by id if id not found error

	if (isset($_GET['mobile'])) {
		$id  = mysqli_real_escape_string($conn,$_SESSION['id'] );
		$amount  = $_GET['amount'] ;


		$stmt = $conn->prepare("SELECT * FROM ludo_users WHERE unique_id = ?");
		$username = $id;
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result->num_rows>0) {
			$row = $result->fetch_assoc();
			$name = $row["full_name"];
			$email = $row["email"];
			$number = $row["mobile"];



		//while ($row = $result->fetch_assoc()) {}
		}else {
			handleErr("No user found 435");
		}
		$stmt->close();











		// $sql = "SELECT * FROM tbl_user WHERE username = '$id'";
		// $result   = $conn->query($sql); 
		// if ($result->num_rows > 0) {
		
		// 	$row = $result->fetch_assoc();
		// 	$name = $row["full_name"];
		// 	$email = $row["email"];
		// 	$number = $row["mobile"];





		// }else {
		// 	handleErr("No user found 435");
		// }

	}else {
		handleErr("Please Revisit from app, else Money will not add");

	}
	function handleErr($_err)  {
		echo "<script>alert('".$_err."');</script>";
	};




	if (isset($_POST['submit'])) {
		// Validate form inputs
		$name = $_POST['name'];
		$number = $_POST['number'];
		$email = $_POST['email'];

		$pnumber = $_POST['pnumber'];
		$amount = $_POST['amount'];
		$paymentMethod = $_POST['paymentMethod'];
// 		$image = $_FILES['image'];

		// Perform necessary checks
		if (empty($name) || empty($number) || empty($email) || empty($pnumber) || empty($amount) || empty($paymentMethod)) {
		//if (empty($name) || empty($number) || empty($email) || empty($pnumber) || empty($amount) || empty($paymentMethod) || $image['size'] == 0 || $image['error'] != UPLOAD_ERR_OK) {
			
			handleErr("Please fill in all the required fields");
		} 
// 		elseif ($_FILES['image']['size'] > 5242880) { // 5 MB in bytes
// 			handleErr("The image size should not exceed 5 MB.");
// 			// echo "<span class='error'>The image size should not exceed 5 MB.</span>";
// 		}
		else {
			// Call the function to store the data
			// storeData();

			// Display success message or perform further actions
			// echo "<span class='success'>Payment request sent successfully!</span>";

			//store the data to server 

			/**
			 * 
			 * INSERT INTO `tbl_transaction`(`id`, `user_id`, `order_id`, `payment_id`, `amount`, `payment_getway`, 
			 * `remark`, `type`, `reg_number`, `reg_name`, `status`, `date_created`, `date_modify`, `modify_by`)
			 * 
			 */


			// Generate a unique filename for the image
// 			$imageFileName = uniqid() . '_' . $image['name'];

			// Set the file path to store the image
// 			$imagePath = '../admin/assets/images/upload/deposit/' . $imageFileName;
		
			// Move the uploaded image to the specified path
// 			move_uploaded_file($image['tmp_name'], $imagePath);
			$orderID = uniqid();
			
			$sql = "INSERT INTO `ludo_transaction`(`id`, `user_id`, `order_id`, `payment_id`, `amount`,
			 `payment_getway`, `remark`, `type`, `reg_number`,
			  `reg_name`, `status`, `date_created`, `date_modify`, `modify_by`) VALUES (
				'','$id','$orderID','$pnumber','$amount',
				'$paymentMethod','From Manual Payment',1,'$number',
				'$name',0,now(),now(),'imagePath')";

			if ($conn->query($sql) === TRUE) {

				header("Location: thankyou.html");
				
			
			}else{
				handleErr("database error 234");
			}






		}
} 



$resulta = $conn->query("SELECT gems_cut as totLmatch FROM ludo_othersettings WHERE id = 1 ");
$BonusBalance =$resulta->fetch_assoc();

$payNumber = $BonusBalance['totLmatch']; 
											
											


										

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
	<body style="background-color:#0d0d7f;">
	
				<div class="mx-3" > 

                   <a href="../home.php">

                       <span  class="btn btn-lg text-primary bi bi-arrow-left"></span>
                   </a>
               
                </div>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
			    
				<div class="col-md-6 text-center mb-5">
					<h2 style="color:#ffff" class="heading-section">How To Add Balance In LudoBetX? ( কিভাবে ব্যালেন্স অ্যাড করবেন? )</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-10 col-md-12">
					<div class="wrapper">
						<div class="row no-gutters">
							


							<!-- right side  -->
						    <div class="col-md-5 d-flex align-items-stretch">
							<div class="info-wrap w-100 p-lg-5 p-4">
										<h3 class="mb-4 mt-md-4">আমানতের জন্য নির্দেশনা </br> Instruction for Deposit</h3>
								
								<div onclick="copyPhoneNumber('<?php echo '+88'. $payNumber ?>')" class="dbox w-100 d-flex align-items-center">
									<div class="icon d-flex align-items-center justify-content-center">
										<span><img src="nagad.png" alt="" width="40" height="40"></span>
									</div>
									<div class="text pl-3">
										<p><span >Nagad-1:</span> <a href="#"><?php echo "+880". $payNumber; ?></a></p>
										<span style="font-size: 12px;  line-height: 1;">প্রথমে নাম্বারটির ওপরে চাপ দিয়ে নাম্বারটি কপি করুন । তারপর নগদ অ্যাপ/USSD ব্যবহার করে ওই নাম্বার এ সেন্ড মানি করুন। পরবর্তী ঘোষণা না দেওয়া পর্যন্ত নগদ এর চার্জ সম্পূর্ণ ফ্রী!!!</span>
									</div>
								</div>
								
								
								<div onclick="copyPhoneNumber('0171111111')" class="dbox w-100 d-flex align-items-center">
									<div class="icon d-flex align-items-center justify-content-center">
										<span><img src="bbkash.png" alt="" width="40" height="40"></span>
									</div>
									<div class="text pl-3">
										<p><span >bKash:</span> <a href="#">0171111111</a></p>
										<span style="font-size: 12px;  line-height: 1;">প্রথমে নাম্বারটির ওপরে চাপ দিয়ে নাম্বারটি কপি করুন । তারপর নগদ অ্যাপ/USSD ব্যবহার করে ওই নাম্বার এ সেন্ড মানি করুন। পরবর্তী ঘোষণা না দেওয়া পর্যন্ত নগদ এর চার্জ সম্পূর্ণ ফ্রী!!!</span>
									</div>
								</div>
								
								
								<div onclick="copyPhoneNumber('017222222222')" class="dbox w-100 d-flex align-items-center">
									<div class="icon d-flex align-items-center justify-content-center">
										<span><img src="roket.png" alt="" width="40" height="40"></span>
									</div>
									<div class="text pl-3">
										<p><span >Rocket:</span> <a href="#">017222222222</a></p>
										<span style="font-size: 12px;  line-height: 1;">প্রথমে নাম্বারটির ওপরে চাপ দিয়ে নাম্বারটি কপি করুন । তারপর নগদ অ্যাপ/USSD ব্যবহার করে ওই নাম্বার এ সেন্ড মানি করুন। পরবর্তী ঘোষণা না দেওয়া পর্যন্ত নগদ এর চার্জ সম্পূর্ণ ফ্রী!!!</span>
									</div>
								</div>
								
								
								<div onclick="copyPhoneNumber('0172333333333')" class="dbox w-100 d-flex align-items-center">
									<div class="icon d-flex align-items-center justify-content-center">
										<span><img src="upay.png" alt="" width="40" height="40"></span>
									</div>
									<div class="text pl-3">
										<p><span >UPay:</span> <a href="#">0172333333333</a></p>
										<span style="font-size: 12px;  line-height: 1;">প্রথমে নাম্বারটির ওপরে চাপ দিয়ে নাম্বারটি কপি করুন । তারপর নগদ অ্যাপ/USSD ব্যবহার করে ওই নাম্বার এ সেন্ড মানি করুন। পরবর্তী ঘোষণা না দেওয়া পর্যন্ত নগদ এর চার্জ সম্পূর্ণ ফ্রী!!!</span>
									</div>
								</div>
								
								<div onclick="copyPhoneNumber('017444444444')" class="dbox w-100 d-flex align-items-center">
									<div class="icon d-flex align-items-center justify-content-center">
										<span><img src="nagad.png" alt="" width="40" height="40"></span>
									</div>
									<div class="text pl-3">
										<p><span >Nagad-2:</span> <a href="#">017444444444</a></p>
										<span style="font-size: 12px;  line-height: 1;">প্রথমে নাম্বারটির ওপরে চাপ দিয়ে নাম্বারটি কপি করুন । তারপর নগদ অ্যাপ/USSD ব্যবহার করে ওই নাম্বার এ সেন্ড মানি করুন। পরবর্তী ঘোষণা না দেওয়া পর্যন্ত নগদ এর চার্জ সম্পূর্ণ ফ্রী!!!</span>
									</div>
								</div>
								
								
								<div onclick="copyPhoneNumber('0175555555444')" class="dbox w-100 d-flex align-items-center">
									<div class="icon d-flex align-items-center justify-content-center">
										<span><img src="nagad.png" alt="" width="40" height="40"></span>
									</div>
									<div class="text pl-3">
										<p><span >Nagad-3:</span> <a href="#">0175555555444</a></p>
										<span style="font-size: 12px;  line-height: 1;">প্রথমে নাম্বারটির ওপরে চাপ দিয়ে নাম্বারটি কপি করুন । তারপর নগদ অ্যাপ/USSD ব্যবহার করে ওই নাম্বার এ সেন্ড মানি করুন। পরবর্তী ঘোষণা না দেওয়া পর্যন্ত নগদ এর চার্জ সম্পূর্ণ ফ্রী!!!</span>
									</div>
								</div>
								
								
								<div onclick="copyPhoneNumber('Address-Here')" class="dbox w-100 d-flex align-items-center">
									<div class="icon d-flex align-items-center justify-content-center">
										<span><img style="border-radius: 7px;" src="usdt.png" alt="" width="40" height="40"></span>
									</div>
									<div class="text pl-3">
										<p><span >USDT:</span> <a href="#">Address-Here</a></p>
										<span style="font-size: 12px;  line-height: 1;">প্রথমে অ্যাড্রেসটির ওপরে চাপ দিয়ে অ্যাড্রেসটি কপি করুন । তারপর Binance অথবা যেকোনো USDT(TRC20) ব্যবহার করে ডলার পাঠান। ডিপজিট এবং উইথড্রতে প্রতি ডলার ১১০ টাকা করে ধরা হবে!!!</span>
									</div>
								</div>
								

								<div class="dbox w-100 d-flex align-items-start">
									<div class="icon d-flex align-items-center justify-content-center">
										<span class="fa fa-mobile"></span>
									</div>
									<div class="text pl-3">
										<p><span>Screenshot:</span> আপনার ডিপোজিট অনুমোদন না হওয়া পর্যন্ত পেমেন্ট সফলতার একটি স্ক্রিনশট নিয়ে রাখুন</p>
									</div>
								</div>

								<div class="dbox w-100 d-flex align-items-center">
									<div class="icon d-flex align-items-center justify-content-center">
										<span class="fa fa-paper-plane"></span>
									</div>
									<div class="text pl-3">
										<p><span>Send Request:</span> <a href="#">সম্পূর্ণ লেনদেনের পরে ফর্মটি পূরণ করুন এবং অনুরোধ পাঠান।</a></p>
									</div>
								</div>

								<div class="dbox w-100 d-flex align-items-center">
									<div class="icon d-flex align-items-center justify-content-center">
										<span class="fa fa-globe"></span>
									</div>
									<div class="text pl-3">
										<!-- todo handle return things -->
										<p><span>More Info</span> <a href="moreinfo.php">Tutorial</a></p>
									</div>
								</div>

								<div class="dbox w-100 d-flex align-items-center">
									<span>সফলভাবে জমা দেওয়া টাকা ১-৩ ঘন্টার মধ্যে আপনার অ্যাকাউন্টে যোগ করা হবে। না হলে LudoBetX কর্মীদের কাছে রিপোর্ট করুন। ধন্যবাদ।</span>
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
											<div class="col-md-12">
												<div class="form-group">
													<input type="email" readonly value="<?php echo $email; ?>" class="form-control" name="email" id="email" placeholder="Email">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<span>আপনার অর্থপ্রদানের বিবরণ লিখুন</span>
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
											<div class="col-md-12">
												<span>Through which app did you send the money?</span>
												<div class="form-group">
													<select class="form-control" name="paymentMethod" id="paymentMethod">
														<option value="bKash">bKash</option>
														<option value="Nagad">Nagad</option>
														<option value="usdt">USDT(TRC20)</option>
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

											<!--<div class="col-md-12">-->
											<!--	<span>Money transfer Screenshot.</span>-->
											<!--	<div class="form-group">-->
											<!--		<input type="file" class="form-control-file" name="image" id="image" accept="image/*" onchange="displayFileName()">-->
											<!--	</div>-->
											<!--		<div class="form-group">-->
											<!--			<span id="filename"></span>-->
											<!--		</div>-->
											<!--</div>-->
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" name="submit" value="অনুরোধ পাঠান" class="btn btn-primary">
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
