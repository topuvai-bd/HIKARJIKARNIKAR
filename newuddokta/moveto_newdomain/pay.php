<?php 
// amount and userNumber
if(!isset($_GET['amount']) || !isset($_GET['phone'])){
    header("Location: https://superludobd.com/");
}
require_once 'db.php';
$CallBack_Base = SITE_URL;


$amount = $_GET['amount'];
$phone = $_GET['phone'];

$amount = mysqli_real_escape_string($conn, $amount);
$phone = mysqli_real_escape_string($conn, $phone);
if($amount < 1){
    echo "Invalid Amount";
    exit;
}


$Name= "Payer".$phone;
$Email=$phone."@gmail.com";

$baseURL = PAY_URL;
$apiKEY = API_KEY;


$order_id = "course_".rand(100000,999999).date('Ymdhis');

// store order_id in db SELECT `id`, `user_id`, `amount`, `order_id`, `status`, `date` FROM `payments` WHERE 1
$sql="INSERT INTO `payments`(`user_id`, `amount`, `order_id`) VALUES ('$phone','$amount','$order_id')";
$result = mysqli_query($conn, $sql);
if(!$result){
    echo "Something went wrong";
    exit;
}

$fields = [
    'full_name'     => $Name,
    'email'         => $Email,
    'amount'        => $amount,
    'metadata'      => [
        'user_id'   => $phone,
        'order_id'  => $order_id
    ],
    'redirect_url'  => $CallBack_Base.'sccs.php',
    'return_type'   => 'GET',		 
    'cancel_url'    => $CallBack_Base.'cancel.php',
    'webhook_url'   => $CallBack_Base.'hok.php',
];


$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => $baseURL . "api/checkout-v2",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($fields),
  CURLOPT_HTTPHEADER => [
    "RT-UDDOKTAPAY-API-KEY: " . $apiKEY,
    "accept: application/json",
    "content-type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  // {
  //   "status": true,
  //   "message": "Payment Url",
  //   "payment_url": "https://sandbox.uddoktapay.com/payment/254663aa2a6a4a5df2aa8dc9f28aa1744a8bae9f"
  // }
  $response = json_decode($response, true);
  if(isset($response['status']) && $response['status'] == true && isset($response['payment_url'])){
    header("Location: ".$response['payment_url']);
  }else{
    echo "Something went wrong";
  }
}

?>