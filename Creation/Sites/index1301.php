<?php
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

$sql = "CREATE TABLE IF NOT EXISTS meals (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
dietary_preference VARCHAR(30) NOT NULL,
day_of_week VARCHAR(10) NOT NULL,
meal_name VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table meals created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dietary_preference = $_POST['dietary_preference'];
    $day_of_week = $_POST['day_of_week'];
    $meal_name = $_POST['meal_name'];

    $stmt = $conn->prepare("INSERT INTO meals (dietary_preference, day_of_week, meal_name) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $dietary_preference, $day_of_week, $meal_name);
    $stmt->execute();
    echo "New records created successfully";
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Simple Meal Plan</title>
</head>
<body>

<h2>Simple Meal Plan</h2>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
  Dietary Preference: <input type="text" name="dietary_preference">
  <br><br>
  Day of the Week: <select name="day_of_week">
    <option value="Monday">Monday</option>
    <option value="Tuesday">Tuesday</option>
    <option value="Wednesday">Wednesday</option>
    <option value="Thursday">Thursday</option>
    <option value="Friday">Friday</option>
    <option value="Saturday">Saturday</option>
    <option value="Sunday">Sunday</option>
  </select>
  <br><br>
  Meal Name: <input type="text" name="meal_name">
  <br><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>
