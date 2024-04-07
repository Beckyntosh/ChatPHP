<?php
session_start();

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email'])) {
        // User requests a password reset link
        $email = $conn->real_escape_string($_POST['email']);
        
        // Validate that email exists in your database
        $result = $conn->query("SELECT id FROM users WHERE email='$email'");
        if ($result->num_rows > 0) {
            $userId = $result->fetch_assoc()['id'];
            $token = bin2hex(random_bytes(32));
            $conn->query("INSERT INTO password_reset (user_id, token) VALUES ('$userId', '$token')");
            
            // Send email to user
            $resetLink = "http://".$_SERVER['HTTP_HOST']."/reset_password.php?token=$token";
            mail($email, "Reset your password", "Click here to reset your password: $resetLink");
            echo "Password reset link has been sent to your email.";
        } else {
            echo "Email not registered.";
        }
    } elseif (isset($_POST['password'], $_POST['token'])) {
        // User resets the password
        $newPassword = $conn->real_escape_string($_POST['password']);
        $token = $conn->real_escape_string($_POST['token']);
        
        $result = $conn->query("SELECT user_id FROM password_reset WHERE token='$token'");
        if ($result->num_rows > 0) {
            $userId = $result->fetch_assoc()['user_id'];
            $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
            $conn->query("UPDATE users SET password='$newPasswordHash' WHERE id='$userId'");
            $conn->query("DELETE FROM password_reset WHERE token='$token'");
            echo "Your password has been reset successfully.";
        } else {
            echo "Invalid token.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Reset</title>
</head>
<body>
    <?php if ($_SERVER["REQUEST_METHOD"] != "POST") { ?>
        <form method="POST" action="">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <input type="submit" value="Request Password Reset">
        </form>
    <?php } ?>
</body>
</html>