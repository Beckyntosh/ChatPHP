<?php
// Initialize a connection to the database
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

// This is to ensure the 'exercise_log' table exists. If not, it creates it.
$sql = "CREATE TABLE IF NOT EXISTS exercise_log (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_type VARCHAR(50) NOT NULL,
    duration INT(10),
    intensity VARCHAR(50),
    log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect post variables
    $exercise_type = $_POST['exercise_type'];
    $duration = $_POST['duration'];
    $intensity = $_POST['intensity'];

    $sql = "INSERT INTO exercise_log (exercise_type, duration, intensity)
    VALUES ('$exercise_type', '$duration', '$intensity')";

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Exercise Log</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
        }
        form {
            margin-top: 20px;
        }
        input[type=text], input[type=number], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Exercise to Workout Log</h2>
        <form action="" method="post">
            <label for="exercise_type">Exercise Type:</label>
            <input type="text" id="exercise_type" name="exercise_type" required>

            <label for="duration">Duration (in minutes):</label>
            <input type="number" id="duration" name="duration" required>
            
            <label for="intensity">Intensity:</label>
            <select id="intensity" name="intensity">
                <option value="low">Low</option>
                <option value="moderate" selected>Moderate</option>
                <option value="high">High</option>
            </select>

            <input type="submit" value="Add Exercise">
        </form>
    </div>
</body>
</html>
