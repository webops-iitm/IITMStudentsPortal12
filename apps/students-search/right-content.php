<?php
	

	if(isset($_SESSION['uname']))
	{
		include("../home/profile.php");
	}
	else
	{
		include("login.php");
	}
?>
