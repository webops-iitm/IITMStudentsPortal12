<?php

include_once '../DBfunct.php';
include_once '../nDBfunct.php';
///////////// end of file includes

session_start();
///////////started the session

if (isset($_POST['queryUpdCourses']) && isset($_POST['queryCreCourses']) && isset($_POST['queryLunchNull']) && isset($_POST['queryDelCourses'])) {
    if (get_magic_quotes_gpc()) {
        $queryUpdCourses = stripslashes($_POST['queryUpdCourses']);
        $queryCreCourses = stripslashes($_POST['queryCreCourses']);
        $queryLunchNull = stripslashes($_POST['queryLunchNull']);
        $queryDelCourses = stripslashes($_POST['queryDelCourses']);

        $parsedQuery = parseSql($queryUpdCourses);
        updateCourses($parsedQuery);

        $parsedQuery = parseSql($queryCreCourses);
        createCourses($parsedQuery,$_SESSION['membInfo'][0]);

        updateLunchNull($queryLunchNull);

        $parsedQuery = parseSql($queryDelCourses);
        deleteCourses($parsedQuery);
    }
    else {
        $parsedQuery = parseSql($_POST['queryUpdCourses']);
        updateCourses($parsedQuery);
        $parsedQuery = parseSql($_POST['queryCreCourses']);
        createCourses($parsedQuery,$_SESSION['membInfo'][0]);
        updateLunchNull($_POST['queryLunchNull']);
        $parsedQuery = parseSql($_POST['queryDelCourses']);
        deleteCourses($parsedQuery);
    }
}
?>
