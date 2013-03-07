<div id = "profile" class="row-fluid">
<?php

	if($_SESSION['submission']==1)
	{
	echo "<div id = 'successmsg'>";
		include("successmsg.php");
	echo "</div>";
	$_SESSION['submission']=0;
	}
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
