<?php
$catreadyquery = "SELECT * FROM student_profile WHERE username = '$uname' AND cat_id = '$catID'";
$catreadyresult = mysql_query($catreadyquery);
?>
<div>
	<div>
		<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered display" id="tableEdu" style="width : 80%;">
			<tr>
				<th>Title</th>
				<th>Description</th>
				<th>Timeline</th>
				<th>Status</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
<?php
		$subc = "";
		while($catreadyrow = mysql_fetch_array($catreadyresult)) {
			if($catreadyrow['status'] == 1) $status = "<span style='color:#00ff00; font-weight:bold;'>Approved</span>";
			elseif($catreadyrow['status'] == 2) $status = "<span style='color:#0000ff;'>Pending</span>";
			elseif($catreadyrow['status'] == 3) $status = "<span style='color:#ff0000;'>Rejected</span>";
?>
			<tr>
				<td> <?php echo $catreadyrow['title']; ?> </td>
				<td> <?php echo $catreadyrow['desc']; ?> </td>
				<td> <?php echo $catreadyrow['timeline']; ?> </td>
				<td> <?php echo $status; ?></td>
				<td> 
					<!--<a href="#myModal_<?php echo $catID; ?>Edit" role="button" data-toggle="modal" onclick="javascript:catedit('<?php echo $catreadyrow['cat_id']; ?>', '<?php echo $catreadyrow['subcat_name']; ?>', '<?php echo $catreadyrow['title']; ?>', '<?php echo $catreadyrow['desc']; ?>', '<?php echo $catreadyrow['timeline']; ?>', '<?php echo $catreadyrow['id']; ?>');" class="cateditbutton my_button">-->
					<a href="javascript:catedit('<?php echo $catreadyrow['cat_id']; ?>', '<?php echo $catreadyrow['subcat_name']; ?>', '<?php echo $catreadyrow['title']; ?>', '<?php echo $catreadyrow['desc']; ?>', '<?php echo $catreadyrow['timeline']; ?>', '<?php echo $catreadyrow['id']; ?>');" class="my_button" >
						Edit
					</a>
				</td>
				<td>
					<a href="javascript:catdel('<?php echo $catreadyrow['cat_id']; ?>', '<?php echo $catreadyrow['subcat_name']; ?>', '<?php echo $catreadyrow['title']; ?>', '<?php echo $catreadyrow['desc']; ?>', '<?php echo $catreadyrow['timeline']; ?>', '<?php echo $catreadyrow['id']; ?>');"  class="catdelbutton my_button">
						Delete
					</a>
				</td>
			</tr>
<?php	}
?>
				<tr>

					<td>
						<h5>
							<a href="#myModal_<?php echo $catID; ?>" role="button" data-toggle="modal"  class="extra_button_right">
								&nbsp; <i style="margin-top: 2px;" class="icon-plus-sign"></i> Add &nbsp;
							</a>
						</h5>
					</td>
					<td>
						<h5>
							<a href="#myModal_<?php echo $catID; ?>" role="button" data-toggle="modal"  class="extra_button_right">
								&nbsp; <i style="margin-top: 2px;" class="icon-plus-sign"></i> Add &nbsp;
							</a>
						</h5>
					</td>
					<td>
						<h5>
							<a href="#myModal_<?php echo $catID; ?>" role="button" data-toggle="modal"  class="extra_button_right">
								&nbsp; <i style="margin-top: 2px;" class="icon-plus-sign"></i> Add &nbsp;
							</a>
						</h5>
					</td>
					<td>
						<h5>
							<a href="#myModal_<?php echo $catID; ?>" role="button" data-toggle="modal"  class="extra_button_right">
								&nbsp; <i style="margin-top: 2px;" class="icon-plus-sign"></i> Add &nbsp;
							</a>
						</h5>
					</td>
					<td>
						<h5>
							<a href="#myModal_<?php echo $catID; ?>" role="button" data-toggle="modal"  class="extra_button_right">
								&nbsp; <i style="margin-top: 2px;" class="icon-plus-sign"></i> Add &nbsp;
							</a>
						</h5>
					</td>
					<td>
						<h5>
							<a href="#myModal_<?php echo $catID; ?>" role="button" data-toggle="modal"  class="extra_button_right">
								&nbsp; <i style="margin-top: 2px;" class="icon-plus-sign"></i> Add &nbsp;
							</a>
						</h5>
					</td>
					
				</tr>
		</table>
    </div>
</div>
