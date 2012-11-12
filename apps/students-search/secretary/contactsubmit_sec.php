<?php
  $send_mail = 1;

	session_start();
	include ('../../../db.php');
		
  // sender info
	$con_roll = $_POST['roll'];
	$con_nick = $_POST['nick'];
	$con_contact = $_POST['contact'];
	$con_email = $_POST['email'];
	$con_subj = $_POST['subj'];
	$con_desc = $_POST['desc'];
	$con_sec_userd = $_POST['userd'];
	$con_ip = $_SERVER['REMOTE_ADDR'];
	
	// info of secretary to send to
	query = "select * from users where username = \"$var\" order by fullname";
  $numresults=mysql_query($query);
  $row = mysql_fetch_array($numresults);
  $con_sec_nick=$row['nick'];
  $result_sec = mysql_query("SELECT * FROM stu_sec WHERE upper(username) like \"%$con_sec_userd%\" ");
	$sec_count = mysql_num_rows($result_sec);
	$sec_row = mysql_fetch_array($result_sec);
	$con_sec_uname = $sec_row['username'];
	$con_sec_email = $sec_row['form_email'];
	
	$con_time = date("Y-m-d H:i:s");
	
	if( isset($send_mail) ) {
    if ($send_mail == 1 ) {
      // body of mail to send
      $con_body = "Message for $con_sec_nick ($con_sec_uname) at the email id $con_sec_email.\r\n";
      $con_body .= "Message sent by $con_nick ($con_roll) from $con_email. Contact No. : $con_contact\r\n\r\n";
      $con_body .= $con_desc;
    }
  }
	
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
  } else {
    $con_sent = '2'; // you asked me not to send
  }
	if($con_sent) 
		$con_sent = '1'; // send successfully
	else 
		$con_sent = '0'; // error, not sent
		
	$sql = "INSERT INTO stu_sec_contact (username, nick, contact, email, secretary_name, secretary_username, secretary_email, subject, description, time_sent, sent_success, ip) VALUES ('$con_roll', '$con_nick', '$con_contact', '$con_email', '$con_sec_nick', '$con_sec_uname', '$con_sec_email', '$con_subj', '$con_desc', '$con_time', '$con_sent', '$con_ip');";
	
	mysql_query($sql) or die(mysql_error($con));
	header('Location: ../../../index.php');
	mysql_close($con);	
?>
