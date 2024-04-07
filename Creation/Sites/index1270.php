<?php
// Define database connection settings
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

// Create exercises table if it does not exist
$createTable = "CREATE TABLE IF NOT EXISTS exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(100) NOT NULL,
    duration_minutes INT(6) NOT NULL,
    intensity VARCHAR(50) NOT NULL,
    log_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (!$conn->query($createTable)) {
    die("Error creating table: " . $conn->error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $exercise_name = htmlspecialchars($_POST['exercise_name']);
    $duration_minutes = (int)$_POST['duration_minutes'];
    $intensity = htmlspecialchars($_POST['intensity']);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO exercises (exercise_name, duration_minutes, intensity) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $exercise_name, $duration_minutes, $intensity);

    if (!$stmt->execute()) {
        echo "Error: " . $stmt->error;
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
    <title>Add Exercise Log</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #ffffff;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }
        .input-group {
            margin-bottom: 10px;
        }
        input, select {
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Log Exercise</h2>
        <form method="POST" action="">
            <div class="input-group">
                <label for="exercise_name">Exercise Name:</label>
                <input type="text" id="exercise_name" name="exercise_name" required>
            </div>
            <div class="input-group">
                <label for="duration_minutes">Duration (minutes):</label>
                <input type="number" id="duration_minutes" name="duration_minutes" required>
            </div>
            <div class="input-group">
                <label for="intensity">Intensity:</label>
                <select id="intensity" name="intensity" required>
                    <option value="light">Light</option>
                    <option value="moderate">Moderate</option>
                    <option value="intense">Intense</option>
                </select>
            </div>
            <button type="submit">Add Exercise</button>
        </form>
    </div>
</body>
</html>
