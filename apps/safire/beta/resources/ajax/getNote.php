<?php

include_once '../DBfunct.php';
include_once '../nDBfunct.php';
///////////// end of file includes

session_start();
///////////started the session

$noteCont = getNote($_SESSION['membInfo'][0]);

echo htmlspecialchars_decode($noteCont, ENT_QUOTES);
?>
