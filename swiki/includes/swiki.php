<?php

	require_once'../db.php';

	class SWiki{

		public $URL;

		public $Vars;

		public $Search;

		public $SearchFormated;

		public function __construct(){
			$url = preg_split( '/[?\/=]/', $_SERVER['REQUEST_URI']);
			$this->URL =str_ireplace("%20","", trim( !empty($url[2]) ? $url[2] : 'home' ) );
			$this->Vars = $url[sizeof($url)-1];
			if ( $url[sizeof($url)-2]=='search' ) $this->Search = $url[sizeof($url)-1];
			$this->SearchFormated = preg_replace('/\+/',' ',$this->Search);
		}

		function Check_Link(){
			$result = mysql_query("SELECT * FROM `students`.`swiki` WHERE `swiki`.`link` LIKE '$this->URL'") or $this->ShowErrorPage(500);
			return mysql_num_rows($result);
		}

		public function ShowErrorPage($code){
			ob_clean();
			header('HTTP/1.0 $code');
    			include('public/'.$code.'.php');
    			exit();
		}

		
		function Get_All_With_Link(){
			$result = mysql_query("SELECT * FROM `students`.`swiki` WHERE `swiki`.`link` LIKE '$this->URL'") or $this->ShowErrorPage(500);
			return mysql_fetch_object($result);
		}

		function Include_links_scripts(){
			$html = $html."<html lang='en'><head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
					<meta charset='utf-8'>
					<title>Students Wiki Page</title>
					<!-- Le styles -->
					<link href='includes/css/bootstrap.css' rel='stylesheet'>
					<link href='includes/css/bootstrap-responsive.css' rel='stylesheet'>
					<link href='includes/css/font-awesome.min.css' rel='stylesheet'>
					<link href='includes/css/style.css' rel='stylesheet'>
					<link rel='stylesheet' href='includes/css/jquery-ui.min.css' type='text/css' /> 
					<script type='text/javascript' src='includes/js/jquery-1.9.1.min.js'></script>
					<script type='text/javascript' src='includes/js/jquery-ui.min.js'></script>

					<!-- Fav and touch icons -->
					<link rel='apple-touch-icon-precomposed' sizes='144x144' href='includes/img/apple-touch-icon-144-precomposed.png'>
					<link rel='apple-touch-icon-precomposed' sizes='114x114' href='includes/img/apple-touch-icon-114-precomposed.png'>
					<link rel='apple-touch-icon-precomposed' sizes='72x72' href='includes/img/apple-touch-icon-72-precomposed.png'>
					<link rel='apple-touch-icon-precomposed' href='includes/img/apple-touch-icon-57-precomposed.png'>
					<link rel='shortcut icon' href='includes/img/favicon.png'>
					<style id='holderjs-style' type='text/css'>.holderjs-fluid {font-size:16px;font-weight:bold;text-align:center;font-family:sans-serif;margin:0}</style></head>

					<body style='background-color:#53B2D5;'>";
			return $html;
		}

		function Include_header(){
			$html = $html."<div class='banner navbar navbar-static-top navbar-inverse'>
						<div class='navbar-inner'>
							<div class='container'>
		
								<a class='brand' href='http://students.iitm.ac.in'><span style='line-height:70px; letter-spacing:1px;'>IIT MADRAS | STUDENTS PORTAL</span></a>

								<!-- Responsive Navbar -->
								<div id='nav-main'>
									<ul id='menu' class='nav'>
										<li><a href='http://students.iitm.ac.in/swiki'>Home</a></li>
										<li class='active'><a href='#'>Students Wiki</a></li>
										<li><a href='http://students.iitm.ac.in/forum/'>Thought Cloud</a></li>
										<li><a href='http://t5e.iitm.ac.in/'>T5E</a></li>
										<li><a href='http://students.iitm.ac.in/swiki/?search=AllArticles'>All Articles</a></li>
									</ul>
								</div>
							</div> <!-- /.container -->
						</div><!-- /.navbar-inner -->
					</div><!-- /.navbar -->   ";
			return $html;
		}

		function Include_footer(){
			$html = $html."<footer style='position:absolute; bottom:0px; width:100%;'>
     
					<!-- Sub footer -->
						<div class='sub-footer'>
							<div class='container'>
								<div id='social-icons'>
									<ul>
										<li class='social-icon twitter'>
											<a class='fade-img' href='#' rel='tooltip' title='Twitter'>
												<img src='includes/img/icons_twitter.png' alt='Twitter'>
											</a>
										</li>
										<li class='social-icon facebook'>
											<a class='fade-img' href='#' rel='tooltip' title='Facebook'>
												<img src='includes/img/icons_facebook.png' alt='Facebook'>
											</a>
										</li>
										<li class='social-icon gplus'>
											<a class='fade-img' href='#' rel='tooltip' title='Google+'>
												<img src='includes/img/icons_google.png' alt='Google+'>
											</a>
										</li>
										<li class='social-icon vimeo'>
											<a class='fade-img' href='#' rel='tooltip' title='Vimeo'>
												<img src='includes/img/icons_vimeo.png' alt='Vimeo'>
											</a>
										</li>
										<li class='social-icon youtube'>
											<a class='fade-img' href='#' rel='tooltip' title='YouTube' >
												<img src='includes/img/icons_youtube.png' alt='YouTube'>
											</a>
										</li>
										<li class='social-icon linkedin'>
											<a class='fade-img' href='#'  rel='tooltip' title='LindekIn' >
												<img src='includes/img/icons_linkedin.png' alt='LindekIn'>
											</a>
										</li>
										<li class='social-icon flickr'>
											<a class='fade-img' href='#' rel='tooltip' title='Flickr'>
												<img src='includes/img/icons_flickr.png' alt='Flickr'>
											</a>
										</li>
										<li class='social-icon pinterest'>
											<a class='fade-img' href='#' rel='tooltip' title='Pinterest'>
												<img src='includes/img/icons_pinterest.png' alt='Pinterest'>
											</a>
										</li>
										<li class='social-icon rss'>
											<a class='fade-img' href='#'  rel='tooltip' title='RSS'>
												<img src='includes/img/icons_rss.png' alt='RSS'>
											</a>
										</li>
									</ul>
								</div>
								<div class='copyright-text'>Copyright 2013 Powered by<a href='#'>InstituteWebops</a></div>
							</div>
						</div>
					</footer>
    <div class='fit-vids-style'>­<style>               .fluid-width-video-wrapper {                 width: 100%;                              position: relative;                       padding: 0;                            }                                                                                   .fluid-width-video-wrapper iframe,        .fluid-width-video-wrapper object,        .fluid-width-video-wrapper embed {           position: absolute;                       top: 0;                                   left: 0;                                  width: 100%;                              height: 100%;                          }                                       </style></div>

  ";
			return $html;
		}

		function Include_IITM_home_header(){
			$html = $html."<br><br>
					<div class='row'>
						<div class='col-lg-2'>
							<img src='includes/img/IITM_Logo.JPG' width='185px' height='185px'>
						</div>
						<div class='col-lg-7'>
							<blockquote>
								<h2>Indian Institute Of Technology</h2>
								<h2>FAQ</h2>
								<h3>Students Portal</h3>
							</blockquote>
						</div>
					</div><br><br>";
			return $html;
		}


		function Include_auto_suggest_form(){
			$html = $html."<script type='text/javascript'>
					$(function() {
						//autocomplete
						$(\".auto\").autocomplete({
							source: \"auto_suggest_search\",
							minLength: 1,
							appendTo: \"#div_suggest_list\",  
							open: function() { $(\"#div_suggest_list .ui-menu\").width(700) }  
						});                
	 
					});
				</script>

		<div class='container'>

		<!-- Hero title -->
			<div class='hero-title'>
				<h1>Students Wiki Page</h1>
			</div>

		<!-- Hero search -->
			<div class='hero-search'>
				<form role='search' method='get' id='searchform' class='form-search' action=''>
					<label class='hide' for='s'>Search for:</label>
						<input type='text' id='autocomplete-dynamic' name='search' class='searchajax search-query auto' autocomplete='off' placeholder='Find Article! Enter search term here.' value= '$this->SearchFormated' >
					<input type='submit' id='searchsubmit' value='Search' class='btn-black'>
					<div class='ui-menu' style='text-align:left;' id='div_suggest_list'></div>
				</form>
          
			</div>

		<!-- Hero boxes -->
			<div class='span8 offset4'>
				<div class='row boxes'>
					<div class='span4 '>
						<div class='box '>
							<div class='box-icon'>
							</div>
							<div class='box-title'>
								<h2><a href='http://students.iitm.ac.in/swiki/?search=AllArticles'>All Articles</a></h2>
							</div>
						</div>
					</div>
				</div> 
			</div>
		</div>";
			return $html;
		}


		function Include_sub_header(){
			$html = $html."<script type='text/javascript'>
					$(function() {
						//autocomplete
						$(\".auto2\").autocomplete({
							source: \"auto_suggest_search\",
							minLength: 1,
							appendTo: \"#div_suggest_list2\",  
							open: function() { $(\"#div_suggest_list2 .ui-menu2\").width(550) }  
						});                
	 
					});
				</script>
				<br>
				<div id='page-header-container'>
					<div class='container'>
						<div class='page-header row'>
							<div class='span8'>
								<h1>Students Wiki Page</h1>
								<p class='tagline'>Find answers and help fast</p>
							</div>
							<div class='span4'>
								<form role='search' method='get' id='searchform' class='form-search' action='' >
									<label class='hide' for='search'>Search for:</label>
									<input type='text' value='$this->SearchFormated' name='search' id='autocomplete-dynamic' class='searchajax search-query span4 auto2' autocomplete='off' placeholder='Enter search term here.' style='text-align:left;height:30;'>
									<div class='ui-menu2' style='text-align:left;' id='div_suggest_list2'></div>
								</form>
							</div>
						</div>
					</div>
				</div>";
			return $html;
		}

		function Include_Search_Content(){
			$query = "SELECT `swiki`.`link`,`swiki`.`name`,`swiki`.`brief_content`,`swiki`.`created_timestamp` FROM `students`.`swiki` WHERE Match(link, name, brief_content, content) AGAINST ('";
			$booleanSearch = explode(" ", $this->SearchFormated);  
			foreach ($booleanSearch as $word) {
				$query .= "+".$word."* ";
			}
			$query .= "' IN BOOLEAN MODE) OR (`name` LIKE '%".$this->SearchFormated."%') OR (`link` LIKE '%".$this->SearchFormated."%') OR (`brief_content` LIKE '%".$this->SearchFormated."%')";
			if( $this->SearchFormated == 'AllArticles')
				$query = "Select * FROM `students`.`swiki` WHERE 1 ORDER BY `swiki`.`id`";

			$html=$html."<div class='container' style='margin-bottom:30px;'>
					<div id='main' class='span12' role='main'>
						<div class='page-title'>
							<h1>Articles</h1>
						</div>";


			$result = mysql_query($query);
			while ( $row = mysql_fetch_object($result) ){
				$row->brief_content = substr($row->brief_content,0,120)."...";
				$html=$html."<article class='hentry'>
						<header>
							<h2><i class='icon-file'></i> <a href='$row->link'>$row->name</a></h2>
							<div class='loop-like'>
								<span class='label label-likes'><i class='icon-comment'></i> 6</span>
							</div>    
						</header>
						<div class='entry-content'>
							<p>$row->brief_content <span class='label label-color'><a href='$row->link'> Read more <i class='icon-chevron-right'></i></a></span></p>
						</div>
						<footer class='post-meta'>
							<time class='updated' datetime='$row->created_timestamp' pubdate=''>Last Updated: $row->created_timestamp </time>          
						</footer>
					</article>";

			}
			if ( mysql_num_rows($result) == 0 ) $html=$html."<p>No Results found</p>";
			$html = $html."<br><br></div></div>";
			return $html;
		}

		function Include_Link_Content(){
			$result = mysql_query("SELECT * FROM `students`.`swiki` WHERE `swiki`.`link` LIKE '$this->URL'") or $this->ShowErrorPage(500);
			$row = mysql_fetch_object($result);
			$html=$html."<div class='container'>
						<div id='main' class='single-post span12' role='main'>
							<article class='post type-post hentry'>
								<header>
									<h1 class='entry-title'>$row->name </h1>
									<div class='post-meta'>
										<time class='updated' datetime='$row->created_timestamp' pubdate=''>Last Updated: $row->created_timestamp </time>              
									</div>
								</header>
								<div class='entry-content'>
									<p>$row->content</p>
								</div>
							</article>
						</div>
					</div>";
			return $html;
			
		}




	}
?>
