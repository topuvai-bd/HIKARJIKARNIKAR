<?php   
include("db.php");
include("include/pgsessionredirect.php");
 if(isset($_POST["name"]))  
 {  
 $name = mysqli_real_escape_string($conn, $_POST["name"]);  
      $phoneno = mysqli_real_escape_string($conn, $_POST["phoneno"]); 
      $querys = mysqli_real_escape_string($conn, $_POST["query"]); 
      $message = mysqli_real_escape_string($conn, $_POST["message"]); 
      $User="User";
     $ddg="T".rand(100000,9999999);
     $query = "INSERT INTO contact_data(`username_id`, `user_number`, `resons`, `user_code`, `userlogin_number`,`typeuser`,`ticketnumber`,`message`) VALUES 
      ('".$name."', '".$phoneno."','".$querys."', '".$userrandcode."', '".$playernumber."', '".$User."','".$ddg."', '".$message."')";  
      if(mysqli_query($conn, $query))  
      { 
          ?> 
        <p class="alert alert-success">Hi, <?php echo $name; ?> Message SuccessFully Sent </p>

        <?php
          
   }
 }  
 ?>  