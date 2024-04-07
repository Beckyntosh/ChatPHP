<?php
// Include this PHP script in a single PHP file named change_password.php. Ensure your server supports PHP and MySQL.

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

// Create users table if not exists
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(255) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

$message = "";

// Change password logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['current_password']) && isset($_POST['new_password'])) {
  $current_password = trim($_POST['current_password']);
  $new_password = trim($_POST['new_password']);
  $username = $_SESSION['username']; // Assuming the username is stored in session
  
  // Fetch user's current password
  $sql = "SELECT password FROM users WHERE username = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();
  
  if (password_verify($current_password, $user['password'])) {
    // Current password is correct, update to new password
    $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
    $update_sql = "UPDATE users SET password = ? WHERE username = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("ss", $new_password_hash, $username);
    
    if ($update_stmt->execute()) {
      $message = "Password changed successfully.";
    } else {
      $message = "Password change failed.";
    }
  } else {
    $message = "Current password is incorrect.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Change Password</title>
<style>
  body { font-family: Arial, sans-serif; background-color: #f0f0f0; color: #333; }
  .container { width: 300px; margin: 100px auto; padding: 20px; background: white; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
  form { display: flex; flex-direction: column; }
  input[type="password"], input[type="submit"] { margin-top: 10px; }
</style>
</head>
<body>
<div class="container">
  <h2>Change Password</h2>
  <form method="POST">
    <label for="current_password">Current Password</label>
    <input type="password" id="current_password" name="current_password" required>
    
    <label for="new_password">New Password</label>
    <input type="password" id="new_password" name="new_password" required>
    
    <input type="submit" value="Change Password">
  </form>
  <?php if (!empty($message)) : ?>
    <p><?php echo $message; ?></p>
  <?php endif; ?>
</div>
</body>
</html>
<?php $conn->close(); ?>
