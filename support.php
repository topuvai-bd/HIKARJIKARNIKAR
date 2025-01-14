<?php include("Header.php");?>
<section class="wallet-sect faq-sect py-4 clearfix">
	<div class="container-fluid">
		<div class="box border-0 mb-4" id="accordion">
			<div class="accordion-item">
				<button class="accordion-button collapsed" id="heading1 " type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">Withdrawal Time </button>
				<div id="collapse1" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#accordion">
					<div class="accordion-body px-0 pt-3 pb-0">
						<p>Withdrawal time have 12 to 24 hours. In 12 to 24 hours money will be send to you bank or upi.</p>
					</div>
				</div>
			</div>

			<div class="accordion-item">
				<button class="accordion-button collapsed" id="heading2 " type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">Tds Deduction</button>
				<div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#accordion">
					<div class="accordion-body px-0 pt-3 pb-0">
						<p>Tds will applied on more then 15000 withdrawal. 5% tds applied on 15000 or more withdrawal.</p>
					</div>
				</div>
			</div>

			<div class="accordion-item">
				<button class="accordion-button collapsed" id="heading3 " type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse1">Battle Commission</button>
				<div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordion">
					<div class="accordion-body px-0 pt-3 pb-0">
						<p>Ludowiner charge 3% commission on battle winning amount.</p>
					</div>
				</div>
			</div>

			<div class="accordion-item">
				<button class="accordion-button collapsed" id="heading4 " type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">Referral Amount</button>
				<div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordion">
					<div class="accordion-body px-0 pt-3 pb-0">
						<p>Refrel amount have credited in refrel wallet. You can move the minimum Rs.50 refrel amount to the main wallet.</p>
					</div>
				</div>
			</div>
		</div>

		<div class="box border-0 p-0  my-3">
			<img src="images/support.jpg" class="mx-auto d-block" height="250">
		

			<p class="mb-1 semi">Didn't find what you were looking for?</p>
			<div class="block mb-4">
			<a href="https://wa.link/moukre" class="icon-ttl-no text-lowercase">	<div class="box box-style icon-fill-none">
					<div class="icon" style="border:0 !important;"><img src="images/icons8-whatsapp.gif" style="width:100%; "></div>
					<div class="icon-ttl">
						<div class="mb-0">Chat With Us</div>
						</a>
					</div>
				</div>
				<a href="https://wa.link/moukre" target="_blank" class="icon-ttl-no text-lowercase"><div class="box box-style icon-fill-none">
					<div class="icon" style="border:0 !important;"><img src="images/icons8-whatsapp.gif" style="width:100%; "></div>
					<div class="icon-ttl">
						<div class="mb-0">join Whatsapp</div>
						</a>
					</div>
				</div>
			</div>
		</div>

		<p class="mb-1 semi text-center">Follow us on</p>
		<ul class="list-unstyled d-flex align-items-center justify-content-center social-icon">
			<li><a href="https://www.facebook.com/profile.php?id=61555887244164" target="_blank"><i class="fab fa-facebook"></i></a></li>
			<li><a href="" target="_blank"><i class="fab fa-instagram"></i></a></li>
			<li><a href="https://wa.me/919050213973" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
			<li><a href="" target="_blank"><i class="fab fa-youtube"></i></a></li>
		</ul>
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
		<div class="rcBanner-footer">For Developing Games Like This, open&nbsp;<a href=https://topuvai.com class="primary-color text-decoration-underline">topuvai.com</a> on <img src="images/global-chrome.png" alt="" height="20"> chrome mobile</div>
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
	//setInterval(function(){ headerwallet_call(); }, 5000);

</script>
</body>
</html>