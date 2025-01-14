<?php
if(!isset($_SESSION)){ session_start();};
 if (isset($_SESSION['finalplayer'])){
$session_admin=$_SESSION['finalplayer'];


 }
  else{
    if(!defined('BASEURL')){
      require_once(__DIR__."/../config.php");
    }
      header("location:  ".BASEURL."/../login");
    //   header("location:  ../login");
  }
  
  ?>
  