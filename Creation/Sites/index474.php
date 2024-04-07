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

// Check if the water intake table exists, if not create it
$table_check_query = "SHOW TABLES LIKE 'daily_water_intake'";
$result = $conn->query($table_check_query);
if ($result->num_rows == 0) {
    $create_table_sql = "CREATE TABLE daily_water_intake (
                          id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                          weight DECIMAL(5,2) NOT NULL,
                          activity_level VARCHAR(30) NOT NULL,
                          water_intake DECIMAL(5,2) NOT NULL,
                          reg_date TIMESTAMP)";
    if ($conn->query($create_table_sql) === TRUE) {
        echo "Table daily_water_intake created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

$weight = $activity_level = $water_intake = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $weight = $_POST["weight"];
  $activity_level = $_POST["activity_level"];
  
  // Basic calculation for water intake based on weight and activity level
  $baseIntake = $weight * 0.033;
  if ($activity_level == "High") {
    $water_intake = $baseIntake + 0.5;
  } else if ($activity_level == "Medium") {
    $water_intake = $baseIntake + 0.35;
  } else {
    $water_intake = $baseIntake;
  }
  
  $sql = "INSERT INTO daily_water_intake (weight, activity_level, water_intake) VALUES ('$weight', '$activity_level', '$water_intake')";
  
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully. You should drink " . $water_intake . " liters of water daily.";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daily Water Intake Calculator</title>
</head>
<body>
    <h2>Calculate Your Daily Water Intake</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="weight">Weight (kg):</label>
        <input type="number" id="weight" name="weight" required><br><br>
        <label for="activity_level">Activity Level:</label>
        <select id="activity_level" name="activity_level" required>
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
        </select><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>