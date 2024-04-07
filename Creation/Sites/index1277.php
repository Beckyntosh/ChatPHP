<?php
// connect to the database
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
$sql = "CREATE TABLE IF NOT EXISTS ExerciseLog (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_type VARCHAR(50) NOT NULL,
    duration INT(10),
    intensity VARCHAR(50),
    log_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // Table creation success
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exercise_type = $_POST['exercise_type'];
    $duration = $_POST['duration'];
    $intensity = $_POST['intensity'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO ExerciseLog (exercise_type, duration, intensity) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $exercise_type, $duration, $intensity);

    // Execute
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Exercise to Digital Workout Log</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 500px; margin: auto; padding: 20px; }
        input[type="text"], input[type="number"] { width: 100%; padding: 10px; margin: 10px 0; }
        input[type="submit"] { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 10px 0; border: none; cursor: pointer; width: 100%; }
        input[type="submit"]:hover { background-color: #45a049; }
    </style>
</head>
<body>

<div class="container">
    <h2>Log Your Exercise</h2>
    <form action="" method="post">
        <label for="exercise_type">Exercise Type:</label>
        <input type="text" id="exercise_type" name="exercise_type" required>
        <label for="duration">Duration (in minutes):</label>
        <input type="number" id="duration" name="duration" required>
        <label for="intensity">Intensity:</label>
        <input type="text" id="intensity" name="intensity" required>
        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>
