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

// Create table if it does not exist
$table_sql = "CREATE TABLE IF NOT EXISTS ExerciseLog (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
exercise_name VARCHAR(30) NOT NULL,
duration INT(10),
intensity VARCHAR(15),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table_sql) === TRUE) {
    echo "Table ExerciseLog created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $exercise_name = $_POST['exercise_name'];
    $duration = $_POST['duration'];
    $intensity = $_POST['intensity'];
    
    $stmt = $conn->prepare("INSERT INTO ExerciseLog (exercise_name, duration, intensity) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $exercise_name, $duration, $intensity);
    
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
<title>Add Exercise to Digital Workout Log</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        color: #333;
    }
    .container {
        max-width: 600px;
        margin: 50px auto;
        background: white;
        padding: 20px;
        text-align: center;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    input[type=text], select, input[type=number] {
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
  <h2>Log Exercise</h2>
  <form action="" method="post">
    <label for="exercise_name">Exercise Name:</label>
    <input type="text" id="exercise_name" name="exercise_name" required>
    
    <label for="duration">Duration (in minutes):</label>
    <input type="number" id="duration" name="duration" required>
    
    <label for="intensity">Intensity:</label>
    <select id="intensity" name="intensity">
      <option value="low">Low</option>
      <option value="moderate">Moderate</option>
      <option value="high">High</option>
    </select>
  
    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>
