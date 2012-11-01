
<div style="margin-left:20px;">
	<div class="widget" style="float:left; width:450px; margin:10px; align:center;">

		<div class="widget-header" style="-moz-border-radius: 4px;
-webkit-border-radius: 4px;
border-radius: 4px;">
<div class="navbar navbar-inverse ">	
		<div class="">	
		<div class="container-fluid">	
			<ul class="nav nav-tabs" >
				<li>
					<i class="icon-star"></i>
					<h3><?php if($nick!="") echo $nick."'s"; ?></h3>
				</li>
				<li class="" id="profile_sec_page"><a style=" text-shadow:none;" href="javascript:update('apps/home/secretary/updateprofile_sec.php', 'inner_body_sec'); ">Profile</a></li>
				<li id="teams_sec_page"><a style="text-shadow:none;" href="javascript:update('apps/home/secretary/updateteams_sec.php', 'inner_body_sec');">Teams</a></li>
				<li id="contacts_sec_page"><a style="text-shadow:none; border-right:none;" href="javascript:update('apps/home/secretary/updatecontact_sec.php', 'inner_body_sec');">Contact</a></li>
			</ul>
		</div></div>
		</div>
		</div> <!-- /widget-header -->

		</div><!-- /widget -->	
		<div class="widget" style="float:left; width:1400px;" id="inner_body_sec">

			<?php include("secretary/updateprofile_sec.php"); ?>
			

		</div> <!-- /widget -->
		
	 
</div>

