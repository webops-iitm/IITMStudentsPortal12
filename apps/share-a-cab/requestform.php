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

<form class="form-horizontal" action="javascript:_url();">
	<div class="control-group">
		<label class="control-label" for="numrequired">Number of seats required</label>
			<div class="controls">
				<input type="text" id="numrequired" placeholder="">
			</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="requestby">Requested by</label>
			<div class="controls">
				<input type="text" id="requestby" placeholder="">
			</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="comment">Comment</label>
			<div class="controls">
				<input type="textfield" id="comment" placeholder="">
			</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<label class="checkbox">
				<input type="checkbox"> Email notifications
			</label>
			<button type="submit" class="btn">Submit</button>
		</div>
	</div>
</form>

