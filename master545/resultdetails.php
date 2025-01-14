<?php include "header.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'transfer') {
            // Handle amount transfer
			$battelid = $_POST['battleid'];
			$player = $_POST['player'];

			$sql = "SELECT * FROM `resultupload` JOIN `create_game` ON resultupload.player_gameid1=create_game.gameidrandom WHERE resultupload.player_gameid1='$battelid'";

			$resulta = $conn->query($sql);
			$response =$resulta->fetch_assoc();
			$game_amount = $response['winning_amount'];
			// $winning_amount = $response['game_amount'];
        // $sdffjkfh = "INSERT INTO `addwallate_playe`(`username_player`, `number_player`, `usercode_player`, `amount_player`, `product_info`, `date_player`, `status`, `order_number`, `txn`) VALUES ('$Player1_fname','$Player1_fnumber','$Player1_fuserid','$Player1_winning_amount','C','$dateshd','success','$ordernumbertxn','$ordernumbertxn')";

			// give user winning amount by player mobile number 
			if($player==$response['playermobilenumber1']){
				// player 1 is the winner
				$Player1_fname = $response['playername1'];
				$Player1_fnumber = $response['playermobilenumber1'];
				$playerId = $response['playerid1'];
				$product_info = "C";
				$dateshd = date('Y-m-d');
				$status = "success";
				$ordernumbertxn = "ON". rand(100000,999999);
				$sdffjkfh = "INSERT INTO `addwallate_playe`(`username_player`, `number_player`, `usercode_player`, `amount_player`, `product_info`, `date_player`, `status`, `order_number`, `txn`) 
				VALUES ('$Player1_fname','$Player1_fnumber','$playerId','$game_amount','$product_info','$dateshd','$status','$ordernumbertxn','$ordernumbertxn')";
				$sdfhf=mysqli_query($conn,$sdffjkfh);

			}else{
				// player 2 is the winner
				$Player1_fname = $response['playername2'];
				$Player1_fnumber = $response['playermobilenumber2'];
				$playerId = $response['playerid2'];
				$product_info = "C";
				$dateshd = date('Y-m-d');
				$status = "success";
				$ordernumbertxn = "ON". rand(100000,999999);
				$sdffjkfh = "INSERT INTO `addwallate_playe`(`username_player`, `number_player`, `usercode_player`, `amount_player`, `product_info`, `date_player`, `status`, `order_number`, `txn`) 
				VALUES ('$Player1_fname','$Player1_fnumber','$playerId','$winning_amount','$product_info','$dateshd','$status','$ordernumbertxn','$ordernumbertxn')";
				$sdfhf=mysqli_query($conn,$sdffjkfh);
			}
			// update status 3 by btattel id
			$fsdfnf="UPDATE `resultupload` SET `status`='2' WHERE player_gameid1='$battelid'";
			$sdfhf=mysqli_query($conn,$fsdfnf);
			$sql = "UPDATE `create_game` SET `game_status`='3' WHERE gameidrandom='$battelid'";
			$resulta = $conn->query($sql);
			echo "<script>window.location.href='battleresult';</script>";
			die();

        } elseif ($_POST['action'] == 'refund') {
            // Handle refund
			 // Handle amount transfer
			 $battelid = $_POST['battleid'];
			 $player = $_POST['player'];
 
			 $sql = "SELECT * FROM `resultupload` JOIN `create_game` ON resultupload.player_gameid1=create_game.gameidrandom WHERE resultupload.player_gameid1='$battelid'";
 
			 $resulta = $conn->query($sql);
			 $response =$resulta->fetch_assoc();
			 // $game_amount = $response['game_amount'];
			 $winning_amount = $response['game_amount'];
		 // $sdffjkfh = "INSERT INTO `addwallate_playe`(`username_player`, `number_player`, `usercode_player`, `amount_player`, `product_info`, `date_player`, `status`, `order_number`, `txn`) VALUES ('$Player1_fname','$Player1_fnumber','$Player1_fuserid','$Player1_winning_amount','C','$dateshd','success','$ordernumbertxn','$ordernumbertxn')";
 
			 // give user winning amount by player mobile number 
			
				 // player 1 is the winner
				 $Player1_fname = $response['playername1'];
				 $Player1_fnumber = $response['playermobilenumber1'];
				 $playerId = $response['playerid1'];
				 $product_info = "C";
				 $dateshd = date('Y-m-d');
				 $status = "success";
				 $ordernumbertxn = "ON". rand(100000,999999);
				 $sdffjkfh = "INSERT INTO `addwallate_playe`(`username_player`, `number_player`, `usercode_player`, `amount_player`, `product_info`, `date_player`, `status`, `order_number`, `txn`) 
				 VALUES ('$Player1_fname','$Player1_fnumber','$playerId','$winning_amount','$product_info','$dateshd','$status','$ordernumbertxn','$ordernumbertxn')";
				 $sdfhf=mysqli_query($conn,$sdffjkfh);
 
		
				 // player 2 is the winner
				 $Player1_fname = $response['playername2'];
				 $Player1_fnumber = $response['playermobilenumber2'];
				 $playerId = $response['playerid2'];
				 $product_info = "C";
				 $dateshd = date('Y-m-d');
				 $status = "success";
				 $ordernumbertxn = "ON". rand(100000,999999);
				 $sdffjkfh = "INSERT INTO `addwallate_playe`(`username_player`, `number_player`, `usercode_player`, `amount_player`, `product_info`, `date_player`, `status`, `order_number`, `txn`) 
				 VALUES ('$Player1_fname','$Player1_fnumber','$playerId','$winning_amount','$product_info','$dateshd','$status','$ordernumbertxn','$ordernumbertxn')";
				 $sdfhf=mysqli_query($conn,$sdffjkfh);
			 
			 // update status 3 by btattel id
			 $fsdfnf="UPDATE `resultupload` SET `status`='2' WHERE player_gameid1='$battelid'";
			 $sdfhf=mysqli_query($conn,$fsdfnf);
			 $sql = "UPDATE `create_game` SET `game_status`='3' WHERE gameidrandom='$battelid'";
			 $resulta = mysqli_query($conn,$sql);
			 
			 echo "<script>window.location.href='battleresult';</script>";
			 die();
 
        }
    }
}




