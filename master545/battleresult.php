<?php include("header.php");?>
	<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Dashboard</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Data Table</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>
					</div>
				</div>
			
				<h6 class="mb-0 text-uppercase"> Battle Result</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>S.No.</th>
										<th>id</th>
										<th>playername1</th>
										<th>playerid1</th>
										<th>playermobilenumber1</th>
										<th>playerroom_code1</th>
										<th>player_gameid1</th>
											
										<th>playerscreenshot1</th>
										<th>playercancelreason1</th>
										<th>playerstatus1</th>
										<th>player_date1</th>
										<th>playername2</th>
										<th>playerid2</th>
										<th>playermobilenumber2</th>
										<th>playerroom_code2</th>
										<th>player_gameid2</th>
										<th>playerscreenshot2</th>
										<th>playercancelreason2</th>
										<th>playerstatus2</th>
										<th>player_date2</th>
											
										<th>rand</th>
										<th>status</th>
										<th>API_RESULT</th>
									
									</tr>
								</thead>
								<tbody>
								    
<?php
    $sql="SELECT * FROM `resultupload` WHERE status !=2 Order BY id DESC";
    $run=mysqli_query($conn,$sql);

    if(mysqli_num_rows($run)<1)
    {
      echo '<p class="alert alert-danger">Data Not Found</p>';
    }
else{
  
    $count=0;
    while($data=mysqli_fetch_assoc($run))
    {
        $count++;
        ?>
									<tr>
										<td><?php echo $count;?></td>

									
											<td><?php echo $data['id'];?></td>
										<td><?php echo $data['playername1'];?></td>
										<td><?php echo $data['playerid1'];?></td>
										<td><?php echo $data['playermobilenumber1'];?></td>
										<td><?php echo $data['playerroom_code1'];?></td>
										<td><a href="resultdetails?player=1&battelid=<?php echo $data['player_gameid1'];?>">
										show battel
									    </a> </td>
											
										<td> <?php 
										    
										    if($data['playerscreenshot1']==''){
										        echo "Null";
										    }else{
										    ?>
										    
									<a href="<?php echo $data['playerscreenshot1'];?>">Show </a> 
									
									
										<?php } ?>
									</td>
										<td><?php echo $data['playercancelreason1'];?></td>
										<td><?php echo $data['playerstatus1'];?></td>
										<td><?php echo $data['player_date1'];?></td>
										<td><?php echo $data['playername2'];?></td>
										<td><?php echo $data['playerid2'];?></td>
										<td><?php echo $data['playermobilenumber2'];?></td>
										<td><?php echo $data['playerroom_code2'];?></td>
										<td>
										
									
										<a href="resultdetails?player=2&battelid=<?php echo $data['player_gameid2'];?>">
										show battel
									    </a> 

									
										</td>

										<td>
										    <?php 
										    
										    if($data['playerscreenshot2']==''){
										        echo "Null";
										    }else{
										    ?>
										<a href="<?php echo $data['playerscreenshot2'];?>">Show</a> 
										
										<?php } ?>
									
										</td>
										<td><?php echo $data['playercancelreason2'];?></td>
										<td><?php echo $data['playerstatus2'];?></td>
										<td><?php echo $data['player_date2'];?></td>
											
										<td><?php echo $data['rand'];?></td>
										<td><?php echo $data['status'];?></td>


											
									
										    <!-- <img src="https://www.aryagroupbly.in/wp-content/uploads/2020/05/new-gif.gif" style="width:30px;"> -->
										
										
										
								
										
									</tr>
								
								<?php
    }
}
?>
								</tbody>
								<tfoot>
									<tr>
										<th>S.No.</th>
										<th>id</th>
										<th>playername1</th>
										<th>playerid1</th>
										<th>playermobilenumber1</th>
										<th>playerroom_code1</th>
										<th>player_gameid1</th>
											
										<th>playerscreenshot1</th>
										<th>playercancelreason1</th>
										<th>playerstatus1</th>
										<th>player_date1</th>
										<th>playername2</th>
										<th>playerid2</th>
										<th>playermobilenumber2</th>
										<th>playerroom_code2</th>
										<th>player_gameid2</th>
										<th>playerscreenshot2</th>
										<th>playercancelreason2</th>
										<th>playerstatus2</th>
										<th>player_date2</th>
											
										<th>rand</th>
										<th>status</th>
										<th>API_RESULT</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php include("footer.php");?> 