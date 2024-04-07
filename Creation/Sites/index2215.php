<?php
// Assuming you have created a database named 'my_database' with the user 'root' and password 'root'

// Setup DB Connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS newsletter_subscribers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    token VARCHAR(64) NOT NULL,
    verified TINYINT(1) NOT NULL DEFAULT 0,
    reg_date TIMESTAMP
)";
$conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(32));
    $sql = "INSERT INTO newsletter_subscribers (email, token) VALUES (?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $token);
    $stmt->execute();

    // Assuming you have set up mail function on your server
    $verificationLink = "http://yourdomain.com/?token=".$token; // Update the domain appropriately
    $subject = "Confirm your Email";
    $body = "Please click the following link to confirm your subscription: ".$verificationLink;
    $headers = "From: newsletter@yourdomain.com"; // Update the email appropriately

    mail($email, $subject, $body, $headers);

    echo "Please check your email to confirm your subscription.";
}

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $sql = "UPDATE newsletter_subscribers SET verified = 1 WHERE token = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Your email is verified. Thank you for subscribing.";
    } else {
        echo "Invalid token or already verified.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Newsletter Signup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sign Up for Our Newsletter</h2>
        <form method="POST" action="">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>
            <input type="submit" value="Subscribe">
        </form>
    </div>
</body>
</html>
