<?php
	include("../../db.php");
	
	$ip=$_SERVER["REMOTE_ADDR"];
	$error = 2;
	
	if(isset($_POST['submit1'])){
		
		if(!empty($_POST['rollno']) && !empty($_POST['name'])){
			
			$task = "Passowrd reset";
			$sql = "INSERT INTO support(task, rollno, name ,ip) VALUES('$task', '{$_POST['rollno']}', '{$_POST['name']}', '$ip')";
			$cxn = mysql_query($sql);
			
		}
		else $error = 3;
		
	}
	
	if(isset($_POST['submit2'])){
		
		if(!empty($_POST['rollno']) && !empty($_POST['name']) && !empty($_POST['query'])){
		
			$task = "Edit profile";
			$sql = "INSERT INTO support(task, rollno, name, query, ip) VALUES('$task', '{$_POST['rollno']}', '{$_POST['name']}', '{$_POST['query']}', '$ip')";
			$cxn = mysql_query($sql);
			
		}
		else $error = 3;
		
	}
	
	if(isset($_POST['submit3'])){
		
		if(!empty($_POST['rollno']) && !empty($_POST['name']) && !empty($_POST['roomno']) && !empty($_POST['hostel'])){
		
			$task = "Account creation";
			$sql = "INSERT INTO support(task, rollno, name, roomno, hostel, ip) VALUES('$task', '{$_POST['rollno']}', '{$_POST['name']}', '{$_POST['roomno']}', '{$_POST['hostel']}', '$ip')";
			$cxn = mysql_query($sql);
			
		}
		else $error = 3;
		
	}
	
	if($cxn){
		//$error = 4;
		header("Location: ../../support.php?success");
	}
	else
		header("Location: ../../support.php?error=$error");
?>