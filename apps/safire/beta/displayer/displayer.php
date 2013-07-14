<?php
include_once '../resources/nDBfunct.php';
include_once '../resources/DBfunct.php';
///////////// end of file includes

session_start();
///////////started the session

authUserIllegal();

$isFirstTime = false;
if (strpos($_SESSION['membInfo'][3], "newUser==") !== false) {
    $_SESSION['membInfo'][3] = str_replace("newUser==", "", $_SESSION['membInfo'][3]);
    changeUserMetaData($_SESSION['membInfo'][0], $_SESSION['membInfo'][3]);

    $isFirstTime = true;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Displayer</title>
        <link href="../resources/cryinMe.css" rel="stylesheet" type="text/css" />
        <link href="displayer.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php
        include_once "../resources/googleAnalytics.php";
        pageInit();
        ?>
        <div id="mainPageNoticeBoard"></div>
        <div id="mainPage">
            <?php
            if ($GLOBALS['isFirstTime']) {
                echo "<div id=\"mainPageOverlay\" class=\"overlayTranslucent\">";
                echo "<div id=\"welcomeNotice\">";
                echo "<p>Hi " . $_SESSION['membInfo'][1] . ", looks like it's your first time here. How about diving into the help section? You can access the help section anytime you're logged in by clicking the icon on the top left hand corner of the page you're in.</p>";
                echo "<input id=\"helpMeLater\" type=\"button\" value=\"I'll do it later\">";
                echo "<input id=\"helpMeNow\" type=\"button\" value=\"Go to the help section now\">";
                echo "</div>";
                echo "</div>";
            }
            ?>
            <div id="couInfVie"><div></div></div>
            <span id="whose">Your Table:</span>
            <div id="controlPanel"> 
                <div id="printer" class="controlPanelOpts" title="Print your table"></div>
            </div>
            <div id="tableCont">
                <?php
                $table = getTable("");
                echo $table;
                ?>
            </div>
            <div id="lBlock">
                <span id="padHead">Scratch Pad</span>
                <p id="noteSaving">Saving...</p>
                <p id="sPadInstr">Click here to add a note.</p>
                <div id="loadingInfo1">
                    <img id="loading1" alt="" src="../resources/websiteImgs/loading.gif">Downloading Note...
                </div>
                <textarea id="scratchPad" disabled="disabled"></textarea>
                <p id="scratchPadNotice">Max. 200 Characters, Currently 0 Characters</p>
            </div>
            <div id="rBlock">
                <span id="noticeHead">Notice Board</span>
                <div id="noticeControl">
                    <img id="newNotice" src="../resources/websiteImgs/newNotices.png" title="New Notice">
                    <div id="noticeRefresher" class="noticeControlOpts" title="Refresh"></div>
                    <div id="expander" class="noticeControlOpts" title="Expand"></div>
                </div>
                <div id="latestNoticeCont">
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="../resources/cryinMe.js"></script>
    <script type="text/javascript" src="displayer.js"></script>
</html>
