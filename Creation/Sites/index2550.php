
<?php
// Connect to Database
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

// Check if table exists, if not create it
$tableCheckSql = "SHOW TABLES LIKE 'user_dashboards'";
$result = $conn->query($tableCheckSql);
if ($result->num_rows == 0) {
    $createTableSql = "CREATE TABLE user_dashboards (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_id INT(6) NOT NULL,
        layout VARCHAR(255) NOT NULL,
        widgets TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($createTableSql) === TRUE) {
        echo "Table user_dashboards created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// Assuming user_id is retrieved from session or authentication context
$user_id = 1; // Example user_id

// Check if user has already customized their dashboard
$checkUserSql = "SELECT * FROM user_dashboards WHERE user_id = $user_id";
$userResult = $conn->query($checkUserSql);

if ($userResult->num_rows == 0) {
  // First login, prompt for customization
?>
<!DOCTYPE html>
<html>
<head>
    <title>Customize Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; }
        .dashboard { margin: auto; width: 50%; padding: 20px; background-color: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .widget { margin-bottom: 20px; }
    </style>
</head>
<body>

<div class="dashboard">
    <h2>Customize Your Dashboard</h2>
    <form action="" method="post">
        <div class="widget">
            <label for="layout">Select Layout:</label>
            <select name="layout" id="layout">
                <option value="grid">Grid</option>
                <option value="list">List</option>
            </select>
        </div>
        <div class="widget">
            <label for="widgets">Select Widgets:</label>
            <select multiple name="widgets[]" id="widgets">
                <option value="camera_feed">Camera Feed</option>
                <option value="system_stats">System Stats</option>
                <option value="recent_photos">Recent Photos</option>
            </select>
        </div>
        <button type="submit" name="submit">Save Dashboard</button>
    </form>
</div>

</body>
</html>
<?php
  if (isset($_POST['submit'])) {
    $layout = $_POST['layout'];
    $widgets = json_encode($_POST['widgets']);

    $insertSql = "INSERT INTO user_dashboards (user_id, layout, widgets) VALUES ($user_id, '$layout', '$widgets')";
    
    if ($conn->query($insertSql) === TRUE) {
      echo "<script>alert('Dashboard customized successfully.'); window.location = window.location.href;</script>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
} else {
  // Display customized dashboard
  $userData = $userResult->fetch_assoc();
  $layout = $userData['layout'];
  $widgets = json_decode($userData['widgets']);
  
  // Layout and widgets rendering logic goes here
  echo "<p>Your customized dashboard with layout: $layout and widgets: " . implode(', ', $widgets) . "</p>";
}

$conn->close();
?>
