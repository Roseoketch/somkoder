<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["subject"]));
    $phone = strip_tags(trim($_POST["phone"]));
    $message = trim($_POST["message"]);

    // Specify the recipient email
    $to = "contact@somkoder.com";

    // Construct the email subject
    $email_subject = "New contact from $name: $subject";

    // Construct the email body
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Phone: $phone\n\n";
    $email_body .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $name <$email>";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Redirect to a thank-you page or display a success message
        echo "Thank You! Your message has been sent.";
    } else {
        // Email failed to send, handle the error
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    // Not a POST request, handle the error
    echo "There was a problem with your submission, please try again.";
}
?>