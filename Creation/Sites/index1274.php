<?php
// Database configuration
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connecting to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Checking connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Creating an exercises table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS exercises (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  exercise_name VARCHAR(50) NOT NULL,
  duration INT(10),
  intensity VARCHAR(50),
  log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handling the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $exercise_name = $_POST['exercise_name'];
  $duration = $_POST['duration'];
  $intensity = $_POST['intensity'];

  // Inserting the data into the database
  $sql = "INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('$exercise_name', '$duration', '$intensity')";
  
  if ($conn->query($sql) === TRUE) {
    echo "<p>Exercise added successfully!</p>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Exercise</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #EFEFEF;
      color: #333;
    }
    .container {
      max-width: 600px;
      margin: auto;
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #DA4453;
    }
    form {
      display: flex;
      flex-direction: column;
    }
    input, select {
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 5px;
      border: 1px solid #ddd;
    }
    input[type=submit] {
      background-color: #DA4453;
      color: white;
      cursor: pointer;
    }
    input[type=submit]:hover {
      opacity: 0.9;
    }
  </style>
</head>
<body>
<div class="container">
  <h2>Add Exercise to Workout Log</h2>
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

    <input type="submit" value="Add Exercise">
  </form>
</div>
</body>
</html>
