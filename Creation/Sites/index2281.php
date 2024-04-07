<?php
// Initialize the session and database connection
session_start();
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

// Create users table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(32),
verification_code VARCHAR(64),
verified TINYINT(1) NOT NULL DEFAULT 0,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Listen for form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['email']) && isset($_POST['password'])) {
    // Clean input data
    $email = $conn->real_escape_string($_POST['email']);
    $password = md5($conn->real_escape_string($_POST['password'])); // Simple hash, consider using password_hash in production
    $verification_code = sha1(uniqid($email, true)); // Generate unique verification code
    // Insert user with unverified email
    $sql = "INSERT INTO users (username, email, password, verification_code) VALUES ('', '$email', '$password', '$verification_code')";

    if ($conn->query($sql) === TRUE) {
      // Send verification email
      $verify_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]?verification_code=$verification_code";
      $to = $email;
      $subject = "Verify Your Email";
      $message = "Please click on the following link to verify your email: $verify_link";
      $headers = "From: no-reply@yourwebsite.com";
      mail($to, $subject, $message, $headers);
      echo "Verification email sent.";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}

// Listen for email verification
if (isset($_GET['verification_code'])) {
  $verification_code = $conn->real_escape_string($_GET['verification_code']);
  // Verify email
  $sql = "UPDATE users SET verified=1 WHERE verification_code='$verification_code'";
  if ($conn->query($sql) === TRUE && $conn->affected_rows > 0) {
    echo "Email verified successfully.";
  } else {
    echo "Invalid or expired verification code.";
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Signup - Clothing Website</title>
</head>
<body>
<h2>Signup</h2>
<form method="POST" action="">
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" required><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password" required><br><br>
  <input type="submit" value="Signup">
</form>
</body>
</html>
