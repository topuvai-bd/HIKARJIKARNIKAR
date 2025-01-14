<?php
if (!isset($_SESSION)) {session_start();}
;
include "db.php";

if (isset($_SESSION['finalplayer'])) {
    $namesesduser = $_SESSION['finalplayer'];
} else {
    echo "<script>alert('Failed to update result')</script>";
    echo "<script>window.open('index','_self')</script>";
	die();
}
//get login user details
$sql = "SELECT * FROM `user_regist` WHERE user_number='$namesesduser'";
$run = mysqli_query($conn, $sql);
if (mysqli_num_rows($run) < 1) {
    echo "<script>alert('Failed to update result')</script>";
    echo "<script>window.open('index','_self')</script>";
	die();
} else {
    $count = 0;
    while ($data = mysqli_fetch_assoc($run)) {
        $count++;

        $playername = $data['user_Name'];
        $playerrefrealidjoin = $data['refrel_id'];
        $userrandcode = $data['userrandcode'];
        $datejoin = $data['datejoin'];
        $playernumber = $data['user_number'];
    }
}

//form data receive
if(!isset($_POST['gameid']) || !isset($_POST['roomcodegame'])){
	echo "<script>alert('Failed to get params')</script>";
	echo "<script>window.open('index','_self')</script>";
	die();
}
$gameifd = $_POST['gameid'];
$roomcodegamfe = $_POST['roomcodegame'];

//get game details
// $sqly = "SELECT * FROM `create_game` WHERE gameidrandom='$gameifd' && roomcode='$roomcodegamfe'";
$sqly = "SELECT * FROM `create_game` WHERE gameidrandom='$gameifd' ";
$runy = mysqli_query($conn, $sqly);

if (mysqli_num_rows($runy) < 1) {
    echo "<script>alert('No game found with the gameid')</script>";
	echo "<script>window.open('index','_self')</script>";
	die();
} else {
    $count = 0;
    while ($datay = mysqli_fetch_assoc($runy)) {
        $count++;
        $winningtransferd = $datay['winning_amount'];
        $game_amount = $datay['game_amount'];
    }
}

