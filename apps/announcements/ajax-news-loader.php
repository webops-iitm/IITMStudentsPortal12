<?php
include("../../db.php");
function getSubstring($string,$start,$end){
    $startPos = strpos($string,$start);
    $endPos = strpos($string,$end);
    $len = $endPos - $startPos;
    return isset($string[1]) ? substr($string, $startPos+1, $len-1): '';
}
include("../../secretaries.php");
$page=$_POST['page'];
if(isset($_POST['secretory']))
{
$sec=$_POST['secretory'];
}
$noOfAnn=$_POST['annno'];
$start=($page-1)*$noOfAnn;
$end=$start+$noOfAnn;
if(!isset($sec))
{
$query = "SELECT * FROM news ORDER BY id DESC LIMIT $noOfAnn OFFSET $start";
}
else{
$query = "SELECT * FROM news WHERE email LIKE '%".$sec."%' ORDER BY id DESC LIMIT $noOfAnn OFFSET $start";

}

$result=mysql_query($query)or die ("Error in query: $query " . mysql_error()); 
$check = mysql_num_rows($result);
if($check)
{
$counter=$start;
while ($news=mysql_fetch_assoc($result))
{
		$news_email= getSubstring($news['email'],'<','>');
		$news_email=trim($news_email);
		$subject=$news['subject'];
		$body=$news['body'];
		$date=$news['date'];
		
		if (array_key_exists($news_email, $secretaries)) 
		{
			$from =$secretaries[$news_email];
		}
		else 
		{
			$parts = explode('@', $news_email);
			$from =$parts[0] ;
		}
		if(is_array($from)){
		$user=$from['user_id'];
		$name=$from['post_name']; 
		}
		else{
		$user="#";
		$name=$from; }
	?>

		<div class="accordion-group">
							<div class="accordion-heading">
							  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?php echo $counter; ?>">
								<?php echo $subject; ?>
							  </a>
							  <div class="row" >
								<div class="span4 offset1">
								From: <a href="student-search.php?userd=<?php echo $user; ?>"><?php echo $name; ?></a>
								</div>
								<div class="span4 offset2">Date:
								<?php 
								if(!is_null($date) && $date!="" && $date!=0){
								echo date('dS \o\f F h:i A', $date); }
								else{echo "Unknown"; }
								?>
								</div>
								</div>
							</div>
							<div id="collapse<?php echo $counter; ?>" class="accordion-body collapse">
							  <div id="news-body"  class="accordion-inner">
								<?php echo $body; ?>
								</div>
							</div>
						  </div>

<?php
$counter++;
}
}
else
{
echo 0; 
}
?>



		








