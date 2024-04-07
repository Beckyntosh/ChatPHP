// PARAMETERS: Function: Customizable User Dashboard Creation on First Login: create an example feature for customizing the dashboard on first login. Example: User customizes their dashboard layout and widgets after first login Product: Watches Style: grateful
<?php
// Direct code embedding, as requested. Please note, for security and best practices, segregating concerns into distinct files and using placeholders for sensitive information is recommended.

define("MYSQL_ROOT_PSWD", "root");
define("MYSQL_DB", "my_database");

// Connect to the database
$servername = "db";
$username = "root";
$password = MYSQL_ROOT_PSWD;
$dbname = MYSQL_DB;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table for user dashboard settings if it doesn't exist
$userDashboardTable = "CREATE TABLE IF NOT EXISTS user_dashboard_settings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED NOT NULL,
widget_layout TEXT NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($userDashboardTable) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Assume user ID management and authentication logic is in place. Hardcoded user ID for this example.
$userId = 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Capture and sanitize user input
  $widgetLayout = $conn->real_escape_string($_POST['widgetLayout']);
  
  // Insert or update user dashboard settings
  $checkExisting = "SELECT id FROM user_dashboard_settings WHERE user_id = $userId";
  $result = $conn->query($checkExisting);

  if ($result->num_rows > 0) {
    // Update existing layout
    $updateLayout = "UPDATE user_dashboard_settings SET widget_layout = '$widgetLayout' WHERE user_id = $userId";
    if (!$conn->query($updateLayout)) {
      echo "Error updating record: " . $conn->error;
    }
  } else {
    // Insert new layout
    $insertLayout = "INSERT INTO user_dashboard_settings (user_id, widget_layout) VALUES ($userId, '$widgetLayout')";
    if (!$conn->query($insertLayout)) {
      echo "Error inserting record: " . $conn->error;
    }
  }

  // Redirect or forward user to their customized dashboard
  header("Location: /path-to-dashboard");
  exit();
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Customize Dashboard</title>
</head>
<body>
  <form method="POST" action="">
    <label for="widgetLayout">Customize your dashboard layout (JSON format):</label><br>
    <textarea id="widgetLayout" name="widgetLayout" rows="10" cols="50">
      {"layout": "grid"}
    </textarea>
    <br>
    <input type="submit" value="Save Dashboard Layout">
  </form>
</body>
</html>
