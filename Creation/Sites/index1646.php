<?php
// Connecting to database
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

// Create exercises table if it does not exist
$createTable = "CREATE TABLE IF NOT EXISTS exercises (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
description TEXT,
video_url VARCHAR(255),
reg_date TIMESTAMP
)";

if ($conn->query($createTable) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $description = $_POST['description'];
  $videoUrl = $_POST['videoUrl'];

  $stmt = $conn->prepare("INSERT INTO exercises (name, description, video_url) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $description, $videoUrl);
  
  if ($stmt->execute() === TRUE) {
    echo "New exercise added successfully";
  } else {
    echo "Error: " . $stmt->error;
  }
  
  $stmt->close();
}

$conn->close();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Add Custom Exercise</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        color: #333;
      }
      .container {
        max-width: 600px;
        margin: 30px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
      }
      .field {
        margin-bottom: 10px;
      }
      label {
        margin-bottom: 5px;
        display: inline-block;
      }
      input[type=text], textarea {
        width: 100%;
        padding: 8px;
        margin: 4px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
      }
      input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
      input[type=submit]:hover {
        background-color: #45a049;
      }
    </style>
  </head>
  <body>
  
    <div class="container">
      <h2>Add Custom Exercise</h2>
      <form method="POST">
        <div class="field">
          <label for="name">Exercise Name:</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div class="field">
          <label for="description">Description:</label>
          <textarea id="description" name="description" required></textarea>
        </div>
        <div class="field">
          <label for="videoUrl">Video URL:</label>
          <input type="text" id="videoUrl" name="videoUrl">
        </div>
        <input type="submit" value="Add Exercise">
      </form>
    </div>
    
  </body>
</html>
