<?php 

$servername_server = "localhost";
$username_server = "cxzzhvyr_topuvai_payment";
$password_server = "topuvai_payment";
$db_server = "cxzzhvyr_topuvai_payment";

define('SITE_URL', 'https://courssell.xyz/payment/');
define('PAY_URL', 'https://sandbox.uddoktapay.com/');
define('API_KEY', '982d381360a69d419689740d9f2e26ce36fb7a50');
// define('PAY_URL', 'https://pay.courssell.xyz/');
// define('API_KEY', 'f1d5bd54b659a131aad3020f1bbcd15e5bd275d9');

// $baseURL = 'https://sandbox.uddoktapay.com/';
// $apiKEY = '982d381360a69d419689740d9f2e26ce36fb7a50';

$conn = mysqli_connect($servername_server, $username_server, $password_server,$db_server);
if($conn){
   // echo "Done";
}
else{
	die( "Not");
}
?>