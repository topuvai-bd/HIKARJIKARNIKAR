
						
<?php
include("include/pgsessionredirect.php");
include("include/wlpageredirection.php");
include("include/referwallate.php");
	?>

						<a href="wallet.php" class="wallet">
							<div class="icon text-success"><img src="images/global-rupeeIcon.png" style="width:20px;"></div>
							<div class="icon-ttl">
								<div>Cash</div>
								<div class="icon-ttl-no" id="headerwallet" style="font-size:12px;"> <?php echo $amountadd;?>
								</div>
								
							</div>
						
													</a>

						<a href="redeem.php" class="wallet earnings">
							<div class="icon text-danger"><i class="fas fa-wallet" aria-hidden="true"></i></div>
							<div class="icon-ttl">
								<div>Earnings</div>
								<div class="icon-ttl-no" style="font-size:12px;">
									
								<?php echo $amountaddr1;?><input type='hidden' value='0' id='headamountrefrel' name='headamountrefrel'>


								</div>
							</div>
						</a>