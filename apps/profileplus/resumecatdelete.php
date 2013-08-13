<?php
	session_start();
	
	include ('../../db.php');
//	$uname = "name";
	$uname = $_SESSION['uname'];
	$uname = strtolower($uname);
	
	$postcat = mysql_real_escape_string(stripslashes($_POST['qualicat_id']));
	$postsubcat = "qualisubcat_".$postcat;
	$posttitle = "qualititle_".$postcat;
	$postdesc = "qualidesc_".$postcat;
	$posttimeline = "qualitimeline_".$postcat;
	$postform = "form_".$postcat;

	
	if(isset($_POST[$postform])){
		

		$qualicat = mysql_real_escape_string(stripslashes($postcat));
		$qualisubcat = mysql_real_escape_string(stripslashes(strtoupper($_POST[$postsubcat])));
	    $qualititle = mysql_real_escape_string(stripslashes($_POST[$posttitle]));
	    $qualidesc = mysql_real_escape_string(stripslashes($_POST[$postdesc]));
		$qualitimeline = mysql_real_escape_string(stripslashes($_POST[$posttimeline]));
		
		// sql query to check the subcategory number in the category in stu_profil
		$sqlcatdel = "DELETE FROM student_profile WHERE username='$uname' AND `desc` = '$qualidesc' AND title = '$qualititle' AND cat_id = '$qualicat' AND subcat_name = '$qualisubcat'";
		echo $sqlcatdel;
		mysql_query($sqlcatdel);
		header('Location: ../../index.php?delete=2');	
		
	}
	else
	{
		header('Location: ../../index.php?delete=1');	
	}
	
	

?>