<?php
	include("db.php");
	

	session_start();
	
	if (isset($_COOKIE["user"]))
	
  	$_SESSION['uname'] = $_COOKIE["user"];

	include("config.php");

	include("header.php");
	
	echo "<div id = 'profile' class='row-fluid'>";
	
	include("apps/home/support_form.php");
	
	echo "</div>";
	
	include("footer.php");
?>