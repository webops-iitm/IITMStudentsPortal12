<?php
	session_start();
	include_once("../../db.php");
	
	if(isset($_SESSION['uname']))
	{
		if(isset($_GET['pre']) AND isset($_GET['alloted']) AND isset($_GET['desired']) AND isset($_GET['reason']) )
			{
				$pre_mess = $_GET['pre'];
				$alloted_mess = $_GET['alloted'];
				$desired_mess = $_GET['desired'];
				$reason = $_GET['reason'];
				$uid = $_SESSION['uid'];

				$q = "SELECT * FROM mess_complaints WHERE user_id = '$uid'";
				$res = mysql_query($q);
			
				if(mysql_num_rows($res))
					{
					$error = "Your request has been accepted and is under processing";
					header('Location: complainting.php?mess_complaint='.$error);
					}
				else
					{
						if( !empty($pre_mess) && !empty($alloted_mess) && !empty($desired_mess) && !empty($reason) )
							{
								$query = "INSERT INTO mess_complaints(user_id, pre_mess, alloted_mess, desired_mess, reason ) VALUES ('$uid', '$pre_mess', '$alloted_mess', '$desired_mess', '$reason')";
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
