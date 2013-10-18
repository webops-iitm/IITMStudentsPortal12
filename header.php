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
		<script src="apps/profileplus/profileplus.js"></script>
		<link href="img/glyphicons-halfings.png"> <link href="img/glyphicons-halfings-white.png">    
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	<script type="text/javascript">
		$(document).ready(function () {
			if(window.location.href.indexOf("mess_allocation") > -1) {
				update('apps/mess_allocation/mess_allocated.php', 'widget');
			}
		});
	</script>



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
			  else{
				document.getElementById(target).innerHTML = '<img src="img/load.gif"> Loading ...';
				}
			  }
			xmlhttp.open("GET",datasource,true);
			xmlhttp.send();
		}

	function formdetails(type){
	var type=type;
		var nameid=type+'_username';
		var rollid=type+'_rollnum';
		var hostelid=type+'_hostel';
		var roomid=type+'_roomnumber';

		var name=document.getElementById(nameid).value;
		var rollnum=document.getElementById(rollid).value;
		var hostel=document.getElementById(hostelid).value;
		var room=document.getElementById(roomid).value;
		if(name.length!=0 && rollnum.length!=0 && hostel.length!=0 && room.length!=0){
			var content="username="+name+"&rollnum="+rollnum+"&hostel="+hostel+"&room="+room;
			if(type=="pinform"){
			var cardid=type+'_cardnum';
			var cardnum=document.getElementById(cardid).value;
			num= /^[0-9]+$/;	
				if(cardnum.length!=0 && cardnum.match(num)){
					content+="&cardnum="+cardnum+"&formtype=pin";
					update('formquery.php?'+content,'response');	
				}
				else{
					document.getElementById('response').innerHTML="please check your details";
				}
			}
			if(type=="cardform"){
				content+="&formtype=card";
				update('formquery.php?'+content,'response');
			}
		}
		else{
			document.getElementById('response').innerHTML="please specify all the details";
		}
	}
	function changestyle(type){
		document.getElementById('widget-content').className='widget-content';
		//document.getElementById('pagination').innerHTML="";
		var type=type;
		if(type=="card"){
			$("#widget .widget-header h3").html("Request New Mess Extras Card");		
		};
		if(type=="mess_allocation"){
			$("#widget .widget-header h3").html("Mess allotment");		
		};

		if(type=="pin"){
			$("#widget .widget-header h3").html("Request New Pin for you Mess Extras Card");
		};
	}
		function mess_rating_url()
			{
				var cat = document.getElementById('cat').value;
				var hyg = document.getElementById('hyg').value;
				var qtn = document.getElementById('qtn').value;
				var qlt = document.getElementById('qlt').value;
				var csm = document.getElementById('csm').value;
				var remark = document.getElementById('remark').value;
				mess_url = "apps/caterer_rating/rate.php?cat=" + cat + "&hyg=" + hyg + "&qtn=" + qtn + "&qlt=" + qlt + "&csm=" + csm + "&remark=" + remark;
				update(mess_url, 'widget');
			}
		function facvote(amnt, fac){
			fac_url = "apps/facilities_rating/facvote.php?amnt=" + amnt + "&fac=" + fac;
			update(fac_url,'widget');
		}

		function mess_complaint_url() {
			var hostel = document.getElementById('hostel').value;
			var room = document.getElementById('room').value;
			var desired_mess = document.getElementById('desired_mess').value;
			var reason = document.getElementById('reason').value;
			complaint_url = "apps/mess_complaints/complaint.php?hostel=" + hostel + "&room=" + room + "&desired=" + desired_mess + "&reason=" + reason;
			update(complaint_url, 'widget');
		}





		function changeFunc() {
			var selectBox = document.getElementById("elechostel");
			var selectedValue = selectBox.options[selectBox.selectedIndex].value;
			elec2013_url = "apps/home/election2013/listall.php?hostel="+ selectedValue;
			update(elec2013_url, 'widget');
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
			<a class="brand " href="http://students.iitm.ac.in/">
				Students Portal
			</a>					
			<div class="nav-collapse">
			<ul class="nav ">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						Home
						<b class="caret"></b></a>
						<ul class="dropdown-menu">
														<li><a href="home.php">Students Portal</a></li>
														<!--<li><a href="javascript:update('apps/mess_complaints/complainting.php', 'widget');">Mess</a></li>-->
														<!--<li><a href="javascript:;">forums</a></li>-->
						</ul>
				</li>	
					
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						Mess Operations
						<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="javascript:update('apps/mess_allocation/mess_allocated.php', 'widget');">Check your alloted mess</a></li>
							<li><a href="javascript:update('apps/mess_complaints/complainting.php', 'widget');">iKollege complaints portal</a></li>
							<!--<li><a href="http://students2.iitm.ac.in:3000">Mess Registration</a></li>-->
							<li><a href="javascript:update('apps/caterer_rating/rating.php', 'widget');">Feedback</a></li>
							<!--<li><a href="javascript:;">Feedback</a></li>-->
							<li><a href="javascript:update('cardform.php','widget-content');changestyle('card');">New Extras Cards</a></li>
							<li><a href="javascript:update('pinform.php','widget-content');changestyle('pin')">New Pin Request</a></li>
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
														<li><a href="javascript:update('apps/home/secretary-manifesto.php', 'widget');">Secretaries Manifesto</a></li>
						</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						SAC
						<b class="caret"></b></a>
						<ul class="dropdown-menu">
														<li><a href="javascript:update('apps/home/sac-meeting.php', 'widget');">SAC Meetings</a></li>
														<li><a href="javascript:update('apps/home/sac-membersnew.php', 'widget');">SAC Members</a></li>
														<li><a href="files/sac-files/Constitution_revised.pdf" target="_blank">Revised constitution</a></li>
														<li><a href="files/sac-files/Constitution_Amendments.pdf" target="_blank">Constitution Amendments</a></li>
														<li><a href="javascript:;">Film club</a></li>
						</ul>
				</li>
				<!--<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						Applications
						<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="student-search.php">Student Search</a></li>
                           <li><a href="javascript:update('apps/ocs/content.php','widget');">Online Complaint System</a></li>

						</ul>
				</li>-->
				
			</ul>
			<ul class="nav pull-right">					
				<li class="dropdown ">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-cog "></i>
							Settings
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu ">
						<li><a href="javascript:update('apps/home/updateprofile.php','profile');">Edit profile</a></li>
                        <!--<li><a href="javascript:update('apps/profileplus/studentform.php','profile');">Student profile</a></li>-->			<!--[Datasourse::apps/home/updateprofile.php][Target::profile]-->
					<!--	<li><a href="javascript:;">change pasword</a></li>
						<li><a href="javascript:;">Help</a></li> -->
					</ul>
				</li>					
				<li class="dropdown">
					<?php	if(isset($_SESSION['uname']))
							{
							
							echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown'>
								<i class='icon-user'></i> Profile
								<b class='caret'></b>
								</a>
								<ul class='dropdown-menu' style='border:4px; border-style:solid; color:#FFF; border-color:#757c82;'>";
								if($nick!="")
								echo "<table class='table table-bordered'><tr><td><center>".$nick."</center></td></tr>";
								echo "<tr class=''><td><center>".$_SESSION['uname']."</center></td></tr></table>
								

								<!--<li><center><a href=\"javascript:update('apps/profileplus/profileplus.php','profile');\"><button class='btn btn-large'>Profile+</button></a></center></li>-->
								<li><center><a href='logout.php'><button class='btn btn-danger'>Logout</button></a></center></li></ul>";
							}
							else
							{	
								echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown'>
								<i class='icon-user'></i> Sign in
								<b class='caret'></b>
								</a>
								<ul class='dropdown-menu' style='border:4px; border-style:solid; color:#FFF; border-color:#757c82;'>";
	
								echo"<form action='submit.php?TargetHome=home' method='POST'>
								<center><input class='input span2' placeholder='Username' name='uname' type='text' style='margin-top:20px;'></input></center>
								<center><input class='input span2' placeholder='Password' name='pass' type='password'></input></center>
							
								<center><button class='btn btn-success' type='submit' >Log In</button></center>
								</form>";
							}
							
							?>
												
				</ul>
					
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
				
				<!--<li><a href="javascript:update('student-search.php','widget');"><i class="icon-search "></i> Student Search</a></li>-->
				<li><a href="javascript:update('apps/facilities_rating/index.php','widget');"><i class="icon-list "></i> Facilities</a></li>
				<li><a href="/forum"><i class="icon-comment "></i> Forum</a></li>
				<li><a href="http://t5e.iitm.ac.in/"><i class="icon-edit "></i> The Fifth Estate</a></li>
				<li><a href="http://cfi.iitm.ac.in/"><i class="icon-hand-up "></i> CFI</a></li>
				<!--<li ><a href="javascript:update('apps/LostnFound/LostnFound.php', 'widget');"><i class="icon-list "></i> Lost n Found</a></li>-->
			</ul>
			<form class="navbar-search pull-right">
					<input class="search-query " placeholder="Search entire site..." type="text">
			</form>
		</div>
	</div>
</div>
</body>
</html>
