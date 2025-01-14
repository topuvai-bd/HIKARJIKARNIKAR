<?php 
// firstname=TopuVai&txnid=ORD3347919284&email=U9661255&phone=01400815518&productinfo=ORD8750607479&amount=50&moneyadd=

require_once '../config.php';
if(isset($_GET['amount']) && isset($_GET['phone']) ){
    $amount = $_GET['amount'];
    $phone = $_GET['phone'];
    header("Location: ".PAY_URL."?amount=".$amount."&phone=".$phone);
    exit();
}
echo "Not Valid Request";

?>