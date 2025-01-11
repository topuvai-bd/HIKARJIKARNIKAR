<!doctype html>
<?php include("inc/session.php");?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="assets/images/favicons.ico" type="image/png" />
	<link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/dark-theme.css" />
	<link rel="stylesheet" href="assets/css/semi-dark.css" />
	<link rel="stylesheet" href="assets/css/header-colors.css" />
	<title><?php echo $adminname;?></title>
	<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.0/dist/sweetalert2.all.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="https://superludobd.com/images/KHD.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text"><?php echo $adminname;?></h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
			    	<li>
					<a href="Dashboard">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
			
				<li class="menu-label">Player Section</li>
				<li>
					<a href="playerdata">
						<div class="parent-icon"><i class='bx bx-user'></i>
						</div>
						<div class="menu-title">Player List</div>
					</a>
				</li>
				
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-play'></i>
						</div>
						<div class="menu-title">Battle</div>
					</a>
					<ul>
						<li> <a href="battlenew"><i class="bx bx-right-arrow-alt"></i>New Battle</a>
						</li>
						<li> <a href="battlerunning"><i class="bx bx-right-arrow-alt"></i> Battle Running</a>
						</li>
						<li> <a href="battlecomplete"><i class="bx bx-right-arrow-alt"></i>Battle Completed</a>
						</li>
						<li> <a href="battleresult"><i class="bx bx-right-arrow-alt"></i>Battle Result</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-wallet'></i>
						</div>
						<div class="menu-title">Wallet</div>
					</a>
					<ul>
						<li> <a href="wallte"><i class="bx bx-right-arrow-alt"></i>Player Payment History</a>
						</li>
						
						<li> <a href="walltesattalment"><i class="bx bx-right-arrow-alt"></i>Settlement Request</a>
						</li>
						<li> <a href="wallaterecharge"><i class="bx bx-right-arrow-alt"></i> Wallet Recharge  </a>
						</li>
						<li> <a href="playerTrans"><i class="bx bx-right-arrow-alt"></i> Player Transiction  </a>
						</li>
						
					
					</ul>
				</li>
					<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-wallet'></i>
						</div>
						<div class="menu-title">E-KYC</div>
					</a>
					<ul>
						<li> <a href="kyc_request"><i class="bx bx-files"></i>Player E-KYC</a>
						</li>
							</ul>
				</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-gift"></i>
						</div>
						<div class="menu-title">Refer & Earn </div>
					</a>
					<ul>
						<li> <a href="refer_set"><i class="bx bx-right-arrow-alt"></i>Set Commission</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"> <i class="bx bx-user-circle"></i>
						</div>
						<div class="menu-title">Admin Setting</div>
					</a>
					<ul>
						<li> <a href="admin_game_comission"><i class="bx bx-right-arrow-alt"></i>Set Game Commission</a>
						</li>
						<li> <a href="admin_sattelment_charge"><i class="bx bx-right-arrow-alt"></i>Set Settelment Charges</a>
						</li>
					
					</ul>
				</li>
		
				<li class="menu-label">Others</li>
		
				<li>
					<a href="contact_data">
						<div class="parent-icon"><i class="bx bx-support"></i>
						</div>
						<div class="menu-title">Support</div>
					</a>
				</li>
			</ul>
		</div>
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
							<input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
							<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						</div>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon">
								<a class="nav-link" href="#">	<i class='bx bx-search'></i>
								</a>
							</li>
						
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">0</span>
									<i class='bx bx-bell'></i>
								</a>
							<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
								<div class="header-notifications-list">
									
									
									
								
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">0</span>
									<i class='bx bx-comment'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Messages</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-message-list">
								
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0"><?php echo $adminname;?></p>
								<p class="designattion mb-0"><img src="https://www.kindpng.com/picc/m/459-4596151_breezeicons-actions-22-im-user-online-user-online.png" style="width:20px;"></p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>Settings</span></a>
							</li>
							<li><a class="dropdown-item" href="Dashboard"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
							</li>
							<li><a class="dropdown-item" href="adminearning"><i class='bx bx-dollar-circle'></i><span>Earnings</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-download'></i><span>Downloads</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="logout"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->