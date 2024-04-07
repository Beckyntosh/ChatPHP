<?php
// Assuming you've already setup your database and table for weather data

// Connection parameters
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";
$table = "historical_weather";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If search is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $date = $_POST['date'];
    $location = $_POST['location'];
    // Sanitize input
    $date = $conn->real_escape_string($date);
    $location = $conn->real_escape_string($location);

    // Attempt to fetch from cache first
    $cacheKey = md5("weather_$location_$date");
    $cachedData = apcu_fetch($cacheKey);

    if ($cachedData) {
        $result = json_decode($cachedData, true);
    } else {
        // SQL query
        $sql = "SELECT * FROM $table WHERE date='$date' AND location='$location'";
        $res = $conn->query($sql);

        if ($res->num_rows > 0) {
            $result = $res->fetch_assoc();
            // Cache the result
            apcu_store($cacheKey, json_encode($result), 3600); // Cache for 1 hour
        } else {
            $result = null;
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Historical Weather Search</title>
</head>
<body>
    <h1>Search Historical Weather Data</h1>
    <form method="POST">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required>
        <button type="submit" name="search">Search</button>
    </form>

    <?php if (isset($result) && $result): ?>
        <h2>Results:</h2>
        <p><strong>Date:</strong> <?= htmlspecialchars($result['date']) ?></p>
        <p><strong>Location:</strong> <?= htmlspecialchars($result['location']) ?></p>
        <p><strong>Temperature:</strong> <?= htmlspecialchars($result['temperature']) ?>°C</p>
        <p><strong>Humidity:</strong> <?= htmlspecialchars($result['humidity']) ?>%</p>
        <p><strong>Weather Description:</strong> <?= htmlspecialchars($result['description']) ?></p>
    <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <p>No records found for your search criteria.</p>
    <?php endif; ?>
</body>
</html>