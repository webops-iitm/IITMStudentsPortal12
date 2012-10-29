<?php
	include("../../../db.php");
	
	session_start();
	
	if (isset($_COOKIE["user"]))
		$_SESSION['uname'] = $_COOKIE["user"];
		
	include("../../../config.php");
	
	if($loggedin == 0)		
		die("Please Login to continue");

	if( ! isset($_GET['team_id']) )
		header('Location: ../../../index.php');
	$team_id = $_GET['team_id'];
	$sql = "SELECT team_name, team_desc FROM stu_sec_teams WHERE team_id=$team_id;";	
	$result = mysql_query($sql);
	$row = mysql_fetch_row($result, MYSQL_ASSOC);
	$team_name = $row['team_name'];
	$team_desc = $row['team_desc'];
	$sql = "SELECT * FROM stu_sec_files WHERE team_id=$team_id;";	
	$result = mysql_query($sql);
?>
<form id="form1" name="teamform" action="apps/home/secretary/editteamsubmit_sec.php" method="post">
<table style="min-width:100%;">
	<tr style="min-width:100%;">
		<td>Team Name</td>
		<td><h2><center>
			<input id="team_id" type="hidden" name="team_id" value="<?php echo $team_id; ?>" />
			<input id="team_name" type="text" name="team_name" value="<?php echo $team_name; ?>"/>
		</center></h2></td>
	</tr><tr>
		<td>Team Desc</td>
		<td style="color:#000;"><center><h5><input id="team_desc" type="text" name="team_desc" value="<?php echo $team_desc; ?>"/></h5></center></td>
	</tr><tr>
		<td>&nbsp;</td>
		<td><input class="btn btn-warning" type="submit" value="Save Team Info" name="Save" /></td>
		<td>&nbsp;</td>
	</tr>
</table>
</form>
<hr />
<form id="form2" name="fileform" action="apps/home/secretary/addfilesubmit_sec.php" enctype="multipart/form-data" method="post">
<table>
	<tr style="background-color : #eeeeee; border-top:solid 2px #fff;">
		<td style="width : 35%;">
			<input id="team_id" type="hidden" name="team_id" value="<?php echo $team_id; ?>" />
			<input style="width : 88%;" id="file_title" type="text" name="file_title" value="New File title" />
		</td>
		<td style="width : 60%;"><input id="file_desc" type="text" name="file_desc" value="New File Description" /></td>
		<td rowspan="2"> <input class="btn btn-warning" type="submit" value="+" name="Update" /> </td>
	</tr><tr style="background-color : #eeeeee;">
		<td colspan="3"> <input id="file_name" type="file" name="file_name" /> </td>
	</tr>
</form>
	<?php 
		while ($row = mysql_fetch_row($result, MYSQL_ASSOC)) {
			echo "
			<tr style='background-color:#eeeeee; border-top:solid 2px #fff;'>
				<td style='width : 35%; border-left:solid 2px #fff; border-right:solid 2px #fff;'>".$row['file_title']."(".$row['date_report'].")</td>
				<td style='width : 60%; border-left:solid 2px #fff; border-right:solid 2px #fff;'>".$row['file_desc']."</td>
				<td style=' border-left:solid 2px #fff; border-right:solid 2px #fff;'> <a href='files/teams/".$row['file_name']."'><i class='icon-download'></i></a> </td>
			</tr>";
		}
	?>
</table>
