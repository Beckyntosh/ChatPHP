<?php

// Database connection
$servername = 'db';
$username = 'root';
$password = 'root';
$dbname = 'my_database';
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create tables if not exists
$sqlUsers = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
token VARCHAR(50) NOT NULL,
verified TINYINT(1) NOT NULL DEFAULT '0',
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$conn->query($sqlUsers);

// Signup PHP code
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
  $email = $_POST['email'];
  $token = bin2hex(random_bytes(25));
  $sqlInsert = $conn->prepare("INSERT INTO users (email, token) VALUES (?, ?)");
  $sqlInsert->bind_param("ss", $email, $token);
  if($sqlInsert->execute()) {
    $to = $email;
    $subject = "Email Confirmation for Newsletter Signup";
    $message = "Please click this link to confirm your subscription: http://yourwebsite.com/?token=".$token;
    $headers = "From: noreply@yourwebsite.com";

    if(mail($to, $subject, $message, $headers)) {
      echo "Confirmation email sent.";
    } else {
      echo "Error sending confirmation email.";
    }
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

// Verify PHP code
if(isset($_GET['token'])) {
  $token = $_GET['token'];
  $sqlVerify = "UPDATE users SET verified = 1 WHERE token='$token'";
  if($conn->query($sqlVerify) === TRUE) {
    echo "Email verified successfully!";
  } else {
    echo "Error updating record: " . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Newsletter Signup</title>
</head>
<body>
  <h2>Signup for Our Newsletter</h2>
  <form method="POST">
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    <input type="submit" name="signup" value="Signup">
  </form>
</body>
</html>
