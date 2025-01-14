<?php include("header.php");
$stlt=$_GET['stlt'];
$number=$_GET['number'];
$status=$_GET['status'];
$id=$_GET['id'];
if($status=="T"){
 $q = "update sattlement_request set status='2' where player_phone='$number' && player_sattlementid='$stlt' && id='$id'";
 $query = mysqli_query($conn,$q);
 
 if($query==TRUE){
     ?>
     <script>
window.open('walltesattalment','_self');
     </script>
     
     <?php
 }
    
}

if($status=="P"){
 $q = "update sattlement_request set status='1' where player_phone='$number' && player_sattlementid='$stlt' && id='$id'";
 $query = mysqli_query($conn,$q);
 
 if($query==TRUE){
     ?>
     <script>
window.open('walltesattalment','_self');
     </script>
     
     <?php
 }
    
}
if($status=="C"){
 $q = "update sattlement_request set status='3' where player_phone='$number' && player_sattlementid='$stlt' && id='$id'";
 $query = mysqli_query($conn,$q);
 
 // refund amount to user
    $sql="SELECT * FROM `sattlement_request` WHERE player_phone='$number' && player_sattlementid='$stlt' && id='$id'";
    $run=mysqli_query($conn,$sql);
    // $names = mysqli_real_escape_string($conn, $_POST["names"]);  
    //   $number = mysqli_real_escape_string($conn, $_POST["number"]); 
    //   $playerid = mysqli_real_escape_string($conn, $_POST["playerid"]); 
    //   $amount = mysqli_real_escape_string($conn, $_POST["amount"]); 
    //   $datejoinds=date("d/M/Y");
    //   $order= 'ORD'.rand(10000000,9999999999);
    //   $C="C";
    //   $success="success";
    //   $query = "INSERT INTO addwallate_playe(`username_player`, `number_player`, `usercode_player`, `amount_player`, `product_info`,`date_player`,`order_number`,`txn`,`status`) VALUES 
      
    //   ('".$names."', '".$number."','".$playerid."', '".$amount."', '".$C."', '".$datejoinds."', '".$order."', '".$order."', '".$success."')";  
    //   if(mysqli_query($conn, $query))  
    //   { 
    //   }
    $data=mysqli_fetch_assoc($run);
    $names = $data['playername'];
    $number = $data['player_phone'];
    $playerid = $data['playeruserid'];
    $amount = $data['playeramount'];
    $datejoinds=date("d/M/Y");
    $order= 'ORD'.rand(10000000,9999999999);
    $C="C";
    $success="success";
    $query = "INSERT INTO addwallate_playe(`username_player`, `number_player`, `usercode_player`, `amount_player`, `product_info`,`date_player`,`order_number`,`txn`,`status`) VALUES 
      
      ('".$names."', '".$number."','".$playerid."', '".$amount."', '".$C."', '".$datejoinds."', '".$order."', '".$order."', '".$success."')";  
      if(mysqli_query($conn, $query))  
      { 
      }
      



 if($query==TRUE){
     ?>
     <script>
window.open('walltesattalment','_self');
     </script>
     
     <?php
 }
    
}


?>

