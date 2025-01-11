<?php include "Header.php";?>
<section class="wallet-sect bg-light py-4 clearfix">
	<div class="container-fluid">
		<div class="box bg-white">
			<div class="section-title pb-2">
				<h4 class="semi">Balance</h4>
			</div>

			<div class="h3 bold mb-0"><i class="fas fa-bangladeshi-taka-sign me-1"></i><?php echo $amountaddr1 ?> </div>
			<div class="wallet-icon primary-color"><i class="fas fa-wallet fa-2x"></i></div>
		</div>
<div class="alert alert-success " id="snackbarresult" style="display:none;"></div>
<div class="alert alert-danger " id="snackbarerror" style="display:none;"></div>
		<div class="box bg-white">
			<div class="section-title pb-2">
				<h4 class="semi mb-2">Redeem your refer balance </h4>
				<p>TDS (2%) will be deducted after annual referral earning of ৳15,000.</p>
			</div>
<form id="redmeeform" method="post" action="redmeeinsert.php"  >
			<p class="small mb-1">Money will be added to KhelHind cash.</p>
			<div class="form-group input-group mb-1">
				<span class="input-group-text bg-white" id="basic-addon1"><i class="fas fa-bangladeshi-taka-sign"></i></span>
				<input type="number" name="amount" id="amount" class="form-control border-start-0 ps-1" placeholder="Amount">
				<input hidden type="number" value="<?php echo $amountaddr1 ?>" name="mainamount" id="mainamount" class="form-control border-start-0 ps-1"  placeholder="mainamount">
			</div>
			<div class="fst-italic small mb-3">Min. ৳1</div>

			<div class="form-group mb-3">
				<button id="redmee"  onclick="submitredmee()" type="button" class="btn btn-1 py-2 w-100" >Redeem</button>
			</div>
		</form>
		</div>
	</div>
</section>

<!-- Footer -->

	</div> <!-- // Sidebar -->

	<div class="right-bar">
		<div class="rcBanner">
			<picture class="rcBanner-img-container">
				<img src="images/KHD.png" alt="" height="200">
			</picture>
			<div class="rcBanner-text bold mt-2"> <span class="bold" style="color: #0186d6; font-style: italic;">Real Game With Real Money!</span></div>
		</div>
		<div class="rcBanner-footer">
			For best experience, open&nbsp;
			<a href="#!" class="primary-color text-decoration-underline">Ludowiner</a> on <img src="images/global-chrome.png" alt="" height="20"> chrome mobile
		</div>
	</div>
</div><!-- // Main -->

<!-- Overlay -->
<div class="overlay"></div>

<script src="js/jsbundle.min.js"></script>
<script src="js/main.js"></script>
<script>



headerwallet_call();

	function headerwallet_call()
	{

		  $.ajax({
      type:"post",
      url:"headerwallet.php",
      datatype:"json",

      success:function(data)
      {
          $('#headerwallet').html(data);
      }
    });

	}
	setInterval(function()
{

	headerwallet_call();
  }, 5000);

</script>
</body>
</html><script type="text/javascript">

function submitredmee()
{

  var amount=parseInt($("#amount").val());
  var refrelvalue=parseInt($("#mainamount").val());
	// var refrelvalue=parseInt(refrelamount);
 var amountvalue = document.getElementById("snackbarerror");


if(amount>refrelvalue)
		 {

              amountvalue.style.display = "block";

						amountvalue.innerHTML="<strong>Danger!</strong> Not Sufficient Balance.";
						window.setTimeout(function() {


							$("#snackbarerror").slideUp(500, function() {
								amountvalue.className = "alert alert-danger  show";
							});
						}, 3000);

		 }
		 else if($("#amount").val()=="" ||  amount==0 || amount<100)
		 {
        amountvalue.style.display = "block";

						amountvalue.innerHTML="<strong>Danger!</strong> Redeem  minimum amount ৳100.";
						window.setTimeout(function() {


							$("#snackbarerror").slideUp(500, function() {
								amountvalue.className = "alert alert-danger  show";
							});
						}, 3000);
		 }
		 else
		 {
               $("#redmeeform").submit();
		 }

}


</script>