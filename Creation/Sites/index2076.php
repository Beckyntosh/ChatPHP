<?php

// Database connection parameters
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

// Create pet profile table if not exists
$sql = "CREATE TABLE IF NOT EXISTS pet_profiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(30) NOT NULL,
    pet_type VARCHAR(30) NOT NULL,
    pet_breed VARCHAR(50),
    health_info TEXT,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table pet_profiles created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error;
}

// Insert pet profile to table
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $pet_name = $_POST['pet_name'];
  $pet_type = $_POST['pet_type'];
  $pet_breed = $_POST['pet_breed'] ?? '';
  $health_info = $_POST['health_info'];

  $stmt = $conn->prepare("INSERT INTO pet_profiles (pet_name, pet_type, pet_breed, health_info) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $pet_name, $pet_type, $pet_breed, $health_info);

  if ($stmt->execute() === TRUE) {
    echo "New pet profile created successfully<br>";
  } else {
    echo "Error: " . $stmt->error;
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
    Pet Name: <input type="text" name="pet_name" required><br><br>
    Pet Type: <input type="text" name="pet_type" required><br><br>
    Pet Breed: <input type="text" name="pet_breed"><br><br>
    Health Info: <textarea name="health_info" required></textarea><br><br>
    <input type="submit" value="Create Profile">
</form>

</body>
</html>
