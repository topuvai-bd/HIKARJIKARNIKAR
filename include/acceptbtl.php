<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php   
include("db.php");
include("pgsessionredirect.php");
include("wlpageredirection.php");
include("../wining_charges.php");


function GetRoomCode() {
  $url="https://apihubs.in/api/api?roomcode=&roomtype=0&apikey=a15df920e6978f846fd15eea957405ba";
  //curl get response
  // {
  //   "status": "success",
  //   "message": "data fatched",
  //   "data": {
  //   "apikey": "63baae34e6fcc32efe65440acc0080ac",
  //   "data": {
  //   "roomcode": "01089690",
  //   "type": "classic",
  //   "created_at": "2024-12-08T17:12:09.721Z"
  //   }
  //   }
  //   }
  $cURL= curl_init($url);

  curl_setopt($cURL,CURLOPT_RETURNTRANSFER,true);
  $response=curl_exec($cURL);
  // die($response);{"status":"success","message":"data fatched","data":{"data":{"roomcode":"04488290","type":"classic","created_at":"2025-01-15T09:03:56.623Z"}}}
  if(curl_errno($cURL)){
    return "";
  }
  else {
    $response=json_decode($response, true);
    if(isset($response["status"]) && $response["status"]=="success" ){
      return isset($response["data"]["data"]["roomcode"]) ? $response["data"]["data"]["roomcode"] : "";
    }
  }
  return "";
}



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
      // $dys=md5($password);
      $datesdh=date("d/M/Y");
    // $ddg="B".rand(10000000,9999999999);
      $dabit="D".rand(10000,9999999);
      $roomcode = GetRoomCode();
      if(!empty($roomcode)){
        $battles="UPDATE `create_game` SET `sname`='$playername',`snumber`='$playernumber',`suserid`='$userrandcode',`game_status`='2',`roomcode`='$roomcode' WHERE gameidrandom='$gamcode'";
      }else {
        $battles="UPDATE `create_game` SET `sname`='$playername',`snumber`='$playernumber',`suserid`='$userrandcode',`game_status`='2' WHERE gameidrandom='$gamcode'";
      }
     
     
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
        <p class="alert alert-success">Hi, <?php echo $playername .  $roomcode ; ?> Battle Accepted ! Thank You 
</p>

        <?php
          
      } 
     
     
     }
 }
 
  ?>