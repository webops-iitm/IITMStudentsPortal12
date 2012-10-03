<?php
	session_start();
	include_once("../../db.php");
	include("caterer.php");
	
	
	if(isset($_SESSION['uname']))
	{
		if(isset($_GET['cat']) AND isset($_GET['hyg']) AND isset($_GET['qtn']) AND isset($_GET['qlt']) AND isset($_GET['csm']))
			{
				$cat = $_GET['cat'];
				$hyg = $_GET['hyg'];
				$qtn = $_GET['qtn'];
				$qlt = $_GET['qlt'];
				$csm = $_GET['csm'];
				$uid = $_SESSION['uid'];

				$q = "SELECT * FROM mess_rating WHERE user_id = '$uid' AND mess_instance_id = '$mess_instance_id'";
				$res = mysql_query($q);
			
				if(mysql_num_rows($res))
					{
					$error = "Allowed to rate only once per month";
					header('Location: ../../index.php?ratingerror='.$error);
					}
				else
					{
						if($cat!='-1' && $hyg!='-1' && $qtn!='-1' && $qlt!='-1' && $csm != '-1')
							{
								$query = "INSERT INTO mess_rating(mess_instance_id, user_id, caterer, hyg, qtn, qlt, csm) VALUES ('$mess_instance_id', '$uid', '$cat', '$hyg', '$qtn', '$qlt', '$csm')";
								$result = mysql_query($query);
								header('Location: ../../index.php?ratingerror=0');
							}
						else
							{
								$error = "Please select the mess and ratings";
								header('Location: ../../index.php?ratingerror='.$error);
							}
					}
			}
	}
	include("rating.php");