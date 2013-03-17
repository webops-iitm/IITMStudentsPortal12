<?php
	session_start();
	
	include ('../../db.php');
//	$uname = "name";
	$uname = $_SESSION['uname'];
	$uname = strtolower($uname);
	
	$postcat = $_POST['qualicat_id'];
	$postsubcat = "qualisubcat_".$postcat;
	$posttitle = "qualititle_".$postcat;
	$postdesc = "qualidesc_".$postcat;
	$posttimeline = "qualitimeline_".$postcat;
	$postform = "form_".$postcat;

	
	if(isset($_POST[$postform])){
		

		$qualicat = $postcat;
		$qualisubcat = strtoupper($_POST[$postsubcat]);
	    $qualititle = $_POST[$posttitle];
	    $qualidesc = $_POST[$postdesc];
		$qualitimeline = $_POST[$posttimeline];
		
		// sql query to check the subcategory number in the category in stu_profil
		$sqlcatdel = "DELETE FROM student_profile WHERE username='$uname' AND `desc` = '$qualidesc' AND title = '$qualititle' AND cat_id = '$qualicat' AND subcat_name = '$qualisubcat'";
		echo $sqlcatdel;
		mysql_query($sqlcatdel);
		header('Location: ../../index.php?delete=2');	
		
	}
	
	

?>