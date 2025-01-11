<?php include("Header.php");
include("include/pgredairect.php");
include("wining_charges.php");
?>

 
<div class="alert alert-danger " id="snackbar" style="display:none;"></div>
<section class="wallet-sect py-4 clearfix">
	<div class="container-fluid">
<h6 class="semi mb-2 d-flex align-items-center justify-content-between">
			<span>Your Battles</span> 
		
		</h6>
	<div class="block open-battle mb-4" id="viewHere" style="margin-left:3%;margin-right:3%;">
			<?php

$sqlsd="SELECT * FROM `create_game` ORDER BY id DESC";
    $runsd=mysqli_query($conn,$sqlsd);

    if(mysqli_num_rows($runsd)<1)
    {
    ?>
    <center><p class="alert alert-danger">Sorry Data Not Found</p></center>
    <?php
    }
else{
  
    $count=0;
    while($datad=mysqli_fetch_assoc($runsd))
    {
        $count++;
        //$playernumber
        ?>
        <?php if($datad['fnumber']=="$playernumber"){
        ?>
        	<div id="response"></div>
        <form>
            <input type="hidden" value="<?php echo $datad['game_amount'];?>" name="amnt" id="amnt">
            
 <input type="hidden" value="<?php echo $datad['gameidrandom'];?>" name="gamecode" id="gamecode">
                       
  <input type="hidden" value="<?php echo $datad['id'];?>" name="manid" id="manid">
<div class="box py-2 box-style d-block" style="background-color:#f2e6ff;border:1px solid gray;">
				<div class="small mb-2 pb-2 d-flex align-items-center justify-content-between border-bottom w-100">
					<div style="font-size:10px;">
						Playing For:<span class="icon-ttl-no semi ms-2"style="font-size:10px;">৳<?php echo $datad['game_amount'];?></span>
					</div>
					<div>
				 <?php if($datad['game_status']=="3"){
					        ?>
					        <span class="icon-ttl-no semi ms-2"><a href="" class="btn btn-danger btn-sm">Completed</a></span>
					        <?php
					    }
					    elseif($datad['game_status']=="2"){
					        ?>
					        <span class="icon-ttl-no semi ms-2"><a href="playnow?gmgame=<?php echo $datad['gameidrandom'];?>" class="btn btn-success btn-sm">View</a></span>
					        <?php
					    }
					    ?>
					
					</div>
					
					<div class="ms-2" style="font-size:10px;">
					    
						Prize:<span class="icon-ttl-no semi ms-2"style="font-size:10px;">৳<?php echo $datad['winning_amount'];
						
						//echo $datad['winning_amount']-$sdfgtdd;
						?></span>
					</div>
				</div>

				<div class="small text-center d-flex align-items-center justify-content-between">
					<div class="col-4">
						<div class="icon mx-auto" style="background-image: url(https://png.pngtree.com/png-clipart/20210309/original/pngtree-game-lion-logo-png-image_5846469.jpg);"></div>
						<div class="semi" style="font-size:10px;"><?php echo $datad['fname'];?></div>
					</div>
					<div class=""><img src="images/versus.png" height="50"></div>
					
					
							<div class="col-4">
						<div class="icon mx-auto" style="background-image: url(https://w7.pngwing.com/pngs/421/772/png-transparent-games-logo-cartoon-chinese-style-s-chinese-wind-image-games-logo-design-game-icon-material-thumbnail.png);"></div>
						<div class="semi" style="font-size:10px;"><?php echo $datad['sname'];?></div>
					</div>
				
					    
					   
				
				</div>
			</div>
			</form>
	<br>
	<?php
}
 elseif($datad['snumber']=="$playernumber"){
        ?>
        	<div id="response"></div>
        <form>
            <input type="hidden" value="<?php echo $datad['game_amount'];?>" name="amnt" id="amnt">
            
 <input type="hidden" value="<?php echo $datad['gameidrandom'];?>" name="gamecode" id="gamecode">
                       
  <input type="hidden" value="<?php echo $datad['id'];?>" name="manid" id="manid">
<div class="box py-2 box-style d-block" style="background-color:#f2e6ff;border:1px solid gray;">
				<div class="small mb-2 pb-2 d-flex align-items-center justify-content-between border-bottom w-100">
					<div style="font-size:10px;">
						Playing For:<span class="icon-ttl-no semi ms-2" style="font-size:10px;">৳<?php echo $datad['game_amount'];?></span>
					</div>
					<div>
					    <?php if($datad['game_status']=="3"){
					        ?>
					        <span class="icon-ttl-no semi ms-2"><a href="" class="btn btn-danger btn-sm">Completed</a></span>
					        <?php
					    }
					    elseif($datad['game_status']=="2"){
					        ?>
					        <span class="icon-ttl-no semi ms-2"><a href="playnow?gmgame=<?php echo $datad['gameidrandom'];?>" class="btn btn-success btn-sm">View</a></span>
					        <?php
					    }
					    ?>
					
					</div>
					<div class="ms-2" style="font-size:10px;">
						Prize:<span class="icon-ttl-no semi ms-2" style="font-size:10px;">৳<?php echo $datad['winning_amount'];
						
					
						?></span>
					</div>
				</div>

				<div class="small text-center d-flex align-items-center justify-content-between">
					<div class="col-4">
						<div class="icon mx-auto" style="background-image: url(https://png.pngtree.com/png-clipart/20210309/original/pngtree-game-lion-logo-png-image_5846469.jpg);"></div>
						<div class="semi" style="font-size:10px;"><?php echo $datad['fname'];?></div>
					</div>
					<div class=""><img src="images/versus.png" height="50"></div>
					
					
							<div class="col-4">
						<div class="icon mx-auto" style="background-image: url(https://w7.pngwing.com/pngs/421/772/png-transparent-games-logo-cartoon-chinese-style-s-chinese-wind-image-games-logo-design-game-icon-material-thumbnail.png);"></div>
						<div class="semi" style="font-size:10px;"><?php echo $datad['sname'];?></div>
					</div>
				
					    
					   
				
				</div>
			</div>
			</form>
	<br>
	<?php
}
?>
<?php
}
}
?>



	
</div>


	</div>
