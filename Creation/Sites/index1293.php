<?php
// Simple Meal Plan Web Application Code

// MYSQL Connection Variables
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

// Create tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS meal_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    day_of_week VARCHAR(30) NOT NULL,
    meal_type VARCHAR(30),
    meal_name VARCHAR(50),
    dietary_preference VARCHAR(50),
    reg_date TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
    echo "Table meal_plans created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Function to add a meal plan
function addMealPlan($day_of_week, $meal_type, $meal_name, $dietary_preference){
    global $conn;
    $stmt = $conn->prepare("INSERT INTO meal_plans (day_of_week, meal_type, meal_name, dietary_preference) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $day_of_week, $meal_type, $meal_name, $dietary_preference);
    $stmt->execute();
    echo "New meal plan created successfully";
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    addMealPlan($_POST["day_of_week"], $_POST["meal_type"], $_POST["meal_name"], $_POST["dietary_preference"]);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Meal Plan</title>
    <style>
        body { font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; }
        h2, form { text-align: center; }
        input[type=text], select { width: 60%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        input[type=submit] { width: 60%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
    </style>
</head>
<body>

<h2>Create Your Meal Plan</h2>

<form action="" method="post">
    <label for="day_of_week">Day of the Week:</label>
    <select id="day_of_week" name="day_of_week">
        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>
        <option value="Saturday">Saturday</option>
        <option value="Sunday">Sunday</option>
    </select>
    <br>
    <label for="meal_type">Meal Type:</label>
    <select id="meal_type" name="meal_type">
        <option value="Breakfast">Breakfast</option>
        <option value="Lunch">Lunch</option>
        <option value="Dinner">Dinner</option>
    </select>
    <br>
    <label for="meal_name">Meal Name:</label>
    <input type="text" id="meal_name" name="meal_name" placeholder="Meal name..">
    <br>
    <label for="dietary_preference">Dietary Preference:</label>
    <select id="dietary_preference" name="dietary_preference">
        <option value="Vegan">Vegan</option>
        <option value="Vegetarian">Vegetarian</option>
        <option value="Non-Vegetarian">Non-Vegetarian</option>
    </select>
    <br>
    <input type="submit" value="Submit">
</form>

</body>
</html>

<?php
$conn->close();
?>
