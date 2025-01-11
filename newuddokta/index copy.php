<?php

if (!isset($_SESSION)) {
	if(!isset($_SESSION)){ session_start();};
}

require_once('../db.php');

// 01400815518 SELECT `id`, `username_player`, `number_player`, `usercode_player`, `amount_player`, `product_info`, `date_player`, `status`, `date`, `order_number`, `txn`, `bc`, `type1`, `type2`, `img_url`, `method`, `pnum` FROM `addwallate_playe` WHERE 1

// add wallte 50 tk
$sql = "INSERT INTO `addwallate_playe`(`username_player`, `number_player`, `usercode_player`, `amount_player`, `product_info`, `date_player`, `status`, `date`, `order_number`, `txn`, `bc`, `type1`, `type2`, `img_url`, `method`, `pnum`) 
VALUES ('TopuVai','01400815519','U2927771','500','C','2021-09-01','success','2021-09-01 12:00:00','ORD123456','TXN123456','BC123456','type1','type2','img_url','method','pnum')";
$resulta = $conn->query($sql);
if($resulta){
    echo "success";
}else{
    echo "fail";
}
