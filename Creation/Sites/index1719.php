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

// Create table if doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS pet_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pet_name VARCHAR(30) NOT NULL,
pet_type VARCHAR(30) NOT NULL,
health_info TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo ""; // Success, but nothing to output.
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $pet_name = $_POST['pet_name'];
  $pet_type = $_POST['pet_type'];
  $health_info = $_POST['health_info'];

  $stmt = $conn->prepare("INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $pet_name, $pet_type, $health_info);

  if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
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
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 300px; margin: auto; padding-top: 20px; }
        form { display: flex; flex-direction: column; }
        label { margin-top: 10px; }
        input, textarea { margin-top: 5px; }
        button { margin-top: 10px; }
    </style>
</head>
<body>

    <div class="container">
        <h2>Create Pet Profile</h2>
        <form method="POST">
            <label for="pet_name">Pet's Name:</label>
            <input type="text" id="pet_name" name="pet_name" required>

            <label for="pet_type">Pet's Type (e.g., Dog, Cat):</label>
            <input type="text" id="pet_type" name="pet_type" required>

            <label for="health_info">Health Info:</label>
            <textarea id="health_info" name="health_info" rows="4" required></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>

</body>
</html>
