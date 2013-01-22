<?php
	include("db.php");
	
	session_start();
	
	if (isset($_COOKIE["user"]))
		$_SESSION['uname'] = $_COOKIE["user"];

	include("config.php");

	include("header.php");
	
?>
<div id = "profile" class="row-fluid">

<div class="span8">
	<div id="widget" class="widget" style="width:800px; margin:10px; position:relative; top:0px; right:0px;">
		<div class="widget-header">
			<i class="icon-comment"></i>
			<h3>November Mess Registration Data</h3>
		</div> <!-- /widget-header -->
		<div class="widget-content" id="widget-content">						
			<div class="shortcuts">	
			<center>
			<table>
				<tr>
					<td style="width:200px;"><a href="data/mess/registration/november/Alakananda.xlsx">Alakananda</a></td>
					<td style="width:200px;"><a href="data/mess/registration/november/Tapti.xlsx">Tapti</a></td>
					<td style="width:200px;"><a href="data/mess/registration/november/Cauvery.xlsx">Cauvery</a></td>
				</tr>
				<tr>
					<td style="width:200px;"><a href="data/mess/registration/november/Krishna.xlsx">Krishna</a></td>
					<td style="width:200px;"><a href="data/mess/registration/november/Brahmaputra.xlsx">Brahmaputra</a></td>
					<td style="width:200px;"><a href="data/mess/registration/november/Tamiraparani.xlsx">Tamiraparani</a></td>
				</tr>
				<tr>
					<td style="width:200px;"><a href="data/mess/registration/november/Saraswathi.xlsx">Saraswathi</a></td>
					<td style="width:200px;"><a href="data/mess/registration/november/Narmada.xlsx">Narmada</a></td>
					<td style="width:200px;"><a href="data/mess/registration/november/Mahanadi.xlsx">Mahanadi</a></td>
				</tr>
				<tr>
					<td style="width:200px;"><a href="data/mess/registration/november/Sindhu.xlsx">Sindhu</a></td>
					<td style="width:200px;"><a href="data/mess/registration/november/Sharavathi.xlsx">Sharavathi</a></td>
					<td style="width:200px;"><a href="data/mess/registration/november/Pampa.xlsx">Pampa</a></td>
				</tr>
				<tr>
					<td style="width:200px;"><a href="data/mess/registration/november/Godavari.xlsx">Godavari</a></td>
					<td style="width:200px;"><a href="data/mess/registration/november/Jamuna.xlsx">Jamuna</a></td>
					<td style="width:200px;"><a href="data/mess/registration/november/Ganga.xlsx">Ganga</a></td>
				</tr>
				<tr>
					<td style="width:200px;"><a href="data/mess/registration/november/Mandakini.xlsx">Mandakini</a></td>
					<td style="width:200px;"><a href="data/mess/registration/november/Sarayu (All).xlsx">Sarayu</a></td>
				</tr>			
			</table>
			</center>
			</div>	
		</div>
	</div>
</div>
</div>
<?
	include("footer.php");
	
	
?>
