<?php include("Header.php");  $error="";?>
<section class="wallet-sect bg-light py-4 clearfix">
	<div class="container-fluid">
	    
		    <?php
include("db.php");
 $namesesduser=$_SESSION['finalplayer'];
if(isset($_POST['updated'])){
    $names=$_POST['txtname'];
   // $profileimage=$_POST['profileimage'];
     $filename=$_FILES["profileimage"]["name"];
   $tempname= $_FILES["profileimage"]["tmp_name"];

    if($filename==NULL){
         $q="update user_regist set  user_Name='$names' where user_number=$namesesduser";
    $query = mysqli_query($conn,$q);
   if($query==TRUE){
       $error='<p class="alert alert-success">Profile Updated SuccessFully</p>';
   }
    }
    else{
          $filename=$_FILES["profileimage"]["name"];
   $tempname= $_FILES["profileimage"]["tmp_name"];
   $folder="upload/profile/".$filename;
   move_uploaded_file($tempname,$folder);
    $q = "update user_regist set  user_Name='$names',profile='$folder' where user_number=$namesesduser";
    $query = mysqli_query($conn,$q);
   if($query==TRUE){
       $error='<p class="alert alert-success">Profile Updated SuccessFully</p>';
   }
    }
   

}
    $sqls="SELECT * FROM `user_regist` WHERE user_number='$namesesduser' ";
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
        ?>
<div class="alert alert-danger " id="paymentdecline" style="display:none;"></div>
		<form class="box bg-white"  method="post" enctype="multipart/form-data">
			<div class="section-title pb-2">
				<h4 class="semi">Update Profile </h4>
				<br>
				<?php echo $error;?>
			</div>
			<div class="form-group input-group mb-2">
				<span class="input-group-text bg-white" id="basic-addon1"><i class="fas fa-user"></i></span>
				<input type="text" name="txtname" id="txtname" class="form-control border-start-0 ps-1" placeholder="Enter Your Name" value="<?php echo $datas['user_Name'];?>" required>
				
			</div>
			  
		

			<div class="form-group input-group mb-2" >
				<span style="height:100px;" class="input-group-text bg-white" id="basic-addon1"><i class="fas fa-image"></i></span>
				<input style="height:100px;line-height:50px;" type="file" name="profileimage" id="profileimage" class="form-control border-start-0 ps-1">
				
			</div>
			 
			 

			<div class="form-group mb-3">
				<button type="submit" name="updated" class="btn btn-1 py-2 w-100">Update</button>
			</div>
		</form>
	</div>
</section>

<!-- Footer -->

	</div> <!-- // Sidebar -->

        <?php
        }
        }
        ?>
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
</html> 
 <script>
 

$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var x = document.getElementById("txtpassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
});
</script>