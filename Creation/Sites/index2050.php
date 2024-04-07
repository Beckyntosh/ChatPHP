<?php
$servername = "db";
$database = "my_database";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$createTable = "CREATE TABLE IF NOT EXISTS pet_profiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(30) NOT NULL,
    pet_type VARCHAR(30) NOT NULL,
    health_info TEXT,
    reg_date TIMESTAMP
)";

if ($conn->query($createTable) === TRUE) {
  echo "Table pet_profiles created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $pet_name = $_POST['pet_name'];
  $pet_type = $_POST['pet_type'];
  $health_info = $_POST['health_info'];

  $stmt = $conn->prepare("INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $pet_name, $pet_type, $health_info);

  if ($stmt->execute() === TRUE) {
    echo "New pet profile created successfully";
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
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
        }
        .input-group {
            margin-bottom: 10px;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
        }
        .input-group input, .input-group textarea {
            width: 100%;
            padding: 8px;
            margin: 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .input-group textarea {
            resize: vertical;
        }
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create Pet Profile</h2>
        <form method="POST">
            <div class="input-group">
                <label for="pet_name">Pet Name</label>
                <input type="text" id="pet_name" name="pet_name" required>
            </div>
            
            <div class="input-group">
                <label for="pet_type">Pet Type</label>
                <input type="text" id="pet_type" name="pet_type" required>
            </div>
            
            <div class="input-group">
                <label for="health_info">Health Info</label>
                <textarea id="health_info" name="health_info"></textarea>
            </div>
            
            <button type="submit" class="button">Create Profile</button>
        </form>
    </div>
</body>
</html>
