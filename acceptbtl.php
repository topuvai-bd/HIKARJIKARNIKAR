<?php include("Header.php");
include("include/pgredairect.php");
$ludotype=$_GET['type'];
$gamcode=$_GET['gamcode'];
$amnt=$_GET['amnt'];
?>

 
<div class="alert alert-danger " id="snackbar" style="display:none;"></div>
<section class="wallet-sect py-4 clearfix">
	<div class="container-fluid">
		<h6 class="semi mb-2">Accept a Battle</h6><br>
			<div id="response"></div>
		<div class="box p-0 mb-4">

			<form name="myform" method="POST" id="submit_form" >
			<div class="input-group">
				<span class="input-group-text bg-white border-0" id="basic-addon1"><i class="fas fa-bangladeshi-taka-sign"></i></span>
				<input type="number" readonly value="<?php echo $amnt;?>" name="amounst" id="amounst" class="form-control ps-0 border-0" placeholder="Amount" required>
				<input type="hidden" name="gamcode" id="gamcode" class="form-control ps-0 border-0" value="<?php echo $gamcode;?>" required>
				<button type="button" class="input-group-text btn btn-1 border-0" id="battale" >Accept</button>
			</div>
			

								</div>
								
		</form>
		</div>

		<h6 class="semi mb-2 d-flex align-items-center justify-content-between">
			<span>Accept Battles</span> <span><img src="https://upload.wikimedia.org/wikipedia/commons/4/41/Red_circle.gif?20210202002436" style="width:20px;"></span>
			<a href="javascript:void(0);" class="" data-bs-toggle="modal" data-bs-target="#rulesModal">Rules <i class="fas fa-circle-info"></i></a>
		</h6>
	



	</div>
</section>
<?php include("footer.php");?>
<script>  
 $(document).ready(function(){  
      $('#battale').click(function(){  
           var amounst = $('#amounst').val();  
           var gamcode = $('#gamcode').val();  
           if(amounst == '' || gamcode == '')  
           {  
                $('#response').html('<span class="alert alert-danger">Please Enter Amount</span>');  
           } 
		    
           else  
           {  
                $.ajax({  
                     url:"include/acceptbtl",  
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