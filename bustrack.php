<?php



include("db.php");

         session_start();
	
	if (isset($_COOKIE["user"]))
		$_SESSION['uname'] = $_COOKIE["user"];

	include("config.php");

	include("header.php");

?>



<table style="width:1200px; margin:auto;">
<tr>
<td>
<img src = "img/buslogo.jpg" style="width:100%" />

</td>
</tr>
</table>





<table style="width:1200px; margin:auto;">









<tr bgcolor="#ffffff">
			<td width="20%" id="spl" style="border:5px solid #E9E9E9 ;">
				<font color="#660000" family="Georgia"><br><br><br><br>
				<h3>Note:</h3>
				<b><ul>
					<li>The institute bus service is from 6AM to 10PM.</li><br>
					<li>'M' and 'H' indicates 'Towards Main Gate' and 'Towards Hostel' respectively</li><br>
					<li>If the buses are starting from depot, they will be shown with 'D' till they reach either of the bus termini. These buses may not take passengers till they reach a terminus.</li><br>
					<li>Red icon indicates stopped bus and green indicates moving bus</li><br>
					<li>Last update details can be obtained if you click on the icons</li><br>
					<li>Prefered Browsers - Mozilla Firefox, Google Chrome or IE 10.</li><br>
					<li>Page Loading may take few seconds depending on the network connectivity.</li>
				</ul></b><br><br>
				</font>
			</td>
			<td width="45%"  style="border:5px solid #E9E9E9 ;">
				<h2><font color="#660000" family="Georgia"></font><center><font color="#660000" family="Georgia">IIT MADRAS CAMPUS BUS TRACKING</font><center><font color="#660000" family="Georgia"></font></center></center></h2>
				
					
					<br>
					

					<iframe id="webl" height="700" width="850" frameborder="0" src="http://115.115.108.122">
					&lt;p&gt;Your browser does not support iframes.&lt;/p&gt;
					</iframe>	
			</td>
			<td width="25%" id="spl1"  style="border:5px solid #E9E9E9 ;">
				<font color="#660000" family="Georgia"><br><br><br><br>
				<h3>Credits :</h3>
	
				
				<b>Students :</b><br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Akhilesh Koppineni<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Krishna Chaitanya<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Siddharth Krishnaswamy <br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Srinivas Kodali	<br><br>
				<b>Project Staff : </b><br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Madhan<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Padmavathy<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Raji<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Venkatachalam
				<br><br>
				<b>Faculty Incharge : </b><br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Lelitha Devi<br>
				
				<br><br>
				
				<h3>PS: The accuracy of the application <br>depends on the network and GPS performance.</h3></font><h3><font color="#660000" family="Georgia"> 
				</font>
			</h3></td>
		</tr>




</table>











<?php

	include("footer.php");

?>