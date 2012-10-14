<div class="span8">
	<div id="widget" class="widget" style="width:800px; margin:10px; position:relative; top:0px; right:0px;">
		<div class="widget-header">
			<i class="icon-comment"></i>
			<h3>News</h3>
		</div> <!-- /widget-header -->
		<div class="widget-content" id="widget-content">						
			<div class="shortcuts">	
			Welcome to the new Students Portal<br><br>
            October Mess Allocation Results <a onClick="javascript:messlist();" href="#" >Here</a>
			<br><br>
		
			</div>	
		</div>
	</div>
</div>
<script>
function messlist()
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
    document.getElementById("widget").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","apps/home/messlist.php",true);
xmlhttp.send();
}
</script>
