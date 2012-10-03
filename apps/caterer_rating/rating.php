<?php
	include("../../db.php");
	include("caterer.php");

	session_start();
	
	
	if (isset($_SESSION['uname']))
		{
		
			$loggedin=1;
		
			$query="SELECT * FROM mess_rating WHERE user_id='{$_SESSION['uid']}' AND mess_instance_id='$mess_instance_id'";
			$result = @mysql_query($query);
		
			$count = @mysql_num_rows($result);
		
				if($count == 1)
				{
					$row = mysql_fetch_array($result);
					
					$rated = 1;
	
					$cat = $row['caterer'];
					$hyg = $row['hyg'];
					$qtn = $row['qtn'];
					$qlt = $row['qlt'];
					$csm = $row['csm'];
				}
				else
				
					$rated = 0;
		}
	else $loggedin = 0;
	
?>

		<div class="widget-header">
			<i class="icon-comment"></i>
			<h3>Submit caterer rating</h3>
		</div> <!-- /widget-header -->
		<div class="widget-content">						
		
					<?php
							if(!$loggedin) echo"Please login to continue";
							
							else include"rating_content.php";
					?>	
	
	

		</div>

