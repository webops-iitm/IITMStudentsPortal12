<?php
 include_once '../DBfunct.php'; include_once '../nDBfunct.php'; session_start(); if (isset($_POST['courseIDlist']) && isset($_POST['metaDataCSV'])) { setCouMetaData($_POST['courseIDlist'], $_POST['metaDataCSV'], $_SESSION['membInfo'][0]); } ?>
