<?php
	include("../../db.php");
	session_start();
	if (isset($_COOKIE["user"]))
	
		$_SESSION['uname'] = $_COOKIE["user"];
		

	include("../../config.php");
		$loggedin = 1;
	if($loggedin == 0)
		
		die("Please Login to continue");
	else
	{
	
//	$uname = "name";
	$uname = $_SESSION['uname'];
/*	$uname = "Username";
	$uname = "username";
	$user = "user";
	$name = "name";
	$nick = "nick";
	$room = "room";
	$hostel = "hostel";
	$contact = "contact";
	$email = "email";
        $bgroup = "bgroup";
*/		
	$CatTable = "categories";
	$SubCatTable = "sub_categories";
?>
<style>
.categories {
	font-size:14px;
}
.accordion-heading a {
	color : #333333;
	text-decoration : none;
}
.accordion-heading a h4 {
	color : #333333;
	text-decoration : none;
	padding-right: 0;
	padding-left: 0;
	margin-right: 20px;
	font-weight: bold;
	-webkit-transition: all .3s linear;
	   -moz-transition: all .3s linear;
			transition: all .3s linear;
}
.accordion-heading a:hover {
	color : #000000;
	text-decoration : none;
}
.accordion-heading a h4:hover {
	color : #000000;
	text-decoration : none;
	text-shadow : 0 0 10px rgba(0, 0, 0, 0.90);
}
.accordion-inner-info {
	background-color : #F7F7F7;
}
.extra_button_right {
	padding-right: 0;
	padding-left: 0;
	margin-right: 20px;
	font-weight: bold;
	border : 1px solid #888888;	
	border-radius: 10px 10px 10px 10px;

	-webkit-transition: all .3s linear;
	   -moz-transition: all .3s linear;
			transition: all .3s linear;
	color : #444444;
}
.extra_button_right:hover {
	color : #000000;
	border : 1px solid #000000;
	text-decoration: none;
	text-shadow : 0 0 10px rgba(0, 0, 0, 0.90);
	box-shadow : 0 0 10px rgba(0, 0, 0, 0.90), 
		0 0 8px rgba(0, 0, 0, 0.5) inset;
}
.table, .table td, .table th {
	text-align : center;
}
.my_button {
	padding-left : 10px;
	padding-top : 2px;
	padding-bottom : 2px;
	padding-right : 10px;
	font-weight: bold;
	border : 1px solid #888888;	
	border-radius: 10px 10px 10px 10px;
	box-shadow : 0 0 8px rgba(0, 0, 0, 0.5) inset;
	-webkit-transition: all .3s linear;
	   -moz-transition: all .3s linear;
			transition: all .3s linear;
	color : #000000;
}
.my_button:hover {
	color : #ffffff;
	border : 1px solid #000000;
	text-decoration: none;
	text-shadow : 0 0 10px rgba(0, 0, 0, 0.90);
	box-shadow : 0 0 10px rgba(0, 0, 0, 0.90), 
		0 0 8px rgba(0, 0, 0, 0.5) inset;
}
</style>

<center>
	<div class="span10">
		<div id="widget" class="widget"  style="float:right;width:1000px; margin:10px;">
			<div class="widget-header">
				<i class="icon-star"></i>
				<h3>Update Profile</h3>
			</div> <!-- /widget-header -->		
			<div class="widget-content">
	
				<div class="accordion" id="accordionProfile">
					
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionProfile" href="#collapse_Info"> 
								<h4>
									Basic info
								</h4>
							</a>
						</div>
						<div id="collapse_Info" class="accordion-body in collapse" >
							<div class="accordion-inner">
								<?php include("basicinfo.php"); ?>
							</div>
						</div>
					</div>
									
<?php
		include("education.php");
		
		
		$catquery = "SELECT * FROM $CatTable";
		$catresult = mysql_query($catquery);
		
		while($catrow = mysql_fetch_array($catresult)) {
			$catname = $catrow['name'];
			$catID = $catrow['id'];
			$catdesc = $catrow['description'];
			$catadmin = $catrow['admin'];
			include("categories.php");
		}

?>
       
			</div> <!-- /widget-content -->					
		</div> <!-- /widget -->	
	</div>
</center>
<?php
	}
?>