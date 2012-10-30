<?php
include_once("db.php");
require_once dirname(__FILE__).'/plugins/jsConnectPHP/functions.jsconnect.php';;
$clientID = "2011690642";
$secret = "84b2303731d32e7de798f39ffaff8f89";

session_start();
$loggedin = 0;

if(isset($_SESSION['uname'])){
	$loggedin = 1;
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
		
	// Check if the user is in the student secretary database
	$result_sec = mysql_query("SELECT * FROM stu_sec WHERE username = '$username' ");
	$sec_count = mysql_num_rows($result_sec);
	$secretary = 0;
		
	if( $sec_count >= 1 ){
		$secretary = 1;
		$sec_row = mysql_fetch_array($result_sec);
		$post = $sec_row['post'];
		$tenure = $sec_row['tenure'];
		$hobbies = $sec_row['hobbies'];
		$form_email = $sec_row['form_email'];
		$disp_pic = $sec_row['pic'];
	}
}
	

//SSO Vanilla	
$user = array();
if ($loggedin) {
   $user['uniqueid'] = $id;
   $user['name'] = $name;
   $user['email'] = $email;
   $user['photourl'] = '';
}

$secure = true; 
WriteJsConnect($user, $_GET, $clientID, $secret, $secure);

?>