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
		$search = $share->search_cab($_GET['origin'], $_GET['destination'], $_GET['date'], $_GET['numrequired'], $_GET['cabtype']);
		if ($search) 
			{
				while($row=mysql_fetch_assoc($search))
					{
						extract($row);
								echo"<div class='accordion' id='accordion$rid'>
										<div class='accordion-group'>
											<div class='accordion-heading'>
												<a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion$rid' href='#collapse$rid'>
													<strong>From: $origin   &nbsp;  To: $destination   &nbsp;  On: $date  &nbsp; $time</strong>
												</a> 
												<div class='row'>
													<div class='span4 offset1'>
														<a href='#'>Number of vacancies: $numvacancy</a>
													</div>
												</div>
											</div>
											<div id='collapse$rid' class='accordion-body collapse'>
													<div class='accordion-inner'>
														<div class='row'>
															<div class='span4 offset1'>
																<p>Booked by: $bookedby</p>
																<p>Cab type: $cabtype &nbsp; Total number of seats: $numvacancy</p>";
								if($comment)	echo"<p>Comment: $comment";
								echo"						</div>
															<div class='span4 offset2'>
																<a href='#'>Request to share</a>
															</div>
														</div>
													</div>
											</div>
										</div>
									</div>";
					}
			}
		die("");
	}

?>

<form class="form-horizontal" action="javascript:searchcab_url();">
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
		<label class="control-label" for="numrequired">Number of seats required</label>
			<div class="controls">
				<input type="text" id="numrequired" placeholder="Number of seats required">
			</div>
	</div>
		<div class="control-group">
		<label class="control-label" for="cabtype">Cab type</label>
			<div class="controls">
				<input type="radio" name="cabtype" id="cabtype" value="ac">A/c<br>
				<input type="radio" name="cabtype" id="cabtype" value="nonac">Non A/c
			</div>
	</div>
		<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn">Submit</button>
		</div>
	</div>
</form>