
<center>
<div class="span3 offset2">
	<div class="widget"  style="float:right;width:400px; margin:10px;">
		<div class="widget-header">
			<i class="icon-star"></i>
			<h3>Online Complaint System - Preferences</h3>
		</div> <!-- /widget-header -->
		<div class="widget-content">
			<form id="form" name="prefform" action="apps/ocs/prefssubmit.php" method="post">
				<table>
					<tr>
						<td style="width:200px;"><a href="#">Email Alerts</a></td>
						<td><input style="color:#fff;" id="email" type="checkbox" name="email" <?php if($ocs_pref_email == 1) echo 'checked="checked"'; ?>/></td>
					</tr><tr>
						<td style="width:200px;"><a href="#">SMS Alerts [Coming Soon]</a></td>
						<td><input style="color:#fff;" id="sms" type="checkbox" name="sms" disabled <?php if($ocs_pref_email == 1) echo 'checked="checked"'; ?>/></td>
					</tr><tr>
						<center>
							<td colspan="2">
								<a href="#"><input class="btn btn-warning" type="submit" value="Update" name="update_prefs" /></a>
							</td>
						</center>
					</tr>
				</table>
			</form>
		</div> <!-- /widget-content -->
						
	</div> <!-- /widget -->	
</div>
</center>

