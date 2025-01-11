<?php 
// amount and userNumber
if(!isset($_GET['amount']) || !isset($_GET['phone'])){
    header("Location: https://superludobd.com/");
}

$baseURL = "http://localhost/clients/superludo/superludobd/newuddokta/moveto_newdomain";

$Name="Test";
$Email="test@gmail.com";
$userID="test";

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


?>