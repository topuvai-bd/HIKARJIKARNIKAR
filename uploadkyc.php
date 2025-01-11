<?php include("Header.php");

if(isset($_POST['upload'])){
  $filename=$_FILES["front"]["name"];
   $tempname= $_FILES["front"]["tmp_name"];
   $folder="kyc/".$filename;
   move_uploaded_file($tempname,$folder);
   
   
   
     $filename1=$_FILES["back"]["name"];
   $tempname1= $_FILES["back"]["tmp_name"];
   $folder1="kyc/".$filename1;
   move_uploaded_file($tempname1,$folder1);
   $rands="KYC".rand(1000000,99999999);
   
   $bank=$_POST['gender'];
   $b1=$_POST['b1'];
   $b2=$_POST['b2'];
   $b3=$_POST['b3'];
   $b4=$_POST['b4'];
   $u1=$_POST['u1'];
   $result = mysqli_query($conn,"SELECT * FROM `kyc_details` WHERE  usernumber='$playernumber'");
$count=mysqli_num_rows($result);
if($count==1)
{
    $error='<p class="btn btn-danger">Already Document Uploaded Please Wait</p>';
}
else{
    if($bank=="upi"){
   $kycupload="INSERT INTO `kyc_details`(`username`, `usernumber`, `userid`, `adharcard_front`, `adharcard_back`, `kyccode`,`upi`) VALUES ('$playername','$playernumber','$userrandcode','$folder','$folder1','$rands','$u1')";
     $asdasa=mysqli_query($conn,$kycupload);
     if($asdasa==TRUE){
           $error='<p class="btn btn-success">SuccessFully Uploaded We under review 24Hours</p>';
           ?>
          
           <?php
     }
    }
     elseif($bank=="bank"){
   $kycupload="INSERT INTO `kyc_details`(`username`, `usernumber`, `userid`, `adharcard_front`, `adharcard_back`, `kyccode`,`bank_holdername`,`bank_ifsccode`,`bank_name`,`bank_accountnumber`) VALUES ('$playername','$playernumber','$userrandcode','$folder','$folder1','$rands','$b2','$b3','$b1','$b4')";
     $asdasa=mysqli_query($conn,$kycupload);
     if($asdasa==TRUE){
           $error='<p class="btn btn-success">SuccessFully Uploaded We under review 24Hours</p>';
           ?>
          
           <?php
     }
      }
}
}


?>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
$(document).ready(function () {
    $("#bank").hide();
    $("#upi").hide();
    $("#r1").click(function () {
        $("#bank").show();
         $("#upi").hide();
    });
    $("#r2").click(function () {
        $("#bank").hide();
         $("#upi").show();
    });
});
</script>
<div><?php echo $error;?></div>
<div class="alert alert-danger " id="snackbarerror" style="display:none;"></div>
		<div class="box bg-white">
			<div class="section-title pb-2">
				<h4 class="semi">Upload KYC Document </h4>
			</div>
  <form  method="POST" enctype="multipart/form-data" >
      
      	<div class="result-block d-flex mb-4">
			 
					<input class="form-check-input"type="radio" name="gender" id="r1" value="bank" onClick="getResults()">
					&nbsp;	<label class="form-check-label">Bank</label>

				&nbsp;	&nbsp;	&nbsp;	<input class="form-check-input"  type="radio" name="gender" id="r2" value="upi">
					&nbsp;	<label class="form-check-label">UPI</label>
			
			</div>

			<div id="bank" class="result-details won mb-3">
				<div class="mb-3">
				    <label>Enter Bank Name</label>
				  <input class="form-control h-auto px-2 py-1" type="text" id="wonimg" name="b1">
				</div>
					<div class="mb-3">
					     <label>Enter Bank Holder Name</label>
				  <input class="form-control h-auto px-2 py-1" type="text" id="wonimg" name="b2">
				</div>
					<div class="mb-3">
					     <label>Enter Bank IFSC Code</label>
				  <input class="form-control h-auto px-2 py-1" type="text" id="wonimg" name="b3">
				</div>
					<div class="mb-3">
					     <label>Enter Bank Account Number</label>
				  <input class="form-control h-auto px-2 py-1" type="text" id="wonimg" name="b4">
				</div>
			</div>

			<div id="upi"  class="result-details lost mb-3">
				<div class="mb-3">
				    <label>Enter UPI ID</label>
				  <input class="form-control h-auto px-2 py-1" type="text" id="losimg" name="u1">
				</div>
			</div>
      
      
      
      
      
      
      
      
      
      
      <p>AdharCard Font Side Photo</p>
			<div class="form-group input-group mb-1">
			
				<input type="file" name="front" id="front" class="form-control border-start-0 ps-1" placeholder="Amount" required>
			</div>
			<p>AdharCard Back Side Photo</p>
			<div class="form-group input-group mb-1">
			
				<input type="file" name="back" id="back" class="form-control border-start-0 ps-1" placeholder="Enter your upi id" required>
			</div>
			
			
			
			
			
			
			
		<!--	<div class="result-block d-flex mb-4">
			 
				<div class="form-check my-1 me-4" id="wonttimer">
					<input class="form-check-input" type="radio" name="only" id="r1" value="yes" onClick="getResults()">
					<label class="form-check-label" for="won">Bank</label>
				</div>
				<div class="form-check my-1 me-4" id="losttimer">
					<input class="form-check-input" type="radio" name="only" id="r2" value="no" onClick="getResults()">
					<label class="form-check-label" for="lost">UPI</label>
				</div>
			</div>

			<div id="bank" class="result-details won mb-3">
				<div class="mb-3">
				  <input class="form-control h-auto px-2 py-1" type="file" id="wonimg" name="wonimg">
				</div>
			</div>

			<div id="upi"  class="result-details lost mb-3">
				<div class="mb-3">
				  <input class="form-control h-auto px-2 py-1" type="file" id="losimg" name="losimg">
				</div>
			</div>-->

		
			</div>
			<br>

			<div class="form-group mb-3">
				<button type="submit" id="upload" name="upload" onclick="submitrequest(10)" class="btn btn-1 py-2 w-100" id='request-otp'><span class="py-1 d-block">Upload</span></button>
			</div>
			<span style="color:black ;font-size: 11px;">Please Complete Your 100% Profile.</span>
			</form>
		</div>
	</div>
</section>

<?php include("footer.php");?>