<?php
	

	if(isset($_SESSION['uname']))
	{
		include("profile.php");
	}
	else
	{
		include("login.php");
	}
?>