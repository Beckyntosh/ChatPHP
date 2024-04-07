<?php
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

// Create table if it does not exist
$tableCreationSql = "CREATE TABLE IF NOT EXISTS plants (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  care_schedule TEXT,
  reg_date TIMESTAMP
)";

if ($conn->query($tableCreationSql) === TRUE) {
    //echo "Table Plants created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $care_schedule = $_POST['care_schedule'];

  // Insert plant into database
  $insertSql = "INSERT INTO plants (name, care_schedule) VALUES (?, ?)";

  // Prepare statement
  $stmt = $conn->prepare($insertSql);
  $stmt->bind_param("ss", $name, $care_schedule);

  if ($stmt->execute()) {
    //echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gardening Tracker</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width:600px; margin: 20px auto; padding: 20px; }
        input[type=text], textarea { width: 100%; padding: 12px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        input[type=submit] { width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
    </style>
</head>
<body>

<div class="container">
    <h2>Add a Plant to Gardening Tracker</h2>
    <form method="POST">
        <label for="name">Plant Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="care_schedule">Care Schedule:</label>
        <textarea id="care_schedule" name="care_schedule" required></textarea>
        
        <input type="submit" value="Add Plant">
    </form>
</div>

</body>
</html>
