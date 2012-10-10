<?php
	include("../../../db.php");
	

	session_start();
	
	if (isset($_COOKIE["user"]))
		$_SESSION['uname'] = $_COOKIE["user"];
		
	include("../../../config.php");
	
	if($loggedin == 0)		
		die("Please Login to continue");
		
	$sql = "SELECT team_id, team_name FROM stu_sec_teams WHERE secretary_username='$user'";
	$result = mysql_query($sql);
?>

<form id="form" name="delform" action="apps/home/secretary/deleteteamsubmit_sec.php" method="post">
	<table>
		<tr>
			<td style="width:100px;"><a href="#">Team Name</a></td>
			<td>
				<select id="team_id" name="team_id">
					<?php
						while( $row = mysql_fetch_row($result, MYSQL_ASSOC) ) {
							echo( "<option value='".$row['team_id']."'> ".$row['team_name']." </option>" );
						}
					?>
				</select>
			</td>
		</tr><tr>
			<center>
				<td><a href="#"><input class="btn btn-warning" type="submit" value="Send" name="Send" /></a></td>
			</center>
		</tr>
	</table>
</form>

<script>
	function confirmDelete() {
		header('Location: apps/home/secretary/deleteteamsubmit_sec.php');
	}
</script>
