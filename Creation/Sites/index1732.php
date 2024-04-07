<?php

// Connection details
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

// Create pet profile table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS pet_profiles (
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  pet_name VARCHAR(255) NOT NULL,
  pet_type VARCHAR(50),
  health_info TEXT,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $pet_name = $_POST['petName'];
  $pet_type = $_POST['petType'];
  $health_info = $_POST['healthInfo'];

  $stmt = $conn->prepare("INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $pet_name, $pet_type, $health_info);

  if ($stmt->execute()) {
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
  <title>Create Pet Profile</title>
</head>
<body>
  <h2>Create Pet Profile</h2>

  <form action="" method="post">
    <label for="petName">Pet Name:</label><br>
    <input type="text" id="petName" name="petName" required><br>
    <label for="petType">Pet Type:</label><br>
    <input type="text" id="petType" name="petType" required><br>
    <label for="healthInfo">Health Info:</label><br>
    <textarea id="healthInfo" name="healthInfo" required></textarea><br>
    <input type="submit" value="Submit">
  </form> 
</body>
</html>
