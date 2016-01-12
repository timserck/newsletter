<?php

include "inc/connect.php";
include "inc/functions.php";
include "inc/PHPMailer/PHPMailerAutoload.php";

$mail_user = nettoyage($_POST["user_mail"]);
$date = date("Y-m-d H:i:s");
$privilege = 'client';

insert_mail($connexion, $mail_user,$date,$privilege);
$user_id = last_id($connexion);
$message = "<a href=http://localhost/php_exam/activate.php?id=".$user_id[0]["id"].">validation</a>";


$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mandrillapp.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'alexandre@pixeline.be';                 // SMTP username
$mail->Password = 'bDMUEuWn1H4r3FCGQjyO-g';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('from@example.com', 'Mailer');
$mail->addAddress($mail_user, 'Joe User');     // Add a recipient

$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = $message;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}


header('Refresh: 5; URL=index.php');