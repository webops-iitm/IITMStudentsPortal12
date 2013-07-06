<?php
include_once '../resources/nDBfunct.php';
include_once '../resources/DBfunct.php';
///////////// end of file includes

session_start();
///////////started the session

authUserIllegal();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Table Editor</title>
        <link href="../resources/cryinMe.css" rel="stylesheet" type="text/css" />
        <link href="tableManager.css" rel="stylesheet" type="text/css" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <?php
        include_once "../resources/googleAnalytics.php"; 
        pageInit(); 
        ?>
        <div id="mainPage">
            <span id="whose">Your Table:</span>
            <div id="controlPanel">
                <div id="tableSettingsPage">
                    <div id="tableSettingsHeader">Table settings</div>
                    <table id="tableSettingsOpts">
                        <tbody>
                            <tr>
                                <td>
                                    <p>Choose a template to reset to:</p>
                                    <div id="resetter">
                                        <form id="resetForm" action="../resources/resetTable.php">
                                            <div id="blank" class="templateOptDiv">
                                                <input id="blankRadio" type="radio" name="template" value="blank"><p class="templateOpt">Blank</p>
                                            </div>
                                            <div id="mostCommon" class="templateOptDiv">
                                                <input id="mostCommonRadio" type="radio" name="template" value="mostCommon"><p class="templateOpt">Non 1st Year BTech/DD/MA</p>
                                            </div>
                                            <input id="tableReset" type="submit" value="Reset the table" disabled="disabled">
                                        </form>
                                    </div>
                                    <div id="templateShower">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> 
                <div id="tableSettings" class="controlPanelOpts" title="Settings">
                </div>
            </div>
            <div id="tableCont">
                <?php
                $table = getTable("");
                echo $table;
                ?>
            </div>
            <div id="lBlock">
                <div id="couOpts">
                    <div id="couOnly">
                        <div id="lunch" class="option">Lunch</div>
                        <?
                        $i = getNumbCourses($_SESSION['membInfo'][0]);
                        while ($i > 0) {
                            echo "<div class=\"option\"><img id=\"delCourse\" alt=\"\" title=\"Delete this Course\" src=\"../resources/websiteImgs/Delete-icon.png\" style=\"float: right; width: 10px; height: 0px; margin-top: 2px; margin-right: 30px; cursor: pointer;\"><div id=\"opt" . ($i - 1) . "\"></div></div>";
                            $i--;
                        }
                        ?>
                    </div>
                    <div id="ender">+ Add a Course</div>
                </div>
            </div>
            <div id="rBlock">
                <div id="controlDetEditor">
                    <table id="detEditor">
                        <tr><td>Title</td><td><div class="inputOverLayCont"><p id="titleOverLay" class="inputOverLay"></p></div><input id="title" name="title" type="text" value=""></td></tr>
                        <tr><td>Location</td><td><div class="inputOverLayCont"><p id="locationOverLay" class="inputOverLay"></p></div><input id="location" name="location" type="text" value=""></td></tr>
                        <tr><td>Alias</td><td><div class="inputOverLayCont"><p id="aliasOverLay" class="inputOverLay"></p></div><input id="alias" name="alias" type="text" value="optional"><img id="what" alt="" src="../resources/websiteImgs/what1.png"></td></tr>
                        <tr><td>Code</td><td><div class="inputOverLayCont"><p id="codeOverLay" class="inputOverLay"></p></div><input id="code" name="code" type="text" value=""></td></tr>
                    </table>
                    <div id="popupWhat">An alias for a course is something that's easier for you to recognize the course by. e.g: Physics for PH1010. This is optional.</div>
                    <div id="buttonCont">
                        <input id="saver" type="button" class="editOpts" value="Save all" disabled="disabled" ><input id="undoer" type="button" class="editOpts" value="Undo all" disabled="disabled" ><input id="creator" type="button" class="editOpts" value="Create" disabled="disabled" >
                    </div>
                    <div id="loadingInfo">
                        <img id="saving" alt="" src="../resources/websiteImgs/loading.gif">Saving...
                    </div>
                </div>
            </div>

        </div>
    </body>
    <script type="text/javascript" src="../resources/cryinMe.js"></script>
    <script type="text/javascript" src="tableManager.js"></script>
</html>
