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

// Create table for user preferences if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS user_preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED NOT NULL,
homepage_layout VARCHAR(50) NOT NULL,
theme VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user_id = htmlspecialchars($_POST['user_id']);
  $homepage_layout = htmlspecialchars($_POST['homepage_layout']);
  $theme = htmlspecialchars($_POST['theme']);

  $stmt = $conn->prepare("INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (?, ?, ?)");
  $stmt->bind_param("iss", $user_id, $homepage_layout, $theme);
  
  if ($stmt->execute()) {
    echo "Preferences saved successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Preferences</title>
</head>
<body>

<h2>Set Your Homepage Layout and Theme</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="user_id">User ID:</label><br>
  <input type="number" id="user_id" name="user_id" required><br>
  
  <label for="homepage_layout">Homepage Layout:</label><br>
  <select id="homepage_layout" name="homepage_layout">
    <option value="classic">Classic</option>
    <option value="modern">Modern</option>
  </select><br>
  
  <label for="theme">Theme:</label><br>
  <select id="theme" name="theme">
    <option value="light">Light</option>
    <option value="dark">Dark</option>
  </select><br>
  
  <input type="submit" value="Save Preferences">
</form>

</body>
</html>
