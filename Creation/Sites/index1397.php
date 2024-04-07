<?php

// Connection variables
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS habit_tracker (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    habit VARCHAR(255) NOT NULL,
    goal VARCHAR(50) NOT NULL,
    date_tracked DATE NOT NULL,
    quantity_completed DECIMAL(10,2) DEFAULT 0.00,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $habit = $_POST['habit'];
  $goal = $_POST['goal'];
  $date_tracked = $_POST['date_tracked'];
  $quantity_completed = $_POST['quantity_completed'];

  // Prepare an insert statement
  $sql = "INSERT INTO habit_tracker (habit, goal, date_tracked, quantity_completed) VALUES (?, ?, ?, ?)";

  if($stmt = $conn->prepare($sql)) {
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("sssd", $habit, $goal, $date_tracked, $quantity_completed);

    // Attempt to execute the prepared statement
    if($stmt->execute()) {
      echo "Record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // Close statement
    $stmt->close();
  }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Habit Tracker Entry</title>
</head>
<body>

<h2>Habit Tracker Form</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="habit">Habit:</label>
    <input type="text" name="habit" id="habit" required>
    <br><br>
    <label for="goal">Goal:</label>
    <input type="text" name="goal" id="goal" required>
    <br><br>
    <label for="date_tracked">Date:</label>
    <input type="date" name="date_tracked" id="date_tracked" required>
    <br><br>
    <label for="quantity_completed">Quantity Completed:</label>
    <input type="number" step="0.01" name="quantity_completed" id="quantity_completed" required>
    <br><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>
