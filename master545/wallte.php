<?php


 include("header.php");
 if (!isset($_SESSION)) {
	if(!isset($_SESSION)){ session_start();};
}

require_once('../db.php');

if (isset($_GET['id'])) {

	$amouttoadd = $_GET['amount'];
	$idtoadd = $_GET['id'];
	$type = $_GET['type'];
	if($type=="success"){
		// echo "success";
		$sql = "UPDATE `addwallate_playe` SET `status`= 'success' WHERE id = '$idtoadd' ";
	}else{
		// echo "fail";
		$sql = "UPDATE `addwallate_playe` SET `status`= 'failure' WHERE id = '$idtoadd' ";
	}


	if ($conn->query($sql) === TRUE) {
		// header("Location: https://superludobd.com/master545/wallte");
		
	} else {
		// header("Location: wallte?msg=success");
		
	}
	echo "<script>window.location.href='https://superludobd.com/master545/wallte';</script>";
	exit();
}




?>
	


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
								<li class="breadcrumb-item active" aria-current="page">Real Time Wallte</li>
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
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>S.No.</th>
										<th>Player Name</th>
										<th>Player Phone</th>
										<th>Player Code</th>
										<th>Amount</th>
										<th>Debit/Credit</th>
										<th>Status</th>
										<th>TXN ID</th>
										<th>Type</th>
										<th>Date</th>
										<th>Provide</th>
										<th>Image</th>
										<th>Method</th>
										<th>Payment-Number</th>
									
									</tr>
								</thead>
								<tbody>
								    
<?php
    $sql="SELECT * FROM `addwallate_playe` Order BY id DESC";
    $run=mysqli_query($conn,$sql);

    if(mysqli_num_rows($run)<1)
    {
      echo '<p class="alert alert-danger">Data Not Found</p>';
    }
else{
  
    $count=0;
    while($data=mysqli_fetch_assoc($run))
    {
        $count++;
        ?>
									<tr>
										<td><?php echo $count;?>.</td>
										<td><?php echo $data['username_player'];?></td>
										<td><?php echo $data['number_player'];?></td>
										<td><?php echo $data['usercode_player'];?></td>
										<td>&#8377;<?php echo $data['amount_player'];?></td>
										<td><?php if($data['product_info']=="D"){
										echo '<p class="text-danger" style="font-weight:bold;">Debit</p>';
										}
										elseif($data['product_info']=="C"){
										echo '<p class="text-success" style="font-weight:bold;">Credit</p>';
										}
									;?>
										
										
										
										
										</td>
										<td><?php if($data['status']=="success"){
										echo '<p class="btn btn-success btn-sm">Success</p>';
										}
										elseif($data['status']=="Pending"){
										echo '<p class="btn btn-warning btn-sm">Pending</p>';
										}
										elseif($data['status']=="failure"){
										echo '<p class="btn btn-danger btn-sm">Failure</p>';
										};?></td>
										<td><?php echo $data['order_number'];?></td>
										
										
										
										<td><?php if($data['bc']==NULL){
										echo '<p class="text-success" style="font-weight:bold;">Wallte</p>';
										}
										else{
										echo '<p class="text-danger" style="font-weight:bold">Refund</p>';
										?>
										<span style="font-size:10px;"><?php echo $data["bc"];?></span>
										<?php
										}
									;?></td>

<?php
// Assuming $data['date'] contains the date in 'Y-m-d H:i:s' format
$date2 = $data['date'];
$datetime = new DateTime($date2);
$datetime->modify('+5 hours +30 minutes');
$new_date = $datetime->format('Y-m-d h:i:s A');
?>
									<td><?php echo $new_date;?></td>

									 <!-- modified -->
									  <!-- two btn x and ok, with link -->
									<!-- <td><php echo $data['date'];?></td> -->
									 <td>
										<?php if($data['status']=="Pending"){
											// post with get method
											echo '<div class="btn-group"><a href="wallte?id='.$data['id'].'&amount='.$data['amount_player'].'&type=fail" data-rid="success" class="btn btn-icon btn-danger rejectreq"><i class="bx bx-x"></i></a>
											<a href="wallte?id='.$data['id'].'&amount='.$data['amount_player'].'&type=success" class="btn btn-icon btn-success"><i class="bx bx-check"></i></a>
										   </div>';
										}else{
											echo '<p class="text-success" style="font-weight:bold;">DONE</p>';
										} ?>
									 
									 </td>

									<!-- img url  -->
									<td><a href="<?php echo $data['img_url'];?>" class="btn btn-success btn-sm" target="_blank">View</a></td>
									<td><?php echo $data['method'];?></td>
									<td><?php echo $data['pnum'];?></td>

										
										
										
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
										<th>Player Phone</th>
										<th>Player Code</th>
										<th>Amount</th>
										<th>Debit/Credit</th>
										<th>Status</th>
										<th>TXN ID</th>
										<th>Type</th>
										<th>Date</th>
										<th>Provide</th>
										<th>Image</th>
										<th>Method</th>
										<th>Number</th>
									
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php include("footer.php");?>