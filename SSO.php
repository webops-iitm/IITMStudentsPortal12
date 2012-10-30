<?php
include_once("config.php");

require_once dirname(__FILE__).'/plugins/jsConnectPHP/functions.jsconnect.php';;
$clientID = "2011690642";
$secret = "84b2303731d32e7de798f39ffaff8f89";

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