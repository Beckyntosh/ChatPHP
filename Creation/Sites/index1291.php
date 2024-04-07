<?php
// Single-file approach for a Simple Meal Plan web application including frontend and MySQL interaction

// Database configuration
define("DB_SERVER", "db");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "my_database");

// Attempt to connect to MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection
if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if not exists
// Users table for storing dietary preferences
$userTable = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    dietary_preference VARCHAR(255) NOT NULL
)";

// Meal Plans table for storing weekly meal plans
$mealPlanTable = "CREATE TABLE IF NOT EXISTS meal_plans (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    day_of_week VARCHAR(255) NOT NULL,
    meal VARCHAR(255) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

// Execute table creation queries
$conn->query($userTable);
$conn->query($mealPlanTable);

// Check for post data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dietary_preference = $_POST['dietary_preference'];
    $meals = $_POST['meals'];

    // Insert User Dietary Preference
    $stmt = $conn->prepare("INSERT INTO users (dietary_preference) VALUES (?)");
    $stmt->bind_param("s", $dietary_preference);
    $stmt->execute();
    $user_id = $stmt->insert_id;

    // Insert meal plans
    foreach ($meals as $day => $meal) {
        $stmt = $conn->prepare("INSERT INTO meal_plans (user_id, day_of_week, meal) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $user_id, $day, $meal);
        $stmt->execute();
    }

    echo "Meal Plan Created Successfully!";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Create a Simple Meal Plan</title>
</head>
<body>
    <h2>Simple Meal Plan</h2>
    <form action="" method="post">
        Dietary Preference: <select name="dietary_preference">
            <option value="vegan">Vegan</option>
            <option value="vegetarian">Vegetarian</option>
            <option value="omnivore">Omnivore</option>
        </select><br><br>
        
        <strong>Meals:</strong><br>
        Monday: <input type="text" name="meals[Monday]"><br>
        Tuesday: <input type="text" name="meals[Tuesday]"><br>
        Wednesday: <input type="text" name="meals[Wednesday]"><br>
        Thursday: <input type="text" name="meals[Thursday]"><br>
        Friday: <input type="text" name="meals[Friday]"><br>
        Saturday: <input type="text" name="meals[Saturday]"><br>
        Sunday: <input type="text" name="meals[Sunday]"><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
