<?php
	session_start();
	include_once("../../db.php");
	//include_once("caterer.php");
	$date = date('Y-m-d');
	
	if(isset($_SESSION['uname']))
	{
		if(isset($_GET['cat']) AND isset($_GET['hyg']) AND isset($_GET['qtn']) AND isset($_GET['qlt']) AND isset($_GET['csm']))
			{
				$cat = $_GET['cat'];
				$hyg = $_GET['hyg'];
				$qtn = $_GET['qtn'];
				$qlt = $_GET['qlt'];
				$csm = $_GET['csm'];
				$remark = $_GET['remark'];
				$uid = $_SESSION['uid'];

				$q = "SELECT * FROM mess_rating WHERE user_id = '$uid' AND date='$date'";
				$res = mysql_query($q);
			
				if(mysql_num_rows($res))
					{
					$error = "Allowed to rate only once per month";
					header('Location: rating.php?mess_rating='.$error);
					}
				else
					{
						if($cat!='-1' && $hyg!='-1' && $qtn!='-1' && $qlt!='-1' && $csm != '-1')
							{
								$query = "INSERT INTO mess_rating(user_id, caterer, hyg, qtn, qlt, csm, remark, date) VALUES ('$uid', '$cat', '$hyg', '$qtn', '$qlt', '$csm', '$remark', '$date')";
								$result = mysql_query($query);
								$error = "Successfully submitted your rating";
								header('Location: rating.php?mess_rating='.$error);
							}
						else
							{
								$error = "One or more fields are empty. Please select the mess and ratings";
								header('Location: rating.php?mess_rating='.$error);
							}
					}
			}
	}
