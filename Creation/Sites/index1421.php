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

// Create the tables if they don't exist
$sql = "CREATE TABLE IF NOT EXISTS habits (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
habit_name VARCHAR(50) NOT NULL,
habit_goal INT(10) NOT NULL,
reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS habit_entries (
entry_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
habit_id INT(6) UNSIGNED,
entry_date DATE NOT NULL,
quantity INT(10) NOT NULL,
FOREIGN KEY (habit_id) REFERENCES habits(id)
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Form submission logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Insert a new habit
  $habit_name = $_POST["habit_name"];
  $habit_goal = $_POST["habit_goal"];

  $stmt = $conn->prepare("INSERT INTO habits (habit_name, habit_goal) VALUES (?, ?)");
  $stmt->bind_param("si", $habit_name, $habit_goal);
  $stmt->execute();
  $stmt->close();  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Habit Tracker</title>
</head>
<body>

<h2>Add a New Habit</h2>
<form method="post">
  <label for="habit_name">Habit Name:</label><br>
  <input type="text" id="habit_name" name="habit_name" required><br>
  <label for="habit_goal">Goal (e.g., 2 liters of water):</label><br>
  <input type="number" id="habit_goal" name="habit_goal" required><br><br>
  <input type="submit" value="Submit">
</form>

<h2>Today's Habits</h2>
<?php
$sql = "SELECT id, habit_name, habit_goal FROM habits";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["habit_name"]. " - Goal: " . $row["habit_goal"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>

</body>
</html>
