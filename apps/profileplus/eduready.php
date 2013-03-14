<?php
$edureadyresult = mysql_query("SELECT * FROM stu_education WHERE username = '$uname'");
?>
<div>
	<div>
		<?php
		
echo "<center><table class='table-striped' style=\"width:90%\">
<tr>
<th>Title</th>
<th>Description</th>
<th>Score</th>
<th>Status</th>
<th>Edit</th>
<th>Delete</th>
</tr>";

while($edureadyrow = mysql_fetch_array($edureadyresult))
  {
	  if($edureadyrow['status'] ==1) $status = "Approved";
	  elseif($edureadyrow['status'] ==2) $status = "Pending";
	  elseif($edureadyrow['status'] ==3) $status = "Rejected";
  echo "<tr>";
  echo "<td>" . $edureadyrow['head'] . "</td>";
  echo "<td>" . $edureadyrow['desc'] . "</td>";
  echo "<td>" . $edureadyrow['score'] . "</td>";
  echo "<td>" . $status . "</td>";
  echo "<td><a onclick=\"javascript:eduedit('".$edureadyrow['head']."','".$edureadyrow['desc']."','".$edureadyrow['dept']."','".$edureadyrow['score']."');\" class=\"edueditbutton \"btn btn-success btn-small\">Edit</a></td>";
  echo "<td><a onclick=\"javascript:edudel('".$edureadyrow['head']."','".$edureadyrow['desc']."','".$edureadyrow['dept']."','".$edureadyrow['score']."');\" class=\"edudelbutton \"btn btn-success btn-small\">Delete</a></td>";
  echo "</tr>";
  }
echo "</table></center>";

		?>    
    </div>
</div>