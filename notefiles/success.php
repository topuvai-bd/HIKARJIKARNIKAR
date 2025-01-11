<?php
// $servername = "localhost";
// $username = "cxzzhvyr_ludo";
// $password = "vI0a7yojLE6Z";
// $db = "cxzzhvyr_ludo";

require_once '../include/config.php';
require_once 'config.php';
// Create connection
// $conn = new mysqli($servername, $username, $password, $db);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } else {
//     // $conn->set_charset('utf8');
// }
if (isset($_GET['transactionId'])) {
    $curl = curl_init();
    require_once 'config.php';
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://pay.drutopay.com/api/payment/verify',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{"transaction_id":"' . $_GET['transactionId'] . '"}',
        CURLOPT_HTTPHEADER => array(
            'API-KEY: ' . $appkey,
            'Content-Type: application/json',
            'SECRET-KEY: ' . $secretkey,
            'BRAND-KEY: ' . $hostName,
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    $dataArray = json_decode($response, true);
// print_r($dataArray);
// die();
// Check if decoding was successful
    if ($dataArray !== null) {

        // {
        //     "cus_name": "John Doe",
        //     "cus_email": "john@gmail.com",
        //     "amount": "900.000",
        //     "transaction_id": "OVKPXW165414",
        //     "metadata": {
        //       "phone": "015****",
        //     },
        //     "payment_method": "bkash",
        //     "status": "COMPLETED"
        // }
        //    '{"success_url":"'.$baseURL.'online/success.php","cancel_url":"'.$baseURL.'online/cancel.php","metadata":{"cus_name":"'.$_GET["userid"].'","cus_email":"'.$_GET["userid"].'@gmail.com"},"amount":"'.$_GET["amount"].'"}',

        // report error
        // Array ( [cus_name] => Default Name [cus_email] => default@gmail.com [amount] => 20.000 [transaction_id] => SFAORA984021 [metadata] => {"cus_name":"2428","cus_email":"2428@gmail.com"} [payment_method] => bkash [status] => COMPLETED )
        // Array ( [paymentMethod] => bkash [transactionId] => SFAORA984021 [paymentAmount] => 20 [paymentFee] => 0 [status] => completed )

        // Access the "amount" field from the array
        $amount = $dataArray['amount'];
        $CustomerName = $dataArray['cus_name'];
        //  $user_id = $dataArray['metadata']['cus_name'];
        $newData = json_decode($dataArray['metadata'], true);
        $user_id = $newData['cus_name'];
        $trnxID = $newData['trnxid'];

        // get data from table and update status and match amount SELECT `id`, `userid`, `amount`, `status`, `trxid`, `date` FROM `tbl_tmp_payment` WHERE 1
        $sql = "SELECT * FROM tbl_tmp_payment WHERE trxid = '$trnxID' AND status = 0 AND userid = '$user_id' AND amount = '$amount'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        if ($row) {
            // update status
            $sql = "UPDATE tbl_tmp_payment SET status = 1 WHERE trxid = '$trnxID'";
            $result = mysqli_query($conn, $sql);
        } else {
            die("Error: " . $conn->error);
        }

        $payment_id = $dataArray['transaction_id'];
        $order_id = $dataArray['transaction_id'];
        $payment_getway = 'App Walet';
        $remark = "Deposit from " . $_GET['paymentMethod'];
        //  $remark="Deposit from Payment";
        $date_created = date("Y-m-d h:i:s");
        $sql0 = "SELECT deposit_bal FROM tbl_user WHERE id = '$user_id' AND is_active = 1 AND is_block = 0";
        $row0 = mysqli_fetch_array(mysqli_query($conn, $sql0));

        $deposit_bal = $row0['deposit_bal'];
        $new_deposit_bal = $deposit_bal + $amount;

        $sql1 = "INSERT INTO tbl_transaction (user_id, order_id, payment_id, amount, payment_getway, remark, type, status, date_created) VALUES
     ('$user_id', '$order_id', '$payment_id', '$amount', '$payment_getway', '$remark', '1', '1', '$date_created')";
        $sql2 = "UPDATE tbl_user SET deposit_bal = '$new_deposit_bal' WHERE id = '$user_id' AND is_active = 1 AND is_block = 0";

        $result = mysqli_query($conn, $sql1);
        if (!$result) {
            // die("Error in SQL2: " . mysqli_error($conn));
            die("Error in SQL2: ");
        }
        if ($result) {
            $result = mysqli_query($conn, $sql2);
            header("Location: complete.php");
        }
    } else {
        // Handle decoding error
        echo "Failed to decode JSON data.";
    }
}
