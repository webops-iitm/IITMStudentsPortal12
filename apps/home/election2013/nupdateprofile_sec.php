<?php
	include("../../../db.php");

	session_start();
	
	if (isset($_COOKIE["user"]))
		$_SESSION['uname'] = $_COOKIE["user"];
		
	include("../../../config.php");
	
	if($loggedin == 0)		
		die("Please Login to continue");

	$query_ele= "SELECT * FROM election2013 WHERE username like '{$_SESSION['uname']}'";
	$result_ele = mysql_query($query_ele);
	if ( $row = mysql_fetch_assoc($result_ele) ) $post = $row['instielec'];
	else $post = "0";

?>
<div style="float:left; margin-left:10px; height:380px; width:1070px;" class="widget-contentsec" id="inner_body_sec">

<form id="form" style="float:left;margin-left:10px;" name="regform" action="apps/home/election2013/nupdateprofilesubmit_sec.php" enctype="multipart/form-data" method="post">
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
				<a href="files/Election2013/manifesto/<?php echo $nwriteup; ?>"><p>Download Writeup</p></a>
			</td>
		</tr>
	</table>
</form>


<form id="form" style="float:left; margin-left:60px;" name="regform" action="apps/home/election2013/nupdateprofilesubmit_sec.php" enctype="multipart/form-data" method="post">
	<table>
		<tr>
			<td style="width:110px;"><a href="#">Nickname</a></td>
			<td><input id="nick" type="text" name="nick" value="<?php echo $nick; ?>" /></td>
		</tr><tr>
			<td style="width:100px;"><a href="#">Contact No.</a></td>
			<td><input id="contact" type="text" name="contact" value="<?php echo $contact; ?>" maxlength="10" onChange="if(this.value != 'admin') this.value = this.value.toUpperCase();"/></td>
		</tr><tr>
			<td style="width:100px;"><a href="#">E-Mail ID</a></td>
			<td><input id="email" type="text" name="email" value="<?php echo $email; ?>" /></td>
		</tr><tr>
			<td style="width:100px;"><a href="#">Blood Group</a></td>
			<td><input id="bgroup" type="text" name="bgroup" value="<?php echo $bgroup; ?>"/></td>
		</tr><tr>
        		<td></td><td><p>Post Contesting for:</p></td>
       		</tr><tr>
			<td style="width:100px;"><a href="#"> Students Election</a></td>
			<td><select style="width:194px;" id="instielec" name="instielec">
                            	<option value="0" 			<?php if ($post == "0") 			echo"selected"; ?> > Choose</option>                                              
				<option value="Insti Alumni Affairs"  	<?php if ($post == "Insti Alumni Affairs") 	echo"selected"; ?> >Insti Alumni Affairs</option>
                                <option value="Co-CAS"   		<?php if ($post == "Co-CAS") 			echo"selected"; ?> >Co-CAS</option>
				<option value="Cul-Art"   		<?php if ($post == "Cul-Art") 			echo"selected"; ?> >Cul-Art</option>
				<option value="Cul-Lit"   		<?php if ($post == "Cul-Lit") 			echo"selected"; ?> >Cul-Lit</option>
                                <option value="HAS"   			<?php if ($post == "HAS") 			echo"selected"; ?> >HAS</option>
				<option value="Insti Sports-Sec"   	<?php if ($post == "Insti Sports-Sec") 		echo"selected"; ?> >Insti Sports-Sec</option>			 					                                         	  <option value="Insti Students General"   <?php if ($post == "Insti Students General") echo"selected"; ?> >Insti Gen-Sec</option>
				<option value="AAS"   			<?php if ($post == "AAS") 			echo"selected"; ?> >Insti AAS</option>
                                <option disabled="disabled">- - - - - - - - - - - - - - - - - - - - - -</option>
                                <option value="Hostel Alumni-Sec"   	<?php if ($post == "Hostel Alumni-Sec") 	echo"selected"; ?> >Hostel Alumni-Sec</option>
                                <option value="Hostel Garden-Sec"   	<?php if ($post == "Hostel Garden-Sec") 	echo"selected"; ?> >Hostel Garden-Sec</option>
		   		<option value="Hostel Gen-Sec"   	<?php if ($post == "Hostel Gen-Sec") 		echo"selected"; ?> >Hostel Gen-Sec</option>						 					  											  <option value="Hostel Lit-Sec"   <?php if ($post == "Hostel Lit-Sec") echo"selected"; ?> >Hostel Lit-Sec</option>
                                <option value="Hostel Mess-Sec"   	<?php if ($post == "Hostel Mess-Sec") 		echo"selected"; ?> >Hostel Mess-Sec</option>
				<option value="Hostel Soc-Sec"   	<?php if ($post == "Hostel Soc-Sec") 		echo"selected"; ?> >Hostel Soc-Sec</option>
                                <option value="Hostel Sports-Sec"   	<?php if ($post == "Hostel Sports-Sec") 	echo"selected"; ?> >Hostel Sports-Sec</option>
                                <option value="Hostel TAS"   		<?php if ($post == "Hostel TAS") 		echo"selected"; ?> >Hostel TAS</option>
				<option disabled="disabled">- - - - - - - - - - - - - - - - - - - - - -</option>
				<option value="councillor"   		<?php if ($post == "councillor") 		echo"selected"; ?> >Councillor</option>
				<option value="Others"   		<?php if ($post == "Others") 			echo"selected"; ?> >Others</option>						 					  
			  </select>
			</td>
		</tr><tr>
			<center>
				<td colspan="2"><a href="#"><input style="margin-top:20px;" class="btn btn-warning btn-large" type="submit" value="Update" name="update_elec" /></a></td>
			</center>
		</tr>
	</table>
</form>

<form id="form" style="float:left; margin-left:60px;" name="regform" action="apps/home/election2013/nupdateprofilesubmit_sec.php" enctype="multipart/form-data" method="post">
	<table>
		<tr>
			<td style="width:100px;"><a href="#">Display Picture</a></td>
			<td><img style="margin-left:25px; height:150px; width:150px;" src="files/Election2013/pics/<?php echo $ndisp_pic; ?>"  /></td>
		</tr>
		<tr>
			<td>
			</td><td>
				<input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
				<input class="btn btn-info btn-small" style="width:180px; margin-bottom:15px; height:16px; line-height:16px;" type="file" name="dpic" id="dpic" />
			</td>
		</tr><tr>
			<td style="width:100px; ">
				<a  href="#">Upload Manifesto</a>
			</td><td>
				<input class="btn btn-info btn-small" style="width:180px ;margin-top:5px; margin-bottom:5px; height:16px; line-height:16px;" type="file" name="manifesto" id="manifesto" />
			</td>
		</tr>
        <tr>
			<td style="width:100px; ">
				<a  href="#">Upload Manifesto Writeup/Timeline</a>
			</td><td>
				<input class="btn btn-info btn-small" style="width:180px;  height:16px; line-height:16px;" type="file" name="manifestow" id="manifestow" />
			</td>
		</tr>

        
        <tr>
			<td colspan='2' style="text-align:center;"><input style="margin-top:20px;" class="btn btn-warning btn-large" type="submit" value="Update" name="update_dpic" /></td>
		</tr>
	</table>
</form>
		
<p style="text-align:center; font-size:16px;"><strong>Note:</strong>Write-ups are for institute elections, timelines are for hostel elections.<br>
In case you are unable to upload any of the files, you can mail them to webops.iitm@gmail.com specifying your details.<br><br></p>

<hr style="position:absolute; bottom:10px;">

</div>


