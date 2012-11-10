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
<style>
.table2 th, .table td
{
	border-top:1px solid rgb(200,200,200);
}	
</style>

<div style="float:left; margin-left:10px; min-height:260px; width:490px;" class="widget-contentsec" id="inner_body_sec">

<div class="widget-header" style="text-shadow:none; color:rgb(80,80,80); font-size:17px; font-weight:600;"><center><?php echo $team_name; ?></center></div>
	
	<center style="color:rgb(80,80,80); margin:10px;"><?php echo $team_desc; ?></center>

<table class="table table2">
	<tbody>
	<tr>
		<td colspan="3"></td>
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

	</tbody>
</table>
</div>
