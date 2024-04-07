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
pet_type VARCHAR(30) NOT NULL,
health_info TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form data on POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $pet_name = $_POST['pet_name'];
  $pet_type = $_POST['pet_type'];
  $health_info = $_POST['health_info'];

  $stmt = $conn->prepare("INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $pet_name, $pet_type, $health_info);

  if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Pet Profile</title>
    <style>
    body { font-family: Arial, sans-serif; }
    .container { max-width: 600px; margin: auto; padding: 20px; }
    input, textarea { width: 100%; padding: 10px; margin: 10px 0; }
    button { padding: 10px; width: 100%; background-color: #007bff; color: white; border: none; }
    button:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create Pet Profile</h2>
        <form method="POST" action="">
            <label for="pet_name">Pet Name:</label><br>
            <input type="text" id="pet_name" name="pet_name" required><br>
            <label for="pet_type">Pet Type:</label><br>
            <input type="text" id="pet_type" name="pet_type" required><br>
            <label for="health_info">Health Info:</label><br>
            <textarea id="health_info" name="health_info" required></textarea><br>
            <button type="submit">Create Profile</button>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
