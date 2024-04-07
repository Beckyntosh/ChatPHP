<?php
// Create connection to the database
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

// Attempt to create the table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS pet_profiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(30) NOT NULL,
    pet_type VARCHAR(30) NOT NULL,
    health_info TEXT,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  die("Error creating table: " . $conn->error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $pet_name = $_POST['pet_name'];
  $pet_type = $_POST['pet_type'];
  $health_info = $_POST['health_info'];

  $stmt = $conn->prepare("INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $pet_name, $pet_type, $health_info);

  if ($stmt->execute() === TRUE) {
    $message = "Pet profile for " . $pet_name . " saved successfully!";
  } else {
    $message = "Error: " . $stmt->error;
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
  <h2>Create a Pet Profile</h2>
  <form action="" method="post">
      <label for="pet_name">Pet's Name:</label><br>
      <input type="text" id="pet_name" name="pet_name" required><br>
      
      <label for="pet_type">Pet's Type (e.g., Dog, Cat):</label><br>
      <input type="text" id="pet_type" name="pet_type" required><br>
  
      <label for="health_info">Health Information:</label><br>
      <textarea id="health_info" name="health_info" rows="4" required></textarea><br>
  
      <input type="submit" value="Create Profile">
  </form>

  <?php
  if (!empty($message)) {
      echo "<p>$message</p>";
  }
  ?>
</body>
</html>
