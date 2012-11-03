<?php
session_start();
include"function.php";

$share = new ShareACab;

if (!$share->get_session())
	{
		die("Login to continue");
	}
$uname = $_SESSION['uname'];
$result = $share->my_booking_requests($uname);
while($row = mysql_fetch_assoc($result)){
	extract($row);
	var_dump($row);
	//include("htmlOutput.php");						
}

?>