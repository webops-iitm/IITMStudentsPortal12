<?php

require_once("db.php");

$query = "SELECT * FROM news ORDER BY id DESC LIMIT 28";
$result=mysql_query($query)or die ("Error in query: $query " . mysql_error()); 

?>
<div class="span8 ">
	<div id="widget" class="widget" style="width:800px; margin:10px; position:relative; top:0px; right:0px; left:20px;">
		<div class="widget-header">
			<i class="icon-comment"></i>
			<h3>News</h3>

		</div> <!-- /widget-header -->
		<div class="widget-content" id="widget-content">						
			<div class="shortcuts">	
			
			<div class="tabbable">
  
  <div class="tab-content">
  
	<?php
	$counter=1;
		while ($news=mysql_fetch_assoc($result))
	{
		$email=$news['email'];
		$subject=$news['subject'];
		$body=$news['body'];
		$date=$news['date'];
		if($counter==1)
		{
		print '<div id="pane'.$counter.'" class="tab-pane active">';
		}
		else if($counter%7==0)
		{
		print '<div id="pane'.(($counter/7)+1).'" class="tab-pane">';
		}
		print '<div class="accordion" id="accordion'.$counter.'"><div class="accordion-group"><div class="accordion-heading">';
		print '<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion'.$counter.'" href="#collapse'.$counter.'">
					<strong>'.$subject.'</strong></a> <div class="row" ><div class="span4 offset1">From:'.$email.'</div>
										  <div class="span3 offset2">Date:'.$date.'</div></div>	</div>';
		print '<div id="collapse'.$counter.'" class="accordion-body collapse">
								  <div class="accordion-inner"><p>'.$body.'</p></div></div></div></div>';	
		
		if($counter==1 || $counter%7==0)
		{
		print '</div>';
		}
	
	$counter++;
	}
	
	?>
       
   
	<ul class="nav nav-tabs">
    <li class="active"><a href="#pane1" data-toggle="tab">1</a></li>
    <li><a href="#pane2" data-toggle="tab">2</a></li>
    <li><a href="#pane3" data-toggle="tab">3</a></li>
    <li><a href="#pane4" data-toggle="tab">4</a></li>
  </ul>
  </div><!-- /.tab-content -->
</div><!-- /.tabbable -->
			
			</div>	
		</div>
		
	</div>
</div>

