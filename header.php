<!DOCTYPE html>
<html lang="en">
	<head>
		<style>body {padding-top:40px;}</style>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<title>Students Portal Beta</title>   
		<link href="css/my.css" rel="stylesheet"> 
		<link href="css/bootstrap-responsive.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet"><script src="js/bootstrap.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery-1.js"></script>
		<link href="img/glyphicons-halfings.png"> <link href="img/glyphicons-halfings-white.png">    
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
        <script>
		function update(datasource, target)
		{
			if (window.XMLHttpRequest)
			  {// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			  }
			else
			  {// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			    {
			    document.getElementById(target).innerHTML=xmlhttp.responseText;
			    }
			  else 
				{
				document.getElementById("widget-content").innerHTML = '<center><img src="img/ajax-loading.gif"> Loading ...</center>';
				}
			  }
			xmlhttp.open("GET",datasource,true);
			xmlhttp.send();
		}
	</script>
		<script>
		function mess_rating_url()
			{
				var cat = document.getElementById('cat').value;
				var hyg = document.getElementById('hyg').value;
				var qtn = document.getElementById('qtn').value;
				var qlt = document.getElementById('qlt').value;
				var csm = document.getElementById('csm').value;
				mess_url = "apps/caterer_rating/rate.php?cat=" + cat + "&hyg=" + hyg + "&qtn=" + qtn + "&qlt=" + qlt + "&csm=" + csm;
				update(mess_url, 'widget');
			}
		</script>
	</head>
<body>
<div class="navbar navbar-fixed-top" >
	
	<div class="navbar-inner">		
		<div class="container ">			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>			
			<a class="brand " href="http://students2.iitm.ac.in/">
				Students Portal 2012
			</a>					
			<div class="nav-collapse">
			<ul class="nav ">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						Home
						<b class="caret"></b></a>
						<ul class="dropdown-menu">
														<li><a href="index.php">Students Portal</a></li>
														<!--<li><a href="javascript:update('apps/caterer_rating/rating.php', 'widget');">Mess rating</a></li>-->
														<!--<li><a href="javascript:;">forums</a></li>-->
						</ul>
				</li>	
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						Mess Operations
						<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="javascript:;">Mess Registration</a></li>
							<li><a href="javascript:update('apps/caterer_rating/rating.php', 'widget');">Mess Rating</a></li>
							<li><a href="javascript:;">Feedback</a></li>
							<li><a href="javascript:;">New Extras Cards</a></li>
							<li><a href="javascript:;">New Pin Request</a></li>
						</ul>
				</li>				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						Activities
						<b class="caret"></b></a>
						<ul class="dropdown-menu">
														<li><a href="http://www.shaastra.org/techsoc/" target="_blank" >TechSoc</a></li>
														<li><a href="javascript:;">LitSoc</a></li>
														<li><a href="http://www.sports.iitm.ac.in" target="_blank" >Schroeter</a></li>
						</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						Executive Wing
						<b class="caret"></b></a>
						<ul class="dropdown-menu">
														<li><a href="javascript:update('apps/home/secretary-manifesto.php', 'widget');">Secretary Manifesto</a></li>
						</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						SAC
						<b class="caret"></b></a>
						<ul class="dropdown-menu">
														<li><a href="javascript:update('apps/home/sac-meeting.php', 'widget');">SAC Meetings</a></li>
														<li><a href="javascript:update('apps/home/sac-members.php', 'widget');">SAC Members</a></li>
														<li><a href="files/sac-files/Constitution_revised.pdf" target="_blank">Revised constitution</a></li>
														<li><a href="files/sac-files/Constitution_Amendments.pdf" target="_blank">Constitution Amendments</a></li>
														<li><a href="javascript:;">Film club</a></li>
						</ul>
				</li>
				<li ><a href="javascript:update('apps/home/contactinfo.php','widget');"><i class="icon-envelope "></i> Contact us</a></li>
			</ul>
			<ul class="nav pull-right">					
				<li class="dropdown ">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-cog "></i>
							Settings
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu ">
						<li><a href="javascript:update('apps/home/updateprofile.php','profile');">Edit profile</a></li>			<!--[Datasourse::apps/home/updateprofile.php][Target::profile]-->
					<!--	<li><a href="javascript:;">change pasword</a></li>
						<li><a href="javascript:;">Help</a></li> -->
					</ul>
				</li>					
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">						
						<i class="icon-user"></i> profile
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
					<?php	if(isset($_SESSION['uname']))
							{
								if($nick!="")
								echo "<li><center>".$nick."</center></li>";
								echo "<li><center>".$_SESSION['uname']."</center></li>";
							}
							else
							{
								echo "<li>Name</li><li>RollNo</li>";
							}
							?>
						<li><center><a href="logout.php">Logout</a></center></li></ul>						
				</li>
					
			</ul>	
			</div><!--/.nav-collapse -->		
		</div> <!-- /container -->		
	</div> <!-- /navbar-inner -->	
</div> <!-- /navbar -->

<div class="navbar navbar-inverse" >	
	<div class="navbar-inner">		
		<div class="container-fluid">	
			<ul class="nav nav-pills">
				<li ><a href="javascript:update('apps/caterer_rating/rating.php', 'widget');"><i class="icon-list "></i> Mess Rating</a></li>
				
				<li><a href="student-search.php"><i class="icon-search "></i> Student Search</a></li>
				<li><a href="/forum"><i class="icon-comment "></i> Forum</a></li>
				<li><a href="http://t5e.iitm.ac.in/"><i class="icon-edit "></i> The Fifth Estate</a></li> <li><a href="http://cfi.iitm.ac.in/"><i class="icon-hand-up "></i> CFI</a></li>
			</ul>
			<form class="navbar-search pull-right">
					<input class="search-query " placeholder="Search entire site..." type="text">
			</form>
		</div>
	</div>
</div>
