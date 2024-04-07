<?php
// Establish a connection to the database
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
password VARCHAR(100) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Process change password form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //Get input values
  $username = $_POST['username'];
  $currentPassword = $_POST['currentPassword'];
  $newPassword = $_POST['newPassword'];

  // Check if current password is correct
  $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();

  if ($user && password_verify($currentPassword, $user['password'])) {
    //Update the new password
    $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
    $updateStmt = $conn->prepare("UPDATE users SET password=? WHERE username=?");
    $updateStmt->bind_param("ss", $newPasswordHash, $username);
    if ($updateStmt->execute()) {
      echo "Password changed successfully!";
    } else {
      echo "Error changing password";
    }
  } else {
    echo "Incorrect current password!";
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Change Password</title>
<style>
body {
  font-family: Arial, sans-serif;
  background-color: #f0f0f0;
  margin: 0;
  padding: 0;
}

.form-box {
  background-color: white;
  margin: auto;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0,0,0,0.1);
  max-width: 400px;
  margin-top: 50px;
}

.form-box h2 {
  text-align: center;
  color: #333;
}

input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}
</style>
</head>
<body>

<div class="form-box">
  <h2>Change Password</h2>
  <form action="" method="post">
    <label for="username">Username</label>
    <input type="text" name="username" required>
    <label for="currentPassword">Current Password</label>
    <input type="password" name="currentPassword" required>
    <label for="newPassword">New Password</label>
    <input type="password" name="newPassword" required>
    <button type="submit">Change Password</button>
  </form>
</div>

</body>
</html>