<?php
include "db.php";
if (!isset($_SESSION)) {session_start();}
//$namesesduser =$_SESSION['finalplayer'];
if (isset($_SESSION['finalplayer'])) {
    $namesesduser = $_SESSION['finalplayer'];
}
if (isset($_COOKIE['finalplayer'])) {
    $namesesduser = $_COOKIE['finalplayer'];
}
$dffsjh = null;
$sql = "SELECT * FROM `addwallate_playe` WHERE number_player='$namesesduser' && product_info='C' && status='success' ";
$run = mysqli_query($conn, $sql);
$amountaddd=0;
if (mysqli_num_rows($run) < 1) {
    // header("Location:../");
} else {

    $count = 0;
    while ($data = mysqli_fetch_assoc($run)) {
        $count++;

        // echo $data['amount_player'];
        $amountaddd += $data['amount_player'];
    }
}

$sqls = "SELECT * FROM `addwallate_playe` WHERE number_player='$namesesduser' && product_info='D' && status='success'";
$runs = mysqli_query($conn, $sqls);
$amountadds=0;

if (mysqli_num_rows($runs) < 1) {
    // header("Location:../");
} else {

    $count = 0;
    while ($datas = mysqli_fetch_assoc($runs)) {
        $count++;
        $amountadds += $datas['amount_player'];

    }
}

$amountadd = $amountaddd - $amountadds;

