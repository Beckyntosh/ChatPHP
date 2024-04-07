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

// Create exercise log table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS exercise_log (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
exercise_type VARCHAR(30) NOT NULL,
duration INT(10),
intensity VARCHAR(10),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // echo "Table exercise_log created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exercise_type = $_POST['exercise_type'];
    $duration = $_POST['duration'];
    $intensity = $_POST['intensity'];

    $stmt = $conn->prepare("INSERT INTO exercise_log (exercise_type, duration, intensity) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $exercise_type, $duration, $intensity);
    $stmt->execute();
    
    echo "<p>Exercise added successfully!</p>";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Exercise to Workout Log</title>
</head>
<body>
    <h2>Add Exercise</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="exercise_type">Exercise Type:</label><br>
        <input type="text" id="exercise_type" name="exercise_type" required><br>
        <label for="duration">Duration (in minutes):</label><br>
        <input type="number" id="duration" name="duration" required><br>
        <label for="intensity">Intensity (Low/Medium/High):</label><br>
        <input type="text" id="intensity" name="intensity" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>