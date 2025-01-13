<?php
// require_once 'config.php';
// if(!isset($_GET["userid"]) || !isset($_GET["amount"])){
    die("Invalid Request");
// }
require_once '../include/config.php';
// require_once 'config.php';

// // Create connection
// // $conn = new mysqli($servername, $username, $password, $db);

// // Check connection
// if (!isset($conn) || $conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } else {
//     // $conn->set_charset('utf8');
// }
// $user_id = $_GET["userid"];
// $amount = $_GET["amount"];
// $user_id = htmlspecialchars($user_id);
// $amount = htmlspecialchars($amount);
// $user_id = $conn->real_escape_string($user_id);
// $amount = $conn->real_escape_string($amount);
// // SELECT `id`, `username`, `full_name`, `profile_img`, `email`, `country_code`, `mobile`, `whatsapp_no`, `password`, `deposit_bal`, `won_bal`, `bonus_bal`, `referer`, `refer_counter`, `device_id`, `is_active`, `is_block`, `date_created`, `date_modify`, `frgt_pass_identity`, `fcm_token`, `user_type`, `fb_password`, `gp_password` FROM `tbl_user` WHERE 1
// $resulta = $conn->query("SELECT full_name,email FROM tbl_user WHERE id = '".$user_id."'");
// $BonusBalance =$resulta->fetch_assoc();
// $Name = $BonusBalance['full_name']; 
// $Email = $BonusBalance['email'];
function GenerateRandomString(){
    $length = 10;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
// store a payment info SELECT `id`, `userid`, `amount`, `status`, `trxid`, `date` FROM `tbl_tmp_payment` WHERE 1
$trxID = GenerateRandomString();

// $res = $conn->query("INSERT INTO tbl_tmp_payment (userid, amount, status, trxid) VALUES ('".$user_id."', '".$amount."', '0', '".$trxID."')");
// // if res has error
// if(!$res){
//     die("Error: " . $conn->error);
// }

$Name = "Test";
$Email = "test@gmail.com";
$baseURL = "http://localhost/online/";
$userID = "test";
$trxID = "test2342";
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://pay.drutopay.com/api/payment/create',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => '{"cus_name":"'.$Name.'online/success.php","cus_email":"'.$Email.'online/success.php","success_url":"'.$baseURL.'online/success.php","cancel_url":"'.$baseURL.'online/cancel.php","metadata":{"cus_name":"'.$userID.'","cus_email":"'.$userID.'@gmail.com","trnxid":"'.$trxID.'"},"amount":"'."100".'"}',
  CURLOPT_HTTPHEADER => array(
    'API-KEY: '.$appkey,
    'Content-Type: application/json',
    'SECRET-KEY: '.$secretkey,
    'BRAND-KEY: '.$hostName
  ),
));
$response = curl_exec($curl);

curl_close($curl);
echo $response;
// curl_setopt_array($curl, array(
//   CURLOPT_URL => 'https://pay.uniquepaybd.com/request/payment/create',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 0,
//   CURLOPT_FOLLOWLOCATION => true,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => 'POST',
//   CURLOPT_POSTFIELDS => array('cus_name' => $_GET['userid'],'cus_email' => $_GET['userid'].'@gmail.com','amount' => $_GET['amount'],'success_url' => $baseURL.'online/success.php','cancel_url' =>  $baseURL.'online/cancel.php'),
//   CURLOPT_HTTPHEADER => array(
//     'api-key: '.$appkey,
//     'secret-key: '.$secretkey,
//     'host-name: '.$hostName,
//   ),
// ));



?>