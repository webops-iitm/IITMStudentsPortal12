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

	if(!$ldapLogin){
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
					setcookie("user", $uname, $expire);
				$_SESSION['uname'] = $uname;
				$_SESSION['uid'] = $row['id'];
				if(isset($_POST['tc_key'])) header("location:http://students2.iitm.ac.in/forum/?login=success");
				else header("location:index.php");
			
			}
		
			else
			{
				if(isset($_POST['tc_key'])) header("location:http://students2.iitm.ac.in/forum/?err=Username Password Mismatch");
				else header('Location: index.php?error=1');
			}
		}
		
		else
		{
				if(isset($_POST['tc_key'])) header("location:http://students2.iitm.ac.in/forum/?err=User Not Found");
				else header('Location: index.php?error=1');
		}
	}
	else{
		$sql="SELECT * FROM $tbl_name WHERE username='$uname'";
		$login = mysql_query($sql);	
		$row = mysql_fetch_array($login);
		include("ldaplogin.php");
	}
?>
