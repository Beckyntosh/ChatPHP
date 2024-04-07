<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS plants (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
plant_name VARCHAR(30) NOT NULL,
plant_type VARCHAR(30) NOT NULL,
care_schedule VARCHAR(50),
growth_stage VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table Plants created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $plant_name = $_POST['plant_name'];
  $plant_type = $_POST['plant_type'];
  $care_schedule = $_POST['care_schedule'];
  $growth_stage = $_POST['growth_stage'];

  $stmt = $conn->prepare("INSERT INTO plants (plant_name, plant_type, care_schedule, growth_stage) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $plant_name, $plant_type, $care_schedule, $growth_stage);
  
  if ($stmt->execute() === TRUE) {
    echo "<p>New record created successfully</p>";
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
<title>Add a Plant to Gardening Tracker</title>
</head>
<body>

<h2>Add Plant Form</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="plant_name">Plant Name:</label><br>
  <input type="text" id="plant_name" name="plant_name" required><br>
  <label for="plant_type">Plant Type:</label><br>
  <input type="text" id="plant_type" name="plant_type" required><br>
  <label for="care_schedule">Care Schedule:</label><br>
  <input type="text" id="care_schedule" name="care_schedule"><br>
  <label for="growth_stage">Growth Stage:</label><br>
  <input type="text" id="growth_stage" name="growth_stage"><br><br>
  <input type="submit" value="Submit">
</form> 
</body>
</html>