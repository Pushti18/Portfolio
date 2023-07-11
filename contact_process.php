<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $to = 'pushti18depani@gmail.com';
    $from = $_POST['email'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Set email headers
    $headers = "From: $from\r\n";
    $headers .= "Reply-To: $from\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    // Construct the email body
    $body = '<html><body>';
    $body .= '<h2>You have a message from your website contact form</h2>';
    $body .= "<p><strong>Name:</strong> $name</p>";
    $body .= "<p><strong>Email:</strong> $from</p>";
    $body .= "<p><strong>Subject:</strong> $subject</p>";
    $body .= '<p><strong>Message:</strong></p>';
    $body .= "<p>$message</p>";
    $body .= '</body></html>';

    // Send the email
    $send = mail($to, $subject, $body, $headers);

    if ($send) {
        // Email sent successfully
        echo "<p>Thank you for your message. We'll get back to you soon.</p>";
    } else {
        // Error sending email
        echo '<p>Sorry, an error occurred while sending your message. Please try again later.</p>';
    }
}
?>
