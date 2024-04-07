<?php
//Connection to the database
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

// Create exercise table if not exists
$createTable = "CREATE TABLE IF NOT EXISTS exercise_log (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
exercise_name VARCHAR(30) NOT NULL,
duration INT(10),
intensity VARCHAR(30),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($createTable) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

//inject exercise into database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exercise_name = $_POST["exercise_name"];
    $duration = $_POST["duration"];
    $intensity = $_POST["intensity"];

    $insertSql = "INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param("sis", $exercise_name, $duration, $intensity);
    
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insertSql . "<br>" . $conn->error;
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise Log</title>
</head>
<body>
    <h2>Log New Exercise</h2>
    <form method="POST">
        <label for="exercise_name">Exercise Name:</label><br>
        <input type="text" id="exercise_name" name="exercise_name" required><br>
        <label for="duration">Duration (minutes):</label><br>
        <input type="number" id="duration" name="duration" required><br>
        <label for="intensity">Intensity:</label><br>
        <select id="intensity" name="intensity" required>
            <option value="low">Low</option>
            <option value="moderate">Moderate</option>
            <option value="high">High</option>
        </select><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
