<!--
<div class="accordion-group">
	<div class="accordion-heading">
		<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordionProfile" href="#collapse_Edu"> 
			<h4>
				Education 
				<span href="#myModal_Edu" role="button" data-toggle="modal"  class="extra_button_right pull-right">
					&nbsp; <i style="margin-top: 4px;" class="icon-plus-sign"></i> Add &nbsp;
				</span>
			</h4>
		</a>
	</div>
	<div id="collapse_Edu" class="accordion-body collapse" style="height: 0px;">
		<div class="accordion-inner accordion-inner-info">
			<?php //include 'eduready.php'; ?>
		</div>
	</div>
</div> 
	-->
<center>
<div id="myModal_Edu" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" style="color:#ffffff;" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel" style="color : #ffffff;">Education</h3>
	</div>
	<div class="modal-body">
		<?php include("eduadd.php"); ?>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		<button class="btn btn-primary" onclick="javascript:document.getElementById('eduform').submit();">Save changes</button>
	</div>
</div>
</center>	
					
