<?php
	
	session_start();
	
	include ('../../db.php');
	
	$uname = $_SESSION['uname'];
	$uname = strtolower($uname);
	$name = $_POST['name'];
	$nick = $_POST['nick'];
	$room = $_POST['room'];
	$hostel = $_POST['hostel'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	
	echo $uname;
	echo "<br>";
	
	$sql = "UPDATE users SET nick='$nick', contact = '$contact', email = '$email' WHERE username='$uname'";
	
	mysql_query($sql) or die(mysql_error($con));
	
	//echo $sql;
	
	header('Location: ../../index.php');
	
	mysql_close($con);	
?>
