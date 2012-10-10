<?php
	include("../../../db.php");
	

	session_start();
	
	if (isset($_COOKIE["user"]))
		$_SESSION['uname'] = $_COOKIE["user"];
		
	include("../../../config.php");
	
	if($loggedin == 0)		
		die("Please Login to continue");


?>
<form id="form" name="regform" action="apps/home/secretary/contactsubmit_sec.php" method="post">
	<table>
		<tr>
			<td style="width:100px;"><a href="#">Nick</a></td>
			<td><input style="color:#fff;" id="nick" type="text" name="nick" value="<?php if( $nick == '' ) echo $name; else echo $nick; ?>" readonly='readonly' maxlength="255" /></td>
		</tr><tr>
			<td style="width:100px;"><a href="#">Roll No.</a></td>
			<td><input style="color:#fff;" id="roll" type="text" name="roll" value="<?php echo $user; ?>" readonly='readonly' maxlength="8" /></td>
		</tr><tr>
			<td style="width:100px;"><a href="#">Contact No.</a></td>
			<td><input id="contact" type="text" name="contact" value="<?php echo $contact; ?>" maxlength="10" onChange="if(this.value != 'admin') this.value = this.value.toUpperCase();"/></td>
		</tr><tr>
			<td style="width:100px;"><a href="#">E-Mail ID</a></td>
			<td><input id="email" type="text" name="email" value="<?php echo $email; ?>" maxlength="255" /></td>
		</tr><tr>
			<td style="width:100px;"><a href="#">Subject</a></td>
			<td><input id="subj" type="text" name="subj" value="" maxlength="255" /></td>
		</tr><tr>
			<td style="width:100px;"><a href="#">Description</a></td>
			<td><textarea name="desc" id="desc" rows="10" cols="60"></textarea></td>
		</tr><tr>
			<center>
				<td><a href="#"><input class="btn btn-warning" type="submit" value="Send" name="Send" /></a></td>
				<td style="width:100px;"><a href="javascript:makeAnon();">Make me anonymous</a></td>
			</center>
		</tr>
	</table>
</form>

<script>
	function makeAnon() {
		document.getElementById("nick").value = "Anon";
		document.getElementById("roll").value = "Anon";
		document.getElementById("contact").value = "Anon";
		document.getElementById("email").value = "Anon";
	}
</script>
