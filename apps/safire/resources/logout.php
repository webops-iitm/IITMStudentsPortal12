<?php
session_start();
session_destroy();//this destroys the session cookie
setcookie("user", "", time() - 60, "/");
header('Location: ../index.php');
exit();
?>
