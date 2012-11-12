<?php
	include("../../db.php");

	session_start();
	
	if (isset($_SESSION['uname']))  $loggedin=1;
	else $loggedin = 0;
	
?>

		<div class="widget-header">
			<i class="icon-comment"></i>
			<h3>Secretary Manifesto</h3>
		</div> <!-- /widget-header -->
		<div class="widget-content">						
		
					<?php
							if(!$loggedin) echo"Please login to continue";
							
							else {
					?>
					
						<table class="table">
							<thead>
								<tr>
									<th>
										<b>Name</b>
									</th>
									<th>
										<b>Post</b>
									</th>
									<th>
										<b>Manifesto</b>
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										Nikhal Bharat Agarwal
									</td>
									<td>
										Students General Secretary
									</td>
									<td>
										<a href="files/Manifesto/StudentsGeneralSecretary.pdf" target="_blank" >General Secretary</a>
									</td>
								</tr>
								<tr>
									<td>
										P. Raaj Rohan Reddy
									</td>
									<td>
										Academic Affairs Secretary
									</td>
									<td>
										<a href="files/Manifesto/AcademicAffairsSecretary.pdf" target="_blank">Academic Affairs Secretary</a>
									</td>
								</tr>
								<tr>
									<td>
										M N Ravichandra
									</td>
									<td>
										Cultural Affairs Secretary(Arts)
									</td>
									<td>
										<a href="files/Manifesto/CulturalAffairsSecretaryArts.pdf" target="_blank" >Cultural Affairs Secretary(arts)</a>
									</td>
								</tr>
								<tr>
									<td>
										Ashwin S Kalkar
									</td>
									<td>
										Cultural Affairs Secretary (Literary)
									</td>
									<td>
										<a href="files/Manifesto/Cul_Lit_Manifesto.pdf" target="_blank" >Cultural Affairs Secretary(Literary)</a>
									</td>
								</tr>
								<tr>
									<td>
										Adapa Praveen Surendra
									</td>
									<td>
										Hostel Affairs Secretary
									</td>
									<td>
										<a href="files/Manifesto/HostelAffairsSecretary.pdf" target="_blank" >Hostel Affairs Secretary</a>
									</td>
								</tr>
								<tr>
									<td>
										Sohan Jawale
									</td>
									<td>
										Co-Curricular Affairs Secretary
									</td>
									<td>
										<a href="files/Manifesto/CO-CURRICULARAFFAIRSSECRETARY.pdf" target="_blank" >Co-Curricular Affairs Secretary</a>
									</td>
								</tr>
								<tr>
									<td>
										K. Ishitha
									</td>
									<td>
										Research Affairs Secretary
									</td>
									<td>
										<a href="files/Manifesto/ResearchAffairsSecretary.pdf" target="_blank" >Research Affairs Secretary</a>
									</td>
								</tr>
								<tr>
									<td>
										Snehil Pandey
									</td>
									<td>
										Sports Secretary
									</td>
									<td>
										<a href="files/Manifesto/SportsSecretary.pdf" target="_blank" >Sports Secretary</a>
									</td>
								</tr>
								<tr>
									<td>
										S Chandrasekhar
									</td>
									<td>
										SAC Speaker
									</td>
									<td>
										<a href="http://students.iitm.ac.in/thefifthestate/" target="_blank" >SAC Speaker</a>
									</td>
								</tr>
							</tbody>
						</table>	
									
									
									
								
									
					
					<?php } ?>
		</div>
