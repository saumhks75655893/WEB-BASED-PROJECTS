<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('../PHPMailer/mailer/Exception.php');
require('../PHPMailer/mailer/PHPMailer.php');
require('../PHPMailer/mailer/SMTP.php');

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'himanshukumar79918618@gmail.com';
    $mail->Password = 'irgqxvhuobylwxmt';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipients
    $mail->setFrom('himanshukumar79918618@gmail.com', 'Login Form');
    $mail->addAddress('rmmahar.skool@gmail.com', 'Himanshu kumar User');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body = 'Hey this is Himansh do not thik that I am a bad guy yet I m a very good guy!</b>';


    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>