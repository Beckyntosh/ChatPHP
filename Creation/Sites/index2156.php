<?php
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

// Check if table exists, if not create one
$checkTable = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = 'user_preferences'";
$result = $conn->query($checkTable);

if($result->num_rows == 0) {
    $createTable = "CREATE TABLE user_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    homepage_layout VARCHAR(30) NOT NULL,
    theme VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($createTable) === TRUE) {
        echo "Table user_preferences created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// Check form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $homepage_layout = $_POST['homepage_layout'];
    $theme = $_POST['theme'];

    $sql = "INSERT INTO user_preferences (homepage_layout, theme)
    VALUES ('$homepage_layout', '$theme')";

    if ($conn->query($sql) === TRUE) {
        echo "New preference set successfully";
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
    <title>User Preferences</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: 20px auto; padding: 20px; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 5px; }
        select, button { padding: 10px; width: 100%; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Set Your Homepage Preferences</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="homepage_layout">Homepage Layout:</label>
                <select id="homepage_layout" name="homepage_layout">
                    <option value="standard">Standard</option>
                    <option value="compact">Compact</option>
                    <option value="detailed">Detailed</option>
                </select>
            </div>
            <div class="form-group">
                <label for="theme">Theme:</label>
                <select id="theme" name="theme">
                    <option value="light">Light</option>
                    <option value="dark">Dark</option>
                </select>
            </div>
            <button type="submit">Save Preferences</button>
        </form>
    </div>
</body>
</html>
