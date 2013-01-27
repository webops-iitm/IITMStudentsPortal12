<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');
	
	include("../db.php");
	
	$complaint_id = $_GET['id'];
	$stat = $_GET['stat'];
	//echo "$stat";
	$sql = "UPDATE ocs_complaints SET current_status = '".$stat."', status_update_datetime=now() WHERE id = ".$complaint_id.";";
	//echo $sql;
	$res = mysql_query($sql) or die("ERROR : ".mysql_error());
	if ($res) {
?>
<div class="alert">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>Success!</strong> Changed status of complaint ID : <?php echo $complaint_id; ?> to <?php echo $stat; ?>
</div>
<?php
	} else {
?>
<div class="alert">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>Error!</strong> Coundn't change status of complaint ID : <?php echo $complaint_id; ?> to <?php echo $stat; ?>
</div>
<?php		
	}
?>
