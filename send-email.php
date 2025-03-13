<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $mail = new PHPMailer(true);

  try {
    //Server settings
    $mail->isSMTP();
    $mail->Host = 'mail.attentiondoc.com'; //Our Webhostinghub SMTP server
    // $mail->Host = 'smtp.gmail.com'; //For testing purposes
    $mail->SMTPAuth = true; //Enable Authentication
    $mail->Username = "php-mailer@attentiondoc.com"; //Will needd to change this
    $mail->Password = "1995_nissan_240SX"; //Maybe
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //For TLS. May need to change to SSL
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465; //587 for TLS, 465 for SSL

    //Email Content
    $mail->setFrom("php-mailer@attentiondoc.com", $_POST['name']);
    $mail->addReplyTo($_POST['email'], $_POST['name']);
    $mail->addAddress("clinpsysoffice@gmail.com"); //we really should get a proper email for this.
    $mail->Subject = $_POST['subject'];
    $mail->Body = htmlspecialchars($_POST['body']);

    // Send Email
    if ($mail->send()) {
        echo "true";
    } else {
        echo "false1";
    }

  } catch (Exception $e) {
        echo "{$mail->ErrorInfo}";
  }
} else {
  echo "Error occured";
}

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//   //log("REquest Reveivedced");
//   //print("REquest Reveivedced");
//   $name = htmlspecialchars($_POST['name']);
//   $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
//   $subject = $_POST['subject'];
//   $message = htmlspecialchars($_POST['body']);
//
//   $to = "clinpsysoffice@gmail.com";
//   $headers = "From: $email";
//
//   //log("Sending email");
//   //print("Sending email");
//   //echo "Banana";
//   if (mail($to, $subject, $message, $headers)) {
//     echo "true";
//     return;
//   } else {
//     echo "false1";
//   }
//   return;
// } else {
//   echo "false2";
// }

?>
