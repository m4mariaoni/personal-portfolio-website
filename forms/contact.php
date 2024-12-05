<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include PHPMailer library

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    if (!$email) {
        echo "Invalid email address!";
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'mail.smtp2go.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'mariasimeon.co.uk'; 
        $mail->Password = 'KkG4np2D9PZmZOkR'; 
        $mail->SMTPSecure = 'tls'; 
        $mail->Port = 587; 

        // Email headers
        $mail->setFrom('info@mariasimeon.co.uk', 'Maria Simeon Website'); 
        $mail->addAddress('m4mariaoni@yahoo.com', 'Maria Simeon-Godfrey'); 
        $mail->addReplyTo($email, $name); 

        // Email content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = "
            <strong>Name:</strong> $name<br>
            <strong>Email:</strong> $email<br>
            <strong>Message:</strong> <br>$message
        ";

        // Send email
        $mail->send();
        echo "Your message has been sent successfully!";
    } catch (Exception $e) {
        echo "Message could not be sent. Error: " . $mail->ErrorInfo;
    }
} else {
    echo "Invalid request method.";
}
?>
