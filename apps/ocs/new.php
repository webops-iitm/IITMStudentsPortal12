<?php
	include("../../../db.php");
	
    
	session_start();
	
	if (isset($_COOKIE["user"]))
		$_SESSION['uname'] = $_COOKIE["user"];
		
	include("../../../config.php");
	
	if($loggedin == 0) 
		die("Please Login to make complaints");

?>

<script>
	function makeAnon() {
		document.getElementById("nick").value = "Anon";
		document.getElementById("roll").value = "Anon";
		document.getElementById("contact").value = "Anon";
		document.getElementById("email").value = "Anon";
	}
</script>

&nbsp; <!-- hack : it doesn't show without some thing here ... -->
<div style="float:left; margin-left:50px; height:280px; width:790px; padding-top:0px; " class="widget-contentsec" id="inner_body_sec">
<center>
<form id="contact_form" name="regform" action="apps/students-search/secretary/contactsubmit_sec.php" method="post">
	<table style="float:left; margin-left:30px; margin-top:5px;">
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
		</tr><tr>
			<center>
				<td><a href="#"><input class="btn btn-warning btn-large" type="submit" value="Send" name="Send" /></a></td>
			</center>
		</tr>
	</table>

	<table style="float:right; margin-right:60px; margin-top:5px;">
		<tr>
			<td style="width:100px;"><a href="#" style="color: rgb(0, 136, 204);">Category</a></td>
			<td>
				<select name="category">
				<?php
					$res_cat = mysql_query("SELECT title FROM ocs_categories");
					while($i = mysql_fetch_array($res_cat)) {
						$val = $i['title'];
						echo "<option name='$val' value='$val'> $val </option>";
						
					}
				?>
				</select>
			</td>
		</tr><tr>
			<td style="width:100px;"><a href="#" style="color: rgb(0, 136, 204);">Subject</a></td>
			<td><input id="subj" style="width:240px;" type="text" name="subj" value="" maxlength="255" /></td>
		</tr><tr>
			<td style="width:100px;"><a href="#" style="color: rgb(0, 136, 204);">Description</a></td>
			<td><textarea name="desc" style="width:240px;" id="desc" rows="9" cols="60"></textarea></td>
		</tr>
	</table>
</form>
</center>
</div>
