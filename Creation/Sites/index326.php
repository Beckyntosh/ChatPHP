<?php
// Simple Privacy Settings Panel for a Musical Instruments Website

// Database connection parameters - Assuming localhost, root, password, and database name are predefined
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// Create users table if it doesn't exist
$createUsersTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    profile_visibility ENUM('public', 'private') DEFAULT 'public',
    reg_date TIMESTAMP
)";

if (!$mysqli->query($createUsersTable)) {
    echo "Table creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

// Check if form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update user's privacy setting
    $visibility = $mysqli->real_escape_string($_POST['profile_visibility']);
    // For demo purposes, updating user with id 1. Implement user session or id retrieval accordingly.
    $updateQuery = "UPDATE users SET profile_visibility = '$visibility' WHERE id = 1";

    if ($mysqli->query($updateQuery)) {
        echo "Privacy setting updated successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
    }
}

// Fetch current settings - For demo purposes, fetching for user with id 1. Implement user session or id retrieval accordingly.
$currentSettings = $mysqli->query("SELECT profile_visibility FROM users WHERE id = 1");
$row = $currentSettings->fetch_assoc();
$currentVisibility = $row ? $row['profile_visibility'] : 'public';

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Privacy Settings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 20px;
        }
        form {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Privacy Settings</h2>
        <form action="privacy_settings.php" method="post">
            <label for="profile_visibility">Profile Visibility:</label>
            <select name="profile_visibility" id="profile_visibility">
                <option value="public" <?php echo $currentVisibility === 'public' ? 'selected' : ''; ?>>Public</option>
                <option value="private" <?php echo $currentVisibility === 'private' ? 'selected' : ''; ?>>Private</option>
            </select>
            <button type="submit">Save Changes</button>
        </form>
    </div>
</body>
</html>