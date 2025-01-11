<?php include "header.php";
$battelid = $_GET['battelid'];
// $fsdfnf="UPDATE `resultupload` SET `status`='2' WHERE gameid='$battelid'";
// $sdfhf=mysqli_query($conn,$fsdfnf);
$sql = "SELECT * FROM `resultupload` WHERE player_gameid1='$battelid'";
$run = mysqli_query($conn, $sql);

if (mysqli_num_rows($run) < 1) {
    echo '<p class="alert alert-danger">Data Not Found</p>';
} else {

    $count = 0;
    while ($data = mysqli_fetch_assoc($run)) {
        $count++;

        $pln1 = $data['playermobilenumber1'];
        $pln2 = $data['playerroom_code1'];
        $pln3 = $data['player_gameid1'];
        $pln4 = $data['playerstatus1'];
        $pln5 = $data['playerscreenshot1'];
    }
}

$sql = "SELECT * FROM `create_game` WHERE gameidrandom='$battelid'";
$run = mysqli_query($conn, $sql);

if (mysqli_num_rows($run) < 1) {
    echo '<p class="alert alert-danger">Data Not Found</p>';
} else {

    $count = 0;
    while ($data4 = mysqli_fetch_assoc($run)) {
        $count++;

        $game_amount = $data4['game_amount'];
        $winning_amount = $data4['winning_amount'];
        $game_status = $data4['game_status'];
        $date = $data4['date'];
        $ludotype = $data4['ludotype'];
        $roomcode = $data4['roomcode'];
        $earning = $data4['earning'];
    }
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

											<form method="POST">
											    <select class="form-control">
											        	<?php
$sqls = "SELECT * FROM `resultupload` WHERE player_gameid1='$battelid'";
$runs = mysqli_query($conn, $sqls);

if (mysqli_num_rows($runs) < 1) {
    echo '<p class="alert alert-danger">Data Not Found</p>';
} else {

    $count = 0;
    while ($data6 = mysqli_fetch_assoc($runs)) {
        $count++;
        ?>
        <option value="<?php echo $data6['playermobilenumber1']; ?>"><?php echo $data6['playername1']; ?></option>
        <?php

    }
}
?>
											    </select>
											</form>
												<button class="btn btn-outline-primary">Amount Transfer</button>
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
							    <h5 class="btn btn-success">Team <?php echo $count; ?></h5>
											<div class="col-sm-3">
												<h6 class="mb-0">Player Name</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" readonly value="<?php echo $data['playername1']; ?>" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Player ID</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" readonly value="<?php echo $data['playerid1']; ?>" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Mobile</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" readonly value="<?php echo $data['playermobilenumber1']; ?>" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Room Code</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" readonly value="<?php echo $data['playerroom_code1']; ?>" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Battle ID</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" readonly value="<?php echo $data['player_gameid1']; ?>" />
											</div>
										</div>
											<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Screen Shot</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" readonly value="<?php echo $data['playerscreenshot1']; ?>" />
												<a class="btn btn-warning" href="../include/uploads/<?php echo $data['playerscreenshot1']; ?>" target="block">Open Screen Shot</a>
											</div>
										</div>
											<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Player Status</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" readonly value="<?php echo $data['playerstatus1']; ?>" />
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