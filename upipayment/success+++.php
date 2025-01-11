<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >

<div class="container">
<?php
include("../db.php");
if(isset($_POST['txnid'])){
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="";

 $q = "update addwallate_playe set status='$status', txn='$txnid' where order_number='$productinfo'";

 $query = mysqli_query($conn,$q);
// Salt should be same Post Request 

If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  } else {
        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
         }
		 $hash = hash("sha512", $retHashSeq);
       if ($hash != $posted_hash) {
		   ?>
		   <table class="table"border="1">
		   <tr>
		   <td colspan="2">
		    <?php if($status=="failure"){
		        echo '<p class="btn btn-danger w-100">Payment Failure Try Again</p>';
		   
		   }
		   if($status=="success"){
		       
		        echo '<p class="btn btn-success w-100">Thank You Payment SuccessFully</p>';
		   
		   }
		   ;?>
		   
		   </td>
		   </tr>
		   <tr>
		   <td colspan="2"style="font-weight:bold;font-size:20px;"><?php echo $firstname;?></td>
		   </tr>
		     <tr>
		   <td>Your User ID:</td>
		   <td><?php echo $email;?></td>
		   </tr>
		   <tr>
		   <td>Your Transaction ID Is:</td>
		   <td><?php echo $txnid;?></td>
		   </tr>
		     <tr>
		   <td>Your order status is:</td>
		 
		   
		   <td>
		         <?php if($status=="failure"){
		        echo '<p class="text-danger">failure<p>';
		   
		   }
		   if($status=="success"){
		        echo '<p class="text-green">success<p>';
		   
		   }
		   ;?>
		   
		       
		       
		       
		       </td>
		   </tr>
		     <tr>
		   <td>We have received a payment of Rs:</td>
		   <td>&#8377;<?php echo $amount;?></td>
		   </tr>
		     <tr>
		   <td><a href="../index.php" class="btn btn-primary">Dashboard</a></td>
		   </tr>
		   
		   
		   </table>
		   
		   
		   <?php
           
		   }
		   }
		   else {
			   header("Location:/");
		   }
		   ?>
		   <title><?php echo $status;?></title>