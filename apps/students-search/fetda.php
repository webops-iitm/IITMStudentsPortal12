<?php

//header('Content-type: application/json');

session_start();

include("db.php");

$content = "" ;

if (isset($_SESSION['uname']))

  {
 if (isset($_GET['q']))
  {


  // Get the search variable from URL

  $var = @$_GET['q'] ;
  
  
  $var = strtoupper($var); //converting to uppercase
  $trimmed = trim($var) ; //trim whitespace from the stored variable
  
  
  


  
  
  
  
  // check for an empty string and display a message.
if ($trimmed == "")
  {
  $content = $content . "<p style='color:red;'>Please enter a search hint...</p>";
  print json_encode(array('cont' => $content, 'curr' => $_GET['tim']));
  
  exit;
  }
  




if ( $_GET['item'] == "students" )
{
 $query = "select * from users where upper(fullname) like \"%$trimmed%\" OR upper(nick) like \"%$trimmed%\" OR upper(username) like \"%$trimmed%\" OR upper(hostel) like \"%$trimmed%\" OR upper(room) like \"%$trimmed%\" 
order by fullname"; 
}

if ( $_GET['item'] == "courses" )
{
 $query = "select * from courses where upper(name) like \"%$trimmed%\" OR upper(number) like \"%$trimmed%\" OR upper(prof) like \"%$trimmed%\" 
order by name"; 
}


if ( $_GET['item'] == "news" )
{
 $query = "select * from news where upper(email) like \"%$trimmed%\" OR upper(subject) like \"%$trimmed%\" OR upper(body) like \"%$trimmed%\" 
order by date DESC "; 
}


  $numresults=mysql_query($query);
  
 $numrows=mysql_num_rows($numresults);
 $content = $content . "<h4 style='text-shadow:none;' >Search results for &quot;".$trimmed."&quot;</h4>";
 if ($numrows == 0)
  {
  
  $content = $content . "<p style='color:red;'>Sorry, your search &quot;" . $trimmed . "&quot; returned no results</p>";
  
  print json_encode(array('cont' => $content, 'curr' => $_GET['tim']));
  exit;
  }
  
  
  if ( $_GET['item'] == "students" )
  {
  $content = $content . "<table border='1' cellpadding='5' style='background:white;border:10px solid #E9E9E9 ;' align='center' >
<tr>
<th>Name</th>
<th>Nick</th>
<th>Roll No</th>
<th>Hostel</th>
<th>Room No</th>
</tr>";

while($row = mysql_fetch_array($numresults))
  {
  $content = $content . "<tr>";
  $content = $content . "<td> <a href='student-search.php?userd=".$row['username']."' >"  . $row['fullname'] . "</a> </td>";
  $content = $content . "<td>" . $row['nick'] . "</td>";
  $content = $content . "<td>" . $row['username'] . "</td>";
  $content = $content . "<td>" . $row['hostel'] . "</td>";
  $content = $content . "<td>" . $row['room'] . "</td>";
  $content = $content . "</tr>";
  }
$content = $content . "</table>";
}

if ( $_GET['item'] == "courses" )
{
  $content = $content . "<table border='1' cellpadding='5' style='background:white;border:10px solid #E9E9E9 ;' align='center' >
<tr>
<th>Course name</th>
<th>Course ID</th>
<th>Faculty</th>

</tr>";

while($row = mysql_fetch_array($numresults))
  {
  $content = $content . "<tr>";
  $content = $content . "<td>" . $row['name'] . "</td>";
  $content = $content . "<td>" . $row['number'] . "</td>";
  $content = $content . "<td>" . $row['prof'] . "</td>";
  
  $content = $content . "</tr>";
  }
$content = $content . "</table>";



}


if ( $_GET['item'] == "news" )
{
  $content = $content . "<table border='1' cellpadding='5' style='background:white;border:10px solid #E9E9E9 ;' align='center' >
<tr>
<th>Author's email</th>
<th>Subject</th>
<th>Body</th>
<th>Date</th>
</tr>";

while($row = mysql_fetch_array($numresults))
  {
  $content = $content . "<tr>";
  $content = $content . "<td>" . $row['email'] . "</td>";
  $content = $content . "<td>" . $row['subject'] . "</td>";
  $content = $content . "<td>" . $row['body'] . "</td>";
  $content = $content . "<td>" . date('l dS \o\f F h:i A', $row['date']) . "</td>";
  $content = $content . "</tr>";
  }
$content = $content . "</table>";



}
mysql_close($con);



}









 }
   else {$content = $content . "<p style='color:red;'>Please login to search</p>";
   
   }

print json_encode(array('cont' => $content, 'curr' => $_GET['tim']));






?>