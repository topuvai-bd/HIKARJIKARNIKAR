<?php include "header.php";
?>
<div class="page-wrapper">
			<div class="page-content">

					<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
						<div class="col">
							<div class="card radius-10 ">
							 <div class="card-body">
								<div class="d-flex align-items-center">
								   <?php
$sql = "SELECT * FROM user_regist ";
if ($result = mysqli_query($conn, $sql)) {
    $rowcount = mysqli_num_rows($result);

}
?>
									<h5 class="mb-0 text-primary"><?php echo $rowcount; ?></h5>
									<div class="ms-auto">
                                        <i class='bx bx-group fs-3 text-primary'></i>
									</div>
								</div>
								<div class="progress my-2" style="height:4px;">
									<div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $rowcount / 100; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center">
									<p class="mb-0">Total Users</p>
									<p class="mb-0 ms-auto">+<?php echo $rowcount / 100; ?>%<span><i class='bx bx-up-arrow-alt'></i></span></p>
								</div>
							</div>
						  </div>
						</div>
						<div class="col">
							<div class="card radius-10">
							<div class="card-body">
							       <?php
$todaydate = date("d/M/Y");
$sql1 = "SELECT * FROM user_regist WHERE extradate='$todaydate'";
if ($result1 = mysqli_query($conn, $sql1)) {
    $rowcount1 = mysqli_num_rows($result1);

}
?>
								<div class="d-flex align-items-center">
									<h5 class="mb-0 text-success"><?php echo $rowcount1; ?></h5>
									<div class="ms-auto">
                                        <i class='bx bx-user fs-3 text-success'></i>
									</div>
								</div>
								<div class="progress my-2" style="height:4px;">
									<div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $rowcount1 / 100; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center">
									<p class="mb-0">Today User Join</p> &nbsp;&nbsp; <span style="font-weight:bold;color:#ff8000;"><?php echo date("d/M/Y"); ?></span>
									<p class="mb-0 ms-auto">+<?php echo $rowcount1 / 100; ?>%<span><i class='bx bx-up-arrow-alt'></i></span></p>
								</div>
							</div>
						  </div>
						</div>
						<div class="col">
							<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
								    		   <?php
$sql2 = "SELECT * FROM kyc_details ";
if ($result2 = mysqli_query($conn, $sql2)) {
    $rowcount2 = mysqli_num_rows($result2);

}
?>
									<h5 class="mb-0 text-danger"><?php echo $rowcount2; ?></h5>
									<div class="ms-auto">
                                        <i class='lni lni-empty-file fs-3 text-danger'></i>
									</div>
								</div>
								<div class="progress my-2" style="height:4px;">
									<div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $rowcount2 / 100; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center">
									<p class="mb-0">Total KYC</p>
									<p class="mb-0 ms-auto">+<?php echo $rowcount2 / 100; ?>%<span><i class='bx bx-up-arrow-alt'></i></span></p>
								</div>
							</div>
						</div>
						</div>
						<div class="col">
							<div class="card radius-10">
							 <div class="card-body">
								<div class="d-flex align-items-center">
								    	   <?php
$sql3 = "SELECT * FROM kyc_details WHERE sttaus='1'";
if ($result3 = mysqli_query($conn, $sql3)) {
    $rowcount3 = mysqli_num_rows($result3);

}
?>
									<h5 class="mb-0 text-warning"><?php echo $rowcount3; ?></h5>
									<div class="ms-auto">
                                        <i class='lni lni-empty-file fs-3 text-warning'></i>
									</div>
								</div>
								<div class="progress my-2" style="height:4px;">
									<div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $rowcount3 / 100; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center">
									<p class="mb-0">KYC Pending</p>
									<p class="mb-0 ms-auto">+<?php echo $rowcount3 / 100; ?>%<span><i class='bx bx-up-arrow-alt'></i></span></p>
								</div>
							</div>
						 </div>
						</div>
	</div>
							<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
						<div class="col">
							<div class="card radius-10 ">
							 <div class="card-body">
								<div class="d-flex align-items-center">
								     <?php
$sql4 = "SELECT * FROM create_game ";
if ($result4 = mysqli_query($conn, $sql4)) {
    $rowcount4 = mysqli_num_rows($result4);

}
?>
									<h5 class="mb-0 text-primary"><?php echo $rowcount4; ?></h5>
									<div class="ms-auto">
                                        <i class='lni lni-play fs-3 text-primary'></i>
									</div>
								</div>
								<div class="progress my-2" style="height:4px;">
									<div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $rowcount4 / 100; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center">
									<p class="mb-0">Total Battles</p>
									<p class="mb-0 ms-auto">+<?php echo $rowcount4 / 100; ?>%<span><i class='bx bx-up-arrow-alt'></i></span></p>
								</div>
							</div>
						  </div>
						</div>
						<div class="col">
							<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
								     <?php
