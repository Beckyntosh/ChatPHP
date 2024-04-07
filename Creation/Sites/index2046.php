<?php
// Database connection details
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_DATABASE', 'my_database');
define('MYSQL_SERVER', 'db');

// Connect to MySQL database
$conn = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create privacy settings table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS privacy_settings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED NOT NULL,
    profile_visibility ENUM('public', 'private', 'friends') DEFAULT 'public',
    UNIQUE KEY unique_user (user_id)
    )";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = !empty($_POST['user_id']) ? $conn->real_escape_string($_POST['user_id']) : '';
    $visibility = !empty($_POST['visibility']) ? $conn->real_escape_string($_POST['visibility']) : 'public';

    // Check if user settings already exist
    $sql = "SELECT id FROM privacy_settings WHERE user_id='$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Update existing settings
        $sql = "UPDATE privacy_settings SET profile_visibility='$visibility' WHERE user_id='$user_id'";
    } else {
        // Insert new settings
        $sql = "INSERT INTO privacy_settings (user_id, profile_visibility) VALUES ('$user_id', '$visibility')";
    }

    if (!$conn->query($sql) === TRUE) {
        echo "Error updating record: " . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Supplies - Privacy Settings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label, select {
            display: block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h2>Privacy Settings</h2>
    <form action="" method="post">
        <label for="user_id">User ID:</label>
        <input type="text" id="user_id" name="user_id" required>

        <label for="visibility">Profile Visibility:</label>
        <select id="visibility" name="visibility">
            <option value="public">Public</option>
            <option value="private">Private</option>
            <option value="friends">Friends</option>
        </select>
        
        <input type="submit" value="Save Settings">
    </form>
</body>
</html>
<?php
$conn->close();
?>
