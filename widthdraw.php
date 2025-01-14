<?php include("Header.php"); $error = "";
?>
<section class="wallet-sect bg-light py-4 clearfix">
	<div class="container-fluid">
	<?php
$sqlsd="SELECT * FROM `user_regist` WHERE user_number='$playernumber' AND kyc='Approve'";
    $runsd=mysqli_query($conn,$sqlsd);

    if(mysqli_num_rows($runsd)<1)
    {
  ?>
  	<div class="box bg-danger">
			<div class="section-title pb-2 p-3">
				<h4 class="semi" style="color:white;">একাউন্ট ভেরিফাইড না, ভেরিফাই করুন।</h4>
				<a href="uploadkyc" class="btn btn-primary">Upload KYC</a>
			</div>

		</div>
  <?php
    }
else{


        ?>

		<div class="box bg-white">
			<div class="section-title pb-2">
				<h4 class="semi">Balance</h4>
			</div>

			<div class="h3 bold mb-0"><i class="fas fa-bangladeshi-taka-sign me-1"></i><?php echo $amountadd;?>  </div>
			<div class="wallet-icon primary-color"><i class="fas fa-wallet fa-2x"></i></div>
		</div>

<div class="alert alert-success " id="snackbarresult" style="display:none;"></div>
<div class="alert alert-danger " id="snackbarerror" style="display:none;"></div>
		<div class="box bg-white">
			<div class="section-title pb-2">
				<h4 class="semi">Withdraw Money to</h4>
					<div id="response"></div>
			</div>
 	<form name="myform" method="POST" id="submit_form">
			<!-- Give me a dropdown with three option, nagad, bkash, rocked -->
			<div class="form-group input-group mb-1">
				<span class="input-group-text bg-white" id="basic-addon1"><i class="fas fa-wallet"></i></span>
				<select name="with_method" id="with_method" class="form-control border-start-0 ps-1" required>
					<option value="">Select Payment Method</option>
					<option value="Nagad">Nagad</option>
					<option value="Bkash">Bkash</option>
					<option value="Rocket">Rocket</option>
				</select>
			</div>
			<div class="form-group input-group mb-1">
				<span class="input-group-text bg-white" id="basic-addon1"><i class="fas fa-phone"></i></span>
				<input type="phone" name="with_number" id="with_number" min="10" max="12" class="form-control border-start-0 ps-1" placeholder="Mobile Number (11 Digits)" required>
			</div>
			<div class="form-group input-group mb-1">
				<span class="input-group-text bg-white" id="basic-addon1"><i class="fas fa-bangladeshi-taka-sign"></i></span>
				<input type="number" name="with_amount" id="with_amount" min="100" max="10000" class="form-control border-start-0 ps-1" placeholder="Amount" required>
			</div>
			<div class="fst-italic small mb-3">Min. ৳150, Max. ৳10,000</div>

			<div class="form-group amount-block radio-block mb-4">
				<div class="amount">
					<input type="radio" name="amount" id="150" value="150">
					<label class="radio-label" for="150">৳150</label>
				</div>

				<div class="amount">
					<input type="radio" name="amount" id="200" value="200">
					<label class="radio-label" for="200">৳200</label>
				</div>

				<div class="amount">
					<input type="radio" name="amount" id="500" value="500">
					<label class="radio-label" for="500">৳500</label>
				</div>

				<div class="amount">
					<input type="radio" name="amount" id="1000" value="1000">
					<label class="radio-label" for="1000">৳1000</label>
				</div>
			</div>

			<div class="form-group mb-3">
				<button type="button" id="transefer"  class="btn btn-1 py-2 w-100" id='request-otp'><span class="py-1 d-block">Proceed to Withdraw</span></button>
			</div>
			<?php
			 $resulta = $conn->query("SELECT * FROM `Sattelment_cahrges` order by id desc limit 1");
			 $BonusBalance =$resulta->fetch_assoc();
			 $amnd = $BonusBalance['amount']; 
				?>
			<span style="color:black ;font-size: 11px;">We have charge <?php echo $amnd ? $amnd : "0";?>% procession fees on withdraw.</span>
			</form>
		</div>

<?php
}
?>
	</div>
</section>

<?php include("footer.php");?>

<script>  
 $(document).ready(function(){
	$('#transefer').click(function(){  
		   var with_amount = $('#with_amount').val();
		   var with_method = $('#with_method').val();
		   var with_number = $('#with_number').val();
		   if(with_amount == '' || with_method == '' || with_number == '' )  
		   {
				$('#response').html('<span class="alert alert-danger">Please Enter All Info</span>');  
		   } 
		   
		   else  
		   {
			// continue
			$.ajax({
				url:"transermoney.php",
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

    //   $('#transefer').click(function(){  
    //        var txtvalue = $('#txtvalue').val();  
	// 	   var txtupi = $('#txtvalueUPI').val();
	// 	   var txtupi = $('#txtupi').val();
    //        if(txtvalue == '' || txtupi == '' )  
    //        {  
    //             $('#response').html('<span class="alert alert-danger">Please Enter Amount</span>');  
    //        } 
		    
    //        else  
    //        {  
    //             $.ajax({  
    //                  url:"transermoney.php",  
    //                  method:"POST",  
    //                  data:$('#submit_form').serialize(),  
    //                  beforeSend:function(){  
    //                       $('#response').html('<span class="text-info">Loading response...</span>');  
    //                  },  
    //                  success:function(data){  
    //                       $('form').trigger("reset");  
    //                       $('#response').fadeIn().html(data);  
    //                       setTimeout(function(){  
    //                            $('#response').fadeOut("slow");  
    //                       }, 8000);  
    //                  }  
    //             });  
    //        }  
    //   });  
 });  
 </script>  

<script type="text/javascript">
	$('input[type=radio][name=amount]').change(function() {
		$("#with_amount").val(this.value);
    
});


/*Amount Check*/
function submitrequest(headamount)
{
  
	var amount=parseInt($("#txtvalue").val());
	var headvalue=parseInt(headamount);
     var txtupi=$("#txtupi").val();
if(amount>headamount)
		 {
            var amountvalue = document.getElementById("snackbarerror");
              amountvalue.style.display = "block";

						amountvalue.innerHTML="<strong>Danger!</strong> Not Sufficient Balance.";
						window.setTimeout(function() {


							$("#snackbarerror").slideUp(500, function() {
								amountvalue.className = "alert alert-danger  show";
							});
						}, 3000);
						 
		 }

else if ($("#txtvalue").val()=="" || txtupi=="" || amount==0 || amount<150)
{
 var amountvalue = document.getElementById("snackbarerror");
              amountvalue.style.display = "block";

						amountvalue.innerHTML="<strong>Danger!</strong> Please Fill Data & Minimum withdrawal 150. ";
						window.setTimeout(function() {


							$("#snackbarerror").slideUp(500, function() {
								amountvalue.className = "alert alert-danger  show";
							});
						}, 3000);	
}
		 else
		 {
		 	 $("#walletform").submit();
		 }

}
</script>

