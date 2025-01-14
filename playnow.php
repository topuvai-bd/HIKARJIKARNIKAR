<?php include("Header.php");
 include("include/pgredairect.php");
 include("wining_charges.php");

?>
<script>
	var isPlayerWaitingForRoomCode = false;
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<section class="wallet-sect py-4 clearfix">
	<div class="alert alert-danger " id="snackbarresult" style="display:none;"></div>

	<div class="container-fluid">
		<div id="battleroom">
		</div>
		<div class="alert alert-success" id="snackbarcopy" style="display:none;"></div>
	</div>
	<div class="container-fluid">
		<div id="battleroom">
			<?php
include("db.php");
if(!isset($_SESSION)){ session_start();};
 $namesesduser =$_SESSION['finalplayer'];
$gmgame=$_GET['gmgame'];
    $sql="SELECT *, (SELECT profile FROM user_regist WHERE user_regist.userrandcode=create_game.fuserid) as profile_img1,(SELECT profile FROM user_regist WHERE user_regist.userrandcode=create_game.suserid) as profile_img2  FROM `create_game` WHERE gameidrandom='$gmgame' AND (fnumber='$namesesduser' OR snumber='$namesesduser')";
    $run=mysqli_query($conn,$sql);

    if(mysqli_num_rows($run)<1)
    {
     //  header("Location:gam.php");
    }
else{
  
    $count=0;
    while($data=mysqli_fetch_assoc($run))
    {
        $count++;
        
     //   echo $data['amount_player'];
     $sdfdjhdf=$data['roomcode'];
	 $firstPlayerNum = $data['fnumber'];
	//  if(empty($sdfdjhdf)){
	// 	echo "<script>alert('Room Creator didnt update roomcode, please wait and revisit again');</script>";
	// 	// open gam page after 2 seconds using javascript
	// 	echo "<script>setTimeout(function(){ window.location.href = 'gam'; }, 2000);</script>";
	// 	die();
		
	//  }
        ?>

			<div class="box py-2 box-style d-block" style="background-color:#f2e6ff;border:1px solid gray;">
				<div class="small mb-2 pb-2 d-flex align-items-center justify-content-between border-bottom w-100">
					<div>
						Playing For:<span class="icon-ttl-no semi ms-2" style="font-size:10px;">৳<?php echo $data['game_amount'];?></span>
					</div>
					<div class="ms-2">
						Prize:<span class="icon-ttl-no semi ms-2" style="font-size:10px;">৳<?php echo $data['winning_amount']; ?></span>
					</div>
				</div>

				<div class="small text-center d-flex align-items-center justify-content-between">
					<div class="col-4">

						<div class="icon mx-auto" style="background-image: url(<?php
						 if($data['profile_img1'] !=''){
						echo BASEURL.$data['profile_img1'];
						}else{
							echo  'https://png.pngtree.com/png-clipart/20210309/original/pngtree-game-lion-logo-png-image_5846469.jpg';
						}
						?>);"></div>



						<div class="semi" style="font-size:10px;"><?php echo $data['fname']; ?></div>
					</div>
					<div class=""><img src="images/versus.png" height="50"></div>
					<div class="col-4">



						<div class="icon mx-auto" style="background-image: url(<?php
						 if($data['profile_img2'] !=''){
						echo BASEURL.$data['profile_img2'];
						}else{
							echo  'https://w7.pngwing.com/pngs/421/772/png-transparent-games-logo-cartoon-chinese-style-s-chinese-wind-image-games-logo-design-game-icon-material-thumbnail.png';
						}
						?>);"></div>



						<div class="semi" style="font-size:10px;">
							<?php echo $data['sname']; ?>

						</div>
					</div>
				</div>
			</div>

<?php 

