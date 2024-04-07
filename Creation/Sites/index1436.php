<?php
// Simple Gardening Tracker: Add a Plant

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

// Create table for plants if not exists
$createTableSql = "CREATE TABLE IF NOT EXISTS plants (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  care_schedule VARCHAR(255) NOT NULL,
  date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($createTableSql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["plant_name"]) && !empty($_POST["care_schedule"])) {
  $plantName = $_POST["plant_name"];
  $careSchedule = $_POST["care_schedule"];

  $sql = $conn->prepare("INSERT INTO plants (name, care_schedule) VALUES (?, ?)");
  $sql->bind_param("ss", $plantName, $careSchedule);

  if ($sql->execute() === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $sql->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add a Plant to Gardening Tracker</title>
  <style>
    body { font-family: Arial, sans-serif; }
    .container { width: 80%; margin: auto; }
    form { margin-top: 20px; }
  </style>
</head>
<body>
<div class="container">
  <h1>Add a Plant to Your Game's Gardening Tracker</h1>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="plant_name">Plant Name:</label><br>
    <input type="text" id="plant_name" name="plant_name" required><br><br>
    <label for="care_schedule">Care Schedule:</label><br>
    <textarea id="care_schedule" name="care_schedule" rows="4" required></textarea><br><br>
    <input type="submit" value="Add Plant">
  </form>
</div>
</body>
</html>
