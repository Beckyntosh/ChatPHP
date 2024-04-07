<?php
// Simple example of a web application for user preferences - Custom Homepage Layout and Theme
// For educational purposes - this example lacks security measures like prepared statements for MySQL to avoid SQL injection.

$host = "db";
$user = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the table 'user_preferences' exists, if not, create it
$tableCheckQuery = "SHOW TABLES LIKE 'user_preferences'";
$result = $conn->query($tableCheckQuery);
if ($result->num_rows == 0) {
  $createTableQuery = "CREATE TABLE user_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    homepage_layout VARCHAR(50),
    theme VARCHAR(50),
    reg_date TIMESTAMP
    )";
  if ($conn->query($createTableQuery) === TRUE) {
    echo "Table user_preferences created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }
}

// Setting the user preferences
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $layout = $_POST['layout'];
  $theme = $_POST['theme'];

  // Insert or update user preferences
  $insertOrUpdateQuery = "INSERT INTO user_preferences (username, homepage_layout, theme) VALUES ('$username', '$layout', '$theme')
                           ON DUPLICATE KEY UPDATE homepage_layout='$layout', theme='$theme'";

  if ($conn->query($insertOrUpdateQuery) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error: " . $insertOrUpdateQuery . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Preferences</title>
</head>
<body>
<h2>Set Your Preferences</h2>
<form method="POST">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br><br>
    <label for="layout">Homepage Layout:</label>
    <select id="layout" name="layout">
        <option value="classic">Classic</option>
        <option value="modern">Modern</option>
    </select><br><br>
    <label for="theme">Theme:</label>
    <select id="theme" name="theme">
        <option value="light">Light</option>
        <option value="dark">Dark</option>
    </select><br><br>
    <input type="submit" value="Save Preferences">
</form>
</body>
</html>
