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
								<li class="breadcrumb-item active" aria-current="page">Sattalment Request</li>
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
										
										<th>UPI</th>
										<th>Bank Holdername</th>
										<th>IFCE</th>
										<th>Account No</th>
										<th>Bank name</th>
										
										<th>Player Code</th>
										<th>Amount</th>
										<th>Charges</th>
										<th>Transferd Amount</th>
										<th>Sattalment ID</th>
										<th>Status</th>
										<th>Type</th>
										<th>Date</th>
										<th>Action</th>
									
									</tr>
								</thead>
								<tbody>
								    
<?php
    $sql="SELECT * FROM `sattlement_request` Order BY id DESC";
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
        
        
        $usernumber = $data['player_phone'];
		// $upi = $data['upiid'];
		$upi = "upiid";
        
        
          $sql = "SELECT * FROM kyc_details WHERE usernumber = '$usernumber'";
        $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    $bankHolderName = $row["bank_holdername"];
                    $bankIfscCode = $row["bank_ifsccode"];
                    $bankName = $row["bank_name"];
                    $bankAccountNumber = $row["bank_accountnumber"];
                    if(!isset($upi)){
						$upi = $row["upi"];
					}
            
                    // // You can do something with the retrieved data here
                    // echo "Bank Holder Name: " . $bankHolderName . "<br>";
                    // echo "Bank IFSC Code: " . $bankIfscCode . "<br>";
                    // echo "Bank Name: " . $bankName . "<br>";
                    // echo "Bank Account Number: " . $bankAccountNumber . "<br>";
                    // echo "UPI: " . $upi . "<br>";
                }
            } else {
                
                $bankHolderName = 'null';
                    $bankIfscCode = 'null';
                    $bankName = 'null';
                    $bankAccountNumber = 'null';
                    if(!isset($upi)){
						$upi = 'null';
					}
                // echo "No data found for usernumber: " . $usernumber;
            }
        ?>
									<tr>
										<td><?php echo $count;?>.</td>
										<td><?php echo $data['playername'];?></td>
										<td><?php echo $data['player_phone'];?></td>
										
										
										<td><?php echo $upi;?></td>
										<td><?php echo $bankHolderName;?></td>
										<td><?php echo $bankIfscCode;?></td>
										<td><?php echo $bankAccountNumber;?></td>
										<td><?php echo $bankName;?></td>
										
										
										
										<td><?php echo $data['playeruserid'];?></td>
										<td>&#8377;<?php echo $data['playeramount'];?></td>
										<td><?php echo $data['sattlement_charge'];?>%</td>
											<td>&#8377;<?php echo $data['famunt'];;?></td>
										<td><?php echo $data['player_sattlementid'];?></td>
											<td><?php if($data['status']==1){
										echo '<p class="btn btn-warning btn-sm" >Pending</p>';
										}
										elseif($data['status']==2){
										echo '<p class="btn btn-success btn-sm">Transferd</p>';
										}
										elseif($data['status']==3){
										echo '<p class="btn btn-primary btn-sm">Canceled</p>';
										}
										
									;?></td>
										
										
										<td>Sattalment</td>
										<?php
// Assuming $data['date'] contains the date in 'Y-m-d H:i:s' format
$date2 = $data['date'];
$datetime = new DateTime($date2);
$datetime->modify('+5 hours +30 minutes');
$new_date = $datetime->format('Y-m-d h:i:s A');
?>
										<td><?php echo $new_date;?></td>
										<td>
										    	<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-success"><i class="lni lni-consulting"></i></button>
							<button type="button" class="btn btn-success split-bg-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="stl.php?stlt=<?php echo $data['player_sattlementid'];?>&&number=<?php echo $data['player_phone'];?>&&status=<?php echo "T";?>&&id=<?php  echo $data['id'];?>">Transfered</a>
								<a class="dropdown-item" href="stl.php?stlt=<?php echo $data['player_sattlementid'];?>&number=<?php echo $data['player_phone'];?>&&status=<?php echo "P";?>&&id=<?php  echo $data['id'];?>">Pending</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="stl.php?stlt=<?php echo $data['player_sattlementid'];?>&number=<?php echo $data['player_phone'];?>&status=<?php echo "C";?>&id=<?php  echo $data['id'];?>">Delete</a>
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
										<th>Player Phone</th>
										<th>Player Code</th>
										<th>Amount</th>
										<th>Charges</th>
										<th>Transferd Amount</th>
										<th>Sattalment ID</th>
										<th>Status</th>
								
										<th>Type</th>
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