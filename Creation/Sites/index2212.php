<?php

// Database variables
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

// Create newsletter signup table
$signupTable = "CREATE TABLE IF NOT EXISTS newsletter_signups (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
email VARCHAR(50) NOT NULL,
token VARCHAR(64) NOT NULL,
confirmed TINYINT(1) NOT NULL DEFAULT 0,
reg_date TIMESTAMP
)";

if (!$conn->query($signupTable)) {
    die("Error creating table: " . $conn->error);
}

// Request handling
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    // User signup
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(32));
    $sql = "INSERT INTO newsletter_signups (email, token) VALUES (?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $token);
    $stmt->execute();
    
    // Send email
    $verificationLink = "http://$_SERVER[HTTP_HOST]".$_SERVER['PHP_SELF']."?token=$token";
    $message = "Please click on the following link to confirm your subscription: $verificationLink";
    mail($email, "Confirm your Subscription", $message);
    echo "Subscription successful! Please check your email to confirm.";
}

if (isset($_GET['token'])) {
    // User confirmed email
    $token = $_GET['token'];
    $sql = "UPDATE newsletter_signups SET confirmed = 1 WHERE token = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        echo "Email confirmed! Welcome to our newsletter.";
    } else {
        echo "Invalid or expired confirmation link.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter Signup</title>
</head>
<body>
    <h2>Subscribe to our Watches Newsletter</h2>
    <form method="POST" action="">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <input type="submit" value="Subscribe">
    </form>
</body>
</html>
