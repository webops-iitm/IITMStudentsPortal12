<?php // Error reporting + Handle GET requests
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');
	
	include("../db.php"); // basic stuff
	session_start();
	
	// GET request - logout
	if( isset($_GET['log']) && $_GET['log'] == "out" ) {
		setcookie("user", "", time()-120);
		unset($_SESSION['c_uname']);
	}

?>
<!-- initial HTML for all pages -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Complaints - IITM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons --
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    -->
	<link rel="shortcut icon" href="../img/favicon.png">
	
	
	<style type="text/css" title="currentStyle">
			@import "../css/data_table.css";
	</style>
	<script type="text/javascript" language="javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="../js/jquery.dataTables.js"></script>
	<script>
		function update(datasource, target)
		{
			if (window.XMLHttpRequest)
			  {// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			  }
			else
			  {// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			    {
			    document.getElementById(target).innerHTML=xmlhttp.responseText;
			    }
			  else{
				document.getElementById(target).innerHTML = '<img src="../img/load.gif"> Loading ...';
				}
			  }
			xmlhttp.open("GET",datasource,true);
			xmlhttp.send();
		}
	</script>
  </head>

  <body>

<?php // Check if logged in, and give required warnings

	$logged_in = 0;
	if( isset($_SESSION['c_uname']) ) {
		// debug: echo "WITH SESSION";
		$uname = $_SESSION['c_uname'];
		// get info from sql
		$sql="SELECT * FROM ocs_categories WHERE admin_username='$uname'";
		$login = mysql_query($sql);
		if ( mysql_num_rows($login) >= 1) {
			$row = mysql_fetch_array($login);
			
			$logged_in = 1; // logged in now !
			$_SESSION['c_uname'] = $uname;
			$uid = $row['id'];
			$dept = $row['title'];
			$email = $row['admin_email'];
		}
	}
	
	if ( $logged_in == 0 && // ! logged_in (with session) + COOKIE/POST exist
			( ( isset($_COOKIE['complaints_user']) && isset($_COOKIE['complaints_pass']) )
			|| ( isset($_POST['uname']) && isset($_POST['pass']) ) ) )
					{ // trying to login.
		// debug: echo "TRYING TO LOGIN ! ";
		setcookie("user", "", time()-120); // as im trying to login, unset last login credentials
		unset($_SESSION['c_uname']);
		if( isset($_COOKIE['complaints_user']) && isset($_COOKIE['complaints_pass']) ) { // check in cookie
			// debug: echo "WITH COOKIES";
			$uname = $_COOKIE['complaints_user'];
			$pass = $_COOKIE['complaints_pass'];
		} else if( isset($_POST['uname']) && isset($_POST['pass']) ) { // check in post
			// debug: echo "WITH POST";
			$uname = $_POST['uname'];
			$pass = $_POST['pass'];
		}
		$sql="SELECT * FROM ocs_categories WHERE admin_username='$uname'";
		$login = mysql_query($sql);
		if ( mysql_num_rows($login) >= 1) {
			// debug: echo "FOUND USERNAME";
			$row = mysql_fetch_array($login);
			
			if ( $row['admin_pwd'] == $pass ) {
				// debug: echo "FOUND PASSWORD";
				$logged_in = 1; // logged in now !
				if(isset($_POST['remember']) && $_POST['remember']==true) {
					// save to cookie if you want to be remembered
					$expire=time()+120;
					setcookie("complaints_user", $uname, $expire);
					setcookie("complaints_pass", $pass, $expire);
				}
				$_SESSION['c_uname'] = $row['admin_username']; // save to session
				$uid = $row['id'];
				$dept = $row['title'];
				$email = $row['admin_email'];
			} else { // wrong password
				// debug: echo "PASSWORD ENTERED IS WRONG";
?>
        <div class="alert alert-error">
			<span class="label label-inverse">Success</span>
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			This password doesn't match the username entered.
        </div>
<?php
			} 
		} else { // username doesn't exist
			// debug: echo "WRONG USERNAME";
?>
        <div class="alert alert-error">
			<span class="label">Error</span>
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			Username doesn't exist !
        </div>
<?php
		}
	}
?>

    <div id="content_body">	
	
<?php // not for the actual content of the page !
	if ( $logged_in == 1 ) {
		// means logged_in via session OR cookie OR POST and also checked with db if user exists
		// debug: echo "LOGGED IN ! ";
		if(isset($_GET['q']))
			$loggedin_query = $_GET['q'];
		include("logged_in.php");
	} else { // need to login !  show login form
	// this could be cuz of earlier failed login (where errors will already be shown, 
	// OR cuz of first time login / cookies expired / session not valid
		// debug: echo "NOT LOGGED IN ! ";
		include("login.php");
	}
?>
    </div>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery.dataTables.js"></script>
    <script src="../js/bootstrap-affix.js"></script>
    <script src="../js/bootstrap-alert.js"></script>
    <script src="../js/bootstrap-button.js"></script>
    <script src="../js/bootstrap-carousel.js"></script>
    <script src="../js/bootstrap-collapse.js"></script>
    <script src="../js/bootstrap-dropdown.js"></script>
    <script src="../js/bootstrap-modal.js"></script>
    <script src="../js/bootstrap-popover.js"></script>
    <script src="../js/bootstrap-scrollspy.js"></script>
    <script src="../js/bootstrap-tab.js"></script>
    <script src="../js/bootstrap-tooltip.js"></script>
    <script src="../js/bootstrap-transition.js"></script>
    <script src="../js/bootstrap-typeahead.js"></script>

  </body>
</html>
