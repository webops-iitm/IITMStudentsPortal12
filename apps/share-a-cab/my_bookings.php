<?php
session_start();
include"function.php";
$share = new ShareACab;
if (!$share->get_session()){
		die("Login to continue");
	}
$uname = $_SESSION['uname'];
$result = $share->my_bookings($uname);
while($row = mysql_fetch_assoc($result)){
	extract($row);
	include("htmlOutput.php");						
}
?>