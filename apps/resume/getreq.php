<?php

//header('Content-type: application/json');

session_start();
$usname = stripslashes($_SESSION['uname']);

$usname = strtoupper($usname);


include("../../db.php");



$query = "select * from users,categories,student_profile where categories.admin = '".$usname."' && categories.id = student_profile.cat_id && student_profile.status = 2 && UPPER(student_profile.username) = UPPER(users.username)" ;

 $numresults=mysql_query($query);
  
 $numrows=mysql_num_rows($numresults);
 
 $i = 0 ;
 
 while($row = mysql_fetch_array($numresults))
  {
	$details[$i][0] =  $row['fullname'] ;
	$details[$i][1] =  $row['username'] ;
	$details[$i][2] =  $row['hostel'] ;
	$details[$i][3] =  $row['desc'] ;
	$details[$i][4] =  $row['name'] ;
	$details[$i][5] =  $row['cat_id'] ;
	$details[$i][6] =  $row['title'] ;
	$details[$i][7] =  $row['id'] ;
	$details[$i][8] =  $row['title_id'] ;
	
	$i++ ;
  }
  
  
 print json_encode($details) ;
 


?>