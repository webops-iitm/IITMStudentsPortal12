<?php
include_once '../resources/nDBfunct.php'; include_once '../resources/DBfunct.php'; session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Privacy and Contact Me</title>
        <link href="../resources/cryinMe.css" rel="stylesheet" type="text/css" />
        <link href="formality.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php
 include_once "../resources/googleAnalytics.php"; pageInit(); ?>
        <div id="mainPage">
            <h1>Contact Me</h1>
            <p>You can contact me at msneddyhudson@me.com.</p>
            <h1>Privacy</h1>
            <p>I use Google Analytics to keep track of the usage of the site. Here is the <a href="http://www.google.com/analytics/learn/privacy.html">privacy related page</a> from Google Analytics. As of now, the data you are sharing with Safire(about your courses) is just used to display your timetables on the Displayer for you and for letting you use the Notice Board. This data is stored in the same server housing the student's portal.</p>
        </div>
    </body>
    <script type="text/javascript" src="../resources/cryinMe.js"></script>
    <script type="text/javascript" src="formality.js"></script>
</html>
