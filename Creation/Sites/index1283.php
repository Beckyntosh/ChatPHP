<?php
// Database configuration
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
$sql = "CREATE TABLE IF NOT EXISTS exercise_log (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_type VARCHAR(30) NOT NULL,
    duration INT(10),
    intensity VARCHAR(30),
    log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exercise_type = $_POST['exercise_type'];
    $duration = $_POST['duration'];
    $intensity = $_POST['intensity'];
  
    // Insert the submitted form data to the database
    $stmt = $conn->prepare("INSERT INTO exercise_log (exercise_type, duration, intensity) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $exercise_type, $duration, $intensity);
  
    if ($stmt->execute() === TRUE) {
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
    <title>Add Exercise to Workout Log</title>
    <style>
        body{
            font-family: 'Courier New', Courier, monospace;
            background-color: #f0f0f0;
        }
        .container{
            width: 300px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            margin-top: 50px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-input{
            margin-bottom: 10px;
        }
        .form-input input, .form-input select{
            width: calc(100% - 22px);
            padding: 10px;
        }
        .form-button{
            text-align: right;
        }
        .form-button button{
            padding: 10px 20px;
            background-color: #555;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Log Exercise</h2>
        <form action="" method="post">
            <div class="form-input">
                <label for="exercise_type">Exercise Type:</label>
                <input type="text" id="exercise_type" name="exercise_type" required>
            </div>
            <div class="form-input">
                <label for="duration">Duration (minutes):</label>
                <input type="number" id="duration" name="duration" required>
            </div>
            <div class="form-input">
                <label for="intensity">Intensity:</label>
                <select id="intensity" name="intensity" required>
                    <option value="low">Low</option>
                    <option value="moderate">Moderate</option>
                    <option value="high">High</option>
                </select>
            </div>
            <div class="form-button">
                <button type="submit">Log Exercise</button>
            </div>
        </form>
    </div>
</body>
</html>
