<?php
	include("../../../db.php");
	
	session_start();
	
	if (isset($_COOKIE["user"]))
		$_SESSION['uname'] = $_COOKIE["user"];
		
	include("../../../config.php");
	
	if($loggedin == 0) 
		die("Please Login to make complaints");

?>

&nbsp; <!-- hack : it doesn't show without some thing here ... -->
<div style="float:left; margin-left:50px; height:280px; width:790px; padding-top:0px; " class="widget-contentsec" id="inner_body_sec">
<center>
<!--	<table style="float:left; margin-left:30px; margin-top:5px;" class="table table-striped table-bordered">
		<tr>
			<td style="width:100px;"><a href="#" style="color: rgb(0, 136, 204);">Nick</a></td>
			<td>
				<input style="color:#fff;" id="name" type="text" name="name" value="<?php echo $name; ?>" readonly='readonly' maxlength="255" />
            </td>
        
		</tr><tr>
			<td style="width:100px;"><a href="#" style="color: rgb(0, 136, 204);">Roll No.</a></td>
			<td><input style="color:#fff;" id="roll" type="text" name="roll" value="<?php echo $user; ?>" readonly='readonly' maxlength="8" /></td>
		</tr><tr>
			<td style="width:100px;"><a href="#" style="color: rgb(0, 136, 204);">Contact No.</a></td>
			<td><input id="contact" type="text" name="contact" value="<?php if($contact != 0) echo $contact; ?>" maxlength="10" onChange="if(this.value != 'admin') this.value = this.value.toUpperCase();"/></td>
		</tr><tr>
			<td style="width:100px;"><a href="#" style="color: rgb(0, 136, 204);">E-Mail ID</a></td>
			<td><input id="email" type="text" name="email" value="<?php echo $email; ?>" maxlength="255" /></td>
		</tr><tr>
			<td style="height:60px;"></td>
		</tr>
	</table>
-->
	<?php
		$sql = "select * from ocs_complaints where user_id = $id";
		$result_comp = mysql_query($sql) or die("DIED:".mysql_error($con));
		//die($sql);
		while( $row = mysql_fetch_array($result_comp) ) {
			echo " ROW 1 \n";
			echo "\ncontact : " . $row['user_contact'];
			echo "\nemail : " . $row['user_email'];
			echo "\nsubject : " . $row['complaint_sub'];
			echo "\ncategory : " . $row['complaint_cat'];
			echo "\ndescription : " . $row['complaint_desc'];
			echo "\nstatus : " . $row['current_status'];
			echo "\ndate made : " . $row['regn_datetime'];
			echo "\nUpdated on : " . $row['status_update_datetime'];
			echo "\n\n---------------------";
		}
	?>
</center>
</div>
