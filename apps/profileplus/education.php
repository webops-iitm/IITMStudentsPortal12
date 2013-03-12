<center>
  Education	<a id="eduaddbutton" onClick="document.getElementById('eduadd').style.display='block';document.getElementById('eduaddbutton').style.visibility='hidden'" class="btn btn-success btn-small">Add</a>
</center>
<div class="" id="eddready">
	<?php include 'eduready.php'; ?>
</div>
	<div class="" id="eduadd" style="display:none">
				    <div class="control-group" id="qualiselect">  
            				<label class="control-label" for="Qualifications">Qualification</label>  
            				<div class="controls">  
              					<select onChange="qualichange()" id="Qualifications">
                                	<option></option>
                					<option>10th</option>  
                					<option>12th</option>
                					<option>B.Tech</option>  
                					<option>Dual Degree</option>  
                					<option>M.Tech</option>  
                					<option>PhD</option>  
                					<option>Others</option>  
              					</select>  
            				</div>  
          				</div><a onClick="document.getElementById('eduadd').style.display='none';document.getElementById('eduaddbutton').style.visibility='visible'" class="btn btn-success btn-small">Cancel</a>
                
                <!-- Javascript Work is left here  -->
                  <form class="form-horizontal" id="eduform" style="display:none;" action="apps/profileplus/resumeedusubmit.php" method="post">  
 						<fieldset>
                        <legend name="qualidisplay" id="Qualidisplay">Others</legend>  
                        <div class="control-group">  
            			        <label class="control-label" for="QualiOthers">Others</label>  
            				<div class="controls">  
              					<input type="text" class="input-xlarge" name="qualiothers" readonly='true' id="QualiOthers">
                                <input type="text" class="input-xlarge" name="qualidept" id="QualiDept">   
            				</div> 
          				</div>
                        <div class="control-group">  
            			        <label class="control-label" for="Qualidesc">Description</label>  
            				<div class="controls">  
              					<input type="text" class="input-xlarge" name="qualidesc" id="Qualidesc">   
            				</div> 
          				</div>
                        <div class="control-group">  
            			        <label class="control-label" for="Qualiscore">Score</label>  
            				<div class="controls">  
              					<input type="text" class="input-xlarge" name="qualiscore" id="Qualiscore">   
            				</div> 
          				</div>
        	                  <div class="form-actions">  
      					      <button type="submit" name="eduform" class="btn btn-primary">Submit</button>  
        					  </div>
   						</fieldset></form>
                        </div>