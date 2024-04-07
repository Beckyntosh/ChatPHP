<?php
// Define database connection parameters
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

// Create Meals table if it does not exist
$createTableSQL = "CREATE TABLE IF NOT EXISTS meals (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
meal_name VARCHAR(30) NOT NULL,
day VARCHAR(10) NOT NULL,
dietary_preference VARCHAR(20),
reg_date TIMESTAMP
)";
$conn->query($createTableSQL);

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $meal_name = $_POST['meal_name'];
    $day = $_POST['day'];
    $dietary_preference = $_POST['dietary_preference'];

    $sql = "INSERT INTO meals (meal_name, day, dietary_preference) VALUES ('$meal_name', '$day', '$dietary_preference')";

    if ($conn->query($sql) === TRUE) {
        echo "New meal plan created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Simple Meal Plan</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f4f8; color: #333; }
        .container { width: 60%; margin: auto; padding: 20px; }
        form { background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        label { font-weight: bold; }
        input, select { width: 100%; margin-bottom: 20px; padding: 10px; border-radius: 4px; border: 1px solid #ddd; }
        button { background-color: #22a7f0; color: #ffffff; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #1992d4; }
    </style>
</head>
<body>

<div class="container">
    <h2>Create Your Weekly Meal Plan</h2>
    <form method="post">
        <label for="meal_name">Meal Name:</label>
        <input type="text" id="meal_name" name="meal_name" required>

        <label for="day">Day of the Week:</label>
        <select id="day" name="day">
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
            <option value="Saturday">Saturday</option>
            <option value="Sunday">Sunday</option>
        </select>

        <label for="dietary_preference">Dietary Preference:</label>
        <select id="dietary_preference" name="dietary_preference">
            <option value="None">None</option>
            <option value="Vegan">Vegan</option>
            <option value="Vegetarian">Vegetarian</option>
            <option value="Gluten-Free">Gluten-Free</option>
        </select>

        <button type="submit">Create Meal Plan</button>
    </form>
</div>

</body>
</html>
<?php
$conn->close();
?>
