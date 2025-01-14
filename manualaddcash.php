<?php include("Header.php");

if(!isset($_SESSION)){ session_start();};
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
        <?php $firstname= $data['user_Name']; ?>
        <?php $playerrefrealidjoin= $data['refrel_id']; ?>
        <?php $userrandcode= $data['userrandcode']; ?>
        <?php $datejoin= $data['datejoin']; ?>
         <?php $playernumber= $data['user_number']; ?>
        
        
        <?php
        }
        }

?>
<section class="wallet-sect bg-light py-4 clearfix">
	<div class="container-fluid">
		<div class="box bg-white">
			<div class="section-title pb-2">
				<h4 class="semi">Balance</h4>
			</div>

			<div class="h3 bold mb-0"><i class="fas fa-bangladeshi-taka-sign me-1"></i><?php echo $amountadd;?></div>
			<div class="wallet-icon primary-color"><i class="fas fa-wallet fa-2x"></i></div>
		</div>

<div class="alert alert-success " id="paymentdecline" style="display:none;"></div>
		<form class="box bg-white" action="<?php echo BASEURL;?>newuddokta/getpayment.php" method="get">
			<div class="section-title pb-2">
				<h4 class="semi">Add Money to Wallet </h4>
			</div>
				<input type="hidden" value="<?php echo $firstname;?>" name="firstname">
				<input type="hidden" value="<?php echo  'ORD'.rand(10000000,9999999999);?>" name="txnid">
				<input type="hidden" value="<?php echo $userrandcode;?>" name="email">
				<input type="hidden" value="<?php echo $playernumber;?>" name="phone">
				<input type="hidden" value="<?php echo  'ORD'.rand(10000000,9999999999);?>" name="productinfo">

			<div class="form-group input-group mb-1">
				<span class="input-group-text bg-white" id="basic-addon1"><i class="fas fa-bangladeshi-taka-sign"></i></span>
				<input type="number"  name="amount" id="txtvalue" pattern="^[0-9]$" min="1" max="50000" class="form-control border-start-0 ps-1" placeholder="Amount" required>
			</div>
			<div class="fst-italic small mb-3">Min. ৳1, Max. ৳1,000</div>

		
			<div class="form-group mb-3">
				<button type="submit" name="moneyadd" class="btn btn-1 py-2 w-100">Proceed to Add</button>
			</div>
		</form>
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
</html><script type="text/javascript">
	$('input[type=radio][name=amount]').change(function() {

		$("#txtvalue").val(this.value);
    
});

</script>
