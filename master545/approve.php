<?php include("header.php");
$status=$_GET['status'];
$number=$_GET['number'];
$idkyc=$_GET['idkyc'];
if($status=="Approve"){
 $q = "update kyc_details set sttaus='2' where kyccode='$idkyc'";
 $query = mysqli_query($conn,$q);
 
  $qs = "update user_regist set kyc='Approve' where user_number='$number'";
 $queryx = mysqli_query($conn,$qs);
 if($queryx==TRUE){
     ?>
     <script>
window.open('kyc_request.php','_self');
     </script>
     
     <?php
 }
    
}


if($status=="Disapprove"){
 $q = "update kyc_details set sttaus='1' where kyccode='$idkyc'";
 $query = mysqli_query($conn,$q);
 
  $qs = "update user_regist set kyc='Disapprove' where user_number='$number'";
 $queryx = mysqli_query($conn,$qs);
 if($queryx==TRUE){
     ?>
     <script>
window.open('kyc_request.php','_self');
     </script>
     
     <?php
 }
    
}

?>

