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
								<li class="breadcrumb-item active" aria-current="page">Contact Data</li>
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
										<th>Player ID</th>
										<th>Ticket Number</th>
										<th>Reason</th>
										<th>Message</th>
										<th>Date</th>
									</tr>
								</thead>
								<tbody>
								    
<?php
    $sql="SELECT * FROM `contact_data` Order BY id DESC";
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
										<td><?php echo $data['username_id'];?></td>
										<td><?php echo $data['userlogin_number'];?></td>
										<td><?php echo $data['user_code'];?></td>
										<td><?php echo $data['ticketnumber'];?></td>
										
										<td><?php echo $data['resons'];?></td>
										<td><textarea><?php echo $data['message'];?></textarea></td>
										<td><?php echo $data['date'];?></td>
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