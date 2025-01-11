<?php include("Header.php");?>
<?php
include("db.php");
 $sqls="SELECT MAX( game_amount ) AS max FROM `create_game`;";
    $runs=mysqli_query($conn,$sqls);

    if(mysqli_num_rows($runs)<1)
    {
      // header("Location:../");
    }
else{
  
    $count=0;
    while($datas=mysqli_fetch_assoc($runs))
    {
        $count++;
        
        echo $datas['game_amount'];
        
    }
}
        ?>

<section class="wallet-sect transaction-sect bg-light py-4 clearfix">
	<div class="container-fluid">
		<div class="block mb-3">
			<div class="box box-style icon-fill-none">
				<div class="d-flex align-items-center">
					<div class="icon semi"  style="background-image: url(images/users/1.jpg);"></div>
					<div class="">
						<p class="mb-0 semi">User Name 1</p>
					</div>
				</div>
				<div class="icon-ttl-no semi text-success">৳50,000</div>
			</div>
			
			<div class="box box-style icon-fill-none">
				<div class="d-flex align-items-center">
					<div class="icon semi"  style="background-image: url(images/users/2.jpg);"></div>
					<div class="">
						<p class="mb-0 semi">User Name 1</p>
					</div>
				</div>
				<div class="icon-ttl-no semi text-success">৳50,000</div>
			</div>

			<div class="box box-style icon-fill-none">
				<div class="d-flex align-items-center">
					<div class="icon semi"  style="background-image: url(images/users/3.jpg);"></div>
					<div class="">
						<p class="mb-0 semi">User Name 1</p>
					</div>
				</div>
				<div class="icon-ttl-no semi text-success">৳50,000</div>
			</div>

			<div class="box box-style icon-fill-none">
				<div class="d-flex align-items-center">
					<div class="icon semi"  style="background-image: url(images/users/4.jpg);"></div>
					<div class="">
						<p class="mb-0 semi">User Name 1</p>
					</div>
				</div>
				<div class="icon-ttl-no semi text-success">৳50,000</div>
			</div>

			<div class="box box-style icon-fill-none">
				<div class="d-flex align-items-center">
					<div class="icon semi"  style="background-image: url(images/users/5.jpg);"></div>
					<div class="">
						<p class="mb-0 semi">User Name 1</p>
					</div>
				</div>
				<div class="icon-ttl-no semi text-success">৳50,000</div>
			</div>

			<div class="box box-style icon-fill-none">
				<div class="d-flex align-items-center">
					<div class="icon semi"  style="background-image: url(images/users/6.jpg);"></div>
					<div class="">
						<p class="mb-0 semi">User Name 1</p>
					</div>
				</div>
				<div class="icon-ttl-no semi text-success">৳50,000</div>
			</div>

			<div class="box box-style icon-fill-none">
				<div class="d-flex align-items-center">
					<div class="icon semi"  style="background-image: url(images/users/7.jpg);"></div>
					<div class="">
						<p class="mb-0 semi">User Name 1</p>
					</div>
				</div>
				<div class="icon-ttl-no semi text-success">৳50,000</div>
			</div>

			<div class="box box-style icon-fill-none">
				<div class="d-flex align-items-center">
					<div class="icon semi"  style="background-image: url(images/users/8.jpg);"></div>
					<div class="">
						<p class="mb-0 semi">User Name 1</p>
					</div>
				</div>
				<div class="icon-ttl-no semi text-success">৳50,000</div>
			</div>

			<div class="box box-style icon-fill-none">
				<div class="d-flex align-items-center">
					<div class="icon semi"  style="background-image: url(images/users/1.jpg);"></div>
					<div class="">
						<p class="mb-0 semi">User Name 1</p>
					</div>
				</div>
				<div class="icon-ttl-no semi text-success">৳50,000</div>
			</div>

			<div class="box box-style icon-fill-none">
				<div class="d-flex align-items-center">
					<div class="icon semi"  style="background-image: url(images/users/2.jpg);"></div>
					<div class="">
						<p class="mb-0 semi">User Name 1</p>
					</div>
				</div>
				<div class="icon-ttl-no semi text-success">৳50,000</div>
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