if(empty($sdfdjhdf) && $firstPlayerNum == $namesesduser){
// room creator waiting for roomcode, show room code submit form
echo '<div class="box text-center box-style border-0 p-4 d-block bg-info bg-opacity-10">
				<a href="javascript:void(0)" class="btn py-2 btn-success btn-sm" onclick="SetRoomCode();">Set RoomCode</a>
			</div> ';
			

}else if(empty($sdfdjhdf) && $firstPlayerNum != $namesesduser){
	// opponent waiting for roomcode
	echo '<script>isPlayerWaitingForRoomCode=true;</script>';
	echo '<div class="box text-center box-style border-0 p-4 d-block bg-info bg-opacity-10">
				<h6 class="semi">Wait Until Opponent submit room code</h6>
				<a href="javascript:location.reload()" class="btn py-2 btn-success btn-sm" >Reload</a>
			</div>';
}else{
	// show room code and copy button
	echo '<div class="box text-center box-style border-0 p-4 d-block bg-info bg-opacity-10">
				<h6 class="semi">Room Code</h6>

				<div class="primary-color h2 bold">
					'.$data["roomcode"].'
				</div>
				<a href="javascript:void(0)" class="btn py-2 btn-success btn-sm" onclick="copyroomcode(\''.$sdfdjhdf.'\');">Copy Code</a>
			</div> ';
}

