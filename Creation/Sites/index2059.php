<?php
// This script serves as a simple example and should be adapted for security and functionality for production use
// Connect to the database
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
$table_sql = "CREATE TABLE IF NOT EXISTS pet_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pet_name VARCHAR(30) NOT NULL,
health_info TEXT NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($table_sql) === TRUE) {
  echo "Table pet_profiles created successfully.<br>";
} else {
  echo "Error creating table: " . $conn->error;
}

// Insert Pet Profile into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pet_name = $_POST['pet_name'];
    $health_info = $_POST['health_info'];

    $insert_sql = "INSERT INTO pet_profiles (pet_name, health_info) VALUES (?, ?)";

    $stmt = $conn->prepare($insert_sql);
    $stmt->bind_param("ss", $pet_name, $health_info);
    $stmt->execute();

    echo "New record created successfully.<br>";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Create Pet Profile</title>
</head>
<body>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }
  form {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
  }
  input, textarea {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 4px;
  }
  input[type=submit] {
    background-color: #4CAF50;
    color: white;
    cursor: pointer;
  }
  input[type=submit]:hover {
    opacity: 0.9;
  }
</style>

<div>
  <h2>Create a Pet Profile</h2>
  <form action="" method="post">
    <label for="pet_name">Pet Name:</label><br>
    <input type="text" id="pet_name" name="pet_name" required><br>
    <label for="health_info">Health Info:</label><br>
    <textarea id="health_info" name="health_info" required></textarea><br>
    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>
