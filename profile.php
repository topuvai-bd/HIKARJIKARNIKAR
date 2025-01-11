<?php include("Header.php");?>

<?php

 $namesesduser =$_SESSION['finalplayer'];
    $sql="SELECT * FROM `user_regist` WHERE user_number='$namesesduser'";
    $run=mysqli_query($conn,$sql);

    if(mysqli_num_rows($run)<1)
    {
       header("Location:../");
    }
else{
  
    $count=0;
    while($data=mysqli_fetch_assoc($run))
    {
        $count++;
        ?>
<section class="wallet-sect bg-light py-4 clearfix">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-md-10 col-6 text-center">
			    	<div class="profile-img">
			    <?php if($data['profile']==NULL){
			      ?>
			      
						<img src="https://www.freeiconspng.com/thumbs/profile-icon-png/profile-icon-9.png">
						

				</div>
			      
			      <?php
			    }
			    else{
			        ?>
			        	
						<img src="<?php echo $data['profile'];?>">
						

				</div>
			        <?php
			    }
			    ?>
			    
			
				<div class="h4 semi position-relative"><?php echo $playername;?> <a href="editprofile.php" class="edit-link"> <i class="fas fa-pencil"></i></a></div>
				<p><?php echo $playernumber;?></p>
			</div>
		</div>

		<a href="wallet" class="box bg-white">
			<div class="section-title pb-0">
				<h4 class="semi mb-0 d-flex align-items-center"><i class="fas fa-wallet me-3 fa-2x primary-color"></i>Wallet </h4>
			</div>
		</a>
	</div>

	<div class="container-fluid">
	    <?php if($data['kyc']=="Approve"){
	        ?>
	        	<a href="" class="box box-style cash-won" style="height:130px;background-color:#e6ffff;">
			<h6 class="mb-0 d-flex align-items-center"><img src="https://khelbro.com/images/kyc-icon-new.png" style="width:40px;">
				 &nbsp;&nbsp;KYC Completed  &nbsp;&nbsp; &nbsp;&nbsp;<img src="https://png.pngitem.com/pimgs/s/144-1449392_true-false-icon-png-transparent-png.png" style="width:20px;"> </h6>
		
			
		
		</a>
	        
	        <?php
	    }
	    else{
	        ?>
	        
	        	<a href="uploadkyc" class="box box-style cash-won" style="height:130px;background-color:#e6ffff;color:red;">
			<h6 class="mb-0 d-flex align-items-center"><img src="https://khelbro.com/images/kyc-icon-new.png" style="width:40px;">
				 &nbsp;&nbsp;KYC Pending Please Complete KYC  &nbsp;&nbsp; &nbsp;&nbsp;<img src="https://t3.ftcdn.net/jpg/01/71/60/84/360_F_171608484_figMqbjvhS7T8uCpPZDErlLI4HeWklYG.jpg" style="width:40px;"> </h6>
		
			
		
		</a>
	        <?php
	    }
	    ?>
	    
	    
		<a href="transaction" class="box box-style cash-won">
			<div class="icon"><i class="fa-solid fa-bangladeshi-taka-sign"></i></div>
			<div class="icon-ttl">
				<div>Cash Won</div>
				<div class="icon-ttl-no bold">
					



				</div>
			</div>
		</a>

		<a href="" class="box box-style battle-won">
			<div class="icon"><i class="fa-solid fa-khanda"></i></div>
			<div class="icon-ttl">
				<div>Battle Played</div>
				<div class="icon-ttl-no bold">
					
0

				</div>
			</div>
		</a>

		<a href="refer" class="box box-style referal-won">
			<div class="icon"><i class="fas fa-gifts"></i></div>
			<div class="icon-ttl">
				<div>Referral Earnings</div>
				<div class="icon-ttl-no bold">0</div>
			</div>
		</a>
	</div>
</section>
<?php
}
}
?>
<?php include("footer.php");?>