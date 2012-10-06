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
	$dpic = $_FILES['dpic'];
	$fname = $user.$dpic["name"];
	// upload pic first
	move_uploaded_file($dpic["tmp_name"], "files/secretary/".$fname);

	$sql = "UPDATE users SET nick='$nick', contact = '$contact', email = '$email' WHERE username='$uname'";
	
	mysql_query($sql) or die(mysql_error($con));
	
	// echo $sql
	$post = $_POST['post'];
	$tenure = $_POST['tenure'];
	$hobbies = $_POST['hobbies'];
	$sql = "UPDATE stu_sec SET post='$post', tenure='$tenure', hobbies='$hobbies', pic='$fname' WHERE username='$uname'";
	mysql_query($sql) or die(mysql_error($con));
		
	//echo $sql;
	header('Location: ../../../index.php');
	
	mysql_close($con);	
?>
