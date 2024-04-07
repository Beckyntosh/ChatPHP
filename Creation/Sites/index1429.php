<?php
// Initialize the MySQL connection
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
$tableCheckSql = "CREATE TABLE IF NOT EXISTS plants (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
plant_name VARCHAR(50) NOT NULL,
care_schedule TEXT NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($tableCheckSql) === TRUE) {
  // echo "Table plants created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $plantName = $_POST['plantName'];
  $careSchedule = $_POST['careSchedule'];

  $stmt = $conn->prepare("INSERT INTO plants (plant_name, care_schedule) VALUES (?, ?)");
  $stmt->bind_param("ss", $plantName, $careSchedule);

  if ($stmt->execute()) {
    echo "<script>alert('New plant added successfully');</script>";
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
<title>Add a Plant to Gardening Tracker</title>
<style>
  body { font-family: Arial, sans-serif; }
  .container { max-width: 600px; margin: auto; padding: 20px; }
  input, textarea { width: 100%; padding: 10px; margin: 10px 0; }
  input[type=submit] { background-color: #4CAF50; color: white; }
</style>
</head>
<body>
<div class="container">
  <h2>Add New Plant</h2>
  <form action="" method="post">
    <label for="plantName">Plant Name:</label>
    <input type="text" id="plantName" name="plantName" required>
    
    <label for="careSchedule">Care Schedule:</label>
    <textarea id="careSchedule" name="careSchedule" required></textarea>
    
    <input type="submit" value="Add Plant">
  </form>
</div>
</body>
</html>
