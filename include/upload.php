<?php
if(!isset($_SESSION)){ session_start();};
include("db.php");
  
 $session_admin = $_SESSION['finalplayer'];
 $namesesduser = $_SESSION['finalplayer'];

    $sql="SELECT * FROM `user_regist` WHERE user_number='$namesesduser'";
    $run=mysqli_query($conn,$sql);

    if(mysqli_num_rows($run)<1)
    {
        header("Location:../");
    }else{
  		$count=0;
        while($data=mysqli_fetch_assoc($run))
        {
			$count++;
    
			$playername= $data['user_Name']; 
         	$playerrefrealidjoin= $data['refrel_id']; 
         	$userrandcode= $data['userrandcode']; 
         	$datejoin= $data['datejoin']; 
			$playernumber= $data['user_number']; 
		}
     }
          $gameifd = $_POST['gameid']; 
          $roomcodegamfe=$_POST['roomcodegame'];

          $sqly="SELECT * FROM `create_game` WHERE gameidrandom='$gameifd' && roomcode='$roomcodegamfe'";
          $runy=mysqli_query($conn,$sqly);

    if(mysqli_num_rows($runy)<1)
    {
        header("Location:../");
    }else{
		$count=0;
		while($datay=mysqli_fetch_assoc($runy))
		{
           $count++;
           $winningtransferd = $datay['winning_amount']; 
           $game_amount = $datay['game_amount'];
        }
    }
 ?>

<?php 

// File upload folder 
$uploadDir = 'uploads/'; 
 
// Allowed file types 
$allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg'); 
 
// Default response 
$response = array( 
    'status' => 0, 
    'message' => 'Form submission failed, please try again.' 
); 
 
// If form is submitted 
if(isset($_POST['result'])){ 
    // Get the submitted form data 
    $result = $_POST['result']; 
    $gameid = $_POST['gameid']; 
    $roomcodegame=$_POST['roomcodegame'];
  
	if($_POST['result']=="lost"){
	   include("db.php");
       $sqlr125 = "SELECT * FROM `resultupload` WHERE player_gameid1='$gameid' && playerstatus1='won' ";
       $runr125=mysqli_query($conn,$sqlr125);

		if(mysqli_num_rows($runr125)<1)
		{
		  // header("Location:../");
		}else{
			$count=0;
			while($datar125=mysqli_fetch_assoc($runr125))
			{
			   $count++;
			   $playermobilenumber1sd=$datar125['playermobilenumber1'];
			   $playerid1d=$datar125['playerid1'];
			   $playername1name=$datar125['playername1'];


			   $dateshd=date("d/M/Y");
			   $ordernumbertxn="ORD".rand(1000000,999999999);
			   $sdffjkfh="INSERT INTO `addwallate_playe`(`username_player`, `number_player`, `usercode_player`, `amount_player`, `product_info`, `date_player`, `status`, `order_number`, `txn`) VALUES ('$playername1name','$playermobilenumber1sd','$playerid1d','$winningtransferd','C','$dateshd','success','$ordernumbertxn','$ordernumbertxn')";
			   $jkfhh=mysqli_query($conn,$sdffjkfh);
				if($jkfhh=="TRUE"){
					$kfsdfhhd="UPDATE `create_game` SET `game_status`='3' WHERE gameidrandom='$gameid'";
					$fgdzd=mysqli_query($conn,$kfsdfhhd);
				}

			}
        
         }
   }
    
  
  
  
 // Check whether submitted data is not empty 
    if(!empty($result)){ 
        // Validate email 
        if(filter_var($result) === false){ 
            $response['message'] = 'Please Upload File.'; 
        }else{ 
            $uploadStatus = 1; 
             
            // Upload file 
            $uploadedFile = ''; 
            if(!empty($_FILES["file"]["name"])){ 
                // File path config 
                $fileName = basename($_FILES["file"]["name"]); 
                $targetFilePath = $uploadDir . $fileName; 
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                 
                // Allow certain file formats to upload 
                if(in_array($fileType, $allowTypes)){ 
                    // Upload file to the server 
                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 
                        $uploadedFile = $fileName; 
                    }else{ 
                        $uploadStatus = 0; 
                        $response['message'] = 'Sorry, there was an error uploading your file.'; 
                    } 
                }else{ 
                    $uploadStatus = 0; 
                    $response['message'] = 'Sorry, only '.implode('/', $allowTypes).' files are allowed to upload.'; 
                } 
            } 
            
                include_once 'dbConfig.php'; 
                $resultggghg = mysqli_query($db,"SELECT * FROM `resultuploadfgfd` WHERE  roomcode='$roomcodegame' && gameid='$gameid'");
				$countftfg=mysqli_num_rows($resultggghg);
				if($countftfg==1)
				{


				}else{
					$dffjhcc="INSERT INTO `resultuploadfgfd`(`roomcode`, `gameid`) VALUES ('$roomcodegame','$gameid')";
					 $insert=mysqli_query($db,$dffjhcc);
				}
                if($uploadStatus == 1){ 
					// Include the database config file 
					include_once 'dbConfig.php'; 
   
                     $resultgg = mysqli_query($db,"SELECT * FROM `resultupload` WHERE  playerroom_code1='$roomcodegame' && playermobilenumber1='$session_admin'");
                     $countg=mysqli_num_rows($resultgg);
					if($countg==1)
					{
						$response['status'] = 0; 
						$response['message'] = 'Result data Already submitted !'; 

					}else{
						$sqlQ="INSERT INTO resultupload (`playerstatus1`,`playerscreenshot1`,`player_gameid1`,`playerroom_code1`,`playermobilenumber1`,`playername1`,`playerid1`)VALUES ('$result','$uploadedFile','$gameid','$roomcodegame','$session_admin','$playername','$userrandcode')";
						$insert=mysqli_query($db,$sqlQ);
                  		if($insert){ 
							$response['status'] = 1; 
							$response['message'] = 'Result data submitted successfully!'; 
                		} 
                
					}
     
               /* // Insert form data in the database 
                $sqlQ = "INSERT INTO resultupload (playerstatus1,playerscreenshot1,submitted_on) VALUES (?,?,NOW())"; 
                $stmt = $db->prepare($sqlQ); 
                $stmt->bind_param($result,$uploadedFile); 
                $insert = $stmt->execute(); 
                 */
               
            } 
        } 
    }else{ 
         $response['message'] = 'Please fill all the mandatory fields (name and email).'; 
    } 
} 
 
// Return response 
echo json_encode($response);