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

// Create tables if they don't exist
$mealPlanTable = "CREATE TABLE IF NOT EXISTS MealPlans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    day VARCHAR(30) NOT NULL,
    meal_type VARCHAR(30) NOT NULL,
    dish_name VARCHAR(255) NOT NULL,
    dietary_preference VARCHAR(50),
    reg_date TIMESTAMP
    )";

if ($conn->query($mealPlanTable) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $day = $_POST['day'];
    $meal_type = $_POST['meal_type'];
    $dish_name = $_POST['dish_name'];
    $dietary_preference = $_POST['dietary_preference'];

    $sql = "INSERT INTO MealPlans (day, meal_type, dish_name, dietary_preference) 
            VALUES ('$day', '$meal_type', '$dish_name', '$dietary_preference')";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple Meal Plan</title>
    <style>
        body { font-family: Arial, sans-serif; }
        form { margin-top: 20px; }
        input, select { margin-bottom: 10px; padding: 8px; }
    </style>
</head>
<body>
    <h2>Create your weekly Meal Plan</h2>

    <form method="post">
        <label for="day">Select Day:</label><br>
        <select name="day" id="day">
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
            <option value="Saturday">Saturday</option>
            <option value="Sunday">Sunday</option>
        </select><br>

        <label for="meal_type">Select Meal Type:</label><br>
        <select name="meal_type" id="meal_type">
            <option value="Breakfast">Breakfast</option>
            <option value="Lunch">Lunch</option>
            <option value="Dinner">Dinner</option>
        </select><br>

        <label for="dish_name">Dish Name:</label><br>
        <input type="text" id="dish_name" name="dish_name" required><br>

        <label for="dietary_preference">Dietary Preference:</label><br>
        <select name="dietary_preference" id="dietary_preference">
            <option value="None">None</option>
            <option value="Vegan">Vegan</option>
            <option value="Vegetarian">Vegetarian</option>
            <option value="Gluten-Free">Gluten-Free</option>
        </select><br>

        <input type="submit" value="Add to Plan">
    </form>

    <?php
    $sql = "SELECT * FROM MealPlans";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h3>Your Meal Plan</h3>";
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>" . $row["day"]. ": " . $row["meal_type"]. " - " . $row["dish_name"]. " (" . $row["dietary_preference"]. ")" . "</li>";
        }
        echo "</ul>";
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</body>
</html>
