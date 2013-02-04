<?php

class ShareACab
{
	
	public function __construct() 
		{
			include"../../db.php";
		}
	
	
	public function get_session() 
		{
			return true;//$_SESSION['uname'];
		}
	function add_new($bookedby, $origin, $destination, $date, $time, $numseats, $numvacancy, $cabtype, $comment)
		{
			$query = "INSERT INTO share_a_cab (bookedby, origin, destination, date, time, numseats, numvacancy, cabtype, comment) VALUES ('$bookedby', '$origin', '$destination', '$date', '$time', '$numseats', '$numvacancy', '$cabtype', '$comment')";
			$result= mysql_query($query) or die(mysql_error());
			return $result;
		}
	function validate_new()
		{
			if(!empty($_GET['origin']))
				{
					if(!empty($_GET['destination'])){}
				}
		}
	function search_cab($origin, $destination, $date, $cabtype)
		{
			$query = "SELECT * FROM share_a_cab WHERE origin = '$origin' AND destination = '$destination' AND date = '$date' ORDER BY time DESC";
			$result = mysql_query($query) or die("Couldnt process your request1");
			return $result;
		}
		
	function scheduled()
		{
			$query = "SELECT * FROM share_a_cab ORDER BY date DESC";
			$result = mysql_query($query) or die("Couldnt process your request2");
			return $result;
		}
	function select_cab($rid)
		{
			$query = "SELECT * FROM share_a_cab WHERE rid = '$rid'";
			$result = mysql_query($query) or die("Couldnt process your request");
			return $result;
		}
	function add_request($rid, $comment)
		{
			$query = "INSERT INTO share_a_cab_requests (rid, requestby, comment) VALUES ('$rid', 'prasanth', '$comment')";
			$result = mysql_query($query) or die("Couldnt process your request4");
			return $result;
		}
	function my_bookings($uname)
		{
			$query = "SELECT * FROM share_a_cab WHERE bookedby LIKE '%$uname%'";
			$result = mysql_query($query) or die(mysql_error());
			return $result;
		}
	function my_booking_requests($uname)
		{
			$query = "SELECT * FROM share_a_cab_requests WHERE requestby LIKE '%$uname%'";
			$result = mysql_query($query) or die(mysql_error());
			return $result;
		}
	

}

?>