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

// Attempt to create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS PetProfiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(30) NOT NULL,
    pet_type VARCHAR(30) NOT NULL,
    health_info TEXT,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table PetProfiles created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pet_name = $_POST["pet_name"];
    $pet_type = $_POST["pet_type"];
    $health_info = $_POST["health_info"];

    $stmt = $conn->prepare("INSERT INTO PetProfiles (pet_name, pet_type, health_info) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $pet_name, $pet_type, $health_info);

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
    <title>Create Pet Profile</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 400px; margin: auto; padding: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create a Pet Profile</h2>
        <form action="" method="post">
            <label for="pet_name">Pet Name:</label><br>
            <input type="text" id="pet_name" name="pet_name" required><br><br>
            <label for="pet_type">Pet Type:</label><br>
            <input type="text" id="pet_type" name="pet_type" required><br><br>
            <label for="health_info">Health Information:</label><br>
            <textarea id="health_info" name="health_info" rows="4" required></textarea><br><br>
            <input type="submit" value="Create Profile">
        </form>
    </div>
</body>
</html>
