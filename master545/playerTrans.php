<?php


 include("header.php");
 if (!isset($_SESSION)) {
	if(!isset($_SESSION)){ session_start();};
}

require_once('../db.php');

if(isset($_GET['number'])){
	$number_player = $_GET['number'];
}
else{
	// header("Location: wallte");
	//header( "refresh:7;url=index" );
	echo "<script>window.location.href='playerdata';</script>";
	die();
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
									
									</tr>
								</thead>
								<tbody>
								    
<?php
    // $sql="SELECT * FROM `addwallate_playe` Order BY id DESC";
    $sql="SELECT 
        id, 
        username_player, 
        number_player, 
        usercode_player, 
        amount_player, 
        product_info, 
        date_player, 
        status, 
        date, 
        order_number, 
        txn, 
        bc, 
        type1, 
        type2, 
        NULL as img_url, 
        NULL as method, 
        NULL as pnum,
        'referwallate' as source
    FROM `referwallate` where number_player = '$number_player'
    UNION ALL
    SELECT 
        id, 
        username_player, 
        number_player, 
        usercode_player, 
        amount_player, 
        product_info, 
        date_player, 
        status, 
        date, 
        order_number, 
        txn, 
        bc, 
        type1, 
        type2, 
        img_url, 
        method, 
        pnum,
        'addwallate_playe' as source
    FROM `addwallate_playe` where  number_player = '$number_player'
    ORDER BY `date` DESC";
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
									<td><?php echo $data['date'];?></td>

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
									
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php include("footer.php");?>