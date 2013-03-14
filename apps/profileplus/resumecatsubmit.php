<?php
	session_start();
	
	include ('../../db.php');
	$uname = 'name';
//	$uname = $_SESSION['uname'];
	$uname = strtolower($uname);

	$qualicatname = $_POST['qualicatname'];	
	$postcat = $qualicatname."qualicat";
	$postsubcat = $qualicatname."qualisubcat";
	$posttitle = $qualicatname."qualititle";
	$postdesc = $qualicatname."qualidesc";
	$posttimeline = $qualicatname."qualitimeline";
	$postform = $qualicatname."form";
	
	$catdone=0;
		echo $postform;
	if(isset($_POST[$postform])){
		echo "working";
		$qualicat = $_POST[$postcat];
		$qualisubcat = strtoupper($_POST[$postsubcat]);
	    $qualititle = $_POST[$posttitle];
	    $qualidesc = $_POST[$postdesc];
		$qualitimeline = $_POST[$posttimeline];
		
		$subcatid = 1;
		$titleid = 1;
		$subfound = 0;
		// sql query to check the subcategory number in the category in stu_profil
		$sqlchecksubs = "SELECT subcat_id, subcat_name FROM student_profile WHERE username='$uname' AND cat_id='$qualicat'";
		$checksubsresult = mysql_query($sqlchecksubs);
		while($checksubsrow = mysql_fetch_array($checksubsresult))
  		{
			if($subcategory<=$checksubsrow['subcat_id'])$subcategory+=1;
			if($qualisubcat == $checksubrow['subcat_name']){$subcategory=$checksubrow['subcat_id'];$subfound=1;break;}
  		}
		echo $subcategory;
		if($subfound==1);
		{
			$sqlchecksubs = "SELECT title_id, status FROM student_profile WHERE username='$uname' AND cat_id='$qualicat' AND subcat_id='$subcatid'";
		
			$checksubsresult = mysql_query($sqlchecksubs);
			while($checksubsrow = mysql_fetch_array($checksubsresult))
  			{
				if($titleid<=$checksubsrow['title_id'])$titleid+=1;
			}
		
		
		while($checksubsrow = mysql_fetch_array($checksubsresult))
  		{
			echo $subcategory.$checksubsrow['subcat_id']."-->";
			if($checksubsrow['title_id']==$subcategory-1)
			{
				if($checksubsrow['status']==2)//2 stands for pending
				{
					$sqladdsub="UPDATE student_profile SET `title` = '$qualititle', `desc` = '$qualidesc', timeline = '$qualitimeline' WHERE username = '$uname' AND cat_id='$qualicat' AND subcat_id='$subcatid' AND title_id='$titleid'";			
					echo $sqladdsub;
					mysql_query($sqladdsub);
					$catdone = 1;
				
				}
			}
  		}
		}
		if($catdone!=1)
		{
			$sqladdsub="INSERT INTO student_profile (`cat_id`, `subcat_id`, `subcat_name`, `title`, `title_id`, `timeline`, `desc`, `username`, `status`) VALUES ($qualicat, $subcatid, '$qualisubcat', '$qualititle', '$titleid', '$qualitimeline', '$qualidesc', '$uname', 2)";
			mysql_query($sqladdsub);
			$catdone = 1;
		}
		//sql query to submit into stu_profile including $category
	}

/*	if($catdone==1)	
	header('Location: ../../index.php?cat=2');
	else
	header('Location: ../../index.php?cat=1');
*/	
	mysql_close($con);	
?>