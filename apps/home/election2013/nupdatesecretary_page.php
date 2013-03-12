
<div style="margin-left:20px;">
	<div class="widget" style="float:left; width:380px; margin:10px; align:center;">

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
				<li class="" id="profile_sec_page"><a style=" text-shadow:none; border:none;" href="javascript:update('apps/home/election2013/nupdateprofile_sec.php', 'inner_body_sec'); ">Profile</a></li>
				
			</ul>
		</div></div>
		</div>
		</div> <!-- /widget-header -->

		</div><!-- /widget -->	
		<div class="widget" style="float:left;height:420px; width:1400px;" id="inner_body_sec">

			<?php include("nupdateprofile_sec.php"); ?>
			

		</div> <!-- /widget -->
		
	 
</div>

