<?php
if(!isset($_SESSION)){ session_start();};
include("db.php");
if(isset($_POST['mobile'])){
$mobile = $_POST['mobile'];
$result = mysqli_query($conn,"SELECT * FROM `user_regist` WHERE  user_number='$mobile'");
$count=mysqli_num_rows($result);
if($count==1)
{
 $_SESSION['palyer']="$mobile";
  $nunbsr=$_SESSION['palyer'];
  //$randcode=rand(10000,999999);
 $q = "update user_regist set otpd='123456' where user_number='$nunbsr'";
$query = mysqli_query($conn,$q);
	$username = "99deepakgautam@gmail.com";
	$hash = "5868496c10e8c7c122e77dfa29949b37c59f5691c200bf252b11c79491f5374e";
	$test = "0";
	$sender = "DPKGTM"; 
	$numbers = "$nunbsr"; 
	$message = "HI, WELCOME TO ALRIGHT SOLUTION YOUR OTP IS 123456 . THANK FOR USING ALRIGHT Powered by Deepak";
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); 
	curl_close($ch);
//echo $response;
 ?>
 <script>
window.open('otp.php','_self');
     </script>
 <?php
}
else{
    ?>
<p class="alert alert-danger">Invaild Login Mobile Number </p>

<?php
}
}
?>
<?php
if(isset($_POST['secondmobile'])){
$mobiledds = $_POST['secondmobile'];
$result = mysqli_query($conn,"SELECT * FROM `user_regist` WHERE  user_number='$mobiledds'");
$count=mysqli_num_rows($result);
if($count==1)
{
 $_SESSION['palyer']="$mobiledds";
  $nunbsr=$_SESSION['palyer'];
 // $randcode=rand(10000,999999);
 $q = "update user_regist set otpd='123456' where user_number='$nunbsr'";

 $query = mysqli_query($conn,$q);
	$username = "99deepakgautam@gmail.com";
	$hash = "5868496c10e8c7c122e77dfa29949b37c59f5691c200bf252b11c79491f5374e";

	$test = "0";
	$sender = "DPKGTM";
	$numbers = "$nunbsr";
	$message = "HI, WELCOME TO ALRIGHT SOLUTION YOUR OTP IS 123456 . THANK FOR USING ALRIGHT Powered by Deepak";
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); 
	curl_close($ch);
//echo $response;
 
?>
 
 <p class="alert alert-success">OTP Resent SuccessFully</p>
 <script>
window.open('otp.php','_self');
     </script>
 <?php
// header("Location:index.php");
}
else{
    ?>
<p class="alert alert-danger">Invaild Login Mobile Number </p>

<?php
}
}


?>
