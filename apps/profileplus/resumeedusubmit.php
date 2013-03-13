<?php
	session_start();
	
	include ('../../db.php');
//	$user = 'name';
	$uname = $_SESSION['uname'];
	$uname = strtolower($uname);
/*	
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
	$edudone=0;
	
	if(isset($_POST['eduform'])){
		$qualihead = $_POST['qualiothers'];
		$qualidesc = $_POST['qualidesc'];
	    $qualiscore = $_POST['qualiscore'];
	    $qualidept = $_POST['qualidept'];
		
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
		
		while($checksubsrow = mysql_fetch_array($checksubsresult))
  		{
			echo $subcategory.$checksubsrow['subcat_id']."-->";
			if($checksubsrow['subcat_id']==$subcategory-1)
			{
				if($checksubsrow['status']==2)//2 stands for pending
				{
					$sqladdsub="UPDATE stu_education SET `desc` = '$qualidesc', head = '$qualihead', dept = '$qualidept', score = '$qualiscore' WHERE username = '$uname'";			
					echo $sqladdsub;
					mysql_query($sqladdsub);
					$edudone = 1;
				
				}
			}
  		}
		if($edudone!=1)
		{
			$sqladdsub="INSERT INTO stu_education (`cat_id`, `subcat_id`, `desc`, `head`, `dept`, `score`, `username`, `status`) VALUES ($category, $subcategory, '$qualidesc', '$qualihead', '$qualidept', '$qualiscore', '$uname', 2)";
			mysql_query($sqladdsub);
			$edudone = 1;
		}
		echo $checksubsrow;
		//sql query to submit into stu_profile including $category
		echo $qualihead.$qualidesc.$qualiscore;
	}
	
//	header('Location: ../../index.php');
	
	mysql_close($con);	
?>