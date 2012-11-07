<?php
$sacmem = array( array( roll => "CS12M032", 
                      post => "M.Tech I Councilor"
                    ),
		array( roll => "ME12M131", 
                      post => "M.Tech I Councilor"
                    ),
		array( roll => "CH12M021", 
                      post => "M.Tech I Councilor"
                    ),
		array( roll => "MM12B041", 
                      post => "B.Tech I Councilor"
                    ),
		array( roll => "ME12B034", 
                      post => "B.Tech I Councilor"
                    ),
		array( roll => "ME12B018", 
                      post => "B.Tech I Councilor"
                    ),
		array( roll => "AE09B037", 
                      post => "AE BC"
                    ),
		array( roll => "BT09B008", 
                      post => "BT BC"
                    ),
		array( roll => "CE09B070", 
                      post => "CE BC"
                    ),
		array( roll => "CH09B069", 
                      post => "CH BC"
                    ),
		array( roll => "CS08B045", 
                      post => "CS BC"
                    ),
		array( roll => "ED08B024", 
                      post => "ED BC"
                    ),
		array( roll => "EE09B018", 
                      post => "EE BC"
                    ),
		array( roll => "EP09B024", 
                      post => "EP BC"
                    ),
		array( roll => "ME08B065", 
                      post => "ME BC"
                    ),
		array( roll => "MM09B026", 
                      post => "MM BC"
                    ),
		array( roll => "NA09B007", 
                      post => "NA BC"
                    ),
		array( roll => "HS08H007", 
                      post => "M.A. Councillor"
                    ),
		array( roll => "Vacant", 
                      post => "M.Sc II Councillor"
                    ),
		array( roll => "MM11M017", 
                      post => "M.Tech II Councillor"
                    ),
		array( roll => "AE11M027", 
                      post => "M.Tech II Councillor"
                    ),
		array( roll => "CS11M046", 
                      post => "M.Tech II Councillor"
                    ),
		array( roll => "CH11M019", 
                      post => "M.Tech II Councillor"
                    ),
		array( roll => "Vacant", 
                      post => "M.Tech II Councillor"
                    ),
		array( roll => "MS11A023", 
                      post => "M.B.A II year Councillor"
                    ),
		array( roll => "MS12A057", 
                      post => "M.B.A I year Councillor"
                    ),
		array( roll => "ME12S011", 
                      post => "M.S Engg Councillor"
                    ),
		array( roll => "OE10S024", 
                      post => "M.S Engg Councillor"
                    ),
		array( roll => "CH11S019", 
                      post => "M.S Engg Councillor"
                    ),
		array( roll => "ME11S049", 
                      post => "M.S Engg Councillor"
                    ),
		array( roll => "EE11S064", 
                      post => "M.S Engg Councillor"
                    ),
		array( roll => "Vacant", 
                      post => "Ph.D Hum & Mgt Councillor"
                    ),
		array( roll => "Vacant", 
                      post => "Ph.D Science Councilor"
                    ),
		array( roll => "Vacant", 
                      post => "Ph.D Science Councilor"
                    ),
		array( roll => "Vacant", 
                      post => "Ph.D Science Councilor"
                    ),
		array( roll => "CH11D011", 
                      post => "Ph.D Engg Councilor"
                    ),
		array( roll => "ME10D001", 
                      post => "Ph.D Engg Councilor"
                    ),
		array( roll => "OE12D004", 
                      post => "Ph.D Engg Councilor"
                    ),
		array( roll => "Vacant", 
                      post => "Ph.D Engg Councilor"
                    ),
		array( roll => "Vacant", 
                      post => "Ph.D Engg Councilor"
                    ),
		array( roll => "ME10B097", 
                      post => "Gen Sec"
                    ),
		array( roll => "Vacant", 
                      post => "Gen Sec"
                    ),
		array( roll => "ME11M086", 
                      post => "Gen Sec"
                    ),
		array( roll => "CH10B015", 
                      post => "Gen Sec"
                    ),
		array( roll => "ME10B069", 
                      post => "Gen Sec"
                    ),
		array( roll => "EE10B010", 
                      post => "Gen Sec"
                    ),
		array( roll => "AT11M005", 
                      post => "Gen Sec"
                    ),
		array( roll => "CE11M165", 
                      post => "Gen Sec"
                    ),
		array( roll => "CE10B029", 
                      post => "Gen Sec"
                    ),
		array( roll => "EE10B018", 
                      post => "Gen Sec"
                    ),
		array( roll => "ME08B079", 
                      post => "Gen Sec"
                    ),
		array( roll => "CE10B095", 
                      post => "Gen Sec"
                    ),
		array( roll => "CH10D012", 
                      post => "Gen Sec"
                    ),
		array( roll => "BT10B032", 
                      post => "Gen Sec"
                    ),
		array( roll => "MS11A019", 
                      post => "Gen Sec"
                    ),
		array( roll => "CH10B059", 
                      post => "Gen Sec"
                    ),
		array( roll => "NA10B016", 
                      post => "Gen Sec"
                    ),
		array( roll => "Vacant", 
                      post => "Day Scholar Councilor"
                    ),
		array( roll => "Vacant", 
                      post => "M.Sc I councilor"
                    ),
		array( roll => "Vacant", 
                      post => "MS. Hum & Mgt Councilor"
                    )
             );
?>
<script>
function stuprof()
{
alert("working");
}
</script>
<div class="widget-header">
	<i class="icon-star"></i>
	<h3>Contact information</h3>
</div> <!-- /widget-header -->	
<div class="widget-content">
<table>
	<tr>
	<td><b>No</b></td>
	<td><b>Name</b></td>
	<td><b>Post</b></td>
	<td><b>Contact</b></td>
	</tr>
<?php
	include("../../db.php");
	for($i=0;$i<59;$i++)
	{
	$name = "Vacant";
	$secroll=$sacmem[$i][roll];
	 $qcontact = "SELECT fullname, contact FROM $tbl_name WHERE 	username='$secroll'";
	  $qres=mysql_query($qcontact);
	while($qrow = mysql_fetch_array($qres))
	  {
		if($qrow['contact']!=0)$contact = $qrow['contact'];
		if($sacmem[$i].[roll]!="Vacant")$name = $qrow['fullname'];
		if($name=="")$name = $sacmem[$i][roll];
	}

	echo "<tr>
		<td>".(1+$i)."</td>
		<td><a href=\"student-search.php?userd=".$sacmem[$i][roll]."\">".$name."</a></td>
		<td>".$sacmem[$i][post]."</td>
		<td>".$contact."</td>
	</tr>";
	}
?>
</div> <!-- /widget-content -->
<style>
table tr td
{
	padding-top:10px;
	padding-right:80px;
	font-family: lucida sans-serif;
	font-size:15px;
}
</style>
