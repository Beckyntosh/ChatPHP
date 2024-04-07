<?php
// Configurations and Database Connection
$servername = 'db';
$username = 'root';
$password = 'root';
$dbname = 'my_database';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS user_dashboard (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED NOT NULL,
widget_layout VARCHAR(255) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table user_dashboard created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
first_login BOOLEAN DEFAULT TRUE,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle User Dashboard Customization Post Data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user_id = $_POST['user_id'];
  $widget_layout = $_POST['widget_layout'];
  
  $updateSQL = "UPDATE users SET first_login = FALSE WHERE id = $user_id";
  $conn->query($updateSQL);
  
  $sql = "INSERT INTO user_dashboard (user_id, widget_layout) VALUES ($user_id, '$widget_layout')";
  if ($conn->query($sql) === TRUE) {
    echo "User dashboard layout saved successfully";
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customize Dashboard</title>
  <style>
    .dashboard-config { display: flex; flex-direction: column; width: 200px; margin: 10px auto; }
    input, textarea, button { margin: 5px 0; }
  </style>
</head>
<body>
  <div class="dashboard-config">
    <h2>Customize Your Dashboard</h2>
    <form action="" method="post">
Simulate user identification, replace with actual dynamic user ID
      <textarea name="widget_layout" placeholder="Enter your desired layout..."></textarea>
      <button type="submit">Save Layout</button>
    </form>
  </div>
</body>
</html>
