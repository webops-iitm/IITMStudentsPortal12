<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
$noOfAnn=4;   //This variable can be changed to obtain variable number of news per page.

?>
<div class="span8" >
	<div id="widget" class="widget" style="width:800px; margin:10px; position:relative; top:0px; right:0px; left:20px;">
		<div class="widget-header">
			<i class="icon-comment"></i>
			<h3 id="header">News</h3>

		</div> <!-- /widget-header -->
		<div class="widget-content" id="widget-content">	
		<!-- /collapse -->
		<div class="accordion" id="accordion2">

</div>

</div>
<div class="pagination" id="pagination">
  <ul>
    <li><a id="Prev">Prev</a></li>
    <li class="active"><a id="1" >1</a></li>
    <li><a id="2" >2</a></li>
    <li><a id="3" >3</a></li>
    <li><a id="4">4</a></li>
    <li><a id="Next">Next</a></li>
  </ul>
</div>

</div>

</div>
<script type="text/javascript">
CurrentPage=1;
Pagination=0;    //is 0 if its from 0-4 will be set to 1 if its from 5-8 so on
function ChangePagination(value,option)     //option 1 for prev and 2 for next option
{
	for(i = 1; i < 5; i++){
	$("#"+i).html(value*4+i);
	}
	if(option==2){
	$("#4").parent('li').removeClass('active');
	$("#1").parent('li').addClass('active');
	CurrentPage=value*4+1;
	LoadNews(value*4+1);}
	else if(option==1)
	{
	$("#1").parent('li').removeClass('active');
	$("#4").parent('li').addClass('active');
	CurrentPage=value*4+4;
	LoadNews(value*4+4);
	
	}
return false;
}
function LoadNews(page)
{
  //Loads the content
 $.post('apps/announcements/ajax-news-loader.php',{page:page,annno:<?php echo $noOfAnn; ?>},function(data)
	{
		if(data!="null")
		{
		$('#accordion2').html(data);
		}
		else
		{
		$('#accordion2').html("Sorry:We don't have any more data to display");
		}
	});
return false;
}
$(".pagination a").click(function() {
	select=CurrentPage-4*Pagination;
	$("#"+select).parent('li').removeClass('active');
   if($(this).html()=="Prev")
   {
	if(CurrentPage>1){
	if(CurrentPage%4==1 )
	{
	Pagination=Pagination-1;
	ChangePagination(Pagination,1);
	}
   else {
   CurrentPage=CurrentPage-1;}
   }
	
   }
   else if($(this).html()=="Next")
   {
   if(CurrentPage%4!=0){
   CurrentPage++;}
   else{
   Pagination++;
   //function to extend the pagination to next level
   ChangePagination(Pagination,2);
   }
   }
   else{
   CurrentPage=$(this).html(); }
   select=CurrentPage-4*Pagination;
   $("#"+select).parent('li').addClass('active');
	LoadNews(CurrentPage);
  
});
LoadNews(1);
</script>