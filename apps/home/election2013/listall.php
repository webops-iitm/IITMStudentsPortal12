

<?php

include "../../../../db.php";

$sqlque = "SELECT * FROM election2013 WHERE status = '1'";
$resque = mysql_query($sqlque) or die("Permission denide");
echo"<div class ='widget-content'><div class ='table'><table>";
while( $row = mysql_fetch_assoc($resque) ){

	echo"<tr>
		<td>{$row['username']}</td>
		<td>{$row['instielec']}</td>
		<td><a href ='http://students2.iitm.ac.in/files/Election2013/manifesto/{$row['manifesto']}'>Manifesto</a></td>
		<td><a href ='http://students2.iitm.ac.in/files/Election2013/manifesto/{$row['manifestowriteup']}'>Manifesto</a></td>
	     </tr>";
}

echo"</table></div></div>";
?>
