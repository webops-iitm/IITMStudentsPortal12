<?php
	session_start();
	
	include ('../../db.php');
//	$user = 'name';
	$uname = $_SESSION['uname'];
	$uname = strtolower($uname);
	$user = $uname;
	$name = $_POST['name'];
	$nick = $_POST['nick'];
	$room = $_POST['room'];
	$hostel = $_POST['hostel'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
    $bgroup = $_POST['bgroup'];
	
	echo $uname;
	echo "<br>";
	
	$sqlprof = "UPDATE users SET nick='$nick', contact = '$contact', email = '$email', bgroup = '$bgroup' WHERE username='$uname'";
	
	mysql_query($sqlprof) or die(mysql_error($con));
	header('Location: ../../index.php?resumep=2');
?>