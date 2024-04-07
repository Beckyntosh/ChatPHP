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

// Create the user dashboard settings table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS user_dashboard_settings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED NOT NULL,
layout VARCHAR(30) NOT NULL,
widgets TEXT NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Check for user's submission
if (isset($_POST['submit'])) {
  $userId = 1; // Assuming a static user id for demonstration purposes
  $layout = $_POST['layout'];
  $widgets = implode(',', $_POST['widgets']);
  
  // Insert or Update user dashboard settings
  $sql = "INSERT INTO user_dashboard_settings (user_id, layout, widgets) VALUES ('$userId', '$layout', '$widgets')
  ON DUPLICATE KEY UPDATE layout='$layout', widgets='$widgets'";
  
  if ($conn->query($sql) === TRUE) {
    echo "Dashboard customized successfully.";
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
</head>
<body>
<h2>Customize your Dashboard</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <label for="layout">Choose a layout:</label>
  <select name="layout" id="layout">
    <option value="grid">Grid</option>
    <option value="list">List</option>
  </select><br><br>
  
  <p>Select widgets to display:</p>
  <input type="checkbox" id="widget1" name="widgets[]" value="latest_products">
  <label for="widget1"> Latest Hair Care Products</label><br>
  <input type="checkbox" id="widget2" name="widgets[]" value="popular_articles">
  <label for="widget2"> Popular Scientific Articles</label><br>
  <input type="submit" name="submit" value="Customize Dashboard">
</form>
</body>
</html>