$battelid = $_GET['battelid'];
if(!isset($_GET['player'])){
	$player = "1";
}else{
	$player = $_GET['player'];
}

// SELECT `id`, `gameidrandom`, `fname`, `fnumber`, `fuserid`, `sname`, `snumber`, `suserid`, `game_amount`, `winning_amount`, `game_status`, `date`, `roomcode`, `game_win`, `ludotype`, `earning` FROM `create_game` WHERE 1
// SELECT `id`, `playername1`, `playerid1`, `playermobilenumber1`, `playerroom_code1`, `player_gameid1`, `playerscreenshot1`, `playercancelreason1`, `playerstatus1`, `player_date1`, `playername2`, `playerid2`, `playermobilenumber2`, `playerroom_code2`, `player_gameid2`, `playerscreenshot2`, `playercancelreason2`, `playerstatus2`, `player_date2`, `rand`, `status` FROM `resultupload` WHERE 1
// $fsdfnf="UPDATE `resultupload` SET `status`='2' WHERE gameid='$battelid'";
// $sdfhf=mysqli_query($conn,$fsdfnf);
$sql = "SELECT * FROM `resultupload` JOIN `create_game` ON resultupload.player_gameid1=create_game.gameidrandom WHERE resultupload.player_gameid1='$battelid'";

$resulta = $conn->query($sql);
$response =$resulta->fetch_assoc();
//$response['totLmatch']; 

$game_amount = $response['game_amount'];
$winning_amount = $response['winning_amount'];
$game_status = $response['game_status'];
$date = $response['date'];
$ludotype = $response['ludotype'];
$roomcode = $response['roomcode'];
$earning = $response['earning'];

if($player=='1'){
	$team = "1";
	$playerName = $response['playername1'];
	$playerId = $response['playerid1'];
	$playerMobile = $response['playermobilenumber1'];
	$playerRoomCode = $response['playerroom_code1'];
	$playerGameId = $response['player_gameid1'];
	$playerScreenShot = $response['playerscreenshot1'];
	$playerStatus = $response['playerstatus1'];
	$playerDate = $response['player_date1'];
	
}else{
	$team = "2";
	$playerName = $response['playername2'];
	$playerId = $response['playerid2'];
	$playerMobile = $response['playermobilenumber2'];
	$playerRoomCode = $response['playerroom_code2'];
	$playerGameId = $response['player_gameid2'];
	$playerScreenShot = $response['playerscreenshot2'];
	$playerStatus = $response['playerstatus2'];
	$playerDate = $response['player_date2'];
}


