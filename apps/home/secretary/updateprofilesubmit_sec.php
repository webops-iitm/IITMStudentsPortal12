<?php
	
	session_start();
	
	include ('../../../db.php');
	
	$uname = $_SESSION['uname'];
	$uname = strtolower($uname);
	$user = $uname;
	$name = $_POST['name'];
	$nick = $_POST['nick'];
	$room = $_POST['room'];
	$hostel = $_POST['hostel'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	if( isset($_FILES['dpic']) ) {
		$dpic = $_FILES['dpic'];
		$disp_pic = $user.$dpic["name"];
	} else
		$dpic = 0;
	
	//echo substr(sprintf('%o', fileperms("files")), -4) == "0774" ? "true" : "false";
	//die(fileperms("../../../files"));
	// upload pic first
	if ( ! is_writable("../../../files/secretary/") )
		die("Folder is not writable : files/secretary/ ");
	if( $dpic != 0 ){
		move_uploaded_file($dpic["tmp_name"], "../../../files/secretary/".$disp_pic);
	}

	$sql = "UPDATE users SET nick='$nick', contact = '$contact', email = '$email' WHERE username='$uname'";
	
	mysql_query($sql) or die(mysql_error($con));
	
	// echo $sql
	$post = $_POST['post'];
	$tenure = $_POST['tenure'];
	$hobbies = $_POST['hobbies'];
	if( $dpic != 0 )
		$sql = "UPDATE stu_sec SET post='$post', tenure='$tenure', hobbies='$hobbies', pic='$disp_pic' WHERE username='$uname'";
	else
		$sql = "UPDATE stu_sec SET post='$post', tenure='$tenure', hobbies='$hobbies' WHERE username='$uname'";
	mysql_query($sql) or die(mysql_error($con));
		
	//echo $sql;
	header('Location: ../../../index.php');
	
	mysql_close($con);	
?>
