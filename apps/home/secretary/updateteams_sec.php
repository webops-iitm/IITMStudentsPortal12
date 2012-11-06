<?php
	include("../../../db.php");
	

	session_start();
	
	if (isset($_COOKIE["user"]))
		$_SESSION['uname'] = $_COOKIE["user"];
		
	include("../../../config.php");
	
	if($loggedin == 0)		
		die("Please Login to continue");

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
<div style="float:left; margin-left:10px;  min-height:340px; width:520px;" class="widget-contentsec" id="inner_body_sec">
<div class="dropdown clearfix">
	<ul class="muted dropdown-menu" style="display: block; position: static; min-width: 100%; ">
		<li><a href="javascript:update('apps/home/secretary/addteam_sec.php', 'inner_body_sec');" id="add">Add a new Team</a></li>
		<li><a href="javascript:update('apps/home/secretary/deleteteam_sec.php', 'inner_body_sec');" id="delete">Delete a Team</a></li>
		<li class="divider"></li>
		<?php
			while ($row = mysql_fetch_row($result, MYSQL_ASSOC)) {
    			echo( "<li><a href=\"javascript:update('apps/home/secretary/updateshowteam_sec.php?team_id=".$row["team_id"]."', 'inner_body_sec');\" id='".$row['team_id']."'> ".$row['team_name'] ." </a></li>");
    		}
		?>
	</ul>
</div>
</div>
