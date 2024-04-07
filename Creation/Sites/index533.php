<?php
// Connection to the database
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

// Create table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(255) NOT NULL,
reset_token VARCHAR(255),
reset_expiry DATETIME,
reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Check if request is a POST method for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["request_reset"])) {
    // Handle request for password reset
    $email = $conn->real_escape_string($_POST["email"]);

    // Generate a unique random token 
    $token = bin2hex(random_bytes(50));

    // Set the expiry time to 1 hour from now
    $expiry = date("Y-m-d H:i:s", time() + 3600);

    // Update the database with the reset token and expiry
    $sql = "UPDATE users SET reset_token='$token', reset_expiry='$expiry' WHERE email='$email'";

    if ($conn->query($sql) === TRUE) {
      // Send the reset link to the user's email
      $resetLink = "http://yourwebsite.com/reset_password.php?token=$token";
      echo "Please check your email for the reset link: $resetLink";
    } else {
      echo "Error updating record: " . $conn->error;
    }
  } elseif (isset($_POST["reset_password"])) {
    // Handle resetting the password
    $token = $conn->real_escape_string($_POST["token"]);
    $newPassword = password_hash($conn->real_escape_string($_POST["password"]), PASSWORD_DEFAULT);

    // Check if token is valid and not expired
    $sql = "SELECT id FROM users WHERE reset_token='$token' AND reset_expiry > NOW() LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Token is valid, update the user's password
      $sql = "UPDATE users SET password='$newPassword', reset_token=NULL, reset_expiry=NULL WHERE reset_token='$token'";
      if ($conn->query($sql) === TRUE) {
        echo "Password has been reset successfully.";
      } else {
        echo "Error resetting password: " . $conn->error;
      }
    } else {
      echo "This link is invalid or has expired.";
    }
  }
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Password Reset</title>
</head>
<body>
<h2>Request Password Reset</h2>
<form method="post" action="">
  Email: <input type="text" name="email" required>
  <button type="submit" name="request_reset">Request Reset</button>
</form>
<h2>Reset Password</h2>
<form method="post" action="">
  Token: <input type="text" name="token" required>
  New Password: <input type="password" name="password" required>
  <button type="submit" name="reset_password">Reset Password</button>
</form>
</body>
</html>