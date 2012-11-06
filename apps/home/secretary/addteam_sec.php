<?php
	include("../../../db.php");
	

	session_start();
	
	if (isset($_COOKIE["user"]))
		$_SESSION['uname'] = $_COOKIE["user"];
		
	include("../../../config.php");
	
	if($loggedin == 0)		
		die("Please Login to continue");


?>
<div style="float:left; margin-left:10px;  height:340px; width:520px;" class="widget-contentsec" id="inner_body_sec">
<form id="form" name="regform" action="apps/home/secretary/addteamsubmit_sec.php" method="post">
	<table>
		<tr>
			<td style="width:100px;"><a href="#">Team Name</a></td>
			<td><input id="team_name" type="text" name="team_name" value="<?php echo $team_name; ?>" maxlength="255" /></td>
		</tr><tr>
			<td style="width:100px;"><a href="#">Team Description</a></td>
			<td>
				<textarea id="desc" name="team_desc"><?php echo $team_desc; ?></textarea>
			</td>
		</tr><tr>
			<td colspan='2' style="width:100px;">
			</tr>
		</tr><tr>
			<center>
				<td><a href="#"><input class="btn btn-warning" type="submit" value="Create" name="Send" /></a></td>
			</center>
		</tr>
	</table>
</form>
</div>
