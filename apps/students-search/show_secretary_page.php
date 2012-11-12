<?php

  if(file_exists("db.php"))  include("db.php");
  if(file_exists("../../../db.php"))  {
    include("../../../db.php"); // hack : passing var as GET into config_show doesn't work for some reason ...
    //session_start();
    $var = $_GET['userid'];
    $query = "select * from users where username = \"$var\" order by fullname";
    $numresults=mysql_query($query);
  
    $row = mysql_fetch_array($numresults);
    $show_name=$row['fullname'];
    $show_nick=$row['nick'];
    $show_user=$row['username'];
    $show_hostel=$row['hostel'];
    $show_room=$row['room'];
    $show_email=$row['email'];
    $show_contact=$row['contact'];
    $show_bgroup=$row['bgroup'];
    
    // Check if the user is in the student secretary database
    $result_sec = mysql_query("SELECT * FROM stu_sec WHERE upper(username) like \"%$var%\" ");
    $sec_count = mysql_num_rows($result_sec);
    $show_secretary = 0;
    $show_disp_pic=0;
    if( $sec_count >= 1 ) {
      $show_secretary = 1;
      $sec_row = mysql_fetch_array($result_sec);
      $show_post = $sec_row['post'];
      $show_tenure = $sec_row['tenure'];
      $show_hobbies = $sec_row['hobbies'];
      $show_form_email = $sec_row['form_email'];
      $show_disp_pic = $sec_row['pic'];
    }
	}
?>
<div class="offset2">
		<div class="widget"  style="width:520px; margin:10px;">
			<div class="widget-header" style="-moz-border-radius: 4px;
-webkit-border-radius: 4px;
border-radius: 4px;">	
			<div class="navbar navbar-inverse ">
				<div class="container-fluid">
				<ul class="nav nav-tabs">
					<li>
						<i class="icon-star"></i>
						<h3><?php if($show_nick!="") echo $show_nick."'s"; ?> Profile</h3>
					</li>
					<li class="" id="profile_sec_page"><a style=" text-shadow:none;" href="javascript:update('apps/students-search/secretary/profile_sec.php?userid=<?php echo $var ?>', 'inner_body_sec'); ">Profile</a></li>
					<li id="teams_sec_page"><a style=" text-shadow:none;" href="javascript:update('apps/students-search/secretary/teams_sec.php?userid=<?php echo $var ?>', 'inner_body_sec');">Teams</a></li>
					<li id="contacts_sec_page"><a style=" text-shadow:none; border-right:none" href="javascript:update('apps/students-search/secretary/contact_sec.php?userid=<?php echo $var ?>', 'inner_body_sec');">Contact</a></li>

				</ul>
			</div>
			</div>
			</div> <!-- /widget-header -->
			</div><!-- /widget -->
						
			<div class="widget" style="height:310px;" id="inner_body_sec">
				<?php include( "secretary/profile_sec.php" ); ?>
			</div> <!-- /widget-content -->
						
			
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
