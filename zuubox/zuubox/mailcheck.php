<?php


$msg = "First line of text Second line of text";
// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
$mail_sent = mail("mohd.kadir@dotsquares.com","My subject",$msg);

if($mail_sent){
	die('mail sent');
}else{
	die('noo');
}

/*$to = "mohd.kadir@dotsquares.com";
		$subject = "New message";

		$headers = "MIME-Version: 1.0\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\n";
		$headers .= "From: Our Weekly Sale <info@ourweeklysale.com>\n";
		$headers .= "X-Mailer: PHP's mail() Function\n";
		$mail_sent = mail($to, $subject, $message, $headers);
		if($mail_sent){
			die('mail sent');
		}else{
			die('noo');
		}*/
?>