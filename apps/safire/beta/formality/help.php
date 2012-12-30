<?php
include_once '../resources/nDBfunct.php'; include_once '../resources/DBfunct.php'; session_start(); ?>
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
 include_once "../resources/googleAnalytics.php"; pageInit(); ?>
        <div id="mainPage">
            <div id="helpContent">
                <h2>The Displayer</h2>
                <p>The displayer is where your timetable will be displayed. If you had edited a course in the Table Editor to span two or more consecutive slots, those slots will be merged here <span>(1)</span>. Clicking on any slot will bring up a pop up box that will display more information on that course <span>(2)</span>. If you click on a lunch slot or a null slot, you'll just see a blank pop up. This won't be of much use, for now. On the top right hand corner of the table's container you'll find a printer icon <span>(3)</span>. Clicking that will open a new window/tab where you can click a print button to print your timetable.</p>
                <img class="helpImg" alt="" src="../resources/websiteImgs/theDisplayerHelp.PNG">
                <h2>Table Editor</h2>
                <p>The slots in this page won't have the location of the course due to space constraints. The Table Editor is where you'll edit your table. Here, you can add new courses to your timetable, change the course title, etc. On the bottom left hand corner, you'll find a scroll box with the courses you have already added(if you've already added some) <span>(a)</span>. Below the list of courses you've added you'll find an entry in the scroll box which says "add a course" and on the top you'll find an entry for your lunch break. Clicking on any entry in the scroll box(pertaining to a course or the lunch break) will result in all the slots occupied by that course/your lunch break getting highlighted <span>(b)</span>. If you click on a slot that's not highlighted now, that slot will get highlighted. i.e: It will be occupied by the course under focus(or your lunch break). If you click on a slot that's highlighted you'll convert that slot into a null slot <span>(c)</span>. If you click on an entry pertaining to a course you've created, in addition to the respective slots being highlighted, an editor will be brought up on the bottom right hand of the page. Using the editor, you can edit the details of each course <span>(d)</span>. If you hover over an entry pertaining to a previously created course, you'll see the delete icon, pressing which will delete the corresponding course <span>(e)</span>. In addition to all this there'll be a "save all" button and an "undo all" button. "undo all" will undo all the changes that have been made since the last save while "save all" will save all the changes that have been made <span>(f)</span>. Lastly, there is the entry in the scroll box which you can click to create new courses. Clicking this entry will result in the already mentioned editor showing up <span>(g)</span>. After filling in the required text fields, all you have to do is press the "Create" button and create the course you want to create. This will result in the creation of an entry for this course in the scroll box. After clicking on this newly created entry, you'll have to click on the slots on the table during which you have this course. <br><br>In the top right hand side of the table container, you'll find an icon representing the table's settings. If you click it you'll see a dialog where you'll be able to reset your table. This is like a master reset <span>(h)</span>. This should only be used if you want to delete all the data you previously created or if there is a problem with your table.</p>
                <img class="helpImg" alt="" src="../resources/websiteImgs/tableEditorHelp.PNG">
            </div>
        </div>
    </body>
    <script type="text/javascript" src="../resources/cryinMe.js"></script>
    <script type="text/javascript" src="help.js"></script>
</html>
