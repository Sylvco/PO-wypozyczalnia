
<?php 

if (isset($_POST['submit'])) {
	$imie_nazwisko	= $_POST['imie_nazwisko'];
    $email 			= ($_POST['email']);
    $message        = $_POST['message'];

$mail_to = 'a.m.patalas@gmail.com';
$subject = 'Email from Fitness site';

$body_message  = 'From: ' . $imie_nazwisko . " ". "\n";
$body_message .= 'E-mail: ' . $email . "\n";
$body_message .= 'Message: ' . $message;

$headers = 'From: '.$email."\r\n";
$headers .= 'Reply-To: '.$email."\r\n";

$mail_status = mail($mail_to, $subject, $body_message, $headers);
}
?>