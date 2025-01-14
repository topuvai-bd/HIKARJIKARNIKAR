<?php include("Header.php");?>
  <?php
$sqlfg = "SELECT count(refrel_id) as totalRef, SUM(refercomissionamount) as totalEarning FROM user_regist WHERE refrel_id='$userrandcode' ";
$resultff = $conn->query($sqlfg);
  
// Display data on web page
while($row = mysqli_fetch_array($resultff)) {
   $dfsdfsdfjfskdf= $row['totalRef'];
   $totalEarning= $row['totalEarning'];
    //echo "<br />";
}
?>

<section class="wallet-sect bg-light py-4 clearfix">
	<div class="container-fluid text-center">
		<div class="row justify-content-center mb-4">
			<div class=" col-md-6 col-8">
				<img src="images/refer2.png" class="img-fluid" />
			</div>
		</div>
	
		<div class="section-title py-2">
			<h4 class="semi mb-2">Refer & Earn</h4>
			<p>You can refer and earn 2% from every match When your friend win who used your referral link,<br/> get cash on it.</p>
		</div>

		<div class="section-title py-2">
			<h4 class="semi mb-2">Referral Code: <?php echo $userrandcode;?></h4>
			<p>
Total Referral : <?php echo $dfsdfsdfjfskdf;?>

			 </p>
			<p>
Total Referral : <?php echo $totalEarning;?>

			 </p>
		</div>

		<div class="section-title mb-4">

			<a href="javascript::" class="btn" onclick="copylink('<?php echo $userrandcode;?>');" style="background-color: #42c052;"><i class="fab fa-whatsapp me-2"></i>Copy Url</a>
			<div class="alert alert-success " id="snackbarcopy" style="display:none; margin-top: 1em;"></div>
		</div>
		<div class="section-title mb-4">

			<a href="https://wa.me/message/GXBGXOJQZ3CIK1?text=https://superludobd.com/register.php?refrelcode=<?php echo $userrandcode;?>" data-action="share/whatsapp/share"
		target="_blank" class="btn" style="background-color: #42c052;font-size:17px;"><i class="fab fa-whatsapp me-2"></i></a>
			<a href="https://www.facebook.com/sharer/sharer.php?u=https://superludobd.com/register.php?refrelcode=<?php echo $userrandcode;?>" data-action="share/whatsapp/share"
		target="_blank" class="btn" style="background-color: #0a58ca;font-size:17px;"><i class="fab fa-facebook me-2"></i></a>
		 
		
		 <a href="sms:?body=/*https://superludobd.com/register.php?refrelcode=<?php echo $userrandcode;?>*/" data-action="share/whatsapp/share"
		target="_blank" class="btn" style="background-color: #41464b;font-size:17px;"><i class="fas fa-comment me-2"></i></a>	 
		</div>
	</div>

	<div class="container-fluid">
		<h6 class="semi mb-2">Your Referrals</h6>
		<div class="block">
						<section class="wallet-sect transaction-sect bg-light py-4 clearfix">
	<div class="container-fluid">
	<div class="block mb-3">
		
	
		    <?php
    $sqlf="SELECT * FROM `user_regist` WHERE refrel_id='$userrandcode' ORDER BY id DESC";
    $runf=mysqli_query($conn,$sqlf);

    if(mysqli_num_rows($runf)<1)
    {
    //    header("Location: index.php");
	echo "No Referral Found";
    }
else{
  
    $count=0;
    while($dataf=mysqli_fetch_assoc($runf))
    {
        $count++;
        ?>
    <div class="box box-style icon-fill-none transectionhistory	">
		    	<div class="d-flex align-items-center">
					<div class="icon"><i class="fas fa-wallet"></i></div>
					<div class="">
						<p class="mb-0 semi"><?php echo $dataf['user_Name']; ?></p>
						 
						<div class="text-muted bal"><?php echo $dataf['extradate']; ?>
						
						<span class="text-danger"style="font-weight:bold;">৳<?php echo $dataf['refercomissionamount'] ?  $dataf['refercomissionamount']: '0' ; ?></span>
						
						
						</div>
					</div>
				</div>
				<div class="icon-ttl-no semi text-success" >
			
				
				<?php echo "Joine"; ?></div>
		
	</div>

 <br>
        <?php
        }
        }
        ?>
		 
		<!-- Pagination -->

 	</div>
 	
</section>

			 

			 
		</div>
	</div>
</section>
<?php include("footer.php");?>
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
</html><script>
function copylink(refrelcode) {
  /* Get the text field */
  var copyText = "https://superludobd.com/register.php?refrelcode="+refrelcode;
 var snackbarcopy = document.getElementById("snackbarcopy");
  navigator.clipboard.writeText(copyText);
   snackbarcopy.style.display = "block";

						snackbarcopy.innerHTML="<strong> Copied ! </strong>"+copyText;
						window.setTimeout(function() {


							$("#snackbarcopy").slideUp(500, function() {
								snackbarcopy.className = "alert alert-success  show";
							});
						}, 3000);
   
}
</script>