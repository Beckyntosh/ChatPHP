<?php
// Simple Meal Planner for a Spirits Website

// DB configurations
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to MySQL Database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they don't exist
$createQuery = "CREATE TABLE IF NOT EXISTS diets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);
CREATE TABLE IF NOT EXISTS meals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    diet_id INT,
    day_of_week ENUM('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday') NOT NULL,
    mealplan TEXT NOT NULL,
    FOREIGN KEY (diet_id) REFERENCES diets(id)
);";
if (!$conn->multi_query($createQuery)) {
    echo "Error creating table: " . $conn->error;
}

// Insert Dietary Preferences Dynamically
$insertDiets = "INSERT INTO diets (name) VALUES ('Vegan'), ('Vegetarian'), ('Gluten-Free'), ('Ketogenic');";
$conn->query($insertDiets); // Simplified without duplication checks for the example

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Meal Plan</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f0f0f0; color: #333; }
        .container { max-width: 800px; margin: auto; padding: 20px; background: white; }
        form { display: flex; flex-wrap: wrap; justify-content: space-between; }
        form input[type="submit"] { background-color: #4CAF50; color: white; padding: 12px; border: none; cursor: pointer; }
        form input[type="submit"]:hover { opacity: 0.8; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create Your Weekly Meal Plan</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <div>
                <label for="diet">Select your dietary preference:</label>
                <select name="diet" id="diet" required>
                    <?php
                    // Fetch and list diet options
                    $sql = "SELECT id, name FROM diets";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <?php
            // Days of the week for inputs
            $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
            foreach($days as $day) {
                echo "<div>
                        <label for='${day}Meal'>Meal plan for $day:</label>
                        <input type='text' id='${day}Meal' name='${day}Meal' required>
                      </div>";
            }
            ?>
            <input type="submit" name="submit" value="Save Meal Plan">
        </form>
    </div>

<?php
if (isset($_POST['submit'])) {
    $dietId = $conn->real_escape_string($_POST['diet']);
    foreach($days as $day) {
        $mealPlan = $conn->real_escape_string($_POST[$day . 'Meal']);
        $insertMealPlan = "INSERT INTO meals (diet_id, day_of_week, mealplan) VALUES ('$dietId', '$day', '$mealPlan');";

        if (!$conn->query($insertMealPlan)) {
            echo "<div>Failed to insert meal plan for $day: ". $conn->error ."</div>";
        }
    }
    echo "<p>Meal Plan Saved Successfully!</p>";
}
?>

</body>
</html>

<?php
$conn->close();
?>
