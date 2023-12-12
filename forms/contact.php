<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/PHPMAILER/src/Exception.php';
require '/PHPMAILER/src/PHPMailer.php';
require '/PHPMAILER/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user input
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    // Create a PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp-auth.mailprotect.be'; // Update with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'info@podologiesolesolutions.be'; // Update with your SMTP username
        $mail->Password = 'Ignim5vw%1'; // Update with your SMTP password
        $mail->SMTPSecure = 'false'; //was tls
        $mail->Port = 465;

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('info@podologiesolesolutions.be'); // Update with your email address

        // Content
        $mail->isHTML(false); // Set to true if your message contains HTML
        $mail->Subject = $subject;
        $mail->Body = "Name: $name\nEmail: $email\nSubject: $subject\nMessage:\n$message";

        // Send the email
        $mail->send();

        // Redirect or display a thank you message
        header("Location: thank_you.html");
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
