<?php
include("inc/db.php");
 if(
    isset($_POST["amount"]) && isset($_POST["usernumber"]) &&
    isset($_POST["operation"]) && isset($_POST["type"])
    ) 
 {  
    $Amount=$_POST['amount'];
    $UserNumber=$_POST['usernumber'];
    $Amount = mysqli_real_escape_string($conn, $Amount);
    $UserNumber = mysqli_real_escape_string($conn, $UserNumber);
    $Operation=$_POST['operation'];
    $Type=$_POST['type'];
    // type 1 = normal, 0 = winning
    // operation 1 = add, 0 = minus

    $sql="SELECT * FROM `user_regist` WHERE user_number='$UserNumber'";
    $run=mysqli_query($conn,$sql);
    $data=mysqli_fetch_assoc($run);
    $UserBalance=$data['user_balance'];
    $userName = $data['user_Name'];
    $userNumber = $data['user_number'];
    $userCode = $data['userrandcode'];
    $datejoinds=date("d/M/Y");
    $order= 'ORD'.rand(10000000,9999999999);
    $C="C";
    if($Operation == '0'){
        $C="D";
    }
    
    $success="success";
    if($Type == '1'){
        $query = "INSERT INTO addwallate_playe(`username_player`, `number_player`, `usercode_player`, `amount_player`, `product_info`,`date_player`,`order_number`,`txn`,`status`) VALUES 
        
    
    ('".$userName."', '".$userNumber."','".$userCode."', '".$Amount."', '".$C."', '".$datejoinds."', '".$order."', '".$order."', '".$success."')";  
    }else if($Type == '0') {
        $query = "INSERT INTO referwallate(`username_player`, `number_player`, `usercode_player`, `amount_player`, `product_info`,`date_player`,`order_number`,`txn`,`status`) VALUES 
        
    
    ('".$userName."', '".$userNumber."','".$userCode."', '".$Amount."', '".$C."', '".$datejoinds."', '".$order."', '".$order."', '".$success."')";  
    }else {
        echo '400: type not found';
        die();
    }
    if(mysqli_query($conn, $query)){
        echo "200";
        die();
    }

}
echo '400';
die();
