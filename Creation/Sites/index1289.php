<?php
// Connection parameters
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
$tables = "CREATE TABLE IF NOT EXISTS DietaryPreferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    preference VARCHAR(30) NOT NULL
    );
    
    CREATE TABLE IF NOT EXISTS Meals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    meal_name VARCHAR(50),
    day_of_week VARCHAR(10),
    dietary_preference_id INT(6),
    FOREIGN KEY (dietary_preference_id) REFERENCES DietaryPreferences(id)
    );";
    
if ($conn->multi_query($tables) === TRUE) {
    do {
        if ($result = $conn->store_result()) {
            $result->free();
        }
    } while ($conn->next_result());
}

// Handle meal plan form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mealName = $_POST['mealName'];
    $dayOfWeek = $_POST['dayOfWeek'];
    $dietaryPreferenceId = $_POST['dietaryPreference'];
    $sql = "INSERT INTO Meals (meal_name, day_of_week, dietary_preference_id) VALUES ('$mealName', '$dayOfWeek', $dietaryPreferenceId)";
    
    if ($conn->query($sql) === TRUE) {
        echo "New meal plan added successfully";
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
</head>
<body>
    <h2>Create a Meal Plan</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        Meal Name: <input type="text" name="mealName">
        Day of Week: <select name="dayOfWeek">
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
            <option value="Saturday">Saturday</option>
            <option value="Sunday">Sunday</option>
        </select>
        Dietary Preference: <select name="dietaryPreference">
            <?php
            $sql = "SELECT id, preference FROM DietaryPreferences";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["preference"] . "</option>";
                }
            }
            ?>
        </select>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php $conn->close(); ?>
This code snippet creates a simple meal planning web application allowing users to input a meal name, select a day of the week, and choose a dietary preference from a dropdown menu. The PHP script manages database connections, table creation if not existing, form handling, and data insertion. Adjustments for a specific project, security improvements, and further customizations might be necessary.