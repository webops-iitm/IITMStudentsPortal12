<?php
$fac=$_GET["fac"];
include("../../db.php");
session_start();
?>
<style>
       .star-rating{
		list-style:none;
		margin-right:400px !important;
		padding:0px;
		width: 125px;
		height: 25px;
		position: relative;
		background: url(img/alt_star.gif) top left repeat-x;
		float:right;	
	}
	.star-rating li{
		padding:0px;
		margin:0px;
		/*\*/
		float: left;
		/* */
	}
	.star-rating li a{
		display:block;
		width:25px;
		height: 25px;
		text-decoration: none;
		text-indent: -9000px;
		z-index: 20;
		position: absolute;
		padding: 0px;
	}
	.star-rating li a:hover{
		background: url(img/alt_star.gif) left bottom;
		z-index: 2;
		left: 0px;
	}
	.star-rating a:focus,
	.star-rating a:active{
		border:0;	
		-moz-outline-style: none;
    	        outline: none; 
	}
	.star-rating a.one-star{
		left: 0px;
	}
	.star-rating a.one-star:hover{
		width:25px;
	}
	.star-rating a.two-stars{
		left:25px;
	}
	.star-rating a.two-stars:hover{
		width: 50px;
	}
	.star-rating a.three-stars{
		left: 50px;
	}
	.star-rating a.three-stars:hover{
		width: 75px;
	}
	.star-rating a.four-stars{
		left: 75px;
	}	
	.star-rating a.four-stars:hover{
		width: 100px;
	}
	.star-rating a.five-stars{
		left: 100px;
	}
	.star-rating a.five-stars:hover{
		width: 125px;
	}
	.star-rating li.current-rating{
		background: url(img/alt_star.gif) left center;
		position: absolute;
		height: 25px;
		display: block;
		text-indent: -9000px;
		z-index: 1;
	}
</style>
<div class="widget-header">
	<i class="icon-list"></i>
	<h3><?php echo $fac; ?></h3>
</div> <!-- /widget-header -->
<?php
$facquery="SELECT * FROM facilities WHERE name='$fac'";
			$facresult = mysql_query($facquery);
		
			$faccount = mysql_num_rows($facresult);
		
				if($faccount == 1)
				{
					$facrow = mysql_fetch_array($facresult);
				}
	$stars=25*$facrow['rating'];

$date = date('Y-m-d');
$uid = $_SESSION['uid'];
$checkquery="SELECT * FROM facilities_rating WHERE facility='$fac'AND userid='$uid'AND Date='$date'";
$checkresult = mysql_query($checkquery);		
$checkcount = mysql_num_rows($checkresult);

?>
<div class="widget-content"  id= "widget-content">
<div>
	<?php echo $facrow['desc']; ?>
</div>

<?php
	if (isset($_SESSION['uname']))
	{
		if($checkcount==0) echo "<br><b>Please rate this Facility</b>";
		else echo "<b>Thank You for Rating</b>";
		echo "<ul class='star-rating'>
	<li class='current-rating' id='current-rating' style=\"width: ".$stars."px\"></li>
	<li><a href=\"#\" onclick=\"facvote(1,'".$fac."'); return false;\" 
           title='1 star out of 5' class='one-star'>1</a></li>
	<li><a href=\"#\" onclick=\"facvote(2,'".$fac."'); return false;\" 
           title='2 star out of 5' class='two-stars'>2</a></li>
	<li><a href=\"#\" onclick=\"facvote(3,'".$fac."'); return false;\" 
           title='3 star out of 5' class='three-stars'>3</a></li>
	<li><a href=\"#\" onclick=\"facvote(4,'".$fac."'); return false;\" 
           title='4 star out of 5' class='four-stars'>4</a></li>
	<li><a href=\"#\" onclick=\"facvote(5,'".$fac."'); return false;\" 
           title='5 star out of 5' class='five-stars'>5</a></li>
</ul>";
	}
	else
		echo "<b>Please Login to Rate this Facility</b>";
?>
</div>
