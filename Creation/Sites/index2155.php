<?php
// Avoid showing PHP errors in production
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

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

// Check if the table exists, if not then create one
$tableCheckQuery = "SHOW TABLES LIKE 'user_preferences';";
$result = $conn->query($tableCheckQuery);
if ($result->num_rows == 0) {
    // SQL to create table
    $sql = "CREATE TABLE user_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userid INT(6) UNSIGNED,
    homepage_layout VARCHAR(30) NOT NULL,
    theme VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table user_preferences created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// Handling the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = 1; // Assuming a logged in user with ID 1 for example purposes
    $homepage_layout = $_POST['homepage_layout'];
    $theme = $_POST['theme'];

    $sql = "INSERT INTO user_preferences (userid, homepage_layout, theme) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $userid, $homepage_layout, $theme);
    
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
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
    <title>User Preferences Setting</title>
</head>
<body>
    <h2>Set Your Preferences</h2>
    <form method="post">
        <label for="homepage_layout">Homepage Layout:</label>
        <select name="homepage_layout" id="homepage_layout">
            <option value="standard">Standard</option>
            <option value="compact">Compact</option>
            <option value="detailed">Detailed</option>
        </select><br>
        <label for="theme">Theme:</label>
        <select name="theme" id="theme">
            <option value="light">Light</option>
            <option value="dark">Dark</option>
        </select><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
