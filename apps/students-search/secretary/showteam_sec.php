<?php
	include("../../../db.php");

	session_start();
	
	if (isset($_COOKIE["user"]))
		$_SESSION['uname'] = $_COOKIE["user"];
		
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
<table style="min-width:100%;">
	<tr style="min-width:100%;">
		<td colspan="3"><h2><center><?php echo $team_name; ?></center></h2></td>
	</tr><tr>
		<td colspan="3" style="color:#000; background-color:#ddd;"><center><h5><?php echo $team_desc; ?></h5></center></td>
	</tr><tr>
		<td colspan="3"><hr /></td>
	</tr>
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
