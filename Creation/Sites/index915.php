<?php
// Define MySQL connection details
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
$tableSql = "CREATE TABLE IF NOT EXISTS exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_type VARCHAR(30) NOT NULL,
    duration INT(10),
    intensity VARCHAR(30),
    log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($tableSql) === TRUE) {
    // echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exercise_type = $_POST['exercise_type'];
    $duration = $_POST['duration'];
    $intensity = $_POST['intensity'];

    $insertSql = $conn->prepare("INSERT INTO exercises (exercise_type, duration, intensity) VALUES (?, ?, ?)");
    $insertSql->bind_param("sis", $exercise_type, $duration, $intensity);

    if ($insertSql->execute()) {
        echo "<script>alert('Exercise logged successfully');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $insertSql->close();
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
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Log Exercise</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="exercise_type">Exercise Type:</label>
                <input type="text" id="exercise_type" name="exercise_type" required>
            </div>
            <div class="form-group">
                <label for="duration">Duration (in minutes):</label>
                <input type="number" id="duration" name="duration" required>
            </div>
            <div class="form-group">
                <label for="intensity">Intensity Level:</label>
                <select id="intensity" name="intensity">
                    <option value="low">Low</option>
                    <option value="moderate">Moderate</option>
                    <option value="high">High</option>
                </select>
            </div>
            <input type="submit" value="Log Exercise">
        </form>
    </div>
</body>
</html>
