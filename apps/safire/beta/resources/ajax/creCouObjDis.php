<?php

include_once '../DBfunct.php';
include_once '../nDBfunct.php';
///////////// end of file includes

session_start();
///////////started the session

getCou4displayer($_SESSION['membInfo'][0]);
?>
