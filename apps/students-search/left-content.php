



<div class="span8">
	<div id="widget" class="widget" style="width:800px; margin:10px; position:relative; top:0px; right:0px;">
		<div class="widget-header">
			<i class="icon-search"></i>
			<h3>Student search</h3>
		</div> <!-- /widget-header -->
		<div class="widget-content">						
			<div class="shortcuts">
Enter 'Name' or 'Nick' or 'Roll number' or 'Room number' or 'Hostel'
<br/>	<br/>  
<form name="form1" action="student-search.php" method="get">
  <table><tr><td><input type="text"  name="q" /></td><td><input style="position:relative;top:-4px;"class="btn btn-primary" type="submit" name="Submit" value="Search" /></td></tr>
  
  <tr><td></td><td><a class="showadv" href="#"><i class="advic icon-plus-sign"></i> Advanced Search</a><td></tr></table>
</form>








<form  style="display:none;" class="adv" name="form2" action="student-search.php" method="get">
<table style="border-top:1px solid black ;">
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td><td>Atleast one search hint is necessary</td></tr>
<td></tr><tr><td>&nbsp;</td><td>&nbsp;</td>
<tr>
<td>
Name
</td>

<td>
<input type="text" name="a" />
</td>
</tr>

<tr>
<td>
Nick
</td>

<td>
<input type="text" name="b" />
</td>
</tr>

<tr>
<td>
Roll
</td>
<td>
<input type="text" name="c" />
</td>
</tr>


<tr>
<td>
Hostel
</td>

<td>
<select name="d">
<option value="" selected="selected" >Select</option>
<option value="Alakananda">Alakananda</option>
<option value="Brahmaputra">Brahmaputra</option>
<option value="Cauvery">Cauvery</option>
<option value="Ganga">Ganga</option>
<option value="Godavari">Godavari</option>
<option value="Jamuna">Jamuna</option>
<option value="Krishna">Krishna</option>
<option value="Mahanadhi">Mahanadhi</option>
<option value="Mandakini">Mandakini</option>
<option value="Narmada">Narmada</option>
<option value="Saraswathi">Saraswathi</option>
<option value="Sarayu">Sarayu</option>
<option value="Sharavati">Sharavati</option>
<option value="Sindhu">Sindhu</option>
<option value="Tapti">Tapti</option>
<option value="Tamraparani">Tamraparani</option>






</select>
</td>
</tr>

<tr>
<td>
Room No: 
</td>

<td>
<input type="text" name="e" />
</td>
</tr>



<tr>
<td>
&nbsp;
</td>
<td>
<input class="btn btn-primary" type="submit" name="Submit" value="Search" />
</td>
</tr>

</table>

<input type="hidden" name="searching" value="yes" />
</form>

<script src="js/jquery-1.js"></script>
<script> 
$(document).ready(function(){

   var a=0;

$(".showadv").click(function(){

if(a==0)
{

  $(".adv").css("display","inline");
  $(".advic").removeClass("icon-plus-sign");
  $(".advic").addClass("icon-minus-sign");
  a=1;
} 
 else
{
   $(".adv").css("display","none");
   $(".advic").removeClass("icon-minus-sign");
   $(".advic").addClass("icon-plus-sign");
   a=0;
}
 

}); 
 
});
</script>




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
  






 $query = "select * from users where upper(fullname) like \"%$trimmed%\" OR upper(nick) like \"%$trimmed%\" OR upper(username) like \"%$trimmed%\" OR upper(hostel) like \"%$trimmed%\" OR upper(room) like \"%$trimmed%\" 
 
  order by fullname"; 
  $numresults=mysql_query($query);
 $numrows=mysql_num_rows($numresults);
 echo "<h4 style='text-shadow:none;' >Search results</h4>";
 if ($numrows == 0)
  {
  
  echo "<p style='color:red;'>Sorry, your search &quot;" . $trimmed . "&quot; returned no results</p>";
  exit;
  }
  
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

mysql_close($con);



}


include("db.php");




 if (isset($_GET['searching']))
  {


  // Get the search variable from URL

  $var1 = @$_GET['a'] ;
  $var2 = @$_GET['b'] ;
  $var3 = @$_GET['c'] ;
  $var4 = @$_GET['d'] ;
  $var5 = @$_GET['e'] ;
  
  
  $var1 = strtoupper($var1); //converting to uppercase
  $trimmed1 = trim($var1) ; //trim whitespace from the stored variable
  
  
  $var2 = strtoupper($var2); //converting to uppercase
  $trimmed2 = trim($var2) ; //trim whitespace from the stored variable
  
  $var3 = strtoupper($var3); //converting to uppercase
  $trimmed3 = trim($var3) ; //trim whitespace from the stored variable
  
  
  $var4 = strtoupper($var4); //converting to uppercase
  $trimmed4 = trim($var4) ; //trim whitespace from the stored variable
  
  $var5 = strtoupper($var5); //converting to uppercase
  $trimmed5 = trim($var5) ; //trim whitespace from the stored variable
  
  
  
  


  
  
  
  
  // check for an empty string and display a message.
if ($trimmed1 == "" && $trimmed2 == "" && $trimmed3 == "" && $trimmed4 == "" && $trimmed5 == "")
  {
  echo "<p style='color:red;'>Please enter atleast one search hint...</p>";
  exit;
  }
  
  






 $query = "select * from users where upper(fullname) like \"%$trimmed1%\" AND upper(nick) like \"%$trimmed2%\" AND upper(username) like \"%$trimmed3%\" AND upper(hostel) like \"%$trimmed4%\" AND upper(room) like \"%$trimmed5%\" 
 
  order by fullname"; 
  $numresults=mysql_query($query);
 $numrows=mysql_num_rows($numresults);
 
 
 echo "<h4 style='text-shadow:none;'>Search results</h4>";
 
 if ($numrows == 0)
  {
  
  echo "<p style='color:red;'>Sorry, your search returned no results</p>";
  exit;
  }
  
  echo "<table border='1' cellpadding='5' style='background:white;border:10px solid #E9E9E9 ;' align='center'>
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

mysql_close($con);



}

 }
   else {echo "<p style='color:red;'>Please login to search</p>";}


?>
<br/><br/>
			</div>	
		</div>
	</div>
</div>