<?php
//X9FBkoZ2
/*print_r($_REQUEST);
die();*/
include("../db.php");
	 $key = "04619f02-28bf-4d54-9fa0-8f715711ee5e";
 
// you can get your key from https://merchant.upigateway.com/user/api_credentials
   $firstname = $_POST['firstname'];
   $txnid = $_POST['txnid'];
   $user_id = $_POST['email'];
   $phone = $_POST['phone'];
   $productinfo = $_POST['productinfo'];
   $amount = $_POST['amount'];
   $datejoinds=date("d-m-Y");

$insertdatas="INSERT INTO `addwallate_playe`(`username_player`, `number_player`, `usercode_player`, `amount_player`, `order_number`, `date_player`, `status`,`product_info`) VALUES ('$firstname','$phone','$user_id','$amount','$productinfo','$datejoinds','Pending','C')";
$hfjg=mysqli_query($conn,$insertdatas);


//print_r($insertdatas);

	 $content = json_encode(array(
	 	"key"=> $key,
	 	"client_txn_id"=> $productinfo, // order id or your own transaction id
	 	"amount"=> $amount, 
	 	"p_info"=> "Game",
	 	"customer_name"=> $firstname, // customer name
	 	"customer_email"=> "contact@superludobd.com", // customer email
	 	"customer_mobile"=> $phone, // customer mobile number
	 	"redirect_url"=> "https://superludobd.com/addmoney/transaction_status.php", // redirect url after payment, with ?client_txn_id=&txn_id=
	
	 ));
	 $url = "https://api.ekqr.in/api/create_order";
	 $curl = curl_init($url);
	 curl_setopt($curl, CURLOPT_HEADER, false);
	 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	 curl_setopt($curl, CURLOPT_HTTPHEADER,
	 		array("Content-type: application/json"));
	 curl_setopt($curl, CURLOPT_POST, true);
	 curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
	 $json_response = curl_exec($curl);
	 $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	 if ( $status != 200 ) {
	 	// You can handle Error yourself.
	 	die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
	 }
	 curl_close($curl);
	 $response = json_decode($json_response, true);

	/* echo "<pre>";
     print_r($response);*/
	 if($response["status"] == true){
	 	
	 	header("Location: ".$response["data"]["payment_url"]);
	 	die();
	 
	 }else{
	 
		 echo "<script>window.open('../wallet','_self')</script>";
	 }
?>
