<?php
// Establishing Connection with Server by passing server_name, user_id, and password and database as parameters
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Checking the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Table creation for User Preferences if not exists
$sql = "CREATE TABLE IF NOT EXISTS UserPreferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userid INT(6) NOT NULL,
    homepage_layout VARCHAR(30) NOT NULL,
    theme VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    //echo "Table UserPreferences created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Handling User Preferences Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = $_POST["userid"];
    $homepage_layout = $_POST["homepage_layout"];
    $theme = $_POST["theme"];
    
    $sql = "INSERT INTO UserPreferences (userid, homepage_layout, theme)
    VALUES ('$userid', '$homepage_layout', '$theme')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Your preferences have been saved successfully!";
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
<style>
    body { font-family: Arial, sans-serif; }
    .container { max-width: 600px; margin: auto; padding: 20px; }
</style>
</head>
<body>
<div class="container">
    <h2>Customize Your Experience</h2>
    <form action="" method="post">
        <label for="userid">User ID:</label><br>
        <input type="text" id="userid" name="userid" required><br>
        <label for="homepage_layout">Homepage Layout:</label><br>
        <select name="homepage_layout" id="homepage_layout" required>
            <option value="standard">Standard</option>
            <option value="compact">Compact</option>
            <option value="detailed">Detailed</option>
        </select><br>
        <label for="theme">Theme:</label><br>
        <select name="theme" id="theme" required>
            <option value="light">Light</option>
            <option value="dark">Dark</option>
        </select><br><br>
        <input type="submit" value="Save Preferences">
    </form>
</div>
</body>
</html>
