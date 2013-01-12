<?php
include_once '../resources/nDBfunct.php';
include_once '../resources/DBfunct.php';
///////////// end of file includes

session_start();
///////////started the session
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Help!</title>
        <link href="../resources/cryinMe.css" rel="stylesheet" type="text/css" />
        <link href="help.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php
        include_once "../resources/googleAnalytics.php";
        pageInit();
        ?>
        <div id="mainPage">
            <div id="helpContent">
                <h2>The Displayer</h2>
                <img class="helpImg" alt="" src="../resources/websiteImgs/displayer1.png">
                <table>
                    <tbody>
                        <tr>
                            <td class="red">(1) -</td><td>Click this to print your table.</td>
                        </tr>
                        <tr>
                            <td class="red">(2) -</td><td>This is a minimized form of the notice board that will display the 5 latest notices you have.</td>
                        </tr>
                    </tbody>
                </table>
                <h2>Notice Board</h2>
                To access this area, click the maximize button on the minimized notice board.
                <img class="helpImg" alt="" src="../resources/websiteImgs/noticeBoard1.png">
                <table>
                    <tbody>
                        <tr>
                            <td colspan="2">When you post a notice to one of your courses's notice board, everyone who has added that course (with the same course code) will be able to see it and will receive an email notification if they have enabled the option.</td>
                        </tr>
                        <tr>
                            <td class="red">(1) -</td><td>Click the settings icon to enable or disable email notifications.</td>
                        </tr>
                        <tr>
                            <td class="red">(2) -</td><td>When a new notice has been posted to one of the notice boards you are following, a green dot will appear here.</td>
                        </tr>
                    </tbody>
                </table>
                <h2>Table Editor</h2>
                Here is where you will be editing your timetable and managing your courses.
                <img class="helpImg" alt="" src="../resources/websiteImgs/tableManager1.png">
                <table>
                    <tbody>
                        <tr>
                            <td class="red">(1) - </td><td>Click this to add a new course.</td>
                        </tr>
                        <tr>
                            <td class="red">(2) - </td><td>Hover over a created course and click on the delete icon which appears, to delete that course.</td>
                        </tr>
                        <tr>
                            <td class="red">(3) - </td><td>Click on an already created course to edit it's details. Once clicked, the slots occupied by this course on the table will get a green decoration. Click a slot without the decoration to make the course occupy that slot. Clicking a slot with the decoration will convert that slot into a free slot.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="../resources/cryinMe.js"></script>
    <script type="text/javascript" src="help.js"></script>
</html>
