<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
$noOfAnn=7;   //This variable can be changed to obtain variable number of news per page.

?>
 
<div class="span8" >
<div id="widget" class="widget" style="width:800px; margin:10px; position:relative; top:0px; right:0px; left:20px;">
		<div class="widget-header">
		<div class="row">
		<div class="span2 offset1" >
			<i class="icon-comment"></i>
			<h3 id="header">News</h3>
			</div>
			<div class="span4" >
			From: <strong><span id="info">All</span></strong>
			</div>
			<div class="span2" >
			<div class="btn-group">
  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
   Sort
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu">
    <li><a tabindex="-1" email="sgs@smail.iitm.ac.in"   href="#">General Secretary</a></li>
	<li><a tabindex="-1" email="vineet.1991.483@gmail.com" href="#">Institute Web Operations Team</a></li>
	<li><a tabindex="-1" email="casa@smail.iitm.ac.in" href="#">Cultural Affairs Secretary (Arts)</a></li>
	<li><a tabindex="-1" email="cas@smail.iitm.ac.in" href="#">Co-curricular Affairs Secretary</a></li>
	<li><a tabindex="-1" email="ras@smail.iitm.ac.in" href="#">Research Affairs Secretary</a></li>
	<li><a tabindex="-1" email="casl@smail.iitm.ac.in" href="#">Cultural Affairs Secretary(Literary)</a></li>
	<li><a tabindex="-1" email="has@smail.iitm.ac.in" href="#">Hostel Affairs Secretary</a></li>
	<li><a tabindex="-1" email="ss@smail.iitm.ac.in" href="#">Sports Secretary</a></li>
	<li><a tabindex="-1" email="aas@smail.iitm.ac.in" href="#">Academic Affairs Secretary</a></li>
	<li><a tabindex="-1" email="ssac@smail.iitm.ac.in" href="#">Speaker, SAC</a></li>
  </ul>
</div>
		
          </div> 



		  
		</div> 
		</div> 
		<!-- /widget-header -->
		<div class="widget-content" id="widget-content" style="height:280px;overflow-y:scroll;">	
		<!-- /collapse -->
		<div class="accordion" id="accordion2">

</div>

</div>

</div>

</div>

<script type="text/javascript">
secr=0;
$('.dropdown-menu li a').live ("click" , function(){
name=$(this).html();
email=$(this).attr("email");
secr=email;
End=0;
Page=1;
$('#info').html(name);
sort(email);
});
function sort(secretory){

$('#accordion2').html("Loading please wait...");
LoadNews(1,secretory);
return false;
}

function LoadNews(page,sec)
{

 //Loads the content
 $.post('apps/announcements/ajax-news-loader.php',{page:page,secretory:sec,annno:<?php echo $noOfAnn; ?>},function(data)
	{
		if(data!=0)
		{
		if(page==1)
		{
		$('#accordion2').html("");
		}
		$('#accordion2').append(data);
		}
		else
		{
		End=1;
		if(page==1)
		{
		$('#accordion2').html("Sorry! there are no messages from "+name);
		}
		}
	});
return false;
};
LoadNews(1);
Page=1;
End=0;   

$("#widget-content").scroll(function () {

if($("#widget-content").scrollTop() + $("#widget-content").height() > $("#accordion2").height()) {

if(End==0)
{
Page++;
if(secr==0)
{LoadNews(Page);
}
else{
LoadNews(Page,secr);
//alert(secr);
}


}
}
});


</script>
<?
	if(isset($_GET['message'])) {
		if($_GET['message'] == 'ocs_y'){
?>
			<div class="span8 offset1" style="padding:5px; border:solid 1px green; background:rgba(8, 8, 8, 0.5); width:300px; color:#fff;">
				Successfully sent message. Please wait for a response
			</div>
<?		} 
		else if($_GET['message'] == 'ocs_n'){
?>
			<div class="span8 offset1" style="padding:5px; border:solid 1px red; background:rgba(8, 8, 8, 0.5); width:300px; color:#fff;">
				Error : Failed to send message. Please notify webops.iitm@gmail.com
			</div>
<? 		}
		else { 
?>
			<div class="span8 offset1" style="padding:5px; border:solid 1px red; background:rgba(8, 8, 8, 0.5); width:300px; color:#fff;">
				<?php echo $_GET['message']; ?>
			</div>
<? 		}
	}
?>
