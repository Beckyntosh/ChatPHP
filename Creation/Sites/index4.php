<!DOCTYPE html>
<html>
<head>
    <title>Historical Weather Data Search</title>
    <style>
        body { font-family: Arial, sans-serif; }
        #searchForm { margin-bottom: 20px; }
        #searchResults { margin-top: 20px; }
        .weather-data { margin-bottom: 10px; padding: 10px; border: 1px solid #ccc; }
    </style>
</head>
<body>

<div id="searchForm">
    <h2>Search Historical Weather Data</h2>
    <form method="POST">
        <label for="date">Date (YYYY-MM-DD):</label>
        <input type="date" id="date" name="date" required>
        
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required>

        <button type="submit" name="search">Search</button>
    </form>
</div>

<div id="searchResults">
<?php

$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Establish connection to MySQL database
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

// Create table for caching weather data if it doesn't exist
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS weather_data (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    location VARCHAR(255) NOT NULL,
    temperature FLOAT NOT NULL,
    humidity INT NOT NULL,
    description VARCHAR(255) NOT NULL,
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($tableCreationQuery)) {
    echo "Error creating table: " . $conn->error;
}

if (isset($_POST['search'])) {
    $date = $conn->real_escape_string($_POST['date']);
    $location = $conn->real_escape_string($_POST['location']);

    // Attempt to retrieve data from cache
    $query = "SELECT * FROM weather_data WHERE date='$date' AND location='$location'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Display cached result
        while($row = $result->fetch_assoc()) {
            echo "<div class='weather-data'>";
            echo "<p>Date: " . $row["date"] . "</p>";
            echo "<p>Location: " . $row["location"] . "</p>";
            echo "<p>Temperature: " . $row["temperature"] . "°C</p>";
            echo "<p>Humidity: " . $row["humidity"] . "%</p>";
            echo "<p>Description: " . $row["description"] . "</p>";
            echo "</div>";
        }
    } else {
        // Here you would fetch data from an external API since it's not in the cache
        // For demonstration, let's simulate fetched data and insert it into the cache
        $simulatedTemperature = 22.5; // Simulate external API data
        $simulatedHumidity = 60; // Simulate external API data
        $simulatedDescription = "Sunny"; // Simulate external API data
        
        $insertQuery = "INSERT INTO weather_data (date, location, temperature, humidity, description) VALUES ('$date', '$location', '$simulatedTemperature', '$simulatedHumidity', '$simulatedDescription')";
        
        if ($conn->query($insertQuery) === TRUE) {
            echo "<div class='weather-data'>";
            echo "<p>Date: " . $date . "</p>";
            echo "<p>Location: " . $location . "</p>";
            echo "<p>Temperature: " . $simulatedTemperature . "°C</p>";
            echo "<p>Humidity: " . $simulatedHumidity . "%</p>";
            echo "<p>Description: " . $simulatedDescription . "</p>";
            echo "</div>";
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }
}

$conn->close();

?>
</div>

</body>
</html>