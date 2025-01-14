<?php
include "db.php";
include "include/wlpageredirection.php";
// include("include/referwallate.php");
include "include/pgsessionredirect.php";
include "satalment_charges.php";
if (isset($_POST["with_number"]) && isset($_POST["with_amount"]) && isset($_POST["with_method"])) {
    $sql = "SELECT * FROM `Sattelment_cahrges` Order BY id DESC";
    $run = mysqli_query($conn, $sql);

    if (mysqli_num_rows($run) < 1) {
        $amnd = '0';
    } else {

        $count = 0;
        while ($data = mysqli_fetch_assoc($run)) {
            $count++;

            $amnd = $data['amount'];
        }
    }
    // $txtvalue = mysqli_real_escape_string($conn, $_POST["txtvalue"]); // amount with_amount with_method with_number
    // $txtvalueUPI = mysqli_real_escape_string($conn, $_POST["txtvalueUPI"]);
    $withdrawNumber = mysqli_real_escape_string($conn, $_POST["with_number"]);
    $withdrawAmount = mysqli_real_escape_string($conn, $_POST["with_amount"]);
    $withdrawMethod = mysqli_real_escape_string($conn, $_POST["with_method"]);
    $txtvalue = $withdrawAmount;
    $txtvalueUPI = $withdrawNumber." (".$withdrawMethod.")";
    $ddg = "ST" . rand(1000000, 99999999);
    $txns = "ORD" . rand(1000000, 99999999);
    $d = "D";
    $success = "success";

    $finalamountd = $txtvalue * $amnd / 100;
    $dfshdfh = $txtvalue - $finalamountd;
    if ($txtvalue > $amountadd || $txtvalue < 150 || $txtvalue > 10000) {
        ?>
<p class="alert alert-danger">Balance is, <?php echo $txtvalue; ?> Low or Not Valid</p>
<?php
} else {
        $query = "INSERT INTO sattlement_request(`playername`, `player_phone`, `playeruserid`, `playeramount`, `player_sattlementid`,`sattlement_charge`,`famunt`) VALUES
      ('" . $playername . "', '" . $playernumber . "','" . $userrandcode . "', '" . $txtvalue . "', '" . $txtvalueUPI . "', '" . $amnd . "', '" . $dfshdfh . "')";
        mysqli_query($conn, $query);

        $manwallt = "INSERT INTO `addwallate_playe`(`username_player`, `number_player`, `usercode_player`, `amount_player`, `product_info`, `date_player`, `status`, `order_number`, `txn`) VALUES ('" . $playername . "', '" . $playernumber . "', '" . $userrandcode . "', '" . $txtvalue . "', '" . $d . "', '" . $playernumber . "', '" . $success . "', '" . $txns . "','" . $txns . "')";
        $dfsf = mysqli_query($conn, $manwallt);

        if ($dfsf = true) {
            $amountwgamefhfsf = $txtvalue * $amnd / 100;
            $dabitc = "C" . rand(100000, 99999999);
            $dateyshg = date("d/M/Y");
            $admearning = "INSERT INTO `adminearning`(`earningamount`, `typeC_d`, `TXNID`, `date`, `usernumber`,`kaha`) VALUES ('$amountwgamefhfsf','C','$dabitc','$dateyshg','$playernumber','Settlement')";
            $dffhh = mysqli_query($conn, $admearning);

            ?>
<p class="alert alert-success">Hi, <?php echo $playername; ?> Sattelment Request SuccessFully </p>

<?php

        }
    }

}
?>