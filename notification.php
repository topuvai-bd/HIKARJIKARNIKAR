<?php include("Header.php");?>
<section class="notification-sect transaction-sect bg-light py-4 clearfix">
	<div class="container-fluid">

		<nav>
			<div class="nav nav-tabs justify-content-center border-0 mb-3" id="nav-tab" role="tablist">
				<button class="nav-link active" id="nav-General-tab" data-bs-toggle="tab" data-bs-target="#nav-General" type="button" role="tab" aria-controls="nav-General" aria-selected="true">General</button>
				<button class="nav-link" id="nav-Personal-tab" data-bs-toggle="tab" data-bs-target="#nav-Personal" type="button" role="tab" aria-controls="nav-Personal" aria-selected="false">Personal</button>
			</div>
		</nav>
		

		<div class="block mb-3">
			<div class="tab-content" id="nav-tabContent">
				<!-- General tab -->
				<div class="tab-pane fade show active" id="nav-General" role="tabpanel" aria-labelledby="nav-General-tab">
					
					<!-- <div class="box box-style icon-fill-none cursur-pointer" data-bs-toggle="modal" data-bs-target="#notificationDetailsModal">
						<div class="d-flex align-items-center">
							<div class="">
								<p class="mb-0 semi"> Apko 1 refer ka 50rs milega aap jitna chaho utna refer kar sakte hai agar apko agent banana hai es game ka to 9304924340 me whatsaap kare.Koi bhi unofficial log se baat na kare.</p>
								<div class="icon-ttl">12 Apr, Mon</div>
							</div>
						</div>
					</div> -->
					 

					
				</div>

				<!-- Personal Tab -->
				<div class="tab-pane fade" id="nav-Personal" role="tabpanel" aria-labelledby="nav-Personal-tab">
					
					<!-- <div class="box box-style icon-fill-none cursur-pointer" data-bs-toggle="modal" data-bs-target="#notificationDetailsModal">
						<div class="d-flex align-items-center">
							<div class="">
								<p class="mb-0 semi"> Apko 1 refer ka 50rs milega aap jitna chaho utna refer kar sakte hai agar apko agent banana hai es game ka to 9304924340 me whatsaap kare.Koi bhi unofficial log se baat na kare.</p>
								<div class="icon-ttl">12 Apr, Mon</div>
							</div>
						</div>
					</div> -->
					

					
				</div>
			</div>
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
<div class="modal fade" id="notificationDetailsModal" tabindex="-1" aria-labelledby="notificationDetailsModal" aria-modal="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title semi" id="notificationDetailsModal">Notification Details</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<table class="table table-borderless">
					<tr>
						<th>Order ID:</th>
						<td>TX-1645623778</td>
					</tr>
					<tr>
						<th>Message:</th>
						<td> Apko 1 refer ka 50rs milega aap jitna chaho utna refer kar sakte hai agar apko agent banana hai es game ka to 9304924340 me whatsaap kare.Koi bhi unofficial log se baat na kare.</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>