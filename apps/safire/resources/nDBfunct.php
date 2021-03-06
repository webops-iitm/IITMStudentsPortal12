<?php

$siteURL = "http://students2.iitm.ac.in/test/apps/safire";

function getTable($defText) {
    $table = "<table class=gridtable><tr><th>Day</th><th>1</th><th>2</th><th>3</th><th>4</th><th>5</th><th>6</th><th>7</th><th>8</th><th>9</th><th>10</th></tr><tr><td>&nbsp;</td><td>8:00-8:50</td><td>9:00-9:50</td><td>10:00-10:50</td><td>11:00-11:50</td><td>12:00-12:50</td><td>1:00-1:50</td><td>2:00-2:50</td><td>2:55-3:45</td><td>3:50-4:40</td><td>4:45-5:35</td></tr><tr class=\"dataRow\"><td class=\"days\">Monday</td><td class=\"canModCells\" id=\"mon1\">" . $defText . "</td><td class=\"canModCells\" id=\"mon2\">" . $defText . "</td><td class=\"canModCells\" id=\"mon3\">" . $defText . "</td><td class=\"canModCells\" id=\"mon4\">" . $defText . "</td><td class=\"canModCells\" id=\"mon5\"></td><td class=\"canModCells\" id=\"mon6\">" . $defText . "</td><td class=\"canModCells\" id=\"mon7\">" . $defText . "</td><td class=\"canModCells\" id=\"mon8\">" . $defText . "</td><td class=\"canModCells\" id=\"mon9\">" . $defText . "</td><td class=\"canModCells\" id=\"mon10\"></td></tr><tr class=\"dataRow\"><td class=\"days\">Tuesday</td><td class=\"canModCells\" id=\"tue1\">" . $defText . "</td><td class=\"canModCells\" id=\"tue2\">" . $defText . "</td><td class=\"canModCells\" id=\"tue3\">" . $defText . "</td><td class=\"canModCells\" id=\"tue4\">" . $defText . "</td><td class=\"canModCells\" id=\"tue5\"></td><td class=\"canModCells\" id=\"tue6\">" . $defText . "</td><td class=\"canModCells\" id=\"tue7\">" . $defText . "</td><td class=\"canModCells\" id=\"tue8\">" . $defText . "</td><td class=\"canModCells\" id=\"tue9\">" . $defText . "</td><td class=\"canModCells\" id=\"tue10\"></td></tr><tr class=\"dataRow\"><td class=\"days\">Wednesday</td><td class=\"canModCells\" id=\"wed1\">" . $defText . "</td><td class=\"canModCells\" id=\"wed2\">" . $defText . "</td><td class=\"canModCells\" id=\"wed3\">" . $defText . "</td><td class=\"canModCells\" id=\"wed4\">" . $defText . "</td><td class=\"canModCells\" id=\"wed5\"></td><td class=\"canModCells\" id=\"wed6\">" . $defText . "</td><td class=\"canModCells\" id=\"wed7\">" . $defText . "</td><td class=\"canModCells\" id=\"wed8\">" . $defText . "</td><td class=\"canModCells\" id=\"wed9\">" . $defText . "</td><td class=\"canModCells\" id=\"wed10\"></td></tr><tr class=\"dataRow\"><td class=\"days\">Thursday</td><td class=\"canModCells\" id=\"thu1\">" . $defText . "</td><td class=\"canModCells\" id=\"thu2\">" . $defText . "</td><td class=\"canModCells\" id=\"thu3\">" . $defText . "</td><td class=\"canModCells\" id=\"thu4\">" . $defText . "</td><td class=\"canModCells\" id=\"thu5\"></td><td class=\"canModCells\" id=\"thu6\">" . $defText . "</td><td class=\"canModCells\" id=\"thu7\">" . $defText . "</td><td class=\"canModCells\" id=\"thu8\">" . $defText . "</td><td class=\"canModCells\" id=\"thu9\">" . $defText . "</td><td class=\"canModCells\" id=\"thu10\"></td></tr><tr class=\"dataRow\"><td class=\"days\">Friday</td><td class=\"canModCells\" id=\"fri1\">" . $defText . "</td><td class=\"canModCells\" id=\"fri2\">" . $defText . "</td><td class=\"canModCells\" id=\"fri3\">" . $defText . "</td><td class=\"canModCells\" id=\"fri4\">" . $defText . "</td><td class=\"canModCells\" id=\"fri5\"></td><td class=\"canModCells\" id=\"fri6\">" . $defText . "</td><td class=\"canModCells\" id=\"fri7\">" . $defText . "</td><td class=\"canModCells\" id=\"fri8\">" . $defText . "</td><td class=\"canModCells\" id=\"fri9\">" . $defText . "</td><td class=\"canModCells\" id=\"fri10\"></td></tr></table>";
    return $table;
}

