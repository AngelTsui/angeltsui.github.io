<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Collect the form data
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $message = htmlspecialchars($_POST['message']);

  // Email details
  $to = "hsiaoyun@usc.edu";  // Replace with your email address
  $subject = "New Contact Form Submission";
  $headers = "From: " . $email . "\r\n" .
             "Reply-To: " . $email . "\r\n" .
             "X-Mailer: PHP/" . phpversion();

  // Create the email content
  $body = "You have received a new message from the contact form.\n\n".
          "Name: $name\n".
          "Email: $email\n\n".
          "Message:\n$message";

  // Send the email
  if (mail($to, $subject, $body, $headers)) {
    echo "Message successfully sent!";
  } else {
    echo "Message sending failed.";
  }
} else {
  echo "Invalid request.";
}
?>
