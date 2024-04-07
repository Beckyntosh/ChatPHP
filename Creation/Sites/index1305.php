<?php
// Establish database connection
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

// Create table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS meal_plan (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  day VARCHAR(30) NOT NULL,
  meal_type VARCHAR(30) NOT NULL,
  dish_name VARCHAR(50),
  dietary_preferences VARCHAR(50),
  reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $day = $_POST['day'];
    $meal_type = $_POST['meal_type'];
    $dish_name = $_POST['dish_name'];
    $dietary_preferences = $_POST['dietary_preferences'];

    $sql = "INSERT INTO meal_plan (day, meal_type, dish_name, dietary_preferences)
    VALUES ('$day', '$meal_type', '$dish_name', '$dietary_preferences')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Meal Plan</title>
</head>
<body>

<h2>Create a Meal Plan</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="day">Day:</label><br>
  <input type="text" id="day" name="day" required><br>

  <label for="meal_type">Meal Type:</label><br>
  <input type="text" id="meal_type" name="meal_type" required><br>

  <label for="dish_name">Dish Name:</label><br>
  <input type="text" id="dish_name" name="dish_name" required><br>

  <label for="dietary_preferences">Dietary Preferences:</label><br>
  <input type="text" id="dietary_preferences" name="dietary_preferences" required><br>

  <input type="submit" value="Submit">
</form>

<h2>Weekly Meal Plan</h2>
<?php
$sql = "SELECT day, meal_type, dish_name, dietary_preferences FROM meal_plan";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "Day: " . $row["day"]. " - Meal: " . $row["meal_type"]. " - Dish: " . $row["dish_name"]. " - Preferences: " . $row["dietary_preferences"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>

</body>
</html>
