<?php
// Simple privacy settings configuration panel for a Handbags website

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

// Create table for Privacy Settings if it doesn't exist
$privacySettingsTable = "CREATE TABLE IF NOT EXISTS PrivacySettings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
profileVisibility ENUM('public', 'private', 'friends') DEFAULT 'public',
reg_date TIMESTAMP
)";

if (!$conn->query($privacySettingsTable)) {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $profileVisibility = $_POST['profileVisibility'];

    // Update or insert privacy settings
    $sql = "INSERT INTO PrivacySettings (username, profileVisibility) VALUES ('$username', '$profileVisibility') ON DUPLICATE KEY UPDATE profileVisibility='$profileVisibility'";

    if ($conn->query($sql) === TRUE) {
        echo "Privacy settings updated.";
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
    <title>Privacy Settings Panel</title>
    <style>
        body{ font-family: Arial, sans-serif; background-color: #f8f9fa; padding: 20px; }
        .container{ max-width: 600px; margin: auto; background: white; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        label, select, input[type=submit] { display: block; margin-top: 10px; }
    </style>
</head>
<body>
<div class="container">
    <h2>Privacy Settings</h2>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input id="username" name="username" required>

        <label for="profileVisibility">Profile visibility:</label>
        <select id="profileVisibility" name="profileVisibility">
            <option value="public">Public</option>
            <option value="private">Private</option>
            <option value="friends">Friends</option>
        </select>

        <input type="submit" value="Save Settings">
    </form>
</div>
</body>
</html>