// PARAMETERS: Function: Customizable User Dashboard Creation on First Login: create an example feature for customizing the dashboard on first login. Example: User customizes their dashboard layout and widgets after first login Product: Sunglasses Style: accurate

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

// Create table for user dashboard settings if it doesn't exist
$dashboardTable = "CREATE TABLE IF NOT EXISTS user_dashboard (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
userid INT(6) UNSIGNED NOT NULL,
widget_layout VARCHAR(255) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($dashboardTable) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Function to check if it's the user's first login
function isFirstLogin($userid, $conn) {
  $checkUser = "SELECT * FROM user_dashboard WHERE userid = $userid";
  $result = $conn->query($checkUser);
  if ($result->num_rows > 0) {
    // User already customized the dashboard
    return false;
  } else {
    // User's first login
    return true;
  }
}

// Function to update user dashboard settings
function updateUserDashboard($userid, $widget_layout, $conn) {
  $sql = "INSERT INTO user_dashboard (userid, widget_layout) VALUES ($userid, '$widget_layout')";
  if ($conn->query($sql) === TRUE) {
    echo "Dashboard settings updated successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Assuming user ID comes from a session or a secure source
$userid = 1; // Example user ID

// Check if it's the user's first login and if a form has been submitted
if (isFirstLogin($userid, $conn) && $_SERVER["REQUEST_METHOD"] == "POST") {
  // Assuming the widget layout is submitted via a form
  $widget_layout = $_POST['widget_layout'];
  updateUserDashboard($userid, $widget_layout, $conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customizable User Dashboard</title>
</head>
<body>
<?php if (isFirstLogin($userid, $conn)): ?>
    <h2>Customize Your Dashboard</h2>
    <form method="post">
        <label for="widget_layout">Select your dashboard layout:</label>
        <select name="widget_layout" id="widget_layout">
            <option value="layout1">Layout 1</option>
            <option value="layout2">Layout 2</option>
            <option value="layout3">Layout 3</option>
        </select>
        <input type="submit" value="Save Settings">
    </form>
<?php else: ?>
    <p>Your dashboard is customized!</p>
<?php endif; ?>
</body>
</html>
<?php $conn->close(); ?>
