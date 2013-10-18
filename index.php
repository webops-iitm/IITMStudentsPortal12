<?php
	include("db.php");
	
	session_start();
	
	if (isset($_COOKIE["user"]))
		$_SESSION['uname'] = $_COOKIE["user"];

	include("config.php");
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!--NoM4D--><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Students Portal</title>
<link rel="shortcut icon" href="images/IITM_Color_Logo_30px.png" type="image/png">

<link href="css/modern.css" rel="stylesheet">

<link href="css/modern-responsive.css" rel="stylesheet">
<link href="css/theme-dark.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

<!--[if IE 7]>
<link rel="stylesheet" href="css/font-awesome-ie7.min.css">
<![endif]-->
<script src="js/jquery-1.8.3.min.js" type="text/javascript"></script> 
<script src="js/jquery.localscroll-1.2.7-min.js" type="text/javascript"></script> 
<script src="js/jquery.scrollTo-1.4.3.1-min.js" type="text/javascript"></script> 
<script src="js/jquery.mousewheel.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#nav').localScroll({duration:800});
});
</script>

<script type="text/javascript" >
$(document).ready(function () {
$.localScroll.defaults.axis = 'x';
$.localScroll();
});
</script>

<script type="text/javascript">
	$(function(){
		$("#page-wrap").wrapInner("<table cellspacing='30'><tr>");
		$(".post").wrap("<td></td>");
		$("body").mousewheel(function(event, delta) {
			this.scrollLeft -= (delta * 100);
			event.preventDefault();
		});   
	});
</script>

<script type="text/javascript">
$(window).scroll(function() {
    if ($(window).scrollLeft() > 200) {
       		$("#homebackbutton").fadeIn("slow");	// > 100px from Left - show div
		    }
    else {
        	$("#homebackbutton").fadeOut("slow");	// <= 100px from Left - hide div
    		}
});
</script>
</head>

<body class="metrouicss" style="">
<img src="images/bgimage.png" class="bg">

