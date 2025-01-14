<?php include("header.php");?>
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
								<li class="breadcrumb-item active" aria-current="page">KYC-Data</li>
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
										<th>Player Number</th>
										<th>Player Code</th>
										<th>KYC Code</th>
										<th>Adharcard Front</th>
										<th>Adharcard Back</th>
										<th>Status</th>
										<th>Date</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								    
<?php
    $sql="SELECT * FROM `kyc_details` Order BY id DESC";
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
										<td><?php echo $count;?></td>
										<td><a href="bandata?usercode=<?php echo $data['userid'];?>&&number=<?php echo $data['usernumber'];?>"><?php echo $data['username'];?></a></td>
										<td><?php echo $data['usernumber'];?></td>
										<td><?php echo $data['userid'];?></td>
										<td><?php echo $data['kyccode'];?></td>
										<td><a class="btn btn-primary btn-sm" target="block" href="../<?php echo $data['adharcard_front'];?>"><i class="lni lni-files"></i> Front</a></td>
											<td><a class="btn btn-primary btn-sm" target="block" href="../<?php echo $data['adharcard_back'];?>"><i class="lni lni-files"></i> Back</a></td>
										<td><?php if($data['sttaus']=="1"){
										    ?>
										<a href="" class="btn btn-warning btn-sm" title="Active">Pending</a> 
										<?php
										}
										if($data['sttaus']=="2"){
										    ?>
										<a href="" class="btn btn-success btn-sm" title="Disactive">Approve</a> 
										<?php
										}
										;?></td>
										<td><?php echo $data['date'];?></td>
										
										
											<td>
											    	<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-success"><i class="lni lni-consulting"></i></button>
							<button type="button" onclick="console.log('working')" class="btn btn-success split-bg-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="approve?idkyc=<?php echo $data['kyccode'];?>&&number=<?php echo $data['usernumber'];?>&&status=<?php echo "Approve";?>">Approve</a>
								<a class="dropdown-item" href="approve?idkyc=<?php echo $data['kyccode'];?>&&number=<?php echo $data['usernumber'];?>&&status=<?php echo "Disapprove";?>">Disapprove</a>
								<a class="dropdown-item" href="javascript:;">Notification</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="javascript:;">Delete</a>
							</div>
						</div>
					</div>
											    
											    
											 
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
										<th>KYC Code</th>
										<th>Adharcard Front</th>
										<th>Adharcard Back</th>
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
		
		<?php include("footer.php");?>