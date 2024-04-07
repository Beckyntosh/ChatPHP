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

// Check if table exists, if not create one
$query = "CREATE TABLE IF NOT EXISTS plants (
  id INT AUTO_INCREMENT PRIMARY KEY,
  plant_name VARCHAR(255) NOT NULL,
  care_schedule TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($query)) {
  die("Error creating table: " . $conn->error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $plant_name = $_POST["plant_name"];
  $care_schedule = $_POST["care_schedule"];

  $stmt = $conn->prepare("INSERT INTO plants (plant_name, care_schedule) VALUES (?, ?)");
  $stmt->bind_param("ss", $plant_name, $care_schedule);

  if ($stmt->execute() === TRUE) {
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
  <title>Add a Plant to Gardening Tracker</title>
  <style>
    body { font-family: Arial, sans-serif; }
    form { margin: 20px; }
    label { display: block; margin-bottom: 8px; }
    input[type="text"],
    textarea { width: 300px; margin-bottom: 12px; padding: 8px; }
    input[type="submit"] { padding: 10px 15px; }
  </style>
</head>
<body>

<h2>Add a Plant to Your Gardening Tracker</h2>

<form action="" method="post">
  <label for="plant_name">Plant Name:</label>
  <input type="text" name="plant_name" id="plant_name" required>

  <label for="care_schedule">Care Schedule:</label>
  <textarea name="care_schedule" id="care_schedule" required></textarea>

  <input type="submit" value="Add Plant">
</form>

</body>
</html>
