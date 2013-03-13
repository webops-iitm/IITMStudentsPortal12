<div id = "profile" class="row-fluid">
<?php
	if($_GET['edit']!=0 || $_GET['delete']!=0)
	include("apps/profileplus/errors.php");
	else
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