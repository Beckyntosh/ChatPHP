<?php
// Simple PHP script for email verification during account signup for a Vitamins website

// Database connection variables
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If the signup form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $token = bin2hex(random_bytes(50)); // Generate a random token

    // Insert into database
    $sql = "INSERT INTO users (email, token) VALUES ('$email', '$token')";
    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        $verify_link = "http://yourvitaminswebsite.com/verify.php?email=$email&token=$token";

        // Assuming sendMail() is a function to send email
        sendMail($email, $verify_link);
        echo "A verification email has been sent. Please check your email.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Function to send email (for demonstration)
function sendMail($email, $verify_link) {
    // Mail would be sent here
    $to = $email;
    $subject = "Verify Your Email";
    $txt = "Please click on the link to verify your email: " . $verify_link;
    $headers = "From: webmaster@yourvitaminswebsite.com\r\n";

    mail($to, $subject, $txt, $headers);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup - Vitamins Website</title>
</head>
<body>
    <h2>Signup</h2>
    <form method="POST" action="signup.php">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <input type="submit" value="Signup">
    </form>
</body>
</html>