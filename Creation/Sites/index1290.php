<?php

// Initialize connection variables
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

// Create tables if not exist
$tables_sql = [
    'CREATE TABLE IF NOT EXISTS dietary_preferences (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        preference VARCHAR(50) NOT NULL UNIQUE,
        reg_date TIMESTAMP
    )',
    'CREATE TABLE IF NOT EXISTS meal_plans (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_id INT(6) UNSIGNED,
        day_of_week VARCHAR(10) NOT NULL,
        meal_time VARCHAR(10) NOT NULL,
        recipe TEXT NOT NULL,
        dietary_preference_id INT(6) UNSIGNED,
        FOREIGN KEY (dietary_preference_id) REFERENCES dietary_preferences(id)
    )'
];
foreach ($tables_sql as $sql) {
    if ($conn->query($sql) !== TRUE) {
        echo "Error creating table: " . $conn->error;
    }
}

// Insert initial dietary preferences if not exists
$preferences = ['Vegan', 'Vegetarian', 'Gluten-Free'];
$stmt = $conn->prepare("INSERT INTO dietary_preferences (preference) VALUES (?)");
foreach ($preferences as $preference) {
    $stmt->bind_param("s", $preference);
    $stmt->execute();
}
$stmt->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Meal Plan</title>
</head>
<body style="font-family: Arial, sans-serif;">

<h2>Create Your Meal Plan</h2>

<form action="" method="post">
    Day of Week: <input type="text" name="day_of_week"><br>
    Meal Time: <select name="meal_time">
        <option value="Breakfast">Breakfast</option>
        <option value="Lunch">Lunch</option>
        <option value="Dinner">Dinner</option>
    </select><br>
    Recipe: <textarea name="recipe"></textarea><br>
    Dietary Preference: <select name="dietary_preference">
        <?php
            $sql = "SELECT id, preference FROM dietary_preferences";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                echo "<option value='". $row["id"] ."'>". $row["preference"] ."</option>";
            }
        ?>
    </select><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
if (isset($_POST['submit'])) {
    $day_of_week = $_POST['day_of_week'];
    $meal_time = $_POST['meal_time'];
    $recipe = $_POST['recipe'];
    $dietary_preference = $_POST['dietary_preference'];
    
    $sql = "INSERT INTO meal_plans (day_of_week, meal_time, recipe, dietary_preference_id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $day_of_week, $meal_time, $recipe, $dietary_preference);
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
}
$conn->close();
?>

</body>
</html>
