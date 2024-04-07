<?php

/**
 * WARNING: This is a simplified example for educational purposes. 
 * Implementing authentication systems securely requires extensive knowledge about web security. 
 * Consult a professional for production code.
 */

// Database connection
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Create user_account table if not exists
$createTableQuery = "CREATE TABLE IF NOT EXISTS user_account (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    reset_token VARCHAR(255),
    token_expiry DATETIME
)";
$pdo->exec($createTableQuery);

// Generate and send the password reset link
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
    $email = trim($_POST["email"]);
    
    // Check if email exists
    $stmt = $pdo->prepare("SELECT id FROM user_account WHERE email = :email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        // Generate token
        $token = bin2hex(random_bytes(50));
        $expiry = date("Y-m-d H:i:s", time() + 3600); // 1 hour expiry
        
        // Store in database
        $update = $pdo->prepare("UPDATE user_account SET reset_token = :token, token_expiry = :expiry WHERE email = :email");
        $update->execute([':token' => $token, ':expiry' => $expiry, ':email' => $email]);
        
        // Send reset link to user
        $resetLink = "http://yourwebsite.com/reset_password.php?token=" . $token;
        // Simulating email sending. Implement actual email sending for production.
        echo "Reset link: " . $resetLink;
    } else {
        echo "Email does not exist.";
    }
    exit;
}

// Reset Password Form Handling
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["password"], $_POST["token"])) {
    $password = trim($_POST["password"]);
    $token = $_POST["token"];

    // Search for token and check expiry
    $stmt = $pdo->prepare("SELECT id FROM user_account WHERE reset_token = :token AND token_expiry > NOW()");
    $stmt->execute([':token' => $token]);
    
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch();
        $userId = $row['id'];
        
        // Update password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $update = $pdo->prepare("UPDATE user_account SET password = :password, reset_token = NULL, token_expiry = NULL WHERE id = :id");
        $update->execute([':password' => $hashedPassword, ':id' => $userId]);
        
        echo "Password has been updated successfully.";
    } else {
        echo "Invalid or expired token.";
    }
    exit;
}

// HTML Form
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Reset</title>
</head>
<body>
    <form method="post">
        <label for="email">Enter your email address:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Send Password Reset Link</button>
    </form>
    
    <form method="post">
        <label for="password">New Password:</label>
        <input type="password" id="password" name="password" required>
        
        <label for="token">Reset Token:</label>
        <input type="text" id="token" name="token" required>
        
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>