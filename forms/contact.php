<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Simple validation (you may want to add more thorough validation)
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "Error: All fields are required.";
        exit;
    }

    // Send email (you may want to use a library like PHPMailer for better email handling)
    $to = "info@podologiesolesolutions.be"; // Replace with your email address
    $headers = "From: $email\r\nReply-To: $email";
    $mailBody = "Name: $name\nEmail: $email\nSubject: $subject\n\n$message";

    if (mail($to, $subject, $mailBody, $headers)) {
        echo "Success: Your message has been sent. Thank you!";
    } else {
        echo "Error: Something went wrong. Please try again later.";
    }
} else {
    // If the form is not submitted via POST, you can redirect or handle it as needed.
    echo "Error: Invalid form submission.";
}
?>
