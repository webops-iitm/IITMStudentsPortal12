<?php
	
	session_start();
	
	include ('../../db.php');
	
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
	
	$sql = "UPDATE users SET nick='$nick', contact = '$contact', email = '$email', bgroup = '$bgroup' WHERE username='$uname'";
	
	mysql_query($sql) or die(mysql_error($con));
	
	// echo $sql
	
	header('Location: ../../home.php');
	
	mysql_close($con);	
?>