$sql5 = "SELECT * FROM create_game WHERE date='$todaydate'";
if ($result5 = mysqli_query($conn, $sql5)) {
    $rowcount5 = mysqli_num_rows($result5);

}
?>
									<h5 class="mb-0 text-success"><?php echo $rowcount5; ?></h5>
									<div class="ms-auto">
                                        <i class='lni lni-play fs-3 text-success'></i>
									</div>
								</div>
								<div class="progress my-2" style="height:4px;">
									<div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $rowcount5 / 100; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center">
									<p class="mb-0">Today Battles</p> &nbsp;&nbsp; <span style="font-weight:bold;color:maroon;"><?php echo date("d/M/Y"); ?></span>
									<p class="mb-0 ms-auto">+<?php echo $rowcount5 / 100; ?>%<span><i class='bx bx-up-arrow-alt'></i></span></p>
								</div>
							</div>
						  </div>
						</div>
						<div class="col">
							<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
								     <?php
$sqls = "SELECT * FROM `addwallate_playe`";
$runs = mysqli_query($conn, $sqls);
$amountadds = 0;
if (mysqli_num_rows($runs) < 1) {
    // header("Location:../");
} else {

    $count = 0;
    while ($datas = mysqli_fetch_assoc($runs)) {
        $count++;
		// try parse string to int

        // $amountadds += $datas['amount_player'];
    }
}
?>
									<h5 class="mb-0 text-danger">&#8377;<?php echo $amountadds; ?></h5>
									<div class="ms-auto">
                                        <i class='lni lni-rupee fs-3 text-danger'></i>
									</div>
								</div>
								<div class="progress my-2" style="height:4px;">
									<div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $amountadds / 100; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center">
									<p class="mb-0">Total Amount</p>
									<p class="mb-0 ms-auto">+<?php echo $amountadds / 100; ?>%<span><i class='bx bx-up-arrow-alt'></i></span></p>
								</div>
							</div>
						</div>
						</div>
						<div class="col">
							<div class="card radius-10">
							 <div class="card-body">
								<div class="d-flex align-items-center">
								     <?php
$sqls1 = "SELECT * FROM `addwallate_playe` WHERE product_info='C'";
$runs1 = mysqli_query($conn, $sqls1);
$amountadds1=0;
if (mysqli_num_rows($runs1) < 1) {
    // header("Location:../");
} else {

    $count = 0;
    while ($datas1 = mysqli_fetch_assoc($runs1)) {
        $count++;
        // $amountadds1 += $datas1['amount_player'];
		$amountadds1 ="NULL";
    }
}
?>
									<h5 class="mb-0 text-success">&#8377;<?php echo $amountadds1; ?></h5>
									<div class="ms-auto">
                                        <i class='lni lni-sort-amount-asc fs-3 text-success'></i>
									</div>
								</div>
								<div class="progress my-2" style="height:4px;">
									<div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $amountadds1 / 100; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center">
									<p class="mb-0">Credit Amount</p>
									<p class="mb-0 ms-auto">+<?php echo $amountadds1 / 100; ?>%<span><i class='bx bx-up-arrow-alt'></i></span></p>
								</div>
							</div>
						 </div>
						</div>
	</div>
							<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
						<div class="col">
							<div class="card radius-10 ">
							 <div class="card-body">
								<div class="d-flex align-items-center">
								    <?php
