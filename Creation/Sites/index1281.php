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

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $exercise_name = $_POST['exerciseName'];
  $duration = $_POST['duration'];
  $intensity = $_POST['intensity'];

  $sql = "INSERT INTO exercises (exercise_name, duration, intensity) VALUES (?, ?, ?)";

  // Prepare and bind
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sis", $exercise_name, $duration, $intensity);

  // Execute
  if ($stmt->execute()) {
    echo "<p>Record created successfully</p>";
  } else {
    echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
  }

  $stmt->close();
}

// Creating table if doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS exercises (
id INT AUTO_INCREMENT PRIMARY KEY,
exercise_name VARCHAR(255) NOT NULL,
duration INT NOT NULL,
intensity VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table exercises created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Exercise</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input, select {
            margin-bottom: 20px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type=submit] {
            background-color: #5cb85c;
            color: white;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Exercise to Your Digital Workout Log</h2>
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
            <label for="exerciseName">Exercise Name:</label>
            <input type="text" id="exerciseName" name="exerciseName" required>
            
            <label for="duration">Duration (in minutes):</label>
            <input type="number" id="duration" name="duration" required>
            
            <label for="intensity">Intensity:</label>
            <select id="intensity" name="intensity">
                <option value="low">Low</option>
                <option value="moderate">Moderate</option>
                <option value="high">High</option>
            </select>
            
            <input type="submit" value="Add Exercise">
        </form>
    </div>
</body>
</html>
