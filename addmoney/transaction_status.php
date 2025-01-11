<?php
// officaly modify by Simplehacker02 
// whatsapp : +919771241425

include("../db.php");
$client_txn_id = $_GET['client_txn_id'];
$txn_id = $_GET['txn_id'];

$update_payment_details = mysqli_query($conn, "UPDATE `addwallate_playe` SET `txn`='$txn_id' WHERE `order_number` = '$client_txn_id'");

$get_payment_details = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `addwallate_playe` WHERE `order_number` = '$client_txn_id'"));
$payment_date = $get_payment_details['date_player'];

	 $key = "04619f02-28bf-4d54-9fa0-8f715711ee5e";
 
	 $content = json_encode(array(
	 	"key"=> $key,
		"client_txn_id"=> $client_txn_id,
		"txn_date"=> $payment_date
	 ));
	 $url = "https://api.ekqr.in/api/check_order_status";
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
	 	echo "Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl);
	 }
	 curl_close($curl);
	 $response = json_decode($json_response, true);

     /*echo "<pre>";
	print_r($response);*/
if($response['msg']=="Record not found"){
	$update_payment_details = mysqli_query($conn, "UPDATE `addwallate_playe` SET `status`='failure' WHERE `order_number` = '$client_txn_id'");
	echo "<script>window.open('../wallet','_self')</script>";
}else{
	if($response['data']['status'] != "failure"){
		 $update_payment_details = mysqli_query($conn, "UPDATE `addwallate_playe` SET `status`='success' WHERE `order_number` = '$client_txn_id'");
	 	echo "<script>window.open('../index','_self')</script>";
	 }

	/* if($response['data']['status'] != "failure"){
		 $update_payment_details = mysqli_query($conn, "UPDATE `addwallate_playe` SET `status`='success' WHERE `order_number` = '$client_txn_id'");
	 	echo "<script>window.open('../index','_self')</script>";
	 }else{
	 	//echo $response["msg"];
		 echo "<script>window.open('../wallet','_self')</script>";
	 }*/
}
?>
