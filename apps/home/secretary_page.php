<?php $from_main_var =1; ?>
<div class="span3 offset1">
	<center>
		<div class="widget"  style="float:right;width:415px; margin:10px;">
			<div class="widget-header">	
			<div class="navbar navbar-inverse ">
				<ul class="nav nav-tabs">
					<li>
						<i class="icon-star"></i>
						<h3><?php if($nick!="") echo $nick."'s"; ?></h3>
					</li>
					<li class="" id="profile_sec_page"><a style=" text-shadow:none;" href="javascript:update('apps/home/secretary/profile_sec.php', 'inner_body_sec'); ">Profile</a></li>
					<li id="teams_sec_page"><a style=" text-shadow:none;" href="javascript:update('apps/home/secretary/teams_sec.php', 'inner_body_sec');">Teams</a></li>
					<li id="contacts_sec_page"><a style=" text-shadow:none; border-right:none" href="javascript:update('apps/home/secretary/contact_sec.php', 'inner_body_sec');">Contact</a></li>

				</ul>
			</div>
			</div> <!-- /widget-header -->
						
			<div class="widget-content" id="inner_body_sec">
				<?php include( "secretary/profile_sec.php" ); ?>
			</div> <!-- /widget-content -->
						
		</div> <!-- /widget -->	
	</center>
</div>

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
			  }
			xmlhttp.open("GET",datasource,true);
			xmlhttp.send();
		}
	</script>
