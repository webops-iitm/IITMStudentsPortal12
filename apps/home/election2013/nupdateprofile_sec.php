<?php
	include("../../../db.php");

	session_start();
	
	if (isset($_COOKIE["user"]))
		$_SESSION['uname'] = $_COOKIE["user"];
		
	include("../../../config.php");
	
	if($loggedin == 0)		
		die("Please Login to continue");
?>
<div style="float:left; margin-left:10px; height:350px; width:1070px;" class="widget-contentsec" id="inner_body_sec">

<form id="form" style="float:left;margin-left:10px;" name="regform" action="apps\home\election2013\nupdateprofilesubmit_sec.php" enctype="multipart/form-data" method="post">
	<table>
		<tr>
			<td style="width:100px;"><a href="#">FullName</a></td>
			<td><input style="color:#fff;" id="name" type="text" name="name" value="<?php echo $name; ?>" onChange="if(this.value != 'admin') this.value = this.value.toUpperCase();" disabled/></td>
		</tr><tr>
			<td style="width:100px;"><a href="#">Roll No.</a></td>
			<td><input style="color:#fff;" id="roll" type="text" name="roll" value="<?php echo $user; ?>" onChange="if(this.value != 'admin') this.value = this.value.toUpperCase();" disabled/></td>
		</tr><tr>
		 	<td style="width:100px;"><a href="#">Room No.</a></td>
			<td><input style="color:#fff;" id="room" type="text" name="room" value="<?php echo $room; ?>" maxlength="4" onChange="if(this.value != 'admin') this.value = this.value.toUpperCase();" disabled/></td>
		</tr><tr>
			<td style="width:100px;"><a href="#">Hostel.</a></td>
			<td>
				<select id="hostel" name="hostel" style="width:195px; color:#fff;" disabled>
					<option <?php if($hostel == "Saraswathi") echo "selected=\"selected\"" ?> value="Saraswathi">Saraswathi</option>
					<option <?php if($hostel == "Tamraparani") echo "selected=\"selected\"" ?> value="Tamraparani">Tamraparani</option>
					<option <?php if($hostel == "Ganga") echo "selected=\"selected\"" ?> value="Ganga">Ganga</option>
					<option <?php if($hostel == "Tapti") echo "selected=\"selected\"" ?> value="Tapti">Tapti</option>
                    <option <?php if($hostel == "Jamuna") echo "selected=\"selected\"" ?> value="Jamuna">Jamuna</option>
					<option <?php if($hostel == "Alaknanda") echo "selected=\"selected\"" ?> value="Alaknanda">Alaknanda</option>
					<option <?php if($hostel == "Godavari") echo "selected=\"selected\"" ?> value="Godavari">Godavari</option>
					<option <?php if($hostel == "Narmada") echo "selected=\"selected\"" ?> value="Narmada">Narmada</option>
                    <option <?php if($hostel == "Pampa") echo "selected=\"selected\"" ?> value="Pampa">Pampa</option>
 					<option <?php if($hostel == "Sindhu") echo "selected=\"selected\"" ?> value="Sindhu">Sindhu</option>
 					<option <?php if($hostel == "Krishna") echo "selected=\"selected\"" ?> value="Krishna">Krishna</option>
					<option <?php if($hostel == "Cauvery") echo "selected=\"selected\"" ?> value="Cauvery">Cauvery</option>
					<option <?php if($hostel == "Sharavathi") echo "selected=\"selected\"" ?> value="Sharavathi">Sharavathi</option>
					<option <?php if($hostel == "Sarayu") echo "selected=\"selected\"" ?> value="Sarayu">Sarayu</option>
					<option <?php if($hostel == "Brahmaputra") echo "selected=\"selected\"" ?> value="Brahmaputra">Brahmaputra</option>
		   		  	<option <?php if($hostel == "Mandakini") echo "selected=\"selected\"" ?> value="Mandakini">Mandakini</option>
		   		  	<option <?php if($hostel == "Mahanadhi") echo "selected=\"selected\"" ?> value="Mahanadhi">Mahanadhi</option>
				</select>
			</td>
		</tr><tr>
			<td style="width:100px;">
				<a href="#"><p>Manifesto</p></a>
			</td><td>
				<a href="files/Election2013/manifesto/<?php echo $nmanifesto; ?>"><p>Download Manifesto</p></a>
			</td>
		</tr>
        <tr>
			<td style="width:100px;">
				<a href="#"><p>Manifesto Writeup</p></a>
			</td><td>
				<a href="files/Election2013/maifesto/"<p>Download Writeup</p></a>
			</td>
		</tr>
	</table>
