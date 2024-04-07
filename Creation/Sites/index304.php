<?php
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

// Create tables if not exist
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
verification_code VARCHAR(50),
verified TINYINT(1) DEFAULT 0,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table 'users' created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Register User
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = md5($_POST['password']); // MD5 Hashing for simplicity
  $verification_code = md5(rand()); // Generate verification code

  $sql = "INSERT INTO users (username, email, password, verification_code) VALUES ('$username', '$email', '$password', '$verification_code')";

  if ($conn->query($sql) === TRUE) {
    // Send verification email
    $to = $email;
    $subject = "Email Verification";
    $message = "Please click this link to verify your account: http://yourwebsite.com/verify.php?vcode=$verification_code";
    $headers = "From: no-reply@yourwebsite.com";
    mail($to,$subject,$message,$headers);
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Account Verification
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['vcode'])) {
  $vcode = $_GET['vcode'];
  $sql = "UPDATE users SET verified = 1 WHERE verification_code='$vcode'";
  
  if ($conn->query($sql) === TRUE) {
    echo "Account verified successfully.";
  } else {
    echo "Error updating record: " . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Register - Ada's Books</title>
<style>
    body {
        font-family: 'Lucida Console', Monaco, monospace;
        background-color: #f0f8ff;
        text-align: center;
    }
    form * {
        margin: 10px;
    }
</style>
</head>
<body>
<h2>Register to Ada's Books</h2>
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
