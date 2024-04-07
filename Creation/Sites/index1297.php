<?php

// Set up database connection
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

// Create meal_plan table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS meal_plan (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    day VARCHAR(30) NOT NULL,
    meal VARCHAR(50),
    dietary_preference VARCHAR(50),
    reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $day = htmlspecialchars($_POST['day']);
    $meal = htmlspecialchars($_POST['meal']);
    $dietary_preference = htmlspecialchars($_POST['dietary_preference']);

    $stmt = $conn->prepare("INSERT INTO meal_plan (day, meal, dietary_preference) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $day, $meal, $dietary_preference);

    if ($stmt->execute()) {
        echo "New meal plan created successfully";
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
    <title>Simple Meal Plan</title>
</head>
<body>

<h2>Create Your Meal Plan</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Day: <input type="text" name="day">
  <br><br>
  Meal: <input type="text" name="meal">
  <br><br>
  Dietary Preference: 
  <select name="dietary_preference">
    <option value="vegan">Vegan</option>
    <option value="vegetarian">Vegetarian</option>
    <option value="gluten-free">Gluten-Free</option>
    <option value="none">None</option>
  </select>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

</body>
</html>
