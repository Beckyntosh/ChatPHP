<?php

// Database configuration
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

// Create table for reset links if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS password_resets (
 id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 email VARCHAR(255) NOT NULL,
 token VARCHAR(255) NOT NULL,
 created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
 INDEX email_index (email)
)";
$conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['action']) && $_POST['action'] == 'request_reset') {
    $email = $conn->real_escape_string($_POST['email']);
    $token = bin2hex(random_bytes(32));
    $sql = "INSERT INTO password_resets (email, token) VALUES ('$email', '$token')";
    
    if ($conn->query($sql) === TRUE) {
      // Normally, you'd send an email. Here, we just display the link.
      echo "Password reset link (send by email in a real app): ";
      echo "<a href='?token=$token'>Reset Password</a>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } elseif (isset($_POST['action']) && $_POST['action'] == 'reset_password') {
    $token = $conn->real_escape_string($_POST['token']);
    $newPassword = $conn->real_escape_string($_POST['newPassword']);
    // In a real application, the password should be hashed using password_hash()
    $sql = "SELECT email FROM password_resets WHERE token='$token' AND created_at > DATE_SUB(NOW(), INTERVAL 1 HOUR)";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $email = $row['email'];
      // Update user's password in your users table here.
      // Assuming you have a users table with an email column.
      $sql = "UPDATE users SET password='$newPassword' WHERE email='$email'";
      if ($conn->query($sql) === TRUE) {
        echo "Password updated successfully";
        // Delete the token
        $sql = "DELETE FROM password_resets WHERE email='$email'";
        $conn->query($sql);
      } else {
        echo "Error updating record: " . $conn->error;
      }
    } else {
      echo "Invalid or expired token.";
    }
  }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Password Reset</title>
</head>
<body>
    <div>
        <h2>Request Password Reset</h2>
        <form action="" method="post">
            <input type="hidden" name="action" value="request_reset">
            <input type="email" name="email" required placeholder="Enter your email">
            <button type="submit">Request Reset Link</button>
        </form>
    </div>
    <div>
        <h2>Reset Password</h2>
        <form action="" method="post">
            <input type="hidden" name="action" value="reset_password">
            <input type="hidden" name="token" required value="<?php echo isset($_GET['token']) ? $_GET['token'] : ''; ?>">
            <input type="password" name="newPassword" required placeholder="Enter new password">
            <button type="submit">Reset Password</button>
        </form>
    </div>
</body>
</html>
