<div id = "profile" class="row-fluid">
<?php

	echo "<div id = 'leftcontent'>";
		include("left-content.php");
	echo "</div>";

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
