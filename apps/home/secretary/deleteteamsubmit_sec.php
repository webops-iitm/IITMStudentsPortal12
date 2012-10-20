<?php
	
	session_start();
	include ('../../../db.php');
	
	$uname = $_SESSION['uname'];
	$uname = strtolower($uname);
	$user = $uname;
	$team_id = $_POST['team_id'];
	
	$sql = "DELETE FROM stu_sec_teams WHERE team_id = $team_id;";
	mysql_query($sql) or die(mysql_error($con));
	
	$sql = "DELETE FROM stu_sec_files WHERE team_id = $team_id;";
	mysql_query($sql) or die(mysql_error($con));
		
	//echo $sql;
	header('Location: ../../../index.php');
	
	mysql_close($con);	
?>
