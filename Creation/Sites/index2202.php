<?php

// Database connection parameters
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

// Create table if it doesn't exist
$tableSql = "CREATE TABLE IF NOT EXISTS newsletter_subscribers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    token VARCHAR(64) NOT NULL,
    confirmed TINYINT(1) NOT NULL DEFAULT 0,
    reg_date TIMESTAMP
)";
if (!$conn->query($tableSql)) {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $token = bin2hex(random_bytes(32));
    $insertSql = "INSERT INTO newsletter_subscribers (email, token) VALUES ('$email', '$token')";

    if ($conn->query($insertSql) === TRUE) {
        // Send confirmation email
        $confirmLink = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?token=".$token;
        // Note: mail() function here is generally disabled for localhost. You'd need an SMTP setup for real emails
        $mailResult = mail($email, "Confirm your Subscription", "Please click this link to confirm your subscription: ".$confirmLink);
        
        if($mailResult) {
            echo "<p>Confirmation email sent. Please check your inbox.</p>";
        } else {
            echo "<p>Failed to send confirmation email.</p>";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} elseif (isset($_GET['token'])) {
    $token = $conn->real_escape_string($_GET['token']);
    $confirmSql = "UPDATE newsletter_subscribers SET confirmed = 1 WHERE token = '$token'";

    if ($conn->query($confirmSql) === TRUE && $conn->affected_rows > 0) {
        echo "<p>Subscription confirmed. Thank you!</p>";
    } else {
        echo "<p>Invalid or expired confirmation link.</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Newsletter Signup</title>
<style>
    body { font-family: Arial, sans-serif; background-color: #f2f0eb; color: #333; }
    .container { max-width: 400px; margin: 50px auto; padding: 20px; background-color: #ffffff; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    form { display: flex; flex-direction: column; }
    input[type="email"], button { padding: 10px; margin: 5px 0; }
    p { text-align: center; }
</style>
</head>
<body>
<div class="container">
    <h2>Sign Up for Our Newsletter</h2>
    <form method="post" action="">
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit">Subscribe</button>
    </form>
</div>
</body>
</html>
