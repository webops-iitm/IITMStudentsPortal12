<?php
	session_start();
	
	include ('../../db.php');
//	$uname = "name";
	$uname = $_SESSION['uname'];
/*	$uname = strtolower($uname);
	
	$user = $uname;
	$name = $_POST['name'];
	$nick = $_POST['nick'];
	$room = $_POST['room'];
	$hostel = $_POST['hostel'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
    $bgroup = $_POST['bgroup'];
	
	echo $uname;
	echo "<br>";
	
	$sqlprof = "UPDATE users SET nick='$nick', contact = '$contact', email = '$email', bgroup = '$bgroup' WHERE username='$uname'";
	
	mysql_query($sqlprof) or die(mysql_error($con));
*/	
	if(isset($_POST['eduform'])){
		$qualihead = $_POST['qualiothers'];
		$qualidesc = $_POST['qualidesc'];
	    $qualiscore = $_POST['qualiscore'];
		
		$category = 1;
		$subcategory = 1;
		// sql query to check the subcategory number in the category in stu_profil
		
		$sqlchecksubs = "SELECT subcat_id, status FROM stu_education WHERE username='$uname' AND cat_id='$category'";
		$checksubsresult = mysql_query($sqlchecksubs);
		while($checksubsrow = mysql_fetch_array($checksubsresult))
  		{
			if($subcategory<=$checksubsrow['subcat_id'])$subcategory+=1;
  		}
		$checksubsresult = mysql_query($sqlchecksubs);
		echo $subcategory;
		$checksubsrow = mysql_fetch_array($checksubsresult);
		if($checksubsrow==""){
				$sqladdsub="INSERT INTO stu_education(cat_id, subcat_id, desc, head, score, username, status) VALUES($category, $subcategory, '$qualidesc', '$qualihead', '$qualiscore', '$uname', 2)";
				echo $sqladdsub;
				if(!mysql_query($sqladdsub))die(mysql_error());
				echo "done";
	}
		do{
			echo $subcategory;
			if($checksubsrow['subcat_id']==$subcategory && $checksubsrow['status']!=2)//2 stands for pending
			{
				$sqladdsub="INSERT INTO stu_education (cat_id, subcat_id, desc, head, score, username, status) VALUES ($category, $subcategory, '$qualidesc', '$qualihead', '$qualiscore', '$uname', 2)";
				mysql_query($sqladdsub);
				echo "done";
			}
			
  		}while($checksubsrow = mysql_fetch_array($checksubsresult));
  		
		
		echo $checksubsrow;
		//sql query to submit into stu_profile including $category
		echo $qualihead.$qualidesc.$qualiscore;
	}
	
//	header('Location: ../../index.php');
	
	mysql_close($con);	
?>