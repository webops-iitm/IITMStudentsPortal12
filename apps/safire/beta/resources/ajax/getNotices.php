<?php

include_once '../DBfunct.php';
include_once '../nDBfunct.php';
///////////// end of file includes

session_start();
///////////started the session

if (isset($_POST['ownerCourse']) && isset($_POST['noRecords']) && isset($_POST['startingNo'])) {
    if (strlen($_POST['ownerCourse']) < 8) {
        getNoticesObjs($_POST['ownerCourse'],$_POST['noRecords'],$_POST['startingNo']);
    } else {
        getAllCouNoticeObjs(parseCSV($_POST['ownerCourse']),$_POST['noRecords'],$_POST['startingNo']);
    }
}
?>
