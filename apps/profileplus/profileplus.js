		function picload()
		{
			alert("working");
		}
		function qualichange()
		{
			var quali = document.getElementById('Qualifications').value;
			if(quali == "")alert("Please select any valid Qualification");
			else
			{
			document.getElementById("Qualidisplay").textContent = quali;
			document.getElementById("QualiOthers").value = quali;
			
			document.getElementById("Qualidesc").readOnly = false;
			document.getElementById("Qualiscore").readOnly = false;

			if(quali == "10th")document.getElementById("QualiDept").readOnly = true ;	//Edit this later
			else document.getElementById("QualiDept").readOnly = false ;
			document.getElementById("eduform").style.display = 'block';
			
			document.getElementById('eduform').action="apps/profileplus/resumeedusubmit.php";
			}
		}
		function eduadd()
		{
			document.getElementById("QualiOthers").value = "";
			document.getElementById("Qualidesc").value = "";
			document.getElementById("QualiDept").value = "";
			document.getElementById("Qualiscore").value = "";
			document.getElementById("QualiOthers").readOnly = false;
			document.getElementById("Qualidesc").readOnly = false;
			document.getElementById("QualiDept").readOnly = false;
			document.getElementById("Qualiscore").readOnly = false;
			
			document.getElementById('eduadd').style.display='block';
			document.getElementById('eduaddbutton').style.visibility='hidden';
			document.getElementById('qualiselect').style.display='block';
			document.getElementById('eduform').action='apps/profileplus/resumeedusubmit.php';
		}
		function eduedit(head, desc, dept, score)
		{
			$("#myModal_Edu").modal("show");
			var quali = head;
			document.getElementById("Qualidisplay").textContent = "Form for Editing - "+quali;
			document.getElementById("eduform").style.display = 'block';
			document.getElementById("QualiOthers").value = quali;
			document.getElementById("Qualidesc").value = desc;
			document.getElementById("QualiDept").value = dept;
			document.getElementById("Qualiscore").value = score;
			
			document.getElementById("QualiOthers").readOnly = true;
			document.getElementById("Qualidesc").readOnly = false;
			document.getElementById("QualiDept").readOnly = false;
			document.getElementById("Qualiscore").readOnly = false;
			
			document.getElementById("QualiOthers").style.color = '#000';
			document.getElementById("QualiDept").style.color = '#000';
			document.getElementById("Qualidesc").style.color = '#000';
			document.getElementById("Qualiscore").style.color = '#000';
			
			if(quali == "10th")document.getElementById("QualiDept").readOnly = true ;	//Edit this later
			else document.getElementById("QualiDept").readOnly = false ;
			document.getElementById('eduadd').style.display='block';
            document.getElementById('qualiselect').style.display='none';
			document.getElementById('eduform').action="apps/profileplus/resumeedusubmit.php";
		}
		function edudel(head, desc, dept, score)
		{
			var quali = head;
			document.getElementById("Qualidisplay").textContent = "Click Submit to Delete - "+quali;
			document.getElementById("eduform").style.display = 'block';
			document.getElementById("QualiOthers").value = quali;
			document.getElementById("Qualidesc").value = desc;
			document.getElementById("QualiDept").value = dept;
			document.getElementById("Qualiscore").value = score;
			
			document.getElementById("QualiOthers").readOnly = true;
			document.getElementById("Qualidesc").readOnly = true;
			document.getElementById("QualiDept").readOnly = true;
			document.getElementById("Qualiscore").readOnly = true;
			
			document.getElementById("QualiOthers").style.color = '#000';
			document.getElementById("QualiDept").style.color = '#000';
			document.getElementById("Qualidesc").style.color = '#000';
			document.getElementById("Qualiscore").style.color = '#000';
			
			document.getElementById('eduadd').style.display='block';
            document.getElementById('qualiselect').style.display='none';
			document.getElementById('eduform').action="apps/profileplus/resumeedudelete.php";
		}
		function catadd(cat_id)
		{			
			var catsubcat = "QualiSubcat_"+cat_id;
			var cattitle = "QualiTitle_"+cat_id;
			var catdesc = "Qualidesc_"+cat_id;
			var cattimeline = "Qualitimeline_"+cat_id;
			
			document.getElementById(catsubcat).value = "";
			document.getElementById(cattitle).value = "";
			document.getElementById(catdesc).value = "";
			document.getElementById(cattimeline).value = "";
			document.getElementById(catsubcat).readOnly = false;
			document.getElementById(cattitle).readOnly = false;
			document.getElementById(catdesc).readOnly = false;
			document.getElementById(cattimeline).readOnly = false;
		}
		
		function catedit(cat_id, subcat_name, title, desc, timeline, id)
		{
			$("#myModal_"+cat_id).modal("show");
			var catdisplay = "Qualidisplay_"+cat_id;
			var catform = "form_"+cat_id;
			var catsubcat = "QualiSubcat_"+cat_id;
			var cattitle = "QualiTitle_"+cat_id;
			var catdesc = "Qualidesc_"+cat_id;
			var cattimeline = "Qualitimeline_"+cat_id;
			var cataddbutton = "addbutton_"+cat_id;
			var catadd = "add_"+cat_id;
			var catformuse = "QualiFormUse_"+cat_id;
			var catoldtitleid = "QualiTitle_Old_Id_"+cat_id;
			
			document.getElementById(catformuse).value="edit";
			
			document.getElementById(catdisplay).textContent = "Form for Editing - "+title;
			document.getElementById(catform).style.display = 'block';
			document.getElementById(catsubcat).value = subcat_name;
			document.getElementById(cattitle).value = title;
			document.getElementById(catoldtitleid).value = id;
			document.getElementById(catdesc).value = desc;
			document.getElementById(cattimeline).value = timeline;
			
			document.getElementById(catsubcat).readOnly = false;
			document.getElementById(cattitle).readOnly = false;
			document.getElementById(catdesc).readOnly = false;
			document.getElementById(cattimeline).readOnly = false;
			
			document.getElementById(catsubcat).style.color = '#000';
			document.getElementById(cattitle).style.color = '#000';
			document.getElementById(catdesc).style.color = '#000';
			document.getElementById(cattimeline).style.color = '#000';
			
			document.getElementById(catadd).style.display='block';
			document.getElementById(catform).action="apps/profileplus/resumecatsubmit.php";
		}
		function catdel(cat_id, subcat_name, title, desc, timeline)
		{
			$("#myModal_"+cat_id).modal("show");
			var catdisplay = "Qualidisplay_"+cat_id;
			var catform = "form_"+cat_id;
			var catsubcat = "QualiSubcat_"+cat_id;
			var cattitle = "QualiTitle_"+cat_id;
			var catdesc = "Qualidesc_"+cat_id;
			var cattimeline = "Qualitimeline_"+cat_id;
			var cataddbutton = "addbutton_"+cat_id;
			var catadd = "add_"+cat_id;
			var catformuse = "QualiFormUse_"+cat_id;
			var catoldtitle = "QualiTitle_Old_Id_"+cat_id;

			document.getElementById(catdisplay).textContent = "Click Submit to Delete - "+title;
			document.getElementById(catform).style.display = 'block';
			document.getElementById(catsubcat).value = subcat_name;
			document.getElementById(cattitle).value = title;
			document.getElementById(catoldtitle).value = title;
			document.getElementById(catdesc).value = desc;
			document.getElementById(cattimeline).value = timeline;
			
			document.getElementById(catsubcat).readOnly = true;
			document.getElementById(cattitle).readOnly = true;
			document.getElementById(catdesc).readOnly = true;
			document.getElementById(cattimeline).readOnly = true;
			
			document.getElementById(catsubcat).style.color = '#000';
			document.getElementById(cattitle).style.color = '#000';
			document.getElementById(catdesc).style.color = '#000';
			document.getElementById(cattimeline).style.color = '#000';
			
			//document.getElementById(catadd).style.display='block';
			document.getElementById("mySubmit_"+cat_id).innerHTML = 'Delete';
			document.getElementById(catform).action="apps/profileplus/resumecatdelete.php";
		}
		function setCarousel(carousel_name) {
			/*var l = document.getElementsByClassName("profile_carousel_item");
			for( var i = 0; i < l.length; i++ ) 
				l[i].className = "item profile_carousel_item";
			document.getElementById(carousel_name).className += " active";
			*/
			var l = document.getElementsByClassName("profile_carousel_nav");
			for( var i = 0; i < l.length; i++ ) {
				l[i].className = "profile_carousel_nav";
				//l[i].style['width'] = "";
			}
			document.getElementById(carousel_name+"_nav").className += " active";
			//var cur_w = parseInt(document.defaultView.getComputedStyle(document.getElementById(carousel_name+'_nav', "")).getPropertyValue('width'))
			//document.getElementById(carousel_name+"_nav").style["width"] = cur_w + 130 + "px";
		
			
			
			$('#myCarousel').carousel(carousel_name);
			$('#myCarousel').carousel("pause");
			onload_carousel();
			
			
		}
		function onload_carousel() {
			$(document).on('mouseleave', '#myCarousel', function() { 
						$(this).carousel('pause');
			} );
		}
		function next_carousel() { //incomplete
			var l = document.getElementsByClassName("profile_carousel_nav");
			var k = -1;
			for( var i = 0; i < l.length; i++ ) {
				if(l[i].className.indexOf("active") !== -1) {
					k = i+1;
					alert(k);
				}
				l[i].className = "profile_carousel_nav";
				//l[i].style['width'] = "";
			}
			document.getElementById(carousel_name+"_nav").className += " active";
			if(k != -1) setCarousel(k);
		}
		function prev_carousel() { // incomplete
			alert("prev");
		}
