<?php
	include"includes/swiki.php";

	$swiki = new SWiki;

	if ( !empty( $swiki->Search ) ){
		echo $swiki->Include_links_scripts();

 		echo"<div id='hero' style='position:absolute; min-height:100%; width:100%;'>";

			echo $swiki->Include_header();
			echo $swiki->Include_sub_header();
			echo $swiki->Include_Search_Content();
			echo $swiki->Include_footer();
		echo"</div>";
	}
	else if ( file_exists('/var/sites/IITMStudentsPortal12/swiki/'.$swiki->URL.'.php') ) include $swiki->URL.'.php';

	else if ( $swiki->Check_Link() ){
		echo $swiki->Include_links_scripts();
		echo'<div id="hero" style="position:absolute; min-height:100%; width:100%;">';

			echo $swiki->Include_header();
			echo $swiki->Include_sub_header();
			echo $swiki->Include_Link_Content();
			echo $swiki->Include_footer();

		echo"</div>";
	}
	else $swiki->ShowErrorPage(404);

?>
