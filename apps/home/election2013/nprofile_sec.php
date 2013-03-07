<?php

  // got from php's include function
  if(file_exists("db.php"))  include("db.php");
  if(file_exists("../../../db.php"))  {
    include("../../../db.php");
    session_start();
  }
  if(file_exists("config.php"))  include("config.php");
  if(file_exists("../../../config.php"))  include("../../../config.php");
  
  if (isset($_COOKIE["user"]))
    $_SESSION['uname'] = $_COOKIE["user"];
  
	if( $loggedin == 0)
		die("Please Login to continue");

?>
<table>
	<tr>
		<td style="width:100px;"><a href="#">Display Picture</a></td>
		<td>
			<img style="height:150px; width:150px;" src="../../../files/Election2013/pics/<?php echo $ndisp_pic; ?>"/>
		</td>
	</tr><tr>
		<td style="width:100px;"><a href="#">Name</a></td>
		<td><?php echo $name; ?></td>
	</tr><tr>
		<td style="width:100px;"><a href="#">Nickname</a></td>
		<td><?php echo $nick; ?></td>
	</tr><tr>
		<td style="width:100px;"><a href="#">Roll No.</a></td>
		<td><?php echo $user; ?></td>
	</tr><tr>
		<td style="width:100px;"><a href="#">Room No.</a></td>
		<td><?php echo $room; ?></td>
	</tr><tr>
		<td style="width:100px;"><a href="#">Hostel</a></td>
		<td><?php echo $hostel; ?></td>
	</tr> <tr>
		<td style="width:100px;"><a href="#">Nominiee for</a></td>
		<td><?php echo $ninsti; ?></td>
	</tr><tr>
		<td style="width:100px;"><a href="#">Contact No.</a></td>
		<td><?php if($contact!=0) echo $contact; ?></td>
	</tr><tr>
		<td style="width:100px;"><a href="#">E-Mail ID</a></td>
		<td><?php echo $email; ?></td>
	</tr><tr>
		<td style="width:100px;"><a href="#">Manifesto</a></td>
		<td>
			<?php if(strlen($nmanifesto) > 8) echo '<a href="../../../files/Election2013/manifesto/'.$nmanifesto.'">Download Manifesto</a>';
				else echo 'Not uploaded '; ?>
		</td>
	</tr>
    <tr>
		<td style="width:100px;"><a href="#">Writeup</a></td>
		<td>
			<?php if(strlen($nwriteup) > 8) echo '<a href="../../../files/Election2013/manifesto/'.$nwriteup.'">Download Write-up</a>';
				else echo 'Not uploaded'; ?>
		</td>
	</tr>
    <tr>
		<td style="width:100px;"><a href="#">Blood Group</a></td>
		<td><?php echo $bgroup; ?></td>
	</tr>									
</table>
