<?php

// Database connection
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

// Create Exercise Log Table if it does not exist
$createTableQuery = "CREATE TABLE IF NOT EXISTS exercise_log (
                      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                      exercise_name VARCHAR(30) NOT NULL,
                      duration INT(11) NOT NULL,
                      intensity VARCHAR(30) NOT NULL,
                      log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                      )";

if (!$conn->query($createTableQuery)) {
  die("Error creating table: " . $conn->error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $exercise_name = $_POST['exercise_name'];
  $duration = (int)$_POST['duration'];
  $intensity = $_POST['intensity'];

  $insertQuery = "INSERT INTO exercise_log (exercise_name, duration, intensity)
                  VALUES (?, ?, ?)";
  
  $stmt = $conn->prepare($insertQuery);
  $stmt->bind_param("sis", $exercise_name, $duration, $intensity);
  
  if($stmt->execute()) {
    echo "<p>Exercise logged successfully!</p>";
  } else {
    echo "<p>Error logging exercise: " . $conn->error . "</p>";
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
    body {
      font-family: Arial, sans-serif;
    }
    form {
        margin-top: 20px;
    }
    label {
        margin-top: 10px;
        display: block;
    }

    input[type="text"], input[type="number"] {
        width: calc(100% - 22px);
        padding: 10px;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }
  </style>
</head>
<body>
  <h2>Log New Exercise</h2>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="exercise_name">Exercise Name:</label>
    <input type="text" id="exercise_name" name="exercise_name" required>
    
    <label for="duration">Duration (in minutes):</label>
    <input type="number" id="duration" name="duration" required>
    
    <label for="intensity">Intensity:</label>
    <select id="intensity" name="intensity">
      <option value="light">Light</option>
      <option value="moderate">Moderate</option>
      <option value="high">High</option>
    </select>
    
    <input type="submit" value="Log Exercise">
  </form>
</body>
</html>
