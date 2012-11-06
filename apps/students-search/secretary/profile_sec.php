<?php

  if(file_exists("db.php"))  include("db.php");
  if(file_exists("../../../db.php"))  {
    include("../../../db.php"); // hack : passing var as GET into config_show doesn't work for some reason ...
    //session_start();
    $var = $_GET['userid'];
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
	}
	//if(file_exists("../../../config.php"))  include("../../../config.php");
  
  if (isset($_COOKIE["user"]))
    $_SESSION['uname'] = $_COOKIE["user"];
 
?>
<table>
	<tr>
		<td style="width:100px;"><a href="#">Display Picture</a></td>
		<td>
			<img src="files/secretary/<?php echo $show_disp_pic; ?>" width="150" height="150" />
		</td>
	</tr><tr>
		<td style="width:100px;"><a href="#">Name</a></td>
		<td><?php echo $show_name; ?></td>
	</tr><tr>
		<td style="width:100px;"><a href="#">Nickname</a></td>
		<td><?php echo $show_nick; ?></td>
	</tr><tr>
		<td style="width:100px;"><a href="#">Roll No.</a></td>
		<td><?php echo $show_user; ?></td>
	</tr><tr>
		<td style="width:100px;"><a href="#">Room No.</a></td>
		<td><?php echo $show_room; ?></td>
	</tr><tr>
		<td style="width:100px;"><a href="#">Hostel</a></td>
		<td><?php echo $show_hostel; ?></td>
	</tr><tr>
     <td style="width:100px;"><a href="#">Post</a></td>
     <td><?php echo $show_post; ?></td>
	</tr><tr>
		<td style="width:100px;"><a href="#">Tenure</a></td>
		<td><?php echo $show_tenure; ?></td>
	</tr><tr>
		<td style="width:100px;"><a href="#">Contact No.</a></td>
		<td><?php if($show_contact!=0) echo $show_contact; ?></td>
	</tr><tr>
		<td style="width:100px;"><a href="#">E-Mail ID</a></td>
		<td><?php echo $show_email; ?></td>
	</tr><tr>
		<td style="width:100px;"><a href="#">Hobbies</a></td>
		<td><?php echo $show_hobbies; ?></td>
	</tr><tr>
		<td style="width:100px;"><a href="#">Blood Group</a></td>
		<td><?php echo $show_bgroup; ?></td>
	</tr>									
</table>
