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

// Create table for user preferences if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS user_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    homepage_layout VARCHAR(30) NOT NULL,
    theme VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table user_preferences created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $homepage_layout = $_POST['homepage_layout'];
    $theme = $_POST['theme'];

    $stmt = $conn->prepare("INSERT INTO user_preferences (homepage_layout, theme) VALUES (?, ?)");
    $stmt->bind_param("ss", $homepage_layout, $theme);
    
    if ($stmt->execute() === TRUE) {
        echo "<script>alert('Preferences saved successfully!');</script>";
    } else {
        echo "<script>alert('Error saving preferences: " . $stmt->error . "');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Preferences</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 20px;
        }
        select {
            padding: 10px;
            margin: 10px 0;
            display: block;
        }
        input[type=submit] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Set Your Preferences</h2>
        <form action="" method="post">
            <label for="homepage_layout">Homepage Layout:</label>
            <select id="homepage_layout" name="homepage_layout">
                <option value="standard">Standard</option>
                <option value="compact">Compact</option>
                <option value="detailed">Detailed</option>
            </select>
            <label for="theme">Theme:</label>
            <select id="theme" name="theme">
                <option value="light">Light</option>
                <option value="dark">Dark</option>
                <option value="ken-thompson">Ken Thompson</option>
            </select>
            <input type="submit" value="Save Preferences">
        </form>
    </div>
</body>
</html>
<?php
$conn->close();
?>
