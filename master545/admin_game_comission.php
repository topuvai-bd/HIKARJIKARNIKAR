<?php include("header.php"); $error="-";?>


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
								<li class="breadcrumb-item active" aria-current="page">Game Commission Set</li>
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
				<div class="row">
					<div class="col-xl-7 mx-auto">
					
						<?php
						if(isset($_POST['sets'])){
						    $amount=$_POST['amount'];
				$q ="update game_commission set amount='$amount' where id='1'";
						    $query = mysqli_query($conn,$q);
						    if($query==TRUE){
						        $error='<p class="alert alert-success">Game Commission Updated</p>';
						    }
						    
						}
    $sql="SELECT * FROM `game_commission` Order BY id DESC";
    $run=mysqli_query($conn,$sql);

    if(mysqli_num_rows($run)<1)
    {
      $amnd= '0';
    }
else{
  
    $count=0;
    while($data=mysqli_fetch_assoc($run))
    {
        $count++;
        
        $amnd=$data['amount'];
    }
}
?>
						<hr/>
						<div class="card border-top border-0 border-4 border-danger">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-user me-1 font-22 text-danger"></i>
									</div>
									<h5 class="mb-0 text-danger">Game Commission Set  &nbsp; <?php echo $amnd;?>%/ </h5>
								</div>
								<hr>
								<form  method="POST" class="row g-3">
									<div class="col-12">
									    <?php echo $error;?>
										<label for="inputPhoneNo" class="form-label">Enter Amount Only %  </label>
										<div class="input-group"> <span class="input-group-text bg-transparent">%</span>
											<input type="text" value="<?php echo $amnd;?>" required class="form-control border-start-0" id="amount" name="amount" placeholder="50" />
										</div>
									</div>
								
									<div class="col-12">
										<button type="submit" name="sets" class="btn btn-danger px-5">Set Game Commission</button>
									</div>
								</form>
							</div>
						</div>
					
					</div>
				</div>
			
			</div>
		</div>
		
		<?php include("footer.php");?>