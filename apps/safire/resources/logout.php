<?php
session_start();
session_destroy();
setcookie("user", "", time() - 60, "/");
header('Location: ../index.php');
exit();
?>
