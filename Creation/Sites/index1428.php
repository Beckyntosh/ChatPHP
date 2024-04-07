<?php
// Database configuration
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
$tableQuery = "CREATE TABLE IF NOT EXISTS plants (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    plant_name VARCHAR(30) NOT NULL,
    care_schedule VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
    )";

if ($conn->query($tableQuery) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $plantName = $_POST['plantName'];
  $careSchedule = $_POST['careSchedule'];

  $stmt = $conn->prepare("INSERT INTO plants (plant_name, care_schedule) VALUES (?, ?)");
  $stmt->bind_param("ss", $plantName, $careSchedule);

  if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add a Plant to Gardening Tracker</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        input[type="text"], textarea { width: 100%; padding: 10px; margin: 10px 0; }
        input[type="submit"] { background-color: #4CAF50; color: white; padding: 14px 20px; border: none; cursor: pointer; }
        input[type="submit"]:hover { background-color: #45a049; }
    </style>
</head>
<body>

<div class="container">
    <h2>Add a New Plant</h2>
    <form method="POST" action="">
        <label for="plantName">Plant Name:</label><br>
        <input type="text" id="plantName" name="plantName" required><br>
        <label for="careSchedule">Care Schedule:</label><br>
        <textarea id="careSchedule" name="careSchedule" required></textarea><br>
        <input type="submit" value="Add Plant">
    </form>
</div>

</body>
</html>
