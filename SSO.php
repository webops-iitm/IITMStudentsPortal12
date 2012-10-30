<?php
require_once dirname(__FILE__).'/plugins/jsConnectPHP/functions.jsconnect.php';;
$clientID = "2011690642";
$secret = "84b2303731d32e7de798f39ffaff8f89";

include_once("db.php");
include_once("config.php");

$sso_user = array();
if ($loggedin) {
   $sso_user['uniqueid'] = $id;
   $sso_user['name'] = $name;
   $sso_user['email'] = $email;
   $sso_user['photourl'] = '';
}

$secure = true; 
WriteJsConnect($sso_user, $_GET, $clientID, $secret, $secure);

?>