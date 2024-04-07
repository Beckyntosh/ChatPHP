<?php
// Configuration
$dbHost     = 'db';
$dbUsername = 'root';
$dbPassword = 'root';
$dbName     = 'my_database';

// Establish database connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create users table if not exists
$query = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    verification_code VARCHAR(255) NOT NULL,
    verified TINYINT(1) NOT NULL DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($query);

function generateVerificationCode($length = 15) {
    return bin2hex(random_bytes($length));
}

if(isset($_POST['register'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT);
    $verificationCode = generateVerificationCode();
    
    // Insert user into the database
    $insert = $conn->query("INSERT INTO users (username, email, password, verification_code) VALUES ('$username', '$email', '$password', '$verificationCode')");

    if($insert) {
        $verifyLink = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?verification_code=".$verificationCode;

        // Send Verification Email
        $subject = "Verify Your Email";
        $message = "Please click on the following link to verify your email: $verifyLink";
        $headers = "From: noreply@bathproductswebsite.com\r\n";
        if(mail($email, $subject, $message, $headers)){
            echo 'A verification link has been sent to your email.';
        }else{
            echo 'There was a problem sending the verification email.';
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Check verification code
if(isset($_GET['verification_code'])) {
    $verificationCode = $conn->real_escape_string($_GET['verification_code']);

    // Verify user
    $update = $conn->query("UPDATE users SET verified = 1 WHERE verification_code = '$verificationCode'");

    if($update) {
        echo 'Your account has been verified!';
    } else {
        echo 'Invalid verification code!';
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Bath Products Website</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; font-weight: bold; }
        .container { width: 50%; margin: 0 auto; }
        form { margin-top: 20px; }
        input { margin-bottom: 10px; padding: 10px; width: calc(100% - 22px); font-size: 16px; }
        button { padding: 10px 20px; font-size: 16px; background-color: black; color: white; border: none; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register for Bath Products</h2>
        <form action="" method="post">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit" name="register">Register</button>
        </form>
    </div>
</body>
</html>