function UploadAndReturnURL($file){
    $uploadedFile = '';
    $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg');
    $uploadDir = 'upload/';

    if (!empty($file["name"])) {
        // Get the file extension
        $fileType = pathinfo($file["name"], PATHINFO_EXTENSION);
        
        // Generate a random name using characters from "abcd123"
        $randomName = generateRandomString(30); // Generate a random string of length 10
        
        // Create the target file path using the random name and file extension
        $fileName = $randomName . '.' . $fileType;
        $targetFilePath = $uploadDir . $fileName;

        // Allow certain file formats to upload
        if (in_array($fileType, $allowTypes)) {
            // Upload file to the server
            if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
                // $uploadedFile = 'https://superludobd.com/' . $targetFilePath;
                $uploadedFile = BASEURL . $targetFilePath;
            } else {
                $uploadedFile = 'unable to upload file';
            }
        } else {
            $uploadedFile = 'file type not allowed';
        }
    }
    return $uploadedFile;
}
function generateRandomString($length = 10) {
    $characters = 'abcdefghijklmnopqrst_uvwxyz1234567890';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
// $sqly = "SELECT * FROM `create_game` WHERE gameidrandom='$gameifd' && roomcode='$roomcodegamfe'";
// $runy = mysqli_query($conn, $sqly);

// if (mysqli_num_rows($runy) < 1) {
//     header("Location:../");
// } else {
//     $count = 0;
//     while ($datay = mysqli_fetch_assoc($runy)) {
//         $count++;
//         $winningtransferd = $datay['winning_amount'];
//         $game_amount = $datay['game_amount'];
//     }
// }

//print_r($_POST);


// File upload folder
$uploadDir = 'upload';
$datesdh = date('Y-m-d H:i:s');
// Allowed file types
$allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg');

// If form is submitted
if (isset($_POST['submit_form'])) {
    // Get the submitted form data
    $result = $_POST['game_result'];
    $usermobile = $_POST['usermobile'];
    $gameid = $_POST['gameid'];
    $roomcodegame = $_POST['roomcodegame'];
    $cancelreson = $_POST['cancelreson'];

    $get_battle_details = mysqli_fetch_array(mysqli_query($conn, "select * from create_game where `gameidrandom`='$gameid' and `roomcode`='$roomcodegame'"));

    //update player 1 status
    $get_player1 = mysqli_fetch_array(mysqli_query($conn, "select * from resultupload where `player_gameid1`='$gameid' and `playerroom_code1`='$roomcodegame' and `playermobilenumber1`='$usermobile'"));
    if ($get_player1) {

        if ((isset($_COOKIE['baby']) &&$_COOKIE['baby'] == $gameid) || !empty($get_player1['playerstatus1'])) {

            echo "<script>alert('You've Already submitted your result ')</script>";
            echo "<script>window.open('index','_self')</script>";
			die();


        } else {
            $id_of_result_update_table = $get_player1['id'];
			$uploadedFile = '';
			if($result == 'won'){
				// check image and upload it
				$uploadedFile = UploadAndReturnURL($_FILES["file"]);
			}
            $player1_game_status = mysqli_query($conn, "UPDATE `resultupload` SET `playerstatus1`='$result',`playerscreenshot1` = '$uploadedFile' WHERE id='$id_of_result_update_table'");

            $cookie_name = "baby";
            $cookie_value = $gameid;
            $cookie_expire = time() + (30 * 24 * 60 * 60);
            setcookie($cookie_name, $cookie_value, $cookie_expire, "/");

        }
    }

    //update player 2 status
    $get_player2 = mysqli_fetch_array(mysqli_query($conn, "select * from resultupload where `player_gameid2`='$gameid' and `playerroom_code1`='$roomcodegame' and `playermobilenumber2`='$usermobile'"));
    if ($get_player2) {

        if ((isset($_COOKIE['baby']) && $_COOKIE['baby'] == $gameid) || !empty($get_player1['playerstatus2'])) {
            echo "<script>alert('You've Already submitted your result! ')</script>";
            echo "<script>window.open('index','_self')</script>";
        } else {
            $id_of_result_update_table_p2 = $get_player2['id'];
			$uploadedFile = '';
			if($result == 'won'){
				// check image and upload it
				$uploadedFile = UploadAndReturnURL($_FILES["file"]);
			}

            $player2_game_status = mysqli_query($conn, "UPDATE `resultupload` SET `playerstatus2`='$result', `playerscreenshot2`='$uploadedFile' WHERE id='$id_of_result_update_table_p2'");
            $cookie_name = "baby";
            $cookie_value = $gameid;
            $cookie_expire = time() + (30 * 24 * 60 * 60);
            setcookie($cookie_name, $cookie_value, $cookie_expire, "/");

        }
    }

    $get_result_details = mysqli_fetch_array(mysqli_query($conn, "select * from resultupload where `player_gameid1`='$gameid' and `playerroom_code1`='$roomcodegame'"));
    // var_dump($get_result_details);
	$resultGameID = $get_result_details['id'];
    if ($get_result_details['playerstatus1'] == 'won' && $get_result_details['playerstatus2'] == 'lost') {

        // Upload file
        // $uploadedFile = '';
        // if (!empty($_FILES["file"]["name"])) {
        //     // File path config
        //     $fileName = basename($_FILES["file"]["name"]);
        //     $targetFilePath = $uploadDir . $fileName;
        //     $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        //     // Allow certain file formats to upload
        //     if (in_array($fileType, $allowTypes)) {
        //         // Upload file to the server
        //         if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {

        //             // $uploadedFile = $fileName;
        //             // $apiKey = 'a97d07822e22c138c45a9a584304b45c';

        //             // function uploadImageToImgbb($apiKey, $imageUrl)
        //             // {
        //             //     $apiEndpoint = 'https://api.imgbb.com/1/upload';

        //             //     // Prepare the POST data
        //             //     $postData = array(
        //             //         'key' => $apiKey,
        //             //         'image' => $imageUrl,
        //             //     );

        //             //     // Initialize cURL session
        //             //     $ch = curl_init();

        //             //     // Set cURL options
        //             //     curl_setopt($ch, CURLOPT_URL, $apiEndpoint);
        //             //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //             //     curl_setopt($ch, CURLOPT_POST, true);
        //             //     curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

        //             //     // Execute cURL and capture the response
        //             //     $response = curl_exec($ch);

        //             //     // Check for cURL errors
        //             //     if (curl_errno($ch)) {
        //             //         echo 'Curl error: ' . curl_error($ch);
        //             //     }

        //             //     // Close the cURL session
        //             //     curl_close($ch);

        //             //     // Decode the JSON response
        //             //     $responseData = json_decode($response, true);

        //             //     // Check if the upload was successful
        //             //     if (isset($responseData['data']['url'])) {
        //             //         return $responseData['data']['url'];
        //             //     } else {
        //             //         return false;
        //             //     }
        //             // }
                    
		// 			$uploadedFile = 'https://superludobd.com/' . $targetFilePath;
        //             // $uploadedFile = uploadImageToImgbb($apiKey, $frontImageUrl);
        //             // unlink($targetFilePath);

        //         }else {
		// 			$uploadedFile = 'unable to upload file';
		// 		}
        //     }
        // }
		
        $player1_game_status = mysqli_query($conn, "UPDATE `resultupload` SET `status`='2' WHERE id='$resultGameID'");

        $Player1_fname = $get_battle_details['fname'];
        $Player1_fnumber = $get_battle_details['fnumber'];
        $Player1_fuserid = $get_battle_details['fuserid'];
        $Player1_winning_amount = $get_battle_details['winning_amount'];
        // $refrelcode = $get_battle_details['refrel_id'];
        $dateshd = date("d-m-Y");
        $ordernumbertxn = 'ORD' . rand(100000, 99999999);

        $sdffjkfh = "INSERT INTO `addwallate_playe`(`username_player`, `number_player`, `usercode_player`, `amount_player`, `product_info`, `date_player`, `status`, `order_number`, `txn`) VALUES ('$Player1_fname','$Player1_fnumber','$Player1_fuserid','$Player1_winning_amount','C','$dateshd','success','$ordernumbertxn','$ordernumbertxn')";
        $jkfhh = mysqli_query($conn, $sdffjkfh);

        $game_status_update = mysqli_query($conn, "UPDATE `create_game` SET `game_status`='3' WHERE gameidrandom='$gameid'");

        // get referal code by fuserid ===================================

        $resulta = $conn->query("SELECT refrel_id FROM user_regist WHERE userrandcode= '$Player1_fuserid' ");
        $BonusBalance = $resulta->fetch_assoc();
        $refrelcode = $BonusBalance['refrel_id'];
        if ($refrelcode != '') {

            // get referer info]

            $refrelinfo = $conn->query("SELECT * FROM user_regist WHERE userrandcode= '$refrelcode' ");
            if ($refrelinfo->num_rows > 0) {
                $refrelinfo = $refrelinfo->fetch_assoc();
                $refrelname = $refrelinfo['user_Name'];
                $refrelnumber = $refrelinfo['user_number'];
                $refreluserid = $refrelinfo['userrandcode'];

                // // SELECT `id`, `user_Name`, `user_number`, `user_passw`, `refrel_id`, `userrandcode`, `datejoin`, `status`, `otpd`, `profile`, `kyc`, `refercomissionamount`, `extradate` FROM `user_regist` WHERE 1
                // $gameAmount = $get_battle_details['game_amount'];
                // $referEarn = $Player1_winning_amount - $gameAmount;
                // $referEarn = $gameAmount - $referEarn;
                // // get 2% of winning amount
                // $referEarn = ceil($referEarn * (20 / 100));
                $gameAmount = $get_battle_details['game_amount'];
                $referEarn = ceil($gameAmount * 0.02);
                $ordernumbertxn = 'ORD' . rand(100000, 99999999);
                // insert 2% winning amount to refrel code
                $referTrns = mysqli_query($conn, "INSERT INTO `addwallate_playe`(`username_player`, `number_player`, `usercode_player`, `amount_player`, `product_info`, `date_player`, `status`, `order_number`, `txn`) VALUES
				 ('$refrelname','$refrelnumber','$refreluserid','$referEarn','C','$dateshd','success','$ordernumbertxn','$ordernumbertxn')");
            }

        }

        // get referal code by fuserid ===================================

        echo "<script>alert('Thank You For Playing. Result Updated Successfully')</script>";
        echo "<script>window.open('index','_self')</script>";

        /*echo "Player one won <br>".$get_result_details['playerstatus1'];
    echo "Player two lost".$get_result_details['playerstatus2'];*/
    } elseif ($get_result_details['playerstatus1'] == 'lost' && $get_result_details['playerstatus2'] == 'won') {

        // $uploadedFile = '';
        // if (!empty($_FILES["file"]["name"])) {
        //     // File path config
        //     $fileName = basename($_FILES["file"]["name"]);
        //     $targetFilePath = $uploadDir . $fileName;
        //     $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        //     // Allow certain file formats to upload
        //     if (in_array($fileType, $allowTypes)) {
        //         // Upload file to the server
        //         if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {

        //             // $uploadedFile = $fileName;
        //             // $apiKey = 'a97d07822e22c138c45a9a584304b45c';

        //             // function uploadImageToImgbb($apiKey, $imageUrl)
        //             // {
        //             //     $apiEndpoint = 'https://api.imgbb.com/1/upload';

        //             //     // Prepare the POST data
        //             //     $postData = array(
        //             //         'key' => $apiKey,
        //             //         'image' => $imageUrl,
        //             //     );

        //             //     // Initialize cURL session
        //             //     $ch = curl_init();

        //             //     // Set cURL options
        //             //     curl_setopt($ch, CURLOPT_URL, $apiEndpoint);
        //             //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //             //     curl_setopt($ch, CURLOPT_POST, true);
        //             //     curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

        //             //     // Execute cURL and capture the response
        //             //     $response = curl_exec($ch);

        //             //     // Check for cURL errors
        //             //     if (curl_errno($ch)) {
        //             //         echo 'Curl error: ' . curl_error($ch);
        //             //     }

        //             //     // Close the cURL session
        //             //     curl_close($ch);

        //             //     // Decode the JSON response
        //             //     $responseData = json_decode($response, true);

        //             //     // Check if the upload was successful
        //             //     if (isset($responseData['data']['url'])) {
        //             //         return $responseData['data']['url'];
        //             //     } else {
        //             //         return false;
        //             //     }
        //             // }

        //             $uploadedFile = 'https://superludobd.com/' . $targetFilePath;
        //             // $uploadedFile = uploadImageToImgbb($apiKey, $frontImageUrl);
        //             // unlink($targetFilePath);

        //         }else {
		// 			$uploadedFile = 'unable to upload file';
		// 		}
        //     }
        // }

        $player2_game_status = mysqli_query($conn, "UPDATE `resultupload` SET  `status`='2' WHERE id='$resultGameID'");

        $Player2_sname = $get_battle_details['sname'];
        $Player2_snumber = $get_battle_details['snumber'];
        $Player2_suserid = $get_battle_details['suserid'];
        $Player2_winning_amount = $get_battle_details['winning_amount'];
        // $refrelcode = $get_battle_details['refrel_id'];
        $dateshd = date("d-m-Y");
        $ordernumbertxn = 'ORD' . rand(100000, 99999999);

        $sdffjkfh = "INSERT INTO `addwallate_playe`(`username_player`, `number_player`, `usercode_player`, `amount_player`, `product_info`, `date_player`, `status`, `order_number`, `txn`) VALUES ('$Player2_sname','$Player2_snumber','$Player2_suserid','$Player2_winning_amount','C','$dateshd','success','$ordernumbertxn','$ordernumbertxn')";
        $jkfhh = mysqli_query($conn, $sdffjkfh);

        $game_status_update = mysqli_query($conn, "UPDATE `create_game` SET `game_status`='3' WHERE gameidrandom='$gameid'");

        //---- result upload for refaral code ===========================================
        // get referal code by fuserid
        $resulta = $conn->query("SELECT refrel_id FROM user_regist WHERE userrandcode= '$Player2_suserid' ");
        $BonusBalance = $resulta->fetch_assoc();
        $refrelcode = $BonusBalance['refrel_id'];
        if ($refrelcode != '') {

            // get referer info]

            $refrelinfo = $conn->query("SELECT * FROM user_regist WHERE userrandcode= '$refrelcode' ");
            if ($refrelinfo->num_rows > 0) {
                $refrelinfo = $refrelinfo->fetch_assoc();
                $refrelname = $refrelinfo['user_Name'];
                $refrelnumber = $refrelinfo['user_number'];
                $refreluserid = $refrelinfo['userrandcode'];

                // // SELECT `id`, `user_Name`, `user_number`, `user_passw`, `refrel_id`, `userrandcode`, `datejoin`, `status`, `otpd`, `profile`, `kyc`, `refercomissionamount`, `extradate` FROM `user_regist` WHERE 1
                // $gameAmount = $get_battle_details['game_amount'];
                // $referEarn = $Player2_winning_amount - $gameAmount;
                // $referEarn = $gameAmount - $referEarn;
                // // get 2% of winning amount
                // $referEarn = ceil($referEarn * (20 / 100));
                $gameAmount = $get_battle_details['game_amount'];
                $referEarn = ceil($gameAmount * 0.02);
                $ordernumbertxn = 'ORD' . rand(100000, 99999999);
                // insert 2% winning amount to refrel code
                $referTrns = mysqli_query($conn, "INSERT INTO `addwallate_playe`(`username_player`, `number_player`, `usercode_player`, `amount_player`, `product_info`, `date_player`, `status`, `order_number`, `txn`) VALUES
					 ('$refrelname','$refrelnumber','$refreluserid','$referEarn','C','$dateshd','success','$ordernumbertxn','$ordernumbertxn')");
            }

        }

        //---- result upload for refaral code ===========================================

        echo "<script>alert('Thank you for playing. Result Updated successfully for players ')</script>";
        echo "<script>window.open('index','_self')</script>";

    } elseif ($get_result_details['playerstatus1'] == 'cancel' && $get_result_details['playerstatus2'] == 'cancel') {

        $Player1_fname = $get_battle_details['fname'];
        $Player1_fnumber = $get_battle_details['fnumber'];
        $Player1_fuserid = $get_battle_details['fuserid'];
        $Player1_game_amount = $get_battle_details['game_amount'];

        if(empty($get_battle_details['playercancelreason1'])){
            $cancelreson1 = $cancelreson;
        }else {
            $cancelreson1 = $get_battle_details['playercancelreason1'];
        }
        if(empty($get_battle_details['playercancelreason2'])){
            $cancelreson2 = $cancelreson;
        }else {
            $cancelreson2 = $get_battle_details['playercancelreason2'];
        }


        $dateshd = date("d-m-Y");
        $ordernumbertxn = 'ORD' . rand(100000, 99999999);

        $sdffjkfh = "INSERT INTO `addwallate_playe`(`username_player`, `number_player`, `usercode_player`, `amount_player`, `product_info`, `date_player`, `status`, `order_number`, `txn`) VALUES ('$Player1_fname','$Player1_fnumber','$Player1_fuserid','$Player1_game_amount','C','$dateshd','success','$ordernumbertxn','$ordernumbertxn')";
        mysqli_query($conn, $sdffjkfh);

        $Player2_sname = $get_battle_details['sname'];
        $Player2_snumber = $get_battle_details['snumber'];
        $Player2_suserid = $get_battle_details['suserid'];
        $Player2_game_amount = $get_battle_details['game_amount'];
        $dateshd2 = date("d-m-Y");
        $ordernumbertxn2 = 'ORD' . rand(100000, 99999999);

        $sdffjkfh2 = "INSERT INTO `addwallate_playe`(`username_player`, `number_player`, `usercode_player`, `amount_player`, `product_info`, `date_player`, `status`, `order_number`, `txn`) VALUES ('$Player2_sname','$Player2_snumber','$Player2_suserid','$Player2_game_amount','C','$dateshd2','success','$ordernumbertxn2','$ordernumbertxn2')";
        mysqli_query($conn, $sdffjkfh2);

        $cancel_game_update1 = mysqli_query($conn, "UPDATE `resultupload` SET `playercancelreason1`='$cancelreson1', `status`='2' WHERE player_gameid1='$gameid' and `playermobilenumber1`='$Player1_fnumber'");
        $cancel_game_update2 = mysqli_query($conn, "UPDATE `resultupload` SET `playercancelreason2`='$cancelreson2', `status`='2' WHERE player_gameid1='$gameid' and `playermobilenumber2`='$Player2_snumber'");

        $game_status_update = mysqli_query($conn, "UPDATE `create_game` SET `game_status`='4' WHERE gameidrandom='$gameid'");

        $_SESSION['idf'] = $gameid;
        echo "<script>alert('Game Cancel Successfully !')</script>";
        echo "<script>window.open('index','_self')</script>";

    } else {
		// if($get_result_details['playerstatus1'] == 'won' && $get_result_details['playerstatus2'] == 'won'){
		// 	// both player won
		// }else if($get_result_details['playerstatus1'] == 'lost' && $get_result_details['playerstatus2'] == 'lost'){
		// 	// both player lost
		// }else if($get_result_details['playerstatus1'] == 'cancel' && $get_result_details['playerstatus2'] == 'lost')

		// if(!empty($get_result_details['playerstatus1']) && !empty($get_result_details['playerstatus2'])){
		// 	if($get_result_details['playerstatus1'] == 'won' && empty($get_result_details['playerscreenshot1'])){
		// 		 // Upload file
		// 		 $uploadedFile = '';
		// 		 if (!empty($_FILES["file"]["name"])) {
		// 			 // File path config
		// 			 $fileName = basename($_FILES["file"]["name"]);
		// 			 $targetFilePath = $uploadDir . $fileName;
		// 			 $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
		// 			 // Allow certain file formats to upload
		// 			 if (in_array($fileType, $allowTypes)) {
		// 				 // Upload file to the server
		// 				 if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
		 
		// 					 // $uploadedFile = $fileName;
		// 					 // $apiKey = 'a97d07822e22c138c45a9a584304b45c';
		 
		// 					 // function uploadImageToImgbb($apiKey, $imageUrl)
		// 					 // {
		// 					 //     $apiEndpoint = 'https://api.imgbb.com/1/upload';
		 
		// 					 //     // Prepare the POST data
		// 					 //     $postData = array(
		// 					 //         'key' => $apiKey,
		// 					 //         'image' => $imageUrl,
		// 					 //     );
		 
		// 					 //     // Initialize cURL session
		// 					 //     $ch = curl_init();
		 
		// 					 //     // Set cURL options
		// 					 //     curl_setopt($ch, CURLOPT_URL, $apiEndpoint);
		// 					 //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// 					 //     curl_setopt($ch, CURLOPT_POST, true);
		// 					 //     curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
		 
		// 					 //     // Execute cURL and capture the response
		// 					 //     $response = curl_exec($ch);
		 
		// 					 //     // Check for cURL errors
		// 					 //     if (curl_errno($ch)) {
		// 					 //         echo 'Curl error: ' . curl_error($ch);
		// 					 //     }
		 
		// 					 //     // Close the cURL session
		// 					 //     curl_close($ch);
		 
		// 					 //     // Decode the JSON response
		// 					 //     $responseData = json_decode($response, true);
		 
		// 					 //     // Check if the upload was successful
		// 					 //     if (isset($responseData['data']['url'])) {
		// 					 //         return $responseData['data']['url'];
		// 					 //     } else {
		// 					 //         return false;
		// 					 //     }
		// 					 // }
							 
		// 					 $uploadedFile = 'https://superludobd.com/' . $targetFilePath;
		// 					 // $uploadedFile = uploadImageToImgbb($apiKey, $frontImageUrl);
		// 					 // unlink($targetFilePath);
		 
		// 				 }else {
		// 					 $uploadedFile = 'unable to upload file';
		// 				 }
		// 			 }
		// 		 }
		// 		 $sql = "UPDATE `resultupload` SET `playerscreenshot1`='$uploadedFile' WHERE id='$resultGameID'";
		// 		 $player1_game_status = mysqli_query($conn, $sql);
		// 	}
		// 	if($get_result_details['playerstatus2'] == 'won'&& empty($get_result_details['playerscreenshot2']) ){
		// 		$uploadedFile = '';
		// 		 if (!empty($_FILES["file"]["name"])) {
		// 			 // File path config
		// 			 $fileName = basename($_FILES["file"]["name"]);
		// 			 $targetFilePath = $uploadDir . $fileName;
		// 			 $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
		// 			 // Allow certain file formats to upload
		// 			 if (in_array($fileType, $allowTypes)) {
		// 				 // Upload file to the server
		// 				 if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
		 
		// 					 // $uploadedFile = $fileName;
		// 					 // $apiKey = 'a97d07822e22c138c45a9a584304b45c';
		 
		// 					 // function uploadImageToImgbb($apiKey, $imageUrl)
		// 					 // {
		// 					 //     $apiEndpoint = 'https://api.imgbb.com/1/upload';
		 
		// 					 //     // Prepare the POST data
		// 					 //     $postData = array(
		// 					 //         'key' => $apiKey,
		// 					 //         'image' => $imageUrl,
		// 					 //     );
		 
		// 					 //     // Initialize cURL session
		// 					 //     $ch = curl_init();
		 
		// 					 //     // Set cURL options
		// 					 //     curl_setopt($ch, CURLOPT_URL, $apiEndpoint);
		// 					 //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// 					 //     curl_setopt($ch, CURLOPT_POST, true);
		// 					 //     curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
		 
		// 					 //     // Execute cURL and capture the response
		// 					 //     $response = curl_exec($ch);
		 
		// 					 //     // Check for cURL errors
		// 					 //     if (curl_errno($ch)) {
		// 					 //         echo 'Curl error: ' . curl_error($ch);
		// 					 //     }
		 
		// 					 //     // Close the cURL session
		// 					 //     curl_close($ch);
		 
		// 					 //     // Decode the JSON response
		// 					 //     $responseData = json_decode($response, true);
		 
		// 					 //     // Check if the upload was successful
		// 					 //     if (isset($responseData['data']['url'])) {
		// 					 //         return $responseData['data']['url'];
		// 					 //     } else {
		// 					 //         return false;
		// 					 //     }
		// 					 // }
							 
		// 					 $uploadedFile = 'https://superludobd.com/' . $targetFilePath;
		// 					 // $uploadedFile = uploadImageToImgbb($apiKey, $frontImageUrl);
		// 					 // unlink($targetFilePath);
		 
		// 				 }else {
		// 					 $uploadedFile = 'unable to upload file';
		// 				 }
		// 			 }
		// 		 }
		// 		 $sql = "UPDATE `resultupload` SET `playerscreenshot2`='$uploadedFile' WHERE id='$resultGameID'";
		// 		 $player1_game_status = mysqli_query($conn, $sql);
		// 	}
		// }

        echo "<script>alert('Thank You For Playing. Opponent Result is pending.')</script>";
        echo "<script>window.open('index','_self')</script>";
    }
}
