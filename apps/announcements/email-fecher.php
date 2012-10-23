<?php
require_once("../../db.php");
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
				
				if (!$stream) { 
				
				} 
				else {
					$emails = imap_search($stream,'UNSEEN');
					if (!count($emails)){
						
					} 
					else {
					foreach ($emails as $mail_number) 
					{
						$mail_header = imap_fetch_overview($stream,"{$mail_number}:{$mail_number}",0);
						$text = imap_fetchbody($stream, $num, 1);
						$text = imap_utf8($text);
						$text = ReplaceImap($text);
						//variable which should be updated to Database
						$subject=$mail_header['subject'];
						$from=$mail_header['from'];
						$date=$mail_header['date'];
						$body=nl2br($text);
						$query="INSERT INTO news SET email='$from', subject='$subject', body='$body', time=NOW(), date='$date'";	
						$result=mysql_query($query) or die(mysql_error()); 
					}
						
				
					} 
					 
				}
				mysql_close($connection);
				imap_close($stream);
			?>

	
