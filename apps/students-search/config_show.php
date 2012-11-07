<?php 
  //die("got ya");
  $var= $_GET['userd']; 
  
  $query = "select * from users where username = \"$var\" order by fullname";
  $numresults=mysql_query($query);

  $row = mysql_fetch_array($numresults);
  $show_name=$row['fullname'];
  $show_nick=$row['nick'];
  $show_user=$row['username'];
  $show_hostel=$row['hostel'];
  $show_room=$row['room'];
  $show_email=$row['email'];
  $show_contact=$row['contact'];
  $show_bgroup=$row['bgroup'];
  
	// Check if the user is in the student secretary database
  $result_sec = mysql_query("SELECT * FROM stu_sec WHERE upper(username) like \"%$var%\" ");
	$sec_count = mysql_num_rows($result_sec);
	$show_secretary = 0;
	$show_disp_pic=0;
	if( $sec_count >= 1 ) {
		$show_secretary = 1;
		$sec_row = mysql_fetch_array($result_sec);
		$show_post = $sec_row['post'];
		$show_tenure = $sec_row['tenure'];
		$show_hobbies = $sec_row['hobbies'];
		$show_form_email = $sec_row['form_email'];
		$show_disp_pic = $sec_row['pic'];
	}
	
	
	
	?>