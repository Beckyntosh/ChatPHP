<?php
// Initialize connection variables
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

// Create table for user preferences if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS user_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED NOT NULL,
    homepage_layout VARCHAR(30) NOT NULL,
    theme VARCHAR(30) NOT NULL,
    modification_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = $_POST['userid'];
    $layout = $_POST['layout'];
    $theme = $_POST['theme'];

    // Prepare to insert or update user preferences
    $stmt = $conn->prepare("REPLACE INTO user_preferences (user_id, homepage_layout, theme) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $userid, $layout, $theme);

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
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }
        label, select, button {
            display: block;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Set Your Preferences</h2>
    <form action="" method="post">
        <label for="userid">User ID:</label>
        <input type="number" id="userid" name="userid" required>

        <label for="layout">Homepage Layout:</label>
        <select id="layout" name="layout">
            <option value="standard">Standard</option>
            <option value="compact">Compact</option>
            <option value="detailed">Detailed</option>
        </select>

        <label for="theme">Theme:</label>
        <select id="theme" name="theme">
            <option value="light">Light</option>
            <option value="dark">Dark</option>
            <option value="relaxed">Relaxed</option>
        </select>

        <button type="submit">Save Preferences</button>
    </form>
</div>

</body>
</html>