function parseCSV($input) {
    $output = explode(",", $input);
    array_pop($output);
    return $output;
}

function parseSql($input) {
    $output = explode("|::|", $input);
    array_pop($output);
    return $output;
}

function trueUserLoggedIn(){
    if (isset($_SESSION['uname']) && isset($_SESSION['membInfo'])) {
        if(strtoupper($_SESSION['uname']) == strtoupper($_SESSION['membInfo'][4])){//assuming the username is the same as rollnumber
            return true;
        }
        else{
            return false;
        }
    }
    else{
        return false;
    }
}

function pageInit() {
    global $siteURL;
    $optionsContent = null;
    echo "<div id=\"leftBar\">";
    if (trueUserLoggedIn()) {
        echo "<a id=\"help\" href=\"" . $siteURL . "/formality/help.php\" style=\"color: #999999;\">Help!</a>";
        echo "<p id=\"userName\" class=\"leftBar\"> " . $_SESSION['membInfo'][1] . " " . $_SESSION['membInfo'][2] . "</p>";
        $optionsContent = "<a href=\"../resources/logout.php\" class=\"options\">Logout</a><a id=\"displayerOpt\" href=\"../displayer/displayer.php\" class=\"options\">The Displayer</a><a id=\"editorOpt\" href=\"../manager/tableManager.php\" class=\"options\">Table Editor</a>";
    }
    echo "<div id=\"options\"><a href=\"http://students2.iitm.ac.in/\" class=\"options\">Student's Portal</a>" . $optionsContent . "</div>";
    echo "<a href=\"" . $siteURL . "/\"><img id=\"logo\" alt=\"\" src=\"" . $siteURL . "/resources/websiteImgs/logo1.png\"></a>";
    echo "<div id=\"footer\">All rights reserved ...blah, blah, blah... by Eddy Hudson<br><a href=\"" . $siteURL . "/formality/formality.php\">Privacy</a> <a href=\"" . $siteURL . "/formality/formality.php\">Contact Me</a> <a href=\"" . $siteURL . "/beta/\">Beta</a></div>";
    echo "</div>";
}

function authUserIllegal() {
    if (trueUserLoggedIn()) {
        //let the user proceed
    } else {
        $urlParts = explode("/",$_SERVER['PHP_SELF']);
        $noElmnts = count($urlParts);
        $_SESSION['redirLoc'] = $urlParts[$noElmnts - 2] . "/" . $urlParts[$noElmnts - 1];
        header('Location: ../');
        exit();
    }
}

function encodeSlashes($inputText) {
    $inputText = str_replace("/", "|@_#|", $inputText);
    $inputText = str_replace("\\", "|@-#|", $inputText);
    return $inputText;
}

function sendMail($content, $emailID, $recpFname, $courseCode, $alias, $postersFname) {
    if ($alias == "") {
        $courseDT = $courseCode;
    } else {
        $courseDT = $alias;
    }

    $message = "Hi " . $recpFname . ", \n \nA new notice has been posted to " . $courseDT . "'s notice board: \n \n" . $content . "\n \nRegards, \nSafire.";
    mail($emailID, "New notice posted", $message, "From: Safire<donotreply@students2.iitm.ac.in>");
}

?>
