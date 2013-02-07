



<div class="span8">
	<div id="widget" class="widget" style="width:800px; margin:10px; position:relative; top:0px; right:0px;">
		<div class="widget-header">
			<i class="icon-search"></i>
			<h3>Student search</h3>
		</div> <!-- /widget-header -->
		<div class="widget-content">						
			<div class="shortcuts">
Enter 'Name' or 'Nick' or 'Roll number' or 'Room number' or 'Hostel' or 'Course' or 'Course Id' or 'Faculty'
<br/>	<br/>  
<form name="form1" action="student-search.php" method="get">
  <table><tr><td><input type="text"  name="q" /></td><td><input style="position:relative;top:-4px;"class="btn btn-primary" type="submit" name="Submit" value="Search" /></td></tr>
  <tr><td><input type="radio" style="float:left" checked="checked" name="item" id="students" value="students"><label style="float:left" for ="students"> &nbsp; Students &nbsp; &nbsp;&nbsp;</label></input> <input type="radio" style="float:left" name="item" id="courses" value="courses"><label style="float:left" for ="courses"> &nbsp; Courses</label></input></td></tr>
  </table>
</form>






<?php

session_start();

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
  echo "<p style='color:red;'>Please enter a search hint...</p>";
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


  $numresults=mysql_query($query);
 $numrows=mysql_num_rows($numresults);
 echo "<h4 style='text-shadow:none;' >Search results</h4>";
 if ($numrows == 0)
  {
  
  echo "<p style='color:red;'>Sorry, your search &quot;" . $trimmed . "&quot; returned no results</p>";
  exit;
  }
  
  
  if ( $_GET['item'] == "students" )
  {
  echo "<table border='1' cellpadding='5' style='background:white;border:10px solid #E9E9E9 ;' align='center' >
<tr>
<th>Name</th>
<th>Nick</th>
<th>Roll No</th>
<th>Hostel</th>
<th>Room No</th>
</tr>";

while($row = mysql_fetch_array($numresults))
  {
  echo "<tr>";
  echo "<td> <a href='student-search.php?userd=".$row['username']."' >"  . $row['fullname'] . "</a> </td>";
  echo "<td>" . $row['nick'] . "</td>";
  echo "<td>" . $row['username'] . "</td>";
  echo "<td>" . $row['hostel'] . "</td>";
  echo "<td>" . $row['room'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
}

if ( $_GET['item'] == "courses" )
{
  echo "<table border='1' cellpadding='5' style='background:white;border:10px solid #E9E9E9 ;' align='center' >
<tr>
<th>Course name</th>
<th>Course ID</th>
<th>Faculty</th>

</tr>";

while($row = mysql_fetch_array($numresults))
  {
  echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['number'] . "</td>";
  echo "<td>" . $row['prof'] . "</td>";
  
  echo "</tr>";
  }
echo "</table>";



}
mysql_close($con);



}


include("db.php");






 }
   else {echo "<p style='color:red;'>Please login to search</p>";}


?>
<br/><br/>
			</div>	
		</div>
	</div>
</div>