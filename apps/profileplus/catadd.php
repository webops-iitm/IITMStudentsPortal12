<!-- Javascript Work is left here  -->
<form class="form-horizontal" id="form_<?php echo $catID;?>" style="display:block;" action="apps/profileplus/resumecatsubmit.php" method="post">  
	<legend name="qualidisplay_<?php echo $catID;?>" style="color : #dddddd;" id="Qualidisplay_<?php echo $catID;?>">Add</legend>
	<div class="control-group" style="display:none">  
		<label class="control-label" for="QualiCat_ID">CategoryID</label>
		<div class="controls">  
			<input type="text" class="input-xlarge" value="<?php echo $catID;?>" name="qualicat_id" id="QualiCat_ID">
		</div> 
	</div>
   <div class="control-group" style="display:none">  
			<label class="control-label" for="Qualiformuse_<?php echo $catID;?>">Action</label>  
		<div class="controls">  
			<input type="text" class="input-xlarge" value="add" name="qualiformuse_<?php echo $catID;?>" id="QualiFormUse_<?php echo $catID;?>">
		</div> 
	</div>
   <div class="control-group" style="display:none">  
			<label class="control-label" for="QualiTitle_Old_Id_<?php echo $catID;?>">Old Title</label>  
		<div class="controls">  
			<input type="text" class="input-xlarge" value="" name="QualiTitle_Old_Id_<?php echo $catID;?>" id="QualiTitle_Old_Id_<?php echo $catID;?>">
		</div> 
	</div>
	<div class="control-group" style="display:none">  
			<label class="control-label" for="QualiSubcat_<?php echo $catID;?>">Sub Category</label>  
		<div class="controls">  
			<input type="text" class="input-xlarge" name="qualisubcat_<?php echo $catID;?>" id="QualiSubcat_<?php echo $catID;?>">
		</div> 
	</div>
	<div class="control-group">  
			<label class="control-label" style="color : #ffffff;" for="QualiTitle_<?php echo $catID;?>">Title</label>  
		<div class="controls">  
			<input type="text" class="input-xlarge" name="qualititle_<?php echo $catID;?>" id="QualiTitle_<?php echo $catID;?>">
		</div> 
	</div>
	<div class="control-group">  
			<label class="control-label" style="color : #ffffff;" for="Qualidesc_<?php echo $catID;?>">Description</label>  
		<div class="controls">  
			<input type="text" class="input-xlarge" name="qualidesc_<?php echo $catID;?>" id="Qualidesc_<?php echo $catID;?>">   
		</div> 
	</div>
	<div class="control-group">  
			<label class="control-label" style="color : #ffffff;" for="Qualitimeline_<?php echo $catID;?>">Timeline</label>  
		<div class="controls">  
			<input type="text" class="input-xlarge" name="qualitimeline_<?php echo $catID;?>" id="Qualitimeline_<?php echo $catID;?>">   
		</div> 
	</div>
<!--		  <div class="form-actions">  
		  <button type="submit" name="form_<?php echo $catID;?>" class="btn btn-primary">Submit</button>  
		  </div>
-->
	</form>
