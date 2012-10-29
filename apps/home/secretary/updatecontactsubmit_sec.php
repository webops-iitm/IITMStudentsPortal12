<?php
	
	session_start();
	
	include ('../../../db.php');
	
	$uname = $_SESSION['uname'];
	$uname = strtolower($uname);
	$user = $uname;
	$form_email = $_POST['form_email'];
	
	$sql = "UPDATE stu_sec SET form_email='$form_email' WHERE username='$uname'";
	mysql_query($sql) or die(mysql_error($con));
		
	//echo $sql;
	header('Location: ../../../index.php');
	
	mysql_close($con);	
?>
