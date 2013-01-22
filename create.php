<?php
	include("db.php");
	$create="CREATE TABLE IF NOT EXISTS `requests` (
	  `id` int(10) NOT NULL AUTO_INCREMENT,
	  `name` varchar(150) NOT NULL,
	  `rollnum` varchar(10) NOT NULL,
	  `hostel` varchar(50) NOT NULL,
	  `roomnumber` varchar(10) NOT NULL,
	  `cardnum` bigint(200) NOT NULL,
	  PRIMARY KEY (`id`)
	)";
	$query=mysql_query($create);
	if(!$query){
		echo "table not created";
	}
	else{
		echo "table created";
	}
	mysql_close();
?>