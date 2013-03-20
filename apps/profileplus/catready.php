<?php
$catreadyquery = "SELECT * FROM student_profile WHERE username = '$uname' AND cat_id = '$catID'";
$catreadyresult = mysql_query($catreadyquery);
?>
<div>
	<div>
		<?php
		$subc = "";
while($catreadyrow = mysql_fetch_array($catreadyresult))
  {
	  if($subc!=$catreadyrow['subcat_id']){
		  $subc=$catreadyrow['subcat_id'];
		  echo $catreadyrow['subcat_name'];
	  
		  
echo "<table class='table-striped' style=\"width:90%\">
<tr>
<th>Title</th>
<th>Description</th>
<th>Timeline</th>
<th>Status</th>
<th>Edit</th>
<th>Delete</th>
</tr>";
	  }
	  if($catreadyrow['status'] ==1) $status = "Approved";
	  elseif($catreadyrow['status'] ==2) $status = "Pending";
	  elseif($catreadyrow['status'] ==3) $status = "Rejected";
  echo "<tr>";
  echo "<td>" . $catreadyrow['title'] . "</td>";
  echo "<td>" . $catreadyrow['desc'] . "</td>";
  echo "<td>" . $catreadyrow['timeline'] . "</td>";
  echo "<td>" . $status . "</td>";
  echo "<td><a onclick=\"javascript:catedit('".$catreadyrow['cat_id']."','".$catreadyrow['subcat_name']."','".$catreadyrow['title']."','".$catreadyrow['desc']."','".$catreadyrow['timeline']."','".$catreadyrow['id']."');\" class=\"cateditbutton \"btn btn-success btn-small\">Edit</a></td>";
  echo "<td><a onclick=\"javascript:catdel('".$catreadyrow['cat_id']."','".$catreadyrow['subcat_name']."','".$catreadyrow['title']."','".$catreadyrow['desc']."','".$catreadyrow['timeline']."');\" class=\"catdelbutton \"btn btn-success btn-small\">Delete</a></td>";
  echo "</tr>";
  }
echo "</table>";

		?>    
    </div>
</div>