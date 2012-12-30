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
										<a href="student-search.php?userd=CE08B055">Nikhal Bharat Agarwal</a>
									</td>
									<td>
										<a href="#">Students General Secretary</a>
									</td>
									<td>
										<a href="files/Manifesto/StudentsGeneralSecretary.pdf" target="_blank" >General Secretary</a>
									</td>
								</tr>
								<tr>
									<td>
										<a href="student-search.php?userd=EE08B045">P. Raaj Rohan Reddy</a>
									</td>
									<td>
										<a href="#">Academic Affairs Secretary</a>
									</td>
									<td>
										<a href="files/Manifesto/AcademicAffairsSecretary.pdf" target="_blank">Academic Affairs Secretary</a>
									</td>
								</tr>
								<tr>
									<td>
										<a href="student-search.php?userd=CE09B033">M N Ravichandra</a>
									</td>
									<td>
										<a href="#">Cultural Affairs Secretary(Arts)</a>
									</td>
									<td>
										<a href="files/Manifesto/CulturalAffairsSecretaryArts.pdf" target="_blank" >Cultural Affairs Secretary(arts)</a>
									</td>
								</tr>
								<tr>
									<td>
										<a href="student-search.php?userd=MM09B003">Ashwin S Kalkar</a>
									</td>
									<td>
										<a href="#">Cultural Affairs Secretary (Literary)</a>
									</td>
									<td>
										<a href="files/Manifesto/Cul_Lit_Manifesto.pdf" target="_blank" >Cultural Affairs Secretary(Literary)</a>
									</td>
								</tr>
								<tr>
									<td>
										<a href="student-search.php?userd=NA09B001">Adapa Praveen Surendra</a>
									</td>
									<td>
										<a href="#">Hostel Affairs Secretary</a>
									</td>
									<td>
										<a href="files/Manifesto/HostelAffairsSecretary.pdf" target="_blank" >Hostel Affairs Secretary</a>
									</td>
								</tr>
								<tr>
									<td>
										<a href="student-search.php?userd=ME08B076">Sohan Jawale</a>
									</td>
									<td>
										<a href="#">Co-Curricular Affairs Secretary</a>
									</td>
									<td>
										<a href="files/Manifesto/CO-CURRICULARAFFAIRSSECRETARY.pdf" target="_blank" >Co-Curricular Affairs Secretary</a>
									</td>
								</tr>
								<tr>
									<td>
										<a href="student-search.php?userd=AE08D019">K. Ishitha</a>
									</td>
									<td>
										<a href="#">Research Affairs Secretary</a>
									</td>
									<td>
										<a href="files/Manifesto/ResearchAffairsSecretary.pdf" target="_blank" >Research Affairs Secretary</a>
									</td>
								</tr>
								<tr>
									<td>
										<a href="student-search.php?userd=ME09B054">Snehil Pandey</a>
									</td>
									<td>
										<a href="#">Sports Secretary</a>
									</td>
									<td>
										<a href="files/Manifesto/SportsSecretary.pdf" target="_blank" >Sports Secretary</a>
									</td>
								</tr>
								<tr>
									<td>
										<a href="student-search.php?userd=ME08B087">S Chandrasekhar</a>
									</td>
									<td>
										<a href="#">SAC Speaker</a>
									</td>
									<td>
										<a href="http://students.iitm.ac.in/thefifthestate/" target="_blank" >SAC Speaker</a>
									</td>
								</tr>
							</tbody>
						</table>	
									
									
									
								
									
					
					<?php } ?>
		</div>