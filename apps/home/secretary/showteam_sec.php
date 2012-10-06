<?php
	session_start();
	include ('../../../db.php');
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
<table>
	<tr>
		<td colspan="3"><h3><?php echo $team_name; ?></h3></td>
	</tr><tr>
		<td colspan="3"><?php echo $team_desc; ?></td>
	</tr><tr>
		<td style="width : 40%">TeamName</td>
		<td style="width : 55%">Team Desc. Thsi may get a bit long</td>
		<td> Down </td>
	</tr>
</table>
