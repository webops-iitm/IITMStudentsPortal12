
	
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
									<option value="2">Krishna ISS</option>
									<option value="3">Vindhya Ground Floor VTH M1 ( North Indian Menu )</option>
									<option value="4">Vindhya Ground Floor VTH M2 ( South Indian Menu )</option>
									<option value="5">Vindhya First Floor VTH M1 ( North Indian Menu )</option>
									<option value="6">Krishna Jain Food ISS M1/M2 ( Jain Food )</option>
									<option value="7">Sarayu Extn VC M1 ( North Indian Menu )</option>
<option value="8">Sarayu Extn VC M2 ( South Indian Menu )</option>
<option value="10">Himalaya SK M1 ( North Indian Menu )</option>
<option value="11">Himalaya SK M2 ( South Indian Menu ) </option>
<option value="13">Himalaya RR M2 ( South Indian Menu ) </option>
<option value="14">Himalaya SGR M1 ( North Indian Menu ) </option>
<option value="15">Himalaya SGR M2 ( South Indian Menu ) </option>
								</select>
							</td>
							<td>
								<select name="hyg" id="hyg" style="width:110px;">
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
								</select>
							</td>
							<td>
								<select name="qtn" id="qtn" style="width:110px;">
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
								</select>
							</td>
							<td>
								<select name="csm" id="csm" style="width:110px;">
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
								</select>
							</td>
							</tr>
							<tr><td colspan="5"><strong>Points Scale</strong><br>Extremely Unsatisfactory - 1 Points, Excellent - 10 Points</td></tr>
							<tr><td colspan="5"><strong>Remarks </strong><input type='text' style='width:100%;' name='remark' id='remark'></input></td></tr>
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
					&emsp;Remarks.  - <?php echo $remark; ?><br>
		<?php } ?>
