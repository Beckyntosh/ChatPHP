<?php
// This file serves both as the front end and the back end script for adding a Plant with its care schedule to a gardening tracker.

// Database connection parameters
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $plantName = $_POST["plantName"];
  $careSchedule = $_POST["careSchedule"];
  
  // Create the Plants table if it doesn't exist
  $sql = "CREATE TABLE IF NOT EXISTS Plants (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    plantName VARCHAR(50) NOT NULL,
    careSchedule TEXT NOT NULL,
    reg_date TIMESTAMP
  )";

  if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
  }

  // Insert the new plant entry
  $stmt = $conn->prepare("INSERT INTO Plants (plantName, careSchedule) VALUES (?, ?)");
  $stmt->bind_param("ss", $plantName, $careSchedule);
  
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
    <title>Add a Plant to Gardening Tracker</title>
    <style>
        body {
            font-family: "Courier New", Courier, monospace;
            background-color: #f0f0f5;
            padding: 20px;
        }
        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        input[type=text], textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
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
    <h2>Add a Plant to Your Gardening Tracker</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="plantName">Plant Name:</label>
        <input type="text" id="plantName" name="plantName" required>
        
        <label for="careSchedule">Care Schedule:</label>
        <textarea id="careSchedule" name="careSchedule" rows="4" required></textarea>
        
        <input type="submit" value="Add Plant">
    </form>
</body>
</html>
