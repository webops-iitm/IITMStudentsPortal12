<?php

	session_start();
	include ('../../../db.php');
	
	$uname = $_SESSION['uname'];
	$uname = strtolower($uname);
	$user = $uname;
	$team_id = $_POST['team_id'];
	$file_title = $_POST['file_title'];
	$file_desc = $_POST['file_desc'];
	if( ! isset($_FILES['file_name']) ) 
		die( "Error : No document uploaded.");
	$file_name = $team_id.$_FILES['file_name']['name'];
	$file_temp = $_FILES['file_name']['tmp_name'];
	$datetime = date("Y-m-d H:i:s");
	
	if ( ! is_writable("../../../files/teams/") )
		die("Folder is not writable : files/teams/ ");
	move_uploaded_file($file_temp, "../../../files/teams/".$file_name);
	
	$sql = "INSERT INTO stu_sec_files (team_id, file_title, file_name, file_desc, date_report) VALUES ('$team_id', '$file_title', '$file_name', '$file_desc', '$datetime');";
	
	mysql_query($sql) or die(mysql_error($con));
	header('Location: ../../../index.php');
	mysql_close($con);	
?>
