<?php include("header.php");?>
<?php
$usercode=$_GET['usercode'];
$number=$_GET['number'];
if($_GET['usercode']){
    $sql="SELECT * FROM `user_regist` WHERE user_number='$number' && userrandcode='$usercode' Order BY id DESC";
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
        $playername=$data['user_Name'];
        $playernumber=$data['user_number'];
        $playerid=$data['userrandcode'];
        $refer=$data['refrel_id'];
        $joindate=$data['datejoin'];
        $profile=$data['profile'];
        $kyc=$data['kyc'];
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
								<li class="breadcrumb-item active" aria-current="page">User Profile</li>
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
											<img src="assets/images/avatars/avatar-2.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
											<div class="mt-3">
												<h4><?php echo $playername;?></h4>
												<p class="text-secondary mb-1"><?php echo $playernumber;?></p>
											<?php 
											if($data['kyc']==NULL){
											    ?>
											  <p>  <img src="https://webiconspng.com/wp-content/uploads/2016/12/Not-Verified-Icon-Image.png" title="Not Approved KYC" style="width:30px;"></p>
											    <?php
											}
											elseif($data['kyc']=="Approved"){
											    ?>
											   <p>  <img src="https://th.bing.com/th/id/R.e42e3ac9815c6a6e09da1821bea25a98?rik=Y1VbzCnPAQsNzw&riu=http%3a%2f%2fgetdrawings.com%2ffree-icon%2fverified-icon-69.png&ehk=wZSKb6KVAC3lQYyJcweHTnoIWG7geI3KNeE%2bVWwqZyg%3d&risl=&pid=ImgRaw&r=0" title=" Approved KYC" style="width:30px;"></p>
											    <?php
											    
											};
											?>
												<button class="btn btn-primary">Follow</button>
												<button class="btn btn-outline-primary">Message</button>
											</div>
										</div>
										<hr class="my-4" />
										<ul class="list-group list-group-flush">
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
												<span class="text-secondary">https://superludobd.com</span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><img src="https://cdn0.iconfinder.com/data/icons/social-messaging-ui-color-shapes/128/calendar-circle-blue-512.png" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github me-2 icon-inline">Join Date</h6>
												<span class="text-secondary"><?php echo $joindate;?></span>
											</li>
										<!--	<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter me-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
												<span class="text-secondary">@codervent</span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
												<span class="text-secondary">codervent</span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
												<span class="text-secondary">codervent</span>
											</li>-->
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="card">
								    
									<div class="card-body">
									    	<h5 class="d-flex align-items-center mb-3">Basic Details</h5>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Player Full Name</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" readonly value="<?php echo $playername;?>" />
											</div>
										</div>
										
       
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Player ID</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" readonly value="<?php echo $playerid;?>" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Phone</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" readonly value="<?php echo $playernumber;?>" />
											</div>
										</div>
									
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Refer Join</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control"  readonly value="<?php echo $refer;?>" />
											</div>
										</div>
										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<input type="button" class="btn btn-primary px-4"  value="Save Changes" />
											</div>
										</div>
									</div>
								</div>
								<?php
								 $sql="SELECT * FROM `kyc_details` WHERE usernumber='$number' && userid='$usercode' Order BY id DESC";
    $run=mysqli_query($conn,$sql);

    if(mysqli_num_rows($run)<1)
    {
      echo '<p class="alert alert-danger">Data Not Found</p>';
    }
else{
  
    $count=0;
    while($data2=mysqli_fetch_assoc($run))
    {
        $count++;
        if($data2['upi']==NULL){
        ?>
        
								<div class="row">
									<div class="col-sm-12">
										<div class="card">
											<div class="card-body">
												<h5 class="d-flex align-items-center mb-3">Payment  Details</h5>
												<p><?php echo "Bank Details";?></p>
												
													<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Holder Name</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control"  readonly value="<?php echo $data2['bank_holdername'];?>" />
											</div>
										</div>
												<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Bank Name</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control"  readonly value="<?php echo $data2['bank_name'];?>" />
											</div>
										</div>
												<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Account Number</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control"  readonly value="<?php echo $data2['bank_accountnumber'];?>" />
											</div>
										</div>
												<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">IFSC Code</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control"  readonly value="<?php echo $data2['bank_ifsccode'];?>" />
											</div>
										</div>
												
												
											
											
											
												</div>
											</div>
										</div>
									</div>
									<?php
    }
    ?>
    <?php
      if($data2['bank_ifsccode']==NULL){
        ?>
        
								<div class="row">
									<div class="col-sm-12">
										<div class="card">
											<div class="card-body">
												<h5 class="d-flex align-items-center mb-3">Payment  Details</h5>
												<p><?php echo "Bank Details";?></p>
												
													<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">UPI</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control"  readonly value="<?php echo $data2['upi'];?>" />
											</div>
										</div>
											
												
											
											
											
												</div>
											</div>
										</div>
									</div>
									<?php
    }

    }
}
?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php
}
}
}
?>
<?php include("footer.php");?>