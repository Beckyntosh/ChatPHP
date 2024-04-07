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

// Create users and email_verification tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
verified BOOLEAN DEFAULT 0,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS email_verification (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
token VARCHAR(32) NOT NULL,
exp_date DATETIME
)";

if ($conn->query($sql) === TRUE) {
  echo "Table email_verification created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Sign up form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
  $username = $conn->real_escape_string($_POST['username']);
  $email = $conn->real_escape_string($_POST['email']);
  $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT);
  $token = md5(rand());

  // Insert user into database
  $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

  if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    
    // Insert verification token
    $exp_date = date('Y-m-d H:i:s', strtotime('+24 hours'));
    $sql = "INSERT INTO email_verification (email, token, exp_date) VALUES ('$email', '$token', '$exp_date')";
    if ($conn->query($sql) === TRUE) {
      // Send verification email
      $to = $email;
      $subject = "Verify Your Email";
      $message = "Please click on the link to verify your email: http://yourwebsite.com/verify.php?email=$email&token=$token";
      $headers = "From: noreply@yourwebsite.com";
      mail($to, $subject, $message, $headers);
      echo "Verification email sent.";
    } else {
      echo "Error: " . $conn->error;
    }
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <form method="POST" action="">
        <input type="text" name="username" required placeholder="Username"><br>
        <input type="email" name="email" required placeholder="Email"><br>
        <input type="password" name="password" required placeholder="Password"><br>
        <button type="submit" name="signup">Sign Up</button>
    </form>
</body>
</html>
