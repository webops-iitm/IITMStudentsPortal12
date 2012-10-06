<?php
	session_start();
	include ('../../../db.php');
	$_GET
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
	<ul class="dropdown-menu" style="display: block; position: static; min-width: 100%; ">
		<li><h3><?php ?></n3></li>
		<li><a href="javascript:update('apps/home/secretary/deleteteam_sec.php', 'inner_body_sec');" id="delete">Delete a Team</a></li>
		<li class="divider"></li>
		<?php
			while ($row = mysql_fetch_row($result, MYSQL_ASSOC)) {
    			echo( "<li><a href=\"javascript:update('apps/home/secretary/updateshowteam_sec.php', 'inner_body_sec');\" id='".$row['team_id']."'> ".$row['team_name'] ." </a></li>");
    		}
		?>
	</ul>
</div>

