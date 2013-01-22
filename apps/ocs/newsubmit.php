<?php
	
	session_start();
	
	include ('../../db.php');
	include ('../../config.php');
	
	error_reporting(E_ALL);
	ini_set("display_errors",1);

	$uname = $_SESSION['uname'];
	$uname = strtolower($uname);
	$user = $uname;
	
	$comp_name = $_POST['name'];
	$comp_roll = $_POST['roll'];
	$comp_contact = $_POST['contact'];
	$comp_email = $_POST['email'];
	$comp_cat = $_POST['category'];
	$comp_subj = $_POST['subj'];
	$comp_desc = $_POST['desc'];
	
	$sql = "INSERT INTO ocs_complaints (user_id,user_contact,user_email,complaint_sub,complaint_cat,complaint_desc) VALUES ($id,$comp_contact,$comp_email,$comp_cat,$comp_subj,$comp_desc)";
	mysql_query($sql) or die("DIED:".mysql_error($con));
	
	header('Location: ../../index.php?message="Sucessfully registered complaint"');
	
	mysql_close($con);	
?>
