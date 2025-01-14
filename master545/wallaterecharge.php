<?php include("header.php");?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
								<li class="breadcrumb-item active" aria-current="page">Wallat Recharge</li>
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
				    <div class="col-xl-12 mx-auto">
				        	<div class="card border-top border-0 border-4 border-danger">
							<div class="card-body ">
								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-user me-1 font-22 text-danger"></i>
									</div>
									<h5 class="mb-0 text-danger">Wallat Recharge  </h5>
								</div>
								<hr>
								<form  method="POST" class="row g-3">
									<div class="col-8">
									    <?php //echo $error;?>
										<label for="inputPhoneNo" class="form-label">Enter Mobile Number</label>
										<div class="input-group"> <span class="input-group-text bg-transparent"><i class="lni lni-phone"></i></span>
											<input type="text" value="<?php // echo $amnd;?>" required class="form-control border-start-0" id="numbercheck" name="numbercheck" placeholder="Enter Player Mobile Number" />
										</div>
									</div>
									<div class="col-4 p-1">
									    <br>
									   	<button type="submit" name="sets" class="btn btn-danger px-5">Submit</button>
									</div>
								
								
								</form>
							</div>
						</div>
					
					</div>
				</div>
			
			</div>
		</div>
				    </div> 
					<div class="col-xl-7 mx-auto">
					
						<?php
						if(isset($_POST['sets'])){
						    $checnumber=$_POST['numbercheck'];
			  $sql="SELECT * FROM `user_regist` WHERE user_number='$checnumber' Order BY id DESC";
    $run=mysqli_query($conn,$sql);

    if(mysqli_num_rows($run)<1)
    {
      echo '<p class="alert alert-danger">Player Mobile Number Not Found</p>';
    }
else{
  
    $count=0;
    while($data=mysqli_fetch_assoc($run))
    {
        $count++;
        $playernamesdds=$data['user_Name'];
        $playesidhf=$data['userrandcode'];
        $user_numbersps=$data['user_number'];

?>
						<hr/>
						<div class="card border-top border-0 border-4 border-danger">
							<div class="card-body ">
								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-user me-1 font-22 text-danger"></i>
									</div>
									<h5 class="mb-0 text-danger">User Details  &nbsp;  </h5> <span id="response"></span>
								</div>
								<hr>
								<form   name="myform" method="POST" id="submit_form" class="row g-3">
								    	<div class="col-4">
									   	<input type="hidden" readonly value="<?php echo $user_numbersps;?>" required class="form-control border-start-0" id="number" name="number" placeholder="50" />
										<label for="inputPhoneNo" class="form-label">Player Name</label>
										<div class="input-group"> <span class="input-group-text bg-transparent"><i class="lni lni-user"></i></span>
											<input type="text" readonly value="<?php echo $playernamesdds;?>" required class="form-control border-start-0" id="names" name="names" placeholder="" />
										</div>
									</div>
										<div class="col-4">
									   
										<label for="inputPhoneNo" class="form-label">Player ID</label>
										<div class="input-group"> <span class="input-group-text bg-transparent"><i class="lni lni-docker"></i></span>
											<input type="text" value="<?php echo $playesidhf;?>" required class="form-control border-start-0" readonly id="playerid" name="playerid" placeholder="50" />
										</div>
									</div>
									<div class="col-4">
									  
										<label for="inputPhoneNo" class="form-label">Amount</label>
										<div class="input-group"> <span class="input-group-text bg-transparent">&#8377;</span>
											<input type="text" value="" required class="form-control border-start-0" id="amount" name="amount" placeholder="50" />
										</div>
									</div>
								
									<div class="col-12">
										<button type="button" name="rechrgesd" id="rechrgesd" class="btn btn-danger px-5">Recharge</button>
									</div>
								</form>
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
						
<script>  
 $(document).ready(function(){  
      $('#rechrgesd').click(function(){  
           var names = $('#names').val();  
           var number = $('#number').val(); 
		   var playerid = $('#playerid').val();
		   var amount = $('#amount').val(); 
           if(names == '' || number == '' || playerid == '' || amount == '')  
           {  
                $('#response').html('<span class="alert alert-danger">Please Enter Amount</span>');  
           } 
		    
           else  
           {  
                $.ajax({  
                     url:"rechrgenow.php",  
                     method:"POST",  
                     data:$('#submit_form').serialize(),  
                     beforeSend:function(){  
                          $('#response').html('<span class="text-info">Loading response...</span>');  
                     },  
                     success:function(data){  
                          $('form').trigger("reset");  
                          $('#response').fadeIn().html(data);  
                          setTimeout(function(){  
                               $('#response').fadeOut("slow");  
                          }, 8000);  
                     }  
                });  
           }  
      });  
 });  
 </script>  

		<?php include("footer.php");?>