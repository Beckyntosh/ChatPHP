<?php
// Simple Meal Plan PHP/HTML/MySQL Example

// Database connection settings
$servername = 'db';
$username = 'root';
$password = 'root';
$dbname = 'my_database';

// Establish a MySQL database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it doesn't exist
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS meal_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    day VARCHAR(30) NOT NULL,
    meal_plan TEXT NOT NULL,
    dietary_preference VARCHAR(50),
    reg_date TIMESTAMP
)";

if (!$conn->query($tableCreationQuery)) {
    echo "Error creating table: " . $conn->error;
}

// Insert meal plan if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $day = $_POST['day'];
    $mealPlan = $_POST['mealPlan'];
    $dietaryPreference = $_POST['dietaryPreference'];

    $stmt = $conn->prepare("INSERT INTO meal_plans (day, meal_plan, dietary_preference) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $day, $mealPlan, $dietaryPreference);

    if ($stmt->execute()) {
        echo "<p>Meal plan added successfully!</p>";
    } else {
        echo "<p>Failed to add meal plan: " . $conn->error . "</p>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple Meal Plan</title>
</head>
<body>
    <h1>Create a Meal Plan</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="day">Day of the Week:</label><br>
        <input type="text" id="day" name="day" required><br><br>
        
        <label for="mealPlan">Meal Plan:</label><br>
        <textarea id="mealPlan" name="mealPlan" rows="4" cols="50" required></textarea><br><br>

        <label for="dietaryPreference">Dietary Preference:</label><br>
        <select id="dietaryPreference" name="dietaryPreference">
            <option value="none">None</option>
            <option value="vegan">Vegan</option>
            <option value="vegetarian">Vegetarian</option>
            <option value="gluten-free">Gluten-Free</option>
        </select><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
<?php
$conn->close();
?>
