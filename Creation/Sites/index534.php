<?php
// Database Connection
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

// Create table for storing reset requests
$sql = "CREATE TABLE IF NOT EXISTS password_reset (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    token VARCHAR(255) NOT NULL,
    expiration DATETIME NOT NULL
)";
$conn->query($sql);

// Handle POST requests
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email'])) {
        // User requested a password reset
        $email = $conn->real_escape_string($_POST['email']);
        $token = bin2hex(random_bytes(32));
        $expiration = date('Y-m-d H:i:s', strtotime('+1 hour'));
        
        $sql = "INSERT INTO password_reset (email, token, expiration) VALUES ('$email', '$token', '$expiration')";
        if ($conn->query($sql) === TRUE) {
            $resetLink = "http://yourwebsite.com/reset_password.php?email=$email&token=$token";
            // Here, you should send the $resetLink to the user's email
            echo "Password reset link has been sent to your email.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['password'], $_POST['token'], $_POST['email'])) {
        // User is resetting their password
        $password = $conn->real_escape_string($_POST['password']);
        $token = $conn->real_escape_string($_POST['token']);
        $email = $conn->real_escape_string($_POST['email']);
        
        $sql = "SELECT * FROM password_reset WHERE email='$email' AND token='$token' LIMIT 1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $expiration = $row['expiration'];
            if (new DateTime() < new DateTime($expiration)) {
                // Proceed with password update
                // Here, add your code to update the user's password in your users table
                // Example: UPDATE users SET password = '$hashedPassword' WHERE email = '$email';
                echo "Your password has been updated successfully.";
            } else {
                echo "This password reset link has expired.";
            }
        } else {
            echo "Invalid password reset link.";
        }
    }
}

// Close connection
$conn->close();

// HTML Form for requesting password reset and resetting password
?>
<!DOCTYPE html>
<html>
<head>
    <title>Password Reset</title>
</head>
<body>
    <h2>Request Password Reset</h2>
    <form method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <input type="submit" value="Request Reset">
    </form>

    <h2>Reset Password</h2>
    <form method="POST">
        <label for="password">New Password:</label>
        <input type="password" id="password" name="password" required>
        <input type="hidden" name="email" value="<?php if (isset($_GET['email'])) echo $_GET['email']; ?>">
        <input type="hidden" name="token" value="<?php if (isset($_GET['token'])) echo $_GET['token']; ?>">
        <input type="submit" value="Reset Password">
    </form>
</body>
</html>