<div class="page secondary fixed-header" style="width: 5600px;">

    <div class="page-header"><!-- This is TOP Row. Login boxes are in this DIV -->
        <div class="page-header-content">
        	<form action="submit.php" method="POST">
            <div class="user-login">
    <?php
	if($loggedin==1)
	{
	
	
	?>
                <div style="width:90px; height:34px; line-height:34px;" class="bg-color-red">
		<center>
		<a href='logout.php' class="" style=" color:#FFFFFF;">logout</a>
		</center>		
		</div>
		</div>
		<div class="user-login">
		<a href="editprofile.php">
                    <div class="name">
                        <span class="first-name fg-color-darken"><?php echo $nick; ?></span>
                        <span class="last-name fg-color-darken"><?php echo $user; ?></span>
                    </div>
                    <div class="avatar">
                        <img src="files/profilepics/<?php echo $profilepic;?>">
                    </div>
                </a> 
		
	<?php
	}
	else
	{
	
	?>

    			<input class="bg-color-red" value="Login" name="login" type="submit" />
              	</div><!-- user-login -->
			<div class="user-login">	
                <div class="input-control password">
                	<input type="password" class="with-helper" placeholder="Password" name="pass"/>
                    <button class="helper"></button>
                </div>
            </div><!-- user-login -->
			<div class="user-login">            
                <div class="input-control text">
                	<input type="text" class="with-helper" placeholder="Username" name="uname" maxlength="8" onchange="if(this.value != 'admin') this.value = this.value.toUpperCase();"/>
                    <button class="icon-search helper"></button>
                </div>
    <?php
	}
	?>        
    <?php if($_GET['error']==1){ echo "<div id=\"errorlogin\">Wrong Username or Password</div>"; }
	  else if($_GET['error']==2){ echo "<div id=\"errorlogin\">Please check back later</div>"; } ?>
            </div><!-- user-login -->
            </form>
            <div id="homebackbutton" style="display:none;">
			<a href="#homefirstbox" class="back-button big" style="position:relative; top:50px;" ></a>
            </div>
            <h1 class="fg-color-darken" ">Students <strong>Portal</strong></h1>
            
        </div>
        
    </div><!-- Header Ends -->
    
    
    
    <div class="page-region">
        <div class="page-region-content tiles" style="width: 5600px;"  >
            <div class="tile-group tile-drag" style="width: auto; max-width: 170px; margin-left:-150px; padding-left:150px;" id="nav">
            <a id="homefirstbox">
		<a href="http://students.iitm.ac.in/home.php">
                <div class="tile icon bg-color-red outline-color-red" style="">
                    <div class="tile-content">
                        <i class="icon-home"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"> <i class="icon-bookmark"></i></div>
                        <div class="name">Home</div>
                    </div>
                </div>
                </a>
                </div><!-- Column 1 ends here-->
                
                <div class="tile-group tile-drag" style="width: auto; max-width: 170px; margin-left:-0px;; padding-left:150px;" id="nav">
                <a href="#departments" >	
                <div class="tile icon bg-color-yellow outline-color-yellow" style="">
                    <div class="tile-content">
                        <i class="icon-building"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"> <i class="icon-double-angle-right"></i></div>
                        <div class="name">Departments</div>
                    </div>
                </div>
                </a>
                <a href="#clubs">
                <div class="tile icon bg-color-green outline-color-green" style="">
                    <div class="tile-content">
                        <i class="icon-group"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"> <i class="icon-double-angle-right"></i></div>
                        <div class="name">Clubs</div>
                    </div>
                </div></a>
                <a href="#departmentfests">
                <div class="tile icon bg-color-blue outline-color-blue" style="">
                    <div class="tile-content">
                        <i class="icon-magic"></i>
                    </div>
                    <div class="brand">
                    	<div class="badge"> <i class="icon-double-angle-right"></i></div>
                        <span class="name">Department Fests</span>
                        
                    </div>
                </div>
                </a>
                
                </div><!-- Column 1 ends here-->
            
                
            <div class="tile-group tile-drag" style="width: auto; max-width: 320px; margin-left:150px;">
		<a href="https://workflow.iitm.ac.in/student/">	                
		<div class="tile icon bg-color-orangeDark outline-color-orangeDark" style="">
                    <div class="tile-content">
                        <i class="icon-briefcase"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Workflow</div>
                    </div>
                </div>
                </a>
		<a href="http://academic.iitm.ac.in/">
                <div class="tile icon bg-color-grayDark outline-color-grayDark" style="">
                    <div class="tile-content">
                        <i class="icon-book"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Academics</div>
                    </div>
                </div>
                </a>
		<a href="http://students.iitm.ac.in/forum/">
                <div class="tile double icon bg-color-pink outline-color-pink" style="">
                    <div class="tile-content">
                        <i class="icon-cloud"></i>
                    </div>
                    <div class="brand">
                        <span class="name">Thought Cloud</span>
                        
                    </div>
                </div>
		</a>
		<a href="http://placement.iitm.ac.in/">
                <div class="tile icon bg-color-blueDark outline-color-blueDark" style="">
                    <div class="tile-content">
                        <i class="icon-globe"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Placements</div>
                    </div>
                </div>
		</a>
		<a href="https://courses.iitm.ac.in/">
                <div class="tile icon bg-color-yellow outline-color-yellow" style="">
                    <div class="tile-content">
                        <i class="icon-print"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Moodle</div>
                    </div>
                </div>
		</a>

                </div><!-- Column 2 ends here-->
    
    
    
            <div class="tile-group tile-drag" style="width: auto; max-width: 320px;">
                <a href="http://www.shaastra.org/">
                <div class="tile icon bg-color-blueDark outline-color-blueDark" style="">
                    <div class="tile-content">
                        <img src="images/dice.png">
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Shaastra</div>
                    </div>
                </div>
		</a>
		<a href="http://www.saarang.org/">
                <div class="tile icon bg-color-red outline-color-red" style="">
                    <div class="tile-content">
                        <img src="images/logo.png">
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Saarang</div>
                    </div>
                </div>
                </a>
		<a href="http://cfi.iitm.ac.in/">
                <div class="tile icon bg-color-greenDark outline-color-greenDark" style="">
                    <div class="tile-content">
                        <img src="images/cfi.png">
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">CFI</div>
                    </div>
                </div>
		</a>
		<a href="http://t5e.iitm.ac.in/">
                <div class="tile icon bg-color-purple outline-color-purple" style="">
                    <div class="tile-content">
                        <i class="icon-rss"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">T5E</div>
                    </div>
                </div>
                </a>
		<a href="http://students2.iitm.ac.in/">
                <div class="tile double icon bg-color-green outline-color-green" style="">
                    <div class="tile-content">
                        <i class="icon-food"></i>
                    </div>
                    <div class="brand">
                        <div class="name">Mess Registeration</div>
                    </div>
                </div>
				</a>
                
                </div><!-- Column 3 ends here-->
    
    
				<div class="tile-group tile-drag" style="width: auto; max-width: 320px;">
                
                <a href="http://students.iitm.ac.in/student-search.php">
                <div class="tile icon bg-color-green outline-color-green" style="">
                    <div class="tile-content">
                        <i class="icon-search"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Student Search</div>
                    </div>
                </div>
				</a>
				<a href="#">
               <div class="tile icon bg-color-blue outline-color-blue" style="">
                    <div class="tile-content">
                        <i class="icon-bullhorn"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">SAC</div>
                    </div>
                </div>
                </a>
		<a href="#">
                <div class="tile icon bg-color-pink outline-color-pink" style="">
                    <div class="tile-content">
                        <i class="icon-certificate"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Executive Wing</div>
                    </div>
                </div>
		</a>
		<a href="#">
                <div class="tile icon bg-color-orangeDark outline-color-orangeDark" style="">
                <div class="tile-content">
             	       <i class="icon-download-alt"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Downloads</div>
                    </div>
                </div>
		</a		
                ><a href="http://sports.iitm.ac.in/">
                <div class="tile icon bg-color-blueDark outline-color-blueDark" style="">
                <div class="tile-content">
             	       <i class="icon-flag"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Sports</div>
                    </div>
                </div></a>
                <a href="http://nptel.iitm.ac.in/">
                <div class="tile icon bg-color-greenDark outline-color-greenDark" style="">
                <div class="tile-content">
             	       <i class="icon-desktop"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">NPTEL</div>
                    </div>
                </div></a>
                
                </div><!-- column 4 ends here-->
                
                <div class="tile-group tile-drag" style="width: auto; max-width: 320px;">
                <a href="http://alumni.iitm.ac.in/">
                <div class="tile icon bg-color-blueDark outline-color-blueDark" style="">
                    <div class="tile-content">
                        <i class="icon-globe"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Alumni</div>
                    </div>
                </div>
                </a>
                <a href="http://cc.iitm.ac.in/">
                <div class="tile icon bg-color-orangeDark outline-color-orangeDark" style="">
                    <div class="tile-content">
                        <i class="icon-laptop"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Computer Center</div>
                    </div>
                </div>
                </a>
                <a href="http://ccw.iitm.ac.in/">
                <div class="tile icon bg-color-greenLight outline-color-greenLight" style="">
                    <div class="tile-content">
                        <i class="icon-book"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">CCW</div>
                    </div>
                </div>
                </a>
                <a href="http://hospital.iitm.ac.in">
                <div class="tile icon bg-color-red outline-color-red" style="">
                    <div class="tile-content">
                        <i class="icon-hospital"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Institute Hospital</div>
                    </div>
                </div>
  				<a href="http://icandsr.iitm.ac.in/">
                <div class="tile icon bg-color-purple outline-color-purple" style="">
                    <div class="tile-content">
                        <i class="icon-money"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">IC & SR</div>
                    </div>
                </div>
                <a href="http://www.oir.iitm.ac.in/">
                <div class="tile icon bg-color-yellow outline-color-yellow" style="">
                    <div class="tile-content">
                        <i class="icon-globe"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">OIR</div>
                    </div>
                </div>
                
  
  
  
                
                </div><!-- Column 5 ends here-->
    
                
                
                <div class="tile-group tile-drag" style="width: auto; max-width: 170px; margin-left:-80px; padding-left:100px;">
                <a href="#">
                <div class="tile icon bg-color-blue outline-color-blue" style="">
                    <div class="tile-content">
                        <i class="icon-wrench"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Tech-Soc</div>
                    </div>
                </div>
                </a>
				<a href="#">
                <div class="tile icon bg-color-pink outline-color-pink" style="">
                    <div class="tile-content">
                        <i class="icon-barcode"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Lit-Soc</div>
                    </div>
                </div>
				</a>
				<a href="http://www.sports.iitm.ac.in/">
                <div class="tile icon bg-color-green outline-color-green" style="">
                    <div class="tile-content">
                        <i class="icon-trophy"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Schroeter</div>
                    </div>
                </div>
				</a>
                </div>
               <!-- Column 6 ends here-->
            
            	
                <div class="tile-group tile-drag" style="width: auto; max-width: 1020px; margin-left:0px; padding-left:100px;">
                <a id="departments">
				<a href="http://www.ae.iitm.ac.in/index.htm">
                <div class="tile icon bg-color-blueDark outline-color-blueDark" style="">
                    <div class="tile-content">
                        <i class="icon-fighter-jet"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Aerospace</div>
                    </div>
                </div></a>
				</a>
                <a href="http://apm.iitm.ac.in/">	
                <div class="tile icon bg-color-blueDark outline-color-blueDark" style="">
                    <div class="tile-content">
                        <i class="icon-link"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Applied Mechanics</div>
                    </div>
                </div></a>
                
                <a href="http://www.biotech.iitm.ac.in/">
                <div class="tile icon bg-color-blueDark outline-color-blueDark" style="">
                    <div class="tile-content">
                        <i class="icon-leaf"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Biotechnology</div>
                    </div>
                </div></a>
                <a href="http://chem.iitm.ac.in/">
                <div class="tile icon bg-color-blueDark outline-color-blueDark" style="">
                    <div class="tile-content">
                        <i class="icon-beaker"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Chemical</div>
                    </div>
                </div></a>
                <a href="http://civil.iitm.ac.in/">
                <div class="tile icon bg-color-blueDark outline-color-blueDark" style="">
                    <div class="tile-content">
                       	<i class="icon-building"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Civil</div>
                    </div>
                </div></a>
		<a href="http://www.cse.iitm.ac.in/">
                <div class="tile icon bg-color-blueDark outline-color-blueDark" style="">
                    <div class="tile-content">
                       	<i class="icon-laptop"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Computer Science</div>
                    </div>
                </div></a>
                           	
                <a href="http://www.ee.iitm.ac.in/">
                <div class="tile icon bg-color-blueDark outline-color-blueDark" style="">
                    <div class="tile-content">
                        <i class="icon-bolt"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Electrical</div>
                    </div>
                </div></a>
                <a href="http://ed.iitm.ac.in/">
                <div class="tile icon bg-color-blueDark outline-color-blueDark" style="">
                    <div class="tile-content">
                        <i class="icon-edit"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Engineering Design</div>
                    </div>
                </div></a>
                <a href="http://www.hss.iitm.ac.in/">                
                <div class="tile icon bg-color-blueDark outline-color-blueDark" style="">
                    <div class="tile-content">
                        <i class="icon-user"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Humanitities</div>
                    </div>
                </div></a>
                <a href="http://www.doms.iitm.ac.in">
                <div class="tile icon bg-color-blueDark outline-color-blueDark" style="">
                    <div class="tile-content">
                        <i class="icon-calendar"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Management Studies</div>
                    </div>
                </div></a>
                <a href="http://mat.iitm.ac.in/">
                <div class="tile icon bg-color-blueDark outline-color-blueDark" style="">
                    <div class="tile-content">
                        <i class="icon-qrcode"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Mathematics</div>
                    </div>
                </div></a>
                <a href="http://mech.iitm.ac.in/">
                <div class="tile icon bg-color-blueDark outline-color-blueDark" style="">
                    <div class="tile-content">
                        <i class="icon-cogs"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Mechanical</div>
                    </div>
                </div></a>
                <a href="http://mme.iitm.ac.in/">
                <div class="tile icon bg-color-blueDark outline-color-blueDark" style="">
                    <div class="tile-content">
                        <i class="icon-fire"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Metallurgy</div>
                    </div>
                </div></a>
                <a href="http://oec.iitm.ac.in/">
                <div class="tile icon bg-color-blueDark outline-color-blueDark" style="">
                    <div class="tile-content">
                        <i class="icon-tint"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Ocean Engineering</div>
                    </div>
                </div></a>
                <a href="https://www.physics.iitm.ac.in/">
                <div class="tile icon bg-color-blueDark outline-color-blueDark" style="">
                    <div class="tile-content">
                        <i class="icon-dashboard"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Physics</div>
                    </div>
                </div></a>
            	</div><!-- Column 7 End departments -->
                
                <div class="tile-group tile-drag" style="width: auto; max-width: 1020px; margin-left:-150px; padding-left:100px;">
                <a name="clubs">
                <a href="http://www.astro.iitm.ac.in">
                <div class="tile icon bg-color-green outline-color-green" style="">
                    <div class="tile-content">
                        <i class="icon-search"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Astronomy</div>
                    </div>
                </div></a></a>
                <a href="http://cfi.iitm.ac.in/">	
                <div class="tile icon bg-color-green outline-color-green" style="">
                    <div class="tile-content">
                        <img src="images/cfi.png">
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Center For Innovation</div>
                    </div>
                </div></a>
                <a href="http://csie.iitm.ac.in/">
                <div class="tile icon bg-color-green outline-color-green" style="">
                    <div class="tile-content">
                        <i class="icon-cog"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Socail Innovation</div>
                    </div>
                </div>	</a>
                <a href="http://csc.iitm.ac.in/">
                <div class="tile icon bg-color-green outline-color-green" style="">
                    <div class="tile-content">
                        <i class="icon-cog"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">China Studies Center</div>
                    </div>
                </div>	</a>
                <a href="http://eml.iitm.ac.in/jan23.html">
                <div class="tile icon bg-color-green outline-color-green" style="">
                    <div class="tile-content">
                        <i class="icon-comment-alt"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Extra Mural Lectures</div>
                    </div>
                </div>	</a>
                <a href="http://hindi.iitm.ac.in/">
                <div class="tile icon bg-color-green outline-color-green" style="">
                    <div class="tile-content">
                        <i class="icon-cog"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Hindi Club</div>
                    </div>
                </div>	</a>
                <a href="http://www.icon.iitm.ac.in/">
                <div class="tile icon bg-color-green outline-color-green" style="">
                    <div class="tile-content">
                        <i class="icon-trophy"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">DOMS Sports</div>
                    </div>
                </div>	</a>
                <a href="http://iitmsat.iitm.ac.in/">
                <div class="tile icon bg-color-green outline-color-green" style="">
                    <div class="tile-content">
                        <i class="icon-screenshot"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">IITMSAT</div>
                    </div>
                </div>	</a>
                <a href="http://www.ivil.iitm.ac.in/">
                <div class="tile icon bg-color-green outline-color-green" style="">
                    <div class="tile-content">
                        <i class="icon-book"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">iVIL</div>
                    </div>
                </div>	</a>
                <a href="http://www.nss.iitm.ac.in/">
                <div class="tile icon bg-color-green outline-color-green" style="">
                    <div class="tile-content">
                        <i class="icon-random"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">NSS</div>
                    </div>
                </div>	</a>
                <a href="http://reflections.iitm.ac.in/">
                <div class="tile icon bg-color-green outline-color-green" style="">
                    <div class="tile-content">
                        <i class="icon-certificate"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Dhruva</div>
                    </div>
                </div>	</a>
                <a href="http://snet.iitm.ac.in/">
                <div class="tile icon bg-color-green outline-color-green" style="">
                    <div class="tile-content">
                        <i class="icon-refresh"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">S-Net</div>
                    </div>
                </div>	</a>
                <a href="http://vsc.iitm.ac.in/">
                <div class="tile icon bg-color-green outline-color-green" style="">
                    <div class="tile-content">
                        <i class="icon-spinner"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Vivekananda Study Circle</div>
                    </div>
                </div></a>
                </div><!-- Column 8 End Clubs -->
                </a>
                
                <div class="tile-group tile-drag" style="width: auto; max-width: 620px; margin-left:-150px; padding-left:100px;">
                <a name="departmentfests">
                <a href="http://amalgam.iitm.ac.in/">
                <div class="tile icon bg-color-blue outline-color-blue" style="">
                    <div class="tile-content">
                        <i class="icon-fire"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Amalgam</div>
                    </div>
                </div></a></a>
                <a href="http://www.biofest.in/">	
                <div class="tile icon bg-color-blue outline-color-blue" style="">
                    <div class="tile-content">
                        <i class="icon-leaf"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">BioFest</div>
                    </div>
                </div></a>
                <a href="http://ceaiitm.org/">
                <div class="tile icon bg-color-blue outline-color-blue" style="">
                    <div class="tile-content">
                        <i class="icon-building"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">CEA Fest</div>
                    </div>
                </div>	</a>
                <a href="http://exebit.in/">
                <div class="tile icon bg-color-blue outline-color-blue" style="">
                    <div class="tile-content">
                        <i class="icon-laptop"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Exebit</div>
                    </div>
                </div>	</a>
                <a href="http://genesis.iitm.ac.in/">
                <div class="tile icon bg-color-blue outline-color-blue" style="">
                    <div class="tile-content">
                        <i class="icon-cog"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Genesis | C-Tides</div>
                    </div>
                </div>	</a>
                <a href="http://www.chemclave.org/">
                <div class="tile icon bg-color-blue outline-color-blue" style="">
                    <div class="tile-content">
                        <i class="icon-beaker"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Chemclave</div>
                    </div>
                </div>	</a>
                <a href="http://samanvay.iitm.ac.in/">
                <div class="tile icon bg-color-blue outline-color-blue" style="">
                    <div class="tile-content">
                        <i class="icon-cog"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Samanvay</div>
                    </div>
                </div>	</a>
                <a href="http://wavez.iitm.ac.in/2013/">
                <div class="tile icon bg-color-blue outline-color-blue" style="">
                    <div class="tile-content">
                        <i class="icon-cog"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">Wavez</div>
                    </div>
                </div>	</a>
                
                <a href="http://www.oir.iitm.ac.in/news/international-day-nov-04-2012/">
                <div class="tile icon bg-color-blue outline-color-blue" style="">
                    <div class="tile-content">
                        <i class="icon-globe"></i>
                    </div>
                    <div class="brand">
                        <div class="badge"></div>
                        <div class="name">International Day</div>
                    </div>
                </div>	</a>
                
                
                </div><!-- Column 9 End Department Festivals -->
                
                
</body>
</html>
