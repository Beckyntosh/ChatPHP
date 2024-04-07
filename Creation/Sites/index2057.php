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

// Check if the table exists, if not create it
$tableCheckQuery = "SHOW TABLES LIKE 'pet_profiles'";
$tableCheckResult = $conn->query($tableCheckQuery);
if ($tableCheckResult->num_rows == 0) {
    $sql = "CREATE TABLE pet_profiles (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      pet_name VARCHAR(30) NOT NULL,
      pet_type VARCHAR(30) NOT NULL,
      health_info TEXT NOT NULL,
      reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      )";
    
    if ($conn->query($sql) === TRUE) {
      echo "Table Pet Profiles created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }
}

// Handle POST Request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $pet_name = $_POST['pet_name'];
  $pet_type = $_POST['pet_type'];
  $health_info = $_POST['health_info'];

  $sql = "INSERT INTO pet_profiles (pet_name, pet_type, health_info)
  VALUES ('$pet_name', '$pet_type', '$health_info')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Create Pet Profile</title>
<style>
    body { font-family: Arial, sans-serif; }
    .container { margin: 20px; }
    input, textarea { margin-bottom: 10px; width: 100%; }
    label { font-weight: bold; }
    button { padding: 10px; }
</style>
</head>
<body>

<div class="container">
  <h2>Create Pet Profile</h2>
  <form method="post">
    <div>
      <label for="pet_name">Pet Name:</label>
      <input type="text" id="pet_name" name="pet_name" required>
    </div>
    <div>
      <label for="pet_type">Pet Type:</label>
      <input type="text" id="pet_type" name="pet_type" required>
    </div>
    <div>
      <label for="health_info">Health Info:</label>
      <textarea id="health_info" name="health_info" required></textarea>
    </div>
    <button type="submit">Submit</button>
  </form>
</div>

</body>
</html>
