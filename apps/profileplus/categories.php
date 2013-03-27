<!--
<div class="accordion-group">
	<div class="accordion-heading">
		<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordionProfile" href="#collapse_<?php echo $catID; ?>"> 
			<h4>
				<?php //echo $catname;?> 
				<span href="#myModal_<?php //echo $catID; ?>" role="button" data-toggle="modal" class="extra_button_right pull-right">
					&nbsp; <i style="margin-top: 4px;" class="icon-plus-sign"></i> Add &nbsp;
				</span>
			</h4>	
		</a>
	</div>
	<div id="collapse_<?php //echo $catID; ?>" class="accordion-body collapse" style="height: 0px;">
		<div class="accordion-inner accordion-inner-info">
			<?php //include 'catready.php'; ?>
		</div>
	</div>
</div>
-->
<div id="myModal_<?php echo $catID; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" style="color:#ffffff;" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel" style="color : #ffffff;"><?php echo $catname; ?></h3>
	</div>
	<div class="modal-body">
		<?php include("catadd.php"); ?>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		<button class="btn btn-primary" id="mySubmit_<?php echo $catID; ?>" " onclick="javascript:document.getElementById('form_<?php echo $catID;?>').submit();">Save changes</button>
	</div>
</div>
