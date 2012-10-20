
	
		<?php if(!$rated){ ?>
			<form name="messrating" action="javascript:mess_rating_url();">
					<table rules="all">
						<tr>
							<td style="width:80px;"><b>Caterer</b></td>
							<td style="width:80px;"><b>Hygiene</b></td>
							<td style="width:80px;"><b>Quantity</b></td>
							<td style="width:80px;"><b>Quality</b></td>
							<td style="width:80px;"><b>Service & Management</b></td>
						</tr>
						<tr>
							<td>
								<select name="cat" id="cat" style="width:110px;">
									<option value="-1" selected>Select</option>
									<option value="1">HM Cauvery</option>
									<option value="2">HM Krishna</option>
									<option value="5">Vindhya M1</option>
									<option value="6">Vindhya M2</option>
									<option value="8">Himalaya RR</option>
									<option value="9">Himalaya SK</option>
									<option value="10">Himalaya ISS(Mess)</option>
								</select>
							</td>
							<td>
								<select name="hyg" id="hyg" style="width:110px;">
									<option value="-1" selected>Select</option>
									<option value="5">5</option>
									<option value="4">4</option>
									<option value="3">3</option>
									<option value="2">2</option>
									<option value="1">1</option>
									<option value="0">0</option>
								</select>
							</td>
							<td>
								<select name="qtn" id="qtn" style="width:110px;">
									<option value="-1" selected>Select</option>
									<option value="5">5</option>
									<option value="4">4</option>
									<option value="3">3</option>
									<option value="2">2</option>
									<option value="1">1</option>
									<option value="0">0</option>
								</select>
							</td>
							<td>
								<select name="qlt" id="qlt" style="width:110px;">
									<option value="-1" selected>Select</option>
									<option value="10">10</option>
									<option value="9">9</option>
									<option value="8">8</option>
									<option value="7">7</option>
									<option value="6">6</option>
									<option value="5">5</option>
									<option value="4">4</option>
									<option value="3">3</option>
									<option value="2">2</option>
									<option value="1">1</option>
									<option value="0">0</option>
								</select>
							</td>
							<td>
								<select name="csm" id="csm" style="width:110px;">
									<option value="-1" selected>Select</option>
									<option value="5">5</option>
									<option value="4">4</option>
									<option value="3">3</option>
									<option value="2">2</option>
									<option value="1">1</option>
									<option value="0">0</option>
								</select>
							</td>
							</tr>
							<tr><td colspan="5"><strong>Points Scale</strong><br>Excellent - 5 Points, Very Good - 4 Points, Good - 3 Points, Average - 2 Points, Poor - 1 Point, Very Poor - 0 Point</td></tr>
					</table>
						<?php if(isset($_GET['mess_rating'])) echo "<br> {$_GET['mess_rating']} </br>";  ?>
						
								<input type="hidden" value="<?php echo date("Y-m-d"); ?>" name="date" />
								<br><input type="submit" class="btn btn-primary" value="Submit" name="rate" />
			</form>
		<?php } else { ?>
					Thank you for the ratings. You can submit mess rating once per day<br><br>
					<b><?php echo cat($cat); ?></b><br>
					&emsp;Hygiene  - <?php echo $hyg; ?><br>
					&emsp;Quantity - <?php echo $qtn; ?><br>
					&emsp;Quality  - <?php echo $qlt; ?><br>
					&emsp;Service & Mgmt.  - <?php echo $csm; ?><br>
		<?php } ?>