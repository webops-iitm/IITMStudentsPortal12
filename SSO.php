<?php
include_once("db.php");
require_once dirname(__FILE__).'/plugins/jsConnectPHP/functions.jsconnect.php';;
$clientID = "2011690642";
$secret = "84b2303731d32e7de798f39ffaff8f89";

session_start();
$signedIn = false;

	if(isset($_SESSION['uname']))
	{
		$signedIn = true;
		$username = $_SESSION['uname'];
		$result = mysql_query("SELECT * FROM users WHERE username = '$username' ");
		$row = mysql_fetch_assoc($result);
		$name = $row['fullname'];
		$nick = $row['nick'];
		$hostel = $row['hostel'];
		$room = $row['room'];
		$email = $row['email'];
		$contact = $row['contact'];
		$id = $row['id'];
	}
	
$user = array();

if ($signedIn) {
   // CHANGE THESE FOUR LINES.
   $user['uniqueid'] = $id;
   $user['name'] = $name;
   $user['email'] = $email;
   $user['photourl'] = '';
}

$secure = true; 
WriteJsConnect($user, $_GET, $clientID, $secret, $secure);

?>