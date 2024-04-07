<?php
// Connect to Database
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

// Create MEAL_PLAN table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS MEAL_PLAN (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    day_of_week VARCHAR(30) NOT NULL,
    meal_type VARCHAR(30) NOT NULL,
    meal_name VARCHAR(50),
    dietary_preference VARCHAR(50),
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // echo "Table MEAL_PLAN created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $day_of_week = $_POST["day_of_week"];
    $meal_type = $_POST["meal_type"];
    $meal_name = $_POST["meal_name"];
    $dietary_preference = $_POST["dietary_preference"];

    $stmt = $conn->prepare("INSERT INTO MEAL_PLAN (day_of_week, meal_type, meal_name, dietary_preference) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $day_of_week, $meal_type, $meal_name, $dietary_preference);

    if($stmt->execute()) {
        $message = "Meal plan added successfully!";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create a Simple Meal Plan</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; }
        .form-group { margin-bottom: 10px; }
        .form-group label { display: inline-block; width: 150px; }
        .form-group input, .form-group select { padding: 5px; }
        #message { color: green; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create a Simple Meal Plan</h2>
        <form method="POST">
            <div class="form-group">
                <label for="day_of_week">Day of Week:</label>
                <select id="day_of_week" name="day_of_week" required>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                </select>
            </div>
            <div class="form-group">
                <label for="meal_type">Meal Type:</label>
                <select id="meal_type" name="meal_type" required>
                    <option value="Breakfast">Breakfast</option>
                    <option value="Lunch">Lunch</option>
                    <option value="Dinner">Dinner</option>
                </select>
            </div>
            <div class="form-group">
                <label for="meal_name">Meal Name:</label>
                <input type="text" id="meal_name" name="meal_name" required>
            </div>
            <div class="form-group">
                <label for="dietary_preference">Dietary Preference:</label>
                <select id="dietary_preference" name="dietary_preference" required>
                    <option value="None">None</option>
                    <option value="Vegan">Vegan</option>
                    <option value="Vegetarian">Vegetarian</option>
                    <option value="Gluten-Free">Gluten-Free</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Add Meal Plan</button>
            </div>
        </form>
        <p id="message"><?php echo $message; ?></p>
    </div>
</body>
</html>