$sqls2 = "SELECT * FROM `addwallate_playe` WHERE product_info='D'";
$runs2 = mysqli_query($conn, $sqls2);
$amountadds2=0;
if (mysqli_num_rows($runs2) < 1) {
    // header("Location:../");
} else {

    $count = 0;
    while ($datas2 = mysqli_fetch_assoc($runs2)) {
        $count++;
        $amountadds2 += $datas2['amount_player'];
    }
}
$totalamountsave = $amountadds1 - $amountadds2;
?>
									<h5 class="mb-0 text-danger">&#8377;<?php echo $amountadds2; ?></h5>
									<div class="ms-auto">
                                        <i class='lni lni-sort-amount-dsc fs-3 text-danger'></i>
									</div>
								</div>
								<div class="progress my-2" style="height:4px;">
									<div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $amountadds2 / 100; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center">
									<p class="mb-0">Debit Amount</p>
									<p class="mb-0 ms-auto">+<?php echo $amountadds2 / 100; ?>%<span><i class='bx bx-up-arrow-alt'></i></span></p>
								</div>
							</div>
						  </div>
						</div>
						<div class="col">
							<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<h5 class="mb-0 text-success">&#8377;<?php echo $totalamountsave; ?></h5>
									<div class="ms-auto">
                                        <i class='lni lni-google-wallet fs-3 text-success'></i>
									</div>
								</div>
								<div class="progress my-2" style="height:4px;">
									<div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $totalamountsave / 100; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center">
									<p class="mb-0">Wallet Balance</p>
									<p class="mb-0 ms-auto">+<?php echo $totalamountsave / 100; ?>%<span><i class='bx bx-up-arrow-alt'></i></span></p>
								</div>
							</div>
						  </div>
						</div>
						<div class="col">
							<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
								      <?php
$sqls3 = "SELECT * FROM `sattlement_request`";
$runs3 = mysqli_query($conn, $sqls3);
$satlamount=0;
if (mysqli_num_rows($runs3) < 1) {
    // header("Location:../");
} else {

    $count = 0;
    while ($datas3 = mysqli_fetch_assoc($runs3)) {
        $count++;
        $satlamount += $datas3['playeramount'];
    }
}
?>
									<h5 class="mb-0 text-danger">&#8377;<?php echo $satlamount; ?></h5>
									<div class="ms-auto">
                                        <i class='bx bx-send fs-3 text-danger'></i>
									</div>
								</div>
								<div class="progress my-2" style="height:4px;">
									<div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $satlamount / 100; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center">
									<p class="mb-0">Total Settlement Amount</p>
									<p class="mb-0 ms-auto">+<?php echo $satlamount / 100; ?>%<span><i class='bx bx-up-arrow-alt'></i></span></p>
								</div>
							</div>
						</div>
						</div>
						<div class="col">
							<div class="card radius-10">
							 <div class="card-body">
								<div class="d-flex align-items-center">
								         <?php
$sqls4 = "SELECT * FROM `sattlement_request` WHERE status='1'";
$runs4 = mysqli_query($conn, $sqls4);
$stlpending=0;

if (mysqli_num_rows($runs4) < 1) {
    // header("Location:../");
} else {

    $count = 0;
    while ($datas4 = mysqli_fetch_assoc($runs4)) {
        $count++;
        $stlpending += $datas4['playeramount'];
    }
}
?>
									<h5 class="mb-0 text-warning">&#8377;<?php echo $stlpending; ?></h5>
									<div class="ms-auto">
                                        <i class='bx bx-send fs-3 text-warning'></i>
									</div>
								</div>
								<div class="progress my-2" style="height:4px;">
									<div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $stlpending / 100; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center">
									<p class="mb-0">Settlement Pending Amount</p>
									<p class="mb-0 ms-auto">+<?php echo $stlpending / 100; ?>%<span><i class='bx bx-up-arrow-alt'></i></span></p>
								</div>
							</div>
						 </div>
						</div>
						</div>
							<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
						<div class="col">
							<div class="card radius-10 ">
							 <div class="card-body">
								<div class="d-flex align-items-center">
								      <?php
$sql6 = "SELECT * FROM sattlement_request";
if ($result6 = mysqli_query($conn, $sql6)) {
    $rowcount6 = mysqli_num_rows($result6);

}
?>
									<h5 class="mb-0 text-primary"><?php echo $rowcount6; ?></h5>
									<div class="ms-auto">
                                        <i class='bx bx-donate-blood fs-3 text-primary'></i>
									</div>
								</div>
								<div class="progress my-2" style="height:4px;">
									<div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $rowcount6 / 100; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center">
									<p class="mb-0">Total Settlement</p>
									<p class="mb-0 ms-auto">+<?php echo $rowcount6 / 100; ?>%<span><i class='bx bx-up-arrow-alt'></i></span></p>
								</div>
							</div>
						  </div>
						</div>
						<div class="col">
							<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
								      <?php
