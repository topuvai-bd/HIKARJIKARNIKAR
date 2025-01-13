<?php 
// amount and userNumber
if(!isset($_GET['amount']) || !isset($_GET['phone'])){
    header("Location: https://superludobd.com/");
}

$CallBack_Base = "https://courssell.xyz/payment/";

$Name="Test";
$Email="test@gmail.com";

$amount = $_GET['amount'];
$phone = $_GET['phone'];

$baseURL = 'https://pay.courssell.xyz/';
$apiKEY = 'f1d5bd54b659a131aad3020f1bbcd15e5bd275d9';
// $baseURL = 'https://sandbox.uddoktapay.com/';
// $apiKEY = '982d381360a69d419689740d9f2e26ce36fb7a50';
$order_id = "course_".rand(100000,999999).date('Ymdhis');
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
  echo $response;
}

?>