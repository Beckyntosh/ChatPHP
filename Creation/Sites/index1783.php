<?php

// Database connection
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

$pdoOptions = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
);

try {
    $pdo = new PDO(
        "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE, //DSN
        MYSQL_USER, //Username
        MYSQL_PASSWORD, //Password
        $pdoOptions //Options
    );
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Checking if all fields are filled
    if (!empty($_POST["current_password"]) && !empty($_POST["new_password"]) && !empty($_POST["confirm_password"])) {
        $currentPassword = $_POST["current_password"];
        $newPassword = $_POST["new_password"];
        $confirmPassword = $_POST["confirm_password"];
        
        // Assuming a session or cookie has user ID, hardcoding for the example
        $userId = 1; // Hardcoded user ID for example
        
        // Verifying if the current password is correct
        $stmt = $pdo->prepare("SELECT password FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        $user = $stmt->fetch();
        
        // Replace 'password_verify' if you're using custom encryption. 
        if ($user && password_verify($currentPassword, $user['password'])) {
            if ($newPassword === $confirmPassword) {
                // Update the password
                $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
                $updateStmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
                if($updateStmt->execute([$newPasswordHash, $userId])){
                    $message = "Password updated successfully!";
                } else {
                    $message = "An error occurred.";
                }
            } else {
                $message = "New password and confirm password do not match.";
            }
        } else {
            $message = "Current password is incorrect.";
        }
    } else {
        $message = "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Password</title>
</head>
<body>
<h2>Change Password</h2>
<form method="post">
    <div>
        <label for="current_password">Current Password:</label>
        <input type="password" name="current_password" required>
    </div>
    <div>
        <label for="new_password">New Password:</label>
        <input type="password" name="new_password" required>
    </div>
    <div>
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" required>
    </div>
    <div>
        <button type="submit">Change Password</button>
    </div>
    <div><?php echo $message; ?></div>
</form>
</body>
</html>
