<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = htmlspecialchars($_POST['name']);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $subject = $_POST['subject'];
  $message = htmlspecialchars($_POST['body']);

  $to = "clinpsysoffice@gmail.com";
  $headers = "From: $email";

  if (mail($to, $subject, $message, $headers)) {
    echo "true";
  } else {
    echo "false1";
  }
} else {
  echo "false2";
}

?>
