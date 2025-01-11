<?php
//X9FBkoZ2
/*print_r($_REQUEST);
die();*/
include "../db.php";
$key = "a6bc5405-0374-4dd5-ae65-048b0d58cebc";

// you can get your key from https://merchant.upigateway.com/user/api_credentials
$firstname = $_POST['firstname'];
$txnid = $_POST['txnid'];
$user_id = $_POST['email'];
$phone = $_POST['phone'];
$productinfo = $_POST['productinfo'];
$amount = $_POST['amount'];
$datejoinds = date("d-m-Y");

$insertdatas = "INSERT INTO `addwallate_playe`(`username_player`, `number_player`, `usercode_player`, `amount_player`, `order_number`, `date_player`, `status`,`product_info`) VALUES ('$firstname','$phone','$user_id','$amount','$productinfo','$datejoinds','Pending','C')";
$hfjg = mysqli_query($conn, $insertdatas);

// print_r($insertdatas);
// die();
$content = json_encode(array(
    "key" => $key,
    "client_txn_id" => $productinfo, // order id or your own transaction id
    "amount" => $amount,
    "p_info" => "Game",
    "customer_name" => $firstname, // customer name
    "customer_email" => "superludobd.com", // customer email
    "customer_mobile" => $phone, // customer mobile number
    "redirect_url" => "https://superludobd.com/upipayment/transaction_status.php", // redirect url after payment, with ?client_txn_id=&txn_id=

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
if ($status != 200) {
    // You can handle Error yourself.
    die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
}
curl_close($curl);
$response = json_decode($json_response, true);

// print_r($response);
// die();
if ($response["status"] == true) {

    header("Location: " . $response["data"]["payment_url"]);
    die();

} else {
	echo "<script>alert('Payment Initialize Failed Error:".$response["msg"]."');</script>";
    echo "<script>window.open('../wallet.php','_self')</script>";
}
