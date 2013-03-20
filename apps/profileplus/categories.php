<p><center>
 <h4> <?php echo $catname;?></h4>	<a id="addbutton_<?php echo $catID;?>" onClick=
  "document.getElementById('add_<?php echo $catID;?>').style.display='block';
  document.getElementById('addbutton_<?php echo $catID;?>').style.visibility='hidden';
  document.getElementById('QualiFormUse_<?php echo $catID;?>').value='add';
  document.getElementById('form_<?php echo $catID;?>').action='apps/profileplus/resumecatsubmit.php';
  catadd(<?php echo $catID;?>);
  " class="btn btn-success btn-small">Add</a>
</center>
<div class="" id="ready_<?php echo $catID;?>">
	<?php include 'catready.php'; ?>
</div>
	<div class="" id="add_<?php echo $catID;?>" style="display:none"> 	<!-- Change Displays to none -->
          				<a onClick=
                        "document.getElementById('add_<?php echo $catID;?>').style.display='none';
                        document.getElementById('addbutton_<?php echo $catID;?>').style.visibility='visible';
                        " class="btn btn-success btn-small">Cancel</a>
                
                <!-- Javascript Work is left here  -->
                  <form class="form-horizontal" id="form_<?php echo $catID;?>" style="display:block;" action="apps/profileplus/resumecatsubmit.php" method="post">  
 						<fieldset>
                        <legend name="qualidisplay_<?php echo $catID;?>" id="Qualidisplay_<?php echo $catID;?>">Add</legend>
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
            			        <label class="control-label" for="QualiTitle_<?php echo $catID;?>">Title</label>  
            				<div class="controls">  
          				    	<input type="text" class="input-xlarge" name="qualititle_<?php echo $catID;?>" id="QualiTitle_<?php echo $catID;?>">
                            </div> 
          				</div>
                        <div class="control-group">  
            			        <label class="control-label" for="Qualidesc_<?php echo $catID;?>">Description</label>  
            				<div class="controls">  
              					<input type="text" class="input-xlarge" name="qualidesc_<?php echo $catID;?>" id="Qualidesc_<?php echo $catID;?>">   
            				</div> 
          				</div>
                        <div class="control-group">  
            			        <label class="control-label" for="Qualitimeline_<?php echo $catID;?>">Timeline</label>  
            				<div class="controls">  
              					<input type="text" class="input-xlarge" name="qualitimeline_<?php echo $catID;?>" id="Qualitimeline_<?php echo $catID;?>">   
            				</div> 
          				</div>
        	                  <div class="form-actions">  
      					      <button type="submit" name="form_<?php echo $catID;?>" class="btn btn-primary">Submit</button>  
        					  </div>
   						</fieldset></form>
                        </div>