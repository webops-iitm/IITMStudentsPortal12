<?php
	include("../../../db.php");
	
  $var = $_GET['userid'];
	session_start();
	
	if (isset($_COOKIE["user"]))
		$_SESSION['uname'] = $_COOKIE["user"];
		
	include("../../../config.php");
	
	if($loggedin == 0) 
		die("Please Login to send emails");
  
  

?>
&nbsp; <!-- hack : it doesn't show without some thing here ... -->
<div style="float:left; margin-left:10px; height:280px; width:790px; padding-top:0px; " class="widget-contentsec" id="inner_body_sec">
<center>
<form id="form" name="regform" action="apps/home/secretary/contactsubmit_sec.php" method="post">
	<table style="float:left; margin-left:30px; margin-top:5px;">
    <tr>
      <td colspan="2">
<p>Got any Issues ? Write to the secretary !</p></td>
    </tr><tr>
			<td style="width:100px;"><a href="#">Nick</a></td>
			<td>
        <input style="color:#fff;" id="nick" type="text" name="nick" value="<?php if( $nick == '' ) echo $name; else echo $nick; ?>" readonly='readonly' maxlength="255" />
          <input id="userid" type="hidden" name="userid" value="<?php echo $var ?>"  />
      </td>
        
		</tr><tr>
			<td style="width:100px;"><a href="#">Roll No.</a></td>
			<td><input style="color:#fff;" id="roll" type="text" name="roll" value="<?php echo $user; ?>" readonly='readonly' maxlength="8" /></td>
		</tr><tr>
			<td style="width:100px;"><a href="#">Contact No.</a></td>
			<td><input id="contact" type="text" name="contact" value="<?php if($contact != 0) echo $contact; ?>" maxlength="10" onChange="if(this.value != 'admin') this.value = this.value.toUpperCase();"/></td>
		</tr>
		<tr>
		<td  style="height:80px;"></td>
		</tr>
		<tr>
			<center>
				<td><a href="#"><input class="btn btn-warning btn-large" type="submit" value="Send" name="Send" /></a></td>
				<td style="width:100px;"><a href="javascript:makeAnon();">Make me anonymous</a></td>
			</center>
		</tr>
	</table>

	<table style="float:left; margin-left:60px; margin-top:5px;">
		<tr>
			<td style="width:100px;"><a href="#">E-Mail ID</a></td>
			<td><input id="email" style="width:240px;" type="text" name="email" value="<?php echo $email; ?>" maxlength="255" /></td>
		</tr><tr>
			<td style="width:100px;"><a href="#">Subject</a></td>
			<td><input id="subj" style="width:240px;" type="text" name="subj" value="" maxlength="255" /></td>
		</tr><tr>
			<td style="width:100px;"><a href="#">Description</a></td>
			<td><textarea name="desc" style="width:240px;" id="desc" rows="9" cols="60"></textarea></td>
		</tr>
	</table>
</form>
</center>
</div>
<script>
	function makeAnon() {
		document.getElementById("nick").value = "Anon";
		document.getElementById("roll").value = "Anon";
		document.getElementById("contact").value = "Anon";
		document.getElementById("email").value = "Anon";
	}
</script>
