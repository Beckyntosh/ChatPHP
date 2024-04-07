<?php

$host = "db";
$user = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the necessary table if not exists
$tableQuery = "CREATE TABLE IF NOT EXISTS subscribers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    token VARCHAR(32) NOT NULL,
    verified INT(1) NOT NULL DEFAULT 0,
    reg_date TIMESTAMP
)";

if (!$conn->query($tableQuery)) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $token = md5(uniqid(rand(), true));
    
    // Insert the subscriber into database
    $insertQuery = "INSERT INTO subscribers (email, token) VALUES ('$email', '$token')";
    
    if ($conn->query($insertQuery)) {
        // Send confirmation email
        $to = $email;
        $subject = "Confirm Subscription";
        $message = "Please click on the link to confirm your subscription: http://yourwebsite.com/confirm.php?token=$token";
        $headers = "From: no-reply@yourbeddingwebsite.com";
        
        if (mail($to, $subject, $message, $headers)) {
            echo 'Please check your email to confirm subscription.';
        } else {
            echo 'Unable to send confirmation email.';
        }
    } else {
        echo 'Error: ' . $conn->error;
    }
}

if (isset($_GET['token'])) {
    $token = $conn->real_escape_string($_GET['token']);
    // Verify subscription
    $verifyQuery = "UPDATE subscribers SET verified = 1 WHERE token = '$token'";
    
    if ($conn->query($verifyQuery) && $conn->affected_rows > 0) {
        echo 'Subscription confirmed.';
    } else {
        echo 'Invalid token or already verified.';
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
    <form method="post" action="">
        <label for="email">Sign up for our newsletter:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Subscribe</button>
    </form>
</body>
</html>
