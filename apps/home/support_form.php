
<center>
<div class="span3 offset1">
				<div class="widget"  style="position:relative; width:400px; top:0px; right:0px; margin:5px;">
					<div class="widget-header">
						<i class="icon-star"></i>
						<h3>Having trouble?</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
						<div class="accordion" id="accordion2">
							<div class="accordion-group">
								<div class="accordion-heading">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
										Password reset request
									</a>
								</div>
								<div id="collapseOne" class="accordion-body collapse">
									<div class="accordion-inner">
										<form id="form" name="pwdresetform" action="apps/home/support_submit.php" method="post">
											<table>
												<tr>
													<td style="width:100px;"><a href="#">*Roll No.</a></td>
													<td><input id="rollno" type="text" name="rollno" maxlength="8" onchange="if(this.value != 'admin') this.value = this.value.toUpperCase();"/></td>
												</tr><tr>
													<td style="width:100px;"><a href="#">*Name</a></td>
													<td><input id="name" type="text" name="name"  /></td>
												</tr>
												<tr><center><td colspan="2"><a href="#"><input class="btn btn-warning" type="submit" value="submit" name="submit1" /></a></td></center></tr>
													
											</table>
										</form>
									</div>
								</div>
							</div>
							<div class="accordion-group">
								<div class="accordion-heading">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
										Profile edit request
									</a>
								</div>
								<div id="collapseTwo" class="accordion-body collapse">
									<div class="accordion-inner">
										<form id="form" name="profileeditform" action="apps/home/support_submit.php" method="post">
											<table>
												<tr>
													<td style="width:100px;"><a href="#">*Roll No.</a></td>
													<td><input id="rollno" type="text" name="rollno" maxlength="8" onchange="if(this.value != 'admin') this.value = this.value.toUpperCase();"/></td>
												</tr><tr>
													<td style="width:100px;"><a href="#">*Name</a></td>
													<td><input id="name" type="text" name="name"  /></td>
												</tr><tr>
													<td style="width:100px;"><a href="#">*Queries</a></td>
													<td><textarea id="query" name="query" ></textarea></td>
												</tr>
												<tr><center><td colspan="2"><a href="#"><input class="btn btn-warning" type="submit" value="submit" name="submit2" /></a></td></center></tr>
													
											</table>
										</form>
									</div>
								</div>
							</div>
							<div class="accordion-group">
								<div class="accordion-heading">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
										Account creation request
									</a>
								</div>
								<div id="collapseThree" class="accordion-body collapse">
									<div class="accordion-inner">
										<form id="form" name="pwdresetform" action="apps/home/support_submit.php" method="post">
											<table>
												<tr>
													<td style="width:100px;"><a href="#">*Roll No.</a></td>
													<td><input id="rollno" type="text" name="rollno" maxlength="8" onchange="if(this.value != 'admin') this.value = this.value.toUpperCase();" /></td>
												</tr><tr>
													<td style="width:100px;"><a href="#">*Name</a></td>
													<td><input id="name" type="text" name="name"  /></td>
												</tr><tr>
													<td style="width:100px;"><a href="#">*Room no.</a></td>
													<td><input id="roomno" type="text" name="roomno" maxlength="4" /></td>
												</tr><tr>
													<td style="width:100px;"><a href="#">*Hostel</a></td>
													<td><input id="hostel" type="text" name="hostel" maxlength="15" /></td>
												</tr>
												<tr><center><td colspan="2"><a href="#"><input class="btn btn-warning" type="submit" value="submit" name="submit3" /></a></td></center></tr>
													
											</table>
										</form>
										
									</div>
								</div>
							</div>
						</div>
						<p align="left" style="font-size:14px;">
						*Required fields</br>
						<?php
						if(isset($_GET['success'])) echo"<br><i> Request Successfully submitted</i>";
						if(isset($_GET['error'])){
							if($_GET['error'] == 3) echo"Please check all fields are properly filled";
							elseif($_GET['error'] == 2) echo"Please try again";
						}
						?>
						<p>
				</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->	
</div>
</center>

