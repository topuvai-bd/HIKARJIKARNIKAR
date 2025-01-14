<?php
if(!isset($_SESSION)){ session_start();};
 if (isset($_SESSION['finalplayer']) || isset($_COOKIE['finalplayer'])){
	 if(isset($_SESSION['finalplayer'])){
		 $session_admin=$_SESSION['finalplayer'];
	 }
	 if(isset($_COOKIE['finalplayer'])){
		 $session_admin=$_COOKIE['finalplayer'];
	 }
 }else{
      header("location:../");
  }
  
 ?>
  
<?php
   include("db.php");
?>

<?php
    if(isset($_SESSION['finalplayer'])){
		$namesesduser =$_SESSION['finalplayer'];
	 }
	 if(isset($_COOKIE['finalplayer'])){
		$namesesduser =$_COOKIE['finalplayer'];
	 }
 
    $sql="SELECT * FROM `user_regist` WHERE user_number='$namesesduser'";
    $run=mysqli_query($conn,$sql);

    if(mysqli_num_rows($run)<1)
    {
       header("Location:../");
    }else{
       $count=0;
		while($data=mysqli_fetch_assoc($run))
		{
        	$count++;
        ?>
        	<?php $playername= $data['user_Name']; $profile_img=$data['profile'] ?>
        	<?php $playerrefrealidjoin= $data['refrel_id']; ?>
        	<?php $userrandcode= $data['userrandcode']; ?>
        	<?php $datejoin= $data['datejoin']; ?>
        	 <?php $playernumber= $data['user_number']; ?>
        
        
        <?php
        }
    }
        ?>
 