<?php
	session_start();
	
	include ('../../db.php');
	$uname = 'name';
//	$uname = $_SESSION['uname'];
	$uname = strtolower($uname);
	$user = $uname;
	$prof=0;
	if( isset($_POST['name']) ){$name = mysql_real_escape_string(stripslashes($_POST['name']));$prof=1;}
	if( isset($_POST['nick']) )$nick = mysql_real_escape_string(stripslashes($_POST['nick']));
	if( isset($_POST['room']) )$room = mysql_real_escape_string(stripslashes($_POST['room']));
	if( isset($_POST['hostel']) )$hostel = mysql_real_escape_string(stripslashes($_POST['hostel']));
	if( isset($_POST['contact']) )$contact = mysql_real_escape_string(stripslashes($_POST['contact']));
	if( isset($_POST['email']) )$email = mysql_real_escape_string(stripslashes($_POST['email']));
    if( isset($_POST['bgroup']) )$bgroup = mysql_real_escape_string(stripslashes($_POST['bgroup']));
	
	echo $uname;
	
	if( isset($_FILES['dpic']) ) { // check for picture
		$dpic = $_FILES['dpic'];
		$disp_pic = $user.$dpic["name"];
		if ( $disp_pic != $user ) { // so as to not change when nothing was chosen
			//echo substr(sprintf('%o', fileperms("files")), -4) == "0774" ? "true" : "false";
			//die(fileperms("../../../files"));
			// upload pic first
			if ( ! is_writable("../../../files/profilepics/") )
				die("Folder is not writable : files/profilepics/ ");
			move_uploaded_file($dpic["tmp_name"], "../../../files/profilepics/".$disp_pic);
		}
	} else
		$dpic = 0;
	
	if($dpic != 0){ // put dpic in sql
		$sql = "UPDATE users SET pic='$disp_pic' WHERE username='$uname'";
		echo $sql;
		//die($sql);
		$query = mysql_query($sql);// or die(mysql_error($con));
		if(!$query)
		{
			echo "Your Request could not be submitted";		
		//	header('Location: ../../index.php?pic=2');
		}
		else
		{
		//	header('Location: ../../index.php?pic=2');		
			echo "<b>Your request has been successfully submitted</b>";
		}
	}

	if($prof==1)
	{
		$sqlprof = "UPDATE users SET nick='$nick', contact = '$contact', email = '$email', bgroup = '$bgroup' WHERE username='$uname'";	
	mysql_query($sqlprof) or die(mysql_error($con));
	
//	header('Location: ../../index.php?resumep=2');
	}
	
?>