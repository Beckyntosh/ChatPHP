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

// Create tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS Plants (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
plant_name VARCHAR(50) NOT NULL,
care_schedule TEXT NOT NULL,
reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $plant_name = $_POST['plant_name'];
    $care_schedule = $_POST['care_schedule'];
    
    $sql = "INSERT INTO Plants (plant_name, care_schedule)
    VALUES ('" . $plant_name . "', '" . $care_schedule . "')";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add a Plant to Gardening Tracker</title>
</head>
<body>

<h2>Add a Plant to Your Gardening Tracker</h2>

<form method="post" action="">
    <label for="plant_name">Plant Name:</label><br>
    <input type="text" id="plant_name" name="plant_name" required><br>
    <label for="care_schedule">Care Schedule:</label><br>
    <textarea id="care_schedule" name="care_schedule" required></textarea><br><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>

<?php
$conn->close();
?>
