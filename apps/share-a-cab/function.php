<?php

class ShareACab
{
	
	public function __construct() 
		{
			include"../../db.php";
		}
	
	
	public function get_session() 
		{
			return $_SESSION['uname'];
		}
	function add_new($bookedby, $origin, $destination, $date, $time, $numseats, $numvacancy, $cabtype, $comment)
		{
			$query = "INSERT INTO share_a_cab (bookedby, origin, destination, date, time, numseats, numvacancy, cabtype, comment) VALUES ('$bookedby', '$origin', '$destination', '$date', '$time', '$numseats', '$numvacancy', '$cabtype', '$comment')";
			$result= mysql_query($query) or die('Couldnt process');
			return $result;
		}
	function validate_new()
		{
			if(!empty($_GET['origin']))
				{
					if(!empty($_GET['destination'])){}
				}
		}
	function search_cab($origin, $destination, $date, $numrequired, $cabtype)
		{
			$query = "SELECT * FROM share_a_cab WHERE origin = '$origin' AND destination = '$destination' AND date = '$date' ORDER BY time DESC";
			$result = mysql_query($query) or die("Couldnt process your request");
			return $result;
		}
		
	function scheduled()
		{
			$query = "SELECT * FROM share_a_cab ORDER BY date DESC";
			$result = mysql_query($query) or die("Couldnt process your request");
			return $result;
		}
	function select_cab($rid)
		{
			$query = "SELECT * FROM share_a_cab WHERE rid = '$rid'";
			$result = mysql_query($query) or die("Couldnt process your request");
			return $result;
		}
	function add_request($rid, $numrequired, $requestby, $comment)
		{
			$query = "INSERT INTO share_a_cab_requests (rid, numrequired, requestby, comment) VALUES ('$rid', '$numrequired', '$requestby', '$comment')";
			$result = mysql_query($query) or die("Couldnt process your request");
			return $result;
		}
	function my_bookings($uname)
		{
			$query = "SELECT * FROM share_a_cab WHERE uname = '$uname'";
			$result = mysql_query($query) or die("Couldnot process Your request");
			return $result;
		}
	

}

?>