<?php
	
	session_start();
	
	include ('../../db.php');
	include ('../../config.php');
	
	error_reporting(E_ALL);
	ini_set("display_errors",1);

	$uname = $_SESSION['uname'];
	$uname = strtolower($uname);
	$user = $uname;
	if( $_POST['email'] == "on" ) $ocs_pref_email = 1;
	else $ocs_pref_email = 0;
	if( $_POST['sms'] == "on" ) $ocs_pref_sms = 1;
	else $ocs_pref_sms = 0;
	
	$sql = "INSERT INTO ocs_users (user_id,email_notify,sms_notify) VALUES ($id,$ocs_pref_email,$ocs_pref_sms) ON DUPLICATE KEY UPDATE email_notify=$ocs_pref_email, sms_notify=$ocs_pref_sms;";
	mysql_query($sql) or die("DIED:".mysql_error($con));
	
	header('Location: ../../index.php');
	
	mysql_close($con);	
?>
