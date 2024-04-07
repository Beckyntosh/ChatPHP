<?php

// Connect to database
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

// Create table for Pet profiles if not exists
$sqlTable = "CREATE TABLE IF NOT EXISTS pet_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
species VARCHAR(30) NOT NULL,
health_info TEXT,
reg_date TIMESTAMP
)";

if ($conn->query($sqlTable) === TRUE) {
  //echo "Table pet_profiles created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form data submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $species = $_POST['species'];
  $health_info = $_POST['health_info'];

  $sqlInsert = "INSERT INTO pet_profiles (name, species, health_info)
  VALUES ('$name', '$species', '$health_info')";

  if ($conn->query($sqlInsert) === TRUE) {
    echo "<script>alert('New pet profile has been added successfully!');</script>";
  } else {
    echo "Error: " . $sqlInsert . "<br>" . $conn->error;
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
  .container { max-width: 600px; margin: auto; padding: 20px; }
  input, textarea { width: 100%; padding: 10px; margin: 10px 0; }
  button { padding: 10px 20px; background-color: #007bff; color: white; border: none; cursor: pointer; }
  button:hover { opacity: 0.8; }
</style>
</head>
<body>

<div class="container">
  <h2>Create Pet Profile</h2>
  <form method="POST" action="">
    <label for="name">Pet's Name:</label>
    <input type="text" id="name" name="name" required>
    
    <label for="species">Species:</label>
    <input type="text" id="species" name="species" required>
    
    <label for="health_info">Health Information:</label>
    <textarea id="health_info" name="health_info" rows="4" required></textarea>
    
    <button type="submit">Submit</button>
  </form>
</div>

</body>
</html>
