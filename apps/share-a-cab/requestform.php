<?php
session_start();
include"function.php";

$share = new ShareACab;

if (!$share->get_session())
	{
		die("Login to continue");
	}

if (!isset($_GET['rid']))
	{
		die("Some thing went wrong!");
	}
if (isset($_GET['comment']))
	{
		$result = $share->add_request($_GET['rid'], $_GET['comment']);
			if ($result)
				die("Request success");
	}
$result = $share->select_cab($_GET['rid']);
if($result)
	{
		while($row=mysql_fetch_assoc($result))
					{
						extract($row);
						echo"Detailed of Cab:<br>
							Booked by: $bookedby<br>
							$cabtype Cab  &nbsp; From: $origin &nbsp; To: $destination &nbsp; On $date &nbsp; $time<br>
							Total number of seats: $numseats &nbsp; Number of vacancies: $numvacancy<br><br>";
					}
	}
							
	
?>

<form class="form-horizontal" action="javascript:requestcab_url();">
	<input type="hidden" id="rid" value="<?php echo $_GET['rid']; ?>">
	
	<div class="control-group">
		<label class="control-label" for="comment">Comment</label>
			<div class="controls">
				<input type="text" id="comment" placeholder="">
			</div>
	</div>
	
	<div class="control-group">
		<div class="controls">
			<label class="checkbox">
				<input type="checkbox"> Email notifications
			</label>
			<button type="submit" value="requestseat" class="btn">Request a seat</button>
		</div>
	</div>
	
</form>

