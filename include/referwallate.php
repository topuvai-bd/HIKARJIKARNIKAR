<?php
include "db.php";
if (!isset($_SESSION)) {session_start();}
$amountaddr1 = 0;
if(isset($_SESSION['finalplayer'])){
    $namesesduser = $_SESSION['finalplayer'];

    $sqlr1 = "SELECT * FROM `referwallate` WHERE number_player='$namesesduser' && product_info='C' && status='success' ";
    $runr1 = mysqli_query($conn, $sqlr1);
    $amountadddr1 = 0;
    if (mysqli_num_rows($runr1) < 1) {
        // header("Location:../");
    } else {

        $count = 0;
        while ($datar1 = mysqli_fetch_assoc($runr1)) {
            $count++;

            //   echo $data['amount_player'];
            $amountadddr1 += $datar1['amount_player'];

        }
    }
    $sqlsr1 = "SELECT * FROM `referwallate` WHERE number_player='$namesesduser' && product_info='D' && status='success'";
    $runsr1 = mysqli_query($conn, $sqlsr1);
    $amountaddsr1 = 0;
    if (mysqli_num_rows($runsr1) < 1) {
        // header("Location:../");
    } else {

        $count = 0;
        while ($datasr1 = mysqli_fetch_assoc($runsr1)) {
            $count++;
            $amountaddsr1 += $datasr1['amount_player'];

        }
    }


}
$amountaddr1 = $amountadddr1 - $amountaddsr1;
