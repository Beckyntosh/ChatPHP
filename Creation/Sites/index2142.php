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

// Create table for user preferences if not exists
$sql = "CREATE TABLE IF NOT EXISTS user_preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
homepage_layout VARCHAR(50) NOT NULL,
theme VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo ""; // Successfully created table
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = htmlspecialchars($_POST['user_id']);
    $homepage_layout = htmlspecialchars($_POST['homepage_layout']);
    $theme = htmlspecialchars($_POST['theme']);
    
    $stmt = $conn->prepare("INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $homepage_layout, $theme);
    
    if ($stmt->execute()) {
        echo "Preferences saved successfully!";
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
    <title>User Preferences</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            background-color: #f4e9cd;
        }
        .container {
            width: 50%;
            margin: auto;
            background: #d3c0a5;
            padding: 20px;
            border-radius: 10px;
        }
        input[type=submit] {
            background-color: #8a6552;
            color: white;
            padding: 12px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Set Your Preferences</h2>
        <form method="post" action="">
            <label for="user_id">User ID:</label>
            <input type="text" id="user_id" name="user_id" required>

            <label for="homepage_layout">Homepage Layout:</label>
            <select id="homepage_layout" name="homepage_layout">
                <option value="classic">Classic</option>
                <option value="modern">Modern</option>
                <option value="medieval">Medieval</option>
            </select>

            <label for="theme">Theme:</label>
            <select id="theme" name="theme">
                <option value="light">Light</option>
                <option value="dark">Dark</option>
                <option value="medieval">Medieval</option>
            </select>

            <input type="submit" value="Save Preferences">
        </form>
    </div>
</body>
</html>
