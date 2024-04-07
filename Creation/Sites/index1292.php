<?php
// Database Connection
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

// Create tables if they do not exist
$sql = "CREATE TABLE IF NOT EXISTS meal_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    day VARCHAR(30) NOT NULL,
    meal_type VARCHAR(30) NOT NULL,
    recipe VARCHAR(255) NOT NULL,
    dietary_preference VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle the form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $day = $_POST['day'];
  $meal_type = $_POST['meal_type'];
  $recipe = $_POST['recipe'];
  $dietary_preference = $_POST['dietary_preference'];

  $stmt = $conn->prepare("INSERT INTO meal_plans (day, meal_type, recipe, dietary_preference) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $day, $meal_type, $recipe, $dietary_preference);
  
  // Execute and check
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
    <title>Simple Meal Plan</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        label, input, select { display: block; width: 100%; margin-bottom: 10px; }
        input, select { padding: 8px; }
        button { padding: 10px; width: 100%; }
    </style>
</head>
<body>
<div class="container">
    <h2>Create a Meal Plan</h2>
    <form method="post" action="">
        <label for="day">Day</label>
        <input type="text" id="day" name="day" required>

        <label for="meal_type">Meal Type</label>
        <select id="meal_type" name="meal_type">
            <option value="Breakfast">Breakfast</option>
            <option value="Lunch">Lunch</option>
            <option value="Dinner">Dinner</option>
        </select>

        <label for="recipe">Recipe</label>
        <input type="text" id="recipe" name="recipe" required>

        <label for="dietary_preference">Dietary Preference</label>
        <select id="dietary_preference" name="dietary_preference">
            <option value="None">None</option>
            <option value="Vegan">Vegan</option>
            <option value="Vegetarian">Vegetarian</option>
            <option value="Gluten-Free">Gluten-Free</option>
        </select>

        <button type="submit">Submit</button>
    </form>
</div>
</body>
</html>
