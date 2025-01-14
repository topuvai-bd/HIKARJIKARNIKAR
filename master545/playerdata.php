<?php include "header.php";?>
	<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Dashboard</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Data Table</li>
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

				<h6 class="mb-0 text-uppercase">Player Data</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>S.No.</th>
										<th>Player Name</th>
										<th>Player Number</th>
										<th>Player Code</th>
										<th>Refer Code</th>
										<th>Amount</th>
										<th>WinningAmount</th>
										<th>Status</th>
										<th>Date</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>

<?php
// $sql="SELECT *  FROM `user_regist` Order BY id DESC";
$sql = "SELECT
        user_regist.*, (SELECT
        COALESCE(
            SUM(CASE WHEN addwallate_playe.product_info = 'C' AND addwallate_playe.status = 'success' THEN addwallate_playe.amount_player ELSE 0 END) -
            SUM(CASE WHEN addwallate_playe.product_info = 'D' AND addwallate_playe.status = 'success' THEN addwallate_playe.amount_player ELSE 0 END),
            0
        ) as user_balance FROM addwallate_playe WHERE  user_regist.user_number = addwallate_playe.number_player )
		AS user_balance ,


       (SELECT
       COALESCE(
            SUM(CASE WHEN referwallate.product_info = 'C' AND referwallate.status = 'success' THEN referwallate.amount_player ELSE 0 END) -
            SUM(CASE WHEN referwallate.product_info = 'D' AND referwallate.status = 'success' THEN referwallate.amount_player ELSE 0 END),
            0
        ) as user_balance_refer FROM referwallate WHERE user_regist.user_number = referwallate.number_player )
        AS user_balance_winning
    FROM
        user_regist
    ORDER BY
        user_regist.id DESC;";
$run = mysqli_query($conn, $sql);

if (mysqli_num_rows($run) < 1) {
    echo '<p class="alert alert-danger">Data Not Found</p>';
} else {

    $count = 0;
    while ($data = mysqli_fetch_assoc($run)) {
        $count++;
        ?>
									<tr>
										<td><?php echo $count; ?></td>
										<td><?php echo $data['user_Name']; ?></td>
										<td><?php echo $data['user_number']; ?></td>
										<td><?php echo $data['userrandcode']; ?></td>
										<td><?php echo $data['refrel_id']; ?></td>
										<td><a href="javascript:void(0)" onclick="AddWallet('<?php echo $data['user_number']; ?>',1,0)" class="btn btn-warning btn-sm" title="View Profile"><i class="lni lni-circle-minus"></i></a>
										 <?php echo $data['user_balance']; ?> <a class="btn btn-primary btn-sm" href="javascript:void(0)" onclick="AddWallet('<?php echo $data['user_number']; ?>',1,1)" title="Delete Player"><i class="lni lni-circle-plus"></i></a>
										</td>
										<td><a href="javascript:void(0)" onclick="AddWallet('<?php echo $data['user_number']; ?>',0,0)" class="btn btn-warning btn-sm" title="View Profile"><i class="lni lni-circle-minus"></i></a>
										 <?php echo $data['user_balance_winning']; ?> <a class="btn btn-primary btn-sm" href="javascript:void(0)" onclick="AddWallet('<?php echo $data['user_number']; ?>',0,1)" title="Delete Player"><i class="lni lni-circle-plus"></i></a>
										</td>
										<td><?php if ($data['status'] == "1") {
            ?>
										<a href="" class="btn btn-success btn-sm" title="Active">Active</a>
										<?php
}
        if ($data['status'] == "2") {
            ?>
										<a href="" class="btn btn-danger btn-sm" title="Disactive">Disactive</a>
										<?php
}
        ;?></td>
										<td><?php echo $data['datejoin']; ?></td>
										<td><a href="playerTrans?number=<?php echo $data['user_number']; ?>" class="btn btn-warning btn-sm" title="View Profile"><i class="lni lni-eye"></i></a>
										| <a class="btn btn-danger btn-sm" href="javascript:void(0)" onclick="alert('can\'t delete')" title="Delete Player"><i class="lni lni-trash"></i></a>
									</td>
									</tr>

								<?php
}
}
?>
								</tbody>
								<tfoot>
									<tr>
										<th>S.No.</th>
										<th>Player Name</th>
										<th>Player Number</th>
										<th>Player Code</th>
										<th>Refer Code</th>
										<th>Amount</th>
										<th>WinningAmount</th>
										<th>Status</th>
										<th>Date</th>
										<th>Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
			function AddWallet(usernumber, type = 1,operation = 1) {

						// window.location.href = 'playnow?gmgame='+$('#gameroomID').val();
						if(operation==1){
							// adding amount
							var title = "Amount to Add";
						}else{
							// minus amount
							var title = "Amount to Deduct";
						}
						Swal.fire({
						title: title,
						input: "text",
						inputAttributes: {
							autocapitalize: "off"
						},
						showCancelButton: true,
						confirmButtonText: "Add Now",
						showLoaderOnConfirm: true,
						preConfirm: (referralCode) => {
							// Assuming you want to validate or use the referral code before redirecting
							// You can perform any asynchronous operation here if needed
							return referralCode; // This is just a placeholder for any processing you might want to do
						}
						}).then((result) => {
							if (result.isConfirmed && result.value) {
								// Redirect to the refer page with the referral code as a query parameter
								// window.location.href = `refer?referedby=${result.value}`;
								// playnow.php?gmgame=<php echo $datad['gameidrandom'];?>
								console.log(result.value);
								$.ajax({
									url: "updateBalance.php",
									method: "POST",
									data: {
										amount: result.value,
										usernumber: usernumber,
										type: type,
										operation: operation
									},
									success: function(data) {
										console.log(data);
										if(data.includes("200")){
											window.location.href = 'playerdata';
										}else{
											Swal.fire({
												title: "Error",
												text: "Error while updating user balance.",
												icon: "error",
												button: "Ok",
											});
										}
									}
								});
							}
					});

			}
			function MinusWallet(usernumber) {

			}



		</script>
		<?php include "footer.php";?>

