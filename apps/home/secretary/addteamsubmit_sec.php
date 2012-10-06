<?php

	session_start();
	include ('../../../db.php');
		
	$team_name = $_POST['team_name'];
	$team_desc = $_POST['team_desc'];
	$uname = $_SESSION['uname'];
	$uname = strtolower($uname);
	$user = $uname;
	
	$sql = "INSERT INTO stu_sec_teams (secretary_username, team_name, team_desc) VALUES ('$user', '$team_name', '$team_desc');";
	
	mysql_query($sql) or die(mysql_error($con));
	header('Location: ../../../index.php');
	mysql_close($con);	
?>
