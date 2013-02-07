<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
$noOfAnn=7;   //This variable can be changed to obtain variable number of news per page.

?>
 
<div class="span8" >
<div id="widget" class="widget" style="width:800px; margin:10px; position:relative; top:0px; right:0px; left:20px;">
		<div class="widget-header">
			<i class="icon-comment"></i>
			<h3 id="header">News</h3>
                  
		</div> <!-- /widget-header -->
		<div class="widget-content" id="widget-content" style="height:280px;overflow-y:scroll;">	
		<!-- /collapse -->
		<div class="accordion" id="accordion2">

</div>

</div>

</div>

</div>

<script type="text/javascript">
function LoadNews(page)
{
  //Loads the content
 $.post('apps/announcements/ajax-news-loader.php',{page:page,annno:<?php echo $noOfAnn; ?>},function(data)
	{
		if(data!=0)
		{
		$('#accordion2').append(data);
		}
		else
		{
		End=1;
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
{Page++;
LoadNews(Page);
}
}
});


</script>
<?
	if(isset($_GET['message'])){
?>
	<div class="span8 offset1" style="padding:5px; border:solid 1px red; background:rgba(8, 8, 8, 0.5); width:300px; color:#fff;">
		<? echo $_GET['message']; ?>
	</div>
<? } ?>