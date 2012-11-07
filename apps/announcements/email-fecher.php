<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
include_once("/var/sites/IITMStudentsPortal12/test/db.php");

// configure your imap mailboxes
$mailbox = array(
		'label' 	=> 'Gmail',
		'enable'	=> true,
		'mailbox' 	=> '{imap.gmail.com:993/imap/ssl}INBOX',
		'username' 	=> 'announce.iitm@gmail.com',
		'password' 	=> 'students12'
	
);

// a function to convert /n to <br/>--- formating the text
function ReplaceImap($txt) {
  $carimap = array("=C3=A9", "=C3=A8", "=C3=AA", "=C3=AB", "=C3=A7", "=C3=A0", "=20", "=C3=80", "=C3=89");
  $carhtml = array("é", "è", "ê", "ë", "ç", "à", "&nbsp;", "À", "É");
  $txt = str_replace($carimap, $carhtml, $txt);
  return $txt;
}


				// Open an IMAP stream to our mailbox
				$stream = @imap_open($mailbox['mailbox'], $mailbox['username'], $mailbox['password']);				
				if (!$stream){ 				
				} 
				else {
					$emails = imap_search($stream,'UNSEEN');
					if (!count($emails)){						
					} 
					else{
						foreach ($emails as $email){
							$mail_header=imap_header($stream, $email);
							//var_dump($mail_header);
							$text = imap_fetchbody($stream, $email, 1);
							$text = imap_utf8($text);
							$text = ReplaceImap($text);
							
							$subject=$mail_header->subject;
							$from=$mail_header->fromaddress;
							$date=strtotime($mail_header->date);
							$body=nl2br($text);
							
							
							$body = addslashes($body);
							$from = addslashes($from);
							$subject = addslashes($subject);
							$date = addslashes($date);
							$query="INSERT INTO news SET email='$from', subject='$subject', body='$body', date='$date'";	
							$result=mysql_query($query) or die(mysql_error()); 
						}		
					} 					 
				}
				mysql_close($con);
				imap_close($stream);
	mail('vineet.1991.483@gmail.com', 'cronjob executed', 'the message', null,'noreply@students2.iitm.ac.in');
?>


	
