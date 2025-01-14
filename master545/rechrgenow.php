<?php   
include("inc/db.php");
 if(isset($_POST["amount"]))  
 {  
 
      $names = mysqli_real_escape_string($conn, $_POST["names"]);  
      $number = mysqli_real_escape_string($conn, $_POST["number"]); 
      $playerid = mysqli_real_escape_string($conn, $_POST["playerid"]); 
      $amount = mysqli_real_escape_string($conn, $_POST["amount"]); 
      $datejoinds=date("d/M/Y");
      $order= 'ORD'.rand(10000000,9999999999);
      $C="C";
      $success="success";
      $query = "INSERT INTO addwallate_playe(`username_player`, `number_player`, `usercode_player`, `amount_player`, `product_info`,`date_player`,`order_number`,`txn`,`status`) VALUES 
      
      ('".$names."', '".$number."','".$playerid."', '".$amount."', '".$C."', '".$datejoinds."', '".$order."', '".$order."', '".$success."')";  
      if(mysqli_query($conn, $query))  
      { 
          ?> 
        <p class="alert alert-success">Hi, <?php echo $names; ?> Wallat Recharge SuccessFully || Thank You</p>

        <?php
   }
 }  
 ?>  
