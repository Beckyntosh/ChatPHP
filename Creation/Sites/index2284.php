<?php
// Initialize connection variables
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create users table if it doesn't exist
$createTableSql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    verification_code VARCHAR(255) NOT NULL,
    is_verified BOOLEAN NOT NULL DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!$conn->query($createTableSql)) {
    die("Error creating table: " . $conn->error);
}

// Handle Form Submission to Register User
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $verification_code = bin2hex(random_bytes(16)); // create a verification code
    $insertSql = "INSERT INTO users (email, verification_code) VALUES (?, ?)";

    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param("ss", $email, $verification_code);
    if ($stmt->execute()) {
        // Send Email
        $verifyLink = "http://yourwebsite.com/verify.php?code=$verification_code"; // Your actual domain
        $to      = $email;
        $subject = 'Verify Your Email';
        $message = "Please click on this link to verify your email: $verifyLink";
        $headers = 'From: noreply@yourwebsite.com' . "\r\n" .
                    'Reply-To: noreply@yourwebsite.com' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
        echo "Registration successful! Please check your email to verify.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Signup - Craft Beers</title>
</head>

<body>
    <h2>Signup for Our Craft Beers Website</h2>
    <form method="POST" action="">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <input type="submit" value="Register">
    </form>
</body>

</html>
