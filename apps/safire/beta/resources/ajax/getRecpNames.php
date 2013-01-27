<?php
include_once '../DBfunct.php'; include_once '../nDBfunct.php'; session_start(); if (isset($_POST['courseCode'])) { echo getNoticeRecps($_POST['courseCode']); } ?>
