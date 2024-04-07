<?php
// Check if form is submitted:
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
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

    $meal_plan_name = $_POST['meal_plan_name'];
    $dietary_preference = $_POST['dietary_preference'];
    $days = $_POST['days'];

    // Sql query to insert into database
    $sql = "INSERT INTO meal_plans (meal_plan_name, dietary_preference, days) VALUES ('$meal_plan_name', '$dietary_preference', '$days')";

    if ($conn->query($sql) === TRUE) {
        echo "New meal plan created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Meal Plan Creation</title>
</head>
<body>
    <form action="" method="post">
        <label for="meal_plan_name">Meal Plan Name:</label><br>
        <input type="text" id="meal_plan_name" name="meal_plan_name" required><br>
        
        <label for="dietary_preference">Dietary Preference:</label><br>
        <select id="dietary_preference" name="dietary_preference">
            <option value="vegan">Vegan</option>
            <option value="vegetarian">Vegetarian</option>
            <option value="non-vegetarian">Non-Vegetarian</option>
        </select><br>

        <label for="days">Number of Days:</label><br>
        <input type="number" id="days" name="days" min="1" max="7" required><br>
        
        <input type="submit" value="Submit">
    </form> 

<?php
// Create meal_plans table in my_database
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS meal_plans (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
meal_plan_name VARCHAR(50) NOT NULL,
dietary_preference VARCHAR(30) NOT NULL,
days INT(2),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table meal_plans created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
</body>
</html>
