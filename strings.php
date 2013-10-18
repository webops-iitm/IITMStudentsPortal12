<?

function getSubstring($string,$start,$end){
    $startPos = strpos($string,$start);
    $endPos = strpos($string,$end);
    $len = $endPos - $startPos;
    return isset($string[1]) ? substr($string, $startPos+1, $len-1): '';
}


?>
