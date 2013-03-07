<?php
	error_reporting(0);
	$loggedin = 0;
	
	if(isset($_SESSION['uname']))
	{
		$loggedin=1;
		$user = $_SESSION['uname'];
		$result = mysql_query("SELECT * FROM users WHERE username = '$user' ");
		$row = mysql_fetch_array($result);
		$name = $row['fullname'];
		$nick = $row['nick'];
		$hostel = $row['hostel'];
		$room = $row['room'];
		$email = $row['email'];
		$contact = $row['contact'];
		$id = $row['id'];
		$bgroup = $row['bgroup'];
		
		// Check if the user is in the student secretary database
		$result_sec = mysql_query("SELECT * FROM stu_sec WHERE username = '$user' ");
		$sec_count = mysql_num_rows($result_sec);
		$secretary = 0;
		$disp_pic=0;
		if( $sec_count >= 1 ) 
		{
			$secretary = 1;
			$sec_row = mysql_fetch_array($result_sec);
			$post = $sec_row['post'];
			$tenure = $sec_row['tenure'];
			$hobbies = $sec_row['hobbies'];
			$form_email = $sec_row['form_email'];
			$disp_pic = $sec_row['pic'];
			$manifesto = $sec_row['manifesto'];
		}
		
		// Check if the user is in the student election database
		$nresult_sec = mysql_query("SELECT * FROM election2013 WHERE username = '$user' ");
		$sec_count = mysql_num_rows($nresult_sec);
		$nsecretary = 0;
		$ndisp_pic=0;
		if( $sec_count >= 1 ) 
		{
			$nsecretary = 1;
			$nsec_row = mysql_fetch_array($nresult_sec);
			$nhost = $nsec_row['hostelelec'];
			$ninsti = $nsec_row['instielec'];
			$nwriteup = $nsec_row['manifestowriteup'];
			$nform_email = $nsec_row['form_email'];
			$ndisp_pic = $nsec_row['pic'];
			$nmanifesto = $nsec_row['manifesto'];
		}
	}
?>
