<?php
// Simple PHP script for Account Verification via Email Link for a Bicycles website

// Connection parameters
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

// Users Table Creation SQL (runs once)
$createTableSql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    verified TINYINT(1) DEFAULT 0,
    token VARCHAR(32),
    reg_date TIMESTAMP
)";
$conn->query($createTableSql);

// HTML Form for Registration
echo '<form action="" method="post">
    Username: <input type="text" name="username"><br>
    Email: <input type="email" name="email"><br>
    <input type="submit" name="register" value="Register">
</form>';

// PHP logic for Registration and Sending Email
if (isset($_POST['register'])) {
    // Sanitize user input
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $token = md5(rand()); // Generate a unique token

    // Insert user into database
    $sql = "INSERT INTO users (username, email, token) VALUES ('$username', '$email', '$token')";
    if ($conn->query($sql) === TRUE) {
        // Construct verification link
        $verifyLink = "http://$_SERVER[HTTP_HOST]"."/verify.php?email=$email&token=$token";

        // Sending Email
        $to = $email;
        $subject = "Verify Your Email";
        $message = "<a href='".$verifyLink."'>Click here to verify your account</a>";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        mail($to, $subject, $message, $headers);

        echo "Registration successful! Please check your email to verify your account.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// PHP Script for Verification Logic
if (isset($_GET['email']) && isset($_GET['token'])) {
    $email = $conn->real_escape_string($_GET['email']);
    $token = $conn->real_escape_string($_GET['token']);

    // Verify user
    $sql = "SELECT * FROM users WHERE email='$email' AND token='$token' AND verified=0";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Update user as verified
        $updateSql = "UPDATE users SET verified=1, token='' WHERE email='$email'";
        if ($conn->query($updateSql) === TRUE) {
            echo "Account verified successfully!";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "This link is invalid or expired.";
    }
}

$conn->close();
?>