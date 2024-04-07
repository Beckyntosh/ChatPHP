<?php
// Connection variables
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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS Plants (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL,
care_schedule TEXT NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Check if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $care_schedule = $_POST['care_schedule'];

  $stmt = $conn->prepare("INSERT INTO Plants (name, care_schedule) VALUES (?, ?)");
  $stmt->bind_param("ss", $name, $care_schedule);

  if ($stmt->execute()) {
    echo "New plant added successfully";
  } else {
    echo "Error: " . $stmt . "<br>" . $conn->error;
  }

  $stmt->close();
  $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add a Plant to Gardening Tracker</title>
</head>
<body>

<h2>Add Plant</h2>

<form method="post" action="">
  <label for="name">Plant Name:</label><br>
  <input type="text" id="name" name="name" required><br>
  <label for="care_schedule">Care Schedule:</label><br>
  <textarea id="care_schedule" name="care_schedule" required></textarea><br>
  <input type="submit" value="Add Plant">
</form>

</body>
</html>
