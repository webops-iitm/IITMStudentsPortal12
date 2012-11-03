<?php

session_start();
include"function.php";

$share = new ShareACab;

if (!$share->get_session())
	{
		die("Login to continue");
	}

$result = $share->scheduled();
if($result)
	{
		while($row=mysql_fetch_assoc($result))
					{
						extract($row);
								echo"<div class='accordion' id='accordion$rid'>
										<div class='accordion-group'>
											<div class='accordion-heading'>
												<a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion$rid' href='#collapse$rid'>
													<strong>From: $origin   &nbsp;  To: $destination   &nbsp;  On: $date  &nbsp; $time</strong>
												</a> 
											</div>
											<div id='collapse$rid' class='accordion-body collapse'>
													<div class='accordion-inner'>
														<div class='row'>
															<div class='span4 offset1'>
																<p>Booked by: $bookedby</p>
																<p>Cab type: $cabtype &nbsp; Total number of seats: $numvacancy</p>";
								if($comment)	echo"<p>Comment: $comment";
								echo"						</div>
															<div class='span4 offset2'>";
?>
																<a href="javascript:ajaxcontent('apps/share-a-cab/requestform.php?rid=<?php echo"$rid";?>', 'widget-subcontent');">Request a Seat</a>
<?php
								echo"						</div>
														</div>
													</div>
											</div>
										</div>
									</div>";
					}
	}
	
?>