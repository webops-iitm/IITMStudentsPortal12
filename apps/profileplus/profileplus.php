<?php 
	include("../../db.php");
	session_start();
	$uname = $_SESSION['uname'];
/*	$uname = "Username";
	$uname = "username";
	$user = "user";
	$name = "name";
	$nick = "nick";
	$room = "room";
	$hostel = "hostel";
	$contact = "contact";
	$email = "email";
    $bgroup = "bgroup";
	$secretary = 0;
*/
	if( $secretary == 1 )
		include( "secretary_page.php" );
	else {
?>
<div class="span11">
<center>
				<div class="widget"  style="float:right;width:1000px; margin:10px;">
					<div class="widget-header">
						<i class="icon-star"></i>
						<h3><?php if($nick!="") echo $nick."'s"; ?>Profile</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
	          			<table>
							<tr>
								<td style="width:100px;"><a href="#">Name</a></td>
								<td><?php echo $name; ?></td>
							</tr><tr>
								<td style="width:100px;"><a href="#">Nickname</a></td>
								<td><?php echo $nick; ?></td>
							</tr><tr>
								<td style="width:100px;"><a href="#">Roll Number</a></td>
								<td><?php echo $user; ?></td>
							</tr><tr>
								<td style="width:100px;"><a href="#">Room No.</a></td>
								<td><?php echo $room; ?></td>
							</tr><tr>
								<td style="width:100px;"><a href="#">Hostel.</a></td>
								<td><?php echo $hostel; ?></td>
							</tr><tr>
								<td style="width:100px;"><a href="#">Contact No.</a></td>
								<td><?php if($contact!=0) echo $contact; ?></td>
							</tr><tr>
								<td style="width:100px;"><a href="#">E-Mail ID</a></td>
								<td><?php echo $email; ?></td>
							</tr><tr>
								<td style="width:100px;"><a href="#">Blood Group</a></td>
								<td><?php echo $bgroup; ?></td>
							</tr>
						</table>
<div class="accordion" id="accordion2">  
            <div class="accordion-group">  
              <div class="accordion-heading">  
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">  
                  Education :
                </a>  
              </div>  
              <div id="collapseOne" class="accordion-body collapse" style="height: 0px; ">  
                <div class="accordion-inner">  
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.  
                </div>  
              </div>  
            </div>  
            <div class="accordion-group">  
              <div class="accordion-heading">  
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">  
                 Scholastic Achievements :
                </a>  
              </div>  
              <div id="collapseTwo" class="accordion-body collapse">  
                <div class="accordion-inner">  
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.  
                </div>  
              </div>  
            </div>  
            <div class="accordion-group">  
              <div class="accordion-heading">  
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">  
                  Academic Projects : 
                </a>  
              </div>  
              <div id="collapseThree" class="accordion-body collapse">  
                <div class="accordion-inner">  
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.  
                </div>  
              </div>  
            </div>
            <div class="accordion-group">  
              <div class="accordion-heading">  
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">  
                  Non - Academic Projects : 
                </a>  
              </div>  
              <div id="collapseFour" class="accordion-body collapse">  
                <div class="accordion-inner">  
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.  
                </div>  
              </div>  
            </div>  
            <div class="accordion-group">  
              <div class="accordion-heading">  
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive">  
                  Professional Experience : 
                </a>  
              </div>  
              <div id="collapseFive" class="accordion-body collapse">  
                <div class="accordion-inner">  
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.  
                </div>  
              </div>  
            </div>
            <div class="accordion-group">  
              <div class="accordion-heading">  
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseSix">  
                  Positions of Responsibility : 
                </a>  
              </div>  
              <div id="collapseSix" class="accordion-body collapse">  
                <div class="accordion-inner">  
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.  
                </div>  
              </div>  
            </div>  
            <div class="accordion-group">  
              <div class="accordion-heading">  
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseSeven">  
                  Sports : 
                </a>  
              </div>  
              <div id="collapseSeven" class="accordion-body collapse">  
                <div class="accordion-inner">  
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.  
                </div>  
              </div>  
            </div>
            <div class="accordion-group">  
              <div class="accordion-heading">  
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseEight">  
                  Co - Curricular Activities : 
                </a>  
              </div>  
              <div id="collapseEight" class="accordion-body collapse">  
                <div class="accordion-inner">  
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.  
                </div>  
              </div>  
            </div>  
            <div class="accordion-group">  
              <div class="accordion-heading">  
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseNine">  
                  Cultural Activities : 
                </a>  
              </div>  
              <div id="collapseNine" class="accordion-body collapse">  
                <div class="accordion-inner">  
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.  
                </div>  
              </div>  
            </div>
            <div class="accordion-group">  
              <div class="accordion-heading">  
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTen">  
                  Others : 
                </a>  
              </div>  
              <div id="collapseTen" class="accordion-body collapse">  
                <div class="accordion-inner">  
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.  
                </div>  
              </div>  
            </div>  
          </div> 

				</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->	
</center>
</div>

<?php
	} // end of if-else to check for secretary
?>
