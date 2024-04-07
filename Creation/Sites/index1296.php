<?php
// Simple Meal Plan Web Application

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

// Create table for meal plans if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS meal_plans (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
day_of_week VARCHAR(30) NOT NULL,
meal_type VARCHAR(30) NOT NULL,
description TEXT NOT NULL,
dietary_preference VARCHAR(50),
reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $day_of_week = $_POST["day_of_week"];
  $meal_type = $_POST["meal_type"];
  $description = $_POST["description"];
  $dietary_preference = $_POST["dietary_preference"];

  $stmt = $conn->prepare("INSERT INTO meal_plans (day_of_week, meal_type, description, dietary_preference) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $day_of_week, $meal_type, $description, $dietary_preference);
  
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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Simple Meal Plan</title>
</head>
<body>
<h2>Create Your Meal Plan</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <label for="day_of_week">Day of the Week:</label>
  <input type="text" id="day_of_week" name="day_of_week" required><br><br>
  <label for="meal_type">Meal Type:</label>
  <input type="text" id="meal_type" name="meal_type" required><br><br>
  <label for="description">Description:</label>
  <textarea id="description" name="description" required></textarea><br><br>
  <label for="dietary_preference">Dietary Preference:</label>
  <select id="dietary_preference" name="dietary_preference">
    <option value="None">None</option>
    <option value="Vegan">Vegan</option>
    <option value="Vegetarian">Vegetarian</option>
    <option value="Gluten-Free">Gluten-Free</option>
  </select><br><br>
  <input type="submit" value="Submit">
</form>
</body>
</html>
