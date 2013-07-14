<?php

include_once '../DBfunct.php';
include_once '../nDBfunct.php';
///////////// end of file includes

session_start();
///////////started the session

if (isset($_POST['courseIDlist']) && isset($_POST['metaDataCSV'])) {
    setCouMetaData($_POST['courseIDlist'], $_POST['metaDataCSV'], $_SESSION['membInfo'][0]);
}
?>
