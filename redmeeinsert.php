<?php 
// get post mainamount amount from post isset
if(isset($_POST['mainamount']) && isset($_POST['amount']) && is_numeric($_POST['amount']) )
{
    // get post mainamount amount from post isset
    $mainamount = $_POST['mainamount'];
    $amount = $_POST['amount'];
    // check if amount is greater than mainamount
    if($amount > $mainamount)
    {
        // display error message
        echo "<script>alert('Not Sufficient Balance. ');</script>";
    }
    // check if amount is less than 100
    else if($amount < 100)
    {
        // display error message
        echo "<script>alert('Redeem  minimum amount ৳100.');</script>";
    }
    else
    {
        // display success message
        // echo "<strong>Success!</strong> Redeem request submitted successfully.";
        require "db.php";
        include "include/referwallate.php";
        if(isset($amountaddr1)){
            if($amount<=$amountaddr1){
                $amount = mysqli_real_escape_string($conn, $amount); // amount to be deducted
                // get player infomation for inseting data SELECT `id`, `username_player`, `number_player`, `usercode_player`, `amount_player`, `product_info`, `date_player`, `status`, `date`, `order_number`, `txn`, `bc`, `type1`, `type2` FROM `referwallate` WHERE 1
                // SELECT `id`, `user_Name`, `user_number`, `user_passw`, `refrel_id`, `userrandcode`, `datejoin`, `status`, `otpd`, `profile`, `kyc`, `refercomissionamount`, `extradate` FROM `user_regist` WHERE 1
                // $namesesduser this is user number
                $sqlr1 = "SELECT * FROM `user_regist` WHERE user_number='$namesesduser'";
                $resulta = $conn->query($sqlr1);
                $fetched =$resulta->fetch_assoc();
                $username_player = $fetched['user_Name'];
                $number_player = $fetched['user_number'];
                $usercode_player = $fetched['userrandcode'];
                $order_number = "ORD".rand(10000000,9999999999);
                $date_player = date("d/M/Y");
                $status = "success";
                $product_info = "D";
                $type2 = "Refer";
                $insertdatas="INSERT INTO `referwallate`(`username_player`, `number_player`, `usercode_player`, `amount_player`, `order_number`, `date_player`, `status`,`product_info`,`txn`,`type2`) VALUES ('$username_player','$number_player','$usercode_player','$amount','$order_number','$date_player','$status','$product_info','$order_number','$type2')";
                $hfjg=mysqli_query($conn,$insertdatas);
                // update mainamount SELECT `id`, `username_player`, `number_player`, `usercode_player`, `amount_player`, `product_info`, `date_player`, `status`, `date`, `order_number`, `txn`, `bc`, `type1`, `type2`, `img_url`, `method`, `pnum` FROM `addwallate_playe` WHERE 1
                $product_info = "C";
                $pnum = '0000';
                $sqlr1 = "INSERT INTO `addwallate_playe`(`username_player`, `number_player`, `usercode_player`, `amount_player`, `product_info`, `date_player`, `status`, `date`, `order_number`, `txn`, `bc`, `type1`, `type2`, `img_url`, `method`, `pnum`) VALUES ('$username_player','$number_player','$usercode_player','$amount','$product_info','$date_player','$status','$date_player','$order_number','$order_number','$order_number','$order_number','$order_number','$order_number','$order_number','$pnum')";
                $hfjg=mysqli_query($conn,$sqlr1);
                header("Location: redeem.php?success=1");



            }else {
                echo "<script>alert('Not Sufficient Balance ');</script>";
                
            }
                
        }else {
            echo "<script>alert('Unable to get refer money. ');</script>";
        }

    }
}




?>