?>
			
			<!-- -->
			<input hidden type="text" name="gameroomID" value="<?php echo $gmgame;?>" id="gameroomID" class="form-control" placeholder="gameroomID" required>
			<input type="hidden" name="timecountget" id="timecountget" value="37.05">









		</div>
		<div class="alert alert-success" id="snackbarcopy" style="display:none;"></div>
	</div>


	<div class="box text-center" id="bettletime">



		<input type="hidden" name="timecount" id="timecount" value="5.6833333333333">



		<!--<a href="" target="_blank"><img src="images/app-store.png" height="40" class="rounded"></a>-->
		<a href="" target="_blank"><img src="images/play-store.png" height="40" class="rounded"></a>


	</div>


	<div class="box">
		<div class="section-title">
			<h4 class="semi">গেম খেলার নিয়ম নোটিশটি 👇👇</h4>
		</div>
		<ol>
			<li>ম্যাচ খেলা শেষ হলে অবশ্যই রেজাল্টের স্ক্রিনশট দেবেন </li>
			<li>যদি কোন কারনে ম্যাচ ক্যান্সেল করার প্রয়োজন পড়ে অবশ্যই তার কারণে প্রমাণ রাখুন </li>
			<li>ম্যাচ জয়েন্ট করার পর ওপর প্লেয়ার সাথে সাথে গেম থেকে বের হয়ে গেলে ম্যাচ ক্যানসেল দেবেন দুইজনে যদি দুই তিন মিনিট খেলার পর বের হয়ে যায় উইন রেজাল্ট সাবমিট দেবেন</li>
			<li>কোন প্লেয়ার যদি গেমে পরিবেশ করতে লেট করে তাহলে তার জন্য কমপক্ষে 10 মিনিট পর্যন্ত করবেন তারপর ক্যানসেল সাবমিট করবেন</li>
			<!-- <li>If you lose game click on lose button and post it </li> -->
		</ol>
	</div>

	<div class="box bg-success bg-opacity-10">
		<div class="section-title">
			<h4 class="semi">Match Status</h4>
			<div class="statusMsg"></div>
			<a href="contact?gameid=<?php echo $_GET['gmgame'];?>&&roomcode=<?php echo $data['roomcode'];?>" style="font-weight: bold; color: red;" id="issueid">If you have any issue in result <blink><span style=" border-bottom: 1px dotted black;
  width: 200px;"> click here</span></blink></a>
		</div>
		<?php
			 $dfd= $data['roomcode'];
        }
        }
        ?>
		<p>After completion of your game, select the status of the game and post your screenshot below.</p>
		<div class="alert alert-danger " id="snackbar" style="display:none;"></div>
		
		<?php 
		if (isset($_COOKIE['baby']) && $_COOKIE['baby']==$_GET['gmgame']){
		    
		    echo "<h2 style='color:red;'>result already submited </h2> ";
			    }else{?>
		
		<form action="submit_result.php" method="post" enctype="multipart/form-data" id="fupForm">
			<input type="hidden" name="usermobile" value="<?php echo $_SESSION['finalplayer']; ?>">
			<input type="hidden" name="gameid" value="<?php echo $_GET['gmgame'];?>">
			<input type="hidden" name="roomcodegame" value="<?php echo $dfd;?>">

			<div class="result-block d-flex mb-4">
			    

			

				<div class="form-check my-1 me-4" id="wonttimer">
					<input class="form-check-input" type="radio" name="game_result" id="won" value="won">
					<label class="form-check-label" for="won">Won</label>
				</div>
				<div class="form-check my-1 me-4" id="losttimer">
					<input class="form-check-input" type="radio" name="game_result" id="lost" value="lost">
					<label class="form-check-label" for="lost">Lost</label>
				</div>
			 
				<div class="form-check my-1 me-4" id="canceltimer">
					<input class="form-check-input" type="radio" name="game_result" id="cancel" value="cancel">
					<label class="form-check-label" for="cancel">Cancel</label>
				</div>
			</div>

			<div id="won" class="result-details won mb-3">
				<div class="mb-3">
					<input class="form-control h-auto px-2 py-1" type="file" id="file" name="file">
				</div>
			</div>

			<!--	<div id="lost" class="result-details lost mb-3">
				<div class="mb-3">
				  <input class="form-control h-auto px-2 py-1" type="file" id="losimg" name="losimg">
				</div>
			</div>-->

			<div id="cancel" class="result-details cancel mb-3">
				<div class="mb-3">
					<textarea class="form-control" placeholder="Enter reason" id="cancelreson" name="cancelreson" style="height: 100px;"></textarea>
				</div>
			</div>

			<button type="submit" id="result" class="btn btn-1" name="submit_form">Post Result</button>
		</form>
		<?php }?>
	</div>

	
	
	<div class="box">
    <div class="section-title">
        <h4 class="semi">গেম খেলার নিয়ম নোটিশটি 👇👇</h4>
    </div>
    <table class="table table-bordered table-hover shadow-sm" border="1" cellspacing="0" cellpadding="5" style="width: 100%; text-align: left; border-collapse: collapse; font-style: bold;">
        <thead class="table-light">
            <tr>
                <th style="text-align: left; vertical-align: middle;">জরিমানার পরিমাণ</th>
                <th style="text-align: left; vertical-align: middle;">জরিমানা কারণ</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td  style="text-align: left; color: red; font-weight: bold; vertical-align: middle;">৳ ৩০</td>
                <td style="text-align: left; font-weight: bold; vertical-align: middle;">প্রতারণা/Fake Screenshot সাবমিট দিলে</td>
            </tr>
            <tr>
                <td style="text-align: left; color: red; font-weight: bold; vertical-align: middle;">৳ ২০</td>
                <td style="text-align: left; font-weight: bold; vertical-align: middle;">ভুল রেজাল্ট সাবমিট দিলে</td>
            </tr>
            <tr>
                <td style="text-align: left; color: red; font-weight: bold; vertical-align: middle;">৳ ১৫</td>
                <td style="text-align: left; font-weight: bold; vertical-align: middle;">রেজাল্ট সাবমিট করতে দেরি করলে অথবা সাবমিট না করলে</td>
            </tr>
            <tr>
                <td style="text-align: left; color: red; font-weight: bold; vertical-align: middle;">৳ ১০</td>
                <td style="text-align: left; font-weight: bold; vertical-align: middle;">Abusing</td>
            </tr>
        </tbody>
    </table>
</div>




</section>

