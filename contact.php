<?php include("Header.php");?>
<section class="wallet-sect bg-light py-4 clearfix">
	<div class="container-fluid">
		<div class="box bg-white">
			<div class="section-title pb-2">
				<div class="alert alert-success " id="snackbar" style="display:none;"></div>
				<h4 class="semi">Get in touch with us.</h4>
			</div>
			<br>
			<div id="response"></div>
<br>
			<form name="myform" method="POST" id="submit_form">
				<div class="form-group mb-3">
					<input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" required>
				</div>
				 
				<div class="form-group mb-3">
					<input type="text" name="phoneno" id="phoneno" class="form-control" placeholder="Enter Phone Number" required>
				</div>
				<div class="form-group mb-3">
					<select class="form-control" name="query" id="query" required>
						<option value="">Select Query Type</option>
												
						<option value="Wallet">Wallet Releted</option>
						<option value="Other">Other</option>

					</select>
				</div>
				<div class="form-group mb-3" id="msg" style="display:none;">
					<textarea name="message" id="message" class="form-control" placeholder="Message" style="height: 100px;resize: none;" required></textarea>
									</div>
				<div class="form-group mb-3" id="file" style="display:none;">
					<label>Upload Game Screenshort</label>
					<input type="file" name="screenshort" id="screenshort" class="form-control" placeholder="Please Upload Screenshort">
				</div>
				<div class="form-group mb-3">
					<input type="button" name="submit" id="submit" value="Submit" class="btn btn-1">
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
			<a href="#!" class="primary-color text-decoration-underline">superludobd.com</a> on <img src="images/global-chrome.png" alt="" height="20"> chrome mobile
		</div>
	</div>
</div><!-- // Main -->

<!-- Overlay -->
<div class="overlay"></div>

<script src="js/jsbundle.min.js"></script>
<script src="js/main.js"></script>
<script>  
 $(document).ready(function(){  
      $('#submit').click(function(){  
           var name = $('#name').val();  
           var phoneno = $('#phoneno').val(); 
		   var query = $('#query').val();
		   var message = $('#message').val(); 
           if(name == '' || phoneno == '' || query == '' || message == '')  
           {  
                $('#response').html('<span class="alert alert-danger">Please Enter Correct  Details</span>');  
           } 
		    
           else  
           {  
                $.ajax({  
                     url:"cnt_data.php",  
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
</body>
</html><script type="text/javascript">


$('#query').on('change', function() {
  
  if(this.value=="Result")
  {

  	

  	$("#msg").show();
  	 $("#message").attr("placeholder","Please Enter Roomcode");
  	 $("#file").show();
  	 $("#screenshort").prop('required',true);
  	 
  	  
  }
  else
  {
  	$("#msg").show();
  	$("#message").attr("placeholder","Please Enter Message");
  	 $("#message").val("");
  	 $("#file").hide();
  	 $("#screenshort").prop('required',false);
  }
});
	
</script>
 