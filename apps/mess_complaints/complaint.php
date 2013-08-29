<?php
	session_start();
	include_once("../../db.php");
	
	if(isset($_SESSION['uname']))
	{
		if(isset($_GET['hostel']) AND isset($_GET['room']) AND isset($_GET['desired']) AND isset($_GET['reason']) )
			{
				$hostel = $_GET['hostel'];
				$room = $_GET['room'];
				$desired_mess = $_GET['desired'];
				$reason = $_GET['reason'];
				$uname = $_SESSION['uname'];

				$q = "SELECT * FROM mess_complaints WHERE roll_no like '$uname'";
				$res = mysql_query($q);
			
				if(mysql_num_rows($res))
					{
					$error = "Your request has been accepted and is under processing";
					header('Location: complainting.php?mess_complaint='.$error);
					}
				else
					{
						if( !empty($hostel) && !empty($room) && !empty($desired_mess) && !empty($reason) )
							{
								$query = "INSERT INTO mess_complaints(roll_no, hostel, room, desired_mess, reason ) VALUES ('$uname', '$hostel', '$room', '$desired_mess', '$reason')";
								$result = mysql_query($query);
								$error = "Successfully submitted your request";
								header('Location: complainting.php?mess_complaint='.$error);
							}
						else
							{
								$error = "One or more fields are empty.";
								header('Location: complainting.php?mess_complaint='.$error);
							}
					}
			}
	}
