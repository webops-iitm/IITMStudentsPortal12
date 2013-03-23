<?php

$a = json_decode($_POST['h']) ;


session_start();


include("../../db.php");


for ($i = 0 ; $i < sizeof($a[0]) ; $i++)
{


$query = "DELETE from student_profile where status = 1 && UPPER(username) = '".strtoupper($a[0][$i][0])."' && cat_id = ".$a[0][$i][1] ." && title_id = ".$a[0][$i][3];

 $numresults=mysql_query($query);
 
$query = " UPDATE student_profile SET status=1 , message='".$a[0][$i][2]."'
WHERE UPPER(username) = '".strtoupper($a[0][$i][0])."' && cat_id = ".$a[0][$i][1] ." && title_id = ".$a[0][$i][3];

$numresults=mysql_query($query);




}

for ($i = 0 ; $i < sizeof($a[1]) ; $i++)
{


$query = "DELETE from student_profile where status = 3 && UPPER(username) = '".strtoupper($a[1][$i][0])."' && cat_id = ".$a[1][$i][1]." && title_id = ".$a[1][$i][3] ;

 $numresults=mysql_query($query);
 
$query = " UPDATE student_profile SET status=3 , message='".$a[1][$i][2]."'
WHERE UPPER(username) = '".strtoupper($a[1][$i][0])."' && cat_id = ".$a[1][$i][1] ." && title_id = ".$a[1][$i][3];

$numresults=mysql_query($query);




}




?>