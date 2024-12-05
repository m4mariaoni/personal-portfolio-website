<?php
// Replace with your email address
$to = 'm4mariaoni@yahoo.com';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  $headers = "From: $name <$email>";
  

  if (mail($to, $subject, $message, $headers)) {
    echo 'Email sent successfully!';
  } else {
    echo 'Error sending email.';
  }
}