<?php
	$edureadyresult = mysql_query("SELECT * FROM stu_education WHERE username = '$uname'");
?>
<div>
	<div>
		<center>
			<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered display" id="tableEdu" style=" width:80%;">
				<tr>
					<th>Title</th>
					<th>Description</th>
					<th>Score</th>
					<th>Status</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
<?php
			while($edureadyrow = mysql_fetch_array($edureadyresult)) {
				if($edureadyrow['status'] == 1) $status = "<span style='color:#00ff00; font-weight:bold;'>Approved</span>";
				elseif($edureadyrow['status'] == 2) $status = "<span style='color:#0000ff;'>Pending</span>";
				elseif($edureadyrow['status'] == 3) $status = "<span style='color:#ff0000;'>Rejected</span>";
?>
				<tr>
					<td> <?php echo $edureadyrow['head']; ?> </td>
					<td> <?php echo $edureadyrow['desc']; ?> </td>
					<td> <?php echo $edureadyrow['score']; ?> </td>
					<td> <?php echo $status; ?> </td>
					<td> 
						<a href="javascript:eduedit('<?php echo $edureadyrow['head']; ?>', '<?php echo $edureadyrow['desc']; ?>', '<?php echo $edureadyrow['dept']; ?>', '<?php echo $edureadyrow['score']; ?>');" class="edueditbutton my_button">
							Edit
						</a>
					</td>
					<td>
						<a href="" role="button" onclick="javascript:edudel('<?php echo $edureadyrow['head']; ?>', '<?php echo $edureadyrow['desc']; ?>', '<?php echo $edureadyrow['dept']; ?>', '<?php echo $edureadyrow['score']; ?>');" class="edudelbutton  my_button">
							Delete
						</a>
					</td>
				</tr>
<?php 
			}
?>
				<tr>

					<td>
						<h5>
							<a href="#myModal_Edu" role="button" data-toggle="modal"  class="extra_button_right">
								&nbsp; <i style="margin-top: 2px;" class="icon-plus-sign"></i> Add &nbsp;
							</a>
						</h5>
					</td>
					<td>
						<h5>
							<a href="#myModal_Edu" role="button" data-toggle="modal"  class="extra_button_right">
								&nbsp; <i style="margin-top: 2px;" class="icon-plus-sign"></i> Add &nbsp;
							</a>
						</h5>
					</td>
					<td>
						<h5>
							<a href="#myModal_Edu" role="button" data-toggle="modal"  class="extra_button_right">
								&nbsp; <i style="margin-top: 2px;" class="icon-plus-sign"></i> Add &nbsp;
							</a>
						</h5>
					</td>
					<td>
						<h5>
							<a href="#myModal_Edu" role="button" data-toggle="modal"  class="extra_button_right">
								&nbsp; <i style="margin-top: 2px;" class="icon-plus-sign"></i> Add &nbsp;
							</a>
						</h5>
					</td>
					<td>
						<h5>
							<a href="#myModal_Edu" role="button" data-toggle="modal"  class="extra_button_right">
								&nbsp; <i style="margin-top: 2px;" class="icon-plus-sign"></i> Add &nbsp;
							</a>
						</h5>
					</td>
					<td>
						<h5>
							<a href="#myModal_Edu" role="button" data-toggle="modal"  class="extra_button_right">
								&nbsp; <i style="margin-top: 2px;" class="icon-plus-sign"></i> Add &nbsp;
							</a>
						</h5>
					</td>
				</tr>
			</table>
		</center>
	</div>
</div>
