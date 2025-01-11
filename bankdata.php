<?php include("Header.php");?>
<section class="wallet-sect bg-light py-4 clearfix">
    <form method="POST">
	<div class="container-fluid">
		<div class="box bg-white">
			<div class="section-title pb-2">
				<h4 class="semi">Balance</h4>
			</div>

			<div class="h3 bold mb-0"><i class="fas fa-bangladeshi-taka-sign me-1"></i>10  </div>
			<div class="wallet-icon primary-color"><i class="fas fa-wallet fa-2x"></i></div>
		</div>

<div class="alert alert-success " id="snackbarresult" style="display:none;"></div>
<div class="alert alert-danger " id="snackbarerror" style="display:none;"></div>
		<div class="box bg-white">
			<div class="section-title pb-2">
				<h4 class="semi">Withdraw Money to Bank </h4>
			</div>
  <form id="walletform" method="post" action="withdrawinsert.php"  >
			<div class="form-group input-group mb-1">
				<span class="input-group-text bg-white" id="basic-addon1"><i class="fas fa-bangladeshi-taka-sign"></i></span>
				<input type="number" name="txtvalue" id="txtvalue" min="100" max="1000" class="form-control border-start-0 ps-1" placeholder="Amount" required>
			</div>
			<div class="form-group input-group mb-1">
				<span class="input-group-text bg-white" id="basic-addon1"></span>
				<input type="text" name="txtupi" id="txtupi" class="form-control border-start-0 ps-1" placeholder="Enter your upi id" required>
			</div>
		
			<div class="form-group mb-3">
				<button type="button" id="walletsubmit" onclick="submitrequest(10)" class="btn btn-1 py-2 w-100" id='request-otp'><span class="py-1 d-block">Upload Bank Details</span></button>
			</div>
			<span style="color:black ;font-size: 11px;">Please Upload Bank Details.</span>
			</form>
		</div>
	</div>
	</form>
</section>

<?php include("footer.php");?>