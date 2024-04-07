<?php
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

// Create table exercises if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(100) NOT NULL,
    duration INT(10),
    intensity VARCHAR(50),
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // echo "Table Exercises created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exercise_name = $_POST['exercise_name'];
    $duration = $_POST['duration'];
    $intensity = $_POST['intensity'];
    
    $stmt = $conn->prepare("INSERT INTO exercises (exercise_name, duration, intensity) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $exercise_name, $duration, $intensity);
    
    if ($stmt->execute() === TRUE) {
        echo "<script>alert('New record created successfully');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Exercise to Your Digital Workout Log</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f2f2f2;
            padding: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
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
    <h2>Add a new Exercise to Your Digital Workout Log</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
</body>
</html>
