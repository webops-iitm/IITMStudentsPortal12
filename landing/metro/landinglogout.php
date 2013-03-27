<?php

session_start();

setcookie("user", "", time()-120);
unset($_SESSION['uname']);

header('Location:index.php');
?>