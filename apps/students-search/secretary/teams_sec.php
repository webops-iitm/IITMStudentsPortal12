<?php
	include("../../../db.php");
	
	session_start();
    $var = $_GET['userd'];
	
	if (isset($_COOKIE["user"]))
		$_SESSION['uname'] = $_COOKIE["user"];
	
	$sql = "SELECT * FROM stu_sec_teams WHERE secretary_username='$var'";
	$team_result = mysql_query($sql);
			
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
<div style="float:left; margin-left:10px; height:260px; width:490px;" class="widget-contentsec" id="inner_body_sec">
<center>
<div class="dropdown clearfix" >
	<ul class="muted dropdown-menu" style="display: block; position: static; min-width: 100%; ">
		<?php
			while ($row = mysql_fetch_row($team_result, MYSQL_ASSOC)) {
    			echo( "<li><a href=\"javascript:update('apps/students-search/secretary/showteam_sec.php?team_id=".$row['team_id']."', 'inner_body_sec');\" id='".$row['team_id']."'> ".$row['team_name'] ." </a></li>");
    		}
		?>
	</ul>
</div>
</center>
</div>
