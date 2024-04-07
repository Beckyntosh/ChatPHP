<?php
// This script handles both front-end display and back-end processing in a single-file approach
// Connect to the database - replace 'root', 'your_password', and 'my_database' with your actual database credentials
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

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["goal_amount"]) && isset($_POST["goal_description"])) {
  $goal_amount = floatval($_POST["goal_amount"]);
  $goal_description = $conn->real_escape_string($_POST["goal_description"]);

  // Insert the goal into the database
  $sql = "INSERT INTO finance_goals (description, amount) VALUES ('$goal_description', '$goal_amount')";

  if ($conn->query($sql) === TRUE) {
    echo "<p>Goal added successfully!</p>";
  } else {
    echo "<p>Error adding goal: " . $conn->error . "</p>";
  }
}

// Create the finance_goals table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS finance_goals (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
description VARCHAR(255) NOT NULL,
amount DECIMAL(10, 2) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Personal Finance Goal Tracker</title>
</head>
<body>
<h2>Create a Personal Finance Goal</h2>
<form action="" method="post">
  <label for="goal_description">Goal Description:</label><br>
  <input type="text" id="goal_description" name="goal_description" required><br>
  <label for="goal_amount">Goal Amount ($):</label><br>
  <input type="number" id="goal_amount" name="goal_amount" required step="0.01"><br><br>
  <input type="submit" value="Submit">
</form>

<h2>Current Goals</h2>
<?php
// Fetch and display current finance goals
$sql = "SELECT id, description, amount FROM finance_goals";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<p><b>Goal:</b> " . $row["description"]. " - <b>Amount:</b> $" . $row["amount"]. "</p>";
  }
} else {
  echo "<p>No goals have been added yet.</p>";
}
$conn->close();
?>
</body>
</html>
