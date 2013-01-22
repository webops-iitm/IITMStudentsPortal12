<?php
	include("db.php");
	
	session_start();
	
	if (isset($_COOKIE["user"]))
		$_SESSION['uname'] = $_COOKIE["user"];

	include("config.php");

	include("header.php");
	include("apps/share-a-cab/content.php");
	include("footer.php");
	
	
?>