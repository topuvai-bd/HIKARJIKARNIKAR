<?php
if(!isset($_SESSION)){ session_start();};
 if (isset($_SESSION['finalplayer'])){
$session_admin=$_SESSION['finalplayer'];


 }
  else{
      header("location:  ".BASEURL."/../login");
    //   header("location:  ../login");
  }
  
  ?>
  