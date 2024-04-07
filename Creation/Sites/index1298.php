<?php

$host = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$createMealsTable = "CREATE TABLE IF NOT EXISTS meals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    meal_name VARCHAR(255) NOT NULL,
    day_of_week VARCHAR(20) NOT NULL,
    dietary_preference VARCHAR(50),
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createMealsTable)) {
    die("Error creating table: " . $conn->error);
}

if (isset($_POST['submit'])) {
    $mealName = $conn->real_escape_string($_POST['meal_name']);
    $dayOfWeek = $conn->real_escape_string($_POST['day_of_week']);
    $dietaryPreference = $conn->real_escape_string($_POST['dietary_preference']);
    
    $insertSQL = "INSERT INTO meals (meal_name, day_of_week, dietary_preference) VALUES (?, ?, ?)";
    
    $stmt = $conn->prepare($insertSQL);
    $stmt->bind_param("sss", $mealName, $dayOfWeek, $dietaryPreference);
    
    if (!$stmt->execute()) {
        die("Error: " . $stmt->error);
    }

    $stmt->close();
    echo "<script>alert('Meal plan added successfully!');</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Meal Plan</title>
</head>
<body>
    <h1>Create Your Meal Plan</h1>
    <form method="POST" action="">
        <label for="meal_name">Meal Name:</label><br>
        <input type="text" id="meal_name" name="meal_name" required><br>
        
        <label for="day_of_week">Day of Week:</label><br>
        <select id="day_of_week" name="day_of_week" required>
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
            <option value="Saturday">Saturday</option>
            <option value="Sunday">Sunday</option>
        </select><br>
        
        <label for="dietary_preference">Dietary Preference:</label><br>
        <select id="dietary_preference" name="dietary_preference">
            <option value="None">None</option>
            <option value="Vegan">Vegan</option>
            <option value="Vegetarian">Vegetarian</option>
            <option value="Gluten-Free">Gluten-Free</option>
        </select><br>
        
        <button type="submit" name="submit">Submit</button>
    </form>

    <h2>Your Weekly Meal Plan</h2>
    <ul>
        <?php
        $query = "SELECT * FROM meals ORDER BY FIELD(day_of_week, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday')";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<li>" . htmlspecialchars($row["day_of_week"]) . ": " . htmlspecialchars($row["meal_name"]) . " - " . htmlspecialchars($row["dietary_preference"]) . "</li>";
            }
        } else {
            echo "<li>No meals planned yet.</li>";
        }
        ?>
    </ul>
</body>
</html>

<?php
$conn->close();
?>
