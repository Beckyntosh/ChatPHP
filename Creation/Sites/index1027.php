<?php
// Connect to the database
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

// Create table for password reset requests if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS password_resets (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    token VARCHAR(255) NOT NULL,
    expire DATETIME NOT NULL
)";

$conn->query($sql);

// Function to send reset email
function sendPasswordResetEmail($email, $token) {
    $to = $email;
    $subject = "Password Reset";
    $msg = "Click on the following link to reset your password: ";
    $msg .= "http://yourwebsite.com/reset_password.php?token=" . $token;
    $headers = "From: no-reply@yourwebsite.com";
    mail($to, $subject, $msg, $headers);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['request_reset'])) {
        // User requests a password reset
        $email = $conn->real_escape_string($_POST['email']);
        $token = bin2hex(random_bytes(50)); // Generate a unique token
        $expire = date("Y-m-d H:i:s", strtotime('+1 hour')); // Token expires in 1 hour
        
        // Insert the request into the database
        $sql = "INSERT INTO password_resets (email, token, expire) VALUES ('$email', '$token', '$expire')";
        if ($conn->query($sql) === TRUE) {
            sendPasswordResetEmail($email, $token); // Send reset email
            echo "Please check your email to reset your password.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['reset_password'])) {
        // User resets the password
        $token = $conn->real_escape_string($_POST['token']);
        $newPassword = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT); // Hash new password
        $currentTime = date("Y-m-d H:i:s");
        
        // Find the token in the database and check if it's expired
        $sql = "SELECT * FROM password_resets WHERE token='$token' AND expire > '$currentTime'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $email = $row['email'];
            
            // Update the user's password
            $sqlUpdate = "UPDATE users SET password='$newPassword' WHERE email='$email'";
            if ($conn->query($sqlUpdate) === TRUE) {
                echo "Password updated successfully. You can now login with your new password.";
            } else {
                echo "Error updating password: " . $conn->error;
            }
        } else {
            echo "The password reset token is invalid or has expired.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Password Reset</title>
</head>
<body>
    <form action="?" method="POST">
        <h2>Request Password Reset</h2>
        <input type="email" name="email" placeholder="Enter your email" required>
        <input type="submit" name="request_reset" value="Request Reset">
    </form>

    <form action="?" method="POST">
        <h2>Reset Password</h2>
        <input type="text" name="token" placeholder="Enter your token">
        <input type="password" name="password" placeholder="Enter new password" required>
        <input type="submit" name="reset_password" value="Reset Password">
    </form>
</body>
</html>
