<?php
if(!isset($_SESSION)){ session_start();};
include("db.php");
if(isset($_POST['loginnumber'])){
$mobiled = $_POST['loginnumber'];
$otpd=$_POST['otpd'];
$rdt=md5($otpd);
$result = mysqli_query($conn,"SELECT * FROM `user_regist` WHERE  user_number='$mobiled' && user_passw='$rdt'");
$count=mysqli_num_rows($result);
if($count==1)
{
 $_SESSION['finalplayer']="$mobiled";
 $asdf = setcookie('finalplayer',$mobiled, time()+60*60*24*30);
	/*print_r($_COOKIE['finalplayer']);
	print_r($_SESSION['finalplayer']);
	die();*/
 ?>
 <p class="alert alert-success">Login SuccessFull</p>
      <script>
         window.open('index','_self');
     </script>
 <?php
// header("Location:index.php");
}else{
    ?>
<p class="alert alert-danger">Invaild Login Details </p>

<?php
}
}


?>