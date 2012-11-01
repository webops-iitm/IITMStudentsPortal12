<div id = "profile" class="row-fluid">
<?php
	include("home.php");

	if($loggedin==1)
	{
		include("apps/home/profile.php");
	}
	else
	{
		include("apps/home/login.php");
	}
?>
</div>