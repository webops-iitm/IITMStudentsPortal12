<?php
 include_once '../DBfunct.php'; include_once '../nDBfunct.php'; session_start(); if (isset($_POST['ownerCourse'])) { getLatestNoticeNo(parseCSV($_POST['ownerCourse'])); } ?>
