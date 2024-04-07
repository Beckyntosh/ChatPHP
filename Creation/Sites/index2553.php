
<?php
// Connection setup
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

// Create dashboard settings table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS user_dashboard (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED NOT NULL,
    widget_layout VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Check if user is visiting the first time and POST request is made to customize dashboard
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['layout'])) {
    $userId = 1; // Example user ID. Replace with actual user ID from session or database.
    $widgetLayout = $conn->real_escape_string($_POST['layout']);

    // Insert user's dashboard customization into database
    $sql = "INSERT INTO user_dashboard (user_id, widget_layout) VALUES ($userId, '$widgetLayout')";

    if ($conn->query($sql) === TRUE) {
        echo "Dashboard customized successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customizable User Dashboard</title>
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        .container {
            width: 60%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .widget {
            margin: 10px 0;
        }
        .widget input {
            margin-right: 10px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Customize Your Dashboard</h2>
    <form method="POST">
        <div class="widget">
            <label>
                <input type="radio" name="layout" value="Classic" checked> Classic
            </label>
        </div>
        <div class="widget">
            <label>
                <input type="radio" name="layout" value="Modern"> Modern
            </label>
        </div>
        <div class="widget">
            <label>
                <input type="radio" name="layout" value="Compact"> Compact
            </label>
        </div>
        <button type="submit">Save Dashboard</button>
    </form>
</div>
</body>
</html>
