<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'C:\xampp\htdocs\restauranteA\vendor\autoload.php';

//Create an instance; passing `true` enables exceptions

function sendEmail($to, $subject,  $message) {
$mail = new PHPMailer(true);

// try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth = true;                                   //Enable SMTP authentication
    $mail->Username   = 'sousalinda522@gmail.com';                     //SMTP username
    $mail->Password   = 'legengigeizgsvvr';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('sousalinda522@gmail.com', 'Mailer');
    $mail->addAddress('sousalinda522@gmail.com', 'Cliente');     //Add a recipient
    $mail->addAddress($to);               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addAttachment('C:\xampp\htdocs\restauranteA\web\icons\IMG-7409.jpg');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(false);                                  //Set email format to HTML
    $mail->Subject = $subject;;
    $mail->Body    = $message;
    $mail->AltBody = $message;

    $mail->send();
//     // echo 'Message has been sent';
// } catch (Exception $e) {
//     // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }
}