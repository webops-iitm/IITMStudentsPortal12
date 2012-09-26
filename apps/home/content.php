<div id = "profile" class="row-fluid">
<?php
	include("left-content.php");

	if($loggedin==1)
	{
		include("profile.php");
	}
	else
	{
		include("login.php");
	}
?>
</div>