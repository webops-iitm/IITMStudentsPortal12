<div class="span8">
	<div id="widget" class="widget" style="width:800px; margin:10px; position:relative; top:0px; right:0px;">
		<div class="widget-header">
			<i class="icon-comment"></i>
			<h3>Share a cab</h3>
		</div> <!-- /widget-header -->
		<div class="widget-content" id="widget-content">						
			<ul class="nav nav-tabs">
				<li class="active">
						<a href="javascript:ajaxcontent('apps/share-a-cab/scheduled.php', 'widget-subcontent');">Scheduled Departure</a>
				</li>
		<!--		<li><a href="javascript:ajaxcontent('apps/share-a-cab/departed.php', 'widget-subcontent');">Departed</a></li> -->
				<li><a href="javascript:ajaxcontent('apps/share-a-cab/addnew.php', 'widget-subcontent');">Add new</a></li>
				<li><a href="javascript:ajaxcontent('apps/share-a-cab/cab-search.php', 'widget-subcontent');">Search a cab</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						My requests
						<b class="caret"></b></a>
						<ul class="dropdown-menu">
														<li><a href="javascript:ajaxcontent('apps/share-a-cab/my_bookings.php', 'widget-subcontent');">My bookings</a></li>
														<li><a href="javascript:ajaxcontent('apps/share-a-cab/my_seatrequests.php', 'widget-subcontent');">My seat requests</a></li>
														<li><a href="javascript:ajaxcontent('apps/share-a-cab/my_req4booking.php', 'widget-subcontent');">Seat requests for my bookings</a></li>
						</ul>
				</li>
			</ul>
			<div id="widget-subcontent">
			</div>
		</div>
	</div>
</div>

	
	
	<script>
		function ajaxcontent(datasource, target)
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
				document.getElementById(target).innerHTML = '<center><img src="img/ajax-loading.gif"> Loading ...</center>';
				}
			  }
			xmlhttp.open("GET",datasource,true);
			xmlhttp.send();
		}
		
		
		function addnew_url()
		{
			var origin = document.getElementById('origin').value;
			var destination = document.getElementById('destination').value;
			var date = document.getElementById('date').value;
			var time = document.getElementById('time').value;
			var numseats = document.getElementById('numseats').value;
			var numvacancy = document.getElementById('numvacancy').value;
			var cabtype = document.getElementById('cabtype').value;
			var bookedby = document.getElementById('bookedby').value;
			var comment = document.getElementById('comment').value;
			a_url = "apps/share-a-cab/addnew.php?origin=" + origin + "&destination=" + destination + "&date=" + date + "&time=" + time + "&numseats=" + numseats + "&numvacancy=" + numvacancy + "&cabtype=" + cabtype + "&bookedby=" + bookedby + "&comment=" + comment;
			ajaxcontent(a_url,'widget-subcontent');

		}
		
		
		function searchcab_url()
		{
			var origin = document.getElementById('origin').value;
			var destination = document.getElementById('destination').value;
			var date = document.getElementById('date').value;
			var cabtype = document.getElementById('cabtype').value;
			s_url = "apps/share-a-cab/cab-search.php?origin=" + origin + "&destination=" + destination + "&date=" + date + "&cabtype=" + cabtype;
			ajaxcontent(s_url,'widget-subcontent');
		}
		
		function requestcab_url()
		{
			var rid = document.getElementById('rid').value;
			var comment = document.getElementById('comment').value;
			r_url = "apps/share-a-cab/requestform.php?rid=" +  rid + "&comment=" + comment;
			ajaxcontent(r_url,'widget-subcontent');
		}
	</script>
