	<div class="accordion-group">  
    	<div class="accordion-heading">  
        	<a class="accordion-toggle categories" data-toggle="collapse" data-parent="#accordion<?php echo $catname; ?>" href="#collapse<?php echo $catID.$subcatID.$subcatname; ?>"><?php echo $subcatname; ?></a>
        </div>  
        <div id="collapse<?php echo $catID.$subcatID.$subcatname; ?>" class="accordion-body collapse" style="height: 0px; ">  
        	<div class="accordion-inner">
        		<div class="control-group">  
            		<label class="control-label" for="textarea">Details</label>  
            		<div class="controls">  
              			<textarea class="input-xlarge" id="textarea" rows="3"></textarea>  
            		</div>
          		</div>  
            </div>  
        </div>  
    </div>        