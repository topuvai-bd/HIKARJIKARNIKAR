<?php include("Header.php");?>

<!-- Tab -->
<section class="wallet-sect transaction-sect bg-light py-4 clearfix">
	<div class="container-fluid">
	<div class="block mb-3">
			<p class="mb-1 semi">Wallet Transection</p>	
	
		    <?php
 $namesesduser =$_SESSION['finalplayer'];
    $sql="SELECT * FROM `addwallate_playe` WHERE number_player='$namesesduser' ORDER BY id DESC";
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
    <div class="box box-style icon-fill-none transectionhistory	">
		    	<div class="d-flex align-items-center">
					<div class="icon"><i class="fas fa-wallet"></i></div>
					<div class="">
						<p class="mb-0 semi"><?php echo $data['username_player']; ?></p>
						 
						<div class="text-muted bal"><?php echo $data['date_player']; ?>
							<?php  if($data['status']=="failure"){
				            echo '<span class="text-danger"style="font-weight:bold;">Failure</span>';
				}
				if($data['status']=="Pending"){
				            echo '<span class="text-warning" style="font-weight:bold;">Pending</span>';
				}
				if($data['status']=="success"){
				            echo '<span class="text-success" style="font-weight:bold;">Success</span>';
				}
		        
    ;?>
						
						</div>
					</div>
				</div>
				<div class="icon-ttl-no semi">
				<?php  if($data['product_info']=="C"){
				            echo '<span class="text-success">+</span>';
				}
				 elseif($data['product_info']=="D"){
				          echo '<span class="text-danger">-</span>';
				}
			
				; ?>
				
				<?php echo $data['amount_player']; ?></div>
		
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
</html><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
	
$(function() {
//Pagination
pageSize = 5;
incremSlide = 5;
startPage = 0;
numberPage = 0;

var pageCount =  $(".transectionhistory").length / pageSize;
var totalSlidepPage = Math.floor(pageCount / incremSlide);
    
for(var i = 0 ; i<pageCount;i++){
    $("#pagin").append('<li class="page-item"><a class="page-link" href="#">'+(i+1)+'</a></li> ');
    if(i>pageSize){
       $("#pagin li").eq(i).hide();
    }
}

var prev = $("#previous").click(function(){
   startPage-=5;
   incremSlide-=5;
   numberPage--;
   slide();
});

prev.hide();

var next = $("#next").click(function(){
   startPage+=5;
   incremSlide+=5;
   numberPage++;
   slide();
});

 

$("#pagin li").first().addClass("active");

slide = function(sens){
   $("#pagin li").hide();
   
   for(t=startPage;t<incremSlide;t++){
     $("#pagin li").eq(t+1).show();
   }
   if(startPage == 0){
     next.show();
     prev.hide();
   }else if(numberPage == totalSlidepPage ){
     next.hide();
     prev.show();
   }else{
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