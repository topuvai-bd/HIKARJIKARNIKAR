<?php 
require_once('db.php');
$url=CALLBACK_WEBHOOK;
$data = array('amount' => 200, 'user_id6' => '01400815518');
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
}else{
    echo "Payment Success but failed to update status in server Error: ".$result;
}



?>