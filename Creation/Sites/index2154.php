<?php
// Connection to the database
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

// Create table for user preferences if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS UserPreferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
userId INT(6) UNSIGNED,
homepageLayout VARCHAR(50) NOT NULL,
theme VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if there's a form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = 1; // This should be retrieved from session or current logged in user
    $homepageLayout = $_POST['homepageLayout'];
    $theme = $_POST['theme'];

    // Insert or update user preferences
    $stmt = $conn->prepare("INSERT INTO UserPreferences (userId, homepageLayout, theme) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE homepageLayout=?, theme=?");
    $stmt->bind_param("issss", $userId, $homepageLayout, $theme, $homepageLayout, $theme);
    
    if($stmt->execute()) {
        echo "Preferences saved successfully.";
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
        body { font-family: Arial, sans-serif; }
        .container { margin: 20px; }
        .form-group { margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Set Your Preferences</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="homepageLayout">Homepage Layout:</label>
                <select name="homepageLayout" id="homepageLayout">
                    <option value="grid">Grid</option>
                    <option value="list">List</option>
                </select>
            </div>
            <div class="form-group">
                <label for="theme">Theme:</label>
                <select name="theme" id="theme">
                    <option value="light">Light</option>
                    <option value="dark">Dark</option>
                    <option value="realistic">Realistic</option>
                </select>
            </div>
            <button type="submit">Save Preferences</button>
        </form>
    </div>
</body>
</html>
