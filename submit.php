<?php

	session_start();
	
	include ('db.php');
	
	$uname = $_POST['uname'];
	$pass = $_POST['pass'];
	$uname = stripslashes($uname);
	$pass = stripslashes($pass);
	$uname = mysql_real_escape_string($uname);
	$pass = mysql_real_escape_string($pass);
	$uname = strtolower($uname);
	
	$expire=time()+120;

	setcookie("user", "", $expire);

	$sql="SELECT * FROM $tbl_name WHERE username='$uname'";
	$login = mysql_query($sql);
	
	$count = mysql_num_rows($login);
	
	$pepper = "";

	if($count>=1)
	{
		$row = mysql_fetch_array($login);

		if(crypt($pass.$pepper, $row['encrypted_password']) == $row['encrypted_password'])
		{
			if($_POST['remember']==true)
			{
				setcookie("user", $uname, $expire);
			}
		$_SESSION['uname'] = $uname;
		header("location:index.php");
		
		}
	
		else
		{
			header('Location: index.php?error=1');
		}
	}
	
	else
	{
		header('Location: index.php?error=1');
	}
?>