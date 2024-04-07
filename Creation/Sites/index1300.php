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

// Create table
$sql = "CREATE TABLE IF NOT EXISTS Meals (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
day VARCHAR(30) NOT NULL,
meal_type VARCHAR(30) NOT NULL,
recipe_name VARCHAR(50),
dietary_preferences VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Meals created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Insert data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $day = $_POST["day"];
    $meal_type = $_POST["meal_type"];
    $recipe_name = $_POST["recipe_name"];
    $dietary_preferences = $_POST["dietary_preferences"];

    $stmt = $conn->prepare("INSERT INTO Meals (day, meal_type, recipe_name, dietary_preferences) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $day, $meal_type, $recipe_name, $dietary_preferences);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
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
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }
        input, select {
            padding: 10px;
            margin: 10px 0;
            display: block;
            width: 95%;
        }
    </style>
</head>
<body>
    <h2>Create a Meal Plan for the Week</h2>
    <form action="" method="post">
        <label for="day">Day of the Week:</label>
        <select id="day" name="day">
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
            <option value="Saturday">Saturday</option>
            <option value="Sunday">Sunday</option>
        </select>

        <label for="meal_type">Meal Type:</label>
        <select id="meal_type" name="meal_type">
            <option value="Breakfast">Breakfast</option>
            <option value="Lunch">Lunch</option>
            <option value="Dinner">Dinner</option>
        </select>

        <label for="recipe_name">Recipe Name:</label>
        <input type="text" id="recipe_name" name="recipe_name" required>

        <label for="dietary_preferences">Dietary Preferences:</label>
        <select id="dietary_preferences" name="dietary_preferences">
            <option value="Omnivore">Omnivore</option>
            <option value="Vegetarian">Vegetarian</option>
            <option value="Vegan">Vegan</option>
        </select>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
