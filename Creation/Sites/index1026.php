<?php
// File Name: secure_password_reset.php
session_start();

$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create necessary table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS user_reset_password (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_email VARCHAR(255) NOT NULL,
    token VARCHAR(255) NOT NULL,
    token_expire DATETIME NOT NULL,
    INDEX(user_email),
    INDEX(token)
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["action"]) && $_POST["action"] == "request_reset") {
        $user_email = $conn->real_escape_string($_POST["email"]);
        
        // Generate a unique token
        $token = md5(uniqid(rand(), true));
        $expire_time = date("Y-m-d H:i:s", strtotime("+1 hour")); // Token expires in 1 hour
        
        // Insert into the database
        $stmt = $conn->prepare("INSERT INTO user_reset_password (user_email, token, token_expire) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $user_email, $token, $expire_time);
        $stmt->execute();
        $stmt->close();
        
        $resetLink = "http://yourwebsite.com/secure_password_reset.php?token=$token";
        // Here send an email to the user with the $resetLink
        // mail($user_email, "Password Reset", "Please click on the following link or paste it into your browser to reset your password: $resetLink");

        echo "Please check your email for the password reset link.";
    } elseif (isset($_GET["token"]) && !empty($_GET["token"])) {
        $token = $conn->real_escape_string($_GET["token"]);
        $currentTime = date("Y-m-d H:i:s");
        
        // Validate token
        $stmt = $conn->prepare("SELECT user_email FROM user_reset_password WHERE token = ? AND token_expire > ?");
        $stmt->bind_param("ss", $token, $currentTime);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $user_email = $result->fetch_assoc()["user_email"];
            $_SESSION["reset_email"] = $user_email;
            $_SESSION["token"] = $token;
        } else {
            echo "Invalid or expired token.";
            exit;
        }
    } elseif (isset($_POST["action"]) && $_POST["action"] == "reset_password") {
        $new_password = $conn->real_escape_string($_POST["new_password"]);
        $confirm_password = $conn->real_escape_string($_POST["confirm_password"]);
        $user_email = $_SESSION["reset_email"];
        $token = $_SESSION["token"];
        
        if ($new_password !== $confirm_password) {
            echo "Passwords do not match.";
            exit;
        }
        
        // Hash new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        
        // Update user's password - assuming there's a users table with email and password fields
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
        $stmt->bind_param("ss", $hashed_password, $user_email);
        $stmt->execute();
        
        // Delete the token
        $stmt = $conn->prepare("DELETE FROM user_reset_password WHERE token = ?");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        
        echo "Password has been reset. You can now login with your new password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Password Reset</title>
</head>
<body>
<?php if (isset($_GET["token"]) && !empty($_GET["token"])): ?>
    <form method="POST" action="">
        <input type="hidden" name="action" value="reset_password">
        <input type="password" name="new_password" placeholder="New Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm New Password" required>
        <button type="submit">Reset Password</button>
    </form>
<?php else: ?>
    <form method="POST" action="">
        <input type="hidden" name="action" value="request_reset">
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit">Send Password Reset Link</button>
    </form>
<?php endif; ?>
</body>
</html>
