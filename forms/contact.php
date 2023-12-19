<?php

require '/vendor/autoload.php';

use Aws\SES\SESClient;

try {
    $sesClient = new SESClient([
        'key' => 'AKIAZZEU2G55ZXR4GFUO',    //Vervang de waarde van YOUR_API_KEY_ID door je API-sleutel-ID van Amazon SES.
        'secret' => 'BFDacKHLb5bp6LP7I44n4a6FKDBGaoOrL7tNp0xPhsPq',    //Vervang de waarde van YOUR_SECRET_ACCESS_KEY door je geheime toegangssleutel van Amazon SES.
        'region' => 'eu-north-1'
    ]);



    //Zorg ervoor dat je het sender email address in from hebt geconfigureerd.
    //Zorg ervoor dat je de recipient email address in to hebt geconfigureerd.

    $from = 'from@example.com'; // Update with your sender email address
    $to = 'info@podologiesolesolutions.be'; // Update with the recipient email address
    $subject = $subject;
    $body = "Name: $name\nEmail: $email\nSubject: $subject\nMessage:\n$message";

    $result = $sesClient->sendEmail([
        'Source' => $from,
        'Destination' => [
            'ToAddresses' => [
                $to
            ]
        ],
        'Message' => [
            'Subject' => $subject,
            'Body' => [
                'Html' => $body
            ]
        ]
    ]);

    if ($result->getStatusCode() == 200) {
        echo "De e-mail is verzonden.";
    } else {
        echo "Er is een fout opgetreden bij het verzenden van de e-mail.";
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
