<?php

include_once '../DBfunct.php';
///////////// end of file includes

session_start();
///////////started the session

if (isset($_POST['emailID']) && isset($_POST['chosenTemplate'])) {
   $_SESSION['membInfo'] = createUser($_SESSION['uname'], $_POST['chosenTemplate'], $_POST['emailID']);
}
?>
