


<?php

include "../../../../db.php";


$hostel = '0';
$hostel = $_GET['hostel'];

$sqlque = "SELECT * FROM election2013 WHERE status = '1'";
$resque = mysql_query($sqlque) or die("Permission denide");
echo"<div class ='widget-content'><div class ='table'><table>";

?>
	<tr>
		<td><a href='#'>View Hostel wise :</a></td>
		<td>
			<select id="elechostel" name="hostel" onchange="changeFunc();" style="width:195px;">
				<option value="0" >Choose Hostel</option>
				<option value="0" >Institute Elections</option>
				<option value="Alakananda" >Alaknanda</option>
				<option value="Brahmaputra" onselect="javascript:update('apps/home/election2013/listall.php?hostel=Alaknanda', 'widget');">Brahmaputra</option>
				<option value="Cauvery">Cauvery</option>
				<option value="Ganga">Ganga</option>
				<option value="Godavari">Godavari</option>
				<option value="Jamuna">Jamuna</option>
				<option value="Narmada">Narmada</option>
				<option value="Pampa">Pampa</option>
				<option value="Krishna">Krishna</option>
				<option value="Mandakini">Mandakini</option>
				<option value="Mahanadhi">Mahanadhi</option>
				<option value="Sharavathi">Sharavathi</option>
				<option value="Sarayu">Sarayu</option>
				<option value="Sindhu">Sindhu</option>
				<option value="Saraswathi">Saraswathi</option>
				<option value="Tamiraparani">Tamraparani</option>
				<option value="Tapti">Tapti</option>
			</select>
		</td>
		<td></td>
         </tr>

<?php


while( $row = mysql_fetch_assoc($resque) ){

	$sqlque2 = "SELECT * FROM users WHERE username = '{$row['username']}'";
	$resque2 = mysql_query($sqlque2) or die("Permission denide");
	$irow = mysql_fetch_assoc($resque2);

	if ( !$hostel){
		if ( preg_match('/^Insti/' , $row['instielec']) or $row['instielec'] == 'HAS' or $row['instielec'] == 'Cul-Art' or $row['instielec'] == 'councillor' or $row['instielec'] == 'Co-CAS' or $row['instielec'] == 'AAS')
			echo"<tr>
		<td>{$row['username']}</td>
		<td>{$irow['fullname']}</td>
		<td>{$irow['hostel']}</td>
		<td>{$row['instielec']}</td>
		<td><a href ='http://students2.iitm.ac.in/files/Election2013/manifesto/{$row['manifesto']}'>Manifesto</a></td>
		<td><a href ='http://students2.iitm.ac.in/files/Election2013/manifesto/{$row['manifestowriteup']}'>Manifesto writeup</a></td>
	     </tr>";
	}

	else if ( $irow['hostel'] == $hostel )
	echo"<tr>
		<td>{$row['username']}</td>
		<td>{$irow['fullname']}</td>
		<td>{$irow['hostel']}</td>
		<td>{$row['instielec']}</td>
		<td><a href ='http://students2.iitm.ac.in/files/Election2013/manifesto/{$row['manifesto']}'>Manifesto</a></td>
		<td><a href ='http://students2.iitm.ac.in/files/Election2013/manifesto/{$row['manifestowriteup']}'>Manifesto writeup</a></td>
	     </tr>";
}

echo"</table></div></div>";
?>
