<?php
session_start();
include"function.php";

$share = new ShareACab;

if (!$share->get_session())
	{
		die("Login to continue");
	}
if (isset($_GET['origin']))
	{
		$added = $share->add_new($_GET['bookedby'], $_GET['origin'], $_GET['destination'], $_GET['date'], $_GET['time'], $_GET['numseats'], $_GET['numvacancy'], $_GET['cabtype'], $_GET['comment']);
		if ($added) die("Successfully added");
	}

?>


<form class="form-horizontal" action="javascript:addnew_url();">
	<div class="control-group">
		<label class="control-label" for="origin">Origin</label>
			<div class="controls">
				<input type="text" id="origin" placeholder="Origin">
			</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="destination">Destination</label>
			<div class="controls">
				<input type="text" id="destination" placeholder="Destination">
			</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="date">Date</label>
			<div class="controls">
				<input data-datepicker="datepicker" class="small" type="text" id="date" value="2011-05-01">
			</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="date">time</label>
			<div class="controls">
				<input data-datepicker="datepicker" class="small" type="text" id="time" value="22:21">
			</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="numseats">Number of seats</label>
			<div class="controls">
				<input type="text" id="numseats" placeholder="Total number of seats">
			</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="numvacancy">Number of vacancies</label>
			<div class="controls">
				<input type="text" id="numvacancy" placeholder="Total number of vacancies">
			</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="cabtype">Cab type</label>
			<div class="controls">
				<input type="radio" name="cabtype" id="cabtype" value="A/c">A/c<br>
				<input type="radio" name="cabtype" id="cabtype" value="Non A/c">Non A/c
			</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="bookedby">Booked by</label>
			<div class="controls">
				<input type="text" id="bookedby" placeholder="">
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