<?php
// Connecting to the database
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

// Create the exercises table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS exercises (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        activity VARCHAR(255) NOT NULL,
        duration INT(11) NOT NULL,
        intensity VARCHAR(50) NOT NULL,
        date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Collect post variables
  $activity = $_POST['activity'];
  $duration = $_POST['duration'];
  $intensity = $_POST['intensity'];
  
  $sql = "INSERT INTO exercises (activity, duration, intensity) VALUES (?, ?, ?)";
  
  $stmt = $conn->prepare($sql);
  
  $stmt->bind_param("sis", $activity, $duration, $intensity);
  
  if ($stmt->execute()) {
    echo "New record created successfully";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Exercise</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-weight: bold;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        form > div {
            margin-bottom: 15px;
        }
        label {
            display: block;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin: 5px 0 20px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Log Exercise</h2>
    <form action="" method="post">
        <div>
            <label for="activity">Activity</label>
            <input type="text" id="activity" name="activity" required>
        </div>
        <div>
            <label for="duration">Duration (in minutes)</label>
            <input type="number" id="duration" name="duration" required>
        </div>
        <div>
            <label for="intensity">Intensity</label>
            <select id="intensity" name="intensity">
                <option value="low">Low</option>
                <option value="moderate">Moderate</option>
                <option value="high">High</option>
            </select>
        </div>
        <button type="submit">Add Exercise</button>
    </form>
</div>

</body>
</html>
