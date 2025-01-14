<?php 
include("db.php");
include("pgsessionredirect.php");
if(!isset($_POST['gamecode'])){
    die("200");
}
$gmgame = $_POST['gamecode'];
$sql="SELECT roomcode FROM `create_game` WHERE gameidrandom='$gmgame'";
$run=mysqli_query($conn,$sql);
if(mysqli_num_rows($run)>0){
    while($data=mysqli_fetch_assoc($run)){
        if($data['roomcode']==""){
            echo "200";
        }
        else{
            echo $data['roomcode'];
        }
    }
}
else{
    echo "200";
}












?>