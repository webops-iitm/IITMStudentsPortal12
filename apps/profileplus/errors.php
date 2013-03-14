<?php
if($_GET['edit']==2)
		echo "<div class=\"span8\" >
	<div id=\"widget\" class=\"widget\" style=\"width:800px; margin:10px; position:relative; top:0px; right:0px; left:20px;\">
		<div class=\"widget-header\">
			<i class=\"icon-comment\"></i>
			<h3 id=\"header\">Success!!!</h3>

		</div>
				<div class=\"widget-content\" id=\"widget-content\">
				Your Request is recorded and will be update with the approval of the Respective Secretary. For further changes <a href=\"javascript:update('apps/profileplus/studentform.php','profile');\">click here</a>. To view your profile, <a href=\"javascript:update('apps/profileplus/profileplus.php','profile');\">click here</a>
		</div>
		</div>
		</div>";
	else if($_GET['edit']==1)
		echo "<div class=\"span8\" >
	<div id=\"widget\" class=\"widget\" style=\"width:800px; margin:10px; position:relative; top:0px; right:0px; left:20px;\">
		<div class=\"widget-header\">
			<i class=\"icon-comment\"></i>
			<h3 id=\"header\">Error!!!</h3>

		</div>
				<div class=\"widget-content\" id=\"widget-content\">
				Your Request cannot be recorded. Please report to the Web Operations Club.
		</div>
		</div>
		</div>";
	else if($_GET['delete']==2)
		echo "<div class=\"span8\" >
	<div id=\"widget\" class=\"widget\" style=\"width:800px; margin:10px; position:relative; top:0px; right:0px; left:20px;\">
		<div class=\"widget-header\">
			<i class=\"icon-comment\"></i>
			<h3 id=\"header\">Success!!!</h3>

		</div>
				<div class=\"widget-content\" id=\"widget-content\">
				Successfully Deleted. For further changes <a href=\"javascript:update('apps/profileplus/studentform.php','profile');\">click here</a>. To view your profile, <a href=\"javascript:update('apps/profileplus/profileplus.php','profile');\">click here</a>
		</div>
		</div>
		</div>";
	else if($_GET['delete']==1)
		echo "<div class=\"span8\" >
	<div id=\"widget\" class=\"widget\" style=\"width:800px; margin:10px; position:relative; top:0px; right:0px; left:20px;\">
		<div class=\"widget-header\">
			<i class=\"icon-comment\"></i>
			<h3 id=\"header\">Error!!!</h3>

		</div>
				<div class=\"widget-content\" id=\"widget-content\">
				Could not Delte!!. Please report to the Web Operations Club.
		</div>
		</div>
		</div>";
	else if($_GET['resumep']==2)
		echo "<div class=\"span8\" >
	<div id=\"widget\" class=\"widget\" style=\"width:800px; margin:10px; position:relative; top:0px; right:0px; left:20px;\">
		<div class=\"widget-header\">
			<i class=\"icon-comment\"></i>
			<h3 id=\"header\">Success!!</h3>

		</div>
				<div class=\"widget-content\" id=\"widget-content\">
				Successfully Updated your profile. For further changes <a href=\"javascript:update('apps/profileplus/studentform.php','profile');\">click here</a>. To view your profile, <a href=\"javascript:update('apps/profileplus/profileplus.php','profile');\">click here</a>
		</div>
		</div>
		</div>";
?>