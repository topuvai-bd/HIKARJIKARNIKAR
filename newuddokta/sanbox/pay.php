<?php
$baseURL = 'https://pay.courssell.xyz/';
$apiKEY = '5745-B8A3-AADC-41BB';


$fields = [
    'full_name'     => 'John Doe',
    'email'         => 'userEmail@gmail.com',
    'amount'        => '100',
    'metadata'      => [
        'user_id'   => '10',
        'order_id'  => '50'
    ],
    'redirect_url'  => 'https://courssell.xyz/index.php?status=success',
    'return_type'   => 'GET',		 
    'cancel_url'    => 'https://courssell.xyz/index.php?status=failed',
    'webhook_url'   => 'https://courssell.xyz/index.php?status=webhook'
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