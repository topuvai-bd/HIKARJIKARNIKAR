<?php   
include("db.php");
include("pgsessionredirect.php");
include("../wining_charges.php");

if (!isset($_SESSION)) {
    session_start();
}

$namesesduser = $_SESSION['finalplayer'];
$amountaddg = 0;
$amountaddf = 0;

// Query for product_info = 'C'
$sqld = "SELECT * FROM `addwallate_playe` WHERE number_player='$namesesduser' AND product_info='C' AND status='success'";
$rund = mysqli_query($conn, $sqld);

if (mysqli_num_rows($rund) > 0) {
    while ($datad = mysqli_fetch_assoc($rund)) {
        $amountaddg += (int)$datad['amount_player'];
    }
}

// Query for product_info = 'D'
$sql = "SELECT * FROM `addwallate_playe` WHERE number_player='$namesesduser' AND product_info='D' AND status='success'";
$run = mysqli_query($conn, $sql);

if (mysqli_num_rows($run) > 0) {
    while ($data = mysqli_fetch_assoc($run)) {
        $amountaddf += (int)$data['amount_player'];
    }
}

if (isset($_POST["amount"])) {  
    if ($_POST["amount"] < 10 || $_POST["amount"] >= 100000) {
        echo "<script>alert('Invalid Amount! Amount should be greater than 10 and less than 100000.')</script>";
    } else {
        if ($_POST["amount"] % 10) {
            echo "<script>alert('Domination of 10! Set battle domination of 10 like 10, 100, 150, 200 and so on up to 100000.')</script>";
        } else {
            $amountadd = $amountaddg - $amountaddf;
            $amount = mysqli_real_escape_string($conn, $_POST["amount"]);  
            // $roomcode = mysqli_real_escape_string($conn, $_POST["code"]);  
            $gametype = mysqli_real_escape_string($conn, $_POST["gametype"]);  
            $dfgdfg = $amount * 2;
            $totaladminswinnig = $dfgdfg * $winncharges / 100;
            $winnnigamount = $dfgdfg - $totaladminswinnig;

            if ($amount > $amountadd) {
                echo "<p class='alert alert-danger'>Sorry, wallet $amountadd Balance is Low <a href='../manualaddcash'>Add Money</a></p>";
            } else {
                $datesdh = date("d/M/Y");
                $ddg = "B" . rand(10000000, 9999999999);
                $dabit = "D" . rand(10000, 9999999);
                // $token = $roomcode;
                $token = '';

                $battles = "INSERT INTO `create_game`(`gameidrandom`, `fname`, `fnumber`, `fuserid`, `game_amount`, `winning_amount`, `date`, `ludotype`, `roomcode`, `earning`) VALUES ('$ddg', '$playername', '$playernumber', '$userrandcode', '$amount', '$winnnigamount', '$datesdh', '$gametype', '$token', '$totaladminswinnig')";
     
                if (mysqli_query($conn, $battles)) {
                    $battel_result_table = mysqli_query($conn, "INSERT INTO `resultupload`(`playername1`, `playerid1`, `playermobilenumber1`, `playerroom_code1`, `player_gameid1`) VALUES ('$playername', '$userrandcode', '$playernumber', '$token', '$ddg')");
                    $_SESSION['icreategame'] = "Battle Successfully Created";
                    $insertdatas = "INSERT INTO `addwallate_playe`(`username_player`, `number_player`, `usercode_player`, `amount_player`, `order_number`, `date_player`, `status`, `product_info`, `txn`, `type1`) VALUES ('$playername', '$playernumber', '$userrandcode', '$amount', '$dabit', '$datesdh', 'success', 'D', '$dabit', 'Game')";
                    $hfjg = mysqli_query($conn, $insertdatas);

                    // $amountwgamefhfsf = $amount * $winncharges / 100;
                    // $dabitc = "C" . rand(100000, 99999999);
                    // $admearning = "INSERT INTO `adminearning`(`earningamount`, `typeC_d`, `TXNID`, `date`, `usernumber`, `kaha`) VALUES ('$amountwgamefhfsf', 'C', '$dabitc', '$datesdh', '$playernumber', 'Game')";
                    // $dffhh = mysqli_query($conn, $admearning);
          
                    echo "<p class='alert alert-success'>Hi, $playername Battle Successfully Created</p>";
                }
            }
        }
    }
}
?>
