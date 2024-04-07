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

// Attempt to create the table if it doesn't exist
$table_sql = "CREATE TABLE IF NOT EXISTS MealPlan (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    dayOfWeek VARCHAR(30) NOT NULL,
    mealType VARCHAR(30) NOT NULL,
    dietaryPreference VARCHAR(50),
    mealDescription TEXT,
    reg_date TIMESTAMP
)";

if ($conn->query($table_sql) === TRUE) {
  echo "Table MealPlan created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $dayOfWeek = $_POST['dayOfWeek'];
  $mealType = $_POST['mealType'];
  $dietaryPreference = $_POST['dietaryPreference'];
  $mealDescription = $_POST['mealDescription'];

  $stmt = $conn->prepare("INSERT INTO MealPlan (dayOfWeek, mealType, dietaryPreference, mealDescription) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $dayOfWeek, $mealType, $dietaryPreference, $mealDescription);

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
<title>Meal Plan Creator</title>
</head>
<body>
<h2>Create a Meal Plan</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="dayOfWeek">Day of Week:</label><br>
  <input type="text" id="dayOfWeek" name="dayOfWeek" required><br>
  <label for="mealType">Meal Type:</label><br>
  <input type="text" id="mealType" name="mealType" required><br>
  <label for="dietaryPreference">Dietary Preference:</label><br>
  <input type="text" id="dietaryPreference" name="dietaryPreference"><br>
  <label for="mealDescription">Meal Description:</label><br>
  <textarea id="mealDescription" name="mealDescription" required></textarea><br>
  <input type="submit" value="Submit">
</form>
</body>
</html>
