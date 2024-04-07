<?php
// Simple example for Password Reset - Note: For real applications, enhance security layers.

// Database connection
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

// Create users table if not exists
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    reset_token VARCHAR(255),
    token_expire DATETIME,
    reg_date TIMESTAMP
)";

if (!$conn->query($sql)) {
    die("Error creating table: " . $conn->error);
}

// Request Password Reset
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["request_reset"])) {
    $email = $_POST["email"];
    $token = bin2hex(random_bytes(50));
    $expire = date("Y-m-d H:i:s", strtotime("+1 hour"));

    // Check if email exists
    $checkEmail = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    $result = $checkEmail->get_result();
    if ($result->num_rows > 0) {
        // Update user with reset token and expiry
        $updateToken = $conn->prepare("UPDATE users SET reset_token=?, token_expire=? WHERE email=?");
        $updateToken->bind_param("sss", $token, $expire, $email);
        if ($updateToken->execute()) {
            // Send reset email - Simplified for example. Use a proper mailing library.
            $resetLink = "http://yourwebsite.com/reset_password.php?token=" . $token; // Adjust with actual link
            mail($email, "Password Reset", "Reset your password using this link: " . $resetLink);
            echo "<p>Password reset email sent.</p>";
        }
    } else {
        echo "<p>Email does not exist.</p>";
    }
}

// Reset Password
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["reset_password"])) {
    $newPassword = $_POST["new_password"];
    $token = $_POST["token"];

    // Check token validity
    $checkToken = $conn->prepare("SELECT * FROM users WHERE reset_token=? AND token_expire > NOW()");
    $checkToken->bind_param("s", $token);
    $checkToken->execute();
    $result = $checkToken->get_result();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $userId = $user['id'];
        // Update password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $updatePassword = $conn->prepare("UPDATE users SET password=?, reset_token=NULL, token_expire=NULL WHERE id=?");
        $updatePassword->bind_param("si", $hashedPassword, $userId);
        if ($updatePassword->execute()) {
            echo "<p>Password updated successfully.</p>";
        }
    } else {
        echo "<p>Invalid or expired token.</p>";
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
    <div style="text-align: center;">
        <h2>Forgot Password</h2>
        <form action="" method="post">
            <label>Email:</label>
            <input type="email" name="email" required>
            <button type="submit" name="request_reset">Request Reset</button>
        </form>
    </div>

    <div style="text-align: center;">
        <h2>Reset Password</h2>
        <form action="" method="post">
            <input type="hidden" name="token" value="<?php echo $_GET['token'] ?? ''; ?>">
            <label>New Password:</label>
            <input type="password" name="new_password" required>
            <button type="submit" name="reset_password">Reset Password</button>
        </form>
    </div>
</body>
</html>
