<?php

// Check if the form has been submitted
if (isset($_POST['submit'])) {

    // Get the form data
    $name = $_POST['inputName'];
    $email = $_POST['inputEmail'];
    $message = $_POST['inputMessage'];

    // Validate the form data
    if (empty($name) || empty($email) || empty($message)) {
        // Display an error message
        echo 'All fields are required.';
        exit;
    }

    // Validate the email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Display an error message
        echo 'Please enter a valid email address.';
        exit;
    }

    // Send the email notification
    $to = 'hemantaphy@gmail.com';
    $subject = 'Contact form submission';
    $body = "
Name: $name
Email: $email
Message: $message
";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        // Display a success message
        echo 'Your message has been sent successfully.';
    } else {
        // Display an error message
        echo 'There was an error sending your message. Please try again later.';
    }
}

