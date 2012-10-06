<?php
	session_start();
	include ('../../../db.php');
		
	$sql = "SELECT * FROM stu_sec_teams WHERE secretary_username='$user'";
	$result = mysql_query($sql);
			
?>
<style>
	.dropdown-menu li a {
		color: #ccc;
		text-decoration: none;
		
	}

	.dropdown-menu li a:hover {
		color: #fff;
		text-decoration: none;
	}
	
</style>

<div class="dropdown clearfix" >
	<ul class="muted dropdown-menu" style="display: block; position: static; min-width: 100%; ">
		<?php
			while ($row = mysql_fetch_row($result, MYSQL_ASSOC)) {
    			echo( "<li><a href=\"javascript:update('apps/home/secretary/updateshowteam_sec.php?team_id=".$row['team_id']."', 'inner_body_sec');\" id='".$row['team_id']."'> ".$row['team_name'] ." </a></li>");
    		}
		?>
	</ul>
</div>

