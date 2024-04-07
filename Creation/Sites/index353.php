<?php
// Define MYSQL Constants
define("MYSQL_SERVER", "db");
define("MYSQL_USER", "root");
define("MYSQL_PASSWORD", "root");
define("MYSQL_DB", "my_database");

// Establish Connection with the Database
$conn = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create preference table if it doesn't exist
$createPreferencesTable = "CREATE TABLE IF NOT EXISTS user_preferences (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    homepage_layout VARCHAR(20) NOT NULL,
    theme VARCHAR(20) NOT NULL
)";

if (!$conn->query($createPreferencesTable)) {
    die("Error creating table: " . $conn->error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = 1; // Static user_id for demonstration purposes
    $homepageLayout = $conn->real_escape_string($_POST['homepage_layout']);
    $theme = $conn->real_escape_string($_POST['theme']);

    $sql = "INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES ('$userId', '$homepageLayout', '$theme')";

    if ($conn->query($sql) === TRUE) {
        echo "Preferences saved successfully!";
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
    <title>User Preferences | Camera Website</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { margin: 20px auto; max-width: 600px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; }
        .form-group input, .form-group select { width: 100%; padding: 8px; }
        .btn { padding: 10px 15px; background-color: #007bff; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>

<div class="container">
    <h1>Customize Your Experience</h1>
    <form method="POST">
        <div class="form-group">
            <label for="homepage_layout">Homepage Layout</label>
            <select id="homepage_layout" name="homepage_layout">
                <option value="standard">Standard</option>
                <option value="compact">Compact</option>
            </select>
        </div>
        <div class="form-group">
            <label for="theme">Theme</label>
            <select id="theme" name="theme">
                <option value="light">Light</option>
                <option value="dark">Dark</option>
            </select>
        </div>
        <button type="submit" class="btn">Save Preferences</button>
    </form>
</div>

</body>
</html>