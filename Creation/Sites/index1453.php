<?php
// Connection parameters
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

// Create table if it does not exist
$table_sql = "CREATE TABLE IF NOT EXISTS plants (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
plant_name VARCHAR(30) NOT NULL,
care_schedule TEXT NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table_sql) === TRUE) {
  //echo "Table plants created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $plant_name = $_POST['plant_name'];
  $care_schedule = $_POST['care_schedule'];

  $stmt = $conn->prepare("INSERT INTO plants (plant_name, care_schedule) VALUES (?, ?)");
  $stmt->bind_param("ss", $plant_name, $care_schedule);

  if ($stmt->execute() === TRUE) {
    echo "<script>alert('New record created successfully')</script>";
  } else {
    echo "Error: " . $stmt . "<br>" . $conn->error;
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

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
  Plant name: <input type="text" name="plant_name" required>
  <br><br>
  Care schedule:<br>
  <textarea name="care_schedule" rows="5" cols="40" required></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>
