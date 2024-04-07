<?php
// Simple Meal Plan Application

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
$sql_meal_plan = "CREATE TABLE IF NOT EXISTS meal_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    plan_name VARCHAR(30) NOT NULL,
    dietary_preference ENUM('none', 'vegan', 'vegetarian', 'gluten_free') NOT NULL,
    week_start_date DATE NOT NULL,
    reg_date TIMESTAMP
)";

$sql_meals = "CREATE TABLE IF NOT EXISTS meals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    meal_plan_id INT(6) UNSIGNED,
    day ENUM('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday') NOT NULL,
    meal_type ENUM('Breakfast', 'Lunch', 'Dinner') NOT NULL,
    description TEXT NOT NULL,
    FOREIGN KEY (meal_plan_id) REFERENCES meal_plans(id)
)";

$conn->query($sql_meal_plan);
$conn->query($sql_meals);

// Post Data Processing
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $plan_name = $_POST['plan_name'];
    $dietary_preference = $_POST['dietary_preference'];
    $week_start_date = $_POST['week_start_date'];

    $sql = "INSERT INTO meal_plans (plan_name, dietary_preference, week_start_date)
    VALUES ('$plan_name', '$dietary_preference', '$week_start_date')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $last_id = $conn->insert_id;

    foreach($_POST['meals'] as $meal) {
        $day = $meal['day'];
        $meal_type = $meal['meal_type'];
        $description = $meal['description'];

        $sql = "INSERT INTO meals (meal_plan_id, day, meal_type, description)
        VALUES ('$last_id', '$day', '$meal_type', '$description')";

        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Meal Plan</title>
</head>
<body>
<h2>Create a Meal Plan</h2>

<form method="post">
    <label for="plan_name">Plan Name:</label><br>
    <input type="text" id="plan_name" name="plan_name" required><br>

    <label for="dietary_preference">Dietary Preference:</label><br>
    <select id="dietary_preference" name="dietary_preference">
        <option value="none">None</option>
        <option value="vegan">Vegan</option>
        <option value="vegetarian">Vegetarian</option>
        <option value="gluten_free">Gluten Free</option>
    </select><br>

    <label for="week_start_date">Week Start Date:</label><br>
    <input type="date" id="week_start_date" name="week_start_date" required><br>

    <h3>Meals (Monday to Sunday for Breakfast, Lunch, and Dinner)</h3>
    <?php
    $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    $meal_types = ['Breakfast', 'Lunch', 'Dinner'];

    foreach($days as $day) {
        foreach($meal_types as $meal_type) {
            echo '<label>' . $day . ' ' . $meal_type . ':</label><br>';
            echo '<textarea name="meals['. $day . $meal_type .'][description]" required></textarea>';
            echo '<input type="hidden" name="meals['. $day . $meal_type .'][day]" value="'.$day.'">';
            echo '<input type="hidden" name="meals['. $day . $meal_type .'][meal_type]" value="'.$meal_type.'"><br>';
        }
    }
    ?>
    <input type="submit" value="Submit">
</form>

</body>
</html>
