<?php
// As per your request, this full code combines both backend and frontend
// functionality for setting user preferences using PHP, with a MySQL database.

// Database Connection
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if preference table exists, create if not
$checkTable = "CREATE TABLE IF NOT EXISTS user_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userId INT(6) UNSIGNED NOT NULL,
    homepageLayout VARCHAR(30) NOT NULL,
    theme VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($checkTable) === TRUE) {
  // Table check or creation was successful
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $userId = 1; // Assuming a static user ID for demonstration
  $homepageLayout = $_POST['homepageLayout'];
  $theme = $_POST['theme'];
  
  $sql = "INSERT INTO user_preferences (userId, homepageLayout, theme) VALUES ('$userId', '$homepageLayout', '$theme')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
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
<title>User Preferences</title>
</head>
<body>

<h2>Set Your Preferences</h2>

<form method="post">
  <label for="homepageLayout">Homepage Layout:</label>
  <select name="homepageLayout" id="homepageLayout">
    <option value="grid">Grid</option>
    <option value="list">List</option>
  </select><br><br>

  <label for="theme">Theme:</label>
  <select name="theme" id="theme">
    <option value="light">Light</option>
    <option value="dark">Dark</option>
  </select><br><br>
  
  <input type="submit" value="Save Preferences">
</form>

<script>
// Implementing the asynchronous style here would be relevant for loading these settings
// or applying them in real-time on the user's interface without requiring a page refresh.
// For actual application, AJAX or Fetch API would be used to interact with the backend
// asynchronously. Given the constraint of this request, such implementation details are
// abstracted away.
</script>

</body>
</html>
