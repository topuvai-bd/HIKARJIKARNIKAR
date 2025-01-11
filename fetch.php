	<?php

$sqlsd="SELECT * FROM `create_game` WHERE ludotype='$ludotype' && game_status='1' ORDER BY id DESC";
    $runsd=mysqli_query($conn,$sqlsd);

    if(mysqli_num_rows($runsd)<1)
    {
      // header("Location:../");
    }
else{
  
    $count=0;
    while($datad=mysqli_fetch_assoc($runsd))
    {
        $count++;
        ?>
<div class="box py-2 box-style d-block">
				<div class="small mb-2 pb-2 d-flex align-items-center justify-content-between border-bottom w-100">
					<div>
						Playing For:<span class="icon-ttl-no semi ms-2">৳<?php echo $datad['game_amount'];?></span>
					</div>
					<div class="ms-2">
						Prize:<span class="icon-ttl-no semi ms-2">৳<?php echo $datad['winning_amount'];?></span>
					</div>
				</div>

				<div class="small text-center d-flex align-items-center justify-content-between">
					<div class="col-4">
						<div class="icon mx-auto" style="background-image: url(https://png.pngtree.com/png-clipart/20210309/original/pngtree-game-lion-logo-png-image_5846469.jpg);"></div>
						<div class="semi"><?php echo $datad['fname'];?></div>
					</div>
					<div class=""><img src="images/versus.png" height="50"></div>
					<div class="col-4">
					    <a href="" class="btn btn-primary">Play</a>
					  
					</div>
				</div>
			</div>
	<br>
<?php
}
}
?>