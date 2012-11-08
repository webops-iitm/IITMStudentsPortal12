<?php
	include("db.php");

		if(isset($_GET['username']) && isset($_GET['rollnum']) && isset($_GET['hostel']) && isset($_GET['room'])){
				$username=$_GET['username'];
				$rollnum=$_GET['rollnum'];
				$hostel=$_GET['hostel'];
				$room=$_GET['room'];
				if($_GET['formtype']=='pin'){
					$cardnum=$_GET['cardnum'];
					$insert="INSERT INTO requests(name,rollnum,hostel,roomnumber,cardnum)
							 VALUES('$username','$rollnum','$hostel','$room','$cardnum')";
					$query=mysql_query($insert);
					if(!$query){echo "<b>Failed to send request</b>";}
					else{echo "<b>Your request has been successfully submitted</b>";}
				}
				elseif($_GET['formtype']=='card'){
					$insert="INSERT INTO requests(name,rollnum,hostel,roomnumber)
							 VALUES('$username','$rollnum','$hostel','$room')";
					$query=mysql_query($insert);
					if(!$query){echo "<b>Failed to send request</b>";}
					else{echo "<b>Your request has been successfully submitted</b>";}				
				}	
		}
		else{
			echo "<b>please specify details</b>";
		}	
		mysql_close($serverconnect);
	?>	