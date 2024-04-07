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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS pet_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pet_name VARCHAR(30) NOT NULL,
pet_age INT(3),
pet_type VARCHAR(30) NOT NULL,
health_info TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $pet_name = $_POST["pet_name"];
  $pet_age = $_POST["pet_age"];
  $pet_type = $_POST["pet_type"];
  $health_info = $_POST["health_info"];

  $stmt = $conn->prepare("INSERT INTO pet_profiles (pet_name, pet_age, pet_type, health_info) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("siss", $pet_name, $pet_age, $pet_type, $health_info);

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
<html>
<head>
<title>Create Pet Profile</title>
<style>
body { font-family: 'Courier New', monospace; background-color: #f0e68c; }
form { margin: 50px auto; width: 400px; padding: 20px; }
label { display: block; margin-bottom: 10px; }
input[type=text], textarea { width: 100%; margin-bottom: 20px; padding: 10px; }
input[type=submit] { background-color: #558b2f; color: white; padding: 10px 15px; border: none; cursor: pointer; }
</style>
</head>
<body>

<h2>Create Pet Profile</h2>

<form action="" method="post">
  <label for="pet_name">Pet Name:</label>
  <input type="text" id="pet_name" name="pet_name" required>
  
  <label for="pet_age">Pet Age:</label>
  <input type="text" id="pet_age" name="pet_age" required>
  
  <label for="pet_type">Pet Type (e.g., Dog, Cat):</label>
  <input type="text" id="pet_type" name="pet_type" required>
  
  <label for="health_info">Health Information:</label>
  <textarea id="health_info" name="health_info" required></textarea>
  
  <input type="submit" value="Submit">
</form>

</body>
</html>
