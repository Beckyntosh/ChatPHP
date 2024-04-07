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
$sql = "CREATE TABLE IF NOT EXISTS Pets (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
type VARCHAR(30) NOT NULL,
health_info TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo ""; // Successfully created table
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $health_info = $_POST['health_info'];

    $stmt = $conn->prepare("INSERT INTO Pets (name, type, health_info) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $type, $health_info);
    $stmt->execute();

    echo "<p>Pet profile for '$name' added successfully!</p>";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Pet Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f2;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            box-shadow: 0 0 10px 0 rgba(0,0,0,0.1);
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
        }
        input[type=text], textarea {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type=submit] {
            background-color: #0d6efd;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #0b5ed7;
        }
    </style>
</head>
<body>

<h2>Create Pet Profile</h2>

<form action="" method="post">
  <label for="name">Pet's Name:</label>
  <input type="text" id="name" name="name" required>
  
  <label for="type">Pet Type:</label>
  <input type="text" id="type" name="type" required>
  
  <label for="health_info">Health Information:</label>
  <textarea id="health_info" name="health_info" rows="4" required></textarea>
  
  <input type="submit" value="Submit">
</form>

</body>
</html>
