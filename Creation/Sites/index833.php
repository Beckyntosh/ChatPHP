<?php
// Configuration
$dbHost     = 'db';
$dbUsername = 'root';
$dbPassword = 'root';
$dbName     = 'my_database';

// Create connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create locations table if it doesn't exist
$createLocationsTable = "CREATE TABLE IF NOT EXISTS locations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    latitude DECIMAL(10, 8),
    longitude DECIMAL(11, 8),
    description TEXT
)";
if (!$conn->query($createLocationsTable)) {
    die("Error creating table: " . $conn->error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"])) {
    $name = $conn->real_escape_string($_POST["name"]);
    $latitude = $conn->real_escape_string($_POST["latitude"]);
    $longitude = $conn->real_escape_string($_POST["longitude"]);
    $description = $conn->real_escape_string($_POST["description"]);

    $sql = "INSERT INTO locations (name, latitude, longitude, description) VALUES ('$name', $latitude, $longitude, '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: green;'>New location added successfully.</p>";
    } else {
        echo "<p style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Location - Baby Products Environmental Awareness Website</title>
<style>
    body { background-color: #282a36; color: #f8f8f2; font-family: Gothic, Arial; }
    .container { width: 80%; margin: auto; text-align: center; }
    form { margin: 20px; }
    input[type=text], textarea { width: 50%; padding: 12px 20px; margin: 8px 0; box-sizing: border-box; border: 2px solid #44475a; background-color: #6272a4; color: #f8f8f2; }
    input[type=submit] { background-color: #50fa7b; border: none; color: white; padding: 15px 32px; text-decoration: none; display: inline-block; font-size: 16px; }
</style>
</head>
<body>
<div class="container">
    <h1>Add a New Location</h1>
    <form action="" method="post">
        <input type="text" name="name" placeholder="Location Name" required><br>
        <input type="text" name="latitude" placeholder="Latitude" required><br>
        <input type="text" name="longitude" placeholder="Longitude" required><br>
        <textarea name="description" placeholder="Description" required></textarea><br>
        <input type="submit" value="Add Location">
    </form>
</div>
</body>
</html>