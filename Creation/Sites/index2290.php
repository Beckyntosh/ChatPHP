<?php

// Set connection variables
$dbServername = "db";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "my_database";

// Create connection
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if not existing
$sql = "CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  password VARCHAR(50),
  verified INT(1) DEFAULT 0,
  verification_code VARCHAR(50),
  reg_date TIMESTAMP
)";

if ($conn->query($sql) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

// Handle user registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT);
    $verification_code = md5(rand());

    $sql = "INSERT INTO users (username, email, password, verification_code)
        VALUES ('$username', '$email', '$password', '$verification_code')";

    if ($conn->query($sql) === TRUE) {
        // Send verification email
        $verificationLink = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?code=".$verification_code;

        $to = $email;
        $subject = 'Verify Your Email Address';
        $message = "Dear $username,\nPlease click on the following link to verify your email address: $verificationLink";
        $headers = 'From: no-reply@yourlaptopswebsite.com' . "\r\n" .
            'Reply-To: no-reply@yourlaptopswebsite.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
        echo "A verification email has been sent to your email address.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handle email verification
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["code"])) {
    $verification_code = $conn->real_escape_string($_GET['code']);

    $sql = "UPDATE users SET verified = 1 WHERE verification_code = '$verification_code'";

    if ($conn->query($sql) === TRUE) {
        echo "Your email has been verified successfully!";
    } else {
        echo "Error verifying email: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laptop Website - Signup</title>
</head>
<body>

<h2>Signup Form</h2>

<form method="post" action="">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username" required><br>
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" required><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password" required><br><br>
  <input type="submit" name="register" value="Register">
</form> 

</body>
</html>
