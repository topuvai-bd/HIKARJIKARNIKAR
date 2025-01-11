<?php
include("db.php");
 if(isset($_POST["roomcode"]))  
 {  
    $code=$_POST['roomcode'];
    $GameRoom=$_POST['gameroomID'];
    $code = mysqli_real_escape_string($conn, $_POST["roomcode"]);
    $GameRoom = mysqli_real_escape_string($conn, $_POST["gameroomID"]);
    $sql="UPDATE `create_game` SET roomcode='$code' WHERE gameidrandom='$GameRoom'";
    $response = mysqli_query($conn, $sql);
    if($response){
        // SELECT `id`, `playername1`, `playerid1`, `playermobilenumber1`, `playerroom_code1`, `player_gameid1`, `playerscreenshot1`, `playercancelreason1`, `playerstatus1`, `player_date1`, `playername2`, `playerid2`, `playermobilenumber2`, `playerroom_code2`, `player_gameid2`, `playerscreenshot2`, `playercancelreason2`, `playerstatus2`, `player_date2`, `rand`, `status` FROM `resultupload` WHERE 1
        $sqlr125 = "UPDATE `resultupload` SET playerroom_code1='$code' WHERE player_gameid1='$GameRoom'";
        $runr125=mysqli_query($conn,$sqlr125);
        if($runr125){
            echo "200";
            die();
        }
    }else{
        echo "120";
        die();
    }

}
echo '400';
die();
