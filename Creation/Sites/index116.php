<?php
// Assuming that the database connection settings and the passwords should not be exposed, and considering the importance of safe practices in code sharing, this script will show a simplified and hypothetical example of how to build a simple meal planning system within a single PHP file.

// Note: For real-world applications, separating the concern (MVC approach), using frameworks (like Laravel, Symfony), ORM for database abstraction, and environment variables for configuration are recommended practices for maintainability, security, and scalability. This example does not represent best practices for production environments.

$servername = "db";
$username = "root"; // Not recommended to use root in production
$password = "root"; // This should be securely stored and accessed via environment variables in a real scenario
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create tables if not exist
$createMealsTable = "CREATE TABLE IF NOT EXISTS meals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    ingredients TEXT NOT NULL,
    recipe TEXT NOT NULL,
    dietary_preferences VARCHAR(50),
    reg_date TIMESTAMP
)";

if ($conn->query($createMealsTable) === FALSE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $ingredients = $_POST['ingredients'];
    $recipe = $_POST['recipe'];
    $dietary_preferences = $_POST['dietary_preferences'];

    $stmt = $conn->prepare("INSERT INTO meals (name, ingredients, recipe, dietary_preferences) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $ingredients, $recipe, $dietary_preferences);

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
<title>Create a Simple Meal Plan</title>
<style>
  /* Basic Styling; please expand upon this in a real application */
  body { font-family: Arial, sans-serif; margin: 20px; }
  form, .meal-container { margin-top: 20px; }
</style>
</head>
<body>
<h2>Simple Meal Planner</h2>
<form method="post">
  <label for="name">Meal Name:</label><br>
  <input type="text" id="name" name="name" required><br>
  
  <label for="ingredients">Ingredients:</label><br>
  <textarea id="ingredients" name="ingredients" required></textarea><br>

  <label for="recipe">Recipe:</label><br>
  <textarea id="recipe" name="recipe" required></textarea><br>

  <label for="dietary_preferences">Dietary Preferences:</label><br>
  <input type="text" id="dietary_preferences" name="dietary_preferences"><br><br>

  <input type="submit" value="Submit">
</form>

You would normally fetch and display data from the database here.
<div class="meal-container">
Display meals here by fetching them from the database using PHP.
</div>

</body>
</html>