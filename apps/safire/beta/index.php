<?php
include_once 'resources/DBfunct.php'; include_once 'resources/nDBfunct.php'; session_start(); if (trueUserLoggedIn()) { header('Location: displayer/displayer.php'); exit();} if (isset($_COOKIE["user"])) { $_SESSION['uname'] = $_COOKIE["user"]; } if (isset($_SESSION['uname'])) { $_SESSION['membInfo'] = retrieveMembInfo($_SESSION['uname']); if (!$_SESSION['membInfo']) { unset($_SESSION['membInfo']); $_SESSION['createUser'] = $_SESSION['uname']; header('Location: registerUser/registerUser.php'); exit(); } else { if(isset($_SESSION['redirLoc'])){ header('Location: ' . $_SESSION['redirLoc']); unset($_SESSION['redirLoc']); } else{ header('Location: displayer/displayer.php'); } exit(); } } ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Safire</title>
        <link href="resources/cryinMe.css" rel="stylesheet" type="text/css" />
        <link href="indexCSS.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php
 include_once "resources/googleAnalytics.php"; pageInit(); ?>
        <div id="mainPage">
            <div id="content">
                <img id="frontLogo" alt="" src="resources/websiteImgs/frontLogo1.png"><br>
                <p id="welcome">Welcome to Safire, a place where you can store your timetable and even print it!</p>
                <div id="welcomNotice">Please login from the student's portal(the link is on the left) and then access this site again.</div>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="resources/cryinMe.js"></script>
    <script type="text/javascript" src="indexJS.js"></script>
</html>
