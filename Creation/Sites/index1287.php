<?php
// Initialize connection variables
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Establish connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if connection is successful
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table for exercises if it does not exist
$createTable = "CREATE TABLE IF NOT EXISTS exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    activity VARCHAR(50) NOT NULL,
    duration INT(11) NOT NULL,
    intensity VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($createTable) === TRUE) {
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted to insert data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $activity = $_POST['activity'];
    $duration = $_POST['duration'];
    $intensity = $_POST['intensity'];

    $sql = "INSERT INTO exercises (activity, duration, intensity)
    VALUES ('".$activity."', ".$duration.", '".$intensity."')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
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
</head>
<body>

<h2>Log a New Exercise</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="activity">Activity:</label><br>
  <input type="text" id="activity" name="activity" required><br>
  <label for="duration">Duration (in minutes):</label><br>
  <input type="number" id="duration" name="duration" required><br>
  <label for="intensity">Intensity:</label><br>
  <select id="intensity" name="intensity">
    <option value="low">Low</option>
    <option value="moderate">Moderate</option>
    <option value="high">High</option>
  </select><br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
