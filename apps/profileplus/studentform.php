<?php
	include("../../db.php");
	session_start();
	include("../../config.php");
//	$uname = "name";
	$uname = $_SESSION['uname'];
/*	$uname = "Username";
	$uname = "username";
	$user = "user";
	$name = "name";
	$nick = "nick";
	$room = "room";
	$hostel = "hostel";
	$contact = "contact";
	$email = "email";
        $bgroup = "bgroup";
*/		
	$CatTable = "categories";
	$SubCatTable = "sub_categories";
?>
<style>
.categories
{
	font-size:14px;
}
</style>

<center>
<div class="span10">
				<div class="widget"  style="float:right;width:1000px; margin:10px;">
					<div class="widget-header">
						<i class="icon-star"></i>
						<h3>Update Resume</h3>
					</div> <!-- /widget-header -->		
					<div class="widget-content">
								<form id="form" class="form-horizontal" name="normalprof" action="apps/profileplus/resumeprofilesubmit.php" method="post">
								<table>
                                    <tr>
										<td style="width:100px;"><a href="#">FullName</a></td>
										<td><input style="color:#fff;" id="name" type="text" name="name" value="<?php echo $name; ?>" onChange="if(this.value != 'admin') this.value = this.value.toUpperCase();" disabled/></td>
									</tr><tr>
										<td style="width:100px;"><a href="#">Nickname</a></td>
										<td><input id="nick" type="text" name="nick" value="<?php echo $nick; ?>" /></td>
									</tr><tr>
										<td style="width:100px;"><a href="#">Room No.</a></td>
										<td><input style="color:#fff;" id="room" type="text" name="room" value="<?php echo $room; ?>" maxlength="4" onChange="if(this.value != 'admin') this.value = this.value.toUpperCase();" disabled/></td></tr>
                                        <tr>
                                        <td style="width:100px;"><a href="#">Hostel.</a></td>
                                        <td>
                                        <select id="hostel" name="hostel" style="width:195px; color:#fff;" disabled>
						 					  <option <?php if($hostel == "Saraswathi") echo "selected=\"selected\"" ?> value="Saraswathi">Saraswathi</option>
											  <option <?php if($hostel == "Tamiraparani") echo "selected=\"selected\"" ?> value="Tamiraparani">Tamraparani</option>
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
		   		  							  <option <?php if($hostel == "Mahanadhi") echo "selected=\"selected\"" ?>value="Mahanadhi">Mahanadhi</option>                                        
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
<?php
include("education.php");


$catquery = "SELECT * FROM $CatTable";
$catresult = mysql_query($catquery);

while($catrow = mysql_fetch_array($catresult))
  {
	  $catname = $catrow['name'];
	  $catID = $catrow['id'];
	  $catdesc = $catrow['description'];
	  $catadmin = $catrow['admin'];
	  include("categories.php");
  }

?>
              
 
				</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->	
</div>
</center>