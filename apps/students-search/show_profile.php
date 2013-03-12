<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
  include("db.php");  
  $var= $_GET['userd']; 
  //session_start();
  
  include("apps/students-search/config_show.php");
	
	if( $show_secretary == 0 ) {

?>
    <center>
				<div class="widget" id="widget"  style="width:415px; margin:10px;">
          <div class="widget-header">
						<i class="icon-star"></i>
						<h3><?php if($show_nick!="") echo $show_nick."'s"; ?>Profile</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
	          			<table>
							<tr>
								<td style="width:100px;"><a href="#">Name</a></td>
								<td><?php echo $show_name; ?></td>
							</tr><tr>
								<td style="width:100px;"><a href="#">Nickname</a></td>
								<td><?php echo $show_nick; ?></td>
							</tr><tr>
								<td style="width:100px;"><a href="#">Roll Number</a></td>
								<td><?php echo $show_user; ?></td>
							</tr><tr>
								<td style="width:100px;"><a href="#">Room No.</a></td>
								<td><?php echo $show_room; ?></td>
							</tr><tr>
								<td style="width:100px;"><a href="#">Hostel.</a></td>
								<td><?php echo $show_hostel; ?></td>
							</tr><tr>
								<td style="width:100px;"><a href="#">Contact No.</a></td>
								<td><?php if($show_contact!=0) echo $show_contact; ?></td>
							</tr><tr>
								<td style="width:100px;"><a href="#">E-Mail ID</a></td>
								<td><?php echo $show_email; ?></td>
							</tr><tr>
								<td style="width:100px;"><a href="#">Blood Group</a></td>
								<td><?php echo $show_bgroup; ?></td>
							</tr>
						</table>
				</div> <!-- /widget-content -->

						
			</div> <!-- /widget -->	
    </center>
<?php
  } else { // show secretary's profile
    include('show_secretary_page.php');
  }
  

?>