$sql7 = "SELECT * FROM sattlement_request WHERE status='1'";
if ($result7 = mysqli_query($conn, $sql7)) {
    $rowcount7 = mysqli_num_rows($result7);

}
?>
									<h5 class="mb-0 text-warning"><?php echo $rowcount7; ?></h5>
									<div class="ms-auto">
                                        <i class='bx bx-donate-blood fs-3 text-warning'></i>
									</div>
								</div>
								<div class="progress my-2" style="height:4px;">
									<div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $rowcount7 / 100; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center">
									<p class="mb-0">Settlement Pending</p>
									<p class="mb-0 ms-auto">+<?php echo $rowcount7 / 100; ?>%<span><i class='bx bx-up-arrow-alt'></i></span></p>
								</div>
							</div>
						  </div>
						</div>
						<div class="col">
							<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
								      <?php
$sqls5 = "SELECT * FROM `referwallate` WHERE product_info='C'";
$runs5 = mysqli_query($conn, $sqls5);
$referalamount=0;

if (mysqli_num_rows($runs5) < 1) {
    // header("Location:../");
} else {

    $count = 0;
    while ($datas5 = mysqli_fetch_assoc($runs5)) {
        $count++;
        $referalamount += $datas5['amount_player'];
    }
}
?>
									<h5 class="mb-0 text-success">&#8377;<?php echo $referalamount; ?></h5>
									<div class="ms-auto">
                                        <i class='lni lni-rupee fs-3 text-success'></i>
									</div>
								</div>
								<div class="progress my-2" style="height:4px;">
									<div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $referalamount / 100; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center">
									<p class="mb-0">Total Referal Amount</p>
									<p class="mb-0 ms-auto">+<?php echo $referalamount / 100; ?>%<span><i class='bx bx-up-arrow-alt'></i></span></p>
								</div>
							</div>
						</div>
						</div>
						<div class="col">
							<div class="card radius-10">
							 <div class="card-body">
								<div class="d-flex align-items-center">
								     <?php
$sqls6 = "SELECT * FROM `referwallate` WHERE product_info='D'";
$runs6 = mysqli_query($conn, $sqls6);
$redeemamountdd=0;

if (mysqli_num_rows($runs6) < 1) {
    $redeemamountdd = "0";
} else {

    $count = 0;
    while ($datas6 = mysqli_fetch_assoc($runs6)) {
        $count++;
        $redeemamountdd += $datas6['amount_player'];
    }
}
$refrelwallate = $referalamount - $redeemamountdd;
?>
									<h5 class="mb-0 text-danger">&#8377;<?php echo $redeemamountdd; ?></h5>
									<div class="ms-auto">
                                        <i class='lni lni-circle-minus fs-3 text-danger'></i>
									</div>
								</div>
								<div class="progress my-2" style="height:4px;">
									<div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $redeemamountdd / 100; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center">
									<p class="mb-0">Referal Redeem  Amount</p>
									<p class="mb-0 ms-auto">+<?php echo $redeemamountdd / 100; ?>%<span><i class='bx bx-up-arrow-alt'></i></span></p>
								</div>
							</div>
						 </div>
						</div>


	</div>

							<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
						<div class="col">
							<div class="card radius-10 ">
							 <div class="card-body">
								<div class="d-flex align-items-center">
									<h5 class="mb-0 text-primary">&#8377;<?php echo $refrelwallate; ?></h5>
									<div class="ms-auto">
                                        <i class='lni lni-rupee fs-3 text-primary'></i>
									</div>
								</div>
								<div class="progress my-2" style="height:4px;">
									<div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $refrelwallate / 100; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center">
									<p class="mb-0">Referal Wallet Balance</p>
									<p class="mb-0 ms-auto">+<?php echo $refrelwallate / 100; ?>%<span><i class='bx bx-up-arrow-alt'></i></span></p>
								</div>
							</div>
						  </div>
						</div>
						<div class="col">
							<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
								     <?php

$sql8 = "SELECT * FROM contact_data ";
if ($result8 = mysqli_query($conn, $sql8)) {
    $rowcount8 = mysqli_num_rows($result8);
    $sd1 = $rowcount8 / 100;
}
?>
									<h5 class="mb-0 text-success"><?php echo $rowcount8; ?></h5>
									<div class="ms-auto">
                                        <i class='bx bx-envelope fs-3 text-success'></i>
									</div>
								</div>
								<div class="progress my-2" style="height:4px;">
									<div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $sd1; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center">
									<p class="mb-0"> Help </p>
									<p class="mb-0 ms-auto">+<?php echo $sd1; ?>%<span><i class='bx bx-up-arrow-alt'></i></span></p>
								</div>
							</div>
						  </div>
						</div>
						<div class="col">
							<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
								       <?php
$sqlsadmin = "SELECT * FROM `adminearning` WHERE typeC_d='C'";
$runsadmin = mysqli_query($conn, $sqlsadmin);
$amountadminddd=0;

