<?php
if(!isset($_SESSION)){ session_start();};
include("db.php");
 if (isset($_SESSION['asmlogin'])){
$session_admin=$_SESSION['asmlogin'];


 }
  else{
      header("location:../master/index");
  }
  

 $namesesduser =$_SESSION['asmlogin'];
    $sql="SELECT * FROM `admin_login` WHERE admin_email='$namesesduser'";
    $run=mysqli_query($conn,$sql);

    if(mysqli_num_rows($run)<1)
    {
        header("location:../master/index");
    }
else{
  
    $count=0;
    while($data=mysqli_fetch_assoc($run))
    {
        $count++;
        ?>
        <?php $adminname= $data['admin_anme']; ?>
        <?php $adminemail= $data['admin_email']; ?>
        
        
        <?php
        }
        }
        ?>
 