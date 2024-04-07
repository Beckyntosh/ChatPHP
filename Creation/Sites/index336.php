<?php
session_start();

$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create account recovery options table if not exists
    $sql = "CREATE TABLE IF NOT EXISTS account_recovery (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_id INT(6) UNSIGNED NOT NULL,
        email VARCHAR(50),
        verification_code VARCHAR(10),
        verified TINYINT(1) DEFAULT 0,
        request_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
    
    $conn->exec($sql);

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            $verification_code = rand(100000, 999999);
            // Store verification code in the database
            $sql = "INSERT INTO account_recovery (user_id, email, verification_code) VALUES ((SELECT id FROM users WHERE email = ?), ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([0, $email, $verification_code]); // Assume user_id is unknown, hence set to 0 for simplicity
            
            // Send email with verification code (Simplified)
            mail($email,"Your Verification Code","Your verification code is: " . $verification_code);

            $_SESSION['email'] = $email;
            echo '<form action="" method="post">
                    <input type="text" name="verification_code" placeholder="Verification Code">
                    <input type="submit" value="Verify">
                  </form>';
        } elseif (isset($_POST['verification_code'])) {
            $verification_code = $_POST['verification_code'];
            $email = $_SESSION['email'];

            $sql = "SELECT * FROM account_recovery WHERE email = ? AND verification_code = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$email, $verification_code]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                echo "Account verified. You can now reset your password.";
                // Redirect to reset password page or allow user to reset password here
            } else {
                echo "Invalid verification code. Please try again.";
            }
        }
    } else {
        echo '<form action="" method="post">
                <input type="email" name="email" placeholder="Enter your email">
                <input type="submit" value="Send Verification Code">
              </form>';
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Recovery</title>
</head>
<body>
</body>
</html>