<?php
// Define MySQL connection parameters
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

// Create exercise log table if it doesn't exist
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS exercise_log (
                        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        exercise_name VARCHAR(30) NOT NULL,
                        duration INT(10),
                        intensity VARCHAR(30),
                        log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                        )";

if ($conn->query($tableCreationQuery) === TRUE) {
  //echo "Table exercise_log created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exerciseName = $_POST['exerciseName'];
    $duration = $_POST['duration'];
    $intensity = $_POST['intensity'];

    $insertQuery = "INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES (?, ?, ?)";

    // Prepare statement
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("sis", $exerciseName, $duration, $intensity);

    // execute the query
    $stmt->execute();

    echo "New record created successfully";
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Log Exercise</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 300px;
            margin: auto;
            margin-top: 50px;
        }
        input[type=text], input[type=number] {
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
        div {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="container">
  <h2>Add Exercise to Workout Log</h2>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <label for="exerciseName">Exercise Name:</label>
    <input type="text" id="exerciseName" name="exerciseName" required>

    <label for="duration">Duration (minutes):</label>
    <input type="number" id="duration" name="duration" required>
    
    <label for="intensity">Intensity:</label>
    <input type="text" id="intensity" name="intensity" required>

    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>
