<?php
// SIMPLE HISTORICAL WEATHER DATA SEARCH APPLICATION WITH CACHING

// MySQL Database Credentials
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_DATABASE', 'my_database');
define('MYSQL_SERVER', 'db');

// Connect to MySQL Database
$conn = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'weather_data' table exists, create if not
$createTable = "CREATE TABLE IF NOT EXISTS weather_data (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    location VARCHAR(30) NOT NULL,
    date DATE NOT NULL,
    temperature DECIMAL(5,2) NOT NULL,
    humidity DECIMAL(5,2) NOT NULL,
    recorded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (!$conn->query($createTable)) {
    die("Error creating table: " . $conn->error);
}

// Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $location = $_POST['location'];
    $date = $_POST['date'];

    // Simple Caching: Check if data exists in DB for given date and location
    $stmt = $conn->prepare("SELECT temperature, humidity FROM weather_data WHERE location = ? AND date = ?");
    $stmt->bind_param("ss", $location, $date);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // Fetch Result From Cache
        $row = $result->fetch_assoc();
        $temperature = $row['temperature'];
        $humidity = $row['humidity'];
    } else {
        // TODO: Fetch from external API (placeholder), then insert into DB as caching mechanism
        // Set example data
        $temperature = 25.5;
        $humidity = 60.0;

        $insertStmt = $conn->prepare("INSERT INTO weather_data (location, date, temperature, humidity) VALUES (?, ?, ?, ?)");
        $insertStmt->bind_param("ssdd", $location, $date, $temperature, $humidity);
        if (!$insertStmt->execute()) {
            die("Error inserting data: " . $conn->error);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historical Weather Data Search</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #222;
            color: #0f0;
        }
        .container {
            width: 90%;
            margin: auto;
            overflow: hidden;
        }
        form, .result {
            padding: 20px;
            margin: 10px 0;
            background-color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Historical Weather Data Search</h1>
        <form method="post">
            <label for="location">Location: </label>
            <input type="text" id="location" name="location" required>
            <label for="date">Date: </label>
            <input type="date" id="date" name="date" required>
            <button type="submit">Search</button>
        </form>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <div class="result">
                <h2>Weather Data Result</h2>
                <p><strong>Location:</strong> <?= $location ?></p>
                <p><strong>Date:</strong> <?= $date ?></p>
                <p><strong>Temperature:</strong> <?= $temperature ?> °C</p>
                <p><strong>Humidity:</strong> <?= $humidity ?>%</p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>