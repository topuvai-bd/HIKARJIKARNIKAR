<?php

require_once 'db.php';
$baseURL = PAY_URL;
$apiKEY = API_KEY;

if(!isset($_GET['invoice_id'])){
    echo "Invalid Request";
    exit;
}
$invoice_id = $_GET['invoice_id'];
$invoice_id = mysqli_real_escape_string($conn, $invoice_id);

$fields = [
    'invoice_id'     => $invoice_id
];


$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => $baseURL . "api/verify-payment",
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
//   echo $response;
// {
//     "full_name": "John Doe",
//     "email": "userEmail@gmail.com",
//     "amount": "100.00",
//     "fee": "0.00",
//     "charged_amount": "100.00",
//     "invoice_id": "Erm9wzjM0FBwjSYT0QVb",
//     "metadata": {
//       "user_id": "10",
//       "order_id": "50"
//     },
//     "payment_method": "bkash",
//     "sender_number": "01311111111",
//     "transaction_id": "TESTTRANS1",
//     "date": "2023-01-07 14:00:50",
//     "status": "COMPLETED"
//   }
$response = json_decode($response, true);
if(isset($response['status']) && $response['status'] == "COMPLETED"){
    // payment success.
    //check db and update payment status
    $sql = "SELECT * FROM `payments` WHERE `invoice_id` = '$invoice_id' AND `status` = '0'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $sql = "UPDATE `payments` SET `status` = '1' WHERE `invoice_id` = '$invoice_id'";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "Payment Success";
        }else{
            echo "Payment Success but failed to update status";
        }
    }else{
        echo "Payment Success but failed to find invoice_id";
    }
}
}