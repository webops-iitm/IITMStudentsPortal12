<?php
	session_start();
	
	include ('../../db.php');
//	$uname = "name";
	$uname = $_SESSION['uname'];
	$uname = strtolower($uname);
	

	$edudone=0;
	
	if(isset($_POST['eduform'])){
		$qualihead = $_POST['qualiothers'];
		$qualidesc = $_POST['qualidesc'];
	    $qualiscore = $_POST['qualiscore'];
	    $qualidept = $_POST['qualidept'];
		
		$category = 1;
		$subcategory = 1;
		// sql query to check the subcategory number in the category in stu_profil
		$sqledudel = "DELETE FROM stu_education WHERE username='$uname' AND `desc` = '$qualidesc' AND head = '$qualihead' AND dept = '$qualidept' AND score = '$qualiscore'";
		echo $sqledudel;
		mysql_query($sqledudel);
		
	}
	
//	header('Location: ../../index.php');
	

?>