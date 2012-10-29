<?php

	session_start();
	include ('../../../db.php');
	
	$team_id = $_POST['team_id'];
	$team_name = $_POST['team_name'];
	$team_desc = $_POST['team_desc'];
	$uname = $_SESSION['uname'];
	$uname = strtolower($uname);
	$user = $uname;
	
	$sql = "UPDATE stu_sec_teams SET team_name='$team_name', team_desc='$team_desc' WHERE secretary_username='$user' AND team_id='$team_id';";
	
	mysql_query($sql) or die(mysql_error($con));
	header('Location: ../../../index.php');
	mysql_close($con);	
?>
