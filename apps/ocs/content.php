<?php
	include("../../db.php");
	
	session_start();
	if (isset($_COOKIE["user"]))
		$_SESSION['uname'] = $_COOKIE["user"];
		
	include("../../config.php");
	if($loggedin == 0)
		die("Please Login to continue");
		
	// check if first login
	$result_ocs = mysql_query("SELECT * FROM ocs_users WHERE user_id = $id ");
	if ( mysql_num_rows($result_ocs) > 0 ) { // logged in before
		$result_ocs_row = mysql_fetch_row($result_ocs);
		$ocs_pref_email = $result_ocs_row['email_notify'];
		$ocs_pref_sms = $result_ocs_row['sms_notify'];
		$result_ocs = 1;
		//die("EXISTING USER");
		include("new.php");
	} else {
		$result_ocs = 0;
		include("prefs.php");
		//die("NON-EXISTING USER"); 	
	}
	

?>
