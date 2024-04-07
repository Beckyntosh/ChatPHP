<?php
// Database connection parameters
define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'my_database');

// Establish database connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create user preferences table if not exists
$sql = "CREATE TABLE IF NOT EXISTS user_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED NOT NULL,
    theme VARCHAR(30) NOT NULL,
    homepage_layout VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    die("Error creating table: " . $conn->error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = 1; // Example user ID. Implement user session or authentication mechanism
    $theme = $_POST['theme'];
    $homepageLayout = $_POST['homepage_layout'];

    $stmt = $conn->prepare("INSERT INTO user_preferences (user_id, theme, homepage_layout) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $userId, $theme, $homepageLayout);

    if ($stmt->execute() === TRUE) {
        echo "Preferences updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Preferences</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        input, select { width: 100%; padding: 10px; margin-top: 5px; margin-bottom: 20px; }
        input[type="submit"] { background-color: #4CAF50; color: white; cursor: pointer; }
        input[type="submit"]:hover { background-color: #45a049; }
    </style>
</head>
<body>

<div class="container">
    <h2>Customize Your Experience</h2>
    <form method="post">
        <label for="theme">Theme:</label>
        <select name="theme" id="theme">
            <option value="dark">Dark</option>
            <option value="light">Light</option>
            <option value="cryptic">Cryptic</option>
        </select>

        <label for="homepage_layout">Homepage Layout:</label>
        <select name="homepage_layout" id="homepage_layout">
            <option value="default">Default</option>
            <option value="compact">Compact</option>
            <option value="spacious">Spacious</option>
        </select>

        <input type="submit" value="Save Preferences">
    </form>
</div>

</body>
</html>
