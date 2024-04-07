<?php
session_start();

$servername = "db";
$database = "my_database";
$username = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database;", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->exec("CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(50) NOT NULL,
        verified TINYINT NOT NULL DEFAULT 0,
        verification_code VARCHAR(255) NOT NULL,
        register_date TIMESTAMP
    )");
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["register"])) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = md5($_POST["password"]);
        $verification_code = md5(rand());
        
        $sql = "INSERT INTO users (username, email, password, verification_code) VALUES (?, ?, ?, ?)";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$username, $email, $password, $verification_code]);
        
        $subject = "Verify your email";
        $message = "Click on this link to verify your email: http://yourdomain.com/yourpath/verify.php?code=$verification_code";
        $headers = "From: noreply@yourdomain.com";
        mail($email, $subject, $message, $headers);
        
        echo "<p>Please check your email to verify your account!</p>";
    }
    
    if (isset($_GET["code"])) {
        $verification_code = $_GET["code"];
        $sql = "SELECT * FROM users WHERE verification_code=?";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$verification_code]);
        
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user['verified'] == 0) {
                $sql = "UPDATE users SET verified = 1 WHERE verification_code=?";
                $stmt= $conn->prepare($sql);
                $stmt->execute([$verification_code]);
                
                echo "<p>Your account has been verified!</p>";
            } else {
                echo "<p>This account is already verified.</p>";
            }
        } else {
            echo "<p>Invalid verification code.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Craft Beers Account Verification</title>
</head>
<body>
    <h2>Register</h2>
    <form method="post" action="">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" name="register" value="Register">
    </form>
</body>
</html>
