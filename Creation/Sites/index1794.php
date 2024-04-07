<?php
session_start();

// Database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if table exists, if not, create it.
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(32),
    recovery_code VARCHAR(10),
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['step']) && $_POST['step'] == 'email_verification') {
        // Step 1: Email Verification
        $email = $_POST['email'];
        $recovery_code = rand(100000, 999999);
        $sql = "UPDATE users SET recovery_code='$recovery_code' WHERE email='$email'";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['recovery_email'] = $email;
            $_SESSION['recovery_step'] = 'verify_code';
            echo "A verification code has been sent to your email. Please check your inbox.";
        } else {
            echo "Error updating recovery code: " . $conn->error;
        }
    } elseif (isset($_POST['step']) && $_POST['step'] == 'verify_code') {
        // Step 2: Code Verification
        $code = $_POST['code'];
        $email = $_SESSION['recovery_email'];
        $sql = "SELECT id FROM users WHERE email='$email' AND recovery_code='$code' LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION['recovery_step'] = 'reset_password';
            echo "Verification successful. You can now reset your password.";
        } else {
            echo "Invalid verification code.";
        }
    } elseif (isset($_POST['step']) && $_POST['step'] == 'reset_password') {
        // Step 3: Password Reset
        $password = md5($_POST['password']); // Simple MD5 hashing for demonstration purposes
        $email = $_SESSION['recovery_email'];
        $sql = "UPDATE users SET password='$password' WHERE email='$email'";

        if ($conn->query($sql) === TRUE) {
            unset($_SESSION['recovery_email']);
            unset($_SESSION['recovery_step']);
            echo "Password has been updated. You can now <a href='login.php'>login</a> with your new password.";
        } else {
            echo "Error resetting your password: " . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Account Recovery</title>
</head>
<body>
    <?php if (!isset($_SESSION['recovery_step']) || $_SESSION['recovery_step'] == 'email_verification'): ?>
    <form method="POST">
        <input type="hidden" name="step" value="email_verification">
        <label>Email: </label>
        <input type="email" name="email" required>
        <button type="submit">Send Verification Code</button>
    </form>
    <?php elseif ($_SESSION['recovery_step'] == 'verify_code'): ?>
    <form method="POST">
        <input type="hidden" name="step" value="verify_code">
        <label>Verification Code: </label>
        <input type="text" name="code" required>
        <button type="submit">Verify Code</button>
    </form>
    <?php elseif ($_SESSION['recovery_step'] == 'reset_password'): ?>
    <form method="POST">
        <input type="hidden" name="step" value="reset_password">
        <label>New Password: </label>
        <input type="password" name="password" required>
        <button type="submit">Reset Password</button>
    </form>
    <?php endif; ?>
</body>
</html>
<?php $conn->close(); ?>
