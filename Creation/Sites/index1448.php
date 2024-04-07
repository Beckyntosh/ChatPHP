<?php
// Simple Gardening Tracker - Add a Plant (Frontend + Backend in a single file)

// Define MYSQL Constants
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_DATABASE', 'my_database');
define('MYSQL_SERVER', 'db');

// Connect to MySQL Database
$mysqli = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check Connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Create table for plants if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS plants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    care_schedule TEXT NOT NULL,
    date_added DATETIME DEFAULT CURRENT_TIMESTAMP
)";

if (!$mysqli->query($createTable)) {
    echo "Error creating table: " . $mysqli->error;
}

// Handle Form Submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name'], $_POST['care_schedule'])) {
    $name = $mysqli->real_escape_string($_POST['name']);
    $care_schedule = $mysqli->real_escape_string($_POST['care_schedule']);

    $addPlantQuery = "INSERT INTO plants (name, care_schedule) VALUES ('$name', '$care_schedule')";

    if ($mysqli->query($addPlantQuery)) {
        echo "<p>Plant successfully added!</p>";
    } else {
        echo "<p>Error adding plant: " . $mysqli->error . "</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add a Plant to Gardening Tracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }
        form {
            margin: 20px auto;
            width: 300px;
        }
        input, textarea, button {
            width: 100%;
            margin: 10px 0;
            padding: 10px;
        }
    </style>
</head>
<body>
    <h2>Add Tomato Plant</h2>
    <form method="POST">
        <input type="text" name="name" required placeholder="Plant Name" value="Tomato plants">
        <textarea name="care_schedule" required placeholder="Care Schedule">Water daily, Full sun, fertilize weekly</textarea>
        <button type="submit">Add Plant</button>
    </form>
</body>
</html>

<?php
// Close MySQL Connection
$mysqli->close();
?>
