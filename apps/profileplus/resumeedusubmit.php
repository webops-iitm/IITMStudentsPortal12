<?php
	session_start();
	
	include ('../../db.php');
	$uname = 'name';
//	$uname = $_SESSION['uname'];
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

/*	if($edudone==1)	
	header('Location: ../../index.php?edit=2');
	else
	header('Location: ../../index.php?edit=1');
	
	mysql_close($con);	*/
?>