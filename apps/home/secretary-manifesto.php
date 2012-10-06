<?php
	include("../../db.php");

	session_start();
	
	if (isset($_SESSION['uname']))  $loggedin=1;
	else $loggedin = 0;
	
?>

		<div class="widget-header">
			<i class="icon-comment"></i>
			<h3>Secretary Manifesto</h3>
		</div> <!-- /widget-header -->
		<div class="widget-content">						
		
					<?php
							if(!$loggedin) echo"Please login to continue";
							
							else {
					?>
									<a href="#" >Academic Affairs Secretary</a><br><br>
									<a href="#" >Cultural Affairs Secretary(arts)</a><br><br>
									<a href="#" >General Secretary</a><br><br>
									<a href="#" >Cultural Affairs Secretary(Literary)</a><br><br>
									<a href="#" >Hostel Affairs Secretary</a><br><br>
									<a href="#" >Co-Curricular Affairs Secretary</a><br><br>
									<a href="#" >Research Affairs Secretary</a><br><br>
									<a href="#" >SAC Speaker</a><br><br>
									<a href="#" >Sports Secretary</a><br><br>
					
					<?php } ?>
		</div>