if (mysqli_num_rows($runsadmin) < 1) {
    // header("Location:../");
} else {

    $count = 0;
    while ($datadmin = mysqli_fetch_assoc($runsadmin)) {
        $count++;
        $amountadminddd += $datadmin['earningamount'];
    }
}
?>
									<h5 class="mb-0 text-danger">&#8377;<?php echo $amountadminddd; ?></h5>
									<div class="ms-auto">
                                        <i class='bx bx-group fs-3 text-danger'></i>
									</div>
								</div>
								<div class="progress my-2" style="height:4px;">
									<div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $amountadminddd / 100; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center">
									<p class="mb-0">Admin Earning</p>
									<p class="mb-0 ms-auto">+<?php echo $amountadminddd / 100; ?>%<span><i class='bx bx-up-arrow-alt'></i></span></p>
								</div>
							</div>
						</div>
						</div>
						<div class="col">
							<div class="card radius-10">
							 <div class="card-body">
								<div class="d-flex align-items-center">
								     <?php
$datedsfgdsf = date("d/M/Y");
$sqlsadmin1 = "SELECT * FROM `adminearning` WHERE typeC_d='C' && date='$datedsfgdsf'";
$runsadmin1 = mysqli_query($conn, $sqlsadmin1);
$amountadminddd1=0;

if (mysqli_num_rows($runsadmin1) < 1) {
    // header("Location:../");
} else {

    $count = 0;
    while ($datadmin1 = mysqli_fetch_assoc($runsadmin1)) {
        $count++;
        $amountadminddd1 += $datadmin1['earningamount'];
    }
}
?>
									<h5 class="mb-0 text-warning">&#8377;<?php echo $amountadminddd1; ?></h5>
									<div class="ms-auto">
                                        <i class='bx bx-envelope fs-3 text-warning'></i>
									</div>
								</div>
								<div class="progress my-2" style="height:4px;">
									<div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $amountadminddd1 / 100; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center">
									<p class="mb-0">Today Admin Earning</p>&nbsp;&nbsp; <span style="font-weight:bold;color:maroon;"><?php echo date("d/M/Y"); ?></span>
									<p class="mb-0 ms-auto">+<?php echo $amountadminddd1 / 100; ?> %<span><i class='bx bx-up-arrow-alt'></i></span></p>
								</div>
							</div>
						 </div>
						</div>
						</div>





	  <div class="card radius-10">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<h5 class="mb-0">Latest Player Join <img src="https://1.bp.blogspot.com/-6_2pKRWJ-v8/XqbczamfC-I/AAAAAAAAPBs/c6oUY33XOSEsw2hdPag0bKK6cqbxjSJwQCLcBGAsYHQ/s1600/arrow-with-new.gif" width="40"></h5>
								</div>
								<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
								</div>
							</div>
							<hr>
							<div class="table-responsive">
								<table class="table align-middle mb-0">
									<thead class="table-light">
										<tr>
											<th>Player ID</th>
											<th>Player Name</th>
											<th>Player Number</th>
											<th>Referral ID</th>
											<th>Date</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
									      <?php
$sqlsuserd = "SELECT * FROM `user_regist` ORDER BY id DESC LIMIT 10";
$runsuser = mysqli_query($conn, $sqlsuserd);
$redeemamountdd=0;

if (mysqli_num_rows($runsuser) < 1) {
    echo '<p class="alert alert-danger">Data Not Found</p>';
} else {

    $count = 0;
    while ($datauserplayer = mysqli_fetch_assoc($runsuser)) {
        $count++;
        // $redeemamountdd += $datauserplayer['amount_player'];
        ?>
										<tr>
											<td><?php echo $datauserplayer['userrandcode']; ?><img src="http://www.aactni.edu.in/iqac/images/animated/new_gif.gif" width="30"></td>
											<td>
												<div class="d-flex align-items-center">
													<div class="ms-2">
														<h6 class="mb-1 font-14"><?php echo $datauserplayer['user_Name']; ?></h6>
													</div>
												</div>
											</td>
											<td><?php echo $datauserplayer['user_number']; ?></td>
											<td><?php echo $datauserplayer['refrel_id']; ?></td>
											<td><?php echo $datauserplayer['datejoin']; ?></td>
											<td>
												<div class="badge rounded-pill bg-success text-gray w-50">Active</div>
											</td>

										</tr>

										<?php
}
}
?>
									</tbody>
								</table>
							</div>
						</div>
					</div>








						</div>
						</div>

<?php include "footer.php";?>