
<?php
if (!isset($_SESSION)) 
{session_start();}
if (isset($_SESSION['finalplayer'])) {
    include "include/pgsessionredirect.php";
    include "include/wlpageredirection.php";
    include "include/referwallate.php";
    ?>
<!doctype html>
<html class="no-js" lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
	<title>SuperLudoBD</title>
	<meta name="description" content=""/>
	<meta name="keywords" content=""/>
	<meta name="robots" content=""/>
	<link rel="manifest" href="images/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="images/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.0/dist/sweetalert2.all.min.js"></script>
	<!-- Stylesheet -->
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/custom.css"/>
	<style>
		@media only screen and (max-width:800px) {
			#vb { position: fixed; }
	}

		.welcome-sect , .navigation , .right-bar , .side-bar , .main{
			background: hsla(115, 76%, 76%, 1);
		background: linear-gradient(90deg, hsla(115, 76%, 76%, 1) 0%, hsla(0, 36%, 91%, 1) 50%, hsla(15, 93%, 72%, 1) 83%);
		background: -moz-linear-gradient(90deg, hsla(115, 76%, 76%, 1) 0%, hsla(0, 36%, 91%, 1) 50%, hsla(15, 93%, 72%, 1) 83%);
		background: -webkit-linear-gradient(90deg, hsla(115, 76%, 76%, 1) 0%, hsla(0, 36%, 91%, 1) 50%, hsla(15, 93%, 72%, 1) 83%);
		filter: progid: DXImageTransform.Microsoft.gradient( startColorstr="#9AF092", endColorstr="#F1E1E1", GradientType=1 );
		
	}
	</style>


<script type="text/javascript">
window.onload = setupBalanceRefresh;
// window.onload = setupBattleRefresh;
function setupBalanceRefresh()
{
    setInterval(refreshBalanceBlock,1000);
}

function refreshBalanceBlock()
{
    $('#balance').load("get_balance.php"); // just update your test file url
}
 </script>


<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
<link rel="icon" type="image/x-icon" href="images/favicon/favicons.ico">
</head>
<body class="bg-light">

<div class="main">
	<div class="side-bar" >
		<!-- HEADER -->
		<header class="navigation" id="vb" style="padding-bottom: 2px;">
		    <div class="container-fluid" >
		        <nav class="navbar justify-content-between align-items-center p-0">
		        	<div class="logo-block d-flex align-items-center">
			        	<!-- Menu Toggler -->
			        	<div class="mobile-toggle">
							<div class="one"></div>
							<div class="two"></div>
							<div class="three"></div>
						</div>
											<a class="navbar-brand p-0 m-0" href="index">
							<picture class="logo">
								<img loading="lazy" src="images/KHD.png" alt="logo" title="logo" height="55" width="55px" />
							</picture>
						</a>
					</div>

					<!-- Side Menu -->
										<div class="main-menu">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item profile">
								<a href="profile" class="">
									<div class="profile-block">
										
										<img src="<?php 
										if($profile_img !=''){
											echo $profile_img;
										}else{
											echo 'https://www.freeiconspng.com/thumbs/profile-icon-png/profile-icon-9.png';
										}
										?>" class="img-fluid">
										<div class="profile-desc">


<h3><?php echo $playername; ?></h3>
<p class="mb-0"><?php echo $playernumber; ?></p>



										</div>
									</div>
								</a>
							</li>

							<li class="nav-item">
								<a href="index" class="">
									<div class="menu-icon">
										<i class="pe-2 fas fa-gamepad"></i>
										<span>Win Cash</span>
									</div>
								</a>
							</li>

							<li class="nav-item">
								<a href="wallet" class="">
									<div class="menu-icon">
										<i class="pe-2 fas fa-wallet"></i>
										<span>My Wallet</span>
									</div>
								</a>
							</li>

							<li class="nav-item">
								<a href="game-history" class="">
									<div class="menu-icon">
										<i class="pe-2 fas fa-trophy"></i>
										<span>Games History</span>
									</div>
								</a>
							</li>
								<li class="nav-item">
								<a href="gam" class="">
									<div class="menu-icon">
										<i class="pe-2 fas fa-trophy"></i>
										<span>Our Battles</span>
									</div>
								</a>
							</li>


							<li class="nav-item">
								<a href="transaction" class="">
									<div class="menu-icon">
										<i class="pe-2 fas fa-history"></i>
										<span>Transaction History</span>
									</div>
								</a>
							</li>
								<li class="nav-item">
								<a href="sattalment" class="">
									<div class="menu-icon">
											<i class="pe-2 fas fa-trophy"></i>
										<span>Sattalment History</span>
									</div>
								</a>
							</li>

							<!-- <li class="nav-item">
								<a href="top-user" class="">
									<div class="menu-icon">
										<i class="pe-2 fas fa-crown"></i>
										<span>Top 10 Users</span>
									</div>
								</a>
							</li> -->

							<li class="nav-item">
								<a href="refer" class="">
									<div class="menu-icon">
										<i class="pe-2 fas fa-gift"></i>
										<span>Refer & Earn</span>
									</div>
								</a>
							</li>

							<li class="nav-item">
								<a href="notification" class="">
									<div class="menu-icon">
										<i class="pe-2 fas fa-bell"></i>
										<span>Notifications</span>
									</div>
								</a>
							</li>
							<li class="nav-item">
								<a href="contact" class="">
									<div class="menu-icon">
										<i class="pe-2 fas fa-question-circle"></i>
										<span>Contact</span>
									</div>
								</a>
							</li>
							<li class="nav-item">
								<a href="support" class="">
									<div class="menu-icon">
										<i class="pe-2 fas fa-question-circle"></i>
										<span>Support</span>
									</div>
								</a>
							</li>

							<li class="nav-item">
								<a href="logout" class="">
									<div class="menu-icon">
										<i class="pe-2 fas fa-sign-out"></i>
										<span>Logout</span>
									</div>
								</a>
							</li>
						</ul>
					</div>
                    					<!-- Wallet -->
					<div class="wallet-block" id="balance" >



						<!--  -->
					</div>
				</nav>
		    </div>
		</header><br>
<br>
<br>
<!-- Tab -->		<?php
} else if (isset($_COOKIE['finalplayer'])) {

    $_SESSION['finalplayer'] = $_COOKIE['finalplayer'];
    header("Location: index");

} else {
    ?>

<!doctype html>
<html class="no-js" lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
	<title>SuperLudoBD</title>
	<meta name="description" content=""/>
	<meta name="keywords" content=""/>
	<meta name="robots" content=""/>
	<link rel="apple-touch-icon" sizes="57x57" href="images/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="images/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="images/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/favicon/apple-icon-114x114.png">

	<link rel="manifest" href="images/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="images/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<link rel="shortcut icon" href="images/favicon/favicons.png" type="image/x-icon">
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/custom.css">
	<link rel="icon" type="image/x-icon" href="images/favicon/favicons.ico">

	<style>

.welcome-sect , .navigation , .right-bar , .side-bar , .main{
background: hsla(115, 76%, 76%, 1);
background: linear-gradient(90deg, hsla(115, 76%, 76%, 1) 0%, hsla(0, 36%, 91%, 1) 50%, hsla(15, 93%, 72%, 1) 83%);
background: -moz-linear-gradient(90deg, hsla(115, 76%, 76%, 1) 0%, hsla(0, 36%, 91%, 1) 50%, hsla(15, 93%, 72%, 1) 83%);
background: -webkit-linear-gradient(90deg, hsla(115, 76%, 76%, 1) 0%, hsla(0, 36%, 91%, 1) 50%, hsla(15, 93%, 72%, 1) 83%);
filter: progid: DXImageTransform.Microsoft.gradient( startColorstr="#9AF092", endColorstr="#F1E1E1", GradientType=1 );

}


</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="main">
	<div class="side-bar" >
		<header class="navigation" style="padding-bottom: 2px;">
		    <div class="container-fluid">
		        <nav class="navbar justify-content-between align-items-center p-0">
		        	<div class="logo-block d-flex align-items-center">
			        							<a class="navbar-brand p-0 m-0" href="index">
							<picture class="logo">
								<img loading="lazy" src="images/KHD.png" alt="logo" title="logo" height="55" width="55px" />
							</picture>
						</a>
					</div>

					<!-- Side Menu -->
										<!-- Wallet -->
					<div class="wallet-block">
						                         	<a href="login" class="btn btn-1 btn-sm">Login</a>


						<!--  -->
					</div>
				</nav>
		    </div>
		</header>
		<br>
<br>
<br>
<?php
}

?>