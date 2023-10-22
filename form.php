<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["inputName"];
    $email = $_POST["inputEmail"];
    $message = $_POST["inputMessage"];

    // Validate data (you may want to add more validation)
    if (empty($name) || empty($email) || empty($message)) {
        echo "Please fill in all required fields.";
        exit;
    }

    // Email recipient
    $to = "hemantaphuyal@gmail.com"; // Update this email address

    // Subject of the email
    $subject = "New Form Submission";

    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    // Compose the email message
    $email_message = "
        <html>
        <head>
            <title>New Form Submission</title>
        </head>
        <body>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Message:</strong> $message</p>
        </body>
        </html>
    ";

    // Send the email
    mail($to, $subject, $email_message, $headers);

    // Redirect after submission (you can customize the URL)
    header("Location: thank_you_page.php");
    exit;
}

?>
