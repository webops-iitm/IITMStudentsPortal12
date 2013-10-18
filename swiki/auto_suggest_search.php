<?php

	$swiki->Vars = mysql_real_escape_string( htmlspecialchars($swiki->Vars) ); 
	//$res = mysql_query("SELECT `swiki`.`name` FROM `students`.`swiki` WHERE Match(name, brief_content, content) AGAINST ('$swiki->Vars' IN BOOLEAN MODE)");
	$res = mysql_query("SELECT `swiki`.`name` FROM `students`.`swiki` WHERE (`name` LIKE '%".$swiki->Vars."%') OR (`link` LIKE '%".$swiki->Vars."%') OR (`brief_content` LIKE '%".$swiki->Vars."%') LIMIT 0,6 ");
	while($row = mysql_fetch_array($res) ) {
		$return[] =  $row['name'];
	}
	$return = array_map(utf8_encode, $return);
	echo json_encode($return);

 
?>
