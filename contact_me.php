<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate inputs
    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {

        // Set the recipient email address
        $to = "orchajartech@gmail.com"; // Replace with your email address

        // Set email subject and message
        $subject = "New Contact Form Submission";
        $body = "Name: $name\n";
        $body .= "Email: $email\n";
        $body .= "Message: \n$message\n";

        // Email headers
        $headers = "From: $email";

        // Send the email
        if (mail($to, $subject, $body, $headers)) {
            echo "Your message was successfully sent!";
        } else {
            echo "There was an issue sending your message. Please try again.";
        }
    } else {
        echo "Please fill out the form correctly.";
    }
} else {
    echo "Invalid request.";
}
?>
