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

// Create table if it doesn't exist
$table_sql = "CREATE TABLE IF NOT EXISTS pet_profiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(30) NOT NULL,
    pet_type VARCHAR(30) NOT NULL,
    health_info TEXT,
    reg_date TIMESTAMP
)";

if ($conn->query($table_sql) === TRUE) {
  echo "Table pet_profiles created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pet_name = $_POST["pet_name"];
    $pet_type = $_POST["pet_type"];
    $health_info = $_POST["health_info"];

    $sql = "INSERT INTO pet_profiles (pet_name, pet_type, health_info)
    VALUES ('$pet_name', '$pet_type', '$health_info')";

    if ($conn->query($sql) === TRUE) {
      echo "New pet profile created successfully";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Pet Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form div {
            margin-bottom: 12px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Create Pet Profile</h2>
    <form action="" method="post">
        <div>
            <label for="pet_name">Pet's Name:</label>
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
        <div>
            <button type="submit">Create Profile</button>
        </div>
    </form>
</div>
    
</body>
</html>
