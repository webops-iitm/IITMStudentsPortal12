<?
$pwd = "ABCDEFEF"; // Actual password entered by user
$enc_pwd = "$2a$10\$w5hs7xNPiZfSlimqyXHbgOopp0CPa3/7FRDiI4RSaiIAzV2BTqBya"; // this password you fetch from database as per the username
$pepper = "";

if(crypt($pwd.$pepper, $enc_pwd)==$enc_pwd) echo "<br>Successfully Logged in";
else "failure";

?>
