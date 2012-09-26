<?php
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
	}
	else
	{
		$loggedin=0;
	}
?>