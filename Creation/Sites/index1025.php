<?php
// settings
$dbHost = 'db';
$dbUsername = 'root';
$dbPassword = 'root';
$dbName = 'my_database';

// Create connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they do not exist
$dashboardTable = "CREATE TABLE IF NOT EXISTS user_dashboards (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED NOT NULL,
    layout VARCHAR(30) NOT NULL,
    widget_settings TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($dashboardTable) === TRUE) {
    echo "Table user_dashboards created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$usersTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($usersTable) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert dummy users data if needed

// Dummy UI for dashboard customization
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assume user_id is 1 for this example; in a real-case scenario, you'd retrieve this from the session or user authentication
    $userId = 1;
    $layout = $_POST["layout"];
    $widgetSettings = json_encode($_POST["widgets"]); // simplification; properly handle and validate in a real case

    $stmt = $conn->prepare("INSERT INTO user_dashboards (user_id, layout, widget_settings) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $userId, $layout, $widgetSettings);

    if ($stmt->execute()) {
        echo "Dashboard customized successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customize Dashboard</title>
</head>
<body>
    <h2>Customize Your Dashboard</h2>
    <form method="POST">
        <label for="layout">Choose a layout:</label>
        <select name="layout" id="layout">
            <option value="grid">Grid</option>
            <option value="list">List</option>
        </select>
        <br><br>
        <label>Select widgets:</label><br>
        <input type="checkbox" name="widgets[]" value="favorite_perfumes"> Favorite Perfumes<br>
        <input type="checkbox" name="widgets[]" value="new_arrivals"> New Arrivals<br>
        <input type="checkbox" name="widgets[]" value="top_rated"> Top Rated<br>
        <br><br>
        <input type="submit" value="Save Settings">
    </form>
</body>
</html>
