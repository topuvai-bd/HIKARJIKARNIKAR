<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php   
include("db.php");
include("pgsessionredirect.php");
include("wlpageredirection.php");
include("../wining_charges.php");
if(!isset($_SESSION)){ session_start();};
 if(isset($_GET["amnt"]))  
 {  
     $amounst=$_GET['amnt'];
     $gamcode=$_GET['gamcode'];
    // $amounst = mysqli_real_escape_string($conn, $_POST["amounst"]);  
     // $gamcode = mysqli_real_escape_string($conn, $_POST["gamcode"]);  
    /*  if($amount < 20){
         ?>
           <p class="alert alert-danger">Sorry, Minimum Battle 20Rs. Create</p>
         <?php
      }
      else{*/
       if($amounst > $amountadd){
         ?>
         
         <script>
             alert("Balance is Low Please Reacharge Wallat")
             window.open("../manualaddcash", "_self")
         </script>
         
         <?php
     }
     else{
     
     $winnnigamount=$amounst*2;
      $dys=md5($password);
      $datesdh=date("d/M/Y");
    // $ddg="B".rand(10000000,9999999999);
      $dabit="D".rand(10000,9999999);
     
     $battles="UPDATE `create_game` SET `sname`='$playername',`snumber`='$playernumber',`suserid`='$userrandcode',`game_status`='2' WHERE gameidrandom='$gamcode'";
     
      if(mysqli_query($conn, $battles))  
      { 
          
           $insertdatas="INSERT INTO `addwallate_playe`(`username_player`, `number_player`, `usercode_player`, `amount_player`, `order_number`, `date_player`, `status`,`product_info`,`txn`,`type1`) VALUES ('$playername','$playernumber','$userrandcode','$amounst','$dabit','$datesdh','success','D','$dabit','Game')";
          $hfjg=mysqli_query($conn,$insertdatas);
          
		  //update in result upload table
		  $battles=mysqli_query($conn, "UPDATE `resultupload` SET `playername2`='$playername',`playermobilenumber2`='$playernumber',`playerid2`='$userrandcode', `player_gameid2`='$gamcode' WHERE player_gameid1='$gamcode'");
          ?> 
         <script>
             window.open("../gam","_self");
          </script>
        <p class="alert alert-success">Hi, <?php echo $playername; ?> Battle Accepted ! Thank You
</p>

        <?php
          
      } 
     
     
     }
 }
 
  ?>