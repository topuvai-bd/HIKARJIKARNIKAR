	<?php
	if(!isset($_SESSION)){ session_start();};
include("db.php");
include("include/pgsessionredirect.php");
if(isset($_SESSION['sessionludotype'])){
    $ludotypesession= $_SESSION['sessionludotype'];
}
include("wining_charges.php");
$sqlsd="SELECT * FROM `create_game` WHERE ludotype='$ludotypesession' && game_status='1' ORDER BY id DESC";
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
        	<div id="response"></div>
        <form methdo="POST" name="myform" id="submit_form">
            <input type="hidden" value="<?php echo $datad['game_amount'];?>" name="amnt" id="amnt">
            
 <input type="hidden" value="<?php echo $datad['gameidrandom'];?>" name="gamecode" id="gamecode">
                       
  <input type="hidden" value="<?php echo $datad['id'];?>" name="manid" id="manid">

			
					<?php if($datad['fnumber']=="$playernumber"){
					?>
					<div class="box py-2 box-style d-block" style="background-color:#f2e6ff;">
				<div class="small mb-2 pb-2 d-flex align-items-center justify-content-between border-bottom w-100">
					<div style="font-size:10px;font-weight:bold;color:black;">
					CHALLENGE FROM:<span style="color:#990033;font-size:10px;font-weight:bold;" class="icon-ttl-no semi ms-2"><?php echo $datad['fname'];?></span>
					</div>
					<div class="ms-2">
						<span class="icon-ttl-no semi ms-2"><a href="deletegame?gamcode=<?php echo $datad['gameidrandom'];?>&&amnt=<?php echo $datad['game_amount'];?>" class="btn btn-danger btn-sm">Delete</a></span>
					</div>
				</div>

				<div class="small text-center d-flex align-items-center justify-content-between">
					<div class="col-4">
					<!--	<div class="icon mx-auto" style="background-image: url(https://png.pngtree.com/png-clipart/20210309/original/pngtree-game-lion-logo-png-image_5846469.jpg);"></div>-->
					<div class="semi" style="font-size:10px;color:#ff3399;">Entery Fee <p style="font-size:10px;color:black;"><img src="images/global-rupeeIcon.png" style="width:20px;"><?php echo $datad['game_amount'];?></p></div>
					
					
						
					</div>
						<div class="col-4">
					<!--	<div class="icon mx-auto" style="background-image: url(https://png.pngtree.com/png-clipart/20210309/original/pngtree-game-lion-logo-png-image_5846469.jpg);"></div>-->
				
						<div class="semi" style="font-size:10px;color:#ff3399;">Prize <p style="font-size:10px;color:black;"><img src="images/global-rupeeIcon.png" style="width:20px;"><?php $sdfgtdd= $datad['winning_amount']*$winncharges/100; echo $datad['winning_amount']-$sdfgtdd; ?></p></div>
					
						
					</div>
						<div class="col-4">
					    <a href="" ><img src="https://icon-library.com/images/loading-icon-transparent-background/loading-icon-transparent-background-12.jpg" style="width:25px;"></a>
					   <p style="font-size:8px;color:gray;">Find Player</p>
					  
					</div>
					<?php
					
					}
					else{
					    ?>
					    <div class="box py-2 box-style d-block" style="background-color:#f2e6ff;border:1px solid gray;">
				<div class="small mb-2 pb-2 d-flex align-items-center justify-content-between border-bottom w-100">
					<div style="font-size:10px;font-weight:bold;color:black;">
					CHALLENGE FROM:<span style="color:#990033;font-size:10px;font-weight:bold;" class="icon-ttl-no semi ms-2"><?php echo $datad['fname'];?></span>
					</div>
					<!--<div class="ms-2">
						<span class="icon-ttl-no semi ms-2"><a href="" class="btn btn-danger btn-sm">Delete</a></span>
					</div>-->
				</div>

				<div class="small text-center d-flex align-items-center justify-content-between">
					<div class="col-4">
					<!--	<div class="icon mx-auto" style="background-image: url(https://png.pngtree.com/png-clipart/20210309/original/pngtree-game-lion-logo-png-image_5846469.jpg);"></div>-->
					<div class="semi" style="font-size:10px;color:#ff3399;">Entery Fee <p style="font-size:10px;color:black;"><img src="images/global-rupeeIcon.png" style="width:20px;"><?php echo $datad['game_amount'];?></p></div>
					
					
						
					</div>
						<div class="col-4">
					<!--	<div class="icon mx-auto" style="background-image: url(https://png.pngtree.com/png-clipart/20210309/original/pngtree-game-lion-logo-png-image_5846469.jpg);"></div>-->
				
						<div class="semi" style="font-size:10px;color:#ff3399;">Prize <p style="font-size:10px;color:black;"><img src="images/global-rupeeIcon.png" style="width:20px;"><?php $sdfgtdd= $datad['winning_amount']*$winncharges/100; echo $datad['winning_amount']-$sdfgtdd; ?></p></div>
					
						
					</div>
					    	<div class="col-4">
					    <a href="acceptbtl?gamcode=<?php echo $datad['gameidrandom'];?>&&amnt=<?php echo $datad['game_amount'];?>" class="btn btn-secondary btn-sm">Play</a>
					  
					</div>
					    <?php
					}
					;?>
				
				</div>
			</div>
			</form>
	<br>
<?php
}
}
?>
