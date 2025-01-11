<?php

if (!isset($_SESSION)) {
	if(!isset($_SESSION)){ session_start();};
}
if(!isset($_GET['amount'])){
    header("Location:../");
}

require_once('../db.php');

if(!isset($_SESSION['finalplayer'])){
    header("Location:../");
}
$userPhone =$_SESSION['finalplayer'];

$sql="SELECT * FROM `user_regist` WHERE user_number='$userPhone' LIMIT 1"; //SELECT `id`, `user_Name`, `user_number`, `user_passw`, `refrel_id`, `userrandcode`, `datejoin`, `status`, `otpd`, `profile`, `kyc`, `refercomissionamount`, `extradate` FROM `user_regist` WHERE 1

$result   = $conn->query($sql); 
if ($result->num_rows > 0) {
//while ($row = $result->fetch_assoc()) {}
$row = $result->fetch_assoc();
$fullName = $row["user_Name"];
$UserRandCode = $row["userrandcode"];
$playerNumber = $row["user_number"];
$amountToAdd = $_GET['amount'];
$date = date("Y-m-d H:i:s");
$status="success";
$orderNum="ORD".rand(10000000,9999999999).date("Ymd");

$sql = "INSERT INTO `addwallate_playe`(`username_player`, `number_player`, `usercode_player`, `amount_player`, `product_info`, `date_player`, `status`, `date`, `order_number`, `txn`, `bc`, `type1`, `type2`, `img_url`, `method`, `pnum`)
VALUES ('$fullName','$playerNumber','$UserRandCode','$amountToAdd','C','$date','$status','$date','$orderNum','$orderNum','$orderNum','type1','type2','','','')";
$resulta = $conn->query($sql);
if($resulta){
    echo "success";
}
}

