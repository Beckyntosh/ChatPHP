<?php
$server = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($server, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if not exists
$mealPlansTable = "CREATE TABLE IF NOT EXISTS meal_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    day VARCHAR(30) NOT NULL, 
    meal_type VARCHAR(30) NOT NULL,
    meal_name VARCHAR(100) NOT NULL,
    dietary_preference VARCHAR(50),
    reg_date TIMESTAMP
)";

if ($conn->query($mealPlansTable) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle POST request to add a meal plan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $day = $_POST['day'];
    $meal_type = $_POST['meal_type'];
    $meal_name = $_POST['meal_name'];
    $dietary_preference = $_POST['dietary_preference'];
    
    $sql = "INSERT INTO meal_plans (day, meal_type, meal_name, dietary_preference) VALUES (?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $day, $meal_type, $meal_name, $dietary_preference);
    
    if ($stmt->execute()) {
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Meal Plan</title>
</head>
<body>
    <h1>Create a Meal Plan</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="day">Day:</label>
        <input type="text" id="day" name="day" required><br><br>
        
        <label for="meal_type">Meal Type:</label>
        <select id="meal_type" name="meal_type" required>
            <option value="Breakfast">Breakfast</option>
            <option value="Lunch">Lunch</option>
            <option value="Dinner">Dinner</option>
        </select><br><br>
        
        <label for="meal_name">Meal Name:</label>
        <input type="text" id="meal_name" name="meal_name" required><br><br>
        
        <label for="dietary_preference">Dietary Preference:</label>
        <select id="dietary_preference" name="dietary_preference">
            <option value="">None</option>
            <option value="Vegan">Vegan</option>
            <option value="Vegetarian">Vegetarian</option>
            <option value="Gluten-Free">Gluten-Free</option>
        </select><br><br>
        
        <input type="submit" value="Add Meal Plan">
    </form>
</body>
</html>
