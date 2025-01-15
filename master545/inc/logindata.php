<?php  
 if(!isset($_SESSION)){ session_start();};
include("db.php");
 if(isset($_POST["Email_login"]))  
 {  
      $Email_login = mysqli_real_escape_string($conn, $_POST["Email_login"]);  
      $password_login = mysqli_real_escape_string($conn, $_POST["password_login"]);
  $passsjs=md5($password_login);
      $result = mysqli_query($conn,"SELECT * FROM `admin_login` WHERE  admin_email='$Email_login' && admin_password='$passsjs'");
      $count=mysqli_num_rows($result);
        // $count=1;
      if($count==1){
        $_SESSION['asmlogin']="$Email_login";
        ?>

<p class="alert alert-success">Login SuccessFull</p>
<script>
window.open('../master545/Dashboard','_self');
    </script>
<?php

      }
else{
?>

    <p class="alert alert-danger">Login Failed</p>

    <?php
}
     
 }  
 ?>  

