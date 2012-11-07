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
	if( isset($_FILES['dpic']) ) { // check for picture
		$dpic = $_FILES['dpic'];
		$disp_pic = $user.$dpic["name"];
     //echo substr(sprintf('%o', fileperms("files")), -4) == "0774" ? "true" : "false";
    //die(fileperms("../../../files"));
    // upload pic first
    if ( ! is_writable("../../../files/secretary/") )
      die("Folder is not writable : files/secretary/ ");
    move_uploaded_file($dpic["tmp_name"], "../../../files/secretary/".$disp_pic);
	} else
		$dpic = 0;
	

	if(isset($_POST['update_profile'])){
		$post = $_POST['post'];
		$tenure = $_POST['tenure'];
		$hobbies = $_POST['hobbies'];
		
		$sql = "UPDATE users SET nick='$nick', contact = '$contact', email = '$email', bgroup = '$bgroup' WHERE username='$uname'";
		mysql_query($sql) or die(mysql_error($con));
		
		$sql = "UPDATE stu_sec SET post='$post', tenure='$tenure', hobbies='$hobbies' WHERE username='$uname'";
		mysql_query($sql) or die(mysql_error($con));
	}
	
	// echo $sql
	if(isset($_POST['update_dpic'])){
		if( $dpic != 0 ){
			$sql = "UPDATE stu_sec SET pic='$disp_pic' WHERE username='$uname'";
			mysql_query($sql) or die(mysql_error($con));
		}
			
		//echo $sql;
	}
	header('Location: ../../../index.php');
	
	mysql_close($con);	
?>
