<?php
	session_start();
	
	include ('../../db.php');
	$uname = 'name';
//	$uname = $_SESSION['uname'];
	$uname = strtolower($uname);

	$postcat = mysql_real_escape_string(stripslashes($_POST['qualicat_id']));
	$postsubcat = "qualisubcat_".$postcat;
	$posttitle = "qualititle_".$postcat;
	$postdesc = "qualidesc_".$postcat;
	$posttimeline = "qualitimeline_".$postcat;
	$postform = "form_".$postcat;
	$postaction = "qualiformuse_".$postcat;
	$postoldtitle = "QualiTitle_Old_Id_".$postcat;
	
	$catdone=0;
		echo $postform;
		
	if(isset($_POST[$postform])){
		echo "working";
		$qualicat = mysql_real_escape_string(stripslashes($postcat));
		$qualisubcat = mysql_real_escape_string(stripslashes(strtoupper($_POST[$postsubcat])));
	    $qualititle = mysql_real_escape_string(stripslashes($_POST[$posttitle]));
	    $qualidesc = mysql_real_escape_string(stripslashes($_POST[$postdesc]));
		$qualitimeline = mysql_real_escape_string(stripslashes($_POST[$posttimeline]));
		$qualiform = mysql_real_escape_string(stripslashes($_POST[$postform]));
		$qualiaction = mysql_real_escape_string(stripslashes($_POST[$postaction]));
		$qualioldtitle = mysql_real_escape_string(stripslashes($_POST[$postoldtitle]));

		if($qualicat=="" || $qualititle=="" || $qualidesc=="" || $qualidept=="")
		{
			header('Location: ../../index.php?edit=1');	
		}
			
		
		
		$subcatid = 1;
		$titleid = 1;
		$subfound = 0;
		// sql query to check the subcategory number in the category in stu_profil
		$sqlchecksubs = "SELECT subcat_id, subcat_name FROM student_profile WHERE username='$uname' AND cat_id='$qualicat'";
		$checksubsresult = mysql_query($sqlchecksubs);
		while($checksubsrow = mysql_fetch_array($checksubsresult))
  		{
			if($subcatid<=$checksubsrow['subcat_id'])$subcatid+=1;
			if($qualisubcat == $checksubsrow['subcat_name']){$subcatid=$checksubsrow['subcat_id'];$subfound=1;break;}
  		}
		echo $subfound;
		if($subfound==1);
		{
			$sqlchecksubs = "SELECT title, title_id, status FROM student_profile WHERE username='$uname' AND cat_id='$qualicat' AND subcat_id='$subcatid'";
		
			$checksubsresult = mysql_query($sqlchecksubs);
			while($checksubsrow = mysql_fetch_array($checksubsresult))
  			{
				if($titleid<=$checksubsrow['title_id'])$titleid+=1;
				if($checksubsrow['title']==$qualioldtitle)$titleoldid=$checksubsrow['title_id'];
			}
			$checksubsresult = mysql_query($sqlchecksubs);
		echo $qualiaction;
		if($qualiaction=="edit")
		{
			$sqladdsub="UPDATE student_profile SET title='$qualititle', `desc` = '$qualidesc', timeline = '$qualitimeline', status = 2 WHERE username = '$uname' AND cat_id='$qualicat' AND subcat_id='$subcatid' AND title_id='$titleoldid'";			
					echo $sqladdsub;
					mysql_query($sqladdsub);
					$catdone = 1;
		}
		while($checksubsrow = mysql_fetch_array($checksubsresult))
  		{
			if($checksubsrow['title']==$qualititle)
			{
				if($checksubsrow['status']==2)//2 stands for pending
				{
					$sqladdsub="UPDATE student_profile SET `desc` = '$qualidesc', timeline = '$qualitimeline' WHERE username = '$uname' AND cat_id='$qualicat' AND subcat_id='$subcatid' AND title='$qualititle'";			
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
			echo "-->".$sqladdsub;
			mysql_query($sqladdsub);
			$catdone = 1;
		}
		//sql query to submit into stu_profile including $category
	}

//	if($catdone==1)	
//	header('Location: ../../index.php?edit=2');
//	else
//	header('Location: ../../index.php?edit=1');
	
	mysql_close($con);	
?>