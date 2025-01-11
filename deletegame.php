<?php include("Header.php");
include("include/pgsessionredirect.php");
include("include/wlpageredirection.php");
include("wining_charges.php");
$gamcode=$_GET['gamcode'];
$amnt=$_GET['amnt'];
$ludotypssfjffd=$_SESSION['sessionludotype'];
if(isset($_GET['gamcode'])){
     $order="ORD".rand(100000000000,9999999999999999);
     $datejoinds=date("d/M/Y");
     
     
     
       $result = mysqli_query($conn,"SELECT * FROM `addwallate_playe` WHERE  bc='$gamcode' ");
      $count=mysqli_num_rows($result);
      if($count==1){
      }
      else{
     
$q = " DELETE FROM `create_game` WHERE gameidrandom='$gamcode' ";
if(mysqli_query($conn, $q)){
 $insertdatas="INSERT INTO `addwallate_playe`(`username_player`, `number_player`, `usercode_player`, `amount_player`, `order_number`, `date_player`, `status`,`product_info`,`txn`,`bc`,`type1`) VALUES ('$playername','$playernumber','$userrandcode','$amnt','$order','$datejoinds','success','C','$order','$gamcode','Game')";
$hfjg=mysqli_query($conn,$insertdatas);   
if(isset($hfjg)==TRUE){
    $amountwgamefhfsf=$amnt*$winncharges/100;
 $dabitc="D".rand(100000,99999999);
$admearning="INSERT INTO `adminearning`(`earningamount`, `typeC_d`, `TXNID`, `date`, `usernumber`,`kaha`) VALUES ('$amountwgamefhfsf','D','$dabitc','$datejoinds','$playernumber','Game_Refund')";
$dffhh=mysqli_query($conn,$admearning);
    ?>
    <script>
window.open('battle.php?type=<?php echo $ludotypssfjffd;?>','_self');
    </script>
    <?php
}
}
}
}


?>