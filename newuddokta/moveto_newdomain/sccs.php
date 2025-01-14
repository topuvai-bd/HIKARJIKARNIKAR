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
    $order_id = $response['metadata']['order_id'];
    // payment success.
    //check db and update payment status SELECT `id`, `user_id`, `amount`, `order_id`, `status`, `date` FROM `payments` WHERE 1
    $sql = "SELECT * FROM `payments` WHERE `order_id` = '$order_id' AND `status` = '0'";
    $result = mysqli_query($conn, $sql);
    if($result && mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $sql = "UPDATE `payments` SET `status` = '1' WHERE `order_id` = '$order_id'";
        $result = mysqli_query($conn, $sql);
        if($result){
            // echo "Payment Success";
            // webhook success
            $url=CALLBACK_WEBHOOK;
            $data = array('amount' => $response['amount'], 'user_id6' => $row['user_id']);
            $options = array(
                'http' => array(
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'POST',
                    'content' => http_build_query($data)
                )
            );
            $context  = stream_context_create($options);
            $result = file_get_contents($url, false, $context);
            if($result == "200"){
                echo "Payment Success";
                // header("Location: https://superludobd.com");
                header( "refresh:4; url=https://superludobd.com" );
                exit;
            }else{
                echo "Payment Success but failed to update status in server Error: ".$result;
                header( "refresh:7; url=https://cardshopbd.com" );
            }
        }else{
            echo "Payment Success but failed to update status";
            header( "refresh:4; url=https://cardshopbd.com" );

        }
    }else{
        echo "Payment Success but failed to find information in server";
        header( "refresh:4; url=https://cardshopbd.com" );
    }
}
}
die("Payment Failed");
?>