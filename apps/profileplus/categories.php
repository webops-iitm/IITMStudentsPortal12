<p><center>
 <h4> <?php echo $catname;?></h4>	<a id="<?php echo $catname;?>addbutton" onClick=
  "document.getElementById('<?php echo $catname;?>add').style.display='block';
  document.getElementById('<?php echo $catname;?>addbutton').style.visibility='hidden';
  document.getElementById('<?php echo $catname;?>form').action='apps/profileplus/resumecatsubmit.php';
  " class="btn btn-success btn-small">Add</a>
</center>
<div class="" id="<?php echo $catname;?>ready">
	<?php include 'catready.php'; ?>
</div>
	<div class="" id="<?php echo $catname;?>add" style="display:none"> 	<!-- Change Displays to none -->
          				<a onClick=
                        "document.getElementById('<?php echo $catname;?>add').style.display='none';
                        document.getElementById('<?php echo $catname;?>addbutton').style.visibility='visible';
                        " class="btn btn-success btn-small">Cancel</a>
                
                <!-- Javascript Work is left here  -->
                  <form class="form-horizontal" id="<?php echo $catname;?>form" style="display:block;" action="apps/profileplus/resumecatsubmit.php" method="post">  
 						<fieldset>
                        <legend name="<?php echo $catname;?>qualidisplay" id="<?php echo $catname;?>Qualidisplay">Add</legend>
                        <div class="control-group">  
            			        <label class="control-label" for="<?php echo $catname;?>QualiCat">CategoryID</label>  
            				<div class="controls">  
              					<input type="text" class="input-xlarge" value="<?php echo $catID;?>" name="<?php echo $catname;?>qualicat" id="<?php echo $catname;?>QualiCat">
            				</div> 
          				</div>
                        <div class="control-group">  
            			        <label class="control-label" for="QualiCatname">Category</label>  
            				<div class="controls">  
              					<input type="text" class="input-xlarge" value="<?php echo $catname;?>" name="qualicatname" id="QualiCatname">
            				</div> 
          				</div>
                        <div class="control-group">  
            			        <label class="control-label" for="<?php echo $catname;?>QualiSubcat">Sub Category</label>  
            				<div class="controls">  
              					<input type="text" class="input-xlarge" name="<?php echo $catname;?>qualisubcat" id="<?php echo $catname;?>QualiSubcat">
            				</div> 
          				</div>
                        <div class="control-group">  
            			        <label class="control-label" for="<?php echo $catname;?>QualiTitle">Title</label>  
            				<div class="controls">  
          				    	<input type="text" class="input-xlarge" name="<?php echo $catname;?>qualititle" id="<?php echo $catname;?>QualiTitle">
                            </div> 
          				</div>
                        <div class="control-group">  
            			        <label class="control-label" for="<?php echo $catname;?>Qualidesc">Description</label>  
            				<div class="controls">  
              					<input type="text" class="input-xlarge" name="<?php echo $catname;?>qualidesc" id="<?php echo $catname;?>Qualidesc">   
            				</div> 
          				</div>
                        <div class="control-group">  
            			        <label class="control-label" for="<?php echo $catname;?>Qualitimeline">Timeline</label>  
            				<div class="controls">  
              					<input type="text" class="input-xlarge" name="<?php echo $catname;?>qualitimeline" id="<?php echo $catname;?>Qualitimeline">   
            				</div> 
          				</div>
        	                  <div class="form-actions">  
      					      <button type="submit" name="<?php echo $catname;?>form" class="btn btn-primary">Submit</button>  
        					  </div>
   						</fieldset></form>
                        </div>