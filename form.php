<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collect and clean form data
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $command = htmlspecialchars(trim($_POST["command"]));
    $topic = htmlspecialchars(trim($_POST["topic"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Validate that all fields are completed
    if (empty($name) || empty($email) || empty($command) || empty($topic) || empty($message)) {
        echo "<h1>Submission Error</h1>";
        echo "<p>Please complete all required fields before submitting the form.</p>";
        echo '<p><a href="contact.html">Return to Contact Page</a></p>';
        exit;
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<h1>Submission Error</h1>";
        echo "<p>Please enter a valid email address.</p>";
        echo '<p><a href="contact.html">Return to Contact Page</a></p>';
        exit;
    }

    // Limit form submissions to .mil email addresses
    if (!preg_match("/^[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.mil$/", $email)) {
        echo "<h1>Submission Error</h1>";
        echo "<p>This form only accepts military or DoD-style email addresses ending in .mil.</p>";
        echo '<p><a href="contact.html">Return to Contact Page</a></p>';
        exit;
    }

    // Successful submission message
    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<title>Submission Received</title>";
    echo "<link rel='stylesheet' href='style.css'>";
    echo "</head>";
    echo "<body>";
    echo "<header>";
    echo "<h1>Submission Received</h1>";
    echo "<p>Unofficial Blue Angels Enlisted Recruitment Information</p>";
    echo "</header>";

    echo "<main>";
    echo "<section class='content-card'>";
    echo "<h2>Thank you, " . $name . ".</h2>";
    echo "<p>Your question has been successfully submitted.</p>";
    echo "<p><strong>Command or Organization:</strong> " . $command . "</p>";
    echo "<p><strong>Topic:</strong> " . $topic . "</p>";
    echo "<p><strong>Email:</strong> " . $email . "</p>";
    echo "<p><strong>Message:</strong></p>";
    echo "<p>" . nl2br($message) . "</p>";
    echo "<p>This confirms that your submission was received by the form.</p>";
    echo "<p><a href='contact.html'>Return to Contact Page</a></p>";
    echo "</section>";
    echo "</main>";

    echo "</body>";
    echo "</html>";

} else {
    echo "<h1>Invalid Request</h1>";
    echo "<p>Please submit the form from the contact page.</p>";
    echo '<p><a href="contact.html">Return to Contact Page</a></p>';
}
?>
