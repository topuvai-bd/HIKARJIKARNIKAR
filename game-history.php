<?php include("Header.php");?>

<!-- Tab -->
<section class="wallet-sect transaction-sect bg-light py-4 clearfix">
	<div class="container-fluid">
		<div class="block mb-3">
			<p class="mb-1 semi">Game Transactions</p>

			<?php
 $namesesduser =$_SESSION['finalplayer'];
    $sql="SELECT * FROM `resultupload` WHERE playermobilenumber1='$namesesduser' OR playermobilenumber2='$namesesduser' ORDER BY id DESC";
			   $sql="SELECT * FROM `resultupload` WHERE playermobilenumber1='$namesesduser' OR playermobilenumber2='$namesesduser' ORDER BY id DESC";
    $run=mysqli_query($conn,$sql);

    if(mysqli_num_rows($run)<1)
    {
       echo '<p class="alert alert-danger">Game Transection Data Not Found</p>';
    }
else{
  
    $count=0;
    while($data=mysqli_fetch_assoc($run))
    {
        $count++;
        ?>
			<div class="box box-style icon-fill-none transectionhistory	">
				<div class="d-flex align-items-center">
					<div class="icon"><i class="fas fa-wallet"></i></div>
					<div class="">
						<p class="mb-0 semi"><?php echo $data['playername1']; ?><img src="images/vs_icon.png" style="width:25px"><?php echo $data['playername2']; ?></p>

						<?php
	        	  $battle_id = $data['player_gameid1']; 
		          $game_details = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `create_game` WHERE  `gameidrandom`='$battle_id'")); ?>
						<div class="text-muted bal"><?php echo $game_details['date']; ?>
							<?php  if($data['playermobilenumber1'] == $namesesduser){
					  
				            echo '<span style="font-weight:bold; color:black">'.$data['playerstatus1'].'</span>';
									}else{
					    echo '<span style="font-weight:bold; color:black">'.$data['playerstatus2'].'</span>';
				  }
									
						;?>

						</div>
					</div>
				</div>
				<div class="icon-ttl-no semi">



					<?php  if($data['playermobilenumber1'] == $namesesduser){
							     if($data['playerstatus1']=='won'){ echo "<span style='color:#0e7b00'>+".$game_details['winning_amount']."</span>"; }
								 if($data['playerstatus1']=='lost'){ echo "<span style='color:red'>-".$game_details['game_amount']."</span>"; }
							
							}else{
							if($data['playerstatus2']=='won'){ echo "<span style='color:#0e7b00'>+".$game_details['winning_amount']."</span>"; }
								 if($data['playerstatus2']=='lost'){ echo "<span style='color:red'>-".$game_details['game_amount']."</span>"; }
						}
							 ?>

				</div>

			</div>

			<br>
			<?php
        }
        }
        ?>

			<!-- Pagination -->

		</div>

</section>

<!-- Footer -->



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

	function headerwallet_call() {

		$.ajax({
			type: "post",
			url: "headerwallet.php",
			datatype: "json",

			success: function(data) {
				$('#headerwallet').html(data);
			}
		});

	}
	setInterval(function() {

		headerwallet_call();
	}, 5000);

</script>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
	$(function() {
		//Pagination
		pageSize = 5;
		incremSlide = 5;
		startPage = 0;
		numberPage = 0;

		var pageCount = $(".transectionhistory").length / pageSize;
		var totalSlidepPage = Math.floor(pageCount / incremSlide);

		for (var i = 0; i < pageCount; i++) {
			$("#pagin").append('<li class="page-item"><a class="page-link" href="#">' + (i + 1) + '</a></li> ');
			if (i > pageSize) {
				$("#pagin li").eq(i).hide();
			}
		}

		var prev = $("#previous").click(function() {
			startPage -= 5;
			incremSlide -= 5;
			numberPage--;
			slide();
		});

		prev.hide();

		var next = $("#next").click(function() {
			startPage += 5;
			incremSlide += 5;
			numberPage++;
			slide();
		});



		$("#pagin li").first().addClass("active");

		slide = function(sens) {
			$("#pagin li").hide();

			for (t = startPage; t < incremSlide; t++) {
				$("#pagin li").eq(t + 1).show();
			}
			if (startPage == 0) {
				next.show();
				prev.hide();
			} else if (numberPage == totalSlidepPage) {
				next.hide();
				prev.show();
			} else {
				next.show();
				prev.show();
			}


		}

		showPage = function(page) {
			$(".transectionhistory").hide();
			$(".transectionhistory").each(function(n) {
				if (n >= pageSize * (page - 1) && n < pageSize * page)
					$(this).show();
			});
		}

		showPage(1);
		$("#pagin li").eq(0).addClass("active");

		$("#pagin li").click(function() {
			$("#pagin li").removeClass("active");
			$(this).addClass("active");
			showPage(parseInt($(this).text()));
		});
	});

</script>
