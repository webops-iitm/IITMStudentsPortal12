<?php
 include_once '../DBfunct.php'; session_start(); if (isset($_POST['emailID']) && isset($_POST['chosenTemplate'])) { $_SESSION['membInfo'] = createUser($_SESSION['uname'], $_POST['chosenTemplate'], $_POST['emailID']); } ?>
