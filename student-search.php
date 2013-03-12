<?php
	include("db.php");

         session_start();
	
	if (isset($_COOKIE["user"]))
		$_SESSION['uname'] = $_COOKIE["user"];

	include("config.php");

	include("header.php");
	
	


       if (isset($_GET['userd']))
    {
	include("apps/students-search/show_profile.php");

   }
       else
    {
         include("apps/students-search/content.php");

        
    }


	include("footer.php");
?>