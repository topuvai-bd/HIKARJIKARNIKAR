<?php
include("db.php");
if(!isset($_SESSION)){ session_start();};
 $namesesduser =$_SESSION['finalplayer'];
    $sqlr12="SELECT * FROM `game_commission` WHERE type='Game' && id='1' ";
    $runr12=mysqli_query($conn,$sqlr12);

    if(mysqli_num_rows($runr12)<1)
    {
      // header("Location:../");
    }
else{
  
    $count=0;
    while($datar12=mysqli_fetch_assoc($runr12))
    {
        $count++;

        ?>
        <?php  $admincommission= $datar12['amount']; ?>
       
        
        
        <?php
        }
        }
        ?>
        
       