<!-- Footer -->
<!--<script>
    $(document).ready(function(e){
    $("#fupForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'include/upload.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#fupForm').css("opacity",".5");
            },
            success: function(response){
                $('.statusMsg').html('');
                if(response.status == 1){
                    $('#fupForm')[0].reset();
                    $('.statusMsg').html('<p class="alert alert-primary">'+response.message+'</p>');
                }else{
                    $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
                }
                $('#fupForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });
});
</script>-->

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
<script type="text/javascript">
	$(document).ready(function() {
		$('.result-details').hide();
		$("input[name$='result']").change(function() {
			$('.result-details').hide();
			$('.' + $(this).val()).slideDown();
		});
	});

</script>
<script type="text/javascript">




</script>
<script type="text/javascript">
	var gameid = "209";
	var type = "Ludo Classic";
	runningbettle_call();

	function runningbettle_call() {


		// $.ajax({
		// 	type: "post",
		// 	url: "get_battelroom.php",
		// 	datatype: "json",
		// 	data: {
		// 		gameid: gameid,
		// 		type: type
		// 	},
		// 	success: function(data) {
		// 		var value = $.trim(data);

		// 		if ($.trim(data) == "") {



		// 			window.location.href = "battle.php?type=" + type;



		// 		} else {
		// 			$('#battleroom').html(data);
		// 		}

		// 	}
		// });

	}
	setInterval(function() {

		runningbettle_call();
	}, 25000);



	function roomcodesubmit(gameid) {
		var gameid = "209";
		var roomcode = $("#roomcode").val();

		if (roomcode != null && roomcode != 0) {

			$.ajax({
				type: "post",
				url: "insertroomcode.php",
				datatype: "json",
				data: {
					gameid: gameid,
					roomcode: roomcode
				},
				success: function(data) {
					$('#yourbettle').html(data);
					location.reload();
				}
			});

		} else {
			alert("Please Enter Roomcode");
		}
	}

</script>
<script>
	function submitresult() {

		var result = $("input[type=radio][name='result']:checked").val()
		var wonimg = $("#wonimg").val();
		var resultsnack = document.getElementById("snackbar");

		if (result != null && result != "") {
			if (result == "won") {
				if (wonimg != null && wonimg != "") {
					$("#myForm").submit();
				} else {

					resultsnack.style.display = "block";

					resultsnack.innerHTML = "<strong>Danger!</strong> Please Upload Screeshort.";
					window.setTimeout(function() {


						$("#snackbar").slideUp(500, function() {
							resultsnack.className = "alert alert-danger  show";
						});
					}, 3000);
				}
			} else if (result == "cancel") {
				$.ajax({
					type: "post",
					url: "checkresult.php",
					datatype: "json",
					data: {
						gameid: gameid
					},
					success: function(dataResult) {
						var dataResult = JSON.parse(dataResult);
						if (dataResult.passwordCode == 200) {

							$("#myForm").submit();
						} else {
							resultsnack.style.display = "block";

							resultsnack.innerHTML = "<strong>Danger!</strong> Game have been already done";
							window.setTimeout(function() {


								$("#snackbar").slideUp(500, function() {
									resultsnack.className = "alert alert-danger  show";
								});
							}, 3000);
						}
					}
				});
			} else {
				$("#myForm").submit();
			}
		} else {
			resultsnack.style.display = "block";

			resultsnack.innerHTML = "<strong>Danger!</strong> Please Select Match Status.";
			window.setTimeout(function() {


				$("#snackbar").slideUp(500, function() {
					resultsnack.className = "alert alert-danger  show";
				});
			}, 3000);
		}


	}

</script>
<script>
	function copyroomcode(roomcode) {
		/* Get the text field */
		var copyText = roomcode;
		var snackbarcopy = document.getElementById("snackbarcopy");
		navigator.clipboard.writeText(copyText);
		snackbarcopy.style.display = "block";

		snackbarcopy.innerHTML = "<strong>Room code copied ! </strong>" + copyText;
		window.setTimeout(function() {


			$("#snackbarcopy").slideUp(500, function() {
				snackbarcopy.className = "alert alert-success  show";
			});
		}, 3000);

	}

</script>


<script type="text/javascript">
	timercheck();

	function timercheck() {

		var timer = $("#timecountget").val();


		if (timer != 0) {
			$("#canceltimer").show();
			$("#wonttimer").show();
			$("#losttimer").show();
			$("#issueid").show();
		} else {
			$("#canceltimer").show();
			$("#wonttimer").hide();
			$("#losttimer").hide();
			$("#issueid").hide();
		}

	}
	setInterval(function() {

		timercheck();
	}, 5000);



	$(document).ready(function() {
		var timer = $("#timecount").val();

		if (timer != 0) {
			$("#canceltimer").show();
			$("#wonttimer").show();
			$("#losttimer").show();
			$("#issueid").show();
		} else {
			$("#canceltimer").show();
			$("#wonttimer").hide();
			$("#losttimer").hide();
			$("#issueid").hide();
		}
	});

</script>
<script>
	function SetRoomCode(){
		// window.location.href = 'playnow?gmgame='+$('#gameroomID').val();
		Swal.fire({
        title: "Submit your Room Code",
        input: "text",
        inputAttributes: {
            autocapitalize: "off"
        },
        showCancelButton: true,
        confirmButtonText: "Play Now",
        showLoaderOnConfirm: true,
        preConfirm: (referralCode) => {
            // Assuming you want to validate or use the referral code before redirecting
            // You can perform any asynchronous operation here if needed
			if (referralCode.length != 8) {
				Swal.showValidationMessage('Room Code must be at least 8 characters');
				return false;
			}
            return referralCode; // This is just a placeholder for any processing you might want to do
        }
        }).then((result) => {
            if (result.isConfirmed && result.value) {
                // Redirect to the refer page with the referral code as a query parameter
                // window.location.href = `refer?referedby=${result.value}`;
				// playnow.php?gmgame=<php echo $datad['gameidrandom'];?>
				console.log(result.value);
				console.log($('#gameroomID').val());
				$.ajax({
					url: "include/submitroomcode.php",
					method: "POST",
					data: {
						roomcode: result.value,
						gameroomID: $('#gameroomID').val(),
					},
					success: function(data) {
						console.log(data);
						if(data.includes("200")){
							window.location.href = 'playnow.php?gmgame='+$('#gameroomID').val();
						}else{
							Swal.fire({
								title: "Error",
								text: "Room code update failed! Please try again.",
								icon: "error",
								button: "Ok",
							});
						}
					}
				});
            }
        });
	}
</script>
<audio id="audioPlayer" src="alarm.wav" preload="auto"  muted></audio>
	<script>
		var AudioSwitch=false;
		// Get the audio element
        const audio = document.getElementById('audioPlayer');
		 // Start muted and paused on user interaction
		 function initAudio() {
            document.body.removeEventListener('click', initAudio); // Remove listener after first click
            audio.muted = false; // Unmute audio
            // audio.play() // Play audio briefly
            //     .then(() => {
            //         audio.pause(); // Immediately pause after starting
            //         console.log("Audio initialized successfully.");
            //     })
            //     .catch((error) => {
            //         console.error("Error initializing audio:", error.message);
            //     });
        }
		document.body.addEventListener('click', initAudio);
        // Play the sound
        function playSound() {
            audio.play();
        }

        // Pause the sound
        function pauseSound() {
            audio.pause();
        }
		console.log("AudioSwitch32423");
		// audio.pauseSound();
		function LoopAudio(){
			console.log("AudioSwitch",AudioSwitch);
			
			if(AudioSwitch && audio.paused){
				playSound();
			}
			if(AudioSwitch==false){
				pauseSound();
			}
		}
		
		// setInterval(function(){
		// 	LoopAudio();
		// }, 400);
		setInterval(LoopAudio, 2000);
		var checkingRoomCode;
		// get if room code is submitted by room creator
		function GetIfRoomCodeSubmitted(){
			$.ajax({
				url: "include/getroomcode.php",
				method: "POST",
				data: {
					gamecode: $('#gameroomID').val(),
				},
				success: function(data) {
					console.log(data);
					if(!data.includes("200")){
						AudioSwitch=true;
						clearInterval(checkingRoomCode);
					}
				}
			});
		}
		if(isPlayerWaitingForRoomCode){
			checkingRoomCode=setInterval(GetIfRoomCodeSubmitted, 5000);
		}
		



	</script>