</form>


<form id="form" style="float:left; margin-left:60px;" name="regform" action="apps\home\election2013\nupdateprofilesubmit_sec.php" enctype="multipart/form-data" method="post">
	<table>
		<tr>
			<td style="width:110px;"><a href="#">Nickname</a></td>
			<td><input id="nick" type="text" name="nick" value="<?php echo $nick; ?>" /></td>
		</tr>  
        <tr>
			<td style="width:100px;"><a href="#">Contact No.</a></td>
			<td><input id="contact" type="text" name="contact" value="<?php echo $contact; ?>" maxlength="10" onChange="if(this.value != 'admin') this.value = this.value.toUpperCase();"/></td>
		</tr><tr>
			<td style="width:100px;"><a href="#">E-Mail ID</a></td>
			<td><input id="email" type="text" name="email" value="<?php echo $email; ?>" /></td>
		</tr><tr>
			<td style="width:100px;"><a href="#">Blood Group</a></td>
			<td><input id="bgroup" type="text" name="bgroup" value="<?php echo $bgroup; ?>"/></td>
		</tr>
        <tr>
        <td></td><td><p>Post Contesting for:</p>        </td>
        </tr>      
        
        <tr>
										<td style="width:100px;"><a href="#"> Students Election</a></td>
										<td><select style="width:194px;" id="instielec" name="instielec">
                                        	  
                                              <option value="Insti Alumni Affairs">Insti Alumni Affairs</option>
                                              <option value="Co-CAS">Co-CAS</option>
		   		  							  <option value="Cul-Art">Cul-Art</option>
											  <option value="Cul-Lit">Cul-Lit</option>
                                              <option value="HAS">HAS</option>
						 					  <option value="Insti Sports-Sec">Insti Sports-Sec</option>			 					                                         	  <option value="Insti Students General">Insti Students General</option>	
                                              
                                              <option disabled="disabled">- - - - - - - - - - - - - - - - - - - - - -</option>
                                              <option value="Hostel Alumni-Sec">Hostel Alumni-Sec</option>
                                              <option value="Hostel Garden-Sec">Hostel Garden-Sec</option>
		   		  							  <option value="Hostel Gen-Sec">Hostel Gen-Sec</option>						 					  											  <option value="Hostel Lit-Sec">Hostel Lit-Sec</option>
                                              <option value="Hostel Mess-Sec">Hostel Mess-Sec</option>
						 					  <option value="Hostel Soc-Sec">Hostel Soc-Sec</option>
                                              <option value="Hostel Sports-Sec">Hostel Sports-Sec</option>
                                              <option value="Hostel TAS">Hostel TAS</option>							 					  
						 				
                                        </select></td>
									</tr><tr>
			<center>
				<td colspan="2"><a href="#"><input style="margin-top:20px;" class="btn btn-warning btn-large" type="submit" value="Update" name="update_elec" /></a></td>
				
			</center>
		</tr>
	</table>
</form>

<form id="form" style="float:left; margin-left:60px;" name="regform" action="apps\home\election2013\nupdateprofilesubmit_sec.php" enctype="multipart/form-data" method="post">
	<table>
		<tr>
			<td style="width:100px;"><a href="#">Display Picture</a></td>
			<td><img style="margin-left:25px; height:150px; width:150px;" src="../../../files/Election2013/pics/<?php echo $ndisp_pic; ?>"  /></td>
		</tr>
		<tr>
			<td>
			</td><td>
				<input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
				<input class="btn btn-info btn-small" style="width:180px; margin-bottom:15px;" type="file" name="dpic" id="dpic" />
			</td>
		</tr><tr>
			<td style="width:100px; ">
				<a  href="#">Upload Manifesto</a>
			</td><td>
				<input class="btn btn-info btn-small" style="width:180px ;margin-top:5px; margin-bottom:5px;" type="file" name="manifesto" id="manifesto" />
			</td>
		</tr>
        <tr>
			<td style="width:100px; ">
				<a  href="#">Upload Manifesto Writeup</a>
			</td><td>
				<input class="btn btn-info btn-small" style="width:180px;" type="file" name="manifestow" id="manifestow" />
			</td>
		</tr>
        
        <tr>
			<td colspan='2' style="text-align:center;"><input style="margin-top:20px;" class="btn btn-warning btn-large" type="submit" value="Update" name="update_dpic" /></td>
		</tr>
	</table>
</form>
<hr style="position:absolute; bottom:10px;">
</div>
