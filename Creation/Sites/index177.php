<?php
// Connection variables
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create exercise table if not exists
$sql = "CREATE TABLE IF NOT EXISTS exercises (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(255) NOT NULL,
    duration INT NOT NULL,
    intensity VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $duration = mysqli_real_escape_string($conn, $_POST['duration']);
    $intensity = mysqli_real_escape_string($conn, $_POST['intensity']);

    // Attempt insert query execution
    $sql = "INSERT INTO exercises (type, duration, intensity) VALUES ('$type', '$duration', '$intensity')";

    if($conn->query($sql) === true) {
        echo "Exercise added successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Exercise Log</title>
</head>
<body>
    <h2>Add Exercise to Digital Workout Log</h2>
    <form action="" method="post">
        <label for="type">Exercise Type:</label><br>
        <input type="text" id="type" name="type" required><br>
        <label for="duration">Duration (in minutes):</label><br>
        <input type="number" id="duration" name="duration" required><br>
        <label for="intensity">Intensity (low, moderate, high):</label><br>
        <select id="intensity" name="intensity">
            <option value="low">Low</option>
            <option value="moderate" selected>Moderate</option>
            <option value="high">High</option>
        </select><br><br>
        <input type="submit" value="Log Exercise">
    </form>
</body>
</html>
