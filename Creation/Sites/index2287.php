<?php
// Connecting to the database
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

// Create users table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
verification_code VARCHAR(50),
is_verified TINYINT(1) NOT NULL DEFAULT 0,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // echo "Table users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle user signup
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = md5($_POST['password']); //md5 for simplicity but consider using stronger hashing like bcrypt
  $verification_code = md5(rand());

  $sql = "INSERT INTO users (username, email, password, verification_code) VALUES ('$username', '$email', '$password', '$verification_code')";

  if ($conn->query($sql) === TRUE) {
    // Send verification email
    $to = $email;
    $subject = "Email Verification";
    $message = "Please click on the link below to verify your email address: http://" . $_SERVER['SERVER_NAME'] . "/?verify=$verification_code";
    $headers = "From: noreply@yourwebsite.com";

    mail($to,$subject,$message,$headers);

    echo "Registration successful. Please check your email to verify your account.";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Handle email verification
if (isset($_GET['verify'])) {
  $verification_code = $_GET['verify'];
  $sql = "UPDATE users SET is_verified=1 WHERE verification_code='$verification_code'";
  
  if ($conn->query($sql) === TRUE && $conn->affected_rows > 0) {
    echo "Email verified successfully. You can now login.";
  } else {
    echo "Error verifying email.";
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Signup - Spirits Website</title>
</head>
<body>
<h2>Signup</h2>
<form method="post" action="">
Username:<br>
<input type="text" name="username" required>
<br>
Email:<br>
<input type="email" name="email" required>
<br>
Password:<br>
<input type="password" name="password" required>
<br><br>
<input type="submit" name="register" value="Register">
</form>

</body>
</html>
