<?php

	session_start();
	include ('../../../db.php');
		
	$con_roll = $_POST['roll'];
	$con_nick = $_POST['nick'];
	$con_contact = $_POST['contact'];
	$con_email = $_POST['email'];
	$con_subj = $_POST['subj'];
	$con_desc = $_POST['desc'];
	$con_ip = $_SERVER['REMOTE_ADDR'];
	
	$con_sec_uname = "ep12b001"; // how do i get these ?
	$con_sec_email = "abdealikothari@gmail.com";
	$con_sec_nick = "AJK";
	
	$con_time = date("Y-m-d H:i:s");
	
	// body of mail to send
	$con_body = "Message for $con_sec_nick ($con_sec_uname) at the email id $con_sec_email.\r\n";
	$con_body .= "Message sent by $con_nick ($con_roll) from $con_email. Contact No. : $con_contact\r\n\r\n";
	$con_body .= $con_desc;
	
	// header for mail to send
	$con_header .= "From: \"".$con_nick."\" <".$con_email.">\n";
	$con_header .= "To: \"".$con_sec_nick."\" <".$con_sec_email.">\n";
	$con_header .= "Return-Path: <".$con_email.">\n";
	$con_header .= "MIME-Version: 1.0\n";
	$con_header .= "Content-Type: text/HTML; charset=ISO-8859-1\n"; 

	// send mail
	$con_sent = mail( "$con_sec_nick <$con_sec_email>", // to
						"StudentPortal Form : " . $con_subj, //subj
						$con_body, // body
						$con_header // header
					);
	if($con_sent) 
		$con_sent = '1';
	else 
		$con_sent = '0';
		
	$sql = "INSERT INTO stu_sec_contact (username, nick, contact, email, secretary_name, secretary_username, secretary_email, subject, description, time_sent, sent_success, ip) VALUES ('$con_roll', '$con_nick', '$con_contact', '$con_email', '$con_sec_nick', '$con_sec_uname', '$con_sec_email', '$con_subj', '$con_desc', '$con_time', '$con_sent', '$con_ip');";
	
	mysql_query($sql) or die(mysql_error($con));
	header('Location: ../../../index.php');
	mysql_close($con);	
?>
