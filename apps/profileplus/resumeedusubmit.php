<?php
	session_start();
	
	include ('../../db.php');
//	$uname = 'name';
	$uname = $_SESSION['uname'];
	$uname = strtolower($uname);

	$edudone=0;
	
	if(isset($_POST['eduform'])){
		$qualihead = mysql_real_escape_string(stripslashes($_POST['qualiothers']));
		$qualidesc = mysql_real_escape_string(stripslashes($_POST['qualidesc']));
	    $qualiscore = mysql_real_escape_string(stripslashes($_POST['qualiscore']));
	    $qualidept = mysql_real_escape_string(stripslashes($_POST['qualidept']));

		if($qualihead=="" || $qualidesc=="" || $qualidept=="")
		{
			die("I won't do! Do Whatever You want!!!!! :P");
			header('Location: ../../index.php?edit=1');	
		}
		
		$category = 1;
		$subcategory = 1;
		// sql query to check the subcategory number in the category in stu_profil
		
		$sqlchecksubs = "SELECT head,subcat_id, status FROM stu_education WHERE username='$uname' AND cat_id='$category'";
		$checksubsresult = mysql_query($sqlchecksubs);
		while($checksubsrow = mysql_fetch_array($checksubsresult))
  		{
			if($subcategory<=$checksubsrow['subcat_id'])$subcategory+=1;
  		}
		$checksubsresult = mysql_query($sqlchecksubs);
		
		while($checksubsrow = mysql_fetch_array($checksubsresult))
  		{
			echo $subcategory.$checksubsrow['subcat_id']."-->";
			if($checksubsrow['head']==$qualihead)
			{
				$head = $checksubsrow['head'];
				if($checksubsrow['status']==2)//2 stands for pending
				{
					$sqladdsub="UPDATE stu_education SET `desc` = '$qualidesc', dept = '$qualidept', score = '$qualiscore' WHERE username = '$uname' AND head = '$head'";			
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
	}

	if($edudone==1)	
	header('Location: ../../index.php?edit=2');
	else
	header('Location: ../../index.php?edit=1');
	
	mysql_close($con);	
?>