</section>
<?php include("footer.php");?>
<script>  
 $(document).ready(function(){  
      $('#battale').click(function(){  
           var amount = $('#amount').val();  
           var gametype = $('#gametype').val();  
           if(amount == '' || gametype == '')  
           {  
                $('#response').html('<span class="alert alert-danger">Please Enter Amount</span>');  
           } 
		    
           else  
           {  
                $.ajax({  
                     url:"include/intgame.php",  
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

<script>  
 $(document).ready(function(){  
      $('#accept').click(function(){  
           var amnt = $('#amnt').val();  
           var gametype = $('#gametype').val();  
           if(amnt == '' || gametype == '')  
           {  
                $('#response').html('<span class="alert alert-danger">Please Enter Amount</span>');  
           } 
		    
           else  
           {  
                $.ajax({  
                     url:"include/acceptbtl.php",  
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
</html>
<!-- Rules Modal -->
<div class="modal fade" id="rulesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title semi" id="exampleModalLabel">Rules</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="section-title">
					<h4 class="semi">Game Rules</h4>
				</div>
				<ol>
					<li>খেলাটি ২ জন খেলোয়াড়ের মধ্যে অনুষ্ঠিত হবে।</li>
					<li>
						আপনি যদি ম্যাচটি অ্যাড করে থাকেন তাহলে আপনার বিপরীত প্লেয়ার জয়েন দেওয়ার সাথে সাথে 
						আপনি লুডু কিং থেকে রুম আইডি বানিয়ে আপনার বিপরীত প্লেয়ারকে দিতে হবে। আর আপনি যদি 
						অন্যের ক্রিয়েট করা ম্যাচে জয়েন করেন তাহলে আপনার বিপরীত প্লেয়ার আপনাকে রুম আইডি দেবে। 
						সে ক্ষেত্রে আপনাকে মিনিমাম ম্যাচ জয়েন দেওয়ার পর ১০ মিনিট অপেক্ষা করতে হবে। 
						এরপরেও যদি আপনার বিপরীত প্লেয়ার রুম আইডি না দেয় তাহলে স্ক্রিনশট নিয়ে ম্যাচ 
						ক্যানসেল করুন এবং আমাদের হোয়াটসঅ্যাপে এডমিনের সাথে যোগাযোগ করুন।
					</li>
					<li>
						আপনি যদি ম্যাচটি জিতেন তাহলে "আমি জিতছি" সিলেক্ট করে স্ক্রিনশট আপলোড করুন। আর 
						যদি আপনি ম্যাচটি হেরে যান তাহলে সাথে সাথেই "লস" সিলেক্ট করে সাবমিট করবেন, 
						অন্যথায় ২০ থেকে ৩০ টাকা জরিমানা দিতে হবে।
					</li>
					<li>
						আপনি সুপার লুডু ওয়েবসাইটে যে নামে একাউন্ট করেছেন সেই নামটি আপনার লুডু কিং-এর 
						নামের সাথে মিলতে হবে। দুই জায়গায় একই নাম থাকতে হবে, অন্যথায় আপনি উইনিং প্রাইস পাবেন না।
					</li>
					<li>ফলাফল এবং খেলা সম্পর্কে আপনার কোন প্রশ্ন থাকলে অনুগ্রহ করে রুম কোড সহ সাপোর্টে যোগাযোগ করুন।</li>
					<li>
						আমরা বিজয়ী পরিমাণের উপর ৫% কমিশন চার্জ করব।
						<ul>
							<li>
								লুডু কিং-এ টেকনিক্যাল সমস্যার কারণে যদি কোন প্লেয়ার গেম থেকে অটোমেটিক বের হয়ে যায়, 
								তাহলে সেই ম্যাচটি ক্যানসেল করবেন। যদি কোনও একজনের গুটি ঘর থেকে বের হয়ে যায় এবং 
								তারপর তাকে বের করে দেওয়া হয়, তাহলে এটি উইন হিসেবে গ্রহণযোগ্য হবে। যাকে বের করে দেওয়া 
								হয়েছে তাকে "লস" সিলেক্ট করতে হবে এবং ২০ টাকা জরিমানা দিতে হবে।
							</li>
							<li>
								আপনি যদি খেলার নিয়ম না বোঝেন, দয়া করে আমাদের ইউটিউব চ্যানেলের ভিডিওগুলো দেখে নিন 
								এবং চ্যানেলটি সাবস্ক্রাইব করুন। প্রয়োজনে আমাদের এডমিনের সাথে যোগাযোগ করুন।
							</li>
						</ul>
					</li>
				</ol>

			</div>
		</div>
	</div>
</div>
 
<style type="text/css">
	.open-battle .box {
		-webkit-animation: linear;
	  	animation-name: none;
	 	animation-duration: 0s;
		-webkit-animation-name: fadeInLeft;
		-webkit-animation-duration: .3s;
	}
</style>