<?php
// Connecting to database
define("MYSQL_ROOT_PSWD", "root");
$servername = "db";
$username = "root";
$password = MYSQL_ROOT_PSWD;
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for Meal Plans if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS meal_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    day VARCHAR(30) NOT NULL,
    meal VARCHAR(100) NOT NULL,
    dietary_preference VARCHAR(30),
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // echo "Table meal_plans created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $day = $_POST['day'];
    $meal = $_POST['meal'];
    $dietary_preference = $_POST['dietary_preference'];

    // Insert form data into the database
    $sql = "INSERT INTO meal_plans (day, meal, dietary_preference)
    VALUES ('$day', '$meal', '$dietary_preference')";

    if ($conn->query($sql) === TRUE) {
        echo "New meal plan created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Simple Meal Plan</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: 20px auto; padding: 20px; }
        form { display: flex; flex-direction: column; }
        label { margin-bottom: 5px; }
        input, select { margin-bottom: 20px; padding: 10px; }
        button { padding: 10px; color: white; background-color: navy; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create Your Weekly Meal Plan</h2>
        <form action="?" method="POST">
            <label for="day">Day of the Week:</label>
            <select id="day" name="day" required>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
            </select>
            
            <label for="meal">Meal:</label>
            <input type="text" id="meal" name="meal" placeholder="Input your meal" required>
            
            <label for="dietary_preference">Dietary Preference:</label>
            <select id="dietary_preference" name="dietary_preference">
                <option value="">None</option>
                <option value="Vegan">Vegan</option>
                <option value="Vegetarian">Vegetarian</option>
                <option value="Gluten-Free">Gluten-Free</option>
            </select>
            
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