?>
<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">User Profile</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">User Profilep</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<div class="d-flex flex-column align-items-center text-center">
											<img src="https://www.ipshowrah.com/wp-content/uploads/2021/05/results.gif" alt="Admin" class="rounded-circle p-1" width="110">
											<div class="mt-3">
												<h4><?php echo $ludotype; ?></h4>

												<form method="POST" action="">
													<select name="player" class="form-control">
														<option value="<?php echo $response['playermobilenumber1']; ?>"><?php echo $response['playername1']; ?></option>
														<option value="<?php echo $response['playermobilenumber2']; ?>"><?php echo $response['playername2']; ?></option>
													</select>
													<input type="text" hidden name="battleid" value="<?php echo $battelid ?>">
													<button type="submit" name="action" value="transfer" class="btn btn-outline-primary mt-1">Amount Transfer</button>
													<button type="submit" name="action" value="refund" class="btn btn-outline-primary mt-1">Refund Both</button>
												</form>
											</div>
										</div>
										<hr class="my-4" />
										<ul class="list-group list-group-flush">
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><img src="https://lh3.googleusercontent.com/c7RpbCKRkx6pqLCer6hA_oagRzesxhB_OLQHCHWhqEsDq27SofeZW-VCfq-IB9IPdQ" style="width:40px;"> Room Code</h6>
												<span class="text-secondary"><?php echo $roomcode; ?></span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><img src="https://media.istockphoto.com/vectors/dollar-banknotes-isolate-on-white-background-vector-id1153024228?k=20&m=1153024228&s=612x612&w=0&h=5PT3NFm-LtDViF5sFg4540nMAOLNGsQTrrZ6d1Sl__c=" style="width:40px;"> Entry Amount</h6>
												<span class="text-secondary">&#8377;<?php echo $game_amount; ?></span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><img src="https://png.pngtree.com/png-vector/20191029/ourmid/pngtree-first-prize-gold-trophy-icon-prize-gold-trophy-winner-first-prize-png-image_1908592.jpg" style="width:40px;"> Win Prize</h6>
												<span class="text-secondary">&#8377;<?php echo $winning_amount; ?></span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><img src="https://www.kindpng.com/picc/m/174-1748850_reward5-earning-app-icon-png-transparent-png.png"style="width:40px;">Admin Earning</h6>
												<span class="text-secondary">&#8377;<?php echo $earning; ?></span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
												<span class="text-secondary">codervent</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
								<div class="col-lg-8">
								<div class="card">


							<?php
$sql = "SELECT * FROM `resultupload` WHERE player_gameid1='$battelid'";
$run = mysqli_query($conn, $sql);

if (mysqli_num_rows($run) < 1) {
    echo '<p class="alert alert-danger">Data Not Found</p>';
} else {

    $count = 0;
    while ($data = mysqli_fetch_assoc($run)) {
        $count++;
        ?>	<div class="card-body">
							<div class="row mb-3">
							    <h5 class="btn btn-success">Team <?php echo $team; ?></h5>
											<div class="col-sm-3">
												<h6 class="mb-0">Player Name</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" readonly value="<?php echo $playerName; ?>" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Player ID</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" readonly value="<?php echo $playerId; ?>" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Mobile</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" readonly value="<?php echo $playerMobile; ?>" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Room Code</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" readonly value="<?php echo $playerRoomCode; ?>" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Battle ID</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" readonly value="<?php echo $playerGameId; ?>" />
											</div>
										</div>
											<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Screen Shot</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" readonly value="<?php echo $playerScreenShot; ?>" />
												<a class="btn btn-warning" href="<?php echo $playerScreenShot; ?>" target="block">Open Screen Shot</a>
											</div>
										</div>
											<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Player Status</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" readonly value="<?php echo $playerStatus; ?>" />
											</div>
										</div>
										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<input type="button" class="btn btn-primary px-4" value="Save Changes" />

											</div>

								</div>

							</div>
								<?php
}
}
?>		</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end page wrapper -->

<?php include "footer.php";?>