<?php

include "db.php";

//$array = array('g.prasanthsai@gmail.com','g.prasanth963@gmail.com', 'na10b042@smail.iitm.ac.in');

foreach( $array as $to ){
	$body = "Hello,<br><br>

	Your Placement Reps account has been created. Your Log In credentials are:<br>

	Link: http://placement.iitm.ac.in/reps<br>
	Username: Your Roll Number<br>
	Password: Your Roll Number In Capital Letters<br><br><br>

	Regards<br>
	Institute WebOps";
	$ldapuser = 'NA10B042';
	$ldappwd = '';
	$replymail = 'webops@smail.iitm.ac.in';
	$replyname = 'Institute WebOps';
	$frommail = 'webops@smail.iitm.ac.in';
	$fromname = 'Institute WebOps';
//	$to = $row['mail'];
	$subj = 'Reps Portal Login credentials';

	include "PHPMailer/test/testemail.php";
}


/*	mail('g.prasanthsai@gmail.com', 'the subject', 'the message', null,'-f test@students.iitm.ac.in');
       echo "Done";*/

?>
