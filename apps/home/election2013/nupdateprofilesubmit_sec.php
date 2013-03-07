<?php
	

	
	session_start();
	
	include ('../../../db.php');
	
	$uname = $_SESSION['uname'];
	$uname = strtolower($uname);
	$user = $uname;
	if( isset($_POST['name']) ) $name = $_POST['name'];
	if( isset($_POST['nick']) ) $nick = $_POST['nick'];
	if( isset($_POST['room']) ) $room = $_POST['room'];
	if( isset($_POST['hostel']) ) $hostel = $_POST['hostel'];
	if( isset($_POST['contact']) ) $contact = $_POST['contact'];
	if( isset($_POST['email']) ) $email = $_POST['email'];
	if( isset($_POST['bgroup']) ) $bgroup = $_POST['bgroup'];
	
	
	// Pic Restriction
	$allowedExts = array("jpg", "jpeg", "gif", "png", "");
$extension = end(explode(".", $_FILES["dpic"]["name"]));
if ((($_FILES["dpic"]["type"] == "image/gif")
|| ($_FILES["dpic"]["type"] == "image/jpeg")
|| ($_FILES["dpic"]["type"] == "")
|| ($_FILES["dpic"]["type"] == "image/png")
|| ($_FILES["dpic"]["type"] == "image/pjpeg"))
&& ($_FILES["dpic"]["size"] < 5000000)
&& in_array($extension, $allowedExts))
  {
	if( isset($_FILES['dpic']) ) { // check for picture
		
		
		$dpic = $_FILES['dpic'];
		$disp_pic = $user.$dpic["name"];
		if ( $disp_pic != $user ) { // so as to not change when nothing was chosen
			//echo substr(sprintf('%o', fileperms("files")), -4) == "0774" ? "true" : "false";
			//die(fileperms("../../../files"));
			// upload pic first
			if ( ! is_writable("../../../files/Election2013/pics") )
			{
				die("Folder is not writable : ../../../files/Election2013/pics/ ");
				
				$dpic = 0;
			}
			move_uploaded_file($dpic["tmp_name"], "../../../files/Election2013/pics/".$disp_pic);			
			}			
		else
		$dpic = 0;
	}
	else
	$dpic = 0;
	} else
	{
		die("Only jpg/jpeg/gif/png images of size less than 5MB are allowed. Please try again.");
		$dpic = 0;
	}
	
	
	$allowedExts = array("pdf", "");
$extension = end(explode(".", $_FILES["manifesto"]["name"]));
if ((($_FILES["manifesto"]["type"] == "application/pdf")
|| ($_FILES["manifesto"]["type"] == ""))
&& ($_FILES["manifesto"]["size"] < 5000000)
&& in_array($extension, $allowedExts))
  {
	if( isset($_FILES['manifesto']) ) { // check for manifesto
		$mani_file = $_FILES['manifesto'];
		$manifesto = $user.$mani_file["name"];
		echo $manifesto;
		if ( $manifesto != $user ) { // so as to not change if nothing was chosen
			//echo substr(sprintf('%o', fileperms("files")), -4) == "0774" ? "true" : "false";
			//die(fileperms("../../../files"));
			// upload pic first
			if ( ! is_writable("../../../files/Election2013/manifesto/") )
			{
				die("Folder is not writable : ../../../files/Election2013/manifesto/");
				$mani_file = 0;
		}
			move_uploaded_file($mani_file["tmp_name"], "../../../files/Election2013/manifesto/".$manifesto);
				}
				else
		$mani_file = 0;
	} else
		$mani_file = 0;
		} else
	{
		die("Only PDF files of size less than 5MB are allowed. Please try again.");
		$mani_file = 0;
	}
	
	//writeup 1	
	$allowedExts = array("pdf", "");
$extension = end(explode(".", $_FILES["manifestow"]["name"]));
if ((($_FILES["manifestow"]["type"] == "application/pdf")
|| ($_FILES["manifestow"]["type"] == ""))
&& ($_FILES["manifestow"]["size"] < 5000000)
&& in_array($extension, $allowedExts))
  {
	if( isset($_FILES['manifestow']) ) { // check for manifesto
		$mani_filew = $_FILES['manifestow'];
		$manifestow = $user.$mani_filew["name"];
		echo $manifestow;
		if ( $manifestow != $user ) { // so as to not change if nothing was chosen
			//echo substr(sprintf('%o', fileperms("files")), -4) == "0774" ? "true" : "false";
			//die(fileperms("../../../files"));
			// upload pic first
			if ( ! is_writable("../../../files/Election2013/manifesto/") )
			{
				die("Folder is not writable : ../../../files/Election2013/manifesto/");
			
			}
			move_uploaded_file($mani_filew["tmp_name"], "../../../files/Election2013/manifesto/".$manifestow);
			
	} else
		$mani_filew = 0;
	}
	else
		$mani_filew = 0;
			} else
	{
		die("Only PDF files of size less than 5MB are allowed. Please try again.");
		$mani_filew = 0;
	}
	//writeup end 1 
		
	if(isset($_POST['update_elec'])){
		$hostelelec = $_POST['hostelelec'];
		$instielec = $_POST['instielec'];
		
			$sqlgen = "UPDATE users SET nick='$nick', contact = '$contact', email = '$email', bgroup = '$bgroup' WHERE username='$uname'";
			mysql_query($sqlgen) or die(mysql_error($con));
		
		
		if($instielec != "None")
		{
			$sqlinsti = "UPDATE election2013 SET instielec = '$instielec' WHERE username='$uname'";
		
			mysql_query($sqlinsti) or die(mysql_error($con));
		}
		if($hostelelec!="None")
		{
			$sqlhostel = "UPDATE election2013 SET hostelelec = '$hostelelec' WHERE username='$uname'";
			mysql_query($sqlhostel) or die(mysql_error($con));
		}
	}
	
	if($dpic != 0){ // put dpic in sql
		$sql = "UPDATE election2013 SET pic='$disp_pic' WHERE username='$uname'";
		//die($sql);
		$query = mysql_query($sql);// or die(mysql_error($con));
		if(!$query)
			echo "<b>Failed to send request</b>";
		else
			echo "<b>Your request 1 has been successfully submitted</b>";
	}
	
	// echo $sql
	if( $mani_file != 0 ){ // put manifesto in sql
		$sql = "UPDATE election2013 SET manifesto='$manifesto' WHERE username='$uname'";
		//die($sql);
		$query = mysql_query($sql);// or die(mysql_error($con));
		if(!$query)
			echo "<b>Failed to send request</b>";
		else
			echo "<b>Your request 2 has been successfully submitted</b>";
	}
	
	//writeup 2
	if( $mani_filew != 0 ){ // put manifesto in sql
		$sql = "UPDATE election2013 SET manifestowriteup='$manifestow' WHERE username='$uname'";
		//die($sql);
		$query = mysql_query($sql);// or die(mysql_error($con));
		if(!$query)
			echo "<b>Failed to send request</b>";
		else
			echo "<b>Your request 2 has been successfully submitted</b>";
	}
	
	header('Location: ../../../interactionmsgs.php');
	
	mysql_close($con);	
?>
