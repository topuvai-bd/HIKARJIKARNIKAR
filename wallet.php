<?php include("Header.php");

$winningAmount =$conn->query( "SELECT SUM(amount_player)  as winningAmount FROM `addwallate_playe` WHERE number_player='$namesesduser' && product_info='C' && status='success' AND txn IS NOT NULL");
$winningAmount =$winningAmount->fetch_assoc();
$winningAmount= $winningAmount['winningAmount']; 

$deposiCash =$conn->query( "SELECT SUM(amount_player)  as deposiCash FROM `addwallate_playe` WHERE number_player='$namesesduser' && product_info='C' && status='success' AND txn IS NULL");
$deposiCash =$deposiCash->fetch_assoc();
$deposiCash= $deposiCash['deposiCash']; 

$totalAmountEarned = $amountaddd;


?>
<section class="wallet-sect bg-light py-4 clearfix">
	<div class="container-fluid">
		<div class="box bg-white">
			<div class="section-title pb-2">
				<h4 class="semi">Balance</h4>
			</div>

			<div class="h3 bold mb-0"><i class="fas fa-bangladeshi-taka-sign me-1"></i>
<?php echo $amountadd;?>			 </div>
			<div class="wallet-icon primary-color"><i class="fas fa-wallet fa-2x"></i></div>
		</div>

		<div class="box box-style wallet-box flex-wrap add-cash p-3 p-md-4">
			<div class="section-title">
				<h3 class="bold">৳<?php echo $amountadd;?></h3>
				<p class="text-uppercase">Deposit Cash</p>
			</div>
			<!--<a href="add-cash.php" class="btn btn-outline btn-sm text-uppercase">Add Cash</a>-->
<a href="manualaddcash" class="btn btn-outline btn-sm text-uppercase">Add Cash</a>
			<p class="mb-0">Total Earned: <?php echo  $totalAmountEarned ? $totalAmountEarned : '0'?> Total Deposit: <?php echo  $deposiCash ? $deposiCash : '0'?></p>
		</div>

		<div class="box box-style wallet-box flex-wrap withdraw-cash p-3 p-md-4">
			<div class="section-title">
				<h3 class="bold">৳<?php echo $amountadd;?></h3>
				<p class="text-uppercase">Withdraw Cash</p>
			</div>
			<a href="widthdraw" class="btn btn-outline btn-sm text-uppercase">Withdraw</a>

			<p class="mb-0">Total Wining: <?php echo  $winningAmount ? $winningAmount : '0'?></p>
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
			<a href="#!" class="primary-color text-decoration-underline">SuperLudoBD</a> on <img src="images/global-chrome.png" alt="" height="20"> chrome mobile
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