<?php

include_once '../DBfunct.php';
include_once '../nDBfunct.php';
///////////// end of file includes

session_start();
///////////started the session

if (isset($_POST['ownerCourse'])) {
    getLatestNoticeNo(parseCSV($_POST['ownerCourse']));
}

?>
