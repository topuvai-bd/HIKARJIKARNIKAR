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
			
				<h6 class="mb-0 text-uppercase">Running Battle Data</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>S.No.</th>
										<th>Battle Create</th>
										<th>Battle ID</th>
										<th>Entry Fee</th>
										<th>Winning Price</th>
										<th>Admin Commission</th>
										<th>Room Code</th>
										<th>Ludo Type</th>
										<th>Date</th>
									
									</tr>
								</thead>
								<tbody>
								    
<?php
    $sql="SELECT * FROM `create_game` WHERE game_status='2' Order BY id DESC";
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
										<td><?php echo $data['fname'];?></td>
										<td><?php echo $data['gameidrandom'];?></td>
										<td>&#8377;<?php echo $data['game_amount'];?></td>
										<td>&#8377;<?php echo $data['winning_amount'];?></td>
											<td>&#8377;<?php echo $data['earning'];?></td>
										<td><?php echo $data['roomcode'];?></td>
										<td><?php echo $data['ludotype'];?></td>
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
											<th>Battle Create</th>
										<th>Battle ID</th>
										<th>Entry Fee</th>
										<th>Winning Price</th>
										<th>Admin Commission</th>
										<th>Room Code</th>
										<th>Ludo Type</th>
										<th>Date</th>
									
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php include("footer.php");?>