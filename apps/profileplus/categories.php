<div class="accordion-group">
	<div class="accordion-heading">  
    	<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordioncat" href="#collapse<?php echo $catID.$catname; ?>">  
                  <?php echo $catname; ?>
                </a>  
    </div>  
    <div id="collapse<?php echo $catID.$catname; ?>" class="accordion-body collapse" style="height: 0px; ">  
    	<div class="accordion-inner">
                  <p>Sections under which you want it on the Profile Page : </p>
                  <div class="accordion" id="accordion<?php echo $catname; ?>">
                  <?php
				  $subcatresult = mysql_query("SELECT * FROM $SubCatTable where cat_id = $catID");
				   while($subcatrow = mysql_fetch_array($subcatresult)){
					   $subcatname = $subcatrow['name'];
					   $subcatID = $subcatrow['id'];
					   $subcatparent = $subcatrow['cat_id'];
					   $subcatdesc = $subcatrow['description'];
					   $subcattype = $subcatrow['type'];
					   
					    include 'subcategories.php'; 
				   }
						?>
                  <form class="form-horizontal">  
 						<fieldset>
        	                        <div class="form-actions">  
            <button type="submit" class="btn btn-primary">Save changes</button>  
            <button class="btn">Cancel</button>  
          							</div> 
   						</fieldset></form>
                        </div>
		</div>  
	</div>
</div>