<?php
// Connection parameters
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

// Create table if it does not exist
$createTableQuery = "CREATE TABLE IF NOT EXISTS running_records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pace DECIMAL(5,2) NOT NULL,
    distance DECIMAL(5,2) NOT NULL,
    time VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!$conn->query($createTableQuery)) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pace = $distance = $time = "";
    
    if (isset($_POST['calculate'])) {
        $pace = $_POST['pace'] ?? null;
        $distance = $_POST['distance'] ?? null;
        $time = $_POST['time'] ?? null;

        if ($pace && $distance) {
            $timeInSeconds = ($pace * $distance) * 60;
            $hours = floor($timeInSeconds / 3600);
            $minutes = floor(($timeInSeconds / 60) % 60);
            $seconds = $timeInSeconds % 60;
            $time = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

            // Insert into database
            $insertQuery = $conn->prepare("INSERT INTO running_records (pace, distance, time) VALUES (?, ?, ?)");
            $insertQuery->bind_param("dds", $pace, $distance, $time);
            $insertQuery->execute();
        } elseif ($distance && $time) {
            // Time to hours converted
            $timeParts = explode(':', $time);
            $timeInHours = $timeParts[0] + ($timeParts[1] / 60) + ($timeParts[2] / 3600);
            $pace = ($timeInHours / $distance) * 60;

            // Insert into database
            $insertQuery = $conn->prepare("INSERT INTO running_records (pace, distance, time) VALUES (?, ?, ?)");
            $insertQuery->bind_param("dds", $pace, $distance, $time);
            $insertQuery->execute();
        } elseif ($pace && $time) {
            // Calculate distance
            // Convert time to total minutes
            $timeParts = explode(':', $time);
            $totalMinutes = ($timeParts[0] * 60) + $timeParts[1] + ($timeParts[2] / 60);
            $distance = $totalMinutes / $pace;

            // Insert into database
            $insertQuery = $conn->prepare("INSERT INTO running_records (pace, distance, time) VALUES (?, ?, ?)");
            $insertQuery->bind_param("dds", $pace, $distance, $time);
            $insertQuery->execute();
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Running Pace Calculator</title>
</head>
<body>
    <h1>Running Pace Calculator</h1>
    <form action="" method="post">
        <label for="pace">Pace (minutes per km):</label><br>
        <input type="text" id="pace" name="pace"><br>

        <label for="distance">Distance (km):</label><br>
        <input type="text" id="distance" name="distance"><br>

        <label for="time">Time (HH:MM:SS):</label><br>
        <input type="text" id="time" name="time"><br>

        <input type="submit" name="calculate" value="Calculate">
    </form>
</body>
</html>
<?php
$conn->close();
?>