


	<?php if(!$complaint){ ?>
			<form name="complaint_form" action="javascript:mess_complaint_url()">
					<center><table >
						 
						<tr>
							<td>
								Hostel
							</td>
							<td>
								&nbsp; <input type='text' name = 'hostel' id = 'hostel'>
							</td>
						</tr>
						<tr>
							<td>
								Room Number
							</td>
							<td>
								 &nbsp; <input type='text' name = 'room' id = 'room'>
							</td>
						</tr>
						<tr>
							<td>
								Desired mess
							</td>
							<td>
								 &nbsp; <input type='text' name = 'desired_mess' id = 'desired_mess'>
							</td>
						</tr>
						<tr>
							<td>
								Reason
							</td>
							<td>
								 &nbsp; <textarea  maxlength="400" name = 'reason' id='reason'></textarea>
							</td>
						</tr>
						
							
					</table></center>
						<?php if(isset($_GET['mess_complaint'])) echo "<br> {$_GET['mess_complaint']} </br>";  ?>
						
						<br><input type="submit" class="btn btn-primary" value="Submit" name="complaint" />
			</form>
		<?php } else { ?>
					Your request has been accepted and is under processing<br><br>
					<b><?php echo $_SESSION['uname']; ?></b><br>
					&emsp;Hostel  - <?php echo $hostel; ?><br>
					&emsp;Room Number - <?php echo $room; ?><br>
					&emsp;Desired mess  - <?php echo $desired_mess; ?><br>
					&emsp;Reason  - <?php echo $reason; ?><br>
		<?php } ?>
