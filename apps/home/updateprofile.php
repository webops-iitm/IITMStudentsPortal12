<?php
	include("../../db.php");
	

	session_start();
	
	if (isset($_COOKIE["user"]))
	
		$_SESSION['uname'] = $_COOKIE["user"];
		
	include("../../config.php");
	
	if($loggedin == 1){
		
		
		if( $secretary == 2 )
	
			include( "updatesecretary_page.php" );
	
		else {	
			if( $nsecretary == 2 )
	
			include( "election2013/nupdatesecretary_page.php" );
		
			else {
		

?>
<center>
<div class="span3 offset2">
				<div class="widget"  style="float:right;width:400px; margin:10px;">
					<div class="widget-header">
						<i class="icon-star"></i>
						<h3>Update Profile</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
								<form id="form" name="regform" action="apps/home/profilesubmit.php" method="post">
								<table>
                                    <tr>
										<td style="width:100px;"><a href="#">FullName</a></td>
										<td><input style="color:#fff;" id="name" type="text" name="name" value="<?php echo $name; ?>" onChange="if(this.value != 'admin') this.value = this.value.toUpperCase();" disabled/></td>
									</tr><tr>
										<td style="width:100px;"><a href="#">Nickname</a></td>
										<td><input id="nick" type="text" name="nick" value="<?php echo $nick; ?>" /></td>
									</tr><tr>
										<td style="width:100px;"><a href="#">Room No.</a></td>
										<td><input id="room" type="text" name="room" value="<?php echo $room; ?>" maxlength="4" onChange="if(this.value != 'admin') this.value = this.value.toUpperCase();" /></td></tr>
                                        <tr>
                                        <td style="width:100px;"><a href="#">Hostel.</a></td>
                                        <td>
                                        <select id="hostel" name="hostel" style="width:195px;" >
						 					  <option <?php if($hostel == "ALAKANANDA") echo "selected=\"selected\"" ?> value="ALAKANANDA">ALAKANANDA</option>
											  <option <?php if($hostel == "BRAHMAPUTRA") echo "selected=\"selected\"" ?> value="BRAHMAPUTRA">BRAHMAPUTRA</option>
											  <option <?php if($hostel == "CAUVERY") echo "selected=\"selected\"" ?> value="CAUVERY">CAUVERY</option>
											  <option <?php if($hostel == "GANGA") echo "selected=\"selected\"" ?> value="GANGA">GANGA</option>
                                              						  <option <?php if($hostel == "GODAVARI") echo "selected=\"selected\"" ?> value="GODAVARI">GODAVARI</option>
											  <option <?php if($hostel == "JAMUNA") echo "selected=\"selected\"" ?> value="JAMUNA">JAMUNA</option>
											  <option <?php if($hostel == "KRISHNA") echo "selected=\"selected\"" ?> value="KRISHNA">KRISHNA</option>
						 					  <option <?php if($hostel == "MAHANADHI") echo "selected=\"selected\"" ?> value="MAHANADHI">MAHANADHI</option>
                           					   			  <option <?php if($hostel == "MANDAKINI") echo "selected=\"selected\"" ?> value="MANDAKINI">MANDAKINI</option>
 						 					  <option <?php if($hostel == "NARMADA") echo "selected=\"selected\"" ?> value="NARMADA">NARMADA</option>
 						  					  <option <?php if($hostel == "PAMPA") echo "selected=\"selected\"" ?> value="PAMPA">PAMPA</option>
						  					  <option <?php if($hostel == "SARASWATHI") echo "selected=\"selected\"" ?> value="SARASWATHI">SARASWATHI</option>
						  				   	  <option <?php if($hostel == "SARAYU") echo "selected=\"selected\"" ?> value="SARAYU">SARAYU</option>
											  <option <?php if($hostel == "SARAYU C2-3") echo "selected=\"selected\"" ?> value="SARAYU C2-3">SARAYU C2-3</option>
						  					  <option <?php if($hostel == "SARAYU-G5") echo "selected=\"selected\"" ?> value="SARAYU-G5">SARAYU-G5</option>
		   		  							  <option <?php if($hostel == "SARAYU-G6") echo "selected=\"selected\"" ?> value="SARAYU-G6">SARAYU-G6</option>
		   		  							  <option <?php if($hostel == "SHARAVATHI") echo "selected=\"selected\"" ?>value="SHARAVATHI">SHARAVATHI</option>
		   		  							  <option <?php if($hostel == "SINDHU") echo "selected=\"selected\"" ?>value="SINDHU">SINDHU</option>
		   		  							  <option <?php if($hostel == "TAMIRAPARANI") echo "selected=\"selected\"" ?>value="TAMIRAPARANI">TAMIRAPARANI</option>
		   		  							  <option <?php if($hostel == "TAPTI") echo "selected=\"selected\"" ?>value="TAPTI">TAPTI</option>
                                        </select>
                                        </td>
									</tr>




                                        <tr>
                                        <td style="width:100px;"><a href="#">Blood Group</a></td>
                                        <td>
                                        <select id="bgroup" name="bgroup" style="width:195px;">


          <option <?php if($bgroup == "") echo "selected=\"selected\"" ?> value="" >Select</option>
          <option <?php if($bgroup == "A-") echo "selected=\"selected\"" ?> value="A-">A-</option>
          <option <?php if($bgroup == "B-") echo "selected=\"selected\"" ?> value="B-">B-</option>
          <option <?php if($bgroup == "O-") echo "selected=\"selected\"" ?> value="O-">O-</option>
          <option <?php if($bgroup == "AB-") echo "selected=\"selected\"" ?> value="AB-">AB-</option>
          <option <?php if($bgroup == "A+") echo "selected=\"selected\"" ?> value="A+">A+</option>
          <option <?php if($bgroup == "B+") echo "selected=\"selected\"" ?> value="B+">B+</option>
          <option <?php if($bgroup == "O+") echo "selected=\"selected\"" ?> value="O+">O+</option>
          <option <?php if($bgroup == "AB+") echo "selected=\"selected\"" ?> value="AB+">AB+</option>
                                       </select>
                                        </td>
									</tr>





<tr>
										<td style="width:100px;"><a href="#">Contact No.</a></td>
										<td><input id="contact" type="text" name="contact" value="<?php echo $contact; ?>" maxlength="10" onChange="if(this.value != 'admin') this.value = this.value.toUpperCase();"/></td>
									</tr><tr>
										<td style="width:100px;"><a href="#">E-Mail ID</a></td>
										<td><input id="email" type="text" name="email" value="<?php echo $email; ?>" /></td>
									</tr>									
									<tr><center><td colspan="2"><a href="#"><input class="btn btn-warning" type="submit" value="Update" name="Update" /></a></td></center></tr>
								</table>
							</form>
				</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->	
</div>
</center>

<?php
		}// end of the if-else to check for nsecretary
	
	} // end of the if-else to check for secretary
} // end of log in check
else echo"Please log in to continue";
?>
