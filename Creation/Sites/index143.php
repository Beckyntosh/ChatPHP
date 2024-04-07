<?php

$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$table_sql = "CREATE TABLE IF NOT EXISTS garden_plants (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  plant_name VARCHAR(50) NOT NULL,
  care_schedule TEXT NOT NULL,
  growth_stage VARCHAR(50) NOT NULL,
  reg_date TIMESTAMP
)";

if ($conn->query($table_sql) === TRUE) {
  echo ""; // Table created or exists
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $plant_name = $_POST['plant_name'];
  $care_schedule = $_POST['care_schedule'];
  $growth_stage = $_POST['growth_stage'];

  $insert_sql = "INSERT INTO garden_plants (plant_name, care_schedule, growth_stage)
  VALUES ('$plant_name', '$care_schedule', '$growth_stage')";

  if ($conn->query($insert_sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $insert_sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add a Plant to Gardening Tracker</title>
</head>
<body>

<h2>Gardening Tracker: Add a Plant</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="plant_name">Plant Name:</label><br>
  <input type="text" id="plant_name" name="plant_name"><br>
  <label for="care_schedule">Care Schedule:</label><br>
  <input type="text" id="care_schedule" name="care_schedule"><br>
  <label for="growth_stage">Growth Stage:</label><br>
  <input type="text" id="growth_stage" name="growth_stage"><br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>