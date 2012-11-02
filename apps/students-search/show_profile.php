<?php


include("db.php");
$var= $_GET['user'];

session_start();


  $query = "select * from users where upper(username) like \"%$var%\"

order by fullname";

$numresults=mysql_query($query);

$row = mysql_fetch_array($numresults);
$name=$row['fullname'];
$nick=$row['nick'];
$username=$row['username'];
$hostel=$row['hostel'];
$room=$row['room'];
$email=$row['email'];
$contact=$row['contact'];


 



?>






<div class="widget-header">
						<i class="icon-star"></i>
						<h3><?php if($nick!="") echo $nick."'s"; ?>Profile</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
	          			<table>
							<tr>
								<td style="width:100px;"><a href="#">Name</a></td>
								<td><?php echo $name; ?></td>
							</tr><tr>
								<td style="width:100px;"><a href="#">Nickname</a></td>
								<td><?php echo $nick; ?></td>
							</tr><tr>
								<td style="width:100px;"><a href="#">Roll Number</a></td>
								<td><?php echo $username; ?></td>
							</tr><tr>
								<td style="width:100px;"><a href="#">Room No.</a></td>
								<td><?php echo $room; ?></td>
							</tr><tr>
								<td style="width:100px;"><a href="#">Hostel.</a></td>
								<td><?php echo $hostel; ?></td>
							</tr><tr>
								<td style="width:100px;"><a href="#">Contact No.</a></td>
								<td><?php if($contact!=0) echo $contact; ?></td>
							</tr><tr>
								<td style="width:100px;"><a href="#">E-Mail ID</a></td>
								<td><?php echo $email; ?></td>
							</tr>
						</table>
				</div> <!-- /widget-content -->