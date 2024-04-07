<?php

// Database Connection
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

// Create user table if not exists
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
verification_code VARCHAR(50),
verified INT(1) DEFAULT 0,
reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Signup form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $verificationCode = md5(rand(0,1000));

    $sql = "INSERT INTO users (username, email, password, verification_code)
    VALUES ('$username', '$email', '$password', '$verificationCode')";

    if ($conn->query($sql) === TRUE) {
        // Send verification email
        $to = $email;
        $subject = "Email Verification";
        $message = "
        <html>
        <head>
        <title>Email Verification</title>
        </head>
        <body>
        <h2>Thank you for registering.</h2>
        <p>Your Account:</p>
        <p>Email: $email</p>
        <p>Please click the link below to activate your account:</p>
        <a href='http://yourdomain.com/verify.php?email=$email&code=$verificationCode'>Verify Your Email</a>
        </body>
        </html>
        ";
        $headers = "From: noreply@yourwebsite.com \r\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        mail($to,$subject,$message,$headers);
        echo "Verification email sent.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }   
}

// Email verification
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['email']) && isset($_GET['code'])) {
    $email = $_GET['email'];
    $verificationCode = $_GET['code'];

    $sql = "SELECT * FROM users WHERE email='$email' AND verification_code='$verificationCode'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $updateSQL = "UPDATE users SET verified=1 WHERE email='$email'";
        if ($conn->query($updateSQL) === TRUE) {
            echo "Email verified successfully.";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "Invalid verification code.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup - Perfume Store</title>
</head>
<body>
    <h1>Signup for Perfume Store</h1>
    <form action="" method="post">
        <p>Username: <input type="text" name="username"></p>
        <p>Email: <input type="email" name="email"></p>
        <p>Password: <input type="password" name="password"></p>
        <input type="submit" name="signup" value="Signup">
    </form>
</body>
</html>