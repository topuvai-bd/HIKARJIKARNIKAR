<?php   
include("db.php");
include("refer_comision.php");
 if(isset($_POST["fname"]))  
 {  
       
      $fname = mysqli_real_escape_string($conn, $_POST["fname"]);  
      $mobile = mysqli_real_escape_string($conn, $_POST["mobile"]); 
      $password = mysqli_real_escape_string($conn, $_POST["password"]); 
      $refrelcode = mysqli_real_escape_string($conn, $_POST["refrelcode"]); 
      $dys=md5($password);
     $ddg="U".rand(100000,9999999);
     $orderfddf="ORD".rand(10000000,9999999999);
     $datesdh=date("d/M/Y");
     
$sqlsd="SELECT * FROM `user_regist` WHERE userrandcode='$refrelcode'";
    $runsd=mysqli_query($conn,$sqlsd);

    if(mysqli_num_rows($runsd)<1)
    {
      // header("Location:../");
    }
else{
  
    $count=0;
    while($data6=mysqli_fetch_assoc($runsd))
    {
        $count++;
       $user_Name=$data6['user_Name'];
         $user_number=$data6['user_number'];
          $userrandcode=$data6['userrandcode'];
         $refertype="Refer";
         
         $insertdatas="INSERT INTO `referwallate`(`username_player`, `number_player`, `usercode_player`, `amount_player`, `order_number`, `date_player`, `status`,`product_info`,`txn`,`type2`) VALUES ('$user_Name','$user_number','$userrandcode','$refercommisions','$orderfddf','$datesdh','success','C','$orderfddf','$refertype')";
$hfjg=mysqli_query($conn,$insertdatas);
         
         
    }
}

     
     
     
     $result = mysqli_query($conn,"SELECT * FROM `user_regist` WHERE  user_number='$mobile'");
$count=mysqli_num_rows($result);
if($count==1)
{
    
    ?>
        <p class="alert alert-danger">Hi, <?php echo $fname; ?> <?php echo $refercommisions;?> Account Already Exists <a href="login">Login</a></p>
    
    <?php
}
   else{
      $query = "INSERT INTO user_regist(`user_Name`, `user_number`, `user_passw`, `refrel_id`, `userrandcode`,`refercomissionamount`,`extradate`) VALUES 
      ('".$fname."', '".$mobile."','".$dys."', '".$refrelcode."', '".$ddg."', '".$refercommisions."', '".$datesdh."')";  
      if(mysqli_query($conn, $query))  
      { 
          ?> 
        <p class="alert alert-success">Hi, <?php echo $fname; ?> Account SuccessFully Created Please <a href="login">Login</a></p>

        <?php
          
      } 
   }
 }  
 ?>  