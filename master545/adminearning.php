<?php include("header.php");?>
	<!--start page wrapper -->
	
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
					<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
					
							<div class="col">
							<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
								       <?php
    $sqlsadmin="SELECT * FROM `adminearning` WHERE typeC_d='C'";
    $runsadmin=mysqli_query($conn,$sqlsadmin);

    if(mysqli_num_rows($runsadmin)<1)
    {
      // header("Location:../");
    }
else{
  
    $count=0;
    while($datadmin=mysqli_fetch_assoc($runsadmin))
    {
        $count++;
         $amountadminddd+= $datadmin['earningamount'];
        }
        }
        ?>
									<h5 class="mb-0 text-primary">&#8377;<?php echo $amountadminddd;?></h5>
									<div class="ms-auto">
                                        <i class='lni lni-rupee fs-3 text-primary'></i>
									</div>
								</div>
								<div class="progress my-2" style="height:4px;">
									<div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $amountadminddd/100;?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center">
									<p class="mb-0">Admin Total Earning</p>
									<p class="mb-0 ms-auto">+<?php echo $amountadminddd/100;?>%<span><i class='bx bx-up-arrow-alt'></i></span></p>
								</div>
							</div>
						</div>
						</div>
						<div class="col">
							<div class="card radius-10">
							 <div class="card-body">
								<div class="d-flex align-items-center">
								     <?php
								     $datedsfgdsf=date("d/M/Y");
    $sqlsadmin1="SELECT * FROM `adminearning` WHERE typeC_d='C' && date='$datedsfgdsf'";
    $runsadmin1=mysqli_query($conn,$sqlsadmin1);

    if(mysqli_num_rows($runsadmin1)<1)
    {
      // header("Location:../");
    }
else{
  
    $count=0;
    while($datadmin1=mysqli_fetch_assoc($runsadmin1))
    {
        $count++;
         $amountadminddd1+= $datadmin1['earningamount'];
        }
        }
        ?>
									<h5 class="mb-0 text-success">&#8377;<?php echo $amountadminddd1;?></h5>
									<div class="ms-auto">
                                        <i class='lni lni-rupee fs-3 text-success'></i>
									</div>
								</div>
								<div class="progress my-2" style="height:4px;">
									<div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $amountadminddd1/100;?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center">
									<p class="mb-0">Today Admin Earning</p>&nbsp;&nbsp; <span style="font-weight:bold;color:maroon;"><?php echo date("d/M/Y");?></span>
									<p class="mb-0 ms-auto">+<?php echo $amountadminddd1/100;?> %<span><i class='bx bx-up-arrow-alt'></i></span></p>
								</div>
							</div>
						 </div>
						</div>
						</div>
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Dashboard</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Real Time Wallte Admin</li>
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
										<th>Player Phone</th>
										<th>Amount</th>
										<th>Debit/Credit</th>
										
										<th>Status</th>
										<th>TXN ID</th>
										<th>Type</th>
										<th>Date</th>
									
									</tr>
								</thead>
								<tbody>
								    
<?php
    $sql="SELECT * FROM `adminearning` Order BY id DESC";
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
										<td><?php echo $data['usernumber'];?></td>
									
										<td>&#8377;<?php echo $data['earningamount'];?></td>
										<td><?php if($data['typeC_d']=="D"){
										echo '<p class="text-danger" style="font-weight:bold;">Debit</p>';
										}
										elseif($data['typeC_d']=="C"){
										echo '<p class="text-success" style="font-weight:bold;">Credit</p>';
										}
									;?>
										
										
										
										
										</td>
										<td><?php if($data['sttaus']=="1"){
										echo '<p class="btn btn-success btn-sm">Success</p>';
										}
										elseif($data['status']=="Pending"){
										echo '<p class="btn btn-warning btn-sm">Pending</p>';
										}
									;?></td>
										<td><?php echo $data['TXNID'];?></td>
											<td><?php echo $data['kaha'];?></td>
										
										
									
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
										<th>Player Phone</th>
										<th>Amount</th>
										<th>Debit/Credit</th>
										
										<th>Status</th>
										<th>TXN ID</th>
										<th>Type</th>
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