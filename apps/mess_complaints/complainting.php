<?php
	include("../../db.php");

	session_start();
	
	
	if (isset($_SESSION['uname']))
		{
		
			$loggedin=1;
			
			$query="SELECT * FROM mess_complaints WHERE user_id='{$_SESSION['uid']}'";
			$result = @mysql_query($query);
		
			$count = @mysql_num_rows($result);
		
				if($count == 1)
				{
					$row = mysql_fetch_array($result);
					
					$complaint = 1;
				
					$pre_mess = $row['pre_mess'];
					$alloted_mess = $row['alloted_mess'];
					$desired_mess = $row['desired_mess'];
					$reason = $row['reason'];
				}
				else
				
					$complaint = 0;
		}
	else $loggedin = 0;
	
?>

		<div class="widget-header">
			<i class="icon-comment"></i>
			<h3>Mess Grievances Portal </h3>
		</div> <!-- /widget-header -->
		<div class="widget-content"  id= "widget-content">						
		
					<?php
							if(!$loggedin) echo"Please login to continue";
							
							else include"mess_complaint_form.php";
					?>	
	
	

		</div>

