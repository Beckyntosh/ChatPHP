<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create Table
$tableSql = "CREATE TABLE IF NOT EXISTS workout_log (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(30) NOT NULL,
    duration_minutes INT(10),
    intensity VARCHAR(15),
    log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($tableSql) === TRUE) {
    echo "Table workout_log created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exercise_name = $_POST['exercise_name'];
    $duration_minutes = $_POST['duration_minutes'];
    $intensity = $_POST['intensity'];

    $sql = "INSERT INTO workout_log (exercise_name, duration_minutes, intensity) VALUES ('$exercise_name', '$duration_minutes', '$intensity')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Exercise to Digital Workout Log</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f0f0f0; }
        form { max-width: 400px; margin: 50px auto; padding: 20px; background: #fff; }
        input, select { width: 100%; padding: 8px; margin: 10px 0; border-radius: 5px; border: 1px solid #ddd; }
        input[type=submit] { background: #0aaff1; color: #fff; cursor: pointer; }
        input[type=submit]:hover { background: #0793d1; }
    </style>
</head>
<body>
    <form action="" method="POST">
        <label for="exercise_name">Exercise Name:</label>
        <input type="text" id="exercise_name" name="exercise_name" required>

        <label for="duration">Duration (in minutes):</label>
        <input type="number" id="duration" name="duration_minutes" required>

        <label for="intensity">Intensity:</label>
        <select id="intensity" name="intensity" required>
            <option value="low">Low</option>
            <option value="moderate" selected>Moderate</option>
            <option value="high">High</option>
        </select>

        <input type="submit" value="Log Exercise">
    </form>
</body>
</html>
