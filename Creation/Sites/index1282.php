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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS exercise_log (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(50) NOT NULL,
    duration INT(10),
    intensity VARCHAR(30),
    log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exercise_name = $_POST['exercise_name'];
    $duration = $_POST['duration'];
    $intensity = $_POST['intensity'];

    $stmt = $conn->prepare("INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $exercise_name, $duration, $intensity);

    if ($stmt->execute()) {
        echo "Exercise logged successfully!";
    } else {
        echo "Error logging exercise: " . $stmt->error;
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
    <title>Log Exercise</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
        }
        input, select {
            margin-top: 5px;
        }
        button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Log Exercise</h2>
        <form method="POST">
            <label for="exercise_name">Exercise Name:</label>
            <input type="text" id="exercise_name" name="exercise_name" required>
            <label for="duration">Duration (minutes):</label>
            <input type="number" id="duration" name="duration" required>
            <label for="intensity">Intensity:</label>
            <select id="intensity" name="intensity">
                <option value="light">Light</option>
                <option value="moderate">Moderate</option>
                <option value="intense">Intense</option>
            </select>
            <button type="submit">Log Exercise</button>
        </form>
    </div>
</body>
</html>
