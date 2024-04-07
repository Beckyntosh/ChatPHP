<?php
// DB connection setup
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
$tables_sql = "
CREATE TABLE IF NOT EXISTS dietary_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    preference VARCHAR(30) NOT NULL
);

CREATE TABLE IF NOT EXISTS meals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    day VARCHAR(15) NOT NULL,
    meal_time VARCHAR(15) NOT NULL,
    meal VARCHAR(50) NOT NULL,
    dietary_preference_id INT(6) UNSIGNED,
    FOREIGN KEY (dietary_preference_id) REFERENCES dietary_preferences(id)
);
";

if ($conn->multi_query($tables_sql)) {
  do {
    // Store first result set
    if ($result = $conn->store_result()) {
      $result->free();
    }
    // Check if there are any more query results from a multi query
  } while ($conn->next_result());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $day = $_POST['day'];
  $meal_time = $_POST['meal_time'];
  $meal = $_POST['meal'];
  $dietary_preference = $_POST['dietary_preference'];

  // Insert dietary_preference if not exists and get its id
  $check_pref_sql = "SELECT id FROM dietary_preferences WHERE preference=? LIMIT 1";
  $stmt = $conn->prepare($check_pref_sql);
  $stmt->bind_param("s", $dietary_preference);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($row = $result->fetch_assoc()) {
    $dietary_preference_id = $row["id"];
  } else {
    $insert_pref_sql = "INSERT INTO dietary_preferences (preference) VALUES (?)";
    $stmt = $conn->prepare($insert_pref_sql);
    $stmt->bind_param("s", $dietary_preference);
    $stmt->execute();
    $dietary_preference_id = $stmt->insert_id;
  }
  $stmt->close();

  // Insert meal plan
  $insert_sql = "INSERT INTO meals (day, meal_time, meal, dietary_preference_id) VALUES (?, ?, ?, ?)";
  $stmt = $conn->prepare($insert_sql);
  $stmt->bind_param("sssi", $day, $meal_time, $meal, $dietary_preference_id);
  $stmt->execute();
  $stmt->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Simple Meal Plan</title>
<style>
body {
  font-family: Arial, sans-serif;
  background-color: #eee;
  padding: 20px;
}
form {
  background-color: #fff;
  padding: 20px;
  border-radius: 10px;
}
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
input[type=submit]:hover {
  background-color: #45a049;
}
</style>
</head>
<body>
<h2>Simple Meal Plan</h2>
<form action="" method="post">
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

  <label for="meal_time">Meal Time:</label>
  <select id="meal_time" name="meal_time">
    <option value="Breakfast">Breakfast</option>
    <option value="Lunch">Lunch</option>
    <option value="Dinner">Dinner</option>
  </select>

  <label for="meal">Meal:</label>
  <input type="text" id="meal" name="meal" placeholder="Your favorite meal...">

  <label for="dietary_preference">Dietary Preference:</label>
  <input type="text" id="dietary_preference" name="dietary_preference" placeholder="e.g., Vegan, None">

  <input type="submit" value="Submit">
</form>
</body>
</html>
<?php
$conn->close();
?>
