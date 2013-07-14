<?php
include_once 'resources/DBfunct.php';
include_once 'resources/nDBfunct.php';
///////////// end of file includes

session_start();
///////////started the session

if (trueUserLoggedIn()) {//this code is here only to ensure that a user who already has the membinfo sess cookies doesn't have to get them all over again
    header('Location: displayer/displayer.php');
    exit();//because of this exit, don't have to add 'else'
}

//incase the student has clicked on 'keep me logged in' and returns to safire directly
if (isset($_COOKIE["user"])) {
    $_SESSION['uname'] = $_COOKIE["user"];
}
//incase the student has logged on the the portal and then to safire directly
if (isset($_SESSION['uname'])) {
    $_SESSION['membInfo'] = retrieveMembInfo($_SESSION['uname']);
    if (!$_SESSION['membInfo']) {
        unset($_SESSION['membInfo']);
        $_SESSION['createUser'] = $_SESSION['uname'];
        header('Location: registerUser/registerUser.php');
        exit();
    } else {
        if(isset($_SESSION['redirLoc'])){
            header('Location: ' . $_SESSION['redirLoc']);
            unset($_SESSION['redirLoc']);
        }
        else{
            header('Location: displayer/displayer.php');
        }
        exit();
    }
}

//in all the previous if stmts, you can't bring the session[membInfo] part out, since that will lead to a security loop-hole, the membInfo session var isn't deleted by the other parts of the portal.
?>
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
        include_once "resources/googleAnalytics.php";
        pageInit();
        ?>
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
