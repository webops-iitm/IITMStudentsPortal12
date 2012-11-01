<?php
	include("../../../db.php");
	

	session_start();
	
	if (isset($_COOKIE["user"]))
		$_SESSION['uname'] = $_COOKIE["user"];
		
	include("../../../config.php");
	
	if($loggedin == 0)		
		die("Please Login to continue");


?>
<div style="float:left; margin-left:10px;  height:270px; width:420px;" class="widget-contentsec" id="inner_body_sec">
<form id="form" name="regform" action="apps/home/secretary/updatecontactsubmit_sec.php" method="post">
	<table>
		<tr>
			<td style="width:100px;"><a href="#">Email to send forms to</a></td>
			<td><input id="form_email" type="text" name="form_email" value="<?php echo $form_email; ?>" maxlength="255" /></td>
		</tr><tr>
			<center>
				<td colspan="2"><a href="#"><input class="btn btn-warning" type="submit" value="Update" name="Update" /></a></td>
			</center>
		</tr>
	</table>
</form>
</div>
