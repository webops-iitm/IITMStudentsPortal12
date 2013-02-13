<script src="js/jquery.js">

</script>
<script>


var tim = 0 ;
var pres = 0 ;

var it = "students" ;


function getdetails()
{
	tim = tim+1 ;
	
	$("#seres").css("opacity","0.4");
	$("#loadinggif").css("display","inline");
	
	$.get("apps/students-search/fetda.php?q="+document.getElementById("q").value+"&item="+it+"&tim="+tim ,function(data) {
		
		
		var k = eval('(' + data + ')');
		
		var numbcurr = parseInt(k.curr) ;
		if ( numbcurr > pres)
		{
		document.getElementById("seres").innerHTML = k.cont ;
		pres = numbcurr ;
		if (tim == pres)
		{
			$("#seres").css("opacity","1");
			$("#loadinggif").css("display","none");
		}
		}
		}
		);
	
}

function setitem(val)
{
	if (!(it == val))
	{
	it = val ;
	getdetails() ;
	}
	
}







</script>


<div class="span8">
	<div id="widget" class="widget" style="width:800px; margin:10px; position:relative; top:0px; right:0px;">
		<div class="widget-header">
			<i class="icon-search"></i>
			<h3>Student search</h3>
		</div> <!-- /widget-header -->
		<div class="widget-content">						
			<div class="shortcuts">
Enter 'Name' or 'Nick' or 'Roll number' or 'Room number' or 'Hostel' or 'Course' or 'Course Id' or 'Faculty' or 'News'
<br/>	<br/>  
<form>
  <table><tr><td><input type="text" id = "q" name="q" onkeyup = "getdetails()" /></td><td><div style="position:relative;top:-4px;"class="btn btn-primary"   onclick="getdetails()">Search </div></td></tr>
  <tr><td><input type="radio" onclick = "setitem(this.value)" style="float:left" checked="checked" name="item" id="students" value="students"><label style="float:left" for ="students"> &nbsp; Students &nbsp; &nbsp;&nbsp;</label></input> <input type="radio" onclick = "setitem(this.value)" style="float:left" name="item" id="courses" value="courses"><label style="float:left" for ="courses"> &nbsp; Courses &nbsp; &nbsp;&nbsp;</label></input> <input type="radio" onclick = "setitem(this.value)" style="float:left"  name="item" id="news" value="news"><label style="float:left" for ="news"> &nbsp; News &nbsp; &nbsp;&nbsp;</label></input></td></tr>
  </table>
</form>


<div style="position:relative" ><img src="img/loading.gif" id="loadinggif" style = "position:relative;display:none; left:50%" /><div id = "seres"  >  </div></div>




<br/><br/>
			</div>	
		</div>
	</div>
</div>