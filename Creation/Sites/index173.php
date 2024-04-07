<?php

//Database Connection
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

// Create camera table if not exists
$createTable = "CREATE TABLE IF NOT EXISTS cameras (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
camera_name VARCHAR(30) NOT NULL,
location VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($createTable) === TRUE) {
    echo "";
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $camera_name = $_POST["camera_name"];
    $location = $_POST["location"];

    $sql = "INSERT INTO cameras (camera_name, location) VALUES ('$camera_name', '$location')";

    if ($conn->query($sql) === TRUE) {
        echo "New camera added successfully";
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
<title>Add Security Camera</title>
<style>
    body { font-family: Arial, sans-serif; background-color: #f0f0f0; margin: 0; padding: 20px; }
    .container { background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
    h2 { color: #4CAF50; }
    form { margin-top: 20px; }
    input[type=text], input[type=submit] { width: 100%; padding: 10px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
    input[type=submit] { width: auto; background-color: #4CAF50; color: white; cursor: pointer; }
    input[type=submit]:hover { background-color: #45a049; }
</style>
</head>
<body>

<div class="container">
    <h2>Add a New Security Camera</h2>
    <form method="post">
        <label for="camera_name">Camera Name:</label>
        <input type="text" id="camera_name" name="camera_name" required>
        
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required>
        
        <input type="submit" value="Add Camera">
    </form>
</div>

</body>
</html>